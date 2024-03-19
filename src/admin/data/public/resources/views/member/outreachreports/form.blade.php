
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
    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 form-group ">
        <label for="meeting_date" class="control-label">{{ 'Meeting Date' }}</label>
        <input required  class="form-control date" name="meeting_date" type="text" id="meeting_date" value="{{ old('meeting_date',isset($report->meeting_date) ? \Illuminate\Support\Carbon::parse($report->meeting_date)->format('Y-m-d') : date('Y-m-d')) }}" >
        {!! $errors->first('meeting_date', '<p class="help-block">:message</p>') !!}
    </div>
    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 form-group {{ $errors->has('meeting_location') ? 'has-error' : ''}}">
        <label for="meeting_location" class="control-label">{{ 'Meeting Location' }}</label>
        <input required class="form-control" name="meeting_location" id="meeting_location" value="{{ old('meeting_location',isset($report->meeting_location) ? $report->meeting_location : '') }}" >
        {!! $errors->first('meeting_location', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="row">
    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 form-group {{ $errors->has('did_you_have_soul_winning') ? 'has-error' : ''}}">
        <label for="did_you_have_soul_winning" class="control-label">{{ 'Did you have soul winning this week ?' }}</label>
        <select name="did_you_have_soul_winning" class="form-control" id="did_you_have_soul_winning" >
            @foreach (json_decode('{"1":"'.__('admin.yes').'","0":"'.__('admin.no').'"}', true) as $optionKey => $optionValue)
                <option value="{{ $optionKey }}" {{ (isset($report->did_you_have_soul_winning) && $report->did_you_have_soul_winning == $optionKey) ? 'selected' : ''}}>{{ $optionValue }}</option>
            @endforeach
        </select>        
        {!! $errors->first('did_you_have_soul_winning', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="row">
    <div class="form-group col-lg-8 col-md-8 col-sm-8 col-xs-8 {{ $errors->has('if_yes_soul_winning_comment') ? 'has-error' : ''}}">
        <label for="if_yes_soul_winning_comment" class="control-label">{{ 'Comment if Yes' }}</label>
        <textarea  class="form-control" rows="20" name="if_yes_soul_winning_comment" type="textarea" id="if_yes_soul_winning_comment" >{{ old('if_yes_soul_winning_comment',isset($report->if_yes_soul_winning_comment) ? $report->if_yes_soul_winning_comment : '') }}</textarea>
        {!! $errors->first('if_yes_soul_winning_comment', '<p class="help-block">:message</p>') !!}
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
