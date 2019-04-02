<div class="row">
	<div class="card card-body">
		 <h4 class="card-title">@lang('admin.edit_med_report')</h4>
                <h6 class="card-subtitle"></h6>
    <form action="{{url('')}}/edit/health/report/{{$id}}" method="post" enctype="multipart/form-data" class="">
         {{ csrf_field() }}
         <div class="row">
                        <div class="col-md-4">
                                      <div class="form-group">
                                         <label>@lang('admin.select_class')</label>
                                      <select name="class" required class="form-control select2">
      <option value="{{\App\Report::find($id)->class}}">{{\App\Course::find(\App\Report::find($id)->class)->title}}</option>
            </select>
                                      </div>   
                            </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                        <label for="example-email">@lang('admin.select_student')<span class="help"></span></label>
                      <select id="studentdetail" required name="student" class="form-control select2">
           <option value="{{\App\Report::find($id)->student_id}}">{{\App\Student::find(\App\Report::find($id)->student_id)->user_id}} {{\App\Student::find(\App\Report::find($id)->student_id)->gname}} {{\App\Student::find(\App\Report::find($id)->student_id)->fname}}</option>
                          </select>
                                      </div>   
                                </div>
                                <div class="col-md-2">
                                        <div class="form-group">
                                        <label for="example-email">@lang('admin.date')<span class="help"></span></label>
                      <input type="text" value="{{\App\Report::find($id)->date}}" readonly name="date" class="form-control mdate">
                                      </div>   
                                </div>
                                <div class="col-md-2">
                                        <div class="form-group">
                                        <label for="example-email">@lang('admin.time')<span class="help"></span></label>
                      <input type="text" value="{{\App\Report::find($id)->time}}" readonly name="time" class="form-control mtime">
                                      </div>   
                                </div>
                                 <div class="col-md-12">
                                        <div class="form-group">
                                        <label for="example-email">@lang('admin.reprt')<span class="help"></span></label>
                @if(\App\Report::find($id)->sign_id==\Auth::user()->id)
                        <textarea class="form-control mymce" name="report">{!!\App\Report::find($id)->report!!}</textarea>
                 @elseif(\App\Report::find($id)->sign_id!=\Auth::user()->id)
                <div>{!!\App\Report::find($id)->report!!}</div>
                 @endif
                                      </div>   
                                </div>       
                                    </div>
      <hr>
                                     <div class="row">
                                        <div class="col-md-4"></div>
                                    <div class="col-md-4">
                       @if(\App\Report::find($id)->sign_id==\Auth::user()->id)
                     <input type="submit" class="form-control btn btn-primary text-white" value="@lang('admin.submit')">
                     @endif
                                     </div>
                                        <div class="col-md-4"> </div>
                                    </div>
                                  </form>    
	</div>

</div>
<script type="text/javascript">
	 jQuery(document).ready(function() {

        $('.mymce').summernote({
            
            minHeight: 200, // set minimum height of editor
            maxHeight: 500, // set maximum height of editor
            focus: false // set focus to editable area after initializing summernote
        });

        $('.inline-editor').summernote({
            airMode: true
        });

    });
</script>