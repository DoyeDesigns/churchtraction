<?php

namespace App\Http\Controllers\Member;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Church;
use App\Department;
use App\Event;
use App\User;
use App\Lib\HelperTrait;
use App\Rejection;
use App\Shift;
use App\MeetingType;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
class EventsController extends Controller
{
    use HelperTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 25;

        if (!empty($keyword)) {
            $events = getDepartment()->events()->whereRaw("match(name,venue,description) against (? IN NATURAL LANGUAGE MODE)", [$keyword])->paginate($perPage);
        } else {
            $events = getDepartment()->events()->orderBy('event_date','desc')->paginate($perPage);
        }

        $controller = $this;
        return view('member.events.index', compact('events','controller'));
    }


    public function getTotalUsers($event){

        $users = [];
        foreach($event->shifts as $shift){
            foreach($shift->users as $user){
                $users[$user->id]=$user->id;
            }

        }
        return count($users);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('member.events.create');
    }

    public function getEventDates($from_date, $to_date, $repetition, $days){
        $start=date($from_date);
        $current=$start;
        $end=date($to_date);
        $weeks=array();
        while($current < $end){
        
          $temp = date('Y-m-d', strtotime($current . '+ 6 days'));
          if($temp > $end){
            $temp=$end;
          }
        
          $week[0]=$current;
          $week[1]=$temp;
          array_push($weeks, $week);
         
        //   $current=date('Y-m-d', strtotime($current . '+ 1 days'));
          $current=date('Y-m-d', strtotime($current . '+'. $repetition*7  .' days'));
          if($current >= $end ){
            $current=$end;
          }
        }

        $dates = array();
        // foreach ($days as $day) {
            foreach ($weeks as $week) {
                foreach ($days as $day) {
                    // $temp = $week[0]->modify('next '. $day);
                    $temp = new \DateTime($week[0]);
                    $t = $temp->modify('next '. $day);
                    if ($t >= new \DateTime($week[0]) && $t <= new \DateTime($week[1])) {
                        array_push($dates, $t);
                        // Log::debug($t->format('Y-m-d-H-i-s'));
                    }
                }
            }
        // }
        
        // return $weeks;
        return $dates;

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $this->validate($request,[
           'name'=>'required',
            // 'event_date'=>'required'
        ]);
        $requestData = $request->all();
        $requestData['department_id'] = getDepartment()->id;

        if ($request->repetitive == 1) {
            $days = $this->getEventDates($request->from_date, $request->to_date, $request->repetition, $request->days);

            foreach ($days as $key => $value) {
                $requestData['event_date'] = $value->format('Y-m-d');
                $event= Event::create($requestData);
            }
        }else {
            $event= Event::create($requestData);
        }

        // return redirect()->route('member.shifts.create',['event'=>$event->id])->with('flash_message', __('admin.event').' '.__('admin.saved').'. '.__('site.create-new').' '.__('admin.shift'));
       return redirect('member/events')->with('flash_message', __('admin.event').' '.__('admin.saved'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $event = Event::findOrFail($id);
        $this->authorize('view',$event);

        return view('member.events.show', compact('event'));
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function reportForEvent($id)
    {
        $event = Event::findOrFail($id);
        $this->authorize('update',$event);
        $church_branches = Church::get()->all();
        $cells = Department::get()->all();
        $cell_leaders = User::get()->all();
        $meeting_types = MeetingType::get()->all();

        return view('member.reports.create', compact('event', 'church_branches', 'cells', 'cell_leaders', 'meeting_types'));
    }

    public function createReport($id)
    {
        // $event = Event::findOrFail($id);
        // $this->authorize('update',$event);
        // return view('member.events.report.create', compact('event'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $event = Event::findOrFail($id);
        $this->authorize('update',$event);

        return view('member.events.edit', compact('event'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'name'=>'required',
            'event_date'=>'required'
        ]);
        $requestData = $request->all();

        $event = Event::findOrFail($id);
        $this->authorize('update',$event);
        $event->update($requestData);

        return redirect('member/events')->with('flash_message', __('admin.changes-saved'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        $this->authorize('delete',Event::find($id));
        Event::destroy($id);

        return redirect('member/events')->with('flash_message', __('admin.event').' '.__('admin.deleted'));
    }

    public function roster(Request $request){

        $start = $request->get('start');
        $end = $request->get('end');
        $perPage = 25;

        if (!empty($start) || !empty($end)) {
            $events = getDepartment()->events()->orderBy('event_date');
            if(!empty($start)){
                $events= $events->where('event_date','>=',Carbon::parse($start)->toDateTimeString());
            }

            if(!empty($end)){
                $events= $events->where('event_date','<',Carbon::parse($end)->toDateTimeString());
            }

            $events = $events->orderBy('event_date')->paginate($perPage);
        } else {
            $events = getDepartment()->events()->where('event_date' , '>=' , Carbon::yesterday()->toDateTimeString())->orderBy('event_date')->paginate($perPage);
        }


        return view('member.events.roster', compact('events','start','end'));
    }

    public function rosterEvent(Event $event){
        return view('member.events.roster-event',compact('event'));
    }

    public function optOut(Request $request,Shift $shift){
        $this->validate($request,[
            'message'=>'required'
        ]);

        Rejection::create([
            'shift_id'=>$shift->id,
            'user_id'=>Auth::user()->id,
            'message'=>$request->message
        ]);

        $shift->users()->detach(Auth::user()->id);
        if($shift->event->notifications==1){
            $subject = __('admin.new-opt-out');
            $message = __('admin.opt-out-msg',['name'=>Auth::user()->name,'shift'=>$shift->name,'event'=>$shift->event->name]);
            $this->notifyDeptAdmins($subject,$message);
        }

        return back()->with('flash_message',__('admin.changes-saved'));
    }

    public function volunteer(Shift $shift){
        if(empty($shift->event->accept_volunteers)){
            return back();
        }
        $shift->users()->attach(Auth::user()->id);
        if($shift->event->notifications==1){
            $subject = __('admin.new-volunteer');
            $message = __('admin.new-volunteer-msg',['name'=>Auth::user()->name,'shift'=>$shift->name,'event'=>$shift->event->name]);
            $this->notifyDeptAdmins($subject,$message);
        }

        return back()->with('flash_message',__('admin.changes-saved'));

    }

    public function shifts(Request $request){
        $user = Auth::user();
        $start = $request->get('start');
        $end = $request->get('end');
        $perPage = 25;
        $department=getDepartment();
        if (!empty($start) || !empty($end)) {


            $shifts=  $user->shifts()->whereHas('event',function($q) use($department,$start,$end){
                $q->where('department_id',$department->id);
                if(!empty($start)){
                    $q->where('event_date','>=',Carbon::parse($start)->toDateTimeString());
                }

                if(!empty($end)){
                    $q->where('event_date','<',Carbon::parse($end)->toDateTimeString());
                }
                $q->orderBy('event_date');

            })->paginate($perPage);

        } else {

          $shifts=  $user->shifts()->whereHas('event',function($q) use($department){
                $q->where('department_id',$department->id);
                $q->where('event_date' , '>=' , Carbon::yesterday()->toDateTimeString())->orderBy('event_date');
            })->paginate($perPage);

     //       $events = getDepartment()->events()->where('event_date' , '>=' , Carbon::yesterday()->toDateTimeString())->orderBy('event_date')->paginate($perPage);
        }

        return view('member.events.shifts', compact('shifts','start','end'));
    }

    public function duplicate(Event $event,Request $request){
        $this->validate($request,[
            'date'=>'required'
        ]);
        $this->authorize('view',$event);
        $newEvent = $event->replicate();
        $newEvent->event_date = Carbon::parse($request->date)->toDateTimeString();
        $newEvent->save();

        foreach ($event->shifts as $shift){
            $newShift = $shift->replicate();
            $newShift->event_id = $newEvent->id;
            $newShift->save();
            foreach ($shift->users as $user){
                $newShift->users()->attach($user->id,['tasks'=>$user->pivot->tasks]);
            }
        }


        return back()->with('flash_message',__('admin.item-duplicated'));

    }


}
