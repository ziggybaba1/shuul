<div class="row">
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-body">
<h4 class="card-title">Edit Student Enrollment</h4>
                <h6 class="card-subtitle"></h6>
    <form action="{{url('')}}/edit/student/enroll/{{$id}}" method="post" enctype="multipart/form-data" class="">
         {{ csrf_field() }}
         <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                              <label>Student</label>
                            <select style="width: 100%;" class="form-control select2" name="staff">
              <option value="{{\App\Enroll::find($id)->user_id}}">{{\App\Enroll::find($id)->name}}</option>
                            </select>
                            </div>
                            </div>
                             <div class="col-md-6"> 
                            <div class="form-group">
                              <label>Select Course</label>
                          <select style="width: 100%;" multiple class="form-control select2" name="course[]">
            @foreach(\App\Subscription::where('enroll_id',$id)->get() as $course)
                      <option selected value="{{$course->course_id}}">{{\App\Work::find($course->course_id)->title}}</option>
                      @endforeach
                        @foreach(\App\Work::all() as $work)
                              <option value="{{$work->id}}">{{$work->title}}</option>
                    @endforeach
                            </select>
                            </div> 
                        </div>
                    </div>
            <div class="row">
                        <div class="col-md-6">
                             <div class="form-group">
                              <label>Change Plan</label>
                            <select style="width: 100%;" class="form-control select2" name="plan">
                      <option value="{{\App\Enroll::find($id)->plan}}">{{\App\Plan::find(\App\Enroll::find($id)->plan)->name}}</option>
                        @foreach(\App\Plan::all() as $plan)
                              <option value="{{$plan->id}}">{{$plan->name}}</option>
                    @endforeach
                            </select>
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
               $(document).ready(function() {
            $('.select2').select2();
         });
            </script>