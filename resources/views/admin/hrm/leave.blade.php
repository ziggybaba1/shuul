@extends('layouts.admin')
@section('content')

    <div class="row page-titles">
                    <div class="col-md-5 col-8 align-self-center">
                        <h3 class="text-themecolor">@lang('admin.staff') @lang('admin.leave') @lang('admin.mgt')</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">@lang('admin.home')</a></li>
                            <li class="breadcrumb-item active">@lang('admin.staff') @lang('admin.leave') @lang('admin.mgt')</li>
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
                      @if (session('error'))
                 <div class="alert alert-danger alert-rounded">{{ session('error') }}</div>
                    @endif
                        <div class="card">
                            <div class="card-body">
                                <div class="pull-right">
                                     <button onclick="showAjaxModal('{{url('')}}/add/leave')" class="btn btn-primary btn-block btn-bg">@lang('admin.add') @lang('admin.leave') @lang('admin.request')</button>
                                </div>
                                <h4 class="card-title">@lang('admin.staff') @lang('admin.leave') @lang('admin.status') @lang('admin.list') @lang('admin.export')</h4>
                                <h6 class="card-subtitle">@lang('admin.event-list-data')</h6>
                                <div class="table-responsive m-t-40">
        <table id="example23" class="display nowrap table  table-bordered" cellspacing="0" width="100%">
                                       <thead>
                                            <tr>
                                                 <th>@lang('admin.staff_id')</th>
                                                <th>@lang('admin.staff_name')</th>
                                                <th>@lang('admin.start-date-time')</th>
                                                <th>@lang('admin.end-date-time')</th>
                                                <th>@lang('admin.status')</th>
                                                <th>@lang('admin.option')</th>
                                               
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                              <th>@lang('admin.staff_id')</th>
                                                <th>@lang('admin.staff_name')</th>
                                                <th>@lang('admin.start-date-time')</th>
                                                <th>@lang('admin.end-date-time')</th>
                                                <th>@lang('admin.status')</th>
                                                <th>@lang('admin.option')</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
@if(\Auth::user()->role=='admin'||\Auth::user()->role=='hrm'||\App\Role::where('staff_id',\Auth::user()->id)->first()->leave=='1')
                        @forelse(\App\Leave::latest()->get() as $class)
                                            <tr>
                            <td>{{\App\Teacher::find($class->user_id)->user_id}}</td>
                                                <td>{{\App\Teacher::find($class->user_id)->gname}} {{\App\Teacher::find($class->user_id)->fname}}</td>
                  <td>{{\Carbon\Carbon::parse($class->date)->toFormattedDateString()}}</td>
                 
                   <td>{{\Carbon\Carbon::parse($class->rdate)->toFormattedDateString()}}</td>
        @if($class->status=='0')
                  <td><span class="btn btn-warning">@lang('admin.pend_approve')</span></td>
    @elseif($class->status=='1')
     <td><span class="btn btn-success">@lang('admin.approve')</span></td>
     @elseif($class->status=='2')
     <td><span class="btn btn-danger">@lang('admin.decline')</span></td>
     @endif
                     <td><button onclick="showAjaxModal('{{url('')}}/approve/employee/leave/{{$class->id}}')" class="btn btn-primary btn-sm btn-block"><i class="fa fa-check"></i>@lang('admin.approve')/@lang('admin.decline')</button></td>
                                            </tr>
                        @empty
                        <tr>
                            <td colspan="6">@lang('admin.no_entry')</td>
                        </tr>
                        @endforelse
                        @else
                        @forelse(\App\Leave::where('user_id',\App\Teacher::where('user_table',\Auth::user()->id)->first()->id)->latest()->get() as $class)
                                            <tr>
                            <td>{{\App\Teacher::find($class->user_id)->user_id}}</td>
                                                <td>{{\App\Teacher::find($class->user_id)->gname}} {{\App\Teacher::find($class->user_id)->fname}}</td>
                  <td>{{\Carbon\Carbon::parse($class->date)->toFormattedDateString()}}</td>
                 
                   <td>{{\Carbon\Carbon::parse($class->rdate)->toFormattedDateString()}}</td>
        @if($class->status=='0')
                  <td><span class="btn btn-warning">@lang('admin.pend_approve')</span></td>
    @elseif($class->status=='1')
     <td><span class="btn btn-success">@lang('admin.approve')</span></td>
     @elseif($class->status=='2')
     <td><span class="btn btn-danger">@lang('admin.decline')</span></td>
     @endif
                     <td></td>
                                            </tr>
                        @empty
                        <tr>
                            <td colspan="6">@lang('admin.no_entry')</td>
                        </tr>
                        @endforelse
                        @endif
                                        </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</div>          

@endsection