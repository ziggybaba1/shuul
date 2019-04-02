@extends('layouts.student')
@section('content')
<style>
        .demo-container {
            width: 100%;
            max-width: 350px;
            margin: 50px auto;
        }

        form {
            margin: 30px;
        }
        input {
            width: 200px;
            margin: 10px auto;
            display: block;
        }
   .form-control[readonly] {
    background-color: #2f3d4a;
    opacity: 1;
}
    </style>
    
<div class="row page-titles">
                    <div class="col-md-6 col-8 align-self-center">
                        <h3 class="text-themecolor">{{\Auth::user()->name}} @lang('admin.schoolin-fee')</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{url('')}}/parent/page.fmp?page=1">@lang('admin.home')</a></li>
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
                    <div class="col-md-12">
                          @if (session('message'))
                 <div class="alert alert-info alert-rounded">{{ session('message') }}</div>
                    @endif
                        <div class="card">
     <ul class="nav nav-tabs profile-tab" role="tablist">
                                <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#profile" role="tab">@lang('admin.schoolin-fee')</a> </li>
                                <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#settings" role="tab">@lang('admin.schoolin-fee') @lang('admin.history')</a></li>
    </ul>
                            <!-- Tab panes -->
                            <div class="tab-content">
                                <!--second tab-->
                                <div class="tab-pane active" id="profile" role="tabpanel">
                            <div class="card-body">
                                <h4 class="card-title">{{\Auth::user()->name}} School Fee Payment ({{\App\Course::find(\App\Student::where('data_id',\Auth::user()->id)->first()->class)->title}})</h4>
                                <h6 class="card-subtitle"></h6>
@if(count(\App\Fpayment::where('student_id',\App\Student::where('data_id',\Auth::user()->id)->first()->id)->where('session',\App\Session::latest()->first()->session)->where('term',\App\Session::latest()->first()->terms)->get())==0)
      <form action="{{url('')}}/initiate/payment/plan" id="myContainer" method="post" class="form-horizontal m-t-40 formpay" class="form">
                                 {{ csrf_field() }}
                                 <div class="table-responsive m-t-40">
        <table id="example23" class="display nowrap table  table-bordered" cellspacing="0" width="100%">
                                       <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>@lang('admin.fee_name')</th>
                                 <th>@lang('admin.amount') ({{\App\Currency::find(\App\Setting::first()->currency)->symbol}})</th>
                                                <th>@lang('admin.option')</th>
                                                <th>@lang('admin.remove')</th>
                                            </tr>
                                        </thead>
                                    <tbody>
@foreach(\App\Fee::where('class',\App\Student::where('data_id',\Auth::user()->id)->first()->class)->where('term',\App\Session::first()->terms)->get() as $ent)
                        <tr>
                    <span id="medicine">
                       <div class="form-group">
                      <td>{{$loop->iteration}}</td>
                      <td>
                  <input  value="{{$ent->name}}" readonly placeholder="@lang('admin.fee_name')" type="text" class="form-control col-md-7 col-xs-12">
                  <input name="name[]" style="display: none;" value="{{$ent->id}}" readonly placeholder="@lang('admin.fee_name')" type="text" class="form-control col-md-7 col-xs-12">
                </td>
                  <td>
                  @if($ent->option=='Compulsory')
                  <input name="amount[]" value="{{$ent->price}}" readonly placeholder="@lang('admin.fee_amount')" type="number" class="form-control col-md-7 col-xs-12 price">
                  @else
                   <input name="amount[]" readonly value="{{$ent->price}}" oninput="resetval()" placeholder="@lang('admin.fee_amount')" type="number" class="form-control col-md-7 col-xs-12 price">
                   @endif
              </td>
                  <td>
                   <input name="option[]" value="{{$ent->option}}" readonly placeholder="" type="text" class="form-control col-md-7 col-xs-12">
               </td>
               <td>
                 <span class="input-group-btn">
               <div  class="checkbox">
                @if($ent->option=='Compulsory')
             <input type="checkbox" name="reqid[]" onchange="calculate()" readonly checked class="form-control id-check" id="checkbox{{$loop->iteration}}"  value="{{$ent->id}}">
                 <label style="display: none;" for="checkbox{{$loop->iteration}}"></label>
                  <input name="check_price[]" value="{{$ent->price}}" placeholder="" disabled type="hidden" class="form-control col-md-7 col-xs-12 myinput">
                  @else($ent->option!='Compulsory')
                <input type="checkbox" name="reqid[]" onchange="calculate()" checked class="form-control id-check" id="checkbox{{$loop->iteration}}"  value="{{$ent->id}}">
                 <label for="checkbox{{$loop->iteration}}"></label>
                 <input name="check_price[]" value="{{$ent->price}}" placeholder="" disabled type="hidden" class="form-control col-md-7 col-xs-12 myinput">
                @endif 
           </div>
         </span>
                                      </td>
                                  </div>
                                  </span>
                         </tr>
          @endforeach
      </tbody>
       <tfoot>
            <tr>
              <td></td>
              <td>@lang('admin.total')</td>
              <td><input name="pamount"  readonly type="text" class="form-control col-md-7 col-xs-12 totalla"></td>
              <td><input name="total" style="display: none;" required  readonly type="text" class="form-control col-md-7 col-xs-12 totalld"><input type="number" style="display: none;" value="{{count(\App\Fpayment::where('student_id',\App\Student::where('data_id',\Auth::user()->id)->first()->id)->where('session',\App\Session::first()->session)->where('term',\App\Session::first()->terms)->get())+1}}" name="index"></td>
              <td></td>
            </tr>
          </tfoot>
  </table>
                            </div>
       <hr>
                             <div class="row">
                                <div class="col-md-4">
                             
                              </div>
                              <div class="col-md-4">
                                   <div class="form-group">
                              <label>@lang('admin.select') @lang('admin.payment') @lang('admin.plan') *</label>
                              <select required class="form-control" id="planstat" name="plan">
                                <option value="">@lang('admin.select') @lang('admin.plan')</option>
                               @foreach(\App\Plan::where('delete','0')->get() as $plan)
                             <option value="{{$plan->id}}">{{$plan->name}}</option>
                             @endforeach
                              </select>
                            </div>
                              </div>
                              <div class="col-md-4">
                                
                              </div>
                            </div>
                               <div class="row">
                              <div class="container">
                                 <p>@lang('admin.total') @lang('admin.fee'): <b id="payamount"></b></p>
                                  <p>@lang('admin.add_per_fee'): <b id="paycomision"></b></p>
                                 <p>@lang('admin.next') @lang('admin.payment'): <b id="paynext"></b></p>
                                  <p style="color: blue;">@lang('admin.exp_amt_pay'): {{\App\Currency::find(\App\Setting::first()->currency)->symbol}}<b id="paytotal"></b></p>
                              </div>
                     
                            </div> 
                            <hr>
                               <div class="row">
                                <div class="col-md-4"></div>
                                <div class="col-md-4">
                               <div class="form-group">
                            <input type="submit" id="submit_val" class="form-control btn btn-primary text-white" value="@lang('admin.create') @lang('admin.payment') @lang('admin.plan')">

                                </div>
                              </div>
                              <div class="col-md-4">
                                
                              </div>
                            </div>
                            </form>
@elseif(count(\App\Fpayment::where('student_id',\App\Student::where('data_id',\Auth::user()->id)->first()->id)->where('session',\App\Session::latest()->first()->session)->where('term',\App\Session::latest()->first()->terms)->get())>0)
<div class="card">
                            <div class="card-body">
                                <h4 class="card-title">{{\App\Student::where('data_id',\Auth::user()->id)->first()->user_id}} {{\App\Student::where('data_id',\Auth::user()->id)->first()->gname}} {{\App\Student::where('data_id',\Auth::user()->id)->first()->fname}} @lang('admin.payment') @lang('admin.analyse')</h4>
                                <h6 class="card-subtitle"></h6>
                                <div class="pull-right">
<button onclick="resetpat('{{\App\Fpayment::where('student_id',\App\Student::where('data_id',\Auth::user()->id)->first()->id)->where('session',\App\Session::first()->session)->where('term',\App\Session::first()->terms)->first()->id}}')" class="btn btn-dark">Reset Payment Plan</button>
                                </div>
                                <br>
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
@if(count(\App\Fpayment::where('student_id',\App\Student::where('data_id',\Auth::user()->id)->first()->id)->where('session',\App\Session::first()->session)->where('term',\App\Session::first()->terms)->get())>0)
@foreach(\App\Feepay::where('pay_id',\App\Fpayment::where('student_id',\App\Student::where('data_id',\Auth::user()->id)->first()->id)->where('session',\App\Session::first()->session)->where('term',\App\Session::first()->terms)->first()->id)->get() as $payment)
   <tr>
    <td>{{$loop->iteration}}</td>
<td>{{$payment->receipt_id}}</td>
<td>{{\App\Currency::find(\App\Setting::first()->currency)->symbol}}{{$payment->amount}}</td>
 <td>{{$payment->method}}</td> 
    <td>{{$payment->sign}}</td> 
    <td>
        @if($payment->status=='1')
<span onclick="getreceipt('{{$payment->id}}')" class="btn btn-success"><i class="fa fa-print"></i>  @lang('admin.print') @lang('admin.receipt')</span>
@elseif($payment->status=='0')
<span onclick="acceptpay('{{$payment->id}}')" class="btn btn-warning"><i class="fa fa-money"></i>  @lang('admin.make_pay')</span>
@elseif($payment->status=='2')
<span class="btn btn-primary"><i class="fa fa-spin fa-spinner"></i>  @lang('admin.verify_pay')</span>
@elseif($payment->status=='3')
<span onclick="acceptpay('{{$payment->id}}')"  class="btn btn-danger"><i class=""></i>  @lang('admin.payee_decline')</span>
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

                @endif
                            </div>
                        </div>
                         <div class="tab-pane" id="settings" role="tabpanel">
                            <div class="card-body">
                          <div class="table-responsive m-t-40">
                                    <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                        <thead>
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
                                        </thead>
                                        <tfoot>
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
                                        </tfoot>
                                        <tbody>
@foreach(\App\Fpayment::where('student_id',\App\Student::where('data_id',\Auth::user()->id)->first()->id)->get() as $stud)
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
<span onclick="getreceipt('{{$payment->id}}')" class="btn btn-success"><i class="fa fa-print"></i>  @lang('admin.print') @lang('admin.receipt')</span>
@elseif($payment->status=='0')
<span onclick="acceptpay('{{$payment->id}}')" class="btn btn-warning"><i class="fa fa-money"></i>  @lang('admin.make_pay')</span>
@elseif($payment->status=='2')
<span class="btn btn-primary"><i class="fa fa-spin fa-spinner"></i>  @lang('admin.verify_pay')</span>
@elseif($payment->status=='3')
<span onclick="acceptpay('{{$payment->id}}')"  class="btn btn-danger"><i class=""></i>  @lang('admin.payee_decline')</span>
@endif
    </td>
    
</tr>
@endforeach
@endforeach
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
            </div>
<div class="modal fade bs-example-modal-lg" id="modal_ajag" aria-hidden="true" style="display: none;">
        <div class="modal-dialog modal-lg">
            <div  class="come modal-content" style="height:auto; overflow:auto;">
                <div class="modal-header">
                    <h4 class="modal-title">Wepay @lang('admin.payment')</h4>
                    <button id="first" type="button" class="hider btn btn-danger btn-sm" data-dismiss="modal">@lang('admin.close')</button>
                </div>
                
                <div class="modal-body">
                  <div id="preapproval_div_id" class="container">
    
</div>
                </div>
                
                <div class="modal-footer">
                    <button type="button" class="hider btn btn-default" data-dismiss="modal">@lang('admin.close')</button>
                </div>
            </div>
        </div>
    </div>
                <script src="{{url('')}}/assets/plugins/jquery/jquery.min.js"></script>
@if(count(\App\Fpayment::where('student_id',\App\Student::where('data_id',\Auth::user()->id)->first()->id)->where('session',\App\Session::latest()->first()->session)->where('term',\App\Session::latest()->first()->terms)->get())==0)
               <script type="text/javascript">

         function calculate(){
         sum = 0;
          amounted=0;
         resetval();
   getprice(function(pricen){
         sum+=parseFloat(pricen);
        $(".totalla").val(sum);
            });
         }
         calculate();
         function getprice(valuen){
           $("input[type=checkbox]:checked").each(function(){
            var valuet=$(this).val();
      $.get('{{url('')}}/get/amount/fee/'+valuet, function(price) {
          valuen(price);
            });  
       }); 
         }
         $("#planstat").change(function(){
   var index=$(this).val();
   var discount=sum;
  
   getplan(index,'1', function(location){
   // this is where you get the return value
 $('#payamount').text('{{\App\Currency::find(\App\Setting::first()->currency)->symbol}}'+Math.ceil(discount).toLocaleString());
 $('#paynext').text(moment(location['date']).format("YYYY-MM-DD"));
  $('#paycomision').text('{{\App\Currency::find(\App\Setting::first()->currency)->symbol}}'+Math.ceil(parseInt((discount*location['com'])/100)).toLocaleString());
  $('#paytotal').text(Math.ceil(parseInt(discount*(location['percent']/100))+parseInt((discount*location['com'])/100)).toLocaleString());
  amounted=parseInt(discount*(location['percent']/100))+parseInt((discount*location['com'])/100)
  $(".totalld").val(Math.ceil(parseInt(discount*(location['percent']/100))+parseInt((discount*location['com'])/100)));
});
  });

         function getplan(id,index,valuen){
      $.get('{{url('')}}/get/plan/status/'+id+'/'+index, function(datab) {
          valuen(datab);
            });  
         }

     $(document).ready(function() {
      calculate();       
});
     function resetval(){
       $('#planstat option').prop('selected', function() {
         $('#payamount').text('');
 $('#paynext').text('');
  $('#paycomision').text('');
  $('#paytotal').text('');
  $(".totalld").val('');
        return this.defaultSelected;
    });
     }
  $(".formpay").submit(function(e) {
  var formDatan = new FormData(this);
  $form = $(this);
 formDatan.append('paid', amounted);
    formDatan.append('totalpaid', sum);
          $.ajax({
            url     : $form.attr('action'),
            type    : 'POST',
            data    : formDatan,
    success: function (data) {
         swal("@lang('admin.created_plan')", "@lang('admin.continue-button')", "success");
         location.reload();
      },
      error:function(data){
         alert('seyi');
      },
       cache: false,
        contentType: false,
        processData: false
 });
   e.preventDefault();
});
    </script>
@elseif(count(\App\Fpayment::where('student_id',\App\Student::where('data_id',\Auth::user()->id)->first()->id)->where('session',\App\Session::latest()->first()->session)->where('term',\App\Session::latest()->first()->terms)->get())>0)

@endif
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
         function resetpat(id,idd){
      if(confirm("@lang('admin.confirm_reset')")){ 
       $.get('{{url('')}}/reset/fee/payment/'+id, function(datab) {
        if(datab=='0'){
           swal("@lang('admin.reset_plan') ", "@lang('admin.continue-button')", "error");
        }
       if(datab=='1'){
        swal("@lang('admin.reset_fplan')", "@lang('admin.continue-button')", "success");
         location.reload();
       }
            });  
        }
         }
</script>
@endsection