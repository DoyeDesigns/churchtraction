@extends('layouts.admin')
@section('pageTitle',__('admin.weeklyreports'))

@section('innerTitle')
     @lang('admin.weeklyreport') - Date: {{ $report->created_at }}
@endsection

@section('breadcrumb')
    <li><a href="{{ route('admin.dashboard') }}">@lang('admin.dashboard')</a>
    </li>
    <li><a href="{{ url('/admin/weeklyreports') }}">@lang('admin.weeklyreports')</a>
    </li>
    <li><span>@lang('admin.weeklyreports')</span>
    </li>
@endsection

@section('content')
{{-- <style>
  .disable {
        pointer-events:none;
        /* background-color: #000000; */
    }  
</style>--}}  
    <div class="single-pro-review-area mt-t-30 mg-b-15">


        <div class="container-fluid">
            <div class="product-payment-inner-st form-content">


                <div class="card">
                    <div class="card-body">

                        <a href="{{ url('/admin/weeklyreports') }}" title="@lang('admin.back')"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> @lang('admin.back')</button></a>
                        {{--<a href="{{ url('/admin/weeklyreports/' . $report->id . '/edit') }}" title="@lang('admin.edit') report"><button class="btn btn-primary btn-sm"><i class="fa fa-edit" aria-hidden="true"></i> @lang('admin.edit')</button></a>--}}

                        {{--
                            <form method="POST" autocomplete="off" action="{{ url('admin/weeklyreports' . '/' . $report->id) }}" accept-charset="UTF-8" style="display:inline">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger btn-sm" title="@lang('admin.delete') report" onclick="return confirm('@lang('site.confirm-delete')')"><i class="fa fa-trash" aria-hidden="true"></i> @lang('admin.delete')</button>
                        </form>
                        --}}
                        <br/>
                        <br/>

                        <div class=''>
                            <input name="event_id" type="text" id="event_id" value="{{$report->event_id}}" hidden>

                            <div class="row">
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 form-group">
                                    <label for="church_branch" class="control-label">{{ 'Church branch' }}</label>
                                    <input  class="form-control" name="church_branch" id="church_branch" value="{{$church_branch->name }}" >
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 form-group">
                                    <label for="cell" class="control-label">{{ 'Cell/Group' }}</label>
                                    <input  class="form-control" name="cell" id="cell" value="{{$cell->name }}" >
                                </div>
                            </div>
                            
                           
                            <div class="row">
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 form-group ">
                                    <label for="cell_leaders" class="control-label">{{ 'Cell Leader' }}</label>
                                    <input  class="form-control" name="cell_leader" id="cell_leader" value="{{ $cell_leader->name }} - {{ $cell_leader->email }}" >
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 form-group ">
                                    <label for="reporter" class="control-label">{{ 'Reporter' }}</label>
                                    <input  class="form-control" name="reporter" id="reporter" value="{{$reporter->name}} - <<{{$reporter->email}}>>" >
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 form-group {{ $errors->has('total_mid_week_service_attendance') ? 'has-error' : ''}}">
                                    <label for="total_mid_week_service_attendance" class="control-label">{{ 'Total Mid-Week Service Attendance' }}</label>
                                    <input  class="form-control" name="total_mid_week_service_attendance" type="number" min="0" id="total_mid_week_service_attendance" value="{{ $report->total_mid_week_service_attendance }}" >
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 form-group {{ $errors->has('total_sunday_week_service_attendance') ? 'has-error' : ''}}">
                                    <label for="total_sunday_week_service_attendance" class="control-label">{{ 'Total Sunday Service Attendance' }}</label>
                                    <input  class="form-control" name="total_sunday_week_service_attendance" type="number" min="0" id="total_sunday_week_service_attendance" value="{{  $report->total_sunday_week_service_attendance }}" >
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 form-group {{ $errors->has('total_first_timer') ? 'has-error' : ''}}">
                                    <label for="total_first_timer" class="control-label">{{ 'Total First-Timers' }}</label>
                                    <input  class="form-control" name="total_first_timer" type="number" min="0" id="total_first_timer" value="{{ $report->total_first_timer }}" >
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 form-group {{ $errors->has('total_new_converts') ? 'has-error' : ''}}">
                                    <label for="total_new_converts" class="control-label">{{ 'Total New Converts' }}</label>
                                    <input  class="form-control" name="total_new_converts" type="number" min="0" id="total_new_converts" value="{{ $report->total_new_converts }}" >
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-lg-8 col-md-8 col-sm-8 col-xs-8 {{ $errors->has('cell_leader_comment') ? 'has-error' : ''}}">
                                    <label for="cell_leader_comment" class="control-label">{{ 'Cell Leader Comment' }}</label>
                                    <textarea  class="form-control" rows="100" name="cell_leader_comment" type="textarea" id="cell_leader_comment" >{{  $report->cell_leader_comment }}</textarea>
                                </div>
                            </div>

                            <h4>{{'WEEKLY FOLLOW REPORT'}}</h4>

                            <div class="row">
                                <div class="form-group col-lg-8 col-md-8 col-sm-8 col-xs-8 {{ $errors->has('name_of_the_souls') ? 'has-error' : ''}}">
                                    <label for="name_of_the_souls" class="control-label">{{ 'Name of the Soul(s)' }}</label>
                                    <textarea  class="form-control" rows="100" name="name_of_the_souls" type="textarea" id="name_of_the_souls" >{{ $report->name_of_the_souls }}</textarea>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-lg-8 col-md-8 col-sm-8 col-xs-8 {{ $errors->has('summary_report') ? 'has-error' : ''}}">
                                    <label for="summary_report" class="control-label">{{ 'Summary Report' }}</label>
                                    <textarea  class="form-control" rows="100" name="summary_report" type="textarea" id="summary_report" >{{ $report->summary_report }}</textarea>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-lg-8 col-md-8 col-sm-8 col-xs-8 {{ $errors->has('who_did_the_follow_up') ? 'has-error' : ''}}">
                                    <label for="who_did_the_follow_up" class="control-label">{{ 'Who did the follow up?' }}</label>
                                    <textarea  class="form-control" rows="100" name="who_did_the_follow_up" type="textarea" id="who_did_the_follow_up" >{{ $report->who_did_the_follow_up }}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <hr><hr><hr>
                <div class="card">
                    <div class="card-body">
                        <h4>{{'Comments'}}</h4>
                            @foreach($comments as $comment)
                            <div class="row">
                                <div class="form-group col-lg-8 col-md-8 col-sm-8 col-xs-8 ">
                                    <label for="name_of_the_souls" class="control-label"><strong>{{ \App\User::where('id', $comment->from_user)->first()->name }}</strong> at {{$comment->created_at}}</label>
                                    <textarea  class="form-control" rows="60" type="textarea" >{{ $comment->message }}</textarea>
                                </div>
                            </div>
                            @endforeach
                            <br><br>
                            <br><br>
                            <div class="row">
                                <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8 form-group">
                                    <form method="POST" autocomplete="off" action="{{ url('/admin/weeklyreportcomments') }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
                                        {{ csrf_field() }}
                                        <input name="report_id" type="text" id="report_id" value="{{$report->id}}" hidden>
                                        <div class="form-group ">
                                            <textarea required class="form-control" name="message" rows="60" type="textarea" ></textarea>
                                        </div>
                                        <div class="form-group ">
                                            <input class="btn btn-primary" type="submit" value="comment">
                                        </div>
                                    </form>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
        </div>


    </div>
   
@endsection
