@extends('layouts.admin')
@section('content')
  <div class="row page-titles">
     <div class="col-md-6 col-6 align-self-center">
                        <h3 class="text-themecolor">{{\App\Student::find($id)->gname}} {{\App\Student::find($id)->fname}} @lang('admin.detail')</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{url('')}}/admin/page.fmp?page=1">@lang('admin.home')</a></li>
                            <li class="breadcrumb-item"><a href="{{url('')}}/admin/page.fmp?page=13">@lang('admin.detail') @lang('admin.student')</a></li>
                            <li class="breadcrumb-item active">{{\App\Student::find($id)->gname}} {{\App\Student::find($id)->fname}}</li>
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
                    <!-- Column -->
                    <!-- Column -->
                    <div class="col-lg-12 col-xlg-12 col-md-12">
                         @if (session('message'))
                 <div class="alert alert-info alert-rounded">{{ session('message') }}</div>
                    @endif
                        <div class="card">
                            <!-- Nav tabs -->
                                      <div class="row">
                    <div class="col-md-12">
                         <div class="card">
                        <div class="card-body">
                          <div id="showresults"></div> 
                                <h4 class="card-title">{{\App\Student::find($id)->user_id}} {{\App\Student::find($id)->gname}} {{\App\Student::find($id)->fname}}</h4>
                                <h6 class="card-subtitle">{{\App\Session::first()->session}} {{\App\Session::first()->term}} @lang('admin.result') @lang('admin.prepare') <a href="{{url('')}}/admin/page.fmp?page=13">@lang('admin.back_student')</a></h6>
                                  <p>
             <ul class="nav nav-pills m-t-30 m-b-30">
              @if(\App\Resultsetting::first()->personal=='1'&&\App\Resultsetting::first()->physical=='1')
                                    <li class=" nav-item"> <a href="#personality" id="persona" class="nav-link daf" data-toggle="tab" aria-expanded="false">@lang('admin.behave_person')</a> </li>
                                    <li class="nav-item"> <a href="#physical" id="physic" class="nav-link daf" data-toggle="tab" aria-expanded="false">@lang('admin.physic_dev')</a> </li>
                                    <li class="nav-item"> <a href="#grade" id="grad" class="nav-link daf" data-toggle="tab" aria-expanded="true">@lang('admin.grade')</a> </li>
                                     <li class="nav-item"> <a href="#comment" id="comm" class="nav-link daf" data-toggle="tab" aria-expanded="false">@lang('admin.comment')/@lang('admin.status')</a> </li>
                                    <li class="nav-item"> <a href="#gresult" id="resul" class="nav-link daf" data-toggle="tab" aria-expanded="true">@lang('admin.generate') @lang('admin.result')</a> </li>
                        @elseif(\App\Resultsetting::first()->personal!='1'&&\App\Resultsetting::first()->physical!='1')
                         <li class="nav-item"> <a href="#grade" id="grad" class="nav-link daf" data-toggle="tab" aria-expanded="true">@lang('admin.grade')</a> </li>
                                     <li class="nav-item"> <a href="#comment" id="comm" class="nav-link daf" data-toggle="tab" aria-expanded="false">@lang('admin.comment')/@lang('admin.status')</a> </li>
                                    <li class="nav-item"> <a href="#gresult" id="resul" class="nav-link daf" data-toggle="tab" aria-expanded="true">@lang('admin.generate') @lang('admin.result')</a> </li>
                          @elseif(\App\Resultsetting::first()->personal=='1'&&\App\Resultsetting::first()->physical!='1')
                            <li class=" nav-item"> <a href="#personality" id="persona" class="nav-link daf" data-toggle="tab" aria-expanded="false">@lang('admin.behave_person')</a> </li>
                              <li class="nav-item"> <a href="#grade" id="grad" class="nav-link daf" data-toggle="tab" aria-expanded="true">@lang('admin.grade')</a> </li>
                                     <li class="nav-item"> <a href="#comment" id="comm" class="nav-link daf" data-toggle="tab" aria-expanded="false">@lang('admin.comment')/@lang('admin.status')</a> </li>
                                    <li class="nav-item"> <a href="#gresult" id="resul" class="nav-link daf" data-toggle="tab" aria-expanded="true">@lang('admin.generate') @lang('admin.result')</a> </li>
                   @elseif(\App\Resultsetting::first()->personal!='1'&&\App\Resultsetting::first()->physical=='1')
                    <li class="nav-item"> <a href="#physical" id="physic" class="nav-link daf" data-toggle="tab" aria-expanded="false">@lang('admin.physic_dev')</a> </li>
                                    <li class="nav-item"> <a href="#grade" id="grad" class="nav-link daf" data-toggle="tab" aria-expanded="true">@lang('admin.grade')</a> </li>
                                     <li class="nav-item"> <a href="#comment" id="comm" class="nav-link daf" data-toggle="tab" aria-expanded="false">@lang('admin.comment')/@lang('admin.status')</a> </li>
                                    <li class="nav-item"> <a href="#gresult" id="resul" class="nav-link daf" data-toggle="tab" aria-expanded="true">@lang('admin.generate') @lang('admin.result')</a> </li>
                                    @endif
                                  </ul>
                                        </p>
         <div class="tab-content br-n pn">
                    <div class="tab-pane" id="personality">
                        <hr>
                        <h4 class="card-title">{{\App\Resultphrase::first()->personality}}</h4>
                        <hr>
 <div id="showresultshere"> 
        <form class="formsubmit" method="post" action="{{url('')}}/admin/behave/create/{{$id}}">
              {{ csrf_field() }}
                                        <div class="row">
@if(count(\App\Personality::where('student_id',$id)->where('term',\App\Session::latest()->first()->terms)->where('session',\App\Session::latest()->first()->session)->get())>0)
@foreach(\App\Behavioural::where('class_id',\App\Student::find($id)->class)->get() as $behave)
                                            <div class="col-md-6">
                                                <div class="form-group">
                     <label for="firstName1">{{$behave->name}} :</label>
                                <select class="form-control" required id="behave{{$loop->iteration}}" name="behave{{$loop->iteration}}">
@if(count(\App\Personality::where('student_id',$id)->where('term',\App\Session::latest()->first()->terms)->where('session',\App\Session::latest()->first()->session)->first()->data)==count(\App\Behavioural::where('class_id',\App\Student::find($id)->class)->get()))
@if(json_decode(\App\Personality::where('student_id',$id)->where('term',\App\Session::latest()->first()->terms)->where('session',\App\Session::latest()->first()->session)->first()->data)[$loop->iteration-1]->behave=='5')
<option value="5">{{\App\Resultphrase::first()->excellent}}</option>
@elseif(json_decode(\App\Personality::where('student_id',$id)->where('term',\App\Session::latest()->first()->terms)->where('session',\App\Session::latest()->first()->session)->first()->data)[$loop->iteration-1]->behave=='4')
<option value="4">{{\App\Resultphrase::first()->high_degree}}</option>
@elseif(json_decode(\App\Personality::where('student_id',$id)->where('term',\App\Session::latest()->first()->terms)->where('session',\App\Session::latest()->first()->session)->first()->data)[$loop->iteration-1]->behave=='3')
<option value="3">{{\App\Resultphrase::first()->accept_level}}</option>
@elseif(json_decode(\App\Personality::where('student_id',$id)->where('term',\App\Session::latest()->first()->terms)->where('session',\App\Session::latest()->first()->session)->first()->data)[$loop->iteration-1]->behave=='2')
<option value="2">{{\App\Resultphrase::first()->poor_level}}</option>
@elseif(json_decode(\App\Personality::where('student_id',$id)->where('term',\App\Session::latest()->first()->terms)->where('session',\App\Session::latest()->first()->session)->first()->data)[$loop->iteration-1]->behave=='1')
<option value="1">{{\App\Resultphrase::first()->indifferent}}</option>
@endif
@else
               <option value="5">{{\App\Resultphrase::first()->excellent}}</option>
                <option  value="4">{{\App\Resultphrase::first()->high_degree}}</option>
            <option value="3">{{\App\Resultphrase::first()->accept_level}}</option>
                <option value="2">{{\App\Resultphrase::first()->poor_level}}</option>
        <option value="1">{{\App\Resultphrase::first()->indifferent}}</option>
@endif
                                </select>
                                            </div>
                                        </div>
                                            @endforeach
@else
@foreach(\App\Behavioural::where('class_id',\App\Student::find($id)->class)->get() as $behave)
                                            <div class="col-md-6">
                                                <div class="form-group">
                     <label for="firstName1">{{$behave->name}} :</label>
                                <select class="form-control" required id="behave{{$loop->iteration}}" name="behave{{$loop->iteration}}">
                                    <option value="">@lang('admin.select') @lang('admin.one')</option>
              <option value="5">{{\App\Resultphrase::first()->excellent}}</option>
                <option  value="4">{{\App\Resultphrase::first()->high_degree}}</option>
            <option value="3">{{\App\Resultphrase::first()->accept_level}}</option>
                <option value="2">{{\App\Resultphrase::first()->poor_level}}</option>
        <option value="1">{{\App\Resultphrase::first()->indifferent}}</option>
                                </select>
                                            </div>
                                        </div>
                                            @endforeach
@endif
                                        </div>
                                <div class="row">
                                      <div class="col-md-6">
                                      </div>
                                     <div class="col-md-6">
                                                <div class="form-group">
                    <input type="submit" value="@lang('admin.submit')" class="btn btn-bg btn-primary btn-block" name="">
                                                </div>
                                </div>
                            </div>
            </form>
        </div>
                                    </div>
                                   <div class="tab-pane" id="physical">
                                     
                                  </div>
                                    <!-- Step 3 -->
                                   
                                  <div class="tab-pane" id="grade">
                                   
                                   </div>
                                 <div class="tab-pane" id="comment">
                                     
                              </div>
                                   
                                  <div class="tab-pane" id="gresult">

                                    </div>
                                </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>         
                       </div>             
                            </div>
                 
    <script src="{{url('')}}/assets/plugins/jquery/jquery.min.js"></script>
           
<script type="text/javascript">
  function geturl(href,idd){
   jQuery('#'+idd).html('<div style="text-align:center;margin-top:200px;"><img src="{{url('')}}/assets/images/preloader.gif" style="height:70px;" /></div>');
       $.get(href, function(data, status){
        if(status == "success")
        {
            $('#'+idd).html(data)
        }
      if(status == "error")
          {
$('#'+idd).html('<div style="text-align:center;margin-top:200px;">Error in Loading Patient Information</div>');
          }
    });
    }
     $(".daf").click(function(){
  var id = $(this).attr("id");

  switch (id){
    case "persona":
    geturl('{{url('')}}/show/additional/{{$id}}/1','personality')
      break;
       case "physic":
    geturl('{{url('')}}/show/additional/{{$id}}/2','physical')
      break;
       case "grad":
    geturl('{{url('')}}/show/additional/{{$id}}/3','grade')
      break;
      case "comm":
    geturl('{{url('')}}/show/additional/{{$id}}/4','comment')
      break;
      case "resul":
    geturl('{{url('')}}/show/additional/{{$id}}/5','gresult')
      break;
    }
  });
</script>
                @endsection