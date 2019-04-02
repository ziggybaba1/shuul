@extends('layouts.admin')
@section('content')

    <div class="row page-titles">
                    <div class="col-md-5 col-8 align-self-center">
                        <h3 class="text-themecolor">@lang('admin.guardian') @lang('admin.list')</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{url('')}}/admin/page.fmp?page=1">@lang('admin.home')</a></li>
                            <li class="breadcrumb-item active">@lang('admin.guardian') @lang('admin.list')</li>
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
                                <h4 class="card-title">@lang('admin.guardian') @lang('admin.export')</h4>
                                <h6 class="card-subtitle">@lang('admin.event-list-data')</h6>
                                 <div class="pull-right">
                                 <button data-toggle="modal" data-target=".bs-example-modal-lg" class="btn btn-primary btn-bg">Add Guardian</button>
                             </div>
                                <div class="table-responsive m-t-40">
       <table id="example23" class="display nowrap table table-hover table-striped table-bordered " cellspacing="0" width="100%">
                                       <thead>
                                            <tr>
                                                <th>@lang('admin.guardian_id')</th>
                                                <th>@lang('admin.name')</th>
                                                <th>@lang('admin.phone')</th>
                                                <th>@lang('admin.address')</th>
                                                <th>@lang('admin.no_student')</th>
                                                <th>@lang('admin.detail')</th>
                                                <th>@lang('admin.edit')</th>
                                                <th>@lang('admin.delete')</th> 
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                              <th>@lang('admin.guardian_id')</th>
                                                <th>@lang('admin.name')</th>
                                                <th>@lang('admin.phone')</th>
                                                <th>@lang('admin.address')</th>
                                                <th>@lang('admin.no_student')</th>
                                                <th>@lang('admin.detail')</th>
                                                <th>@lang('admin.edit')</th>
                                                <th>@lang('admin.delete')</th> 
                                            </tr>
                                        </tfoot>
                      <tbody>
                @foreach(\App\Parenting::where('status','1')->get() as $batch)
                        <tr>
                            <td>{{$loop->iteration}}</td>
        <td>{{$batch->name}}</td>
        <td>{{$batch->phone}}</td>
                        <td>{{$batch->address}}</td>
                      <td>{{count(\App\Related::where('guardian_id',$batch->id)->get())}}</td>
                      <td>
  @foreach(\App\Related::where('guardian_id',$batch->id)->get() as $relate)
  {{\App\Student::find($relate->student_id)->gname}} {{\App\Student::find($relate->student_id)->fname}} ({{\App\Course::find(\App\Student::find($relate->student_id)->class)->title}})<br>
  @endforeach
                      </td>
<td><button onclick="showAjaxModal('{{url('')}}/edit/guardian/profile/{{$batch->id}}')" class="btn btn-sm btn-info btn-block"><i class="fa fa-book"></i>@lang('admin.edit')</button></td>
<td><button onclick="showAjaxModal('{{url('')}}/suspend/guardian/{{$batch->id}}')" class="btn btn-sm btn-danger btn-block"><i class="fa fa-trash"></i>@lang('admin.delete')</button></td>
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
<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title" id="myLargeModalLabel">{{\App\Provider::first()->name}}</h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                            </div>
                                            <div class="modal-body">
                                              <div class="row">
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-body">
<h4 class="card-title">@lang('admin.add') @lang('admin.new') @lang('admin.guardian')</h4>
                <h6 class="card-subtitle"></h6>
    <form action="{{url('')}}/add/new/guardian" method="post" enctype="multipart/form-data" class="">
         {{ csrf_field() }}
         <div class="row">
                        <div class="col-md-4">
                                      <div class="form-group">
                                         <label>@lang('admin.name')</label>
                                        <input type="text" class="form-control" name="name">
                                      </div>   
                            </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                         <label>@lang('admin.email_username')</label>
                                        <input type="text" class="form-control" name="email">
                                      </div>   
                                </div>
                                        <div class="col-md-4">
                                           <div class="form-group">
                                         <label>@lang('admin.password')</label>
                                        <input type="text" class="form-control" name="password">
                                      </div>   
                                        </div>
                                    </div>
        <div class="row">
                        <div class="col-md-4">
                                      <div class="form-group">
                                         <label>@lang('admin.phone')</label>
                                        <input type="tel" id="phone" class="form-control" name="phone">
                                         <span id="valid-msg" class="hide">✓ @lang('admin.valid')</span>
                                        <span id="error-msg" class="hide"></span>
                                      </div>   
                                        </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                         <label>@lang('admin.address')</label>
                                        <input type="text" class="form-control" name="address">
                                      </div>   
                                        </div>
                                        <div class="col-md-4">
                                           <div class="form-group">
                                         <label>@lang('admin.profession')</label>
                                        <input type="text" class="form-control" name="work">
                                      </div>   
                                        </div>
                                    </div>
                                    <div class="row">
                        <div class="col-md-4">
                                      <div class="form-group">
                                         <label>@lang('admin.upload_image')</label>
                                        <input type="file" class="form-control" name="file">
                                      </div>   
                                        </div>
                                        <div class="col-md-4">
                                      <div class="form-group">
                                         <label>@lang('admin.assign') @lang('admin.student')</label>
                          <select multiple class="form-control select2" style="width: 100%;" name="student[]">
                            <option value="">Select Ward(s)</option>
                            @foreach(\App\Student::where('status','0')->get() as $student)
                            <option value="{{$student->id}}">{{$student->user_id}} {{$student->gname}} {{$student->fname}}</option>
                          @endforeach
                          </select>
                                      </div>   
                                        </div>
                                    </div>
                                     <div class="row">
                                        <div class="col-md-2"></div>
                                    <div class="col-md-8">
                      <input type="submit" class="form-control btn btn-primary btn-block" value="@lang('admin.submit')">
                                     </div>
                                        <div class="col-md-2"></div>
                                    </div>
                                  </form>
                        </div>
                    </div>
                </div>
            </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-danger waves-effect text-left" data-dismiss="modal">@lang('admin.close')</button>
                                            </div>
                                        </div>
                                        <!-- /.modal-content -->
                                    </div>
                                    <!-- /.modal-dialog -->
                                </div>
<script type="text/javascript">
              function deletesubject(id)
              {
                if(confirm("@lang('admin.confirm_delete')")){ 
                $.get('{{url('')}}/delete/guardian/'+id,function(data)
                {
                if(data==0){
                  swal("@lang('admin.account_delete')", "@lang('admin.continue-button')", "success");
                    window.location.assign('{{url('')}}/admin/page.fmp?page=23');
                }
            else{
                     swal("@lang('admin.error_delete')", "@lang('admin.continue-button')", "error");
                    }    
                });
            }
              }
          </script>
@endsection