@extends('layouts.member')
@section('pageTitle',__('admin.cellreports'))

@section('innerTitle')
     @lang('admin.cellreport') - Date: {{ $cellreport->name }}
@endsection

@section('breadcrumb')
    <li><a href="{{ route('member.dashboard') }}">@lang('admin.dashboard')</a>
    </li>
    <li><a href="{{ url('/member/cellreports') }}">@lang('admin.cellreports')</a>
    </li>
    <li><span>@lang('admin.cellreport')</span>
    </li>
@endsection

@section('content')
{{-- <style>
    .disable {
        pointer-events:none;
        /* background-color: #000000; */
    }    
</style> --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/autosize.js/4.0.2/autosize.min.js"></script>
<script>autosize(document.querySelectorAll('textarea'));</script>
    <div class="single-pro-review-area mt-t-30 mg-b-15">


        <div class="container-fluid">
            <div class="product-payment-inner-st form-content">


                <div class="card">
                    <div class="card-body">

                        <a href="{{ url('/member/cellreports') }}" title="@lang('admin.back')"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> @lang('admin.back')</button></a>
                        {{--<a href="{{ url('/member/cellreports/' . $cellreport->id . '/edit') }}" title="@lang('admin.edit') report"><button class="btn btn-primary btn-sm"><i class="fa fa-edit" aria-hidden="true"></i> @lang('admin.edit')</button></a>--}}

                        {{--
                            <form method="POST" autocomplete="off" action="{{ url('member/cellreports' . '/' . $cellreport->id) }}" accept-charset="UTF-8" style="display:inline">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger btn-sm" title="@lang('admin.delete') report" onclick="return confirm('@lang('site.confirm-delete')')"><i class="fa fa-trash" aria-hidden="true"></i> @lang('admin.delete')</button>
                        </form>
                        --}}
                        <br/>
                        <br/>

                        <div class=''>
                            <input name="event_id" type="text" id="event_id" value="{{$cellreport->event_id}}" hidden>

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
                                    <label for="cell_secretary" class="control-label">{{ 'Cell Secretary' }}</label>
                                    <input  class="form-control" name="cell_secretary" id="cell_secretary" value="{{ $cellreport->cell_secretary }}" >
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 form-group ">
                                    <label for="meeting_types" class="control-label">{{ 'Meeting Type' }}</label>
                                    <input  class="form-control" name="meeting_types" id="meeting_types" value="{{ $meeting_type->name }}" >
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 form-group ">
                                    <label for="reporter" class="control-label">{{ 'Reporter' }}</label>
                                    <input  class="form-control" name="reporter" id="reporter" value="{{$reporter->name}} - <<{{$reporter->email}}>>" >
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 form-group ">
                                    <label for="meeting_date" class="control-label">{{ 'Meeting Date' }}</label>
                                    <input   class="form-control date" name="meeting_date" type="text" id="meeting_date" value="{{ $cellreport->meeting_date}}" >
                                </div>
                                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2 form-group ">
                                    <label for="meeting_start_time" class="control-label">{{ 'Time Meeting Started' }}</label>
                                    <input  class="form-control" name="meeting_start_time" type="time" id="meeting_start_time" value="{{ $cellreport->meeting_start_time }}" >
                                </div>
                                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2 form-group ">
                                    <label for="meeting_end_time" class="control-label">{{ 'Time Meeting Ended' }}</label>
                                    <input  class="form-control" name="meeting_end_time" type="time" id="meeting_end_time" value="{{ $cellreport->meeting_end_time }}" >
                                </div>
                            </div>
                            <div class="row">
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 form-group {{ $errors->has('meeting_location') ? 'has-error' : ''}}">
                                    <label for="meeting_location" class="control-label">{{ 'Meeting Location' }}</label>
                                    <input  class="form-control" name="meeting_location" id="meeting_location" value="{{ $cellreport->meeting_location  }}" >
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 form-group {{ $errors->has('total_meeting_attendance') ? 'has-error' : ''}}">
                                    <label for="total_meeting_attendance" class="control-label">{{ 'Total Meeting Attendance' }}</label>
                                    <input  class="form-control" name="total_meeting_attendance" type="number" min="0" id="total_meeting_attendance" value="{{ $cellreport->total_meeting_attendance}}" >
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2 form-group {{ $errors->has('total_cell_offerings') ? 'has-error' : ''}}">
                                    <label for="total_cell_offerings" class="control-label">{{ 'Total Cell Offerings' }}</label>
                                    <input  class="form-control" name="total_cell_offerings" type="number" min="0" id="total_cell_offerings" value="{{ $cellreport->total_cell_offerings }}" >
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 form-group {{ $errors->has('have_cell_offering_remitted') ? 'has-error' : ''}}">
                                    <label for="have_cell_offering_remitted" class="control-label">{{ 'Have the Cell Offering been Remitted to church office ?' }}</label>
                                    <input   class="form-control" name="have_cell_offering_remitted" id="have_cell_offering_remitted" value="{{$cellreport->have_cell_offering_remitted}}" >

                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 form-group {{ $errors->has('if_yes_to_whom') ? 'has-error' : ''}}">
                                    <label for="if_yes_to_whom" class="control-label">{{ 'If "YES" by Whom ? and If "NO" when ?' }}</label>
                                    <input  class="form-control" name="if_yes_to_whom"  id="if_yes_to_whom" value="{{ $cellreport->if_yes_to_whom  }}" >
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-lg-8 col-md-8 col-sm-8 col-xs-8 {{ $errors->has('cell_leader_comment') ? 'has-error' : ''}}">
                                    <label for="cell_leader_comment" class="control-label">{{ 'Cell Leader Comment' }}</label>
                                    <textarea  class="form-control autosize" rows="100" name="cell_leader_comment" type="textarea" id="cell_leader_comment" >{{  $cellreport->cell_leader_comment }}</textarea>
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
                                    <textarea  class="form-control autosize" rows="100" type="textarea" >{{ $comment->message }}</textarea>
                                </div>
                            </div>
                            @endforeach
                            
                            <br><br>
                            <br><br>
                            <div class="row">
                                <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8 form-group">
                                    <form method="POST" autocomplete="off" action="{{ url('/member/cellreportcomments') }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
                                        {{ csrf_field() }}
                                        <input name="report_id" type="text" id="report_id" value="{{$cellreport->id}}" hidden>
                                        <div class="form-group ">
                                            <textarea required class="form-control autosize" name="message" rows="100" type="textarea" ></textarea>
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
