@extends('layouts.admin')
@section('pageTitle',__('admin.member').': '.$member->name)

@section('innerTitle')
     @lang('admin.members') : {{ $member->name }}
@endsection

@section('breadcrumb')
    <li><a href="{{ route('admin.dashboard') }}">@lang('admin.dashboard')</a>
    </li>
    <li><a href="{{ url('/admin/members') }}">@lang('admin.members')</a>
    </li>
    <li><span>@lang('admin.member')</span>
    </li>
@endsection

@section('content')


    <a href="{{ prevPage() }}" title="@lang('admin.back')"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> @lang('admin.back')</button></a>


    <br><br>
    <div class="card author-box card-primary">
        <div class="card-body">
            <div class="row">
                <div class="col-md-4 mb-5">
                    <div class="author-box-left"  >
                        <div class="gallery gallery-fw" data-item-height="250">
                            <div class="gallery-item" style="width: 250px; float: none;" data-image="{{ profilePicture($member->id) }}" data-title="Image 1"></div>
                        </div>
                        <div class="clearfix"></div>
                        <a href="{{ url('/admin/members/' . $member->id . '/edit') }}" class="btn btn-primary mt-3"><i class="fas fa-edit"></i> @lang('admin.edit')</a>
                        <a  onclick="$('#delform').submit()" href="#" class="btn btn-danger mt-3"><i class="fa fa-trash"></i> @lang('admin.delete')</a>

                        <form onsubmit="return confirm('@lang('site.confirm-delete')')" id="delform" method="POST" autocomplete="off" action="{{ url('admin/members' . '/' . $member->id) }}" accept-charset="UTF-8" style="display:inline">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                        </form>
                    </div>

                </div>
                <div class="col-md-7">
                    <div class="author-box-details_">
                        <div class="author-box-name">
                            <a href="#">{{ $member->name }} {{ $member->surname }}</a>
                        </div>
                        <div class="author-box-job">{{ gender($member->gender) }}</div>
                        <div class="author-box-description">
                            <p>{!! linkify(nl2br(clean($member->about))) !!}</p>
                        </div>

                        <div >

                            <div class="mb-2 mt-3"><div class="text-small font-weight-bold">@lang('admin.email')</div>
                                {{ $member->email }}
                            </div>

                            <div class="mb-2 mt-3"><div class="text-small font-weight-bold">@lang('admin.departments')</div>
                                <ul class="comma-tags">
                                    @foreach($member->departments as $department)
                                        <li>{{ $department->name }}</li>
                                    @endforeach
                                </ul>
                            </div>

                            <div class="mb-2 mt-3"><div class="text-small font-weight-bold">@lang('admin.telephone')</div>
                                {{ $member->telephone }}
                            </div>

                            <div class="mb-2 mt-3"><div class="text-small font-weight-bold">@lang('admin.gender')</div>
                                {{ gender($member->gender) }}
                            </div>
                            @foreach(\App\Field::orderBy('sort_order','asc')->get() as $field)

                            <div class="mb-2 mt-3"><div class="text-small font-weight-bold"> {{ $field->name }}</div>


                                <?php
                                $value = $member->fields()->where('field_id',$field->id)->first() ? $member->fields()->where('field_id',$field->id)->first()->pivot->value:'';

                                ?>
                                @if($field->type=='checkbox')
                                    {{ boolToString($value) }}
                                @else
                                    {!! linkify(nl2br(clean($value ))) !!}
                                @endif

                            </div>
                            @endforeach



                        </div>




                    </div>

                </div>
            </div>


        </div>
    </div>





@endsection

@section('header')

 <link rel="stylesheet" href="{{ asset('themes/admin/assets/modules/chocolat/dist/css/chocolat.css') }}">
@endsection

@section('footer')
    <script src="{{ asset('themes/admin/assets/modules/chocolat/dist/js/jquery.chocolat.min.js') }}"></script>
@endsection
