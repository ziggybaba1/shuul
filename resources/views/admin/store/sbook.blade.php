@extends('layouts.admin')
@section('content')

    <div class="row page-titles">
                    <div class="col-md-6 col-8 align-self-center">
                        <h3 class="text-themecolor">@lang('admin.student') @lang('admin.book')</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">@lang('admin.home')</a></li>
                            <li class="breadcrumb-item active">@lang('admin.student') @lang('admin.book')</li>
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
                                <h4 class="card-title">@lang('admin.class') @lang('admin.export')</h4>
                                <h6 class="card-subtitle"></h6>
                                 <div class="pull-left">
                               
                             </div>
                                <div class="table-responsive m-t-40">
                                    <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th>@lang('admin.class') @lang('admin.name')</th>
                                                <th>@lang('admin.class') @lang('admin.code')</th>
                                                <th>@lang('admin.total') @lang('admin.student')</th>
                                               <th>@lang('admin.total') @lang('admin.book')</th>
                                                <th>@lang('admin.book') @lang('admin.assign')</th>  
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>@lang('admin.class') @lang('admin.name')</th>
                                                <th>@lang('admin.class') @lang('admin.code')</th>
                                                <th>@lang('admin.total') @lang('admin.student')</th>
                                               <th>@lang('admin.total') @lang('admin.book')</th>
                                                <th>@lang('admin.book') @lang('admin.assign')</th> 
                                            </tr>
                                        </tfoot>
                                        <tbody>
                        @foreach(\App\Course::all() as $class)
                                            <tr>
                                                <td>{{$class->title}}</td>
                                                <td>{{$class->code}}</td>
                    <td>{{count(\App\Student::where('class',$class->id)->get())}}</td>
                                                <td>{{count(\App\Bookassign::where('class',$class->id)->get())}}</td>
                <td><button onclick="showAjaxModal('{{url('')}}/admin/assign/book/{{$class->id}}')" class="btn btn-info btn-sm btn-block"><i class="fa fa-plus"></i>@lang('admin.assign') @lang('admin.book')</button></td>
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