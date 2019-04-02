@extends('layouts.admin')
@section('content')
  
<div class="row page-titles">
                    <div class="col-md-6 col-8 align-self-center">
                        <h3 class="text-themecolor">@lang('admin.announcement')</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{url('')}}/admin/page.fmp?page=1">@lang('admin.home')</a></li>
                            <li class="breadcrumb-item active">@lang('admin.announcement')</li>
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
                    <div class="col-md-12">
                          @if (session('message'))
                 <div class="alert alert-info alert-rounded">{{ session('message') }}</div>
                    @endif
                        <div class="card">
                           <div class="card-body">
                            <div class="pull-right">
              <button data-toggle="modal" data-target=".bs-example-modal-lg" class="btn btn-md btn-primary">@lang('admin.create') @lang('admin.announce')</button>
                            </div>

                          <div class="table-responsive m-t-40 show_content">
                                    <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
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
                                </div>
                              </div>
                         </div>
                    </div>
                </div>
<div class="modal fade bs-example-modal-lg" id="modal_ajag" aria-hidden="true" style="display: none;">
        <div class="modal-dialog modal-lg">
            <div  class="come modal-content" style="height:auto; overflow:auto;">
                <div class="modal-header">
                    <h4 class="modal-title">@lang('admin.announce') @lang('admin.form')</h4>
                    <button id="first" type="button" class="hider btn btn-danger btn-sm" data-dismiss="modal">@lang('admin.close')</button>
                </div>
                
                <div class="modal-body">
                  <div class="row">
                           <div class="col-md-2"></div>
                           <div class="col-md-8">
                               <div class="card m-b-30 widget-flat border-custom text-white" >
                                  <i class="fi-tag"></i>
                                    <div class="card-body">
                                        <h5 class="card-title">@lang('admin.create') @lang('admin.announce') @lang('admin.parent')</h5>
  <form action="{{url('')}}/practise/do-announce" method="post" enctype="multipart/form-data" role="form">
            {{ csrf_field() }}
             <div class="form-group">
            <label style="color: black;" for="example-email">@lang('admin.select') @lang('admin.class') *<span class="help"></span></label>
            <select style="width: 100%;" id="classdetail" name="class" required class="form-control select2">
                <option></option>
                 @foreach(\App\Course::all() as $class)
                            <option value="{{$class->id}}">{{$class->title}}</option>
                     @endforeach
            </select>
                                </div>
                            <div class="form-group m-b-20 row">
                             <div class="col-12">
        <input type="text" class="form-control" hidden name="ref" value="{{\Keygen\Keygen::numeric(5)->generate()}}">
                                        <label style="color: black;">@lang('admin.select') @lang('admin.student')</label>
    <select id="studentdetail" class="form-control select2" style="width: 100%;" name="student[]" multiple="multiple" data-placeholder="Select Student(s)"> 
      
                  </select>
                                    </div>
                            </div>
                            <div class="form-group m-b-20 row">
                             <div class="col-12">
                                        <label style="color: black;">@lang('admin.title')<small>(@lang('admin.max_length') 50)</small></label>
                   <input type="text" class="form-control" maxlength="50" name="subject" placeholder="Subject of the Announcement">
                                    </div>
                            </div>
                            <div class="form-group m-b-20 row">
                             <div class="col-12">
                                        <label style="color: black;" for="emailaddress">@lang('admin.message') <small>(@lang('admin.max_length') 160)</small></label>
                    <textarea class="form-control" maxlength="160" rows="7" name="message" placeholder="Add Message"></textarea>
                                    </div>
                            </div>
                            
                              <div class="checkbox checkbox-primary">
                                <input id="checkbox4" type="checkbox" checked value="1" name="email">
                                                    <label style="color: black;" for="checkbox4">
                                                        @lang('admin.enable_email_not')
                                                    </label>
                                                </div>
                                                <div class="checkbox checkbox-primary">
                                <input id="checkbox5" type="checkbox" checked value="1" name="sms">
                                                    <label style="color: black;" for="checkbox5">
                                                       @lang('admin.enable_sms_not')
                                                    </label>
                                                </div>
                            <div class="form-group row text-center m-t-10">
                                    <div class="col-12">
                                        <button class="btn btn-block btn-custom waves-effect waves-light" type="submit">@lang('admin.submit')</button>
                                        
                                    </div>
                                </div>
                                </form>  
                                    </div>
                                </div>
                              </div>
                           <div class="col-md-2"></div>
                         </div>
                </div>
                
                <div class="modal-footer">
                    <button type="button" class="hider btn btn-default" data-dismiss="modal">@lang('admin.close')</button>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
      function sendmsg(value,idd){
        if(confirm("@lang('admin.confirm_announce')")){ 
                        $('#'+idd).html('<img src="{{url('')}}/assets/images/preloader.gif" style="height:30px;" />Sending.....');
      $.ajax({
      url: '{{url('')}}/send/announce/message/'+value,
      success: function(data)
      {
       if(data=='0'){
          swal("@lang('admin.message_sent_well')", "@lang('admin.continue-button')", "success"); 
          $('#'+idd).html('Sent');
       $('#'+idd).removeClass('btn-warning');
        $('#'+idd).removeClass('btn-danger');   
       $('#'+idd).addClass('btn-success'); 
            }
             else{
              $('#'+idd).html("@lang('admin.message_fail_well')");
              $('#'+idd).removeClass('btn-warning');
              $('#'+idd).removeClass('btn-success');  
              $('#'+idd).addClass('btn-danger'); 
             }
      },
       error:function(data){
        $('#'+idd).html("@lang('admin.net_error')");
              $('#'+idd).removeClass('btn-warning');
              $('#'+idd).removeClass('btn-success');  
              $('#'+idd).addClass('btn-danger'); 
      },
    });
                    }
                  }
                     function deleteannounce(idd){
                  if(confirm("@lang('admin.confirm_delete')")){ 
                $.get('{{url('')}}/delete/announce/'+idd,function(data)
                {
                  swal("@lang('admin.account_delete')", "@lang('admin.continue-button')", "success");
                jQuery('.show_content').html(data);
                });
                }
              }
    </script>
@endsection