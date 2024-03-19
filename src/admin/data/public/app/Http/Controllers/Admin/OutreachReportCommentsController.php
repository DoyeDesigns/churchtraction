<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Event;
use App\Report;
use App\Department;
use App\Church;
use App\OutreachReportComment;
use App\User;
use App\MeetingType;
use App\Lib\HelperTrait;
use App\Rejection;
use App\Shift;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
class OutreachReportCommentsController extends Controller
{
    use HelperTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
      */
    public function index(Request $request)
    {
        // $keyword = $request->get('search');
        // $perPage = 25;

        // if (!empty($keyword)) {
        //     $reports = getDepartment()->reports()->paginate($perPage);
        // } else {
        //     $reports = getDepartment()->reports()->orderBy('updated_at','desc')->paginate($perPage);
        // }

        // $controller = $this;
        // return view('member.reports.index', compact('reports','controller'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        // $event =  new Event();
        // $cell = getDepartment();
        // $church_branch = Church::where('id', $cell->church_id)->first();
        // $cell_leaders = getDepartment()->users()->get();
        // $meeting_types = MeetingType::get()->all();
        // $user = Auth::user();
        // return view('member.reports.create', compact('event', 'church_branch', 'cell', 'cell_leaders', 'meeting_types', 'user'));
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
        $requestData = $request->all();
        $requestData['from_user'] = Auth::user()->id;
        $comments= OutreachReportComment::create($requestData);
       return redirect("admin/outreachreports/$request->report_id")->with('flash_message', __('admin.reports').' '.__('admin.saved'));
    }

    

}
