@extends('layouts.admin')
@section('content')

    <div class="row page-titles">
                    <div class="col-md-5 col-8 align-self-center">
                        <h3 class="text-themecolor">@lang('admin.e_test') @lang('admin.batch')</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{url('')}}/admin/page.fmp?page=1">@lang('admin.home')</a></li>
                            <li class="breadcrumb-item active">@lang('admin.e_test') @lang('admin.batch')</li>
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
                <div id="showresultshere">
                    <div class="row">
                    <div class="col-12">
                          @if (session('message'))
                 <div class="alert alert-info alert-rounded">{{ session('message') }}</div>
                    @endif
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">@lang('admin.e_test') @lang('admin.batch') @lang('admin.export')</h4>
                                <h6 class="card-subtitle">@lang('admin.event-list-data')</h6>
                                 <div class="pull-left">
                                 <button onclick="showAjaxModal('{{url('')}}/staff/etest/branch')" class="btn btn-primary btn-bg">@lang('admin.add') @lang('admin.new') @lang('admin.staff') @lang('admin.batch')</button>
                             </div>
                                <div class="pull-right">
                                 <button onclick="showAjaxModal('{{url('')}}/add/etest/branch')" class="btn btn-primary btn-bg">@lang('admin.add') @lang('admin.new') @lang('admin.student') @lang('admin.batch')</button>
                             </div>
                                <div class="table-responsive m-t-40">
        <table  class="display nowrap table  table-bordered customed" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>@lang('admin.type')</th>
                                                <th>@lang('admin.subject')</th>
                                                <th>@lang('admin.duration')</th>
                                                 <th>@lang('admin.total') @lang('admin.question')</th>
                                                 <th>@lang('admin.class')</th>
                                                <th>@lang('admin.batch')</th>
                                                <th>@lang('admin.total') @lang('admin.assign')</th>
                                                <th>@lang('admin.each') @lang('admin.mark')</th>
                                                <th>@lang('admin.test') @lang('admin.status')</th>
                                                <th> @lang('admin.question')</th>
                                               <th>@lang('admin.option')</th>
                                               
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>#</th>
                                               <th>@lang('admin.type')</th>
                                                <th>@lang('admin.subject')</th>
                                                <th>@lang('admin.duration')</th>
                                                 <th>@lang('admin.total') @lang('admin.question')</th>
                                                  <th>@lang('admin.class')</th>
                                                <th>@lang('admin.batch')</th>
                                                <th>@lang('admin.total') @lang('admin.assign')</th>
                                                <th>@lang('admin.each') @lang('admin.mark')</th>
                                                <th>@lang('admin.test') @lang('admin.status')</th>
                                                <th> @lang('admin.question')</th>
                                               <th>@lang('admin.option')</th>
                                            </tr>
                                        </tfoot>
                      <tbody>
                @foreach(\App\Batch::latest()->get() as $batch)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            @if($batch->type=='1')
                        <td>Student</td>
                    @elseif($batch->type=='2')
                        <td>Staff</td>
                    @endif
                    @if($batch->type=='1')
                        <td>{{\App\Subject::find($batch->subject)->title}}</td>
                    @elseif($batch->type=='2')
                 <td>{{$batch->subject}}</td>
                    @endif
                        <td>{{$batch->duration}}</td>
                         <td>{{count(\App\Question::where('batch_id',$batch->id)->get())}}</td>
                          <td>
                            @if($batch->type=='1')
                    {{\App\Course::find($batch->class)->title}}
                    @endif
                </td>
                        <td>
                             @if($batch->batch=='1')
   Batch A
   @elseif($batch->batch=='2')
    Batch B
     @elseif($batch->batch=='3')
    Batch C
     @elseif($batch->batch=='4')
    Batch D
 @elseif($batch->batch=='5')
    Batch E
 @elseif($batch->batch=='6')
    Batch F
 @elseif($batch->batch=='7')
    Batch G
 @elseif($batch->batch=='8')
    Batch H
    @endif
                        </td>
                       
                        <td>{{count(\App\Assign::where('batch_id',$batch->id)->get())}}</td>
                     <td>{{$batch->mark}}</td>
                     @if($batch->status==''||$batch->status=='0')
                        <td> <button class="btn btn-info btn-sm"  onclick="activatenbatch('{{$batch->id}}')" >@lang('admin.activate') @lang('admin.now')</button></td>
                    @elseif($batch->status=='1')
                     <td> 
                        <div class="btn-group">
                                    <button type="button" class="btn btn-warning dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                       @lang('admin.test') @lang('admin.status')
                                    </button>
                                    <div class="dropdown-menu">
                              <a class="dropdown-item"  onclick="deactivatebatch('{{$batch->id}}')" href="javascript:void(0)">@lang('admin.activate') @lang('admin.now')</a>
                               <a class="dropdown-item"  onclick="suspendbatch('{{$batch->id}}')" href="javascript:void(0)">@lang('admin.suspend') @lang('admin.now')</a>
                                    </div>
                                </div>
                       </td>
                @elseif($batch->status=='2')
                 <td> <button class="btn btn-danger btn-sm"  onclick="activatenbatch('{{$batch->id}}')" href="javascript:void(0)">@lang('admin.reactive')</button></td>
                    @endif
                      
    <td><a href="{{url('')}}/add/batch_questions?quiz={{$batch->id}}" class="btn btn-sm btn-block btn-primary"><i class="fa fa-plus"></i></a></td>
    <td><div class="btn-group">
                                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="ti-settings"></i>
                                    </button>
                                    <div class="dropdown-menu">

                               @if($batch->type=='1')
                               <a onclick="showAjaxModal('{{url('')}}/add/student/user/{{$batch->id}}')" class="dropdown-item" href="javascript:void(0)">@lang('admin.batch_sperm')</a>
                                        <a onclick="showAjaxModal('{{url('')}}/edit/batch/{{$batch->id}}')" class="dropdown-item" href="javascript:void(0)">@lang('admin.edit')</a>
                                         @elseif($batch->type=='2')
                                          <a onclick="showAjaxModal('{{url('')}}/add/staff/user/{{$batch->id}}')" class="dropdown-item" href="javascript:void(0)">@lang('admin.batch_stperm')</a>
                                          <a onclick="showAjaxModal('{{url('')}}/edit/sbatch/{{$batch->id}}')" class="dropdown-item" href="javascript:void(0)">@lang('admin.edit')</a>
                                         @endif
                                        <a class="dropdown-item"  onclick="deletebatch('{{$batch->id}}')" href="javascript:void(0)">@lang('admin.delete')</a>
                                    </div>
                                </div>
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
                </div>
          
<script type="text/javascript">
    function deletebatch(id)
    {
 if(confirm("@lang('admin.confirm_delete')")){ 
                $.get('{{url('')}}/delete/batch/'+id,function(data)
                {
                if(data==0){
                    window.location.assign('{{url('')}}/admin/page.fmp?page=14');
                }
            else{
                     swal("Questions has been assigned, It can not be deleted!", "clicked the button to continue!", "error");
                    }    
                });
            }
    }
     function activatenbatch(id)
    {
 if(confirm("@lang('admin.test_active')")){ 
                $.get('{{url('')}}/activate/batch/'+id,function(data)
                {
                if(data==0){
                     swal("@lang('admin.account_activated')", "@lang('admin.continue-button')", "success");
                    window.location.assign('{{url('')}}/admin/page.fmp?page=14');
                }
            else{
                     swal("Test has been assigned, It can not be deleted!", "clicked the button to continue!", "error");
                    }    
                });
            }
    }
     function deactivatebatch(id)
    {
 if(confirm("@lang('admin.test_deactive')")){ 
                $.get('{{url('')}}/deactivate/batch/'+id,function(data)
                {
                if(data==0){
                     swal("@lang('admin.account_deactivated')", "@lang('admin.continue-button')", "success");
                    window.location.assign('{{url('')}}/admin/page.fmp?page=14');
                }
            else{
                     swal("Test has been assigned, It can not be deleted!", "clicked the button to continue!", "error");
                    }    
                });
            }
    }
    function suspendbatch(id)
    {
 if(confirm("@lang('admin.test_suspend')")){ 
                $.get('{{url('')}}/suspend/batch/'+id,function(data)
                {
                if(data==0){
                     swal("@lang('admin.account_suspend')", "@lang('admin.continue-button')", "success");
                    window.location.assign('{{url('')}}/admin/page.fmp?page=14');
                }
            else{
                     swal("Test has been assigned, It can not be deleted!", "clicked the button to continue!", "error");
                    }    
                });
            }
    }
</script>
@endsection