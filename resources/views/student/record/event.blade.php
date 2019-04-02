@extends('layouts.student')
@section('content')

    <div class="row page-titles">
                    <div class="col-md-5 col-8 align-self-center">
                        <h3 class="text-themecolor">@lang('admin.event') @lang('admin.list')</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">@lang('admin.home')</a></li>
                            <li class="breadcrumb-item active">@lang('admin.event') @lang('admin.list')</li>
                        </ol>
                    </div>
                   <div class="col-md-6 col-4 align-self-center">
                        <div class="d-flex m-t-10 justify-content-end">
                              <h5 class="text-themecolor">@lang('admin.current-sess'): {{\App\Session::latest()->first()->session}} </h5><br>
                            <h5 class="text-themecolor"> (
                                @if(\App\Session::latest()->first()->terms==='First')
                                @lang('admin.first_term')
                                @elseif(\App\Session::latest()->first()->terms==='Second')
                                @lang('admin.second_term')
                                 @elseif(\App\Session::latest()->first()->terms==='Third')
                                @lang('admin.third_term')
                                 @elseif(\App\Session::latest()->first()->terms==='Fourth')
                                @lang('admin.fourth_term')
                             @endif
                             )
                         </h5>
                        </div>
                    </div>
                </div>

                    <div class="row">
                    <div class="col-12">
                         @if (session('message'))
                 <div class="alert alert-info alert-rounded">{{ session('message') }}</div>
                    @endif
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">@lang('admin.event') @lang('admin.list')</h4>
                                <h6 class="card-subtitle"></h6>
                                <div class="table-responsive m-t-40">
        <table id="example23" class="display nowrap table  table-bordered" cellspacing="0" width="100%">
                                       <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>@lang('admin.event') @lang('admin.title')</th>
                                                <th>@lang('admin.start-date-time')</th>
                                                <th>@lang('admin.start-date-time')</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>#</th>
                                                <th>@lang('admin.event') @lang('admin.title')</th>
                                                <th>@lang('admin.start-date-time')</th>
                                                <th>@lang('admin.start-date-time')</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                        @forelse(\App\Event::latest()->get() as $class)
                                            <tr>
                                                <td>{{$loop->iteration}}</td>
                                                <td>{{$class->title}}</td>
                <td>{{\Carbon\Carbon::parse($class->sdate)->toFormattedDateString()}}<br>{{$class->stime}}</td>
                    <td>{{\Carbon\Carbon::parse($class->edate)->toFormattedDateString()}}<br>{{$class->etime}}</td>
                    
                                            </tr>
                        @empty
                        <tr><td colspan="6">@lang('admin.no_entry')</td></tr>
                        @endforelse
                                        </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</div>          

@endsection