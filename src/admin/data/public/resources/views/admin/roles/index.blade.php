@extends('layouts.admin')
@section('pageTitle',__('admin.roles'))
@section('innerTitle')
    @lang('admin.roles')@if(Request::get('search'))
        : {{ Request::get('search') }}
    @endif
@endsection


@section('breadcrumb')
    <li><a href="{{ route('admin.dashboard') }}">@lang('admin.dashboard')</a>
    </li>
    <li><span>@lang('admin.roles')</span>
    </li>
@endsection

@section('content')




    <div class="card">
        <div class="card-header">
            <h4> <a class="btn btn-primary" title="@lang('admin.add-new') @lang('admin.role')" href="{{ url('/admin/roles/create') }}"><i class="fa fa-plus" aria-hidden="true"></i> @lang('site.add-new')</a></h4>
            <div class="card-header-form">
                <form  method="GET" action="{{ url('/admin/roles') }}" >
                    <div class="input-group">
                        <input type="text" class="form-control" name="search" value="{{ request('search') }}"  placeholder="@lang('admin.search')..." >
                        <div class="input-group-btn">
                            <button class="btn btn-primary"><i class="fas fa-search"></i></button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-striped">
                    <tbody><tr>
                        <th>
                            #
                        </th>
                        <th>@lang('admin.name')</th>
                        <th>@lang('admin.description')</th>
                        <th>@lang('admin.actions')</th>
                    </tr>
                    @foreach($roles as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->role }}</td>
                            <td>{{ $item->description }}</td>
                            @if($item->id =='1' or $item->id =='2' or $item->id =='3')
                            
                            @else
                            <td>
                                <a href="{{ url('/admin/roles/' . $item->id) }}" title="@lang('admin.view') @lang('admin.role')"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> @lang('admin.view')</button></a>
                                <a href="{{ url('/admin/roles/' . $item->id . '/edit') }}" title="@lang('admin.edit') @lang('admin.role')"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> @lang('admin.edit')</button></a>

                                <form method="POST" autocomplete="off" action="{{ url('/admin/roles' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                    {{ method_field('DELETE') }}
                                    {{ csrf_field() }}
                                    <button type="submit" class="btn btn-danger btn-sm" title="@lang('admin.delete') @lang('admin.role')" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> @lang('admin.delete')</button>
                                </form>
                            </td>

                            @endif

                        </tr>
                    @endforeach
                    </tbody></table>
            </div>
            <div class="custom-pagination">
                {!! $roles->appends(['search' => Request::get('search')])->render() !!}
            </div>
        </div>
    </div>










@endsection
