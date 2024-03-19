@extends('layouts.admin')
@section('pageTitle',__('admin.weeklyreports'))
@section('innerTitle',__('admin.weeklyreports'))



@section('breadcrumb')
    <li><a href="{{ route('admin.dashboard') }}">@lang('admin.dashboard')</a>
    </li>
    <li><span>@lang('admin.weeklyreports')</span>
    </li>
@endsection

@section('content')

    <div class="card">
        
        <div class="card-header">
            {{-- <h4><a class="btn btn-primary" title="@lang('site.create-new') @lang('admin.weeklyreports')" href="{{ url('/admin/weeklyreports/create') }}"><i class="fa fa-plus" aria-hidden="true"></i> @lang('site.add-new')</a></h4>
            <div class="card-header-form">
                <form method="GET" action="{{ url('/admin/weeklyreports') }}">
                    <div class="input-group">
                        <input type="text"  name="search" value="{{ request('search') }}"  class="form-control" placeholder="{{ ucfirst(__('site.search')) }}...">
                        <div class="input-group-btn">
                            <button class="btn btn-primary"><i class="fas fa-search"></i></button>
                        </div>
                    </div>
                </form>
            </div>
            --}}
        </div> 
       
        <div class="card-body p-0">
            <div class="table-responsive">
               

                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>@lang('admin.sender')</th>
                            <th>@lang('admin.church')</th>
                            <th>@lang('admin.group')</th>
                            <th>@lang('admin.submission-date')</th>
                            <th>@lang('admin.acknowledge')</th>
                            <th>@lang('site.actions')</th>
                        </tr>
                        </thead>
                        
                        <tbody>
                        @foreach($reports as $item)
                            <tr>                                
                            
                                <td>{{\App\User::where('id', $item->reporter)->first()->name}} - < {{\App\User::where('id', $item->reporter)->first()->email}} ></td>
                                <td>{{$item->church->name}}</td>
                                <td>{{$item->department->name}}</td>
                                <td>{{$item->created_at}}</td>
                                @if($item->acknowledge==0)
                                <td style="color:red;font-weight: bold;">                            

                                    <form  id="delform{{ $item->id }}" 
                                        method="POST" autocomplete="off" action="{{ url('/admin/weeklyreports' . '/' . $item->id) }}" 
                                        accept-charset="UTF-8" style="display:inline">
                                        {{ method_field('PATCH') }}
                                        {{ csrf_field() }}
                                        <input type="hidden" name="report" value="{{ $item->id }}">  
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm(&quot;Confirm reception?&quot;)">
                                        <i class="fa fa-cogs"></i> @lang('NO')
                                        </button>

                                     </form>
                                </td>
                                @else
                                <td style="color:green;font-weight: bold;">YES</td>
                                @endif
                                <td>
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-sm btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                           <i class="fa fa-cogs"></i> @lang('admin.actions')
                                        </button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="{{ url('/admin/weeklyreports/' . $item->id) }}">@lang('site.view')</a>
                                            {{--<a class="dropdown-item" href="{{ url('/admin/weeklyreports/' . $item->id . '/edit') }}">@lang('site.edit')</a> --}}               
                                        </div>
                                    </div>


                                    <form onsubmit="return confirm('@lang('site.confirm-delete')')" id="delform{{ $item->id }}" 
                                    method="POST" autocomplete="off" action="{{ url('/admin/weeklyreports' . '/' . $item->id) }}" 
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
                {!! $reports->appends(['search' => Request::get('search')])->render() !!}
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
    @foreach($reports as $item)
        <div class="modal fade" tabindex="-1" role="dialog" id="myModal{{ $item->id }}">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    
                    <div class="modal-body">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>@lang('admin.admin')</th>
                                
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
                                        <a target="_blank" href="{{ url('/admin/shifts/' . $rejection->shift->id . '/edit') }}" title="@lang('site.edit') shift"><button class="btn btn-primary btn-sm"><i class="fa fa-edit" aria-hidden="true"></i> @lang('site.edit') @lang('admin.shift')</button></a>
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
