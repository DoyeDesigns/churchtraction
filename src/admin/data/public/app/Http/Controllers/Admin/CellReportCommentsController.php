<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Event;
use App\Report;
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
class CellReportCommentsController extends Controller
{
    use HelperTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
      */
    public function index(Request $request)
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
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
        $comments= CellReportComment::create($requestData);
       return redirect("admin/cellreports/$request->report_id")->with('flash_message', __('admin.cellreports').' '.__('admin.saved'));
    }

    

}
