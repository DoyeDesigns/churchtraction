<div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
    <label for="name" class="control-label">@lang('admin.event') @lang('admin.name')</label>
    <input placeholder="@lang('admin.event-placeholder')" class="form-control" name="name" type="text" id="name" value="{{ old('event',isset($event->name) ? $event->name : '') }}" >
    {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
</div>

<div  class="checkbox">
    <label>
        <input type="hidden" name="repetitive" value="0">
        <input @if(old('repetitive',isset($event->repetitive) ? checked : ''))==1)  @endif class="repetitive"  type="checkbox" name="repetitive" id="repetitive" value="0"> @lang('admin.repetitive') 
        <i  data-toggle="tooltip" data-placement="top" title="@lang('repetitive')" class="fa fa-question-circle"></i>
    </label>
</div>
<div class="frequency" name="frequency" id="frequency">
    <div class="form-group {{ $errors->has('frequency') ? 'has-error' : ''}}">
        <div style="display: flex; flex-direction: row;">
            <label for="repetition" style="margin-top: 10px;margin-right: 10px">@lang('admin.each')</label>
            <input style="max-width: 10%; margin-right: 10px" type="number" min=1 name="repetition" value="1" class="form-control">
            <select style="max-width: 20%;" class="form-control">
                <option value="1">@lang('admin.week')</option>
            </select>
        </div>
    </div>
    <div class="form-group event_days" id="event_days" >
        <label for="days">@lang('admin.days')</label>
        <select class="select2 form-control" name="days[]" id="days" multiple>
            @foreach($days as $day)
                @if($formMode === 'edit')
                    <option @if( (is_array(old('days')) && in_array(@$day,old('days')))  || (null === old('days') )) selected @endif value="{{ $day }}" >{{ $day }}</option>
                @else
                    <option value="{{ $day }}" >{{ $day}} </option>
                @endif
            @endforeach        
        </select>  
    </div>
</div>
<div class="event_date form-group {{ $errors->has('event_date') ? 'has-error' : ''}}">
    <label for="event_date" class="control-label">@lang('admin.event') @lang('admin.date')</label>
    <input   class="form-control date" name="event_date" type="text" id="event_date" value="{{ old('event_date',isset($event->event_date) ? \Illuminate\Support\Carbon::parse($event->event_date)->format('Y-m-d') : '') }}" >
    {!! $errors->first('event_date', '<p class="help-block">:message</p>') !!}
</div>

<div style="display: flex; flex-direction: row;">
    <div style="width: 50%; margin-right: 20px" class="form-group frequency {{ $errors->has('from_date') ? 'has-error' : ''}}">
        <label for="from_date" class="control-label"> @lang('admin.datefrom')</label>
        <input class="form-control date" name="from_date" type="text" id="from_date" value="{{ old('from_date',isset($event->from_date) ? \Illuminate\Support\Carbon::parse($event->from_date)->format('Y-m-d') : '') }}" >
        {!! $errors->first('from_date', '<p class="help-block">:message</p>') !!}
    </div>

    <div style="width: 50%;" class="form-group frequency {{ $errors->has('to_date') ? 'has-error' : ''}}">
        <label for="to_date" class="control-label"> @lang('admin.dateto')</label>
        <input class="form-control date" name="to_date" type="text" id="to_date" value="{{ old('to_date',isset($event->to_date) ? \Illuminate\Support\Carbon::parse($event->to_date)->format('Y-m-d') : '') }}" >
        {!! $errors->first('to_date', '<p class="help-block">:message</p>') !!}
    </div>
</div>


<div class="form-group {{ $errors->has('venue') ? 'has-error' : ''}}">
    <label for="venue" class="control-label">@lang('admin.venue') (@lang('admin.optional'))</label>
    <textarea class="form-control" rows="5" name="venue" type="textarea" id="venue" >{{ old('venue',isset($event->venue) ? $event->venue : '') }}</textarea>
    {!! $errors->first('venue', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('description') ? 'has-error' : ''}}">
    <label for="description" class="control-label">@lang('admin.description') (@lang('admin.optional'))</label>
    <textarea class="form-control" rows="5" name="description" type="textarea" id="description" >{{ old('description',isset($event->description) ? $event->description : '') }}</textarea>
    {!! $errors->first('description', '<p class="help-block">:message</p>') !!}
</div>

{{--<div  class="checkbox">
    <label>
        <input type="hidden" name="notifications" value="0">
        <input @if(old('notifications',isset($event->notifications) ? $event->notifications : ''))==1) checked @endif type="checkbox" name="notifications" id="notifications" value="1"> @lang('admin.enable-notifications') <i  data-toggle="tooltip" data-placement="top" title="@lang('admin.enable-notifications-hint')" class="fa fa-question-circle"></i>
    </label>
</div>--}}

{{--<div  class="checkbox">
    <label>
        <input type="hidden" name="accept_volunteers" value="0">
        <input @if(old('accept_volunteers',isset($event->accept_volunteers) ? $event->accept_volunteers : ''))==1) checked @endif type="checkbox" name="accept_volunteers" id="accept_volunteers" value="1"> @lang('admin.accept-volunteers') <i  data-toggle="tooltip" data-placement="top" title="@lang('admin.accept-volunteers-hint')" class="fa fa-question-circle"></i>
    </label>
</div>--}}


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? __('site.update') : __('site.create') }}">
</div>
