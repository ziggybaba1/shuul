@extends('layouts.admin')
@section('content')

    <div class="row page-titles">
                    <div class="col-md-5 col-8 align-self-center">
                        <h3 class="text-themecolor">@lang('admin.grad_record')</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{url('')}}/admin/page.fmp?page=1">@lang('admin.home')</a></li>
                            <li class="breadcrumb-item active">@lang('admin.grad_record')</li>
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
    <div class="col-md-12">
       <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">@lang('admin.grad_record') @lang('admin.list') @lang('admin.export')</h4>
                                <h6 class="card-subtitle">@lang('admin.event-list-data')</h6>
                                <div class="pull-right">
                                 <button onclick="showAjaxModal('{{url('')}}/add/new_graduate')" class="btn btn-primary btn-bg">@lang('admin.add') @lang('admin.grad_stud')</button>
                             </div>
                                <div class="table-responsive m-t-40">
        <table id="example23" class="display nowrap table  table-bordered" cellspacing="0" width="100%">
                                       <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>@lang('admin.student_id')</th>
                                                <th>@lang('admin.name')</th>
                                               <th>@lang('admin.year_grad')</th>
                                                <th>@lang('admin.external_result')</th>
                                                <th>@lang('admin.school_result')</th>
                                                <th>@lang('admin.certificate')</th> 
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                               <th>#</th>
                                                <th>@lang('admin.student_id')</th>
                                                <th>@lang('admin.name')</th>
                                               <th>@lang('admin.year_grad')</th>
                                                <th>@lang('admin.external_result')</th>
                                                <th>@lang('admin.school_result')</th>
                                                <th>@lang('admin.certificate')</th> 
                                            </tr>
                                        </tfoot>
                                        <tbody>
                        @foreach(\App\Graduation::all() as $student)
                                            <tr>
                                                <td>{{$loop->iteration}}</td>
                                                <td>{{\App\Student::find($student->user_id)->user_id}}</td>
                    <td>{{$student->name}}</td>
                    <td>{{\Carbon\Carbon::parse($student->date)->toFormattedDateString()}}</td>
                    <td><button onclick="showAjaxModal('{{url('')}}/admin/external/result/{{$student->id}}')" class="btn btn-primary btn-sm btn-block"><i class="fa fa-eye"></i>@lang('admin.external_result')<</button></td>
                     <td><button onclick="showAjaxModal('{{url('')}}/admin/school/result/{{$student->id}}')" class="btn btn-info btn-sm btn-block"><i class="fa fa-eye"></i>@lang('admin.school_result')</button></td>
                     <td><button onclick="showAjaxModal('{{url('')}}/admin/generate/certificate/{{$student->id}}')" class="btn btn-success btn-sm btn-block"><i class="fa fa-eye"></i>@lang('admin.certificate')</button></td>
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