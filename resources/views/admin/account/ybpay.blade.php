@extends('layouts.admin')

@section('content')

                <!-- ============================================================== -->
                <!-- Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <div class="row page-titles">
                    <div class="col-md-5 col-8 align-self-center">
                        <h3 class="text-themecolor">@lang('admin.year_book') @lang('admin.payment')</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">@lang('admin.home')</a></li>
                            <li class="breadcrumb-item active">@lang('admin.year_book') @lang('admin.payment')</li>
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
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">@lang('admin.year_book') @lang('admin.payment') </h4>
                                <h6 class="card-subtitle">@lang('admin.event-list-data')</h6>
                                <div class="table-responsive m-t-40">
        <table id="example23" class="display nowrap table  table-bordered" cellspacing="0" width="100%">
                                       <thead>
                                            <tr>
                                                <th>#</th>
                                               <th>@lang('admin.ref_id')</th>
                                                <th>@lang('admin.name')</th>
                                                <th>@lang('admin.email')</th>
                                                <th>@lang('admin.year_book') @lang('admin.title')</th>
                                                 <th>@lang('admin.year')</th>
                                                <th>@lang('admin.price')</th>
                                                <th>@lang('admin.amount')</th>
                                                <th>@lang('admin.method')</th>
                                                <th>@lang('admin.download') @lang('admin.status')</th>
                                                <th>@lang('admin.pay') @lang('admin.status')</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                             <th>#</th>
                                             <th>@lang('admin.ref_id')</th>
                                                <th>@lang('admin.name')</th>
                                                <th>@lang('admin.email')</th>
                                                <th>@lang('admin.year_book') @lang('admin.title')</th>
                                                 <th>@lang('admin.year')</th>
                                                <th>@lang('admin.price')</th>
                                                <th>@lang('admin.amount')</th>
                                                <th>@lang('admin.method')</th>
                                                <th>@lang('admin.download') @lang('admin.status')</th>
                                                <th>@lang('admin.pay') @lang('admin.status')</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
@foreach(\App\Ypayment::latest()->get() as $class)
                                            <tr>
<td>{{$loop->iteration}}</td>
<td>{{$class->token}}</td>
<td>{{$class->pay_name}}</td>
<td>{{$class->pay_email}}</td>
<td>{{\App\Yearbook::find($class->item)->title}}</td>
<td>{{\App\Yearbook::find($class->item)->session}}</td>
<td>{{\App\Yearbook::find($class->item)->price}}</td>
<td>{{$class->amount}}</td>
<td>{{$class->method}}</td>
<td>
@if($class->status=='1')
<span  class="btn btn-success">@lang('admin.success')</span>
@else
<span onclick="resendmail('{{$class->id}}')" class="btn btn-danger">@lang('admin.not_send')</span>
@endif
</td>
<td>
@if($class->pstatus=='1')
<span class="btn btn-success">@lang('admin.success')</span>
@else
<span class="btn btn-danger">@lang('admin.decline')</span>
@endif    
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
<script type="text/javascript">
     $('#example23').DataTable({
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    });
     function resendmail(upp){
         if(confirm("@lang('admin.confirm_email_sent')")){ 
      $.get('{{url('')}}/resend/link/'+upp, function(data) {
            if(data=='1'){
  swal("@lang('admin.message_sent_well')", "@lang('admin.continue-button')", "success");
       reload();
            }
            else{
            swal("@lang('admin.message_nt_sent')", "@lang('admin.continue-button')", "error");     
            }
            });
  }
     }
</script>
@endsection