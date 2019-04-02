@extends('layouts.admin')
@section('content')

    <div class="row page-titles">
                    <div class="col-md-5 col-8 align-self-center">
                        <h3 class="text-themecolor">@lang('admin.health_report')</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{url('')}}/admin/page.fmp?page=1">@lang('admin.home')</a></li>
                            <li class="breadcrumb-item active">@lang('admin.health_report')</li>
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
   
                                <div class="tab-pane active" id="home" role="tabpanel">
                                <h4 class="card-title">@lang('admin.create_report')</h4>
                <h6 class="card-subtitle"></h6>
    <form action="{{url('')}}/add/health/report" method="post" enctype="multipart/form-data" class="">
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
                                <div class="col-md-2">
                                        <div class="form-group">
                                        <label for="example-email">@lang('admin.date')<span class="help"></span></label>
                      <input type="text" name="date" class="form-control mdate">
                                      </div>   
                                </div>
                                <div class="col-md-2">
                                        <div class="form-group">
                                        <label for="example-email">@lang('admin.time')<span class="help"></span></label>
                      <input type="text" name="time" class="form-control mtime">
                                      </div>   
                                </div>
                                 <div id="former_report" class="col-md-12 bg-success" style="display: none;">
                <span ><a id="old_repclick" href="javascript:void(0)"></a></span>
                                 </div>
                                 <div class="col-md-12">
                                        <div class="form-group">
                                        <label for="example-email">@lang('admin.report')<span class="help"></span></label>
                        <textarea class="form-control mymce" name="report"></textarea>
                                      </div>   
                                </div>       
                                    </div>
      <hr>
                                     <div class="row">
                                        <div class="col-md-4"></div>
                                    <div class="col-md-4">
                     <input type="submit" class="form-control btn btn-primary text-white" value="@lang('admin.submit')">
                                     </div>
                                        <div class="col-md-4"> </div>
                                    </div>
                                  </form>    
                                </div>
                                
    </div>
     </div>
   
      <script src="{{url('')}}/assets/plugins/jquery/jquery.min.js"></script>
    <script type="text/javascript">
        $(function () {
     $('#studentdetail').change(function(){
  
    var countryID = $(this).val();    
    if(countryID){
        $.ajax({
           type:"GET",
           url:"{{url('/api/get_report')}}?student="+countryID,
           success:function(res){               
            if(res){
    if(res['report']!=null){
 $('#former_report').show();
        $('#old_repclick').text("@lang('admin.last_report') "+res['report']['date']+" @lang('admin.at') "+res['report']['time']);
   $('#old_repclick').click(function () {
jQuery('#modal_ajax .modal-body').html('<div style="text-align:center;margin-top:200px;"><img src="{{url('')}}/assets/images/preloader.gif" style="height:50px;" /></div>');
    
    // LOADING THE AJAX MODAL
    jQuery('#modal_ajax').modal('show', {backdrop: 'true'});
    
    // SHOW AJAX RESPONSE ON REQUEST SUCCESS
    $.ajax({
      url: '{{url('')}}/show/last/report/'+res['report']['id'],
      success: function(response)
      {
        jQuery('#modal_ajax .modal-body').html(response);
      }
    });
   });
    }
            }else{
             alert('seyi');
            }
           }
        });
    }else{
       
    }      
   });  
    });  
    </script>

@endsection