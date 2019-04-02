@extends('layouts.admin')
@section('content')
<div class="row page-titles">
                    <div class="col-md-6 col-8 align-self-center">
                        <h3 class="text-themecolor">@lang('admin.reset_test')</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">@lang('admin.home')</a></li>
                            <li class="breadcrumb-item active">@lang('admin.reset_test')</li>
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
                                <h4 class="card-title">@lang('admin.reset_test')</h4>
                                <h6 class="card-subtitle">@lang('admin.event-list-data')</h6>
                                <div class="table-responsive m-t-40">
        <table class="display nowrap table  table-bordered customed" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                 <th>@lang('admin.type')</th>
                                                <th>@lang('admin.user_id')</th>
                                               <th>@lang('admin.name')</th>
                                                <th>@lang('admin.subject')</th>
                                                <th>@lang('admin.batch')</th>
                                                <th>@lang('admin.date')</th>
                                                <th>@lang('admin.option')</th>
                                               
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                               <th>#</th>
                                               <th>@lang('admin.type')</th>
                                                <th>@lang('admin.user_id')</th>
                                               <th>@lang('admin.name')</th>
                                                <th>@lang('admin.subject')</th>
                                                <th>@lang('admin.batch')</th>
                                                <th>@lang('admin.date')</th>
                                                <th>@lang('admin.option')</th>
                                            </tr>
                                        </tfoot>
                      <tbody>
                @foreach(\App\Clockin::latest()->get() as $batch)
                @if($batch->type=='2')
                        <tr>
                            <td>{{$loop->iteration}}</td>
                             <td>@lang('admin.staff')</td>
                            <td>{{\App\Teacher::find($batch->student_id)->user_id}}</td>
                        <td>{{\App\Teacher::find($batch->student_id)->gname}} {{\App\Teacher::find($batch->student_id)->fname}}</td>
                        <td>{{\App\Batch::find($batch->batch_id)->subject}}</td>
                                <td>
                                 {{\App\Batch::find($batch->batch_id)->batch}}   
                                </td>
                        <td>{{\Carbon\Carbon::parse($batch->created_at)->toFormattedDateString()}}</td>
    <td>
    
    <a onclick="resettest('{{$batch->id}}')" href="javascript:void(0)" class="btn btn-primary text-white"><i class="fa fa-plus"></i>  @lang('admin.reset_test')</a>
</td>
                        </tr>
    @elseif($batch->type=='1')
     <tr>
                            <td>{{$loop->iteration}}</td>
                             <td>@lang('admin.student')</td>
                            <td>{{\App\Student::find($batch->student_id)->user_id}}</td>
                        <td>{{\App\Student::find($batch->student_id)->gname}} {{\App\Student::find($batch->student_id)->fname}}</td>
                        <td>{{\App\Subject::find(\App\Batch::find($batch->batch_id)->subject)->title}}</td>
                    <td></td>
                        <td>{{\App\Batch::find($batch->batch_id)->date}}</td>
    <td>
    
    <a onclick="resettest('{{$batch->id}}')" href="javascript:void(0)" class="btn btn-primary text-white"><i class="fa fa-plus"></i>  @lang('admin.reset_test')</a>
</td>
                        </tr>
                         @endif
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</div>
  <script type="text/javascript">
              function resettest(id)
              {
                if(confirm("@lang('admin.confirm_reset')")){ 
                $.get('{{url('')}}/reset/test/'+id,function(data)
                {
                if(data==0){
                  swal("@lang('admin.account_reset')", "@lang('admin.continue-button')", "success");
                    window.location.assign('{{url('')}}/admin/page.fmp?page=78');
                }
            else{
                     swal("@lang('admin.error_delete')", "@lang('admin.continue-button')", "error");
                    }   
                });
            }
              }
          </script>
@endsection