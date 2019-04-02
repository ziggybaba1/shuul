 <div class="row">
 <div class="card-body">
                                        <h3 class="card-title">@lang('admin.announce') @lang('admin.status') ({{\App\Announce::find($id)->ref}})</h3>
         <div class="table-responsive m-t-40">
     <table class="display nowrap table table-hover table-striped table-bordered escape" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                               <th>#</th>
                                                <th>@lang('admin.parent')</th>
                                                <th>@lang('admin.phone')</th>
                                                <th>@lang('admin.status')</th>
                                                <th>@lang('admin.option')</th>
                                            </tr>
                                        </thead>
                                         <tfoot>
                                            <tr>
                                                 <th>#</th>
                                                <th>@lang('admin.parent')</th>
                                                <th>@lang('admin.phone')</th>
                                                <th>@lang('admin.status')</th>
                                                <th>@lang('admin.option')</th>
                                            </tr>
                                        </tfoot>
                                          <tbody>
    @foreach(\App\Announcelist::where('announce_id',$id)->get() as $list) 
    <tr>
        <td>{{$loop->iteration}}</td>
        <td>
    <div class="form-group">
            <select required name="receive_id" class="form-control select2">
            <option value="{{$list->parent_id}}">{{\App\Parenting::findOrFail($list->parent_id)->name}}</option>
            </select>
        </div>
        </td>
         <td>
              <div class="form-group">
              <input name="number" value="{{\App\Parenting::findOrFail($list->parent_id)->phone}}" class="form-control" placeholder="@lang('admin.phone')">   
              </div>
         </td>
          
           <td>
              @if($list->type=='Multitexter')
                    @if($list->status=='100')
                        <span class="btn btn-success btn-sm"><i class="fa fa-check"></i>@lang('admin.message_sent') </span>
                    @elseif($list->status=='-3')
                        <span class="btn btn-danger btn-sm"><i class="fa fa-times"></i>@lang('admin.no_credit')</span>
                        @elseif($list->status=='-1')
                        <span class="btn btn-warning btn-sm"><i class="fa fa-times"></i>@lang('admin.pending')</span>
                    @elseif($list->status=='-6')
                        <span class="btn btn-danger btn-sm"><i class="fa fa-times"></i>@lang('admin.inv_message')</span>
                    @elseif($list->status=='-5')
        <span class="btn btn-danger btn-sm"><i class="fa fa-times"></i>@lang('admin.no-recipient') </span>
         @else
        <span class="btn btn-danger btn-sm"><i class="fa fa-times"></i>@lang('admin.un_error')</span>
                    @endif
                    @endif
                    @if($list->type=='Nexmo')
                    @if($list->status=='0')
                        <span class="btn btn-success btn-sm"> <i class="fa fa-check"></i>@lang('admin.message_sent')</span>
                    @elseif($list->status=='15')
                        <span class="btn btn-danger btn-sm"><i class="fa fa-times"></i>@lang('admin.no_credit')</span>
                         @elseif($list->status=='-1')
                        <span class="btn btn-warning btn-sm"><i class="fa fa-times"></i>@lang('admin.pending')</span>
                    @elseif($list->status=='10')
                        <span class="btn btn-danger btn-sm"><i class="fa fa-times"></i>@lang('admin.inv_message')</span>
                    @elseif($list->status=='8')
                        <span class="btn btn-danger btn-sm"><i class="fa fa-times"></i>@lang('admin.net_error')</span>
                    @elseif($list->status=='9')
                        <span class="btn btn-danger btn-sm"><i class="fa fa-times"></i>@lang('admin.no_recipient')</span>
         @else
                        <span class="btn btn-danger btn-sm"><i class="fa fa-times"></i>@lang('admin.un_error')</span>
                    @endif
                    @endif
                     @if($list->type=='Bulksms')
                    @if($list->status=='200')
                        <span class="btn btn-success btn-sm"> <i class="fa fa-check"></i>@lang('admin.message_sent')</span>
                    @elseif($list->status=='0')
                        <span class="btn btn-danger btn-sm"><i class="fa fa-times"></i>@lang('admin.message_failed')</span>
                         @elseif($list->status=='-1')
                        <span class="btn btn-warning btn-sm"><i class="fa fa-times"></i>@lang('admin.pending')</span>
                    @elseif($list->status=='25')
                        <span class="btn btn-danger btn-sm"><i class="fa fa-times"></i>@lang('admin.no_credit')</span>
                    @elseif($list->status=='40')
                        <span class="btn btn-danger btn-sm"><i class="fa fa-times"></i>@lang('admin.net_error')</span>
         @else
                        <span class="btn btn-danger btn-sm"><i class="fa fa-times"></i>@lang('admin.un_error')</span>
                    @endif
                    @endif
           </td>
            <td>
                  @if($list->type=='Multitexter')
                    @if($list->status=='100')
                    @elseif($list->status=='-3')
                          <button id="resend{{$loop->iteration}}" onclick="resendmsg('{{$list->id}}','resend{{$loop->iteration}}')" class="btn btn-warning btn-sm"><i class="fa fa-reload"></i>@lang('admin.resend')</button>
                            @elseif($list->status=='-1')
                          <button id="resend{{$loop->iteration}}" onclick="resendmsg('{{$list->id}}','resend{{$loop->iteration}}')" class="btn btn-primary btn-sm"><i class="fa fa-reload"></i>@lang('admin.send')</button>
                    @elseif($list->status=='-6')
                          <button id="resend{{$loop->iteration}}" onclick="resendmsg('{{$list->id}}','resend{{$loop->iteration}}')" class="btn btn-warning btn-sm"><i class="fa fa-reload"></i>@lang('admin.resend')</button>
                    @elseif($list->status=='-5')
          <button id="resend{{$loop->iteration}}" onclick="resendmsg('{{$list->id}}','resend{{$loop->iteration}}')" class="btn btn-warning btn-sm"><i class="fa fa-reload"></i>@lang('admin.resend')</button>
         @else
          <button id="resend{{$loop->iteration}}" onclick="resendmsg('{{$list->id}}','resend{{$loop->iteration}}')" class="btn btn-warning btn-sm"><i class="fa fa-reload"></i>@lang('admin.resend')</button>
                    @endif
                    @endif
                    @if($list->type=='Nexmo')
                    @if($list->status=='0')
                       
                    @elseif($list->status=='15')
                        <button id="resend{{$loop->iteration}}" onclick="resendmsg('{{$list->id}}','resend{{$loop->iteration}}')" class="btn btn-warning btn-sm"><i class="fa fa-reload"></i>@lang('admin.resend')</button>
                         @elseif($list->status=='-1')
                          <button id="resend{{$loop->iteration}}" onclick="resendmsg('{{$list->id}}','resend{{$loop->iteration}}')" class="btn btn-primary btn-sm"><i class="fa fa-reload"></i>@lang('admin.send')</button>
                    @elseif($list->status=='10')
                         <button id="resend{{$loop->iteration}}" onclick="resendmsg('{{$list->id}}','resend{{$loop->iteration}}')" class="btn btn-warning btn-sm"><i class="fa fa-reload"></i>@lang('admin.resend')</button>
                    @elseif($list->status=='8')
                           <button id="resend{{$loop->iteration}}" onclick="resendmsg('{{$list->id}}','resend{{$loop->iteration}}')" class="btn btn-warning btn-sm"><i class="fa fa-reload"></i>@lang('admin.resend')</button>
                    @elseif($list->status=='9')
                          <button id="resend{{$loop->iteration}}" onclick="resendmsg('{{$list->id}}','resend{{$loop->iteration}}')" class="btn btn-warning btn-sm"><i class="fa fa-reload"></i>@lang('admin.resend')</button>
         @else
                        <button id="resend{{$loop->iteration}}" onclick="resendmsg('{{$list->id}}','resend{{$loop->iteration}}')" class="btn btn-warning btn-sm"><i class="fa fa-reload"></i>@lang('admin.resend')</button>
                    @endif
                    @endif
                     @if($list->type=='Bulksms')
                    @if($list->status=='200')
                    
                    @elseif($list->status=='0')
                        <button id="resend{{$loop->iteration}}" onclick="resendmsg('{{$list->id}}','resend{{$loop->iteration}}')" class="btn btn-warning btn-sm"><i class="fa fa-reload"></i>@lang('admin.resend')</button>
                         @elseif($list->status=='-1')
                          <button id="resend{{$loop->iteration}}" onclick="resendmsg('{{$list->id}}','resend{{$loop->iteration}}')" class="btn btn-primary btn-sm"><i class="fa fa-reload"></i>@lang('admin.send')</button>
                    @elseif($list->status=='25')
                        <button id="resend{{$loop->iteration}}" onclick="resendmsg('{{$list->id}}','resend{{$loop->iteration}}')" class="btn btn-warning btn-sm"><i class="fa fa-reload"></i>@lang('admin.resend')</button>
                    @elseif($list->status=='40')
                       <button id="resend{{$loop->iteration}}" onclick="resendmsg('{{$list->id}}','resend{{$loop->iteration}}')" class="btn btn-warning btn-sm"><i class="fa fa-reload"></i>@lang('admin.resend')</button>
         @else
                     <button id="resend{{$loop->iteration}}" onclick="resendmsg('{{$list->id}}','resend{{$loop->iteration}}')" class="btn btn-warning btn-sm"><i class="fa fa-reload"></i>@lang('admin.resend')</button>
                    @endif
                    @endif
            </td>
    </tr>
                    
                    @endforeach
                                    </div>
                </div>
                <script type="text/javascript">
                    $(document).ready(function() {
            $('.escape').DataTable();
         
         });
                    function resendmsg(value,idd){
                        $('#'+idd).html('<img src="{{url('')}}/assets/images/preloader.gif" style="height:30px;" />Sending.....');
                    $.get('{{url('')}}/announce/resend/sms/'+value, function(data) {
            if(data=='100'||data=='0'||data=='200'){
    swal("@lang('admin.message_sent_well')", "@lang('admin.continue-button')", "success"); 
    $('#'+idd).html('Success');
       $('#'+idd).removeClass('btn-warning'); 
       $('#'+idd).addClass('btn-success'); 
            }
            else{
 swal("@lang('admin.message_fail_well')", "@lang('admin.continue-button')", "error");
                $('#'+idd).html('Failed');
                $('#'+idd).removeClass('btn-warning'); 
       $('#'+idd).addClass('btn-danger'); 
            }
            });
                    }
                </script>