  @extends('layouts.parent')
@section('content')
               <div class="row page-titles">
                    <div class="col-md-5 col-8 align-self-center">
                        <h3 class="text-themecolor">@lang('parent.inbox')</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{url('')}}/parent/page.fmp?page=1">@lang('parent.home')</a></li>
                            <li class="breadcrumb-item active">@lang('parent.inbox')</li>
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
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="row">
                                <div class="col-xlg-2 col-lg-4 col-md-4">
                        <div class="card-body inbox-panel">
                                        <ul class="list-group list-group-full">
                                            <li class="list-group-item active" id="inbox"> <a onclick="loadcont('{{url('')}}/show/inbox','inbox')" href="javascript:void(0)"><i class="mdi mdi-gmail"></i>@lang('admin.inbox') </a><span class="badge badge-success ml-auto">{{count(\App\Messaging::where('receive_id',\Auth::user()->id)->latest()->get())}}</span></li>
                                            <li class="list-group-item" id="starred">
                                                <a onclick="loadcont('{{url('')}}/show/starred','starred')" href="javascript:void(0)"> <i class="mdi mdi-star"></i>@lang('admin.unread') @lang('admin.mail')  </a><span class="badge badge-success ml-auto">{{count(\App\Messaging::where('receive_id',\Auth::user()->id)->where('status','0')->latest()->get())}}</span>
                                            </li>
                                            <li class="list-group-item" id="trash">
                                                <a onclick="loadcont('{{url('')}}/show/trash','trash')" href="javascript:void(0)"> <i class="mdi mdi-delete"></i> @lang('admin.trash') @lang('admin.mail')</a>
                                            </li>
                                        </ul>
                                        <h3 class="card-title m-t-40">@lang('admin.label')</h3>
                                        <div class="list-group b-0 mail-list"> <a href="javascript:void(0)" class="list-group-item"><span class="fa fa-circle text-info m-r-10"></span>@lang('admin.admin')</a> <a href="javascript:void(0)" class="list-group-item"><span class="fa fa-circle text-warning m-r-10"></span>@lang('admin.staff')</a> <a href="javascript:void(0)" class="list-group-item"><span class="fa fa-circle text-primary m-r-10"></span>@lang('admin.other')</a> </div>
                                    </div>
                                </div>
                               
                                <div class="col-xlg-10 col-lg-8 col-md-8">
                                     <div class="show_content">
                                    <div class="card-body">
                                        <div class="btn-group m-b-10 m-r-10" role="group" aria-label="Button group with nested dropdown">
                                            <button type="button" onclick="deleteselect()" class="btn btn-secondary font-18 text-dark"><i class="mdi mdi-delete"></i></button>
                                        </div>
                                        <button type="button" onclick="loadcont('{{url('')}}/show/inbox','inbox')" class="btn btn-secondary m-r-10 m-b-10 text-dark"><i class="mdi mdi-reload font-18"></i></button>
                                    </div>
                                    <div class="card-body p-t-0">
                                        <div class="card b-all shadow-none">
                                            <div class="inbox-center table-responsive">
                        <table id="datatabler" class="table table-hover no-wrap customed">
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
        @forelse(\App\Messaging::where('receive_id',\Auth::user()->id)->latest()->get() as $message)
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
                    <td class="max-texts"> <a onclick="loadcont('{{url('')}}/content/inbox/{{$message->id}}','inbox')" href="javascript:void(0)">@if($message->type=='admin')
                                                            <span class="label label-info m-r-10">@lang('admin.admin')</span>
                                                    @elseif($message->type=='teacher'||$message->type=='staff')
                                                             <span class="label label-warning m-r-10">@lang('admin.staff')</span>
                                                             @elseif($message->type=='other')
                                                             <span class="label label-purple m-r-10">@lang('admin.other')</span>
                                                             @endif{{$message->message_title}}</a></td>
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
                                </div>
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
 <script src="{{url('')}}/assets/plugins/jquery/jquery.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
$("#datatabler").DataTable();
    });
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
                jQuery('.show_content').html(data);
                });
               });
                }
              }
</script> 
@endsection