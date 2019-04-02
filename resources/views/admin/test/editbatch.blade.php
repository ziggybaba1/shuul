<div class="row">
                    <div class="col-sm-12">
                         @if (session('message'))
                 <div class="alert alert-info alert-rounded">{{ session('message') }}</div>
                    @endif
                        <div class="card card-body">
                            <h4 class="card-title">@lang('admin.cbt')</h4>
                            <h6 class="card-subtitle">@lang('admin.edit') @lang('admin.cbt') @lang('admin.batch')</h6>
<form class="formsubmit" action="{{url('')}}/testhead/edit/create/{{$id}}" method="post">
     {{ csrf_field() }}
   <div class="row">
       <div class="col-md-6">
                             <div class="form-group">
            <label for="example-email">@lang('admin.select') @lang('admin.class') *<span class="help"></span></label>
            <select id="classdetailn" required class="form-control select2" name="class">
               <option value="{{\App\Batch::find($id)->class}}">{{\App\Course::find(\App\Batch::find($id)->class)->title}}</option>
            </select>
                                </div>
                              </div>
                    <div class="col-md-6">
                             <div class="form-group">
            <label for="example-email">@lang('admin.select') @lang('admin.subject') *<span class="help"></span></label>
            <select id="subjectdetail" style="width: 100%;" name="subject" required class="form-control select2">
            <option value="{{\App\Batch::find($id)->subject}}">{{\App\Subject::find(\App\Batch::find($id)->subject)->title}}</option>  
            </select>
                                </div>
                              </div>
                
                          </div>
                          <div class="row">
                              <div class="col-md-4">
                             <div class="form-group">
            <label for="example-email">@lang('admin.assign') @lang('admin.date') *<span class="help"></span></label>
             <input name="date" type="text" value="{{\App\Batch::find($id)->date}}" required id="mdate" placeholder=""  class="form-control" >
              <input name="type" type="hidden" required value="2"  class="form-control" >
               </div>
                              </div>
                               <div class="col-md-4">
                             <div class="form-group">
            <label for="example-email">@lang('admin.each') @lang('admin.question') @lang('admin.mark') *<span class="help"></span></label>
            <input name="mark" value="{{\App\Batch::find($id)->mark}}" type="number" require placeholder=""  class="form-control" >
                                </div>
                              </div>
                              <div class="col-md-4">
                             <div class="form-group">
            <label for="example-email">@lang('admin.use_as') *<span class="help"></span></label>
            <select class="form-control" name="use">
               @if(\App\Batch::find($id)->use==='Practise')
                <option value="Practise">@lang('admin.practise')</option>
                <option value="Test">@lang('admin.test')</option>
                <option value="Examination">@lang('admin.examination')</option>
                <option value="Other">@lang('admin.other')</option>
            @elseif(\App\Batch::find($id)->use==='Test')
             <option value="Test">@lang('admin.test')</option>
                <option value="Examination">@lang('admin.examination')</option>
                <option value="Other">@lang('admin.other')</option>
                <option value="Practise">@lang('admin.practise')</option>
             @elseif(\App\Batch::find($id)->use==='Examination')
                <option value="Examination">@lang('admin.examination')</option>
                <option value="Other">@lang('admin.other')</option>
                <option value="Practise">@lang('admin.practise')</option>
                <option value="Test">@lang('admin.test')</option>
                 @elseif(\App\Batch::find($id)->use==='Other')
                <option value="Other">@lang('admin.other')</option>
                <option value="Practise">@lang('admin.practise')</option>
                <option value="Test">@lang('admin.test')</option>
                 <option value="Examination">@lang('admin.examination')</option>
              @else
               <option value="Practise">@lang('admin.practise')</option>
                <option value="Test">@lang('admin.test')</option>
                <option value="Examination">@lang('admin.examination')</option>
                <option value="Other">@lang('admin.other')</option>
                @endif
            </select>
                                </div>
                              </div>
                              </div>

            <div class="row">
                  <div class="col-md-6">
                             <div class="form-group">
            <label for="example-email">@lang('admin.duration') *<span class="help"></span></label>
           <select required name="duration" class="form-control">
    <option value="{{\App\Batch::find($id)->duration}}">{{\App\Batch::find($id)->duration}} min</option>
                <option value="20">20 min</option>
                <option value="25">25 min</option>
                <option value="30">30 min</option>
                <option value="40">40 min</option>
                <option value="45">45 min</option>
                <option value="50">50 min</option>
                <option value="55">55 min</option>
                <option value="60">60 min</option>
            </select>
                                </div>
                              </div>
                     <div class="col-md-6">
                             <div class="form-group">
            <label for="example-email">@lang('admin.assign') @lang('admin.batch') *<span class="help"></span></label>
           <select required name="batch" class="form-control">
           
    @if(\App\Batch::find($id)->batch=='1')
    <option value="1">Batch A</option>
                <option value="2">Batch B</option>
                <option value="3">Batch C</option>
                <option value="4">Batch D</option>
                <option value="5">Batch E</option>
                <option value="6">Batch G</option>
                <option value="7">Batch H</option>
                <option value="8">Batch I</option>
   @elseif(\App\Batch::find($id)->batch=='2')
                <option value="2">Batch B</option>
                <option value="3">Batch C</option>
                <option value="4">Batch D</option>
                <option value="5">Batch E</option>
                <option value="6">Batch G</option>
                <option value="7">Batch H</option>
                <option value="8">Batch I</option>
                <option value="1">Batch A</option>
     @elseif(\App\Batch::find($id)->batch=='3')
                <option value="3">Batch C</option>
                <option value="4">Batch D</option>
                <option value="5">Batch E</option>
                <option value="6">Batch G</option>
                <option value="7">Batch H</option>
                <option value="8">Batch I</option>
                <option value="1">Batch A</option>
                 <option value="2">Batch B</option>
     @elseif(\App\Batch::find($id)->batch=='4')
                <option value="4">Batch D</option>
                <option value="5">Batch E</option>
                <option value="6">Batch G</option>
                <option value="7">Batch H</option>
                <option value="8">Batch I</option>
                <option value="1">Batch A</option>
                 <option value="2">Batch B</option>
                  <option value="3">Batch C</option>
 @elseif(\App\Batch::find($id)->batch=='5')
                <option value="5">Batch E</option>
                <option value="6">Batch G</option>
                <option value="7">Batch H</option>
                <option value="8">Batch I</option>
                <option value="1">Batch A</option>
                 <option value="2">Batch B</option>
                  <option value="3">Batch C</option>
                    <option value="4">Batch D</option>
 @elseif(\App\Batch::find($id)->batch=='6')
     
                <option value="6">Batch G</option>
                <option value="7">Batch H</option>
                <option value="8">Batch I</option>
                <option value="1">Batch A</option>
                 <option value="2">Batch B</option>
                  <option value="3">Batch C</option>
                    <option value="4">Batch D</option>
              <option value="5">Batch E</option>
 @elseif(\App\Batch::find($id)->batch=='7')
                <option value="7">Batch H</option>
                <option value="8">Batch I</option>
                <option value="1">Batch A</option>
                 <option value="2">Batch B</option>
                  <option value="3">Batch C</option>
                    <option value="4">Batch D</option>
                     <option value="5">Batch E</option>
              <option value="6">Batch G</option>
 @elseif(\App\Batch::find($id)->batch=='8')
                <option value="8">Batch I</option>
                <option value="1">Batch A</option>
                 <option value="2">Batch B</option>
                  <option value="3">Batch C</option>
                    <option value="4">Batch D</option>
                     <option value="5">Batch E</option>
              <option value="6">Batch G</option>
               <option value="7">Batch H</option>
               @else
  <option value="1">Batch A</option>
                <option value="2">Batch B</option>
                <option value="3">Batch C</option>
                <option value="4">Batch D</option>
                <option value="5">Batch E</option>
                <option value="6">Batch G</option>
                <option value="7">Batch H</option>
                <option value="8">Batch I</option>
              
    @endif
              
            </select>
                                </div>
                              </div>  
                              </div> 
                              <div class="row">     
                    <div class="col-md-12">
                             <div class="form-group">
            <label for="example-email">@lang('admin.batch') @lang('admin.instruction')<span class="help"></span></label>
            <textarea name="instruction" class="form-control">{{\App\Batch::find($id)->description}}</textarea>
                                </div>
                              </div>
                          </div>
                          <hr>
                           <div class="row">
                            <div class="col-md-3"></div>
             <div class="col-sm-6"> 
                 <div class="form-group">
                <input type="submit" required class="form-control btn btn-primary" value="@lang('admin.submit')">
                    </div>  
                </div>
                 <div class="col-md-3"></div>
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
    <script type="text/javascript">
$('#classdetailn').change(function(){
    var countryID = $(this).val();    
    if(countryID){
        $.ajax({
           type:"GET",
           url:"{{url('/api/get_student')}}?class="+countryID,
           success:function(res){               
            if(res){
                $("#studentdetailn").empty();
                $("#subjectdetail").empty();
                $("#studentdetailn").append('<option value="all">All Student</option>');
                $("#subjectdetail").append('<option value="">Select Subject</option>');
                $.each(res.class,function(key,value){         
$("#studentdetailn").append('<option value="'+value['id']+'">'+value['user_id']+' '+value['fname']+'</option>');              
    });     
                 $.each(res.subject,function(keys,values){
 $("#subjectdetail").append('<option value="'+values['id']+'">'+values['title']+'</option>');
 });
            }else{
               $("#studentdetailn").empty();
               $("#subjectdetail").empty();
            }
           }
        });
    }else{
        $("#studentdetailn").empty();
         $("#subjectdetail").empty();
    }      
   });
</script>