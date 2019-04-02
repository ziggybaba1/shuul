<div class="row">
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-body">
<h4 class="card-title">{{\App\Teacher::find($id)->gname}} {{\App\Teacher::find($id)->fname}} @lang('admin.sal_pay_detail')</h4>
                <h6 class="card-subtitle"></h6>
    <div class="table-responsive m-t-40">
        <table id="example26" class="display nowrap table  table-bordered" cellspacing="0" width="100%">
                                       <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>@lang('admin.amount-paid')</th>
                                                <th>@lang('admin.year_month')</th>
                                                <th>@lang('admin.date_paid')</th>
                                                <th>@lang('admin.deduction')</th>
                                                <th>@lang('admin.duc_reason')</th>
                                                <th>@lang('admin.delete')</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                              <th>#</th>
                                                <th>@lang('admin.amount-paid')</th>
                                                <th>@lang('admin.year_month')</th>
                                                <th>@lang('admin.date_paid')</th>
                                                <th>@lang('admin.deduction')</th>
                                                <th>@lang('admin.duc_reason')</th>
                                                <th>@lang('admin.delete')</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
@foreach(\App\Pay::where('staff_id',$id)->get() as $class)
                                            <tr>
<td>{{$loop->iteration}}</td>
<td>{{\App\Currency::find(\App\Setting::first()->currency)->symbol}}{{$class->amount}}</td>
<td>{{\Carbon\Carbon::parse($class->date)->toFormattedDateString()}}</td>
<td>
{{\Carbon\Carbon::parse($class->created_at)->toFormattedDateString()}}
</td>
<td>{{\App\Currency::find(\App\Setting::first()->currency)->symbol}}{{$class->deduct}}</td>
<td>
{{$class->reason}}
</td>
<td><button onclick="deletepay('{{$class->id}}')" class="btn btn-danger btn-sm">@lang('admin.delete')</button></td>
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
                $('#example26').DataTable({
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    });
                 function deletepay(id)
              {
                if(confirm('Press Ok to confirm delete!!!')){ 
                $.get('{{url('')}}/delete/pay/'+id,function(data)
                {
                if(data==0){
                  swal("@lang('admin.pay_message')", "@lang('admin.continue-button')", "success");
                    window.location.assign('{{url('')}}/admin/page.fmp?page=41');
                }
            else{
                     swal("@lang('admin.pay_message_error')", "@lang('admin.continue-button')", "error");
                    }    
                });
            }
              }
            </script>