@extends('layouts.admin')
@section('content')

    <div class="row page-titles">
                    <div class="col-md-5 col-8 align-self-center">
                        <h3 class="text-themecolor">@lang('admin.schoolin-fee')</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{url('')}}/admin/page.fmp?page=1">@lang('admin.home')</a></li>
                            <li class="breadcrumb-item active">@lang('admin.schoolin-fee')</li>
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
                    <div class="col-sm-12">
                          @if (session('message'))
                 <div class="alert alert-info alert-rounded">{{ session('message') }}</div>
                    @endif
                        <div class="card card-body">
                            <h4 class="card-title">@lang('admin.student_payment')</h4>
                            <h6 class="card-subtitle">@lang('admin.add_pay_class')</h6>

    <div class="row">
       
       <div class="col-md-2"></div>
                    <div class="col-sm-8">
                             <div class="form-group">
            <label for="example-email">@lang('admin.class') *<span class="help"></span></label>
            <input type="hidden" id="searchvalue" value="8" name="">
            <select id="classtatusn" class="form-control select2">
                <option id="non">@lang('admin.all') @lang('admin.payment')</option>
                 @foreach(\App\Course::all() as $class)
                            <option id="{{$class->id}}">{{$class->title}}</option>
                     @endforeach
            </select>
                                </div>
                              </div>
                               <div class="col-md-2"></div>
                        </div>
                        </div>
                    </div>
                </div>
                 <div id="showtable">
                 </div>
                <div id="showrealtable">
        <div class="row">
<div class="col-md-12">
    <div class="card">
                            <div class="card-body">
                                <h4 class="card-title"> @lang('admin.payment') @lang('admin.history')</h4>
                                <h6 class="card-subtitle"></h6>
                                <div class="table-responsive m-t-40">
 <table  class="display nowrap table table-hover table-striped table-bordered customed" cellspacing="0" width="100%">
      <thead>
    <tr>
        <th>#</th>
        <th>@lang('admin.class')</th>
         <th>@lang('admin.session')</th>
         <th>@lang('admin.receipt_id')</th>
          <th>@lang('admin.student')</th>
          <th>@lang('admin.term')</th>
        <th>@lang('admin.amount')</th>
         <th>@lang('admin.method')</th>
        <th>@lang('admin.sign')</th>
        <th>@lang('admin.status')</th>
    </tr>
</thead>
 <tfoot>
      <tr>
        <th>#</th>
         <th>@lang('admin.class')</th>
          <th>@lang('admin.session')</th>
         <th>@lang('admin.receipt_id')</th>
         <th>@lang('admin.student')</th>
         <th>@lang('admin.term')</th>
        <th>@lang('admin.amount')</th>
         <th>@lang('admin.method')</th>
        <th>@lang('admin.sign')</th>
        <th>@lang('admin.status')</th>
    </tr>
    </tfoot>
     <tbody>
@if(count(\App\Fpayment::all())>0)
@foreach(\App\Fpayment::all() as $stud)
@foreach(\App\Feepay::all() as $payment)
   <tr>
    <td>{{$loop->iteration}}</td>
    <td>{{\App\Course::find($stud->class)->title}}</td>
     <td>{{$stud->session}}</td>
<td>{{$payment->receipt_id}}</td>
<td>{{\App\Student::find($stud->student_id)->user_id}} {{\App\Student::find($stud->student_id)->gname}} {{\App\Student::find($stud->student_id)->fname}}</td>
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
<td>{{\App\Currency::find(\App\Setting::first()->currency)->symbol}}{{$payment->amount}}</td>
 <td>{{$payment->method}}</td> 
    <td>{{$payment->sign}}</td> 
    <td>
        @if($payment->status=='1')
<span onclick="showAjaxModal('{{url('')}}/view/fee/payment/{{$payment->id}}')" class="btn btn-success"><i class="fa fa-print"></i>@lang('admin.print') @lang('admin.receipt')</span>
@elseif($payment->status=='0')
<span onclick="showAjaxModal('{{url('')}}/accept/fee/payment/{{$payment->id}}')" class="btn btn-warning"><i class="fa fa-money"></i>@lang('admin.accept') @lang('admin.payment')</span>
@elseif($payment->status=='2')
<span onclick="showAjaxModal('{{url('')}}/verify/fee/payment/{{$payment->id}}')" class="btn btn-primary"><i class="fa fa-spin fa-spinner"></i>  @lang('admin.verify_payee')</span> 
@elseif($payment->status=='3')
<span  class="btn btn-danger"><i class=""></i>  @lang('admin.payee_decline')</span>
@endif    </td>
</tr>
@endforeach
@endforeach
@endif
</tbody>
</table>
</div>
<div class="showcontent">

    </div>
</div>
</div>
</div>
        </div>
                </div>
<script src="{{url('')}}/assets/plugins/jquery/jquery.min.js"></script>  
<script type="text/javascript">
 $(document).ready(function() {
    $("#classtatusn").change(function(){
  var id = $(this).find("option:selected").attr("id");
  if(id==="non"){
    $('#showrealtable').show();
     jQuery('#showtable').html('');
  }
  else{
   jQuery('#showtable').html('<div style="text-align:center;margin-top:200px;"><img src="{{url('')}}/assets/images/preloader.gif" style="height:50px;" /></div>');
   var searchvalue=$('#searchvalue').val();
   $.ajax({
    url: '{{url('')}}/get_student/class/'+searchvalue+'/'+id,
    success: function (data) {
$('#showrealtable').hide();
        jQuery('#showtable').html(data);
      },
      error:function(data){
         alert(data);
            }
        });
    }
});
    });
</script>
@endsection