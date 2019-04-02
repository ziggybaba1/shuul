 @extends('layouts.admin')
@section('content')

                <!-- ============================================================== -->
                <!-- Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
               <div class="row page-titles">
                    <div class="col-md-5 col-8 align-self-center">
                        <h3 class="text-themecolor">@lang('admin.class_list')</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{url('')}}/admin/page.fmp?page=1">@lang('admin.home')</a></li>
                            <li class="breadcrumb-item active">@lang('admin.class_list')</li>
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
                                <h4 class="card-title">@lang('admin.class_export')</h4>
                                <h6 class="card-subtitle">@lang('admin.class_del')</h6>
                                 <div class="pull-left">
                               
                             </div>
                                 <div class="pull-right">
                                 <button onclick="showAjaxModal('{{url('')}}/add/class')" class="btn btn-primary btn-bg">@lang('admin.add_class')</button>
                             </div>
                                <div class="table-responsive m-t-40">
                                    <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th>@lang('admin.name')</th>
                                                <th>@lang('admin.code')</th>
                                                <th>@lang('admin.total_student')</th>
                                               <th>@lang('admin.total_subject')</th>
                                                <th>@lang('admin.add_subject')</th>
                                                <th>@lang('admin.edit')</th>
                                                
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>@lang('admin.name')</th>
                                                <th>@lang('admin.code')</th>
                                                <th>@lang('admin.total_student')</th>
                                               <th>@lang('admin.total_subject')</th>
                                                <th>@lang('admin.add_subject')</th>
                                                <th>@lang('admin.edit')</th>
                                               
                                            </tr>
                                        </tfoot>
                                        <tbody>
                        @foreach(\App\Course::all() as $class)
                                            <tr>
                                                <td>{{$class->title}}</td>
                                                <td>{{$class->code}}</td>
                    <td>{{count(\App\Student::where('class',$class->id)->get())}}</td>
                                                <td>{{count(\App\Subject::where('class',$class->id)->get())}}</td>
                <td><button onclick="showAjaxModal('{{url('')}}/admin/add/subject/{{$class->id}}')" class="btn btn-info btn-sm btn-block"><i class="fa fa-plus"></i>@lang('admin.add_subject')</button></td>
                    <td><button onclick="showAjaxModal('{{url('')}}/admin/edit/class/{{$class->id}}')" class="btn btn-primary btn-sm btn-block"><i class="fa fa-book"></i>@lang('admin.edit')</button></td>
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