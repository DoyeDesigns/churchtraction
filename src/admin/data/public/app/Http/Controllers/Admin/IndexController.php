<?php

namespace App\Http\Controllers\Admin;

use App\Department;
use App\User;
use App\OutreachReport;
use App\CellReport;
use App\WeeklyReport;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class IndexController extends Controller
{


    public function dashboard(){

        $output=[];
        $output['departments'] = Department::count();
        $output['outreachreports'] = OutreachReport::count();
        $output['cellreports'] = CellReport::count();
        $output['weeklyreports'] = WeeklyReport::count();
        $output['members'] = User::count();
        $output['admins'] = User::where('role_id',1)->orWhere('role_id',3)->count();
        $output['messages'] = Auth::user()->receivedEmails()->count();
        $output['user'] = Auth::user();
        $output['newMembers']= User::where('assigned','=', 0)->where('id', '!=', 1)->where('id', '!=', 2)->get();
        $output['emails'] =Auth::user()->receivedEmails()->latest()->limit(10)->get();

        return view('admin.index.dashboard',$output);
    }
}
