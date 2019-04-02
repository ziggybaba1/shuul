@extends('layouts.admin')
@section('content')

    <div class="row page-titles">
                    <div class="col-md-5 col-8 align-self-center">
                        <h3 class="text-themecolor">@lang('admin.school') @lang('admin.general') @lang('admin.information')</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{url('')}}/admin/page.fmp?page=1">@lang('admin.home')</a></li>
                            <li class="breadcrumb-item active">@lang('admin.school') @lang('admin.general') @lang('admin.information')</li>
                        </ol>
                    </div>
                     <div class="col-md-6 col-4 align-self-center">
                        <div class="d-flex m-t-10 justify-content-end">
                              <h5 class="text-themecolor">@lang('admin.current-sess'): {{\App\Session::latest()->first()->session}} </h5><br>
                            <h5 class="text-themecolor"> (
                                @if(\App\Session::latest()->first()->terms==='First')
                                @lang('admin.first_term')
                                @elseif(\App\Session::latest()->first()->terms==='Second')
                                @lang('admin.second_term')
                                 @elseif(\App\Session::latest()->first()->terms==='Third')
                                @lang('admin.third_term')
                                 @elseif(\App\Session::latest()->first()->terms==='Fourth')
                                @lang('admin.fourth_term')
                             @endif
                             )
                         </h5>
                        </div>
                    </div>
                </div>
 <div class="row">
   <div class="card card-body">
     @if (session('message'))
                 <div class="alert alert-info alert-rounded">{{ session('message') }}</div>
                    @endif
   <ul class="nav nav-tabs profile-tab" role="tablist">
                                <li class="nav-item"> <a class="nav-link" onclick="geturl('14','home')" data-toggle="tab" href="#home" role="tab">@lang('admin.general') @lang('admin.setting')</a> </li>
                                <li class="nav-item"> <a class="nav-link" onclick="geturl('15','home')" data-toggle="tab" href="#home" role="tab">@lang('admin.system') @lang('admin.setting')</a> </li>
                                 <li class="nav-item"><a class="nav-link" onclick="geturl('13','home')" data-toggle="tab" href="#home" role="tab">@lang('admin.sms') @lang('admin.setting')</a></li>
                                   <li class="nav-item"><a class="nav-link" onclick="geturl('17','home')" data-toggle="tab" href="#home" role="tab">@lang('admin.support_desk') @lang('admin.setting')</a></li>
                                 <li class="nav-item"><a class="nav-link" onclick="geturl('18','home')" data-toggle="tab" href="#home" role="tab">@lang('admin.plug_config') @lang('admin.setting')</a></li>
                                  <li class="nav-item"><a class="nav-link" onclick="geturl('19','home')" data-toggle="tab" href="#home" role="tab">@lang('admin.back_up')</a></li>
                
                            </ul>
                          </div>
          </div>
          <div class="row">
       <div class="card card-body">
    <div class="tab-content">
                                <div class="tab-pane" id="home" role="tabpanel">
                                  
              </div>
               
              </div>
            </div>
          </div>
<script src="{{url('')}}/assets/plugins/jquery/jquery.min.js"></script>
 <script type="text/javascript">
    $(document).ready(function() {
     $("#countried").change(function(){
    var countryID = $(this).val();    
    if(countryID){
        $.ajax({
           type:"GET",
           url:"{{url('api/get-state-list')}}?country_id="+countryID,
           success:function(res){               
            if(res){
                $("#state").empty();
                $("#state").append('<option>Select</option>');
                $.each(res,function(key,value){
                    $("#state").append('<option value="'+value['id']+'">'+value['name']+'</option>');
                });
           
            }else{
               $("#state").empty();
            }
           }
        });
    }else{
        $("#state").empty();
    }     
   });
 });
 </script> 
 <script type="text/javascript">
  function geturl(href,content){
   jQuery('#'+content).html('<div class="row"><div class="col-md-12"><div style="text-align:center;margin-top:200px;"><img src="{{url('')}}/assets/images/preloader.gif" style="height:70px;" /></div></div></div>');
       $.get('{{url('')}}/tab/page.fmp?page='+href, function(data, status){
        if(status == "success")
        {
          $('#'+content).html(data)
        }
      if(status == "error")
          {
$('#'+content).html('<div style="text-align:center;margin-top:200px;">Error in Loading Page Information</div>');
          }
    });
    }
</script>            
@endsection