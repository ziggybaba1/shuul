<div class="row">
                    <div class="col-12">
                       
                        <div class="card">
     <ul class="nav nav-tabs profile-tab" role="tablist">
                                <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#profile" role="tab">@lang('parent.book-pay')</a> </li>
                                <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#settings" role="tab">@lang('parent.book-pay-history')</a></li>
    </ul>
                            <!-- Tab panes -->
                            <div class="tab-content">
                                <!--second tab-->
                                <div class="tab-pane active" id="profile" role="tabpanel">
                            <div class="card-body">
                                <h4 class="card-title">{{\App\Student::findOrFail($id)->gname}} {{\App\Student::findOrFail($id)->fname}} @lang('parent.book-pay') ({{\App\Course::find(\App\Student::findOrFail($id)->class)->title}})</h4>
                                <h6 class="card-subtitle"></h6>
      <form action="" id="myContainer" method="post" class="form-horizontal m-t-40 formpay" class="form">
                                 {{ csrf_field() }}
        <div style="overflow-y: auto;max-height: 300px;">
                   <span id="medicine">
    @foreach(\App\Bookassign::where('class',\App\Student::find($id)->class)->get() as $ent)
                         <div class="form-group">
                          <div class="input-group">
                  <input name="name[]" value="{{$ent->name}}" placeholder="Book Name" type="text" class="form-control col-md-7 col-xs-12">
            <input name="price[]" value="{{$ent->price}}" placeholder="Book Price" type="text" class="form-control col-md-7 col-xs-12">
             <input name="avail[]" value="{{$ent->avail}}" readonly type="text" class="form-control col-md-7 col-xs-12">
                <span class="input-group-btn">
            <div  class="checkbox">
          @if(count(\App\Payitem::where('item_id',$ent->id)->where('student_id',$id)->where('status','0')->get())>0)

                <input type="checkbox" name="reqid[]" checked class="form-control id-check" id="checkbox{{$loop->iteration}}"  value="{{$ent->id}}">
                <label for="checkbox{{$loop->iteration}}"></label>
                <input name="check_price[]" value="{{$ent->price}}" placeholder="Book Price" disabled type="hidden" class="form-control col-md-7 col-xs-12 myinput">
                 <input type="hidden" style="display: none;" name="payid" value="">
                
       @elseif(count(\App\Payitem::where('item_id',$ent->id)->where('student_id',$id)->where('status','1')->get())>0)
          <input type="checkbox" readonly  disabled name="reqid[]" class="form-control id-check" id="checkbox{{$loop->iteration}}"  value="{{$ent->id}}">
                <label style="display: none;" for="checkbox{{$loop->iteration}}"><i class="fa fa-check"></i>@lang('admin.paid')</label>
                 <h4><i class="fa fa-check"></i>@lang('admin.paid')</h4>
                <input name="check_price[]" readonly disabled value="{{$ent->price}}" placeholder="Book Price" disabled type="hidden" class="form-control col-md-7 col-xs-12 myinput">
                  <input type="hidden" style="display: none;" name="payid" value="{{\App\Payment::where('student_id',$id)->where('class',\App\Student::find($id)->class)->where('status','1')->first()->id}}">
          @elseif(count(\App\Payitem::where('item_id',$ent->id)->where('student_id',$id)->get())==0)
           <input type="checkbox" name="reqid[]" checked class="form-control id-check" id="checkbox{{$loop->iteration}}"  value="{{$ent->id}}">
                <label for="checkbox{{$loop->iteration}}"></label>
                <input name="check_price[]" value="{{$ent->price}}" placeholder="Book Price" disabled type="hidden" class="form-control col-md-7 col-xs-12 myinput">
                 <input type="hidden" style="display: none;" name="payid" value="">
          @endif
                </div>
                </span>
                  <span style="width: 20px;"></span>
                        </div>
                      </div>
          @endforeach
         
                               </span>
                           </div>
                             <div class="row">
                                <div class="col-md-2"></div>
                                <div class="col-md-4">
                               <div class="form-group">
                        <label>@lang('parent.total-amount') {{\App\Currency::find(\App\Setting::first()->currency)->symbol}}</label>
                            <input type="number" readonly class="form-control tit" >
                             <input type="hidden" name="reference" value="{{ Paystack::genTranxRef() }}">
            <input type="hidden" name="key" value="{{ config('paystack.secretKey') }}">
             <input type="hidden" name="email" value="{{\Auth::user()->email}}@med.ng">
            <input type="hidden" name="orderID" value="{{\Keygen\Keygen::numeric(5)->generate()}}">
                                </div>
                              </div>
                              <div class="col-md-4">
                                  <div class="form-group">
                                                <label>@lang('parent.pay-method')  <span>*</span></label>
                                                <select name="method" onChange="meThods(this)" id="pay_method" class="form-control" required>
                                                    <option value="" selected>@lang('parent.select-pay-method')</option>
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
                              <div class="col-md-2"></div>
                            </div>
                               
                            <hr>
                               <div class="row">
                                <div class="col-md-4"></div>
                                <div class="col-md-4">
                               <div class="form-group">
                                 <input type="number" style="display: none;" name="amount" readonly class="form-control totalla" >
                            <input type="submit" id="submit_val" class="form-control btn btn-primary" value="Pay Now">

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
                         <div class="tab-pane" id="settings" role="tabpanel">
                           <div class="card-body">
                          <div class="table-responsive m-t-40">
                                    <table id="datatabler" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                               <th>#</th>
                                                <th>@lang('parent.pay-id')</th>
                                                <th>@lang('parent.item')</th>
                                                <th>@lang('parent.amount-paid')</th>
                                                 <th>@lang('parent.pay-mode')</th>
                                                <th>@lang('parent.class')</th>
                                               
                                               <th>@lang('parent.pay-id')</th>
                                                 <th>@lang('parent.print-receipt')</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                            <th>#</th>
                                                <th>@lang('parent.pay-id')</th>
                                                <th>@lang('parent.item')</th>
                                                <th>@lang('parent.amount-paid')</th>
                                                 <th>@lang('parent.pay-mode')</th>
                                                <th>@lang('parent.class')</th>
                                               
                                               <th>@lang('parent.pay-id')</th>
                                                 <th>@lang('parent.print-receipt')</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
        @foreach(\App\Payment::where('status','1')->where('student_id',$id)->latest()->get() as $class)

                                            <tr>
                                                <td>{{$loop->iteration}}</td>
                                                <td>{{$class->receipt_id}}</td>
                                                <td>
                          @foreach(\App\Payitem::where('pay_id',$class->id)->get() as $item)
                          {{\App\Bookassign::find($item->item_id)->name}},
                          @endforeach
                                                </td>
                                                <td>{{$class->amount}}</td>
                                                <td>
                                        @if($class->type=='1')
                                          Cashier Point
                                          @elseif($class->type=='2')
                                          Online Payment
                                          @endif
                                                </td>
    <td>{{\App\Course::find($class->class)->title}}</td>
                                                <td>
                    @if($class->amount==\App\Payitem::where('pay_id',$class->id)->sum('amount')) 
                    <span class="btn btn-sm btn-success">@lang('parent.fully-paid')</span>  
                    @elseif($class->amount<\App\Payitem::where('pay_id','$class->id')->sum('amount')) 
                    <button class="btn btn-sm btn-warning">@lang('parent.owing')</button>
                    @endif
                                                </td>
                            
                            <td>
                           <a onclick="showAjaxModal('{{url('')}}/view/book/payment/{{$class->id}}')" class="btn btn-primary btn-sm btn-block"><i class="fa fa-book"></i>@lang('parent.print-receipt')</a>  
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
    <script src="{{url('')}}/assets/plugins/jquery/jquery.min.js"></script>
     <script src="{{url('')}}/assets/plugins/bootstrap/js/bootstrap.min.js"></script>
</script>
                <script>
        new Card({
            form: document.querySelector('form'),
            container: '.card-wrapper'
        });
    </script>
<script type="text/javascript">
  $(document).ready(function() {
      setInterval(function(){
  recalculate();
  }, 1000);       
});
function recalculate(){
    var sum = 0;
    $("input[type=checkbox]:checked").each(function(){
     var value= $(this).closest('div').find('.myinput').val();
     if(!isNaN(value)&&value.length !=0){
        sum+=parseFloat(value);
     }   
    });
    
  $(".totalla").val(sum);
   $(".tit").val(sum);
}
  $(".formpay").submit(function(e) {
  var formDatan = new FormData(this);
  $form = $(this);
  $('.amount_pay').text('{{\App\Currency::find(\App\Setting::first()->currency)->symbol}}'+$(".totalla").val());
  var method=$("#pay_method").val();
  @if(\App\Support::first()->opay=='1') 
  if(method=='Paystack'){
    $('#submit_val').show();
    $('#paypal-button').hide();
     var handler = PaystackPop.setup({
      key: '{{getenv('PAYSTACK_PUBLIC_KEY')}}',
      email: '{{\App\Student::findOrFail($id)->username}}@email.com',
      amount: $(".totalla").val()*100,
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
        formDatan.append('stud', '{{$id}}');
          $.ajax({
            url     : $form.attr('action'),
            type    : 'POST',
            data    : formDatan,
    success: function (data) {
      if(data=='1'){
         swal("@lang('parent.success-transact')", "@lang('parent.continue-button')", "success");
         location.reload();
      }
   if(data=='0'){
 swal("@lang('parent.error-transact')", "@lang('parent.continue-button')", "error");
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
          total: $(".totalla").val(),
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
          total: Math.round(($(".totalla").val()/{{\App\Setting::first()->convert}})* 100) / 100,
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
         formDatan.append('stud', '{{$id}}');
          $.ajax({
            url     : $form.attr('action'),
            type    : 'POST',
            data    : formDatan,
    success: function (datan) {
    if(datan=='1'){
         swal("@lang('parent.success-transact')", "@lang('parent.continue-button')", "success");
         location.reload();
      }
   if(datan=='0'){
 swal("@lang('parent.error-transact')", "@lang('parent.continue-button')", "error");
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
   formDatan.append('ref', token.id);
    formDatan.append('stud', {{$id}});
          $.ajax({
            url     : $form.attr('action'),
            type    : 'POST',
            data    : formDatan,
    success: function (data) {
   if(data=='1'){
         swal("@lang('parent.success-transact')", "@lang('parent.continue-button')", "success");
         location.reload();
      }
   if(data=='0'){
 swal("@lang('parent.error-transact')", "@lang('parent.continue-button')", "error");
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
    description: 'Book Payment',
    currency:'{{\App\Currency::find(\App\Setting::first()->currency)->code}}',
    amount: $(".totalla").val()*100
  });
@elseif(\App\Setting::first()->status==1)
 handler.open({
    name: '{{\App\Provider::first()->name}}',
    description: 'Book Payment',
      currency:'USD',
    amount: ($(".totalla").val()*100)/{{\App\Setting::first()->convert}}
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
   formDatan.append('stud', {{$id}});
          $.ajax({
            url     : '{{url('')}}/powepayurl/url',
            type    : 'POST',
            data    : formDatan,
    success: function (data) {
      $('#modal_ajagn').modal('show');
         var json = JSON.parse(data);
  WePay.iframe_checkout("preapproval_div_id", json.hosted_checkout.checkout_uri);
 
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
   e.preventDefault();
  });
  function meThods(val) {
    @if(\App\Support::first()->opay=='1') 
            var action1 = "{{route('ppay.submit')}}";
            var action2 = "{{route('pcard.submit')}}";
            var action3 = "{{route('ppal.submit')}}";
            var action4 = "{{route('pwepay.submit')}}";
            if (val.value == "Paystack") {
                $(".formpay").attr("action", action1);
                $("#stripes").hide();
                $("#paypal-button").hide();
                 $('#submit_val').show();
    $('#paypal-button').hide();
                $("#submit_val").val('@lang('parent.pay-now')');
              
            }
            if (val.value == "Paypal") {
                $(".formpay").attr("action", action3);
                $("#stripes").hide();
                $("#paypal-button").show();
                 $('#submit_val').show();
    $('#paypal-button').hide();
                $("#submit_val").val('@lang('parent.pay-initiate')');
            }
            if (val.value == "Stripe") {
                $(".formpay").attr("action", action2);
                $("#stripes").show();
                $("#paypal-button").hide();
                 $('#submit_val').show();
    $('#paypal-button').hide();
                $("#submit_val").val('@lang('parent.pay-initiate')');
            }
             if (val.value == "Wepay") {
                $(".formpay").attr("action", action4);
                $("#stripes").show();
                $("#paypal-button").hide();
                 $('#submit_val').show();
    $('#paypal-button').hide();
                $("#submit_val").val('@lang('parent.pay-now')');
            }
            @endif
        }
</script>
<script type="text/javascript">
    $(document).ready(function() {
$("#datatabler").DataTable();
    });
</script> 