@extends('layouts.member')
@section('pageTitle',__('admin.events'))
@section('innerTitle',__('admin.events'))



@section('breadcrumb')
    <li><a href="{{ route('member.dashboard') }}">@lang('admin.dashboard')</a>
    </li>
    <li><span>@lang('admin.events')</span>
    </li>
@endsection

@section('content')

    <div class="card">
        <div class="card-header">
            <h4><a class="btn btn-primary" title="@lang('site.create-new') @lang('admin.event')" href="{{ url('/member/events/create') }}"><i class="fa fa-plus" aria-hidden="true"></i> @lang('site.add-new')</a></h4>
            <div class="card-header-form">
                <form method="GET" action="{{ url('/member/events') }}">
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
                @if(false)
                <table class="table table-striped">
                    <tbody><tr>
                        <th>
                            <div class="custom-checkbox custom-control">
                                <input type="checkbox" data-checkboxes="mygroup" data-checkbox-role="dad" class="custom-control-input" id="checkbox-all">
                                <label for="checkbox-all" class="custom-control-label">&nbsp;</label>
                            </div>
                        </th>
                        <th>Task Name</th>
                        <th>Progress</th>
                        <th>Members</th>
                        <th>Due Date</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                    <tr>
                        <td class="p-0 text-center">
                            <div class="custom-checkbox custom-control">
                                <input type="checkbox" data-checkboxes="mygroup" class="custom-control-input" id="checkbox-1">
                                <label for="checkbox-1" class="custom-control-label">&nbsp;</label>
                            </div>
                        </td>
                        <td>Create a mobile app</td>
                        <td class="align-middle">
                            <div class="progress" data-height="4" data-toggle="tooltip" title="" data-original-title="100%" style="height: 4px;">
                                <div class="progress-bar bg-success" data-width="100" style="width: 100px;"></div>
                            </div>
                        </td>
                        <td>
                            <img alt="image" src="assets/img/avatar/avatar-5.png" class="rounded-circle" data-toggle="tooltip" title="" data-original-title="Wildan Ahdian" width="35">
                        </td>
                        <td>2018-01-20</td>
                        <td><div class="badge badge-success">Completed</div></td>
                        <td><a href="#" class="btn btn-secondary">Detail</a></td>
                    </tr>
                    <tr>
                        <td class="p-0 text-center">
                            <div class="custom-checkbox custom-control">
                                <input type="checkbox" data-checkboxes="mygroup" class="custom-control-input" id="checkbox-2">
                                <label for="checkbox-2" class="custom-control-label">&nbsp;</label>
                            </div>
                        </td>
                        <td>Redesign homepage</td>
                        <td class="align-middle">
                            <div class="progress" data-height="4" data-toggle="tooltip" title="" data-original-title="0%" style="height: 4px;">
                                <div class="progress-bar" data-width="0" style="width: 0px;"></div>
                            </div>
                        </td>
                        <td>
                            <img alt="image" src="assets/img/avatar/avatar-1.png" class="rounded-circle" data-toggle="tooltip" title="" data-original-title="Nur Alpiana" width="35">
                            <img alt="image" src="assets/img/avatar/avatar-3.png" class="rounded-circle" data-toggle="tooltip" title="" data-original-title="Hariono Yusup" width="35">
                            <img alt="image" src="assets/img/avatar/avatar-4.png" class="rounded-circle" data-toggle="tooltip" title="" data-original-title="Bagus Dwi Cahya" width="35">
                        </td>
                        <td>2018-04-10</td>
                        <td><div class="badge badge-info">Todo</div></td>
                        <td><a href="#" class="btn btn-secondary">Detail</a></td>
                    </tr>
                    <tr>
                        <td class="p-0 text-center">
                            <div class="custom-checkbox custom-control">
                                <input type="checkbox" data-checkboxes="mygroup" class="custom-control-input" id="checkbox-3">
                                <label for="checkbox-3" class="custom-control-label">&nbsp;</label>
                            </div>
                        </td>
                        <td>Backup database</td>
                        <td class="align-middle">
                            <div class="progress" data-height="4" data-toggle="tooltip" title="" data-original-title="70%" style="height: 4px;">
                                <div class="progress-bar bg-warning" data-width="70" style="width: 70px;"></div>
                            </div>
                        </td>
                        <td>
                            <img alt="image" src="assets/img/avatar/avatar-1.png" class="rounded-circle" data-toggle="tooltip" title="" data-original-title="Rizal Fakhri" width="35">
                            <img alt="image" src="assets/img/avatar/avatar-2.png" class="rounded-circle" data-toggle="tooltip" title="" data-original-title="Hasan Basri" width="35">
                        </td>
                        <td>2018-01-29</td>
                        <td><div class="badge badge-warning">In Progress</div></td>
                        <td><a href="#" class="btn btn-secondary">Detail</a></td>
                    </tr>
                    <tr>
                        <td class="p-0 text-center">
                            <div class="custom-checkbox custom-control">
                                <input type="checkbox" data-checkboxes="mygroup" class="custom-control-input" id="checkbox-4">
                                <label for="checkbox-4" class="custom-control-label">&nbsp;</label>
                            </div>
                        </td>
                        <td>Input data</td>
                        <td class="align-middle">
                            <div class="progress" data-height="4" data-toggle="tooltip" title="" data-original-title="100%" style="height: 4px;">
                                <div class="progress-bar bg-success" data-width="100" style="width: 100px;"></div>
                            </div>
                        </td>
                        <td>
                            <img alt="image" src="assets/img/avatar/avatar-2.png" class="rounded-circle" data-toggle="tooltip" title="" data-original-title="Rizal Fakhri" width="35">
                            <img alt="image" src="assets/img/avatar/avatar-5.png" class="rounded-circle" data-toggle="tooltip" title="" data-original-title="Isnap Kiswandi" width="35">
                            <img alt="image" src="assets/img/avatar/avatar-4.png" class="rounded-circle" data-toggle="tooltip" title="" data-original-title="Yudi Nawawi" width="35">
                            <img alt="image" src="assets/img/avatar/avatar-1.png" class="rounded-circle" data-toggle="tooltip" title="" data-original-title="Khaerul Anwar" width="35">
                        </td>
                        <td>2018-01-16</td>
                        <td><div class="badge badge-success">Completed</div></td>
                        <td><a href="#" class="btn btn-secondary">Detail</a></td>
                    </tr>
                    </tbody></table>
                @endif

                    <table class="table table-striped" style="margin-bottom:200px">
                        <thead>
                        <tr>
                            <th>@lang('admin.event') @lang('admin.date')</th>
                            <th>@lang('admin.name')</th>
                            <th>@lang('admin.description')</th>
                            <th>@lang('site.report')</th>
                            <th>@lang('site.actions')</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($events as $item)
                            <tr>                                
                            
                            @if( strtotime($item->event_date) >= strtotime(\Carbon\Carbon::now()->toDateString()) )
                                <td style="background-color:#C4F7B0;">Incoming {{  \Illuminate\Support\Carbon::parse($item->event_date)->format('D d/M/Y') }}</td>
                            @else
                                <td style="background-color:#FCBEB1;">
                                    Outdated {{  \Illuminate\Support\Carbon::parse($item->event_date)->format('D d/M/Y') }}
                                </td>
                            @endif

                            <td>{{ $item->name }}</td>
                                <td> {{ $item->description }} </td>
                                @if($item->reports()->count() > 0)
                                <td> @lang('site.submitted') </td>
                                @else
                                <td> @lang('site.due') </td>
                                @endif
                                <td>
                                     <a href="{{ route('member.shifts.index',['event'=>$item->id]) }}" ><button class="btn btn-success btn-sm"><i class="fa fa-clock" aria-hidden="true"></i> @lang('admin.manage-shifts')</button></a> 
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-sm btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                           <i class="fa fa-cogs"></i> @lang('admin.actions')
                                        </button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="{{ url('/member/events/' . $item->id) }}">@lang('site.view')</a>
                                            <a class="dropdown-item" href="{{ url('/member/events/' . $item->id . '/edit') }}">@lang('site.edit')</a>
                                            <a class="dropdown-item"  data-toggle="modal" data-target="#duplicateModal{{ $item->id }}"  href="#">@lang('admin.duplicate')</a>
                                            @section('footer')

                                                <div class="modal fade" tabindex="-1" role="dialog" id="duplicateModal{{ $item->id }}">
                                                    <div class="modal-dialog" role="document">
                                                        <form action="{{ route('member.events.duplicate',['event'=>$item->id]) }}" method="post">
                                                            @csrf
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title">@lang('admin.duplicate') {{ $item->name }}</h5>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <div class="form-group">
                                                                        <label for="event_date" class="control-label">@lang('admin.event') @lang('admin.date')</label>
                                                                        <input required class="form-control date" name="date" type="text" id="event_date" value="" >

                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer bg-whitesmoke br">
                                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">@lang('admin.close')</button>
                                                                    <button type="submit" class="btn btn-primary">@lang('admin.duplicate')</button>
                                                                </div>
                                                            </div>
                                                        </form>

                                                    </div>
                                                </div>
                                                @parent
                                            @endsection
                                            <a class="dropdown-item" href="{{ url('/member/events/delete/' . $item->id) }}">@lang('site.delete')</a>
                                            <a class="dropdown-item" href="{{ url('/member/events/' . $item->id . '/report') }}">@lang('site.submit-report')</a>
                                        </div>
                                    </div>


                                    <form onsubmit="return confirm('@lang('site.confirm-delete')')" id="delform{{ $item->id }}" 
                                    method="POST" autocomplete="off" action="{{ url('/member/events' . '/' . $item->id) }}" 
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
                {!! $events->appends(['search' => Request::get('search')])->render() !!}
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

    @foreach($events as $item)

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

@endsection

@section('header')
    <link href="{{ asset('vendor/pickadate/themes/default.date.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/pickadate/themes/default.css') }}" rel="stylesheet">

@endsection
