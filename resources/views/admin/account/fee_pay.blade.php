<div class="row">
                    <div class="col-md-12">

                        <div id="content-main" class="card card-body">
 @if(\Auth::user()->role!='student'&&\Auth::user()->role!='parent')
                        	<h4 class="card-title">@lang('admin.accept') @lang('admin.payment')</h4>
<form action="{{url('')}}/accept/remain/payment/{{$id}}" method="post" enctype="multipart/form-data" class="">
         {{ csrf_field() }}
	<div class="form-group">
		<label>@lang('admin.receipt')</label>
		<input type="number" class="form-control" value="{{\App\Feepay::find($id)->receipt_id}}" name="">
	</div>
	<div class="form-group">
		<label>@lang('admin.amount') @lang('admin.to') @lang('admin.pay')</label>
		<select class="form-control" name="amount">
			<option value="{{\App\Feepay::find($id)->amount}}">{{\App\Currency::find(\App\Setting::first()->currency)->symbol}}{{\App\Feepay::find($id)->amount}}</option>
		</select>
	</div>
	<div class="form-group">
		<input type="submit" class="btn btn-primary btn-block text-white" value="@lang('admin.accept') @lang('admin.payment')" name="">
	</div>
</form>
@endif
 @if(\Auth::user()->role=='student'||\Auth::user()->role=='parent')
 <h4 class="card-title">@lang('admin.make_pay')</h4>
 <form action="" method="post" enctype="multipart/form-data" class="formpay">
         {{ csrf_field() }}
         <div class="row">
          <div class="col-md-3">
	<div class="form-group">
		<label>@lang('admin.receipt')</label>
		<input type="number" readonly class="form-control" value="{{\App\Feepay::find($id)->receipt_id}}" name="">
	</div>
</div>
	 <div class="col-md-3">
	<div class="form-group">
		<label>@lang('admin.amount') @lang('admin.to') @lang('admin.pay')</label>
		<select class="form-control" name="amount">
			<option value="{{\App\Feepay::find($id)->amount}}">{{\App\Currency::find(\App\Setting::first()->currency)->symbol}}{{\App\Feepay::find($id)->amount}}</option>
		</select>
	</div>
</div>
	  <div class="col-md-3">
                                  <div class="form-group">
                                                <label>@lang('admin.select') @lang('admin.payment') @lang('admin.method') <span>*</span></label>
                                                <select name="method" onChange="meThods(this)" id="pay_method" class="form-control" required>
                                                    <option value="" selected>@lang('admin.select') @lang('admin.payment') @lang('admin.method')</option>
                                                    <option value="Transfer">@lang('admin.money_trans')</option>
                                                     @if(\App\Support::first()->opay=='1') 
                                                     @if(\App\Setting::first()->paypal==1)
                                                        <option value="Paypal">Paypal</option>
                                                        @endif
                                                         @if(\App\Setting::first()->paystack==1)
                                                        @if(\App\Setting::first()->currency==97)
                                                         <option value="Paystack">Paystack</option>
                                                         @endif
                                                         @endif
                                                          @if(\App\Setting::first()->stripe==1)
                                                        <option value="Stripe">Stripe</option>
                                                        @endif
                                                        @if(\App\Setting::first()->wepay==1)
                                                        <option value="Wepay">Wepay</option>
                                                        @endif
                                                        @endif
                                                </select>
                                            </div>
                              </div>
                                <div class="col-md-3">
                                 <div id="uploader" style="display: none;" class="form-group">
                              <label>@lang('admin.upload') @lang('admin.envid') *</label>
                             <input type="file" class="form-control" name="file">
                            </div>
                              </div>
                          </div>
                         <div class="row" id="account_detail" style="display: none;">
                           <h4 class="card-title"><em>@lang('admin.pay_with_account')</em></h4>
                           @foreach(\App\Account::where('status','1')->get() as $acct)
                          <div class="col-md-4">
                              <div class="container">
                                 <p>@lang('admin.account_name'): <b id="">{{$acct->name}}</b></p>
                                  <p>@lang('admin.account_number'): <b id="">{{$acct->number}}</b></p>
                                 <p>@lang('admin.bank_name'): <b id="">{{$acct->bank}}</b></p>
                                  <p>@lang('admin.sort_code'): <b id="paytotal">{{$acct->code}}</b></p>
                              </div> 
                          </div>
                        @endforeach
                         </div>
                          <div class="row">
                          	 <div class="col-md-4">
                             
                             </div>
                          	  <div class="col-md-4">
	<div class="form-group">
		<input type="submit" id="submit_val" class="btn btn-primary btn-block text-white" value="@lang('admin.make_pay')" name="">
	</div>
</div>
 <div class="col-md-4">
	 <div id="paypal-button"></div>
                                 <div id="payment-request-button"></div>
                                 <div id="wepay_checkout"></div>
                             </div>
                         </div>
</form>
@endif
                         </div>
                    </div>
                </div>
                 <div class="modal fade bs-example-modal-lg" id="modal_ajagn" aria-hidden="true" style="display: none;">
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
            <script src="{{url('')}}/assets/plugins/bootstrap/js/bootstrap.min.js"></script>
 <script type="text/javascript">
  $(".formpay").submit(function(e) {
  var formDatan = new FormData(this);
  amounted={{\App\Feepay::find($id)->amount}};
  $form = $(this);
  $('.amount_pay').text('{{\App\Currency::find(\App\Setting::first()->currency)->symbol}}'+$(".totalla").val());
  var method=$("#pay_method").val();
  @if(\App\Support::first()->opay=='1') 
  if(method=='Paystack'){
    $('#submit_val').show();
    $('#paypal-button').hide();
     var handler = PaystackPop.setup({
      key: '{{getenv('PAYSTACK_PUBLIC_KEY')}}',
      email: '{{\Auth::user()->email}}@email.com',
      amount: amounted*100,
      currency: "{{\App\Currency::find(\App\Setting::first()->currency)->code}}",
      ref: ''+Math.floor((Math.random() * 1000000000) + 1), // generates a pseudo-unique reference. Please replace with a reference you generated. Or remove the line entirely so our API will generate one for you
      metadata: {
         custom_fields: [
            {
                display_name: "Mobile Number",
                variable_name: "mobile_number",
                value: "+2348012345678"
            }
         ]
      },
      callback: function(response){
        formDatan.append('ref', response.reference);
        formDatan.append('idd', '{{$id}}');
          $.ajax({
            url     : $form.attr('action'),
            type    : 'POST',
            data    : formDatan,
    success: function (data) {
      if(data=='1'){
        swal("@lang('admin.success-transact')", "@lang('admin.continue-button')", "success");
         location.reload();
      }
   if(data=='0'){
 swal("@lang('admin.error-transact')", "@lang('admin.continue-button')", "error");
   }
      },
      error:function(data){
         alert(data);
      },
       cache: false,
        contentType: false,
        processData: false
 });
      },
      onClose: function(){
          alert('window closed');
      }
    });
    handler.openIframe();
  }
  if(method=='Paypal'){
    $('#submit_val').hide();

    paypal.Button.render({
  env: '{{getenv('client_status')}}',
 client: {
      sandbox: '{{getenv('sandbox_client_id')}}',
      production: '{{getenv('production_client_id')}}'
    },
  style: {
    color: 'blue',   // 'gold, 'blue', 'silver', 'black'
    size:  'medium', // 'medium', 'small', 'large', 'responsive'
    shape: 'rect'    // 'rect', 'pill'
  },
  // Enable Pay Now checkout flow (optional)
    commit: true,
    @if(\App\Setting::first()->status==0)
  payment: function (data, actions) {
    return actions.payment.create({
      transactions: [{
        amount: {
          total: amounted,
          currency: '{{\App\Currency::find(\App\Setting::first()->currency)->code}}'
        }
      }]
    });
  },
  @elseif(\App\Setting::first()->status==1)
  payment: function (data, actions) {
    return actions.payment.create({
      transactions: [{
        amount: {
          total: Math.round((amounted/{{\App\Setting::first()->convert}})* 100) / 100,
          currency: 'USD'
        }
      }]
    });
  },
  @endif
  onAuthorize: function (data, actions) {
    return actions.payment.execute()
      .then(function () {
        formDatan.append('paymentID', data.paymentID);
        formDatan.append('payerid', data.payerID);
        formDatan.append('token', data.paymentToken);
        formDatan.append('idd', '{{$id}}');
          $.ajax({
            url     : $form.attr('action'),
            type    : 'POST',
            data    : formDatan,
    success: function (datan) {
    if(datan=='1'){
         swal("@lang('admin.success-transact')", "@lang('admin.continue-button')", "success");
         location.reload();
      }
   if(datan=='0'){
   swal("@lang('admin.error-transact')", "@lang('admin.continue-button')", "error");
   }
      },
      error:function(datan){
         alert('error');
      },
       cache: false,
        contentType: false,
        processData: false
 });
      });
  }
}, '#paypal-button');
    $("#paypal-button").show();
  }
if(method=='Stripe'){
   $('#submit_val').show();
    $('#paypal-button').hide();
  var handler = StripeCheckout.configure({
  key: '{{getenv('STRIPE_API_KEY')}}',
  image: 'https://stripe.com/img/documentation/checkout/marketplace.png',
  locale: 'auto',
  token: function(token) {
    // You can access the token ID with `token.id`.
    // Get the token ID to your server-side code for use.
    alert(token.id);
   formDatan.append('ref', token.id);
   formDatan.append('idd', '{{$id}}');
          $.ajax({
            url     : $form.attr('action'),
            type    : 'POST',
            data    : formDatan,
    success: function (data) {
   if(data=='1'){
          swal("@lang('admin.success-transact')", "@lang('admin.continue-button')", "success");
         location.reload();
      }
   if(data=='0'){
   swal("@lang('admin.error-transact')", "@lang('admin.continue-button')", "error");
   }
      },
      error:function(data){
         alert(data);
      },
       cache: false,
        contentType: false,
        processData: false
 });
  }
});
 
  // Open Checkout with further options:
  @if(\App\Setting::first()->status==0)
  handler.open({
    name: '{{\App\Provider::first()->name}}',
    description: '@lang('admin.schoolin-fee')',
    currency:'{{\App\Currency::find(\App\Setting::first()->currency)->code}}',
    amount: amounted*100
  });
@elseif(\App\Setting::first()->status==1)
 handler.open({
    name: '{{\App\Provider::first()->name}}',
    description: '@lang('admin.schoolin-fee')',
    currency:'USD',
    amount: (amounted*100)/{{\App\Setting::first()->convert}}
  });
@endif
// Close Checkout on page navigation:
window.addEventListener('popstate', function() {
  handler.close();
});

}
if(method=='Wepay'){
   $('#submit_val').show();
    $('#paypal-button').hide();
   jQuery('#modal_ajagn #preapproval_div_id').html('');
    formDatan.append('paid', amounted);
    formDatan.append('idd', '{{$id}}');
          $.ajax({
            url     : $form.attr('action'),
            type    : 'POST',
            data    : formDatan,
    success: function (data) {
         var json = JSON.parse(data);
  WePay.iframe_checkout("preapproval_div_id", json.hosted_checkout.checkout_uri);
 $('#modal_ajagn').modal('show');
      },
      error:function(data){
         alert('error');
      },
       cache: false,
        contentType: false,
        processData: false
 });

}
@endif
if(method=='Transfer'){
   $('#submit_val').show();
    $('#paypal-button').hide();
    formDatan.append('paid', amounted);
    formDatan.append('idd', '{{$id}}');
          $.ajax({
            url     : $form.attr('action'),
            type    : 'POST',
            data    : formDatan,
    success: function (data) {
         if(data=='1'){
        swal("@lang('admin.info_submit')", "@lang('admin.continue-button')", "success");
         location.reload();
      }
   if(data=='0'){
 swal("@lang('admin.error_submit')", "clicked the button to continue!", "error");
   }
      },
      error:function(data){
         alert('error');
      },
       cache: false,
        contentType: false,
        processData: false
 });

}
   e.preventDefault();
  });
  function meThods(val) {
            var action5 = "{{route('ftransfer.submit')}}";
              @if(\App\Support::first()->opay=='1') 
              var action1 = "{{route('fpay.submit')}}";
            var action2 = "{{route('fcard.submit')}}";
            var action3 = "{{route('fpal.submit')}}";
            var action4 = "{{route('fwepay.submit')}}";
            if (val.value == "Paystack") {
                $(".formpay").attr("action", action1);
                $("#stripes").hide();
                $("#paypal-button").hide();
                $("#account_detail").hide();
                 $('#submit_val').show();
    $('#paypal-button').hide();
                $("#submit_val").val('@lang('admin.pay') @lang('admin.now')');
              
            }
            if (val.value == "Paypal") {
                $(".formpay").attr("action", action3);
                $("#stripes").hide();
                $("#paypal-button").show();
                 $("#account_detail").hide();
                 $('#uploader').hide();
                 $('#submit_val').show();
    $('#paypal-button').hide();
                $("#submit_val").val('@lang('admin.pay-initiate')');
            }
            if (val.value == "Stripe") {
                $(".formpay").attr("action", action2);
                $("#stripes").show();
                $("#paypal-button").html('');
                 $("#account_detail").hide();
                 $('#uploader').hide();
                 $('#submit_val').show();
    $('#paypal-button').hide();
                $("#submit_val").val('@lang('admin.pay-initiate')');
            }
             if (val.value == "Wepay") {
                $(".formpay").attr("action", action4);
                $("#stripes").show();
                $("#paypal-button").hide();
                 $("#account_detail").hide();
                 $('#submit_val').show();
                 $('#uploader').hide();
                $('#paypal-button').hide();
                $("#submit_val").val('@lang('admin.pay') @lang('admin.now')');
            }
            @endif
            if (val.value == "Transfer") {
                $(".formpay").attr("action", action5);
                $("#stripes").hide();
                $("#paypal-button").html('');
                 $('#submit_val').show();
                  $("#account_detail").show();
                 $("#stripes").hide();
                $('#uploader').show();
                $("#submit_val").val('@lang('admin.send_request')');
            }
        }
</script>