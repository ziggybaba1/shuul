
<div class="card card-body">
                            <h4 class="card-title">Teacher Forms</h4>
                            <h6 class="card-subtitle"> Edit Teacher</h6>
<form action="{{url('')}}/edit_new/teacher/{{$id}}" enctype="multipart/form-data" method="post" class="form-horizontal m-t-40">
                                 {{ csrf_field() }} 
    <div class="row">
                    <div class="col-sm-6">
                             <div class="form-group">
            <label for="example-email">Given Name *<span class="help"></span></label>
<input name="gname" type="text" value="{{\App\Teacher::find($id)->gname}}" required id="example-email"  class="form-control" placeholder="Given Name">
                                </div>
                                  <div class="form-group">
            <label for="example-email">Middle Name<span class="help"></span></label>
               <input name="mname" value="{{\App\Teacher::find($id)->mname}}" type="text" id="example-email"  class="form-control" placeholder="Middle Name">
                                </div>
                                  <div class="form-group">
            <label for="example-email">Family Name *<span class="help"></span></label>
               <input name="fname" value="{{\App\Teacher::find($id)->fname}}" type="text" required id="example-email"  class="form-control" placeholder="Family Name">
                                </div>
                                  <div class="form-group">
            <label for="example-email">Father Name<span class="help"></span></label>
               <input name="faname" value="{{\App\Teacher::find($id)->faname}}" type="text" id="example-email"  class="form-control" placeholder="Father Name">
                                </div>
                                  <div class="form-group">
            <label for="example-email">Mother Name<span class="help"></span></label>
               <input name="maname" value="{{\App\Teacher::find($id)->maname}}" type="text" id="example-email"  class="form-control" placeholder="Mother Name">
                                </div>
                                <div class="form-group">
            <label for="example-email">Date of Birth<span class="help"></span></label>
               <input name="dob" value="{{\App\Teacher::find($id)->dob}}" type="text" id="mdate" placeholder="Date of Birth"  class="form-control" >
                                </div>
                                 
                                <div class="form-group">
            <label for="example-email">Present Address<span class="help"></span></label>
               <textarea  value="{{\App\Teacher::find($id)->paddress}}" name="praddress" placeholder="Present Address" class="form-control"></textarea>
                                </div>
                                <div class="form-group">
            <label for="example-email">Permanent Address<span class="help"></span></label>
               <textarea value="{{\App\Teacher::find($id)->peaddress}}" name="peaddress" placeholder="Permanent Address" class="form-control"></textarea>
                                </div>
                            </div>
                    <div class="col-sm-6">
                    <div class="form-group">
                    <label for="example-email">Phone Number<span class="help"></span></label>
                <input value="{{\App\Teacher::find($id)->mobile}}" name="mobile" type="text" id="example-email"  class="form-control" placeholder="Phone Number">
                                </div>
             <div class="form-group">
                    <label for="example-email">change Username<span class="help"></span></label>
                <input name="username" value="{{\App\Teacher::find($id)->username}}" type="text" id="example-email"  class="form-control" placeholder="Username">
                                </div>
                                 <div class="form-group">
                    <label for="example-email">change Password<span class="help"></span></label>
                <input name="password" type="text" id="example-email"  class="form-control" placeholder="Password">
                                </div>
                                 <div class="form-group">
                    <label for="example-email">Post/Position<span class="help"></span></label>
                <input name="position" value="{{\App\Teacher::find($id)->position}}" type="text" id="example-email"  class="form-control" placeholder="e.g Teacher, Head Master, Principal....">
                                </div>
                                 <div class="form-group">
                    <label for="example-email">Assign Class<span class="help"></span></label>
               <select name="assign" class="form-control">
          <option value="{{\App\Teacher::find($id)->assign}}">{{\App\Course::find(\App\Teacher::find($id)->assign)->title}}</option>
                   @foreach(\App\Course::all() as $class)
                   <option value="{{$class->id}}">{{$class->title}}</option>
                   @endforeach
               </select>
                                </div>
                                <div class="form-group">
                    <label for="example-email">Assign Subjects<span class="help"></span></label>
               <select name="subassign[]" multiple class="form-control select2">
      @foreach(\App\Teachsub::where('teach_id',$id)->get() as $sub)
<option selected value="{{$sub->subject_id}}">{{\App\Subject::find($sub->subject_id)->title}}</option>
@endforeach
                   @foreach(\App\Subject::all() as $subject)
                   <option value="{{$subject->id}}">{{$subject->title}}</option>
                   @endforeach
               </select>
                                </div>
                                  <div class="form-group">
                    <label for="example-email">Working Hour<span class="help"></span></label>
               <select name="work" class="form-control">
                   <option value="full">Full Time</option>
                   <option value="part">Part Time</option>
               </select>
                                </div>
                                <div class="form-group">
                        <label>Teacher Image<span class="help"></span></label>
            <input type="file" name="image" id="input-file-now-custom-1" class="dropify" data-default-file="" />
                                </div>
                               <div class="form-group">
                            <input type="submit" class="form-control btn btn-primary" value="Save Information">
                                </div>
                            </div>
                        </div>
                            </form>
                        </div>
<script type="text/javascript">
   $(document).ready(function() {
            $('.select2').select2();
         });
</script>