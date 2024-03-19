<div class="form-group {{ $errors->has('role_id') ? 'has-error' : ''}}">
    <label for="role_id" class="control-label">@lang('admin.platformrole')</label>
    <select required  name="role_id" class="form-control" id="role_id">
         @foreach(\App\Role::get() as $role)
            @if($role->role != "Admin")
                <option value="{{ $role->id }}" {{ ((null !== old('role_id',@$member->role_id)) && old('role_id',@$member->role_id) == $role->id) ? 'selected' : ''}}>{{ $role->role }}</option>
            @endif
         @endforeach 
    </select>
    {!! $errors->first('role_id', '<p class="help-block">:message</p>') !!}
    <p class="help-block">@lang('admin.role-text')</p>
</div>
<hr><hr><hr>
<div class="form-group {{ $errors->has('title_id') ? 'has-error' : ''}}">
    <label for="title_id" class="control-label">@lang('admin.title')</label>
    <select required  name="title_id" class="form-control" id="title_id">
         @foreach(\App\Title::get() as $title)
         <option value="{{ $title->id }}" {{ ((null !== old('title_id',@$member->title_id)) && old('title_id',@$member->title_id) == $title->id) ? 'selected' : ''}}>{{ $title->name }}</option>
         @endforeach 
    </select>
    {!! $errors->first('title_id', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
    <label for="name" class="control-label">@lang('admin.name')</label>
    <input required class="form-control" name="name" type="text" id="name" value="{{ old('name',isset($member->name) ? $member->name : '') }}" >
    {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('surname') ? 'has-error' : ''}}">
    <label for="surname" class="control-label">@lang('admin.surname')</label>
    <input required class="form-control" name="surname" type="text" id="surname" value="{{ old('surname',isset($member->surname) ? $member->surname : '') }}" >
    {!! $errors->first('surname', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('email') ? 'has-error' : ''}}">
    <label for="email" class="control-label">@lang('admin.email')</label>
    <input  class="form-control" name="email" type="text" id="email" value="{{ old('email',isset($member->email) ? $member->email : '') }}" >
    {!! $errors->first('email', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('password') ? 'has-error' : ''}}">
    <label for="password" class="control-label">@lang('admin.password')
        @if($formMode=='edit') (@lang('admin.password-hint'))     @endif
    </label>
    <input @if($formMode=='create')  @endif class="form-control" name="password" type="password" id="password" value="{{ old('password')  }}" >
    {!! $errors->first('password', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('church_id') ? 'has-error' : ''}}">
    <label for="church_id" class="control-label">@lang('admin.church')</label>
    <select required  name="church_id" class="form-control" id="church_id">
         @foreach(\App\Church::get() as $church)
                <option value="{{ $church->id }}" {{ ((null !== old('church_id',@$member->church_id)) && old('church_id',@$member->church_id) == $church->id) ? 'selected' : ''}}>{{ $church->name }}</option>
         @endforeach 
    </select>
    {!! $errors->first('church_id', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group">
    <label for="departments">@lang('admin.departments') / Cells</label>
    @if($formMode === 'edit')
    <select required multiple name="departments[]" id="departments" class="form-control select2">
        <option></option>
        @foreach(\App\Department::get() as $department)
            <option  @if( (is_array(old('departments')) && in_array(@$department->id,old('departments')))  || (null === old('departments')  && $member->departments()->where('department_id',$department->id)->first() ))
               selected
                @endif
                value="{{ $department->id }}">{{ $department->name }}</option>
            @endforeach
    </select>
        @else
        <select required multiple name="departments[]" id="departments" class="form-control select2">
            <option></option>
            @foreach(\App\Department::get() as $department)
                <option @if(is_array(old('departments')) && in_array(@$department->id,old('departments'))) selected @endif value="{{ $department->id }}">{{ $department->name }}</option>
            @endforeach
        </select>
    @endif
</div>
{{--
<div class="form-group {{ $errors->has('function_id') ? 'has-error' : ''}}">
    <label for="function_id" class="control-label">@lang('admin.function')</label>
    <select required  name="function_id" class="form-control" id="function_id">
        
        @foreach(\App\Fonction::get() as $function)
                <option value="{{ $function->id }}" {{ ((null !== old('function_id',@$member->function_id)) && old('function_id',@$function->function_id) == $function->id) ? 'selected' : ''}}>{{ $function->name }}</option>
        @endforeach 
         
    </select>
    {!! $errors->first('function_id', '<p class="help-block">:message</p>') !!}
</div>
--}}
<div class="form-group {{ $errors->has('telephone') ? 'has-error' : ''}}">
    <label for="telephone" class="control-label">@lang('admin.telephone')</label>
    <input  class="form-control" name="telephone" type="text" id="telephone" value="{{ old('telephone',isset($member->telephone) ? $member->telephone : '') }}" >
    {!! $errors->first('telephone', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('gender') ? 'has-error' : ''}}">
    <label for="gender" class="control-label">@lang('admin.gender')</label>
    <select required  name="gender" class="form-control" id="gender">
        <option></option>
        @foreach (getGenders() as $optionKey => $optionValue)
            <option value="{{ $optionKey }}" {{ ((null !== old('gender',@$member->gender)) && old('gender',@$member->gender) == $optionKey) ? 'selected' : ''}}>{{ $optionValue }}</option>
        @endforeach
    </select>
    {!! $errors->first('gender', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group {{ $errors->has('status') ? 'has-error' : ''}}">
    <label for="status" class="control-label">@lang('admin.status')</label>
    <select required  name="status" class="form-control" id="status">
        <option></option>
        @foreach (json_decode('{"1":"'.__('admin.enabled').'","2":"'.__('admin.disabled').'"}', true) as $optionKey => $optionValue)
            <option value="{{ $optionKey }}" {{ ((null !== old('status',@$member->status)) && old('status',@$member->status) == $optionKey) ? 'selected' : ''}}>{{ $optionValue }}</option>
        @endforeach
    </select>
    {!! $errors->first('status', '<p class="help-block">:message</p>') !!}
</div>
{{--
<div class="form-group {{ $errors->has('about') ? 'has-error' : ''}}">
    <label for="about" class="control-label">@lang('admin.about')</label>
    <textarea class="form-control" rows="5" name="about" type="textarea" id="about" >{{ old('about',isset($member->about) ? $member->about : '') }}</textarea>
    {!! $errors->first('about', '<p class="help-block">:message</p>') !!}
</div>
--}}

@foreach(\App\Field::orderBy('sort_order','asc')->get() as $field)
@php
if(isset($member)){
$value = old($field->id,($member->fields()->where('field_id',$field->id)->first()) ? $member->fields()->where('field_id',$field->id)->first()->pivot->value:'');

}
else{
$value='';
}
@endphp
    @if($field->type=='text')
        <div class="form-group{{ $errors->has($field->id) ? ' has-error' : '' }}">
            <label for="{{ $field->id }}">{{ $field->name }}:</label>
            <input placeholder="{{ $field->placeholder }}" @if(!empty($field->required))required @endif  type="text" class="form-control" id="{{ $field->id }}" name="{{ $field->id }}" value="{{ $value }}">
            @if ($errors->has($field->id))
                <span class="help-block">
                                            <strong>{{ $errors->first($field->id) }}</strong>
                                        </span>
            @endif
        </div>
    @elseif($field->type=='select')
        <div class="form-group{{ $errors->has($field->id) ? ' has-error' : '' }}">
            <label for="{{ $field->id }}">{{ $field->name }}:</label>
            <?php
            $options = nl2br($field->options);
            $values = explode('<br />',$options);
            $selectOptions = [];
            foreach($values as $value2){
                $selectOptions[$value2]=trim($value2);
            }
            ?>
            {{ Form::select($field->id, $selectOptions,$value,['placeholder' => $field->placeholder,'class'=>'form-control']) }}
            @if ($errors->has($field->id))
                <span class="help-block">
                                        <strong>{{ $errors->first($field->id) }}</strong>
                                    </span>

            @endif
        </div>
    @elseif($field->type=='textarea')
        <div class="form-group{{ $errors->has($field->id) ? ' has-error' : '' }}">
            <label for="{{ $field->id }}">{{ $field->name }}:</label>
            <textarea placeholder="{{ $field->placeholder }}" class="form-control" name="{{ $field->id }}" id="{{ $field->id }}" @if(!empty($field->required))required @endif  >{{ $value }}</textarea>
            @if ($errors->has($field->id))
                <span class="help-block">
                                            <strong>{{ $errors->first($field->id) }}</strong>
                                        </span>
            @endif
        </div>
    @elseif($field->type=='checkbox')
        <div class="checkbox">
            <label>
                <input name="{{ $field->id }}" type="checkbox" value="1" @if($value==1) checked @endif> {{ $field->name }}
            </label>
        </div>

    @elseif($field->type=='radio')
        <?php
        $options = nl2br($field->options);
        $values = explode('<br />',$options);
        $radioOptions = [];
        foreach($values as $value3){
            $radioOptions[$value3]=trim($value3);
        }
        ?>
        <h5><strong>{{ $field->name }}</strong></h5>
        @foreach($radioOptions as $value2)
            <div class="radio">
                <label>
                    <input type="radio" @if($value==$value2) checked @endif  name="{{ $field->id }}" id="{{ $field->id }}-{{ $value2 }}" value="{{ $value2 }}" >
                    {{ $value2 }}
                </label>
            </div>
        @endforeach
    @endif


@endforeach

<div class="row">
    <div class="col-md-6">
        <div class="form-group {{ $errors->has('picture') ? 'has-error' : ''}}">
            <label for="picture" class="control-label">@if($formMode=='edit')@lang('admin.change')    @endif @lang('admin.picture')</label>


            <input class="form-control" name="picture" type="file" id="picture" value="{{ isset($member->picture) ? $member->picture : ''}}" >
            {!! $errors->first('picture', '<p class="help-block">:message</p>') !!}
        </div>

    </div>
    <div class="col-md-6">
    @if($formMode==='edit' && !empty($member->picture))

           <div><img src="{{ asset($member->picture) }}" style="max-width: 300px" /></div> <br/>
            <a onclick="return confirm('@lang('admin.delete-prompt')')" class="btn btn-danger" href="{{ route('members.remove-picture',['id'=>$member->id]) }}"><i class="fa fa-trash"></i> @lang('admin.delete') @lang('admin.picture')</a>

    @endif
    </div>
</div>




<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? __('site.update') : __('site.create') }}">
</div>
