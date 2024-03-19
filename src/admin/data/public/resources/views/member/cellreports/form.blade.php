
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
    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 form-group {{ $errors->has('cell_secretary') ? 'has-error' : ''}}">
        <label for="cell_secretary" class="control-label">{{ 'Cell Secretary' }}</label>
        <input class="form-control" name="cell_secretary" id="cell_secretary" value="{{ old('cell_secretary',isset($report->cell_secretary) ? $report->cell_secretary : '') }}" >
    {!! $errors->first('cell_secretary', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="row">
    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 form-group {{ $errors->has('meeting_type_id') ? 'has-error' : ''}}">
        <label for="meeting_type_id" class="control-label">{{ 'Meeting Type' }}</label>
        <select  name="meeting_type_id" id="meeting_type_id" class="form-control">
            @foreach($meeting_types as $meeting_type)
            <option  value="{{ $meeting_type->id }}">{{ $meeting_type->name }} </option>
            @endforeach
        </select>
    {!! $errors->first('meeting_type_id', '<p class="help-block">:message</p>') !!}
    </div>
    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 form-group {{ $errors->has('reporter') ? 'has-error' : ''}}">
        <label for="reporter" class="control-label">{{ 'Reporter' }}</label>
        <input required disabled class="form-control" name="reporter" id="reporter" value="{{$user->name}} - <<{{$user->email}}>>" >
    {!! $errors->first('reporter', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="row">
    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 form-group ">
        <label for="meeting_date" class="control-label">{{ 'Meeting Date' }}</label>
        <input required  class="form-control date" name="meeting_date" type="text" id="meeting_date" value="{{ old('meeting_date',isset($report->meeting_date) ? \Illuminate\Support\Carbon::parse($report->meeting_date)->format('Y-m-d') : date('Y-m-d')) }}" >
        {!! $errors->first('meeting_date', '<p class="help-block">:message</p>') !!}
    </div>
    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2 form-group ">
        <label for="meeting_start_time" class="control-label">{{ 'Time Meeting Started' }}</label>
        <input required class="form-control" name="meeting_start_time" type="time" id="meeting_start_time" value="{{ old('meeting_start_time',isset($report->meeting_start_time) ? $report->meeting_start_time : date('H:i') ) }}" >
        {!! $errors->first('meeting_start_time', '<p class="help-block">:message</p>') !!}
    </div>
    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2 form-group ">
        <label for="meeting_end_time" class="control-label">{{ 'Time Meeting Ended' }}</label>
        <input required class="form-control" name="meeting_end_time" type="time" id="meeting_end_time" value="{{ old('meeting_end_time',isset($report->meeting_end_time) ? $report->meeting_end_time : date('H:i') ) }}" >
        {!! $errors->first('meeting_end_time', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="row">
    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 form-group {{ $errors->has('meeting_location') ? 'has-error' : ''}}">
        <label for="meeting_location" class="control-label">{{ 'Meeting Location' }}</label>
        <input required class="form-control" name="meeting_location" id="meeting_location" value="{{ old('meeting_location',isset($report->meeting_location) ? $report->meeting_location : '') }}" >
        {!! $errors->first('meeting_location', '<p class="help-block">:message</p>') !!}
    </div>
    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 form-group {{ $errors->has('total_meeting_attendance') ? 'has-error' : ''}}">
        <label for="total_meeting_attendance" class="control-label">{{ 'Total Meeting Attendance' }}</label>
        <input required class="form-control" name="total_meeting_attendance" type="number" min="0" id="total_meeting_attendance" value="{{ old('total_meeting_attendance',isset($report->total_meeting_attendance) ? $report->total_meeting_attendance : 0) }}" >
        {!! $errors->first('total_meeting_attendance', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="row">
    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2 form-group {{ $errors->has('total_cell_offerings') ? 'has-error' : ''}}">
        <label for="total_cell_offerings" class="control-label">{{ 'Cell Offerings' }}</label>
        <input required class="form-control" name="total_cell_offerings" type="number" min="0" id="total_cell_offerings" value="{{ old('total_cell_offerings',isset($report->total_cell_offerings) ? $report->total_cell_offerings : 0) }}" >
        {!! $errors->first('total_cell_offerings', '<p class="help-block">:message</p>') !!}
    </div>
    <div class="col-lg-4 col-md-3 col-sm-3 col-xs-3 form-group {{ $errors->has('have_cell_offering_remitted') ? 'has-error' : ''}}">
        <label for="have_cell_offering_remitted" class="control-label">{{ 'Have the Cell Offering been Remitted to church office ?' }}</label>
        <select name="have_cell_offering_remitted" class="form-control" id="have_cell_offering_remitted" >
            @foreach (json_decode('{"1":"'.__('admin.yes').'","0":"'.__('admin.no').'"}', true) as $optionKey => $optionValue)
                <option value="{{ $optionKey }}" {{ (isset($report->have_cell_offering_remitted) && $report->have_cell_offering_remitted == $optionKey) ? 'selected' : ''}}>{{ $optionValue }}</option>
            @endforeach
        </select>
        {!! $errors->first('have_cell_offering_remitted', '<p class="help-block">:message</p>') !!}
    </div>
    <div class="col-lg-2 col-md-3 col-sm-3 col-xs-3 form-group {{ $errors->has('if_yes_to_whom') ? 'has-error' : ''}}">
        <label for="if_yes_to_whom" class="control-label">{{ 'If "YES" by Whom, If "NO" why' }}</label>
        <input required class="form-control" name="if_yes_to_whom"  id="if_yes_to_whom" value="{{ old('if_yes_to_whom',isset($report->if_yes_to_whom) ? $report->if_yes_to_whom : '') }}" >
        {!! $errors->first('if_yes_to_whom', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="row">
    <div class="form-group col-lg-8 col-md-8 col-sm-8 col-xs-8 {{ $errors->has('cell_leader_comment') ? 'has-error' : ''}}">
        <label for="cell_leader_comment" class="control-label">{{ 'Cell Leader Comment' }}</label>
        <textarea class="form-control" rows="20" name="cell_leader_comment" type="textarea" id="cell_leader_comment" >{{ old('cell_leader_comment',isset($report->cell_leader_comment) ? $report->cell_leader_comment : '') }}</textarea>
        {!! $errors->first('cell_leader_comment', '<p class="help-block">:message</p>') !!}
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
