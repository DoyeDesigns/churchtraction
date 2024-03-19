@extends('layouts.site')
@section('pageTitle',setting('general_homepage_title'))
@section('innerTitle',setting('general_homepage_title'))

@section('content')


        @guest
        <div class="row">
           
            <div class="col-md-12">

                @guest


                    <div class="card">

                        <div class="card-body">
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true"><i class="fa fa-sign-in-alt"></i> @lang('site.login')</a>
                                </li>
                                @if(setting('general_enable_registration')==1)
                                    <li class="nav-item">
                                        <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false"><i class="fa fa-user-plus"></i> @lang('site.register')</a>
                                    </li>
                                @endif
                            </ul>
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                    <br>
                                    <form method="POST" autocomplete="off" action="{{ route('login') }}">
                                        @csrf
                                        <div class="row">
                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                <div class="review-content-section">
                                                    <div class="row">
                                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                            <div class="devit-card-custom">
                                                                <div class="form-group">
                                                                    <input id="login_email"  type="text" placeholder="@lang('site.email')" class="form-control  @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                                                    @error('email')
                                                                    <p class="help-block" >
                                                                        <strong>{{ $message }}</strong>
                                                                    </p>
                                                                    @enderror
                                                                </div>
                                                                <div class="form-group">
                                                                    <input id="login_password"  type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="@lang('site.password')">

                                                                    @error('password')
                                                                    <p class="help-block" >
                                                                        <strong>{{ $message }}</strong>
                                                                    </p>
                                                                    @enderror
                                                                </div>
                                                                <div class="form-group row">
                                                                    <div class="col-md-12">



                                                                        <div class="form-check">
                                                                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                                                            <label class="form-check-label" for="remember">
                                                                                @lang('site.remember-me')
                                                                            </label>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <button type="submit" class="btn btn-primary btn-block">@lang('site.login')</button>
                                                                <br/>
                                                                <div   >
                                                                    @if(setting('social_enable_facebook')==1)
                                                                        <div   style="margin-bottom: 20px">
                                                                            <a style="margin-top: 0px" class="btn social-btn btn-primary btn-sm btn-block  rounded" href="{{ route('social.login',['network'=>'facebook']) }}"><i class="fab fa-facebook-square"></i> @lang('site.login-facebook')</a>
                                                                        </div>
                                                                    @endif

                                                                    @if(setting('social_enable_google')==1)
                                                                        <div  >
                                                                            <a style="margin-top: 0px"  class="btn social-btn btn-danger  btn-sm  btn-block rounded" href="{{ route('social.login',['network'=>'google']) }}"><i class="fab fa-google"></i> @lang('site.login-google')</a>

                                                                        </div>
                                                                    @endif

                                                                </div>
                                                                @if (Route::has('password.request'))
                                                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                                                        @lang('site.forgot-password')
                                                                    </a>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                             
                            </div>
                        </div>
                    </div>


                @endguest
            </div>
        </div>
        @else
            @include('site.includes.dashboard')
        @endauth


@endsection

@section('header')
    <link rel="stylesheet" href="{{ asset('vendor/intl-tel-input/build/css/intlTelInput.css') }}">

    <style>
        .iti-flag {background-image: url("{{ asset('vendor/intl-tel-input/build/img/flags.png') }}");}

        @media only screen and (-webkit-min-device-pixel-ratio: 2), only screen and (min--moz-device-pixel-ratio: 2), only screen and (-o-min-device-pixel-ratio: 2 / 1), only screen and (min-device-pixel-ratio: 2), only screen and (min-resolution: 192dpi), only screen and (min-resolution: 2dppx) {
            .iti-flag {background-image: url("{{ asset('vendor/intl-tel-input/build/img/flags@2x.png') }}");}
        }



    </style>
@endsection

@section('footer')
    <script src="{{ asset('vendor/intl-tel-input/build/js/intlTelInput.js') }}"></script>

    <script>


        $("input[name=telephone]").intlTelInput({
            initialCountry: "auto",
            separateDialCode:true,
            hiddenInput:'f_telephone',
            geoIpLookup: function(callback) {
                $.get('https://ipinfo.io', function() {}, "jsonp").always(function(resp) {
                    var countryCode = (resp && resp.country) ? resp.country : "";
                    callback(countryCode);
                });
            },
            utilsScript: "{{ asset('vendor/intl-tel-input/build/js/utils.js') }}" // just for formatting/placeholders etc
        });
    </script>
@endsection
