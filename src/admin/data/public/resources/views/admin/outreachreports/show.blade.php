@extends('layouts.admin')
@section('pageTitle',__('admin.outreachreports'))

@section('innerTitle')
     @lang('admin.outreachreport') - Date: {{ $report->created_at }}
@endsection

@section('breadcrumb')
    <li><a href="{{ route('admin.dashboard') }}">@lang('admin.dashboard')</a>
    </li>
    <li><a href="{{ url('/admin/outreachreports') }}">@lang('admin.outreachreports')</a>
    </li>
    <li><span>@lang('admin.outreachreports')</span>
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

                        <a href="{{ url('/admin/outreachreports') }}" title="@lang('admin.back')"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> @lang('admin.back')</button></a>
                        {{--<a href="{{ url('/admin/outreachreports/' . $report->id . '/edit') }}" title="@lang('admin.edit') report"><button class="btn btn-primary btn-sm"><i class="fa fa-edit" aria-hidden="true"></i> @lang('admin.edit')</button></a>--}}

                        {{--
                            <form method="POST" autocomplete="off" action="{{ url('admin/outreachreports' . '/' . $report->id) }}" accept-charset="UTF-8" style="display:inline">
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
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 form-group ">
                                    <label for="meeting_date" class="control-label">{{ 'Meeting Date' }}</label>
                                    <input   class="form-control date" name="meeting_date" type="text" id="meeting_date" value="{{ $report->meeting_date}}" >
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 form-group {{ $errors->has('meeting_location') ? 'has-error' : ''}}">
                                    <label for="meeting_location" class="control-label">{{ 'Meeting Location' }}</label>
                                    <input  class="form-control" name="meeting_location" id="meeting_location" value="{{ $report->meeting_location  }}" >
                                </div>
                            </div>
                  
                            <div class="row">
                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 form-group {{ $errors->has('did_you_have_soul_winning') ? 'has-error' : ''}}">
                                    <label for="did_you_have_soul_winning" class="control-label">{{ 'Did you have soul winning this week ?' }}</label>
                                    <input  class="form-control" name="did_you_have_soul_winning"  id="did_you_have_soul_winning" value="{{ $report->did_you_have_soul_winning  }}" >
            
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-lg-8 col-md-8 col-sm-8 col-xs-8 {{ $errors->has('if_yes_soul_winning_comment') ? 'has-error' : ''}}">
                                    <label for="if_yes_soul_winning_comment" class="control-label">{{ 'Comment if Yes' }}</label>
                                    <textarea  class="form-control" rows="100" name="if_yes_soul_winning_comment" type="textarea" id="if_yes_soul_winning_comment" >{{ $report->if_yes_soul_winning_comment }}</textarea>
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
                                    <textarea  class="form-control" rows="100" type="textarea" >{{ $comment->message }}</textarea>
                                </div>
                            </div>
                            @endforeach
                            <br><br>
                            <br><br>
                            <div class="row">
                                <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8 form-group">
                                    <form method="POST" autocomplete="off" action="{{ url('/admin/outreachreportcomments') }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
                                        {{ csrf_field() }}
                                        <input name="report_id" type="text" id="report_id" value="{{$report->id}}" hidden>
                                        <div class="form-group ">
                                            <textarea required class="form-control" name="message" rows="100" type="textarea" ></textarea>
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
