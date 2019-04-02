<div class="row">
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-body">
<h4 class="card-title">@lang('admin.edit') @lang('admin.schoolin-fee') @lang('admin.plan')</h4>
                <h6 class="card-subtitle"></h6>
    <form action="{{url('')}}/add/fee/plan/{{$id}}" method="post" enctype="multipart/form-data" class="">
         {{ csrf_field() }}
                            <div class="form-group">
                              <label>@lang('admin.plan') @lang('admin.name')</label>
                             <input type="text" value="{{\App\Plan::find($id)->name}}" class="form-control" name="name">
                            </div>
                             <div class="form-group">
                              <label>@lang('admin.pay_time')</label>
                             <input type="number" readonly value="{{\App\Plan::find($id)->number}}" class="form-control" name="number">
                            </div>
                      @if(\App\Plan::find($id)->number!='1')
                            <div class="showadd">
                             <div class="form-group">
                                  <label>@lang('admin.reminder') @lang('admin.message') (@lang('admin.max_length') 150)</label>
                            <textarea class="form-control" maxlength="150" name="message" placeholder="@lang('admin.add') @lang('admin.message')">{{\App\Plan::find($id)->message}}</textarea>
                                </div>
                                 <div class="checkbox checkbox-primary">
                          @if(\App\Plan::find($id)->email=='1')
                                <input id="checkbox8" type="checkbox" checked value="1" name="email">
                                 <label style="color: black;" for="checkbox8">
                                                        @lang('admin.enable_email_rem')
                                                    </label>
                          @elseif(\App\Plan::find($id)->email=='')
                           <input id="checkbox9" type="checkbox"  value="1" name="email">
                            <label style="color: black;" for="checkbox9">
                                                        @lang('admin.enable_email_rem')
                            </label>
                           @endif     
                                                </div>
                                                <div class="checkbox checkbox-primary">
                                                  @if(\App\Plan::find($id)->sms=='1')
                                <input id="checkbox6" type="checkbox" checked value="1" name="sms">
                                 <label style="color: black;" for="checkbox6">
                                                        @lang('admin.enable_sms_rem')
                                                    </label>
                              @elseif(\App\Plan::find($id)->sms=='')
 <input id="checkbox7" type="checkbox"  value="1" name="sms">
  <label style="color: black;" for="checkbox7">
                                                        @lang('admin.enable_sms_rem')
                                                    </label>
                              @endif
                                                   
                                                </div>
                                              </div>
                          @endif
                            @foreach(\App\Planlist::where('plan_id',$id)->get() as $plan)
                             <div class="form-group">
                              <label>@lang('admin.payment') @lang('admin.percent')</label>
                              <div class="input-group">
                             <input type="number" value="{{$plan->percent}}" class="form-control dpercent" name="percent[]">
                              <input type="number" value="{{$plan->commision}}" class="form-control cpercent" placeholder="@lang('admin.com_fee')" name="cpercent[]">
                             <input type="number" value="{{$plan->nday}}" class="form-control daym" placeholder="@lang('admin.day_int')y" name="days[]">
                           </div>
                            </div>
                         @endforeach
                                     <div class="row">
                                        <div class="col-md-2"></div>
                                    <div class="col-md-8">
                      <input type="submit" class="form-control btn btn-primary btn-block text-white" value="@lang('admin.submit')">
                                     </div>
                                        <div class="col-md-2"></div>
                                    </div>
                                  </form>
                        </div>
                    </div>
                </div>
            </div>