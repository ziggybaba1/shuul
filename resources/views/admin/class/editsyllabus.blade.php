  <form action="{{url('')}}/edit/old/syllabus/{{$id}}" method="post" enctype="multipart/form-data" class="">
         {{ csrf_field() }}
                  <div class="row">
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-body">
<h4 class="card-title">@lang('admin.edit_syllable') {{\App\Course::find($id)->title}}</h4>
                <h6 class="card-subtitle"></h6>
         <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                              <label>@lang('admin.term')</label>
                           <select class="form-control" name="term">
                       <option value="{{\App\Syllabus::find($id)->term}}">{{\App\Syllabus::find($id)->term}}</option> 
                      </select>
                            </div>
                        </div>
                            <div class="col-md-4"> 
                            <div class="form-group">
                              <label>@lang('admin.session')</label>
                      <select class="form-control" name="session">
  <option value="{{\App\Syllabus::find($id)->session}}">{{\App\Syllabus::find($id)->session}}</option> 
                      </select>
                            </div>
                          </div>
                          <div class="col-md-4">
                            <div class="form-group">
                              <label>@lang('admin.select_subject')</label>
                           <select style="width: 100%" class="form-control select2" name="subject">
                <option value="{{\App\Syllabus::find($id)->subject}}">{{\App\Syllabus::find($id)->subject}}</option> 
                      </select>
                            </div>
                        </div>
                           <div class="col-md-12"> 
                            <div class="form-group">
                              <label>@lang('admin.detail')</label>
                          
                              <textarea class="summernote"> {!!\App\Syllabus::find($id)->content!!}</textarea>
                             
                          
                            <textarea id="showtextn" style="display: none;" class="form-control" name="detail"></textarea>

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
               $('.inline-editor').summernote({
            airMode: true
        });
                jQuery(document).ready(function() {
                      $('.select2').select2();
      $(document).ready(function() {
  $('.summernote').summernote();
});
         });
                $(function () {
          setInterval(function(){
 document.getElementById('showtextn').value =$(".summernote").val();
   }, 50);
});
            </script>