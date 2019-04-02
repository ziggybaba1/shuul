@extends('layouts.admin')
@section('content')
<style type="text/css">
@media (min-width: 1650px) {
  .modal-dialog{
    min-width: 1000px;
  }
}
@media (min-width: 576px) {
  .modal-dialog{
    min-width: 700px;
  }
}
</style>
    <div class="row page-titles">
                    <div class="col-md-5 col-8 align-self-center">
                        <h3 class="text-themecolor">@lang('admin.create') @lang('admin.batch') @lang('admin.question')</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{url('')}}/admin/page.fmp?page=1">@lang('admin.home')</a></li>
                             <li class="breadcrumb-item"><a href="{{url('')}}/admin/page.fmp?page=14">
                             @lang('admin.batch')
                             </a></li>
                            <li class="breadcrumb-item active">@lang('admin.question')</li>
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
     <ul class="nav nav-tabs profile-tab" role="tablist">
                                <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#profile" role="tab">
                                  @lang('admin.assign') @lang('admin.question') @lang('admin.to')
                                  @if(\App\Batch::find($id)->batch=='1')
   Batch A
   @elseif(\App\Batch::find($id)->batch=='2')
    Batch B
     @elseif(\App\Batch::find($id)->batch=='3')
    Batch C
     @elseif(\App\Batch::find($id)->batch=='4')
    Batch D
 @elseif(\App\Batch::find($id)->batch=='5')
    Batch E
 @elseif(\App\Batch::find($id)->batch=='6')
    Batch F
 @elseif(\App\Batch::find($id)->batch=='7')
    Batch G
 @elseif(\App\Batch::find($id)->batch=='8')
    Batch H
    @endif
                                </a> </li>
                                <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#settings" role="tab">@lang('admin.all') 
                                  @if(\App\Batch::find($id)->batch=='1')
   Batch A
   @elseif(\App\Batch::find($id)->batch=='2')
    Batch B
     @elseif(\App\Batch::find($id)->batch=='3')
    Batch C
     @elseif(\App\Batch::find($id)->batch=='4')
    Batch D
 @elseif(\App\Batch::find($id)->batch=='5')
    Batch E
 @elseif(\App\Batch::find($id)->batch=='6')
    Batch F
 @elseif(\App\Batch::find($id)->batch=='7')
    Batch G
 @elseif(\App\Batch::find($id)->batch=='8')
    Batch H
    @endif Questions History</a></li>
                            </ul>
                               <div class="tab-content">
                                <!--second tab-->
                                <div class="tab-pane active" id="profile" role="tabpanel">
                            <div class="card-body">
                              <div class="row">
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-body wizard-content">
<h4 class="card-title">Subject:
@if(\App\Batch::Find($id)->type=='1') 
  {{\App\Subject::find(\App\Batch::Find($id)->subject)->title}} @lang('admin.question'), @lang('admin.type'): @lang('admin.student')
@elseif(\App\Batch::Find($id)->type=='2')
{{\App\Batch::Find($id)->subject}} @lang('admin.question'), @lang('admin.type'): @lang('admin.staff')
@endif
  </h4>
                <h6 class="card-subtitle">Batch: {{\App\Batch::Find($id)->batch}}</h6>
    <form action="{{url('')}}/testquestion/new/{{$id}}" method="post" enctype="multipart/form-data" class="tab-wizard wizard-circle formsubmit">
         {{ csrf_field() }}
                                    <!-- Step 1 -->
                                    <h6>@lang('admin.enter') @lang('admin.question')</h6>
                                    <section>
                                        <div class="form-group" style="overflow-y: auto">
                                <label>@lang('admin.question') </label>
                               <textarea name="question" class="mymce"></textarea>
                               
                                        </div>
                                    </section>
                                    <!-- Step 2 -->
                                    <h6>@lang('admin.option') A</h6>
                                    <section>
                                        <div class="form-group">
                                     <label>@lang('admin.option') A </label>
                                      <textarea  name="opta" class="mymce"></textarea>   
                                        </div>
                                    </section>
                                    <!-- Step 3 -->
                                    <h6>@lang('admin.option') B</h6>
                                    <section>
                                        <div class="form-group">
                                             <label>@lang('admin.option') B </label><br>
                                     <textarea name="optb" class="mymce"></textarea>     
                                        </div>
                                    </section>
                                    <!-- Step 4 -->
                                    <h6>@lang('admin.option') C</h6>
                                    <section>
                                        <div >
                                             <label>@lang('admin.option') C</label><br>
                                   <textarea name="optc" class="mymce"></textarea>       
                                        </div>
                                    </section>
                                     <!-- Step 5 -->
                                    <h6>@lang('admin.option') D</h6>
                                    <section>
                                        <div >
                                 <label>@lang('admin.option') D </label><br>
                                   <textarea name="optd" class="mymce"></textarea>     
                                        </div>
                                    </section>
                                    <!-- Step 5 -->
                                    <h6>@lang('admin.setting')</h6>
                                    <section>
                                        <div class="row">

                                        <div class="col-md-3"></div>
                                    <div class="col.md-6">
                                        <label>@lang('admin.choose') @lang('admin.correct') @lang('admin.option')</label>
                                       <select required name="correct" class="form-control">
                                        <option value="">@lang('admin.choose') @lang('admin.correct') @lang('admin.option')</option>
                                           <option value="A">@lang('admin.option') A</option>
                                            <option value="B">@lang('admin.option') B</option>
                                         <option value="C">@lang('admin.option') C</option>
                                          <option value="D">@lang('admin.option') D</option>
                                       </select>     
                                        </div>
                                        <div class="col-md-3"></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-3"></div>
                                    <div class="col.md-6">
                                        <label>@lang('admin.question') @lang('admin.type')</label>
                                       <select required name="type" class="form-control">
                                        <option value="">@lang('admin.choose') @lang('admin.type')</option>
                                           <option value="required">@lang('admin.require')</option>
                                            <option value="optional">@lang('admin.optional')</option>
                                       </select>     
                                        </div>
                                        <div class="col-md-3"></div>
                                    </div>
                                     <div class="row">
                                        <div class="col-md-3"></div>
                                    <div class="col.md-6">
                                        <label>@lang('admin.instruction')</label>
                                      <textarea required name="summary" class="form-control"></textarea>    
                                        </div>
                                        <div class="col-md-3"></div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-md-3"></div>
                                    <div class="col-md-6">
                                    <input type="submit" class="form-control btn btn-primary btn-block text-white" value="@lang('admin.submit')" name="">
                                     </div>
                                        <div class="col-md-3"></div>
                                    </div>
                                    </section>
                                </form>
                        </div>
                    </div>
                </div>
            </div>
                            </div>
                          </div>
         <div class="tab-pane" id="settings" role="tabpanel">
          <div id="showresultshere">
                            <div class="card-body">
                                <h4 class="card-title">@if(\App\Batch::Find($id)->type=='1') 
  {{\App\Subject::find(\App\Batch::Find($id)->subject)->title}}  @lang('admin.question'), @lang('admin.type'): @lang('admin.student')
@elseif(\App\Batch::Find($id)->type=='2')
{{\App\Batch::Find($id)->subject}} @lang('admin.question'), @lang('admin.type'): @lang('admin.staff')
@endif</h4>
                                <h6 class="card-subtitle"></h6>
                                
                                <div class="table-responsive m-t-40">
       <table id="example23" class="display nowrap table table-hover table-striped table-bordered " cellspacing="0" width="100%">
                                       <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>@lang('admin.subject')</th>
                                                <th>@lang('admin.type')</th>
                                                <th>@lang('admin.batch')</th>
                                                <th>@lang('admin.date_create')</th>
                                                <th>@lang('admin.view')</th>
                                               <th>@lang('admin.delete')</th>  
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>#</th>
                                                <th>@lang('admin.subject')</th>
                                                <th>@lang('admin.type')</th>
                                                <th>@lang('admin.batch')</th>
                                                <th>@lang('admin.date_create')</th>
                                                <th>@lang('admin.view')</th>
                                               <th>@lang('admin.delete')</th>  
                                            </tr>
                                        </tfoot>
                      <tbody>
                @foreach(\App\Question::where('batch_id',$id)->get() as $batch)
                        <tr>
                            <td>{{$loop->iteration}}</td>
        <td>@if(\App\Batch::Find($id)->type=='1') 
  {{\App\Subject::find(\App\Batch::Find($id)->subject)->title}}
@elseif(\App\Batch::Find($id)->type=='2')
{{\App\Batch::Find($id)->subject}}
@endif</td>
                        <td>{{$batch->dom1}}</td>
                        <td>
                      @if(\App\Batch::find($id)->batch=='1')
   Batch A
   @elseif(\App\Batch::find($id)->batch=='2')
    Batch B
     @elseif(\App\Batch::find($id)->batch=='3')
    Batch C
     @elseif(\App\Batch::find($id)->batch=='4')
    Batch D
 @elseif(\App\Batch::find($id)->batch=='5')
    Batch E
 @elseif(\App\Batch::find($id)->batch=='6')
    Batch F
 @elseif(\App\Batch::find($id)->batch=='7')
    Batch G
 @elseif(\App\Batch::find($id)->batch=='8')
    Batch H
    @endif    
                        </td>
                      <td>{{\Carbon\Carbon::parse($batch->created_at)->toFormattedDateString()}}</td>
<td><button onclick="showAjaxModal('{{url('')}}/view/test/question/{{$batch->id}}')" class="btn btn-sm btn-secondary btn-block"><i class="fa fa-book"></i>@lang('admin.view')</button></td>
<td><button onclick="deletesubject('{{$batch->id}}')" class="btn btn-sm btn-danger btn-block"><i class="fa fa-trash"></i>@lang('admin.delete')</button></td>
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
</div>
</div>
<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title" id="myLargeModalLabel">{{\App\Provider::first()->name}}</h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                            </div>
                                            <div class="modal-body">
                                              
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-danger waves-effect text-left" data-dismiss="modal">@lang('admin.close')</button>
                                            </div>
                                        </div>
                                        <!-- /.modal-content -->
                                    </div>
                                    <!-- /.modal-dialog -->
                                </div>
                    <script src="{{url('')}}/js/wris.js"></script>
<script type="text/javascript">
              function deletesubject(id)
              {
                 if(confirm("@lang('admin.confirm_delete')")){ 
                $.get('{{url('')}}/delete/question/'+id,function(data)
                {
                if(data==0){
                   swal("@lang('admin.account_delete')", "@lang('admin.continue-button')", "success");
                    window.location.assign('{{url('')}}/add/batch_questions?quiz=4');
                }
            else{
                    swal("@lang('admin.error_delete')", "@lang('admin.continue-button')", "error");
                    }    
                });
            }
              }
          </script>
@endsection