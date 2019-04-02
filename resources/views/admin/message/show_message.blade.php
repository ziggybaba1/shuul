<div class="card-body">
                                        <div class="btn-group m-b-10 m-r-10" role="group" aria-label="Button group with nested dropdown">
                                            <button type="button" onclick="deletemessage('{{$id}}')" class="btn btn-secondary font-18 text-dark"><i class="mdi mdi-delete"></i></button>
                                        </div>
                                        <button type="button" onclick="loadcontm('{{url('')}}/content/inbox/{{$id}}','inbox')" class="btn btn-secondary m-r-10 m-b-10 text-dark"><i class="mdi mdi-reload font-18"></i></button>
                                       
                                    </div>
                                    <div class="card-body p-t-0">
                                        <div class="card b-all shadow-none">
                                            <div class="card-body">
                                                <h3 class="card-title m-b-0">{{\App\Messaging::find($id)->message_title}}</h3>
                                            </div>
                                            <div>
                                                <hr class="m-t-0">
                                            </div>
                                            <div class="card-body">
                                                <div class="d-flex m-b-40">
                                                    <div>
                                                        <a href="javascript:void(0)"><img src="{{url('')}}/uploads/avatars/{{\App\Teacher::where('user_table',\App\User::find(\App\Messaging::find($id)->send_id)->id)->first()->image}}" alt="user" width="40" class="img-circle" /></a>
                                                    </div>
                                                    <div class="p-l-10">
                                                        <h4 class="m-b-0">{{\App\User::find(\App\Messaging::find($id)->send_id)->name}}</h4>
                                                        <small class="text-muted"></small>
                                                    </div>
                                                </div>
                                               {!!\App\Messaging::find($id)->content!!}
                                            </div>
                                            <div>
                                                <hr class="m-t-0">
                                            </div>
                                            <div class="card-body">
                                                <h4><i class="fa fa-paperclip m-r-10 m-b-10"></i> Attachments <span>({{count(\App\Messfile::where('mess_id',$id)->get())}})</span></h4>
                                                <div class="row">
                                            @foreach(\App\Messfile::where('mess_id',$id)->get() as $file)
                                            @if($file->mime=='image/png'||$file->mime=='image/jpeg')
                                                    <div class="col-md-2">
                                                        <a href="{{url('')}}/download/message/{{$file->file}}"> <img class="img-thumbnail img-responsive" alt="attachment" src="{{url('')}}/icon/jpg-512.png"> </a>
                                                    </div>
                            
        @elseif($file->mime=='application/pdf')
                                <div class="col-md-2">
                                <a href="{{url('')}}/download/message/{{$file->file}}"> <img class="img-thumbnail img-responsive" alt="attachment" src="{{url('')}}/icon/29587.png"> </a>
                                </div>
            @elseif($file->mime=='application/vnd.openxmlformats-officedocument.wordprocessingml.document'||$file->mime=='application/msword')
                                <div class="col-md-2">
                                <a href="{{url('')}}/download/message/{{$file->file}}"> <img class="img-thumbnail img-responsive" alt="attachment" src="{{url('')}}/icon/microsoft-word-512.png"> </a>
                                </div>
                                @else
                                 <div class="col-md-2">
                                <a href="{{url('')}}/download/message/{{$file->file}}"> <img class="img-thumbnail img-responsive" alt="attachment" src="{{url('')}}/icon/All_reports.png"> </a>
                                </div>
                                            @endif
                                            @endforeach 
                                                </div>
                                               
                                            </div>
                                        </div>
                                    </div>
                                    <script type="text/javascript">
               function deletemessage(id)
              {
                if(confirm("@lang('admin.confirm_delete')")){ 
                $.get('{{url('')}}/deleten/mailbox/'+id,function(data)
                {
                 swal("@lang('admin.account_delete')", "@lang('admin.continue-button')", "success");
                 
                jQuery('.show_content').html(data);
                });
            }
              }
               function loadcontm(url,did){
                   
         jQuery('.show_content').html('<div style="text-align:center;margin-top:200px;"><img src="{{url('')}}/assets/images/preloader.gif" style="height:50px;" /></div>');
                $.get(url, function(data) {
                  
             jQuery('.show_content').html(data);
            });
              }
          </script>