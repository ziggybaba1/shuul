@extends('layouts.admin')
@section('content')

    <div class="row page-titles">
                    <div class="col-md-5 col-8 align-self-center">
                        <h3 class="text-themecolor">@lang('admin.staff_attend')</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{url('')}}/admin/page.fmp?page=1">@lang('admin.home')</a></li>
                            <li class="breadcrumb-item active">@lang('admin.staff_attend')</li>
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
                                <h4 class="card-title">@lang('admin.staff_attend') @lang('admin.list') @lang('admin.export')</h4>
                                <h6 class="card-subtitle">@lang('admin.event-list-data')</h6>
                                <div class="table-responsive m-t-40">
        <table id="example23" class="display nowrap table  table-bordered" cellspacing="0" width="100%">
                                       <thead>
                                            <tr>
                                                 <th>@lang('admin.staff_id')</th>
                                                <th>@lang('admin.staff_name')</th>
                                                <th>@lang('admin.present')</th>
                                                <th>@lang('admin.absent')</th>
                                                <th>@lang('admin.option')</th>
                                               
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                 <th>@lang('admin.staff_id')</th>
                                                <th>@lang('admin.staff_name')</th>
                                                <th>@lang('admin.present')</th>
                                                <th>@lang('admin.absent')</th>
                                                <th>@lang('admin.option')</th>
                                               
                                            </tr>
                                        </tfoot>
                                        <tbody>
                        @foreach(\App\Teacher::all() as $class)
                                            <tr>
                                                <td>{{$class->user_id}}</td>
                                                <td>{{$class->gname}} {{$class->fname}}</td>
                  <td>{{count(\App\Employee::where('user_id',$class->id)->where('term',\App\Session::latest()->first()->terms)->where('session',\App\Session::latest()->first()->session)->where('status','1')->get())}}</td>
                 
                    <td>{{count(\App\Employee::where('user_id',$class->id)->where('term',\App\Session::latest()->first()->terms)->where('session',\App\Session::latest()->first()->session)->where('status','0')->get())}}</td>
                  
                     <td><button onclick="showAjaxModal('{{url('')}}/take/employee/attendance/{{$class->id}}')" class="btn btn-primary btn-sm btn-block"><i class="fa fa-check"></i>@lang('admin.take_attend')</button></td>
                                            </tr>
                        @endforeach
                                        </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</div>          

@endsection