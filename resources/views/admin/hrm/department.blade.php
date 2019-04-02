@extends('layouts.admin')
@section('content')

    <div class="row page-titles">
                    <div class="col-md-5 col-8 align-self-center">
                        <h3 class="text-themecolor">@lang('admin.dept') @lang('admin.list')</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{url('')}}/admin/page.fmp?page=1">@lang('admin.home')</a></li>
                            <li class="breadcrumb-item active">@lang('admin.dept') @lang('admin.list')</li>
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
                    <div class="pull-right">
                         <button onclick="showAjaxModal('{{url('')}}/add/department')" class="btn btn-primary btn-block btn-sm">@lang('admin.add') @lang('admin.new') @lang('admin.dept')</button>
                    </div>
                                <h4 class="card-title">@lang('admin.dept') @lang('admin.list') @lang('admin.export')</h4>
                                <h6 class="card-subtitle">@lang('admin.event-list-data')</h6>
                                <div class="table-responsive m-t-40">
        <table id="example23" class="display nowrap table  table-bordered" cellspacing="0" width="100%">
                                       <thead>
                                            <tr>
                                                <th>@lang('admin.dept') @lang('admin.name')</th>
                                                <th>@lang('admin.describe')</th>
                                                <th>@lang('admin.type')</th>
                                                <th>@lang('admin.total') @lang('admin.staff')</th>
                                                <th>@lang('admin.option')</th>
                                               
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>@lang('admin.dept') @lang('admin.name')</th>
                                                <th>@lang('admin.describe')</th>
                                                <th>@lang('admin.type')</th>
                                                <th>@lang('admin.total') @lang('admin.staff')</th>
                                                <th>@lang('admin.option')</th> 
                                            </tr>
                                        </tfoot>
                                        <tbody>
                        @foreach(\App\Department::all() as $class)
                                            <tr>
                                                <td>{{$class->name}}</td>
                                                <td>{{$class->description}}</td>
                    @if($class->type=='1')
                    <td>@lang('admin.teach')</td>
                    @else
                    <td>@lang('admin.no_teach')</td>
                    @endif
                    <td>{{count(\App\Teacher::where('dept',$class->id)->get())}}</td>
                     <td><button onclick="showAjaxModal('{{url('')}}/edit/department/{{$class->id}}')" class="btn btn-primary btn-sm btn-block"><i class="fa fa-eye"></i>@lang('admin.edit')</button></td>
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