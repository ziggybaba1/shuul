
<div class="row">
                    <div class="col-12">
                          @if (session('message'))
                 <div class="alert alert-info alert-rounded">{{ session('message') }}</div>
                    @endif
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">@lang('admin.lesson_note')</h4>
                                <h6 class="card-subtitle"></h6>
                                 <div class="pull-left">
                               
                             </div>
                                 <div class="pull-right">
                                 <button data-toggle="modal" data-target=".bs-example-modal-lg" class="btn btn-primary btn-bg">@lang('admin.add_lesson_note')</button>
                             </div>
                                <div class="table-responsive m-t-40">
                                    <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>@lang('admin.session')</th>
                                                <th>@lang('admin.term')</th>
                                                <th>@lang('admin.subject')</th>
                                                <th>@lang('admin.topic')</th>
                                                <th>@lang('admin.print')</th>
                                                <th>@lang('admin.edit')</th>
                                                <th>@lang('admin.delete')</th>
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
                                                <th>@lang('admin.edit')</th>
                                                <th>@lang('admin.delete')</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                        @foreach(\App\Lessonote::where('class_id',$id)->get() as $class)
                                            <tr>
                                                <td>{{$loop->iteration}}</td>
                                                <td>{{$class->session}}</td>
                                                <td>{{$class->term}}</td>
                                                <td>{{$class->subject}}</td>
                                                <td>{{$class->topic}}</td>
                            <td><button onclick="showAjaxModal('{{url('')}}/admin/print/lesson-note/{{$class->id}}')" class="btn btn-default btn-sm btn-block"><i class="fa fa-plus"></i>@lang('admin.print')</button></td>
                <td><button onclick="showAjaxModal('{{url('')}}/admin/add/lesson-note/{{$class->id}}')" class="btn btn-info btn-sm btn-block"><i class="fa fa-book"></i>@lang('admin.edit')</button></td>
                    <td><button onclick="deletelesson('{{$class->id}}')" class="btn btn-danger btn-sm btn-block"><i class="fa fa-book"></i>@lang('admin.delete')</button></td>
                                            </tr>
                        @endforeach
                                        </tbody>
                                    </table>
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
      <form action="{{url('')}}/add/new/lesson-note/{{$id}}" method="post" enctype="multipart/form-data" class="">
         {{ csrf_field() }}
                  <div class="row">
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-body">
<h4 class="card-title">@lang('admin.add_lesson_note') {{\App\Course::find($id)->title}}</h4>
                <h6 class="card-subtitle"></h6>
         <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                              <label>@lang('admin.term')</label>
                           <select class="form-control" name="term">
                       <option value="First">@lang('admin.first_term')</option>
                        <option value="Second">@lang('admin.second_term')</option>
                         <option value="Third">@lang('admin.third_term')</option>
                         <option value="Fourth">@lang('admin.fourth_term')</option> 
                      </select>
                            </div>
                        </div>
                            <div class="col-md-4"> 
                            <div class="form-group">
                              <label>@lang('admin.session')</label>
                      <select class="form-control" name="session">
<option value="{{\Carbon\Carbon::today()->subYear(1)->format('Y')}}/{{\Carbon\Carbon::today()->subYear(0)->format('Y')}}">{{\Carbon\Carbon::today()->subYear(1)->format('Y')}}/{{\Carbon\Carbon::today()->subYear(0)->format('Y')}}</option>
<option value="{{\Carbon\Carbon::today()->subYear(0)->format('Y')}}/{{\Carbon\Carbon::today()->subYear(-1)->format('Y')}}">{{\Carbon\Carbon::today()->subYear(0)->format('Y')}}/{{\Carbon\Carbon::today()->subYear(-1)->format('Y')}}</option>
                      </select>
                            </div>
                          </div>
                          <div class="col-md-4">
                            <div class="form-group">
                              <label>@lang('admin.select_subject')</label>
                           <select style="width: 100%" class="form-control select2" name="subject">
                @foreach(\App\Subject::where('class',$id)->get() as $subject)
                       <option value="{{$subject->title}}">{{$subject->title}}</option>
                @endforeach
                      </select>
                            </div>
                        </div>
                         <div class="col-md-12"> 
                            <div class="form-group">
                              <label>@lang('admin.topic')</label>
                              <input type="text" class="form-control" name="topic">
                            </div>
                          </div>
                           <div class="col-md-12"> 
                            <div class="form-group">
                              <label>@lang('admin.detail')</label>
                         <textarea class="form-control mymce"></textarea>
                            </div>
                            <textarea id="showtext" style="display: none;" class="form-control" name="detail"></textarea>

                            </div>
                                      </div>
                                        </div>
                                    </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-8">
                  <button type="submit" class="btn btn-success btn-md btn-block">@lang('admin.submit')</button>
                </div>
                <div class="col-md-2"></div>
              </div>
            </form>
                <script type="text/javascript">
                    $('#example23').DataTable({
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    });
          jQuery(document).ready(function() {
                      $('.select2').select2();
                    });
      $(document).ready(function() {
  $('.mymce').summernote({
            
            minHeight: 300, // set minimum height of editor
            maxHeight: 500, // set maximum height of editor
            focus: false // set focus to editable area after initializing summernote
        });
});
      $(function () {
          setInterval(function(){
 document.getElementById('showtext').value =$(".mymce").val();
   }, 1000);
});
      function deletelesson(id)
              {
                if(confirm("@lang('admin.confirm_delete')")){ 
                $.get('{{url('')}}/delete/lesson-note/'+id,function(data)
                {
                if(data==0){
                  swal("@lang('admin.account_delete')", "@lang('admin.continue-button')", "success");
                    window.location.assign('{{url('')}}/admin/page.fmp?page=56');
                }
            else{
                     swal("@lang('admin.error_delete')", "@lang('admin.continue-button')", "error");
                    }    
                });
            }
              }
                </script>