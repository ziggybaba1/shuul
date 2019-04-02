 <div class="row">
                    <div class="col-sm-12">
                         @if (session('message'))
                 <div class="alert alert-info alert-rounded">{{ session('message') }}</div>
                    @endif
                        <div class="card card-body">
                            <h4 class="card-title">Project Grade</h4>
                            <h6 class="card-subtitle">Add Project Grade</h6>
<form class="" action="{{url('')}}/add/assignment_grade/create" method="post">
     {{ csrf_field() }}
    <div class="row">
                    <div class="col-sm-4">
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
                <div class="col-sm-4">
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
                               <div  class="col-sm-4">
                             <div id="studentpage" class="form-group">
            <label for="example-email">Select Student * (3)<span class="help"></span></label>
    <select id="studentdetail" required name="student" class="form-control select2">
            </select>
                                </div>
                              </div>
             </div>
                         <div class="row">
                  <div class="col-sm-6">
                             <div class="form-group">
  <label for="example-email">Enter Student Score * (6)<span class="help"></span></label>
           <input type="number" class="form-control" name="score">
                                </div>
                              </div>
                              <div class="col-sm-6">
                             <div class="form-group">
  <label for="example-email">Enter Overall Score * (7)<span class="help"></span></label>
           <input type="number" class="form-control" name="over">
                                </div>
                              </div>
             </div>
                          
             <div class="row">
         <div class="col-sm-3"></div>
                    <div class="col-sm-6">
                 <div class="form-group">
                <input type="submit" required class="form-control btn btn-primary" value="Add Project Grade">
                    </div>  
                </div>
                        </div>
                        </form>
                        </div>
                    </div>
                </div>
                <script type="text/javascript">
$('#classdetail').change(function(){
    var countryID = $(this).val();    
    if(countryID){
        $.ajax({
           type:"GET",
           url:"{{url('/api/get_student')}}?class="+countryID,
           success:function(res){               
            if(res){
                $("#studentdetail").empty();
                $("#studentdetail").append('<option value="">All Student</option>');
                $.each(res,function(key,value){
$("#studentdetail").append('<option value="'+value['id']+'">'+value['user_id']+' '+value['fname']+'</option>');
                });
           
            }else{
               $("#studentdetail").empty();
            }
           }
        });
    }else{
        $("#studentdetail").empty();
    }      
   });
   $(document).ready(function() {
            $('.select2').select2();
         });
</script>
              