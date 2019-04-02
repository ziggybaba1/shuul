@extends('layouts.haris')
@section('content')
<style type="text/css">
    .section-heading {
    margin-bottom: 70px;
}
</style>
 <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
            	  <div class="row page-titles">
                     <div class="col-md-5 col-8 align-self-center">
                        <h3 class="text-themecolor m-b-0 m-t-0">{{\App\Yearbook::find($id)->title}} @lang('admin.sale')</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{url('')}}">{{\App\Frontheader::first()->home}}</a></li>
                             <li class="breadcrumb-item"><a href="{{url('')}}/view/yearbook/sales">{{\App\Frontheader::first()->course}} @lang('admin.list')</a></li>
                            <li class="breadcrumb-item active">{{\App\Yearbook::find($id)->title}} @lang('admin.sale')</li>
                        </ol>
                    </div>
                  </div>
                   <section class="probootstrap-section probootstrap-section-colored">
        <div class="container">
          <div class="row">
            <div class="col-md-12 text-left section-heading probootstrap-animate">
              <h1>{{\App\Yearbook::find($id)->title}}</h1> 
            </div>
          </div>
        </div>
      </section>


      <section class="probootstrap-section probootstrap-section-sm">
        <div class="container">
          <div class="row">
            <div class="col-md-12">
              <div class="row probootstrap-gutter0">
                <div class="col-md-4" id="probootstrap-sidebar">
                  <div class="probootstrap-sidebar-inner probootstrap-overlap probootstrap-animate">
                    <h3>@lang('admin.price'): {{\App\Currency::find(\App\Setting::first()->currency)->symbol}}{{\App\Yearbook::find($id)->price}}</h3>
                    <ul class="probootstrap-side-menu">
                      <li class="active"><a>@lang('admin.year'): {{\App\Yearbook::find($id)->session}}</a>  <span class="text probootstrap-meta"><i class="fa fa-file-video-o"></i></span></li>
                    </ul>
                  </div>
                </div>
                <div class="col-md-7 col-md-push-1  probootstrap-animate" id="probootstrap-content">
                  <h2>@lang('admin.description')</h2>
                  <p>{{\App\Yearbook::find($id)->description}}</p>

                  <p><em>@lang('admin.message_year_sale')</em></p>

                  <p id="informat" style="display: none;background: green;color: white;padding: 20px;"></p>
                   <p id="informatn" style="display: none;background: red;color: white;padding: 20px;"></p>
                   <form action="{{url('')}}/send/contact/message" method="post" class="probootstrap-form formpay">
                     {{ csrf_field() }}
                    <div class="form-group">
                      <label for="name">@lang('admin.full_name')</label>
                      <input type="text" class="form-control" required id="name" name="name">
                    </div>
                    <div class="form-group">
                      <label for="email">@lang('admin.email')</label>
                      <input type="email" class="form-control" required id="email" name="email">
                      <input type="text" style="display: none;" class="form-control" value="{{$id}}" required id="iddd" name="iddd">
                    </div>
                     <div class="form-group">
                                                <label>@lang('admin.select') @lang('admin.payment') @lang('admin.method') <span>*</span></label>
                                                <select name="method" onChange="meThods(this)" id="pay_method" class="form-control" required>
                                                    <option value="" selected> @lang('admin.select') @lang('admin.payment') @lang('admin.method')</option>
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
                         <div class="row">
                                <div class="col-md-4"></div>
                                <div class="col-md-4">
                    <div class="form-group">
                      <input type="submit" id="submit_val" class="btn btn-primary btn-lg" id="submit" name="submit" value=" @lang('admin.buy_at') {{\App\Currency::find(\App\Setting::first()->currency)->symbol}}{{\App\Yearbook::find($id)->price}}">
                    </div>
                  </div>
                    <div class="col-md-4">
                                 <div id="paypal-button"></div>
                                 <div id="payment-request-button"></div>
                                 <div id="wepay_checkout"></div>
                              </div>
                            </div>
                  </form>
                
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
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
     $(function () {
        $('.nav-link').removeClass("active");
        @if(\App\Fronttheme::first()->theme=='1')
     $("#course").css("color","blue");
@elseif(\App\Fronttheme::first()->theme=='2')
    $(".fh5co-nav ul li a#course").css("color","red");
    @endif
     });
     
     $(".formpay").submit(function(e) {
  var formDatan = new FormData(this);
  $form = $(this);
   $('#informatn').hide(); $('#informat').hide();
  var method=$("#pay_method").val();
  @if(\App\Support::first()->opay=='1') 
  if(method=='Paystack'){
    $('#submit_val').show();
    $('#paypal-button').hide();
     var handler = PaystackPop.setup({
      key: '{{getenv('PAYSTACK_PUBLIC_KEY')}}',
      email: $('#email').val(),
      amount: {{\App\Yearbook::find($id)->price*100}},
      currency: "{{\App\Currency::find(\App\Setting::first()->currency)->code}}",
      ref: ''+Math.floor((Math.random() * 1000000000) + 1), // generates a pseudo-unique reference. Please replace with a reference you generated. Or remove the line entirely so our API will generate one for you
      metadata: {
         custom_fields: [
            {
                display_name: $('#name').val(),
                variable_name: "{{\App\Yearbook::find($id)->title}}",
                value: "+2348012345678"
            }
         ]
      },
      callback: function(response){
        formDatan.append('ref', response.reference);
          $.ajax({
            url     : $form.attr('action'),
            type    : 'POST',
            data    : formDatan,
    success: function (data) {
      if(data['status']=='1'){
      $('#informat').show();
       $('#informat').text("@lang('admin.success-transact') \n"+data['pay']);
        
        
      }
  else{
     $('#informatn').show();
       $('#informatn').text("@lang('admin.error-transact')");
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
          total: {{\App\Yearbook::find($id)->price}},
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
          total: Math.round(({{\App\Yearbook::find($id)->price}}/{{\App\Setting::first()->convert}})* 100) / 100,
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
          $.ajax({
            url     : $form.attr('action'),
            type    : 'POST',
            data    : formDatan,
    success: function (datan) {
    if(datan['status']=='1'){
        $('#informat').show();
       $('#informat').text("@lang('admin.success-transact') \n"+datan['pay']);
      }
   else{
      $('#informatn').show();
       $('#informatn').text("@lang('admin.error-transact')");
   }
      },
      error:function(datan){
         alert(datan);
      },
       cache: false,
        contentType: false,
        processData: false
 });
      });
  }
}, '#paypal-button');
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
    
   formDatan.append('ref', token.id);
          $.ajax({
            url     : $form.attr('action'),
            type    : 'POST',
            data    : formDatan,
    success: function (data) {
   if(data['status']=='1'){
         $('#informat').show();
       $('#informat').text("@lang('admin.success-transact') \n"+data['pay']);
         
      }
  else{
     $('#informatn').show();
     $('#informatn').text("@lang('admin.error-transact')");
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
    name: $('#name').val(),
    description: '{{\App\Yearbook::find($id)->title}}',
    currency:'{{\App\Currency::find(\App\Setting::first()->currency)->code}}',
    amount: {{\App\Yearbook::find($id)->price*100}}
  });
@elseif(\App\Setting::first()->status==1)
 handler.open({
    name: $('#name').val(),
    description: '{{\App\Yearbook::find($id)->title}}',
    currency:'USD',
    amount: {{\App\Yearbook::find($id)->price*100}}/{{\App\Setting::first()->convert}}
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
          $.ajax({
            url     : '{{url('')}}/ybwepayurl/url',
            type    : 'POST',
            data    : formDatan,
    success: function (data) {
         var json = JSON.parse(data);
  WePay.iframe_checkout("preapproval_div_id", json.hosted_checkout.checkout_uri);
 $('#modal_ajagn').modal('show');
      },
      error:function(data){
         alert(data);
      },
       cache: false,
        contentType: false,
        processData: false
 });

}
@endif
   e.preventDefault();
  });
     function meThods(val) {
      @if(\App\Support::first()->opay=='1') 
            var action1 = "{{route('ybpay.submit')}}";
            var action2 = "{{route('ybcard.submit')}}";
            var action3 = "{{route('ybpal.submit')}}";
            var action4 = "{{url('')}}/ybwepayurl/url";
            if (val.value == "Paystack") {
                $(".formpay").attr("action", action1);
                $("#paypal-button").hide();
                $("#payment-request-button").hide();
                $("#submit_val").show();
                $("#submit_val").val('@lang('admin.pay-now')');
              
            }
            if (val.value == "Paypal") {
                $(".formpay").attr("action", action3);
                $("#payment-request-button").hide();
                $("#paypal-button").show();
                $("#submit_val").val('@lang('admin.pay-initiate')');
            }
            if (val.value == "Stripe") {
                $(".formpay").attr("action", action2);
                $("#stripes").show();
                $("#paypal-button").hide();
                 $("#submit_val").show();
                $("#submit_val").val('@lang('admin.pay-initiate')');
            }
             if (val.value == "Wepay") {
                $(".formpay").attr("action", action4);
                $("#paypal-button").hide();
                $("#payment-request-button").hide();
                 $("#submit_val").show();
                $("#submit_val").val('@lang('admin.pay-now')');
            }
            @endif
        }
</script>
          @endsection