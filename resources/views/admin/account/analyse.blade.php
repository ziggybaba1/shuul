<div class="card">
                            <div class="card-body">
                                <h4 class="card-title">{{\App\Student::find($id)->user_id}} {{\App\Student::find($id)->gname}} {{\App\Student::find($id)->fname}} @lang('admin.payment') @lang('admin.analyse')</h4>
                                <h6 class="card-subtitle"></h6>
                                <div class="table-responsive m-t-40">
<table class="display nowrap table  table-bordered">
    <tr>
       <th>#</th>
         <th>@lang('admin.receipt_id')</th>
       <th>@lang('admin.amount')</th>
         <th>@lang('admin.method')</th>
        <th>@lang('admin.sign')</th>
        <th>@lang('admin.status')</th>
    </tr>
@if(count(\App\Fpayment::where('student_id',$id)->where('session',\App\Session::first()->session)->where('term',\App\Session::first()->terms)->get())>0)
@foreach(\App\Feepay::where('pay_id',\App\Fpayment::where('student_id',$id)->where('session',\App\Session::first()->session)->where('term',\App\Session::first()->terms)->first()->id)->get() as $payment)
   <tr>
    <td>{{$loop->iteration}}</td>
<td>{{$payment->receipt_id}}</td>
<td>{{$payment->amount}}</td>
 <td>{{$payment->method}}</td> 
    <td>{{$payment->sign}}</td> 
    <td>
        @if($payment->status=='1')
<span onclick="getreceipt('{{$payment->id}}')" class="btn btn-success"><i class="fa fa-print"></i>@lang('admin.print') @lang('admin.receipt')</span>
@elseif($payment->status=='0')
<span onclick="acceptpay('{{$payment->id}}')" class="btn btn-warning"><i class="fa fa-money"></i>@lang('admin.accept')@lang('admin.payment')</span>
@elseif($payment->status=='2')
<span onclick="verifypay('{{$payment->id}}')" class="btn btn-primary"><i class="fa fa-spin fa-spinner"></i>  @lang('admin.verify_payee')</span> 
@elseif($payment->status=='3')
<span  class="btn btn-danger"><i class=""></i>  @lang('admin.payee_decline')</span>
@endif
    </td>
    
</tr>
@endforeach
@endif
</table>
</div>
<div class="showcontent">

    </div>
</div>
</div>
<script type="text/javascript">
    function getreceipt(id){
         jQuery('.showcontent').html('<div style="text-align:center;margin-top:200px;"><img src="{{url('')}}/assets/images/preloader.gif" style="height:100px;" /></div>');
      $.get('{{url('')}}/view/fee/payment/'+id, function(datab) {
        $('.showcontent').html(datab);
            });  
         }
         function acceptpay(id){
         jQuery('.showcontent').html('<div style="text-align:center;margin-top:200px;"><img src="{{url('')}}/assets/images/preloader.gif" style="height:100px;" /></div>');
      $.get('{{url('')}}/accept/fee/payment/'+id, function(datab) {
        $('.showcontent').html(datab);
            });  
         }
          function verifypay(id){
         jQuery('.showcontent').html('<div style="text-align:center;margin-top:200px;"><img src="{{url('')}}/assets/images/preloader.gif" style="height:100px;" /></div>');
      $.get('{{url('')}}/verify/fee/payment/'+id, function(datab) {
        $('.showcontent').html(datab);
            });  
         }
</script>