<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="{{ setting('general_homepage_meta_desc') }}">
    <title>@yield('pageTitle',setting('general_site_name'))</title>
    @if($icon)
        <link rel="shortcut icon" type="image/x-icon" href="{{ asset($icon) }}">
@endif

    <!-- General CSS Files -->
    <link rel="stylesheet" href="{{ asset('themes/admin/assets/modules/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('themes/admin/assets/modules/fontawesome/css/all.min.css') }}">

    <!-- CSS Libraries -->

    <!-- Template CSS -->
    <link rel="stylesheet" href="{{ asset('themes/admin/assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('themes/admin/assets/css/components.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    @yield('header')

    {!! setting('general_header_scripts') !!}

</head>

<body class="layout-3">
<div id="app">
    <div class="main-wrapper container col-md-4">
        <div class="navbar-bg"></div>
        <nav class="navbar navbar-expand-lg main-navbar">
            <a href="{{ route('site.home') }}" class="navbar-brand sidebar-gone-hide">
                @if(!empty($logo))
                <img  class="int_logo" src="{{ asset($logo) }}"  />
                @else
                <h4>{{ setting('general_site_name') }}</h4>
                @endif
            </a>
            <a href="#" class="nav-link sidebar-gone-show" data-toggle="sidebar"><i class="fas fa-bars"></i></a>
       
            

            <ul class="navbar-nav navbar-right">

                   @auth
                <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                        <img alt="image" src="{{ asset($picture) }}" class="rounded-circle mr-1">
                        <div class="d-sm-none d-lg-inline-block">{{ $name }}</div></a>
                    <div class="dropdown-menu dropdown-menu-right">
                        <div class="dropdown-title">@lang('site.my-account')</div>
                        @if(\Illuminate\Support\Facades\Auth::user()->role_id==1)
                        <a href="{{ route('admin.dashboard') }}" class="dropdown-item has-icon">
                            <i class="fas fa-user-shield"></i> @lang('site.admin-section')
                        </a>
                        @endif
                        <a href="{{ route('account.profile') }}" class="dropdown-item has-icon">
                            <i class="far fa-user"></i> @lang('admin.profile')
                        </a>

                        <a href="{{ route('account.password') }}" class="dropdown-item has-icon">
                            <i class="fas fa-cog"></i> @lang('admin.change-password')
                        </a>
                        <a href="{{ route('user.emails.inbox') }}" class="dropdown-item has-icon"><i class="fas fa-envelope"></i> @lang('admin.messages')</a>

                        <div class="dropdown-divider"></div>
                        <a  href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();" class="dropdown-item has-icon text-danger">
                            <i class="fas fa-sign-out-alt"></i> @lang('admin.logout')
                        </a>
                    </div>
                </li>
                   @endauth
               


            </ul>
        </nav>

     

        <!-- Main Content -->
        <div class="main-content">
            <section class="section">
              

                <div class="section-body">


                    @if (count($errors) > 0)
                        <div class="alert alert-danger alert-dismissible show fade">
                            <div class="alert-body">
                                <button class="close" data-dismiss="alert">
                                    <span>&times;</span>
                                </button>
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    @endif


                     @foreach (['danger', 'warning', 'success', 'info'] as $msg)
                            @if(Session::has('alert-' . $msg))

                            <div class="alert alert-{{ $msg }} alert-dismissible show fade">
                                <div class="alert-body">
                                    <button class="close" data-dismiss="alert">
                                        <span>&times;</span>
                                    </button>
                                    {{ Session::get('alert-' . $msg) }}
                                </div>
                            </div>
                             @endif
                        @endforeach
                        @if(Session::has('flash_message'))

                            <div class="alert alert-success alert-dismissible show fade">
                                <div class="alert-body">
                                    <button class="close" data-dismiss="alert">
                                        <span>&times;</span>
                                    </button>
                                    {{ Session::get('flash_message') }}
                                </div>
                            </div>



                        @endif



                    @yield('content')
                </div>
            </section>
        </div>
        <!-- START SIMPLE MODAL MARKUP -->
        <div class="modal fade" id="generalModal" tabindex="-1" role="dialog" aria-labelledby="generalModalLabel" aria-hidden="true">
            <div class="modal-dialog  modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title" id="generalModalLabel"></h4>
                    </div>
                    <div class="modal-body" id="genmodalinfo">

                    </div>
                    <div class="modal-footer">

                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->
        <!-- END SIMPLE MODAL MARKUP -->
        <script>
            function openModal(title,url){
                $('#genmodalinfo').html(' <img  src="{{ asset('img/loader.gif') }}">');
                $('#generalModalLabel').text(title);
                $('#genmodalinfo').load(url);
                $('#generalModal').modal();
            }
            function openPopup(url){
                window.open(url, "_blank", "toolbar=no,scrollbars=yes,resizable=yes,top=500,left=500,width=400,height=400");
                return false;
            }
        </script>
        <footer class="main-footer">
            <div class="footer-left">
                {!! __('site.credits',['name'=>setting('general_site_name'),'year'=>date('Y')]) !!}
            </div>
            <div class="footer-right">
                <a href="{{ route('site.privacy') }}">@lang('site.privacy-policy')</a>
            </div>
        </footer>
    </div>
</div>

<!-- General JS Scripts -->
<script src="{{ asset('themes/admin/assets/modules/jquery.min.js') }}"></script>
<script src="{{ asset('themes/admin/assets/modules/popper.js') }}"></script>
<script src="{{ asset('themes/admin/assets/modules/tooltip.js') }}"></script>
<script src="{{ asset('themes/admin/assets/modules/bootstrap/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('themes/admin/assets/modules/nicescroll/jquery.nicescroll.min.js') }}"></script>
<script src="{{ asset('themes/admin/assets/modules/moment.min.js') }}"></script>
<script src="{{ asset('themes/admin/assets/js/stisla.js') }}"></script>

<!-- JS Libraies -->

<!-- Page Specific JS File -->

<!-- Template JS File -->
<script src="{{ asset('themes/admin/assets/js/scripts.js') }}"></script>
<script src="{{ asset('themes/admin/assets/js/custom.js') }}"></script>
 @yield('footer')

{!! setting('general_footer_scripts') !!}
</body>
</html>
