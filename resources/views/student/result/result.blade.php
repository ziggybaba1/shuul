@extends('layouts.student')
@section('content')
<div class="row page-titles">
                    <div class="col-md-6 col-8 align-self-center">
                        <h3 class="text-themecolor">{{\Auth::user()->name}} @lang('admin.report_card') </h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{url('')}}/admin/page.fmp?page=1">@lang('admin.home')</a></li>
                            <li class="breadcrumb-item active">@lang('admin.report_card')</li>
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
                        <div class="card">
                            <div class="card-body">
    <h4 class="card-title">@lang('admin.report_card')</h4>
                                <h6 class="card-subtitle"></h6>
                                <div class="table-responsive m-t-40">
        <table id="example24" class="display nowrap table  table-bordered" cellspacing="0" width="100%">
                                       <thead>
                                            <tr>
                                                <th>@lang('admin.class')</th>
                                                <th>@lang('admin.session')</th>
                                                <th>@lang('admin.term')</th>
                                                <th>@lang('admin.print')</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>@lang('admin.class')</th>
                                                <th>@lang('admin.session')</th>
                                                <th>@lang('admin.term')</th>
                                                <th>@lang('admin.print')</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
               @foreach(\App\Result::where('student_id',\App\Student::where('data_id',\Auth::user()->id)->first()->id)->get() as $class)
                                            <tr>
                <td>{{\App\Course::find($class->class_id)->title}}</td>
                <td>{{$class->session}}</td>
                                                <td>{{$class->term}}</td>
                                                <td>
                            <a onclick="showAjaxModal('{{url('')}}/show/result/{{$class->id}}')" class="btn btn-primary btn-sm btn-block"><i class="fa fa-book"></i>@lang('admin.print')</a>                        
                                                </td>
                    
                                            </tr>
                        @endforeach
                                        </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</div>          
<script type="text/javascript">
    $(document).ready(function() {
$("#datatabler").DataTable();
    });
</script>  

@endsection