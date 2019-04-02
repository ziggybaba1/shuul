    <div id="scrollitem"></div>
 <ul class="chat-list p-20">
                                            <!--chat Row -->
                        @forelse($replies as $message)
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
                                           <h5>@lang('admin.no_reply')</h5>
                                           @endforelse
                                            <!--chat Row -->
                                        </ul>
                                
                                  {{$replies->links()}}
                                        <script type="text/javascript">
                                            
                                        </script>