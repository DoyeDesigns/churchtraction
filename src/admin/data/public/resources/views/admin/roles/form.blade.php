<div class="form-group ">
    <label for="role" class="control-label">@lang('admin.name')</label>
    <input  required class="form-control" name="role" type="text" id="role" value="{{ isset($role->role) ? $role->role : ''}}" >
    {!! $errors->first('role', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('description') ? 'has-error' : ''}}">
    <label for="description" class="control-label">@lang('admin.description')</label>
    <textarea class="form-control " rows="5" name="description" type="textarea" id="description" >{{ isset($role->description) ? clean($role->description) : ''}}</textarea>
    {!! $errors->first('description', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? __('admin.update') : __('admin.create') }}">
</div>
