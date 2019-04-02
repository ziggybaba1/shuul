 @extends('layouts.student')
@section('content')

                <!-- ============================================================== -->
                <!-- Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
               <div class="row page-titles">
                    <div class="col-md-5 col-8 align-self-center">
                        <h3 class="text-themecolor">@lang('admin.forum') @lang('admin.topic')</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{url('')}}/admin/page.fmp?page=1">@lang('admin.home')</a></li>
                            <li class="breadcrumb-item"><a href="{{url('')}}/student/page.fmp?page=15">@lang('admin.topic_list')</a></li>
                            <li class="breadcrumb-item active">{{\App\Thread::find($id)->title}}</li>
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
                    <div class="col-12">
                        <div class="card m-b-0">
                            <!-- .chat-row -->
                            <div class="chat-main-box">
                                <!-- .chat-left-panel -->
                                <div class="chat-left-aside">
                                    <div class="open-panel"><i class="ti-angle-right"></i></div>
                                    <div class="chat-left-inner" >
                                        <div class="form-material">
                                            <h4 class=" p-20"> @lang('admin.active_part')</h4>
                                           <hr>
                                        </div>
                          <ul id="active_user" class="chatonline style-none" style="overflow-y: auto;max-height: 1000px;">
                       @foreach(\App\Response::where('thread_id',$id)->simplePaginate(20) as $online)
                                            <li>
                                                <a href="javascript:void(0)">
  @if(\App\User::find($online->user_id)->role=='admin'||\App\User::find($online->user_id)->role=='teacher'||\App\User::find($online->user_id)->role=='staff')
         @if(\App\Teacher::where('user_table',$online->user_id)->first()->image=='')
                                           <img src="{{url('')}}/assets/images/user.png" alt="user-img" class="img-circle"> 
@else
                                         <img src="{{url('')}}/uploads/avatars/{{\App\Teacher::where('user_table',$online->user_id)->first()->image}}" alt="user" class="img-circle" />
                                        @endif
            @endif
            @if(\App\User::find($online->user_id)->role=='student')
                        @if(\App\Student::where('data_id',$online->user_id)->first()->image=='')
                                                    <img src="{{url('')}}/assets/images/user.png" alt="user" class="img-circle"/>
                                        @else
                                         <img src="{{url('')}}/uploads/avatars/{{\App\Student::where('data_id',$online->user_id)->first()->image}}" alt="user" class="img-circle"/>
                                        @endif
            @endif
            @if(\App\User::find($online->user_id)->role=='parent')
                        @if(\App\Parenting::where('user_id',$online->user_id)->first()->image=='')
                                                    <img src="{{url('')}}/assets/images/user.png" alt="user" class="img-circle"/>
                                        @else
                                         <img src="{{url('')}}/uploads/avatars/{{\App\Parenting::where('user_id',$online->user_id)->first()->image}}" alt="user" class="img-circle"/>
                                        @endif
            @endif
                                           <span>{{\App\User::find($online->user_id)->name}} <span class="badge badge-success text-white pull-right">{{count(\App\Reply::where('thread_id',$id)->where('user_id',$online->user_id)->get())}}</span>
                                        @if(\App\User::find($online->user_id)->isOnline())
                                           <small class="text-success"> @lang('admin.online')</small>
                                           @else
                                            <small class="text-black"> @lang('admin.offline')</small>
                                           @endif
                                          </span></a>
                                            </li>
                                            @endforeach
                                            <li class="p-20"></li>
                                        </ul>
                                    </div>
                                </div>
                                <!-- .chat-left-panel -->
                                <!-- .chat-right-panel -->
                                <div class="chat-right-aside">
                                    <div class="chat-main-header">
                                        <div class="p-20 b-b">
                                            <h3 class="box-title">{!!\App\Thread::find($id)->body!!}</h3>
                                        </div>
                                    </div>
                                      <div class="card-body b-t">
                                        <div class="row">
                                            <div class="col-8">
                                                <textarea id="showtwxtn" placeholder=" @lang('admin.type_message')" name="message" class="form-control b-0"></textarea>
                                            </div>
                                            <div class="col-4 text-right">
                                                <button id="showresults" type="button" onclick="response()" class="btn btn-info btn-circle btn-lg"><i class="fa fa-paper-plane-o"></i> </button>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="chat-rbox" style="overflow-y: auto;max-height: 1200px;" id="showcontent">
                                        <ul class="chat-list p-20">
                                            <!--chat Row -->
                        @forelse(\App\Reply::where('thread_id',$id)->latest()->simplePaginate(20) as $message)
                        @if($message->user_id==\Auth::user()->id)
                                            <li>
                                                <div class="chat-img">
@if(\App\User::find($message->user_id)->role=='admin'||\App\User::find($message->user_id)->role=='teacher'||\App\User::find($message->user_id)->role=='staff')
                        @if(\App\Teacher::where('user_table',$message->user_id)->first()->image=='')
                                                    <img src="{{url('')}}/assets/images/user.png" alt="user" />
                                        @else
                                         <img src="{{url('')}}/uploads/avatars/{{\App\Teacher::where('user_table',$message->user_id)->first()->image}}" alt="user" />
                                        @endif
            @endif
            @if(\App\User::find($message->user_id)->role=='student')
                        @if(\App\Student::where('data_id',$message->user_id)->first()->image=='')
                                                    <img src="{{url('')}}/assets/images/user.png" alt="user" />
                                        @else
                                         <img src="{{url('')}}/uploads/avatars/{{\App\Student::where('data_id',$message->user_id)->first()->image}}" alt="user" />
                                        @endif
            @endif
            @if(\App\User::find($message->user_id)->role=='parent')
                        @if(\App\Parenting::where('user_id',$message->user_id)->first()->image=='')
                                                    <img src="{{url('')}}/assets/images/user.png" alt="user" />
                                        @else
                                         <img src="{{url('')}}/uploads/avatars/{{\App\Parenting::where('user_id',$message->user_id)->first()->image}}" alt="user" />
                                        @endif
            @endif
                                                </div>
                                                <div class="chat-content">
                                                    <h5>{{\App\User::find($message->user_id)->name}}</h5>
                                                    <div class="box bg-light-info">{{$message->body}}</div>
                                                </div>
                                                <div class="chat-time">{{\Carbon\Carbon::parse($message->created_at)->toFormattedDateString()}} {{\Carbon\Carbon::parse($message->created_at)->format('H:i a')}}</div>
                                            </li>
                        @elseif($message->user_id!=\Auth::user()->id)
                                            <!--chat Row -->
                                            <li>
                                                <div class="chat-img">
@if(\App\User::find($message->user_id)->role=='admin'||\App\User::find($message->user_id)->role=='teacher'||\App\User::find($message->user_id)->role=='staff')
                        @if(\App\Teacher::where('user_table',$message->user_id)->first()->image=='')
                                                    <img src="{{url('')}}/assets/images/user.png" alt="user" />
                                        @else
                                         <img src="{{url('')}}/uploads/avatars/{{\App\Teacher::where('user_table',$message->user_id)->first()->image}}" alt="user" />
                                        @endif
            @endif
            @if(\App\User::find($message->user_id)->role=='student')
                        @if(\App\Student::where('data_id',$message->user_id)->first()->image=='')
                                                    <img src="{{url('')}}/assets/images/user.png" alt="user" />
                                        @else
                                         <img src="{{url('')}}/uploads/avatars/{{\App\Student::where('data_id',$message->user_id)->first()->image}}" alt="user" />
                                        @endif
            @endif
            @if(\App\User::find($message->user_id)->role=='parent')
                        @if(\App\Parenting::where('user_id',$message->user_id)->first()->image=='')
                                                    <img src="{{url('')}}/assets/images/user.png" alt="user" />
                                        @else
                                         <img src="{{url('')}}/uploads/avatars/{{\App\Parenting::where('user_id',$message->user_id)->first()->image}}" alt="user" />
                                        @endif
            @endif
                                                </div>
                                                <div class="chat-content">
                                                    <h5>{{\App\User::find($message->user_id)->name}}</h5>
                                                    <div class="box bg-light-primary">{{$message->body}}</div>
                                                </div>
                                                <div class="chat-time">{{\Carbon\Carbon::parse($message->created_at)->toFormattedDateString()}} {{\Carbon\Carbon::parse($message->created_at)->format('H:i a')}}</div>
                                            </li>
                                           @endif
                                           @empty
                                           <h5> @lang('admin.no_reply')</h5>
                                           @endforelse
                                            <!--chat Row -->
                                        </ul>
                                    </div>
                                  
                                </div>
                                <!-- .chat-right-panel -->
                            </div>
                            <!-- /.chat-row -->
                        </div>
                    </div>
                </div>
<script src="{{url('')}}/assets/plugins/jquery/jquery.min.js"></script>
<script type="text/javascript">
    function response(){
   var value=$("#showtwxtn").val();
   if(value==''){}
   else{
jQuery('#showresults').html('<div style="align-content:center;"><img src="{{url('')}}/assets/images/preloader.gif" style="height:30px;" /></div>');
  $.ajax({
            url     : '{{url('')}}/reply/response/create',
            type    : 'GET',
            data    : 'text='+value+'&topic={{$id}}',
    success: function (data) {
        jQuery('#showcontent').html(data);
        $("#showtwxtn").val('');
        jQuery('#showresults').html('<i class="fa fa-paper-plane-o"></i>');         
    var elmnt = document.getElementById("scrollitem");
  elmnt.scrollIntoView();
      },
      error:function(data){
          jQuery('#showresults').html('<i class="fa fa-paper-plane-o"></i>');  
        var elmnt = document.getElementById("scrollitem");
  elmnt.scrollIntoView(); 
      },
       cache: false,
        contentType: false,
        processData: false
 });
  }
}
function getcontent(){
 $.get('{{url('')}}/show/topic/content/{{$id}}', function(datar) {
            if(datar!=''){
     jQuery('#showcontent').html(datar);
            }
            });
}
function getusers(){
 $.get('{{url('')}}/forum/active/users/{{$id}}', function(datan) {
            if(datan!=''){
     jQuery('#active_user').html(datan);
            }
            });
}
$(document).ready(function() {
    setInterval(function(){ getcontent();getusers(); }, 1000);
  });

</script>
@endsection