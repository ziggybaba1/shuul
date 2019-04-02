@extends('layouts.student')
@section('content')
<div class="row page-titles">
                    <div class="col-md-6 col-8 align-self-center">
                        <h3 class="text-themecolor">{{\Auth::user()->name}} @lang('admin.lesson_note')</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{url('')}}/admin/page.fmp?page=1">@lang('admin.home')</a></li>
                            <li class="breadcrumb-item active">@lang('admin.lesson_note')</li>
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
                                <h4 class="card-title">{{\App\Course::find(\App\Student::where('data_id',\Auth::user()->id)->first()->class)->title}} @lang('admin.lesson_note')</h4>
                                <h6 class="card-subtitle"></h6>
                                 <div class="pull-left">
                               
                             </div>
                                <div class="table-responsive m-t-40">
                                    <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Session</th>
                                                 <th>@lang('admin.session')</th>
                                                <th>@lang('admin.term')</th>
                                                <th>@lang('admin.subject')</th>
                                                <th>@lang('admin.topic')</th>
                                                <th>@lang('admin.print')</th>
                                              
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                               <th>#</th>
                                                <th>@lang('admin.session')</th>
                                                <th>@lang('admin.term')</th>
                                                <th>@lang('admin.subject')</th>
                                                <th>@lang('admin.topic')</th>
                                                <th>@lang('admin.print')</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                        @foreach(\App\Lessonote::where('class_id',\App\Student::where('data_id',\Auth::user()->id)->first()->class)->latest()->get() as $class)
                                            <tr>
                                                <td>{{$loop->iteration}}</td>
                                                <td>{{$class->session}}</td>
                                                <td>{{$class->term}}</td>
                                                <td>{{$class->subject}}</td>
                                                <td>{{$class->topic}}</td>
                            <td><button onclick="showAjaxModal('{{url('')}}/admin/print/lesson-note/{{$class->id}}')" class="btn btn-default btn-sm btn-block"><i class="fa fa-plus"></i>@lang('admin.print')</button></td>
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
                    $('#example23').DataTable({
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    });
                </script>          

@endsection