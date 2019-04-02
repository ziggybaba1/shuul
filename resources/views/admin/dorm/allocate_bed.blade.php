<div class="row">
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-body">
<h4 class="card-title">@lang('admin.allocate_bed') {{\App\Bed::find($id)->name}} {{\App\Bed::find($id)->number}}</h4>
                <h6 class="card-subtitle"></h6>
    <form action="{{url('')}}/add/bed/allocate/{{$id}}" method="post" enctype="multipart/form-data" class="">
         {{ csrf_field() }}
         <div class="row">
                        <div class="col-md-4">
                                      <div class="form-group">
                                         <label>@lang('admin.select_class')</label>
                                      <select id="classdetail" name="class" required class="form-control select2">
                <option></option>
                 @foreach(\App\Course::all() as $class)
                            <option value="{{$class->id}}">{{$class->title}}</option>
                     @endforeach
            </select>
                                      </div>   
                            </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                        <label for="example-email">@lang('admin.select_student')<span class="help"></span></label>
                      <select id="studentdetail" required name="student" class="form-control select2">
                          </select>
                                      </div>   
                                </div>
                                 <div class="col-md-4">
                                        <div class="form-group">
                                        <label for="example-email">@lang('admin.allocate_date')<span class="help"></span></label>
                                        <input type="text" required class="form-control mdate" name="date">
                     
                                      </div>   
                                </div>       
                                    </div>
      <hr>
                                     <div class="row">
                                        <div class="col-md-4"></div>
                                    <div class="col-md-4">
                     
                                     </div>
                                        <div class="col-md-4"> <input type="submit" class="form-control btn btn-primary text-white" value="@lang('admin.submit')"></div>
                                    </div>
                                  </form>
                        </div>
                    </div>
                </div>
            </div>
            <script type="text/javascript">
              $('.select2').select2();
              $('#classdetail').change(function(){
    var countryID = $(this).val();    
    if(countryID){
        $.ajax({
           type:"GET",
           url:"{{url('/api/get_student')}}?class="+countryID,
           success:function(res){               
            if(res){
                $("#studentdetail").empty();
                $("#studentdetail").append('<option value=""></option>');
                $.each(res,function(key,value){
$("#studentdetail").append('<option value="'+value['id']+'">'+value['user_id']+' '+value['gname']+' '+value['fname']+'</option>');
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
              $('.mdate').bootstrapMaterialDatePicker({
        weekStart: 0,
        time: false
    });
            </script>