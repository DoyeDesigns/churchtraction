@extends('layouts.member')
@section('pageTitle',__('admin.announcements'))
@section('innerTitle')
@lang('admin.announcements')
@if(Request::get('search'))
    : {{ Request::get('search') }}
@endif
@endsection



@section('breadcrumb')
    <li><a href="{{ route('member.dashboard') }}">@lang('admin.dashboard')</a>
    </li>
    <li><span>@lang('admin.announcements')</span>
    </li>
@endsection

@section('content')

    <div class="card">
        <div class="card-header">
            @can('administer')
            <h4>  <a class="btn btn-primary"  title="@lang('site.create-new') announcement" href="{{ url('/member/announcements/create') }}"><i class="fa fa-plus" aria-hidden="true"></i> @lang('site.add-new')</a>
            </h4>
            @endcan
            <div class="card-header-form">
                <form method="GET" action="{{ url('/member/announcements') }}" >
                    <div class="input-group">
                        <input type="text" class="form-control"  name="search" value="{{ request('search') }}" placeholder="{{ ucfirst(__('site.search')) }}">
                        <div class="input-group-btn">
                            <button class="btn btn-primary"><i class="fas fa-search"></i></button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>





    @foreach($announcements as $item)

        <article class="article article-style-c">

            <div class="article-details">
                <div class="article-category"><a href="#">{{ \Illuminate\Support\Carbon::parse($item->created_at)->format('d.M.Y') }}</a> <div class="bullet"></div> <a href="#">{{ \Illuminate\Support\Carbon::parse($item->created_at)->diffForHumans() }}</a></div>
                <div class="article-title">
                    <h2><a href="#">{{ $item->title }}</a></h2>
                </div>
                <p>{!! clean($item->content) !!} </p>
                <div class="article-user">
                    <img alt="image" src="{{ profilePicture($item->user_id) }}">
                    <div class="article-user-details">
                        <div class="user-detail-name">
                            <a href="{{ url('/member/members/'.$item->user_id) }}">{{ $item->user->name }}</a>
                        </div>
                        @if($item->user->can('administer'))
                        <div class="text-job">@lang('admin.admin')</div>
                            @endif
                    </div>
                </div>
                @can('administer')
                    <div  class="text-right">
                        <a href="{{ url('/member/announcements/' . $item->id) }}" title="@lang('site.view') announcement"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> @lang('site.view')</button></a>
                        <a href="{{ url('/member/announcements/' . $item->id . '/edit') }}" title="@lang('site.edit') announcement"><button class="btn btn-primary btn-sm"><i class="fa fa-edit" aria-hidden="true"></i> @lang('site.edit')</button></a>

                        <form method="POST" autocomplete="off" action="{{ url('/member/announcements' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger btn-sm" title="@lang('site.delete') announcement" onclick="return confirm('@lang('site.confirm-delete')')"><i class="fa fa-trash" aria-hidden="true"></i> @lang('site.delete')</button>
                        </form>
                    </div>
                @endcan
            </div>
        </article>


         @if(false)
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-bottom: 30px;">
                    <div class="blog-details-inner">
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="latest-blog-single blog-single-full-view">
                                    <div class="blog-image" style="margin-top: 30px;">

                                        <div class="blog-date">
                                            <p><span class="blog-day">{{ \Illuminate\Support\Carbon::parse($item->created_at)->format('d') }}</span> {{ \Illuminate\Support\Carbon::parse($item->created_at)->format('M') }}</p>
                                        </div>
                                    </div>
                                    <div class="blog-details blog-sig-details">
                                        <div class="details-blog-dt blog-sig-details-dt courses-info mobile-sm-d-n">
                                            <span><a href="#"><i class="fa fa-user"></i> <b>@lang('admin.created-by'):</b> {{ $item->user->name }}</a></span>
                                        </div>
                                        <h1><a class="blog-ht" href="#">{{ $item->title }}</a></h1>
                                        <p>{!! clean($item->content) !!}</p>
                                </div>
                                    @can('administer')
                                    <div style="text-align: right;" >
                                        <a href="{{ url('/member/announcements/' . $item->id) }}" title="@lang('site.view') announcement"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> @lang('site.view')</button></a>
                                        <a href="{{ url('/member/announcements/' . $item->id . '/edit') }}" title="@lang('site.edit') announcement"><button class="btn btn-primary btn-sm"><i class="fa fa-edit" aria-hidden="true"></i> @lang('site.edit')</button></a>

                                        <form method="POST" autocomplete="off" action="{{ url('/member/announcements' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                            {{ method_field('DELETE') }}
                                            {{ csrf_field() }}
                                            <button type="submit" class="btn btn-danger btn-sm" title="@lang('site.delete') announcement" onclick="return confirm('@lang('site.confirm-delete')')"><i class="fa fa-trash" aria-hidden="true"></i> @lang('site.delete')</button>
                                        </form>
                                    </div>
                                    @endcan
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
        @endif

    @endforeach

    <div class="blog-details-area mg-b-15">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="custom-pagination">
                        {!! $announcements->appends(['search' => Request::get('search')])->render() !!}
                    </div>
                </div>
            </div>
        </div>

    </div>



@endsection
