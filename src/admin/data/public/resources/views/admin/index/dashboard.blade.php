@extends('layouts.admin')
@section('pageTitle',__('admin.admin-dashboard'))
@section('innerTitle',__('admin.admin-dashboard'))

@section('content')
<style>
    .disabled {
        pointer-events:none; 
        text-decoration: line-through;
    }
</style>
    <div class="row">
        <div class="col-lg-4 col-md-6 col-sm-6 col-12">
            <a href="{{ url('admin/weeklyreports') }}">
            <div class="card card-statistic-1">
                <div class="card-icon bg-success">
                    <i class="fa fa-paperclip"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>@lang('admin.weeklyreports')</h4>
                    </div>
                    <div class="card-body">
                        {{ $weeklyreports }}
                    </div>
                </div>
            </div>
            </a>
        </div>

        <div class="col-lg-4 col-md-6 col-sm-6 col-12">
            <a href="{{ url('admin/cellreports') }}">
            <div class="card card-statistic-1">
                <div class="card-icon bg-primary">
                    <i class="fa fa-paperclip"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>@lang('admin.cellreports')</h4>
                    </div>
                    <div class="card-body">
                        {{ $cellreports }}
                    </div>
                </div>
            </div>
            </a>
        </div>

        <div class="col-lg-4 col-md-6 col-sm-6 col-12">
            <a href="{{ url('admin/outreachreports') }}">
            <div class="card card-statistic-1">
                <div class="card-icon bg-info">
                    <i class="fa fa-paperclip"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>@lang('admin.outreachreports')</h4>
                    </div>
                    <div class="card-body">
                        {{ $outreachreports }}
                    </div>
                </div>
            </div>
            </a>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
            <a href="{{ url('admin/groups') }}">
            <div class="card card-statistic-1">
                <div class="card-icon bg-primary">
                    <i class="fa fa-users"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>@lang('admin.departments')</h4>
                    </div>
                    <div class="card-body">
                        {{ $departments }}
                    </div>
                </div>
            </div>
            </a>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
            <a href="{{ url('admin/members') }}">
            <div class="card card-statistic-1">
                <div class="card-icon bg-danger">
                    <i class="fa fa-user"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>@lang('admin.members')</h4>
                    </div>
                    <div class="card-body">
                        {{ $members }}
                    </div>
                </div>
            </div>
            </a>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
            <a href="{{ url('admin/admins') }}">
            <div class="card card-statistic-1">
                <div class="card-icon bg-warning">
                    <i class="fa fa-user-secret"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>@lang('admin.administrators')</h4>
                    </div>
                    <div class="card-body">
                        {{ $admins }}
                    </div>
                </div>
            </div>
            </a>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6 col-12 disabled">
            <a href="{{ url('admin/emails') }}">
            <div class="card card-statistic-1">
                <div class="card-icon bg-success">
                    <i class="fa fa-envelope"></i>
                </div>
                <div class="card-wrap disabled">
                    <div class="card-header">
                        <h4>@lang('admin.messages')</h4>
                    </div>
                    <div class="card-body">
                        {{ $messages }}
                    </div>
                </div>
            </div>
            </a>
        </div>
    </div>

    <div class="row">
 

    {{-- 
        <div class="col-lg-6 col-md-6 col-12 disabled">

            <div class="card">
                <div class="card-header">
                    <h4>@lang('admin.recent-messages')</h4>
                    <div class="card-header-action">
                        <a href="{{ url('admin/emails') }}" class="btn btn-primary">@lang('admin.view-all')</a>
                    </div>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-striped mb-0">
                            <thead>
                            <tr>
                                <th>@lang('admin.subject')</th>
                                <th>@lang('admin.sender')</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($emails as $item)
                            <tr>
                                <td  onclick="document.location.replace('{{ route('email.view-inbox',['email'=>$item->id]) }}')" >
                                    {{ $item->subject }}  @if($item->emailAttachments()->count()>0)
                                        <i class="fa fa-paperclip"></i>
                                    @endif
                                    <div class="table-links">
                                        {{ \Illuminate\Support\Carbon::parse($item->crated_at)->format('D, M d, Y') }}
                                        <div class="bullet"></div>
                                        <a href="{{ route('email.view-inbox',['email'=>$item->id]) }}">@lang('site.view')</a>
                                    </div>
                                </td>
                                <td>
                                    <a href="{{ route('email.view-inbox',['email'=>$item->id]) }}" class="font-weight-600">
                                        @if(!empty($item->user->picture))
                                            <img src="{{ asset($item->user->picture) }}"  width="30" class="rounded-circle mr-1"  />
                                        @else
                                            <img src="{{ avatar($item->user->gender) }}"  width="30" class="rounded-circle mr-1"  />
                                        @endif

                                            {{ $item->user->name }}</a>
                                </td>
                                <td>
                                      <a    class="btn btn-danger btn-action" data-toggle="tooltip" title="@lang('site.delete')" data-confirm="@lang('admin.delete-prompt')" data-confirm-yes="document.location.replace('{{ route('email.delete-inbox',['id'=>$item->id]) }}')"><i class="fas fa-trash"></i></a>
                                </td>
                            </tr>

                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div> 
    --}}
    </div> 
@endsection
