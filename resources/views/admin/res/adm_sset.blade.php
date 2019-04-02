 <div class="row">
    <div class="col-md-2"></div>
                    <div class="col-sm-8">
                        <div class="card card-body">
                            <h4 class="card-title">@lang('admin.school') @lang('admin.system') @lang('admin.setting')</h4>
                            <h6 class="card-subtitle">@lang('admin.add') @lang('admin.school') @lang('admin.system') @lang('admin.setting')</h6>
<form class="" action="{{url('')}}/settings/school/create" enctype="multipart/form-data" method="post">
     {{ csrf_field() }}
                             <div class="form-group">
            <label for="example-email">@lang('admin.country') * <span class="help"></span></label><br>
       <select id="countried" class="form-control select2" style="width: 100%;" name="country">
    <option value="{{\App\Setting::first()->country}}">{{\App\Country::find(\App\Setting::first()->country)->name}} Selected</option>
        @foreach(\App\Country::all() as $country)
         <option value="{{$country->id}}">{{$country->name}}</option>
         @endforeach
       </select>
                </div>
                             <div class="form-group">
            <label for="example-email">@lang('admin.state') *<span class="help"></span></label>
            <input type="text" name="state" class="form-control">
                                </div>
                             <div class="form-group">
            <label for="example-email">@lang('admin.language') *<span class="help"></span></label>
  <select name="language" style="width: 100%;" class="form-control select2 input-sm">
<option selected value="{{\App\Setting::first()->language}}">{{\App\Language::find(\App\Setting::first()->language)->name}}</option>
@foreach(\App\Language::all() as $lang)
<option value="{{$lang->id}}" >{{$lang->name}}</option>
@endforeach
</select>
            </div>

                                 <div class="form-group">
            <label for="example-email">@lang('admin.select') @lang('admin.payment') @lang('admin.option')*<span class="help"></span></label>
             <div class="checkbox checkbox-primary">
            <div class="input-group">
@if(\App\Setting::first()->paypal=='1')
          <input id="checkbox1" type="checkbox" checked value="1" name="paypal">
<label style="color: black;" for="checkbox1">Paypal  </label>
@else
 <input id="checkbox1" type="checkbox" value="1" name="paypal">
<label style="color: black;" for="checkbox1">Paypal  </label>
@endif
@if(\App\Setting::first()->paystack=='1')
<input id="checkbox2" type="checkbox" checked value="1" name="paystack">
<label style="color: black;" for="checkbox2">Paystack  </label>
@else
<input id="checkbox2" type="checkbox" value="1" name="paystack">
<label style="color: black;" for="checkbox2">Paystack  </label>
@endif
@if(\App\Setting::first()->wepay=='1')
<input id="checkbox3" type="checkbox" checked value="1" name="wepay">
<label style="color: black;" for="checkbox3">Wepay  </label>
@else
<input id="checkbox3" type="checkbox" value="1" name="wepay">
<label style="color: black;" for="checkbox3">Wepay  </label>
@endif
@if(\App\Setting::first()->stripe=='1')
<input id="checkbox4" type="checkbox" checked value="1" name="stripe">
<label style="color: black;" for="checkbox4">Stripe  </label>
@else
<input id="checkbox4" type="checkbox" value="1" name="stripe">
<label style="color: black;" for="checkbox4">Stripe  </label>
@endif
            </div>
                                                </div>
                                </div>
      <div class="form-group">
            <label for="example-email">@lang('admin.default') @lang('admin.sms') @lang('admin.gateway') *<span class="help"></span></label>
   <select class="form-control" name="sms">
  @if(\App\Setting::first()->sms=='')
       <option value="">@lang('admin.select') @lang('admin.sms') @lang('admin.gateway')</option>
       <option>Nexmo</option>
       <option>Bulksms</option>
       <option>Multitexter</option>
  @elseif(\App\Setting::first()->sms=='Nexmo')
  <option>Nexmo</option>
       <option>Bulksms</option>
       <option>Multitexter</option>
  @elseif(\App\Setting::first()->sms=='Bulksms')
   <option>Bulksms</option>
       <option>Multitexter</option>
       <option>Nexmo</option>
       @elseif(\App\Setting::first()->sms=='Multitexter')
   <option>Multitexter</option>
       <option>Nexmo</option>
        <option>Bulksms</option>
  @endif
   </select>
                                </div>
                                 <div class="form-group">
            <label for="example-email">@lang('admin.currency') *<span class="help"></span></label>
     <select class="form-control select2" style="width: 100%;" name="currency">
        <option selected value="{{\App\Setting::first()->currency}}">{{\App\Currency::find(\App\Setting::first()->currency)->country}}</option>
        @foreach(\App\Currency::all() as $currency)
         <option value="{{$currency->id}}">{{$currency->country}}</option>
         @endforeach
       </select>
                                </div>
                                <div class="form-group">
            <label for="example-email">@lang('admin.use_rate')<span class="help"></span></label>
    <select class="form-control select2" onChange="meThods(this)" style="width: 100%;" name="status">
      @if(\App\Setting::first()->status==0)
        <option selected id="0" value="0">@lang('admin.suspend')</option>
         <option id="1" value="1">@lang('admin.active')</option>
         @elseif(\App\Setting::first()->status==1)
          <option id="1" value="1">@lang('admin.active')</option>
          <option selected id="0" value="0">@lang('admin.suspend')</option>
         @endif
       
       </select>
                                </div>
                                 @if(\App\Setting::first()->status==0)
                                 <div class="form-group convert" style="display: none;">
            <label for="example-email">@lang('admin.currency_rate')<span class="help"></span></label>
   <input type="number" class="form-control" value="{{\App\Setting::first()->convert}}" name="convert">
                                </div>
                                @elseif(\App\Setting::first()->status==1)
 <div class="form-group convert">
            <label for="example-email">@lang('admin.currency_rate')<span class="help"></span></label>
   <input type="number" class="form-control" value="{{\App\Setting::first()->convert}}" name="convert">
                                </div>
                                @endif
                                
             <div class="row">
         <div class="col-sm-3"></div>
                    <div class="col-sm-6">
                 <div class="form-group">
                <input type="submit" required class="form-control btn btn-primary" value="@lang('admin.submit')">
                    </div>  
                </div>
                        </div>
                        </form>
                        </div>
                    </div>
                    <div class="col-md-2"></div>
                </div>
               <script type="text/javascript">
                   $('.select2').select2();
                    function meThods(val) {
                       if (val.value == "1") {
                        $('.convert').show();
                    }
                    if(val.value == "0"){
                       $('.convert').hide();
                    }
                  }
               </script>