<?php

namespace App\Http\Controllers\Member;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Event;
use App\CellReport;
use App\Department;
use App\Church;
use App\CellReportComment;
use App\User;
use App\MeetingType;
use App\Lib\HelperTrait;
use App\Rejection;
use App\Shift;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
class CellReportsController extends Controller
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
            $cellreports = getDepartment()->cellReports()->paginate($perPage);
        } else {
            $cellreports = getDepartment()->cellReports()->orderBy('updated_at','desc')->paginate($perPage);
        }

        $controller = $this;
        return view('member.cellreports.index', compact('cellreports','controller'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $event =  new Event();
        $cell = getDepartment();
        $church_branch = Church::where('id', $cell->church_id)->first();
        $cell_leaders = getDepartment()->users()->get();
        $meeting_types = MeetingType::get()->all();
        $user = Auth::user();
        return view('member.cellreports.create', compact('event', 'church_branch', 'cell', 'cell_leaders', 'meeting_types', 'user'));
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
        // $this->validate($request,[
        //    'name'=>'required',
        //     // 'event_date'=>'required'
        // ]);
        $requestData = $request->all();
        $requestData['department_id'] = getDepartment()->id;
        $requestData['reporter'] = Auth::user()->id;

        $event= CellReport::create($requestData);

        // return redirect()->route('member.shifts.create',['event'=>$event->id])->with('flash_message', __('admin.event').' '.__('admin.saved').'. '.__('site.create-new').' '.__('admin.shift'));
       return redirect('member/cellreports')->with('flash_message', __('admin.cellreports').' '.__('admin.saved'));
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
        $cellreport = CellReport::findOrFail($id);
        $church_branch = $cellreport->church()->first();
        $cell = $cellreport->department()->first();
        $cell_leader = User::where('id', $cellreport->cell_leader_id)->first();
        $meeting_type = MeetingType::where('id', $cellreport->meeting_type_id)->first();
        $reporter = User::where('id', $cellreport->reporter)->first();
        $comments = CellReportComment::where('report_id', $cellreport->id)->get();
        return view('member.cellreports.show', compact('cellreport', 'church_branch', 'cell', 'cell_leader', 'meeting_type', 'reporter', 'comments'));
    }

    public function  addComment(){
        // Log::Debug($request);
    }
    

}
