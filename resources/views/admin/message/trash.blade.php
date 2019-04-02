<div class="card-body">
                                        <div class="btn-group m-b-10 m-r-10" role="group" aria-label="Button group with nested dropdown">
                                            <button type="button" onclick="returnselect()" class="btn btn-secondary font-18 text-dark"><i class="fa fa-reply-all"></i></button>
                                        </div>
                                        <button type="button" onclick="loadcont('{{url('')}}/show/trash','trash')"  class="btn btn-secondary m-r-10 m-b-10 text-dark"><i class="mdi mdi-reload font-18"></i></button>
                                    </div>
                                    <div class="card-body p-t-0">
                                        <div class="card b-all shadow-none">
                                            <div class="inbox-center table-responsive">
                                                <table class="table table-hover no-wrap">
                                                    <tbody>
@forelse(\App\Messaging::where('receive_id',\Auth::user()->id)->onlyTrashed()->get() as $message)
                                                        <tr class="unread">
                                                            <td style="width:40px">
                                                                <div class="checkbox">
                                                                    <input type="checkbox" id="checkbox{{$loop->iteration}}" value="{{$message->id}}">
                                                                    <label for="checkbox{{$loop->iteration}}"></label>
                                                                </div>
                                                            </td>
                                                            <td style="width:40px" class="hidden-xs-down"><i class="fa fa-star text-warning"></i></td>
                                                            <td class="hidden-xs-down">{{\App\User::find($message->send_id)->name}}</td>
                                                            <td class="max-texts"> <a onclick="loadcont('{{url('')}}/content/inbox/{{$message->id}}','inbox')" href="javascript:void(0)" />
                                                            @if($message->type=='admin')
                                                            <span class="label label-info m-r-10">@lang('admin.admin')</span>
                                                    @elseif($message->type=='teacher'||$message->type=='staff')
                                                             <span class="label label-warning m-r-10">@lang('admin.staff')</span>
                                                             @elseif($message->type=='other')
                                                             <span class="label label-purple m-r-10">@lang('admin.other')</span>
                                                             @endif
                                                            {{$message->message_title}}</td>
                                                            <td class="hidden-xs-down">
                             @if(count(\App\Messfile::where('mess_id',$message->id)->get())>0)
                                                                <i class="fa fa-paperclip"></i>
                                                                @endif
                                                            </td>
                                                            <td class="text-right">
                                    {{\Carbon\Carbon::parse($message->created_at)->toFormattedDateString()}} at {{\Carbon\Carbon::parse($message->created_at)->format('H:i a')}} </td>
                                                        </tr>
                                                          @empty
                                            <tr>
                                                <td colspan="5">@lang('admin.no_message')</td>
                                            </tr>
                                            @endforelse
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <script type="text/javascript">
                                        function returnselect(){
                  if(confirm("@lang('admin.confirm_restore')")){ 
                $("input[type=checkbox]:checked").each(function(){
                $.get('{{url('')}}/restore/mailbox/'+$(this).val(),function(data)
                {
                 swal("@lang('admin.mail_restored')", "@lang('admin.continue-button')", "success");
                jQuery('.show_content').html(data);
                });
               });
                }
              }
                                    </script>