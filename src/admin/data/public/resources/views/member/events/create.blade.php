@extends('layouts.member')
@section('pageTitle',__('admin.events'))

@section('innerTitle')
    @lang('site.create-new') @lang('admin.event')
@endsection

@section('breadcrumb')
    <li><a href="{{ route('member.dashboard') }}">@lang('admin.dashboard')</a>
    </li>
    <li><a href="{{ url('/member/events') }}">@lang('admin.events')</a>
    </li>
    <li><span>@lang('site.create-new') @lang('admin.event')</span>
    </li>
@endsection

@section('content')
    <div class="single-pro-review-area mt-t-30 mg-b-15">


        <div class="container-fluid">
            <div class="product-payment-inner-st form-content">


            <form method="POST" autocomplete="off" action="{{ url('/member/events') }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
                {{ csrf_field() }}
                @include ('member.events.form', ['formMode' => 'create', 'days' => ["monday", "tuesday", "wednesday", "thursday", "friday", "sathurday", "sunday"] ])

            </form>

            


            </div>
        </div>


    </div>

@endsection

@section('header')
    <link href="{{ asset('vendor/pickadate/themes/default.date.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/pickadate/themes/default.time.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/pickadate/themes/default.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('vendor/select2/css/select2.min.css') }}">
@endsection


@section('footer')
    <script src="{{ asset('vendor/pickadate/picker.js') }}" type="text/javascript"></script>
    <script src="{{ asset('vendor/pickadate/picker.date.js') }}" type="text/javascript"></script>
    <script src="{{ asset('vendor/pickadate/picker.time.js') }}" type="text/javascript"></script>
    <script src="{{ asset('vendor/pickadate/legacy.js') }}" type="text/javascript"></script>
    <script type="text/javascript">
        $('.date').pickadate({
            format: 'yyyy-mm-dd'
        });
    </script>
    <script src="{{ asset('vendor/select2/js/select2.min.js') }}"></script>
    <script type="text/javascript">
        $(function(){
            $('.select2').select2();
            $('.frequency').hide();
            $('.repetitive').change(function() {
                if(this.checked) {
                    $('.frequency').show();
                    $('.event_date').hide();
                    $('#repetitive').val(1);

                }else{
                    $('.frequency').hide();
                    $('.event_date').show();
                    $('#repetitive').val(0);
                }
            })

        });

    </script>
@endsection

