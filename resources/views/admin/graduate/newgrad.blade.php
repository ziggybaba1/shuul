<div class="row">
                    <div class="col-sm-12">
                        
                        <div class="card card-body">
                            <h4 class="card-title">@lang('admin.grad_stud')</h4>
                            <h6 class="card-subtitle">@lang('admin.add') @lang('admin.grad_stud')</h6>
<form class="" action="{{url('')}}/create/graduate/student" enctype="multipart/form-data" method="post">
     {{ csrf_field() }}
                             <div class="form-group">
            <label for="example-email">@lang('admin.class') *<span class="help"></span></label>
     <select id="classdetail" required class="form-control select2" name="user_id">
         <option value="">@lang('admin.select_class')</option>
         @foreach(\App\Course::all() as $student)
         <option value="{{$student->id}}">{{$student->title}}</option>
         @endforeach
     </select>
                                </div>
                                 <div class="form-group">
            <label for="example-email">@lang('admin.select_student') *<span class="help"></span></label>
    <select id="studentdetail" multiple class="form-control select2" name="student[]">
        
    </select>
                                </div>  
                                <div class="form-group">
            <label for="example-email">@lang('admin.grad_date') *<span class="help"></span></label>
    <input type="text" class="form-control mdate" name="date">
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
          $('#classdetail').change(function(){
    var countryID = $(this).val();    
    if(countryID){
        $.ajax({
           type:"GET",
           url:"{{url('/api/get_student')}}?class="+countryID,
           success:function(res){               
            if(res){
                $("#studentdetail").empty();
                $("#studentdetail").append('<option value="">@lang('admin.sel_mult_stud')</option>');
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
    </script>