@extends('layouts.admin')
@section('pageTitle',__('admin.api-token'))

@section('innerTitle')
    @lang('admin.api-token')

@endsection



@section('breadcrumb')
    <li><a href="{{ route('admin.dashboard') }}">@lang('admin.dashboard')</a>
    </li>
    <li><span>@lang('admin.api-token')</span>
    </li>
@endsection

@section('content')

    <div class="card">

        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>@lang('admin.api-token')</th>
                        <th>@lang('site.actions')</th>
                    </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>{{ $user->api_token }}</td>
                            <td>
                                <a href="{{ route('set-token') }}" class="btn btn-primary"><i class="fa fa-bolt"></i> @lang('admin.set-token')</a>
                                <a href="{{ route('remove-token') }}" class="btn btn-danger"><i class="fa fa-trash"></i> @lang('admin.remove-token')</a>
                            </td>
                        </tr>

                    </tbody>
                </table>
            </div>
        </div>

    </div>





@endsection
