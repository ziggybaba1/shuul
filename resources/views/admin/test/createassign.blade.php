<div class="row">
                    <div class="col-sm-12">
                        <div class="card card-body">
                            <h4 class="card-title">Electronics Test</h4>
                            <h6 class="card-subtitle">Assign Electronic Test</h6>
<form class="formsubmit" action="{{url('')}}/assign/test/create" method="post">
     {{ csrf_field() }}
    <div class="row">
                    <div class="col-sm-6">
                             <div class="form-group">
            <label for="example-email">Select Subject * (1)<span class="help"></span></label>
            <select name="subject" id="testdetail" required class="form-control select2">
                <option></option>
                 @foreach(\App\Subject::all() as $class)
                            <option value="{{$class->id}}">{{$class->title}}</option>
                     @endforeach
            </select>
                                </div>
                              </div>
                <div class="col-sm-6">
                             <div class="form-group">
            <label for="example-email">Select Class * (2)<span class="help"></span></label>
            <select id="classdetail" name="class" required class="form-control select2">
                <option></option>
                 @foreach(\App\Course::all() as $class)
                            <option value="{{$class->id}}">{{$class->title}}</option>
                     @endforeach
            </select>
                                </div>
                              </div>
             </div>
                         <div class="row">
                             <div class="col-sm-4">
                             <div class="form-group">
            <label for="example-email">Select Type * (3)<span class="help"></span></label>
    <select id="choosetype" name="type" required class="form-control">
         <option value="specific" id="specific">Specific Student</option>
        <option value="all" id="all">All Student</option>
            </select>
                                </div>
                              </div>
                    <div  class="col-sm-5">
                             <div id="studentpage" class="form-group">
            <label for="example-email">Select Student * (4)<span class="help"></span></label>
    <select id="studentdetail" name="student[]" multiple class="form-control select2">
            </select>
                                </div>
                              </div>
                  <div class="col-sm-3">
                             <div class="form-group">
            <label for="example-email">Select Batch * (5)<span class="help"></span></label>
            <select name="batch" id="testerdetail" required class="form-control select2">
              
            </select>
                                </div>
                              </div>
             </div>
                          
             <div class="row">
         <div class="col-sm-3"></div>
                    <div class="col-sm-6">
                 <div class="form-group">
                <input type="submit" required class="form-control btn btn-primary" value="Assign Test">
                    </div>  
                </div>
                        </div>
                        </form>
                        </div>
                    </div>
                </div>
                <script type="text/javascript">
        $(document).ready(function() {
            $(".select2").select2();
        });
         $('#mdate').bootstrapMaterialDatePicker({
        weekStart: 0,
        time: false
    });
    </script>