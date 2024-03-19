
<input name="event_id" type="text" id="event_id" value="{{$event->id}}" hidden>

<div class="row">
    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 form-group {{ $errors->has('church_id') ? 'has-error' : ''}}">
        <label for="church_id" class="control-label">{{ 'Church branch' }}</label>
        <select  name="church_id" id="church_id" class="form-control">
            <option  value="{{ $church_branch->id }}">{{ $church_branch->name }} </option>
        </select>
    {!! $errors->first('church_id', '<p class="help-block">:message</p>') !!}
    </div>
    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 form-group {{ $errors->has('cell_id') ? 'has-error' : ''}}">
        <label for="cell_id" class="control-label">{{ 'Cell/Group' }}</label>
        <select  name="cell_id" id="cell_id" class="form-control">
            <option  value="{{ $cell->id }}">{{ $cell->name }} </option>
        </select>        
    {!! $errors->first('cell_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="row">
    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 form-group {{ $errors->has('cell_leader_id') ? 'has-error' : ''}}">
        <label for="cell_leader_id" class="control-label">{{ 'Cell Leader' }}</label>
        <select  name="cell_leader_id" id="cell_leader_id" class="form-control">
            @foreach($cell_leaders as $cell_leader)
            @if(!is_null($cell_leader))
            <option value="{{ $cell_leader->id }}">{{ $cell_leader->name }} - {{ $cell_leader->email }} </option>
            @endif
            @endforeach
        </select>
    {!! $errors->first('cell_leader_id', '<p class="help-block">:message</p>') !!}
    </div>
    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 form-group {{ $errors->has('reporter') ? 'has-error' : ''}}">
        <label for="reporter" class="control-label">{{ 'Reporter' }}</label>
        <input required disabled class="form-control" name="reporter" id="reporter" value="{{$user->name}} - <<{{$user->email}}>>" >
    {!! $errors->first('reporter', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="row">


</div>

<div class="row">
    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 form-group {{ $errors->has('total_mid_week_service_attendance') ? 'has-error' : ''}}">
        <label for="total_mid_week_service_attendance" class="control-label">{{ 'Total Mid-Week Service Attendance' }}</label>
        <input required class="form-control" name="total_mid_week_service_attendance" type="number" min="0" id="total_mid_week_service_attendance" value="{{ old('total_mid_week_service_attendance',isset($report->total_mid_week_service_attendance) ? $report->total_mid_week_service_attendance : 0) }}" >
        {!! $errors->first('total_mid_week_service_attendance', '<p class="help-block">:message</p>') !!}
    </div>
    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 form-group {{ $errors->has('total_sunday_week_service_attendance') ? 'has-error' : ''}}">
        <label for="total_sunday_week_service_attendance" class="control-label">{{ 'Total Sunday Service Attendance' }}</label>
        <input required class="form-control" name="total_sunday_week_service_attendance" type="number" min="0" id="total_sunday_week_service_attendance" value="{{ old('total_sunday_week_service_attendance',isset($report->total_sunday_week_service_attendance) ? $report->total_sunday_week_service_attendance : 0) }}" >
        {!! $errors->first('total_sunday_week_service_attendance', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="row">
    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 form-group {{ $errors->has('total_first_timer') ? 'has-error' : ''}}">
        <label for="total_first_timer" class="control-label">{{ 'Total First-Timers' }}</label>
        <input required class="form-control" name="total_first_timer" type="number" min="0" id="total_first_timer" value="{{ old('total_first_timer',isset($report->total_first_timer) ? $report->total_first_timer : 0) }}" >
        {!! $errors->first('total_first_timer', '<p class="help-block">:message</p>') !!}
    </div>
    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 form-group {{ $errors->has('total_new_converts') ? 'has-error' : ''}}">
        <label for="total_new_converts" class="control-label">{{ 'Total New Converts' }}</label>
        <input required class="form-control" name="total_new_converts" type="number" min="0" id="total_new_converts" value="{{ old('total_new_converts',isset($report->total_new_converts) ? $report->total_new_converts : 0) }}" >
        {!! $errors->first('total_new_converts', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="row">
    <div class="form-group col-lg-8 col-md-8 col-sm-8 col-xs-8 {{ $errors->has('cell_leader_comment') ? 'has-error' : ''}}">
        <label for="cell_leader_comment" class="control-label">{{ 'Cell Leader Comment' }}</label>
        <textarea class="form-control" rows="20" name="cell_leader_comment" type="textarea" id="cell_leader_comment" >{{ old('cell_leader_comment',isset($report->cell_leader_comment) ? $report->cell_leader_comment : '') }}</textarea>
        {!! $errors->first('cell_leader_comment', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<h4>{{'WEEKLY FOLLOW REPORT'}}</h4>

<div class="row">
    <div class="form-group col-lg-8 col-md-8 col-sm-8 col-xs-8 {{ $errors->has('name_of_the_souls') ? 'has-error' : ''}}">
        <label for="name_of_the_souls" class="control-label">{{ 'Name of the Soul(s)' }}</label>
        <textarea class="form-control" rows="60" name="name_of_the_souls" type="textarea" id="name_of_the_souls" >{{ old('name_of_the_souls',isset($report->name_of_the_souls) ? $report->name_of_the_souls : '') }}</textarea>
        {!! $errors->first('name_of_the_souls', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="row">
    <div class="form-group col-lg-8 col-md-8 col-sm-8 col-xs-8 {{ $errors->has('summary_report') ? 'has-error' : ''}}">
        <label for="summary_report" class="control-label">{{ 'Summary Report' }}</label>
        <textarea  class="form-control" rows="60" name="summary_report" type="textarea" id="summary_report" >{{ old('summary_report',isset($report->summary_report) ? $report->summary_report : '') }}</textarea>
        {!! $errors->first('summary_report', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="row">
    <div class="form-group col-lg-8 col-md-8 col-sm-8 col-xs-8 {{ $errors->has('who_did_the_follow_up') ? 'has-error' : ''}}">
        <label for="who_did_the_follow_up" class="control-label">{{ 'Who did the follow up?' }}</label>
        <textarea  class="form-control" rows="60" name="who_did_the_follow_up" type="textarea" id="who_did_the_follow_up" >{{ old('who_did_the_follow_up',isset($report->who_did_the_follow_up) ? $report->who_did_the_follow_up : '') }}</textarea>
        {!! $errors->first('who_did_the_follow_up', '<p class="help-block">:message</p>') !!}
    </div>
</div>
{{--
@if($formMode=='create')

    <div class="panel-body no-padding">
        <div id="dropzone" class="dropmail">
            <div class="dropzone dropzone-custom needsclick" id="my-dropzone">
                <div class="dz-message needsclick download-custom">
                    <i class="fa fa-cloud-download" aria-hidden="true"></i>
                    <h1>@lang('admin.files')</h1>
                    <h2>@lang('admin.upload-info')</h2>
                </div>
            </div>
        </div>
    </div>
@endif
--}}
<br>
<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? __('site.save') : __('site.create') }}">
</div>
