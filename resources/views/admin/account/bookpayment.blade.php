@extends('layouts.admin')

@section('content')

                <!-- ============================================================== -->
                <!-- Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <div class="row page-titles">
                    <div class="col-md-5 col-8 align-self-center">
                        <h3 class="text-themecolor">@lang('admin.book') @lang('admin.payment')</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">@lang('admin.home')</a></li>
                            <li class="breadcrumb-item active">@lang('admin.book') @lang('admin.payment')</li>
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
                            <h4 class="card-title">@lang('admin.book') @lang('admin.payment')</h4>
                            <h6 class="card-subtitle">@lang('admin.add_pay_class')</h6>

    <div class="row">
       <div class="col-md-2"></div>
                    <div class="col-md-8">
                             <div class="form-group">
            <label for="example-email">@lang('admin.class') *<span class="help"></span></label>
            <input type="hidden" id="searchvalue" value="12" name="">
            <select id="classtatusn" class="form-control select2">
                <option id="non">@lang('admin.all') @lang('admin.book') @lang('admin.payment')</option>
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
                                <h4 class="card-title">@lang('admin.book') @lang('admin.payment') @lang('admin.history')</h4>
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
        <th>@lang('admin.print')</th>
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
         <th>@lang('admin.print')</th>
    </tr>
    </tfoot>
     <tbody>
@if(count(\App\Payment::all())>0)
@foreach(\App\Payment::all() as $payment)
   <tr>
    <td>{{$loop->iteration}}</td>
    <td>{{\App\Course::find($payment->class)->title}}</td>
     <td>{{$payment->session}}</td>
<td>{{$payment->receipt_id}}</td>
<td>{{\App\Student::find($payment->student_id)->user_id}} {{\App\Student::find($payment->student_id)->gname}} {{\App\Student::find($payment->student_id)->fname}}</td>
 <td>
       @if($payment->term==='First')
                                @lang('admin.first_term')
                                @elseif($payment->term==='Second')
                                @lang('admin.second_term')
                                 @elseif($payment->term==='Third')
                                @lang('admin.third_term')
                                 @elseif($payment->term==='Fourth')
                                @lang('admin.fourth_term')
                             @endif
 </td>
<td>{{\App\Currency::find(\App\Setting::first()->currency)->symbol}}{{$payment->amount}}</td>
 <td></td> 
    <td>{{$payment->sign}}</td> 
    <td>
         @if($payment->status=='1')
<button onclick="showAjaxModal('{{url('')}}/accept/bookpayment/{{$payment->student_id}}')" class="btn btn-success btn-sm">@lang('admin.view') @lang('admin.payment')</button>
 @elseif($payment->status=='0')
   <button onclick="showAjaxModal('{{url('')}}/accept/bookpayment/{{$payment->student_id}}')" class="btn btn-info btn-sm">@lang('admin.accept') @lang('admin.payment')</button>
    @endif
</td>
<td>
    @if($payment->status=='1')
    <button onclick="showAjaxModal('{{url('')}}/view/book/payment/{{$payment->id}}')" class="btn btn-primary btn-sm btn-block"><i class="fa fa-book"></i>@lang('admin.print_receipt')</button>  
    @endif </td>
</tr>
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