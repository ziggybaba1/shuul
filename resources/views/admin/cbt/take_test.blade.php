@extends('layouts.admin')
@section('content')
<div class="row page-titles">
                    <div class="col-md-6 col-8 align-self-center">
                        <h3 class="text-themecolor">{{\Auth::user()->name}} @lang('admin.e_test_ex')</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{url('')}}/admin/page.fmp?page=1">@lang('admin.home')</a></li>
                            <li class="breadcrumb-item active">@lang('admin.e_test_ex')</li>
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
  <div id="showresultshere">
@if(count(\App\Clockin::where('batch_id',$id)->where('student_id',\Auth::user()->id)->get())>0)
@include('admin.cdt.test_clock')
@elseif(count(\App\Clockin::where('batch_id',$id)->where('student_id',\Auth::user()->id)->get())==0)
    <div class="row">
    <div class="col-md-12">
                        <div class="card">
                             <div class="card-body">
                                   <h4>{{\App\Batch::find($id)->instruction}}</h4>
                             </div>
                         </div>
                     </div>
                   </div>
                      <div class="">
                               <div class="clock" style="margin:2em;"></div>
                                </div>
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                 
      <h3 class="card-title"><b>@lang('admin.subject'): {{\App\Batch::find($id)->subject}}</b></h3>
                                <h6 class="card-subtitle"></h6>
<form class="formsubmito" id="formsubmito" action="{{url('')}}/submit/stest/answer/{{$id}}" method="post">
     {{ csrf_field() }}                              
@foreach(\App\Question::where('batch_id',$id)->get() as $test)
<div style="background-color: green;color: white;"><b>({{$loop->iteration}})</b></div>
                   <label> {!!$test->title!!}</label><br><br>
    <div class="checkbox">
   <input value="A" name="{{\App\Option::where('batch_id',$test->id)->first()->key}}" type="radio" id="checkbox{{\App\Option::where('batch_id',$test->id)->first()->id}}i{{$loop->iteration+0}}">
    <label for="checkbox{{\App\Option::where('batch_id',$test->id)->first()->id}}i{{$loop->iteration+0}}">{!!\App\Option::where('batch_id',$test->id)->latest()->first()->option1!!}</label><br>
     <input value="B" name="{{\App\Option::where('batch_id',$test->id)->first()->key}}" type="radio" id="checkbox{{\App\Option::where('batch_id',$test->id)->first()->id}}j{{$loop->iteration+1}}">
   <label for="checkbox{{\App\Option::where('batch_id',$test->id)->first()->id}}j{{$loop->iteration+1}}">{!!\App\Option::where('batch_id',$test->id)->latest()->first()->option2!!}</label><br>
  <input value="C" name="{{\App\Option::where('batch_id',$test->id)->first()->key}}" type="radio" id="checkbox{{\App\Option::where('batch_id',$test->id)->first()->id}}k{{$loop->iteration+2}}">
   <label for="checkbox{{\App\Option::where('batch_id',$test->id)->first()->id}}k{{$loop->iteration+2}}">{!!\App\Option::where('batch_id',$test->id)->latest()->first()->option3!!}</label><br>
  <input value="D" name="{{\App\Option::where('batch_id',$test->id)->first()->key}}" type="radio" id="checkbox{{\App\Option::where('batch_id',$test->id)->first()->id}}l{{$loop->iteration+3}}">
   <label for="checkbox{{\App\Option::where('batch_id',$test->id)->first()->id}}l{{$loop->iteration+3}}">{!!\App\Option::where('batch_id',$test->id)->latest()->first()->option4!!}</label><br>
</div>
@endforeach
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
        @endif
    </div>
 
    <script src="{{url('')}}/assets/plugins/jquery/jquery.min.js"></script>
<script type="text/javascript">
 $(".formsubmito").submit(function(e) {
  $.ajax({
            url : '{{url('')}}/submit/stest/answer/{{$id}}',
            type : 'POST',
            data : $('form').serialize(),
    success: function (data) {
        swal("@lang('admin.saved_info')", "success");
        jQuery('#showresultshere').html(data);
      },
      error:function(data){
         alert(data);
      },
 });
   return false;
});
function clockin(){
   $.get('{{url('')}}/sclockin/test/{{$id}}', function(data) {
            if(data=='0'){
$.toast({heading: "@lang('admin.e_test_ex')",text: "@lang('admin.cont_test')",position: 'top-right',loaderBg:'#ff6849',icon: 'success',hideAfter: 3500, stack: 6
          }); 
          clock = $('.clock').FlipClock({{\App\Batch::find($id)->duration}}*60, {
            clockFace: 'MinuteCounter',
            countdown: true,
            callbacks: {
                stop: function() {
                 ajax();
                }
            }
        });    
            }
            else{
               jQuery('#showresultshere').html(data);
            }
            });
}
        var clock;
          $(document).ready(function() {
            clockin();
    });
    </script>
    @endsection