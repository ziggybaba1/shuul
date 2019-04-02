@extends('layouts.admin')
@section('content')

    <div class="row page-titles">
                    <div class="col-md-5 col-8 align-self-center">
                        <h3 class="text-themecolor">@lang('admin.student_year_book')</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{url('')}}/admin/page.fmp?page=1">@lang('admin.home')</a></li>
                            <li class="breadcrumb-item active">@lang('admin.student_year_book')</li>
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
                    <!-- Column -->
                    <!-- Column -->
                    <div class="col-lg-12 col-xlg-12 col-md-12">
                         @if (session('message'))
                 <div class="alert alert-info alert-rounded">{{ session('message') }}</div>
                    @endif
                        <div class="card card-body">

                           <h4 class="card-title">@lang('admin.student_year_book') @lang('admin.export')</h4>
                                <h6 class="card-subtitle">@lang('admin.event-list-data')</h6>
                                <div class="pull-right">
                                 <button onclick="showAjaxModal('{{url('')}}/add/yearbook/page')" class="btn btn-primary btn-bg">@lang('admin.add_year_book')</button>
                             </div>
                                <div class="table-responsive m-t-40">
        <table id="example23" class="display nowrap table  table-bordered" cellspacing="0" width="100%">
                                       <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>@lang('admin.session')</th>
                                                <th>@lang('admin.title')</th>
                                               <th>@lang('admin.total_page')</th>
                                                <th>@lang('admin.price')</th>
                                                 <th>@lang('admin.edit')</th>
                                                <th>@lang('admin.download')</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                 <th>#</th>
                                                <th>@lang('admin.session')</th>
                                                <th>@lang('admin.title')</th>
                                               <th>@lang('admin.total_page')</th>
                                                <th>@lang('admin.price')</th>
                                                 <th>@lang('admin.edit')</th>
                                                <th>@lang('admin.download')</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                        @foreach(\App\Yearbook::all() as $student)
                                            <tr>
                                                <td>{{$loop->iteration}}</td>
                                                <td>{{$student->session}}</td>
                    <td>{{$student->title}}</td>
                    <td>{{$student->number}}</td>
                     <td>{{$student->price}}</td>
                    <td><button onclick="showAjaxModal('{{url('')}}/admin/edit/yearbook/{{$student->id}}')" class="btn btn-primary btn-sm btn-block"><i class="fa fa-eye"></i>@lang('admin.edit')</button></td>
                     <td><a href="{{url('')}}/admin/ybook/download?book={{$student->id}}" class="btn btn-info btn-sm btn-block"><i class="fa fa-eye"></i>@lang('admin.download')</a></td>
                    
                                            </tr>
                        @endforeach
                                        </tbody>
                </table>
            </div>
                        </div>
                    </div>
    </div>
    
                             <script src="{{url('')}}/assets/plugins/jquery/jquery.min.js"></script>
                            <script type="text/javascript">

                            </script>
    @endsection