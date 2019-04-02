<div class="card-body">
                                        <div class="btn-group m-b-10 m-r-10" role="group" aria-label="Button group with nested dropdown">
                                            <button type="button" onclick="deleteselect()" class="btn btn-secondary font-18 text-dark"><i class="mdi mdi-delete"></i></button>
                                        </div>
                                       
                                        <button type="button" onclick="loadcont('{{url('')}}/show/inbox','inbox')" class="btn btn-secondary m-r-10 m-b-10 text-dark"><i class="mdi mdi-reload font-18"></i></button>
                                    </div>
                                    <div class="card-body p-t-0">
                                        <div class="card b-all shadow-none">
                                            <div class="inbox-center table-responsive">
                                                <table id="databank" class="table table-hover no-wrap databank">
                                                    <thead>
                                <tr>
                                    <th>#</th>
                                    <th>#</th>
                                    <th>#</th>
                                    <th>#</th>
                                    <th>#</th>
                                    <th>#</th>
                                   
                                </tr>
                            </thead>
                                                    <tbody>
                                    @forelse(\App\Messaging::where('receive_id',\Auth::user()->id)->latest()->simplePaginate(15) as $message)
                @if($message->status=='0')
                                                        <tr class="unread">
                                                            <td style="width:40px">
                                                                <div class="checkbox">
                                                                    <input value="{{$message->id}}" type="checkbox" id="checkbox{{$loop->iteration}}" value="{{$message->id}}">
                                                                    <label for="checkbox{{$loop->iteration}}"></label>
                                                                </div>
                                                            </td>
                                                            <td style="width:40px" class="hidden-xs-down"><i class="fa fa-star text-warning"></i></td>
                                                            <td class="hidden-xs-down">{{\App\User::find($message->send_id)->name}}</td>
                    <td class="max-texts"> <a onclick="loadcont('{{url('')}}/content/inbox/{{$message->id}}','inbox')" href="javascript:void(0)">
                        @if($message->type=='admin')
                                                            <span class="label label-info m-r-10">@lang('admin.admin')</span>
                                                    @elseif($message->type=='teacher'||$message->type=='staff')
                                                             <span class="label label-warning m-r-10">@lang('admin.staff')</span>
                                                             @elseif($message->type=='other')
                                                             <span class="label label-purple m-r-10">@lang('admin.other')</span>
                                                             @endif
                        {{$message->message_title}}</a></td>
                                                            <td class="hidden-xs-down">
                             @if(count(\App\Messfile::where('mess_id',$message->id)->get())>0)
                                                                <i class="fa fa-paperclip"></i>
                                                                @endif
                                                            </td>
                                                            <td class="text-right">
                                    {{\Carbon\Carbon::parse($message->created_at)->toFormattedDateString()}} at {{\Carbon\Carbon::parse($message->created_at)->format('H:i a')}} </td>
                                                        </tr>
                                          @elseif($message->status=='1')
                                                        <tr>
                                                            <td>
                                                                <div class="checkbox">
                                                                    <input type="checkbox" id="checkbox{{$loop->iteration}}" value="{{$message->id}}">
                                                                    <label for="checkbox{{$loop->iteration}}"></label>
                                                                </div>
                                                            </td>
                                                            <td class="hidden-xs-down"><i class="fa fa-star-o"></i></td>
                                                            <td class="hidden-xs-down">{{\App\User::find($message->send_id)->name}}</td>
                                                            <td class="max-texts"><a onclick="loadcont('{{url('')}}/content/inbox/{{$message->id}}','inbox')" href="javascript:void(0)">
                                                                @if($message->type=='admin')
                                                            <span class="label label-info m-r-10">@lang('admin.admin')</span>
                                                    @elseif($message->type=='teacher'||$message->type=='staff')
                                                             <span class="label label-warning m-r-10">@lang('admin.staff')</span>
                                                             @elseif($message->type=='other')
                                                             <span class="label label-purple m-r-10">@lang('admin.other')</span>
                                                             @endif
                                                                {{$message->message_title}}</a></td>
                                                            <td class="hidden-xs-down">
                                                                 @if(count(\App\Messfile::where('mess_id',$message->id)->get())>0)
                                                                <i class="fa fa-paperclip"></i>
                                                                @endif
                                                            </td>
                                                            <td class="text-right"> {{\Carbon\Carbon::parse($message->created_at)->toFormattedDateString()}} at {{\Carbon\Carbon::parse($message->created_at)->format('H:i a')}}</td>
                                                        </tr>
                                                        @endif
                                            @empty
                                            <tr>
                                                <td colspan="5">@lang('admin.no_message') </td>
                                            </tr>
                                            @endforelse
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                   
                                     <script type="text/javascript">
                     function loadcont(url,did){
                    $('.list-group-item').removeClass('active');
         jQuery('.show_content').html('<div style="text-align:center;margin-top:200px;"><img src="{{url('')}}/assets/images/preloader.gif" style="height:50px;" /></div>');
                $.get(url, function(data) {
                    $('#'+did).addClass('active');
             jQuery('.show_content').html(data);
            });
              }
              function deleteselect(){
                  if(confirm("@lang('admin.confirm_delete')")){ 
                $("input[type=checkbox]:checked").each(function(){
                $.get('{{url('')}}/deleten/mailbox/'+$(this).val(),function(data)
                {
                 swal("@lang('admin.account_delete')", "@lang('admin.continue-button')", "success");
                  $('#inbox').addClass('active');
                jQuery('.show_content').html(data);
                });
               });
                }
              }
               $(document).ready(function() {
    $('#databank').DataTable();

});
                </script>