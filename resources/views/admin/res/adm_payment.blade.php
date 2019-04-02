 <div class="row">
        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">@lang('admin.payment')@lang('admin.gateway') @lang('admin.setting') </h4>
                                <h6 class="card-subtitle"></h6>
                                <!-- Nav tabs -->
                                <div class="vtabs ">
                                    <ul class="nav nav-tabs tabs-vertical" role="tablist">
                                        <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#paystack" role="tab"><span>Paystack</span></a> </li>
                                        <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#paypal" role="tab"><span>Paypal</span></a> </li>
                                        <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#mstripe" role="tab"><span>Stripe</span></a> </li>
                                         <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#skrill" role="tab"><span>Skrill</span></a> </li>
                                    </ul>
                                    <!-- Tab panes -->
                                    <div class="tab-content">
                                        <div class="tab-pane active" id="paystack" role="tabpanel">
                                            <div class="p-10">
        <form class="" action="{{url('')}}/add/paystack/setting" enctype="multipart/form-data" method="post">
     {{ csrf_field() }}
     <div class="row">
        <div class="col-md-12">
                             <div class="form-group">
            <label for="example-email">Live Public key * <span class="help"></span></label><br>
    <input type="text" class="form-control" value="{{\App\Gateway::first()->lpublic_key}}" name="lpublic_key">
                     </div>
                 </div>
                 <div class="col-md-12">
                             <div class="form-group">
            <label for="example-email">Live Secret Key *<span class="help"></span></label>
<input type="text" class="form-control" value="{{\App\Gateway::first()->lSecret_key}}" name="lSecret_key">
                                </div>
                            </div>
                             <div class="col-md-12">
                                <div class="form-group">
            <label for="example-email">Test Public key * <span class="help"></span></label><br>
    <input type="text" class="form-control" value="{{\App\Gateway::first()->tpublic_key}}" name="tpublic_key">
                     </div>
                 </div>
                  <div class="col-md-12">
                             <div class="form-group">
            <label for="example-email">Test Secret Key *<span class="help"></span></label>
<input type="text" class="form-control" value="{{\App\Gateway::first()->tSecret_key}}" name="tSecret_key">
                                </div>
                            </div>
                             <div class="col-md-12">
                                <div class="form-group">
            <label for="example-email">Payment Url *<span class="help"></span></label>
<input type="text" class="form-control" readonly value="{{\App\Gateway::first()->pay_url}}" name="pay_url">
                                </div>
                            </div>
                             <div class="col-md-12">
                           <div class="form-group">
            <label for="example-email">Merchant Email *<span class="help"></span></label>
<input type="text" class="form-control" value="{{\App\Gateway::first()->mer_email}}" name="mer_email">
                                </div>
                            </div>
                                 </div>
             <div class="row">
         <div class="col-sm-3"></div>
                    <div class="col-sm-6">
                 <div class="form-group">
                <input type="submit" required class="form-control btn btn-primary" value="Submit">
                    </div>  
                </div>
                        </div>
                        </form>
                                            </div>
                                        </div>
                                        <div class="tab-pane  p-20" id="paypal" role="tabpanel">
    <form class="" action="{{url('')}}/add/paypal/setting" enctype="multipart/form-data" method="post">
     {{ csrf_field() }}
     <div class="row">
                 <div class="col-md-6">
                             <div class="form-group">
            <label for="example-email">Sandbox Username *<span class="help"></span></label>
<input type="text" class="form-control" value="{{\App\Gateway::first()->susername}}" name="susername">
                                </div>
                            </div>
                             <div class="col-md-6">
                                <div class="form-group">
            <label for="example-email">Sandbox Password * <span class="help"></span></label><br>
    <input type="text" class="form-control" value="{{\App\Gateway::first()->spassword}}" name="spassword">
                     </div>
                 </div>
                  <div class="col-md-12">
                             <div class="form-group">
            <label for="example-email">Sandbox Secret *<span class="help"></span></label>
<input type="text" class="form-control" value="{{\App\Gateway::first()->ssecret}}" name="ssecret">
                                </div>
                            </div>
                             <div class="col-md-12">
                                <div class="form-group">
            <label for="example-email">Sandbox Certificate *<span class="help"></span></label>
<input type="text" class="form-control" value="{{\App\Gateway::first()->scert}}" name="scert">
                                </div>
                            </div>
                             <div class="col-md-6">
                             <div class="form-group">
            <label for="example-email">Live Username *<span class="help"></span></label>
<input type="text" class="form-control" value="{{\App\Gateway::first()->lusername}}" name="lusername">
                                </div>
                            </div>
                             <div class="col-md-6">
                                <div class="form-group">
            <label for="example-email">Live Password * <span class="help"></span></label><br>
    <input type="text" class="form-control" value="{{\App\Gateway::first()->lpassword}}" name="lpassword">
                     </div>
                 </div>
                  <div class="col-md-12">
                             <div class="form-group">
            <label for="example-email">Live Secret *<span class="help"></span></label>
<input type="text" class="form-control" value="{{\App\Gateway::first()->tSecret_key}}" name="tSecret_key">
                                </div>
                            </div>
                             <div class="col-md-12">
                                <div class="form-group">
            <label for="example-email">Live Certificate *<span class="help"></span></label>
<input type="text" class="form-control" value="{{\App\Gateway::first()->lcert}}" name="lcert">
                                </div>
                            </div>
                            </div>
             <div class="row">
         <div class="col-sm-3"></div>
                    <div class="col-sm-6">
                 <div class="form-group">
                <input type="submit" required class="form-control btn btn-primary" value="Submit">
                    </div>  
                </div>
                        </div>
                        </form>
                                        </div>
                                        <div class="tab-pane p-20" id="stripe" role="tabpanel">
                                            <form class="" action="{{url('')}}/add/stripe/setting" enctype="multipart/form-data" method="post">
     {{ csrf_field() }}
     <div class="row">
        <div class="col-md-12">
                             <div class="form-group">
            <label for="example-email">Stripe key * <span class="help"></span></label><br>
    <input type="text" class="form-control" value="{{\App\Gateway::first()->stripe_key}}" name="stripe_key">
                     </div>
                 </div>
                 <div class="col-md-12">
                             <div class="form-group">
            <label for="example-email">Stripe Secret *<span class="help"></span></label>
<input type="text" class="form-control" value="{{\App\Gateway::first()->stripe_sec}}" name="stripe_sec">
                                </div>
                            </div>
            </div>
             <div class="row">
         <div class="col-sm-3"></div>
                    <div class="col-sm-6">
                 <div class="form-group">
                <input type="submit" required class="form-control btn btn-primary" value="Submit">
                    </div>  
                </div>
                        </div>
                        </form>
                                        </div>
                                          <div class="tab-pane p-20" id="skrill" role="tabpanel">
                                          </div>
                                    </div>
                                </div>
                            </div>
                        </div>
    </div>