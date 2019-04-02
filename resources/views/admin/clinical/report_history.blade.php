 @extends('layouts.admin')
@section('content')

                <!-- ============================================================== -->
                <!-- Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
               <div class="row page-titles">
                    <div class="col-md-5 col-8 align-self-center">
                        <h3 class="text-themecolor">@lang('admin.history_report')</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{url('')}}/admin/page.fmp?page=1">@lang('admin.home')</a></li>
                            <li class="breadcrumb-item active">@lang('admin.history_report')</li>
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
                                <h4 class="card-title">@lang('admin.history_report_exp')</h4>
                                <h6 class="card-subtitle">@lang('admin.med_rep_list')</h6>
                                 <div class="pull-left">
                               
                             </div>
                                <div class="table-responsive m-t-40">
                                    <table class="display nowrap table table-hover table-striped table-bordered customed" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                 <th>@lang('admin.class')</th>
                                                <th>@lang('admin.student_id')</th>
                                                <th>@lang('admin.student_name')</th>
                                                <th>@lang('admin.date_report')</th>
                                                <th>@lang('admin.med_reporter')</th>
                                               <th>@lang('admin.option')</th> 
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                              <th>#</th>
                                                 <th>@lang('admin.class')</th>
                                                <th>@lang('admin.student_id')</th>
                                                <th>@lang('admin.student_name')</th>
                                                <th>@lang('admin.date_report')</th>
                                                <th>@lang('admin.med_reporter')</th>
                                               <th>@lang('admin.option')</th> 
                                            </tr>
                                        </tfoot>
                                        <tbody>
                        @foreach(\App\Report::all() as $class)
                                            <tr>
                                                <td>{{$loop->iteration}}</td>
                                                 <td>{{\App\Course::find($class->class)->title}}</td>
                                                <td>{{\App\Student::find($class->student_id)->user_id}}</td>
                                                 <td>{{\App\Student::find($class->student_id)->gname}} {{\App\Student::find($class->student_id)->fname}}</td>
                                                <td>{{\Carbon\Carbon::parse($class->date)->toFormattedDateString()}}/
                                                {{\Carbon\Carbon::parse($class->time)->format('H:i a')}}</td>
                                                <td>{{$class->sign_name}}</td>
                                               
                    <td><div class="btn-group">
<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="ti-settings"></i></button>
     <div class="dropdown-menu ">
      @if(\App\Report::find($class->id)->sign_id!=\Auth::user()->id)
                <a onclick="showAjaxModal('{{url('')}}/show/last/report/{{$class->id}}')" class="dropdown-item" href="javascript:void(0)">@lang('admin.view')</a>
        @elseif(\App\Report::find($class->id)->sign_id==\Auth::user()->id)
                <a onclick="showAjaxModal('{{url('')}}/show/last/report/{{$class->id}}')" class="dropdown-item" href="javascript:void(0)">@lang('admin.edit')</a>
        @endif
                <a class="dropdown-item" onclick="deletereport('{{$class->id}}')" href="javascript:void(0)">@lang('admin.delete')</a>
      </div>
          </div></td>
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
              function deletereport(id)
              {
                if(confirm("@lang('admin.confirm_delete')")){ 
                $.get('{{url('')}}/delete/report/'+id,function(data)
                {
                if(data==0){
                  swal("@lang('admin.account_delete')", "@lang('admin.continue-button')", "success");
                    window.location.assign('{{url('')}}/admin/page.fmp?page=75');
                }
            else{
                     swal("@lang('admin.error_delete')", "@lang('admin.continue-button')", "error");
                    }   
                });
            }
              }
          </script>
                @endsection