@extends('layouts.member')
@section('pageTitle',__('admin.outreachreports'))
@section('innerTitle',__('admin.outreachreports'))



@section('breadcrumb')
    <li><a href="{{ route('member.dashboard') }}">@lang('admin.dashboard')</a>
    </li>
    <li><span>@lang('admin.outreachreports')</span>
    </li>
@endsection

@section('content')

    <div class="card">
        
        <div class="card-header">
            <h4><a class="btn btn-primary" title="@lang('site.create-new') @lang('admin.outreachreport')" href="{{ url('/member/outreachreports/create') }}"><i class="fa fa-plus" aria-hidden="true"></i> @lang('site.add-new')</a></h4>
            <div class="card-header-form">
                <form method="GET" action="{{ url('/member/outreachreports') }}">
                    <div class="input-group">
                        <input type="text"  name="search" value="{{ request('search') }}"  class="form-control" placeholder="{{ ucfirst(__('site.search')) }}...">
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
                        <thead>
                        <tr>
                            {{-- <th>@lang('admin.owner-name')</th> --}}
                            <th>@lang('admin.group')</th>
                            <th>@lang('admin.submission-date')</th>
                            <th>@lang('site.actions')</th>
                        </tr>
                        </thead>
                        
                        <tbody>
                        @foreach($outreachreports as $item)
                            <tr>                                
                            
                                <td>{{$item->department->name}}</td>
                                <td>{{$item->created_at}}</td>

                                <td>
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-sm btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                           <i class="fa fa-cogs"></i> @lang('admin.actions')
                                        </button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="{{ url('/member/outreachreports/' . $item->id) }}">@lang('site.view')</a>
                                            {{--<a class="dropdown-item" href="{{ url('/member/outreachreports/' . $item->id . '/edit') }}">@lang('site.edit')</a> --}}               
                                        </div>
                                    </div>


                                    <form onsubmit="return confirm('@lang('site.confirm-delete')')" id="delform{{ $item->id }}" 
                                    method="POST" autocomplete="off" action="{{ url('/member/outreachreports' . '/' . $item->id) }}" 
                                    accept-charset="UTF-8" style="display:inline">
                                        {{ method_field('DELETE') }}
                                        {{ csrf_field() }}
                                     </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

            </div>
            <div class="custom-pagination">
                {!! $outreachreports->appends(['search' => Request::get('search')])->render() !!}
            </div>
        </div>
    </div>

@endsection

@section('footer')
    <script src="{{ asset('vendor/pickadate/picker.js') }}" type="text/javascript"></script>
    <script src="{{ asset('vendor/pickadate/picker.date.js') }}" type="text/javascript"></script>
    <script src="{{ asset('vendor/pickadate/legacy.js') }}" type="text/javascript"></script>
    <script type="text/javascript">
        $('.date').pickadate({
            format: 'yyyy-mm-dd',
            'container':'body'
        });

    </script>
{{--
    @foreach($outreachreports as $item)
        <div class="modal fade" tabindex="-1" role="dialog" id="myModal{{ $item->id }}">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    
                    <div class="modal-body">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>@lang('admin.member')</th>
                                
                                <th>@lang('admin.reason')</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($item->rejections as $rejection)
                                <tr>
                                    <td>{{ $rejection->user->name }}</td>
                                    
                                    <td>{{ \Carbon\Carbon::parse($rejection->created_at)->format('D d/m/Y') }}</td>
                                    <td>{{ $rejection->message }}</td>
                                    <td>
                                        <a target="_blank" href="{{ url('/member/shifts/' . $rejection->shift->id . '/edit') }}" title="@lang('site.edit') shift"><button class="btn btn-primary btn-sm"><i class="fa fa-edit" aria-hidden="true"></i> @lang('site.edit') @lang('admin.shift')</button></a>
                                    </td>

                                </tr>
                            @endforeach
                            </tbody>



                        </table>
                    </div>
                    <div class="modal-footer bg-whitesmoke br">
                        <button type="button" class="btn btn-primary" data-dismiss="modal">@lang('admin.close')</button>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
--}}

@endsection

@section('header')
    <link href="{{ asset('vendor/pickadate/themes/default.date.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/pickadate/themes/default.css') }}" rel="stylesheet">

@endsection
