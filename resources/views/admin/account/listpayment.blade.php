<div class="card">
                            <div class="card-body">
                                <h4 class="card-title">{{\App\Student::find($id)->user_id}} {{\App\Student::find($id)->gname}} {{\App\Student::find($id)->fname}} @lang('admin.payment') @lang('admin.history')</h4>
                                <h6 class="card-subtitle"></h6>
                                <div class="table-responsive m-t-40">
<table id="datalong" class="display nowrap table  table-bordered">
    <tr>
        <th>#</th>
         <th>@lang('admin.receipt_id')</th>
        <th>@lang('admin.amount')</th>
         <th>@lang('admin.method')</th>
         <th>@lang('admin.session')</th>
         <th>@lang('admin.term')</th>
        <th>@lang('admin.sign')</th>
        <th>@lang('admin.status')</th>
    </tr>
@if(count(\App\Fpayment::where('student_id',$id)->where('session',\App\Session::first()->session)->where('term',\App\Session::first()->terms)->get())>0)
@foreach(\App\Fpayment::where('student_id',$id)->get() as $stud)
@foreach(\App\Feepay::where('pay_id',$stud->id)->get() as $payment)
   <tr>
    <td>{{$loop->iteration}}</td>
<td>{{$payment->receipt_id}}</td>
<td>{{$payment->amount}}</td>
 <td>{{$payment->method}}</td> 
 <td>{{$stud->session}}</td>
 <td>
       @if($stud->term==='First')
                                @lang('admin.first_term')
                                @elseif($stud->term==='Second')
                                @lang('admin.second_term')
                                 @elseif($stud->term==='Third')
                                @lang('admin.third_term')
                                 @elseif($stud->term==='Fourth')
                                @lang('admin.fourth_term')
                             @endif
 </td>
    <td>{{$payment->sign}}</td> 
    <td>
        @if($payment->status=='1')
<span onclick="getreceipt('{{$payment->id}}')" class="btn btn-success"><i class="fa fa-print"></i>@lang('admin.print') @lang('admin.receipt')</span>
@elseif($payment->status=='0')
<span onclick="acceptpay('{{$payment->id}}')" class="btn btn-warning"><i class="fa fa-money"></i>@lang('admin.accept') @lang('admin.payment')</span>
@endif
    </td>
    
</tr>
@endforeach
@endforeach
@endif
</table>
</div>
<div class="showcontent">

    </div>
</div>
</div>
<script type="text/javascript">
    function getreceipt(id,idd){
         jQuery('.showcontent').html('<div style="text-align:center;margin-top:200px;"><img src="{{url('')}}/assets/images/preloader.gif" style="height:100px;" /></div>');
      $.get('{{url('')}}/view/fee/payment/'+id, function(datab) {
        $('.showcontent').html(datab);
            });  
         }
         function acceptpay(id,idd){
         jQuery('.showcontent').html('<div style="text-align:center;margin-top:200px;"><img src="{{url('')}}/assets/images/preloader.gif" style="height:100px;" /></div>');
      $.get('{{url('')}}/accept/fee/payment/'+id, function(datab) {
        $('.showcontent').html(datab);
            });  
         }
          $('#datalong').DataTable({
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    });
</script>