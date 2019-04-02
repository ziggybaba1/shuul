<div class="row">
                    <div class="col-sm-12">
                        
                        <div class="card card-body">
                            <h4 class="card-title">@lang('admin.new_student_award')</h4>
                            <h6 class="card-subtitle">@lang('admin.add_award')</h6>
<form class="" action="{{url('')}}/award/student/create" enctype="multipart/form-data" method="post">
     {{ csrf_field() }}
                             <div class="form-group">
            <label for="example-email">@lang('admin.select_student') *<span class="help"></span></label>
     <select required class="form-control select2" name="user_id">
         <option value="">@lang('admin.select_student')</option>
         @foreach(\App\Student::where('status','0')->get() as $student)
         <option value="{{$student->id}}">{{$student->gname}} {{$student->fname}}</option>
         @endforeach
     </select>
                                </div>
                                 <div class="form-group">
            <label for="example-email">@lang('admin.award_title') *<span class="help"></span></label>
    <input type="text" class="form-control" name="title">
                                </div>
                                 <div class="form-group">
            <label for="example-email">@lang('admin.award_describe')<span class="help"></span></label>
     <textarea class="form-control" name="description"></textarea>
                                </div>
                                <div class="form-group">
            <label for="example-email">@lang('admin.give_date')*<span class="help"></span></label>
    <input type="date" class="form-control mdate" name="date">
                                </div>
                                 <div class="form-group">
            <label for="example-email">@lang('admin.upload_doc') *<span class="help"></span></label>
    <input type="file" class="form-control" name="file">
                                </div>
                                       
             <div class="row">
         <div class="col-sm-3"></div>
                    <div class="col-sm-6">
                 <div class="form-group">
                <input type="submit" required class="form-control btn btn-primary text-white" value="@lang('admin.submit')">
                    </div>  
                </div>
                        </div>
                        </form>
                        </div>
                    </div>
                </div>
    <script type="text/javascript">
         $('.mdate').bootstrapMaterialDatePicker({
        weekStart: 0,
        time: false
    });
         $('.mtime').bootstrapMaterialDatePicker({
       date: false,
        shortTime: false,
        format: 'HH:mm'
    });
          $(document).ready(function() {
            $('.select2').select2();
         });
    </script>