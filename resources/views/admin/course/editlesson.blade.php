<div class="row">
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-body">
<h4 class="card-title">Edit {{\App\Work::find(\App\Lesson::find($id)->course_id)->title}} Course</h4>
                <h6 class="card-subtitle">Edit {{\App\Lesson::find($id)->title}}</h6>
    <form action="{{url('')}}/edit/lesson/course/{{$id}}" method="post" enctype="multipart/form-data" class="">
         {{ csrf_field() }}
         <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                              <label>Title</label>
                             <input value="{{\App\Lesson::find($id)->title}}" type="text" class="form-control" name="title">
                            </div>
                            </div>
                             <div class="col-md-6"> 
                            <div class="form-group">
                              <label>Section</label>
                            <select style="width: 100%;" class="form-control select2" name="section">
                                <option>{{\App\Lesson::find($id)->section}}</option>
                        @foreach(\App\Section::where('course_id',\App\Lesson::find($id)->course_id)->get() as $section)
                            <option value="{{$section->title}}">{{$section->title}}</option> 
                        @endforeach   
                            </select>
                            </div> 
                        </div>
                    </div>
            <div class="row">
                        <div class="col-md-6">
                             <div class="form-group">
                              <label>Video Url</label>
                             <input value="{{\App\Lesson::find($id)->video}}" type="text" class="form-control" name="video">
                            </div>
                        </div>
                         <div class="col-md-6">
                             <div class="form-group">
                              <label>Duration</label>
                             <input value="{{\App\Lesson::find($id)->duration}}" type="text" class="form-control" name="duration">
                            </div>
                            </div>
                            </div>
                            <div class="row">
                        <div class="col-md-6"> 
                             <div class="form-group">
                              <label>Video Provider</label>
                             <input type="text" value="{{\App\Lesson::find($id)->provider}}" class="form-control" name="provider">
                            </div>
                        </div>
                         <div class="col-md-6">
                             <div class="form-group">
                              <label>Thumbnail</label>
                    <img width="100px" src="{{url('')}}/uploads/thumbnail/{{\App\Lesson::find($id)->image}}">
                             <input type="file" class="form-control" name="file">
                            </div>     
                            </div>
                        </div>
                        <div class="row">
                           <div class="col-md-12">
                             <div class="form-group">
                              <label>Edit Lesson Project</label>
                    <textarea class="form-control mymcen">{!!\App\Lesson::find($id)->project!!}</textarea>
                    <textarea style="display: none;" id="showarea" name="project"></textarea>
                           </div>
                           </div>
                       </div>
                        <div class="row">
                           <div class="col-md-6">
                            <div class="form-group">
                              <label>Complete Project Before Proceeding</label>
                              <select class="form-control" name="status">
                            @if(\App\Lesson::find($id)->status=='Yes')
                                  <option>Yes</option>
                                  <option>No</option>
                        @else
                         <option>No</option>
                                  <option>Yes</option>
                                  @endif
                              </select> 
                           </div>
                           </div> 
                           <div class="col-md-6">
                            <div class="form-group">
                              <label>Lesson Index</label>
                            <input type="number" class="form-control" value="{{\App\Lesson::find($id)->index}}" name="index">
                           </div>
                           </div> 
                       </div>
                                     <div class="row">
                                        <div class="col-md-2"></div>
                                    <div class="col-md-8">
                      <input type="submit" class="form-control btn btn-primary btn-block" value="Submit">
                                     </div>
                                        <div class="col-md-2"></div>
                                    </div>
                                  </form>
                        </div>
                    </div>
                </div>
            </div>
            <script type="text/javascript">
                jQuery(document).ready(function() {

        $('.mymcen').summernote({
            
            minHeight: null, // set minimum height of editor
            maxHeight: null, // set maximum height of editor
            focus: false // set focus to editable area after initializing summernote
        });
    });
                $(function () {
    setInterval(function(){
 document.getElementById('showarea').value =$(".mymcen").val();
   }, 1000);
});
            </script>