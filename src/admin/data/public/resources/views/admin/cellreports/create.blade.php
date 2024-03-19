@extends('layouts.admin')
@section('pageTitle',__('admin.report'))

@section('innerTitle')
    @lang('site.create-new') @lang('admin.report')
@endsection

@section('breadcrumb')
    <li><a href="{{ route('admin.dashboard') }}">@lang('admin.dashboard')</a>
    </li>
    <li><a href="{{ url('/admin/events') }}">@lang('admin.events')</a>
    </li>
    <li><span>@lang('site.create-new') @lang('admin.report')</span>
    </li>
@endsection

@section('content')
    <div class="single-pro-review-area mt-t-30 mg-b-15">
        <div class="card card-primary">
            @if($event->name!="")
            <div class="card-header">
                <h4>Event/Meeting</h4>
            </div>
            <div class="card-body form-content">
                <h6>Title: {{ $event->name }} &nbsp; &nbsp; &nbsp; Date: {{ \Carbon\Carbon::parse($event->event_date)->format('D d/M/Y') }} &nbsp; &nbsp; &nbsp; Description: {{$event->description}}</h6>
            </div>
            @endif           
        </div>
    </div>
    <div class="single-pro-review-area mt-t-30 mg-b-15">
        <div class="container-fluid">
            <div class="product-payment-inner-st form-content">
                <form method="POST" autocomplete="off" action="{{ url('/admin/cellreports') }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    @include ('admin.cellreports.form', ['formMode' => 'create' ])
                </form>
            </div>
        </div>
    </div>
@endsection

@section('header')
    <link href="{{ asset('vendor/pickadate/themes/default.date.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/pickadate/themes/default.time.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/pickadate/themes/default.css') }}" rel="stylesheet">
@endsection

@section('footer')
    <script src="{{ asset('themes/main/js/dropzone/dropzone.js') }}"></script>
    <script src="{{ asset('vendor/pickadate/picker.js') }}" type="text/javascript"></script>
    <script src="{{ asset('vendor/pickadate/picker.date.js') }}" type="text/javascript"></script>
    <script src="{{ asset('vendor/pickadate/picker.time.js') }}" type="text/javascript"></script>
    <script src="{{ asset('vendor/pickadate/legacy.js') }}" type="text/javascript"></script>
    <script type="text/javascript">
        $('.date').pickadate({
            format: 'yyyy-mm-dd'
        });
    </script>
@endsection
@section('header')
    <link rel="stylesheet" href="{{ asset('themes/main/css/dropzone/dropzone.css') }}">
@endsection