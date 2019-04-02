 @foreach(\App\Response::where('thread_id',$id)->latest()->get() as $online)
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
                                           <small class="text-success">@lang('admin.online')</small>
                                           @else
                                            <small class="text-black">@lang('admin.offline')</small>
                                           @endif</span></a>
                                            </li>
                                            @endforeach