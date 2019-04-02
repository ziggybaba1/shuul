
 <div class="row">
                    <div class="col-sm-12">
                         @if (session('message'))
                 <div class="alert alert-info alert-rounded">{{ session('message') }}</div>
                    @endif
                        <div class="card card-body">
                            <h4 class="card-title">@lang('admin.new_forum')</h4>
                            <h6 class="card-subtitle">@lang('admin.add_forum')</h6>
<form class="" action="{{url('')}}/add/new/forum" method="post">
     {{ csrf_field() }}
     <div class="row">
      <div class="col-md-12">
      <div class="form-group">
        <label>@lang('admin.forum_title')</label>
        <input type="text" class="form-control" name="forum_title">
      </div>
    </div>
  </div>
   <div class="row">
    <div class="col-md-4">
      <div class="form-group">
        <label>@lang('admin.staff_member')</label>
       <select id="staff" class="form-control select2" multiple name="staff[]">
        <option id="nones" value="">@lang('admin.none')</option>
        <option id="alls" value="all">@lang('admin.all_staff')</option>
@foreach(\App\Teacher::where('status','0')->get() as $staff)
        <option value="{{$staff->user_table}}">{{$staff->gname}} {{$staff->fname}}</option>
@endforeach
       </select>
      </div>
    </div>
    <div class="col-md-4">
      <div class="form-group">
        <label>@lang('admin.student_member')</label>
       <select id="student" class="form-control select2" multiple name="student[]">
        <option id="noness" value="">@lang('admin.none')</option>
        <option id="allss" value="all">@lang('admin.all_student')</option>
@foreach(\App\Student::where('status','0')->get() as $student)
        <option value="{{$student->data_id}}">{{$student->user_id}} {{$student->gname}} {{$student->fname}}</option>
@endforeach
       </select>
      </div>
    </div>
    <div class="col-md-4">
      <div class="form-group">
        <label>@lang('admin.parent_member')</label>
       <select id="parent" multiple class="form-control select2" name="parent[]">
        <option id="nonep" value="">@lang('admin.none')</option>
        <option id="allp" value="all">@lang('admin.all_parent')</option>
@foreach(\App\Parenting::where('status','0')->get() as $parent)
        <option value="{{$parent->user_id}}">{{$parent->name}}</option>
@endforeach
       </select>
      </div>
    </div>
  </div>
        <div class="form-group">
        <label>@lang('admin.forum_describe')</label>
       <textarea class="form-control" rows="5" name="description"></textarea>
      </div>
             <div class="row">
         <div class="col-sm-3"></div>
                    <div class="col-sm-6">
                 <div class="form-group">
                <input type="submit" required class="form-control btn btn-primary" value="@lang('admin.submit')">
                    </div>  
                </div>
                        </div>
                        </form>
                        </div>
                    </div>
                </div>
               <script type="text/javascript">
   $(document).ready(function() {
            $('.select2').select2();
            $('.mymce').summernote({
            
            minHeight: 500, // set minimum height of editor
            maxHeight: 500, // set maximum height of editor
            focus: false // set focus to editable area after initializing summernote
        });
         });
    $("#parent").change(function(){
  var id = $(this).find("option:selected").attr("id");
  if(id=='allp'||id=='nonep')
  { $(this).removeAttr('multiple');}
  else{
    $(this).attr('multiple','multiple');
  }
});
    $("#staff").change(function(){
  var id = $(this).find("option:selected").attr("id");
  if(id=='alls'||id=='nones')
  { $(this).removeAttr('multiple');}
  else{
    $(this).attr('multiple','multiple');
  }
});
    $("#student").change(function(){
  var id = $(this).find("option:selected").attr("id");
  if(id=='allss'||id=='noness')
  { $(this).removeAttr('multiple');}
  else{
    $(this).attr('multiple','multiple');
  }
});
</script>
