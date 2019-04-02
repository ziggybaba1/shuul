 <table id="example12" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                               <th>#</th>
                                                <th>@lang('admin.announce_id')</th>
                                                <th>@lang('admin.title')</th>
                                                <th>@lang('admin.student')</th>
                                                 <th>@lang('admin.email') @lang('admin.status')</th>
                                                <th>@lang('admin.sms') @lang('admin.status')</th>
                                                <th>@lang('admin.action')</th>
                                              <th>@lang('admin.delivery') @lang('admin.status')</th>
                                                 <th>@lang('admin.delete')</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                            <th>#</th>
                                                <th>@lang('admin.announce_id')</th>
                                                <th>@lang('admin.title')</th>
                                                <th>@lang('admin.student')</th>
                                                 <th>@lang('admin.email') @lang('admin.status')</th>
                                                <th>@lang('admin.sms') @lang('admin.status')</th>
                                                <th>@lang('admin.action')</th>
                                              <th>@lang('admin.delivery') @lang('admin.status')</th>
                                                 <th>@lang('admin.delete')</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
        @foreach(\App\Announce::latest()->get() as $announce)
                                            <tr>
                                                <td>{{$loop->iteration}}</td>
                                                <td>{{$announce->ref}}</td>
                                                <td>{{$announce->subject}}</td>
                <td>{{count(\App\Announcelist::where('announce_id',$announce->id)->get())}}</td>
                                                <td>
                                  @if($announce->email_not=='1')
                                  @lang('admin.active')
                                  @else
                                 @lang('admin.no_active')
                                  @endif
                                                </td>
                                                <td>
                                  @if($announce->sms_not=='1')
                                  @lang('admin.active')
                                  @else
                                  @lang('admin.no_active')
                                  @endif
                                                </td>
                                                <td>
                                        <table class="table-bordered">
                                          <tr>
                                            <td>
          <button onclick="showAjaxModal('{{url('')}}/edit/announce/message/{{$announce->id}}')"  class="btn btn-sm btn-primary">@lang('admin.edit') @lang('admin.message')</button>
                                            </td>
                                            <td>
                                               @if($announce->status=='0'||$announce->status=='')  
                              <button id="send{{$loop->iteration}}" onclick="sendmsg('{{$announce->id}}','send{{$loop->iteration}}')"  class="btn btn-sm btn-warning">@lang('admin.pend_message')</button>  
                                        @elseif($announce->status=='1')
                              <button id="send{{$loop->iteration}}" onclick="sendmsg('{{$announce->id}}','send{{$loop->iteration}}')" class="btn btn-sm btn-success">@lang('admin.sent_message')</button> 
                                        @endif
                                            </td>
                                          </tr>
                                        </table>
                                               
                                                </td>
                  <td>
                    <button onclick="showAjaxModal('{{url('')}}/show/announce/resent/{{$announce->id}}')" class="btn btn-sm btn-custom">@lang('admin.status')</button>  
                  
                                               </td>
                            <td>
                           <a onclick="deleteannounce('{{$announce->id}}')" class="btn btn-danger btn-sm btn-block"><i class="fa fa-trash"></i>@lang('admin.delete')</a>  
                            </td>
                                            </tr>
                       @endforeach
                                        </tbody>
                                    </table>
                      <script type="text/javascript">
                        $('#example12').DataTable();
                      </script>