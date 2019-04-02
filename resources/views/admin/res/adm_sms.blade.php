<div class="row">
    <div class="col-md-12">
        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">@lang('admin.sms') @lang('admin.gateway') @lang('admin.setting') </h4>
                                <h6 class="card-subtitle"></h6>
                    <div class="vtabs ">
                                    <ul class="nav nav-tabs tabs-vertical" role="tablist">
                                        <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#bulk" role="tab"><span>BulkSMS</span></a> </li>
                                        <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#multi" role="tab"><span>MultiTexter</span></a> </li>
                                        <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#nexmo" role="tab"><span>Nexmo</span></a> </li>
                                       
                                    </ul>
                                    <!-- Tab panes -->
                                    <div class="tab-content">
                                       
                                        <div class="tab-pane active" id="bulk" role="tabpanel">
                                              <h4 class="card-title">@lang('admin.use_link') Bulksms <a target="_blank" href="https://www.bulksms.com/">@lang('admin.click')</a></h4>
            <form class="" action="{{url('')}}/add/bulk_sms/setting" enctype="multipart/form-data" method="post">
     {{ csrf_field() }}
     <div class="row">
        <div class="col-md-12">
                             <div class="form-group">
            <label for="example-email">Bulk Username * <span class="help"></span></label><br>
    <input type="text" class="form-control" value="{{\App\Gateway::first()->bulk_user}}" name="bulk_user">
                     </div>
                 </div>
                 <div class="col-md-12">
                             <div class="form-group">
            <label for="example-email">Bulk Password *<span class="help"></span></label>
<input type="text" class="form-control" value="{{\App\Gateway::first()->bulk_pass}}" name="bulk_pass">
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
                                        <div class="tab-pane" id="multi" role="tabpanel">
                                              <h4 class="card-title">@lang('admin.use_link') MultiTexter <a target="_blank" href="https://www.MultiTexter.com">@lang('admin.click')</a></h4>
                                              <form class="" action="{{url('')}}/add/multi_sms/setting" enctype="multipart/form-data" method="post">
     {{ csrf_field() }}
     <div class="row">
        <div class="col-md-12">
                             <div class="form-group">
            <label for="example-email">Multi-Texter Username * <span class="help"></span></label><br>
    <input type="text" class="form-control" value="{{\App\Gateway::first()->multi_user}}" name="multi_user">
                     </div>
                 </div>
                 <div class="col-md-12">
                             <div class="form-group">
            <label for="example-email">Multi-Texter Password *<span class="help"></span></label>
<input type="text" class="form-control" value="{{\App\Gateway::first()->multi_pass}}" name="multi_pass">
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
                                        <div class="tab-pane" id="nexmo" role="tabpanel">
                                              <h4 class="card-title">@lang('admin.use_link') Nexmo <a target="_blank" href="https://dashboard.nexmo.com/sign-up">@lang('admin.click')</a></h4>
                                             <form class="" action="{{url('')}}/add/nexmo_sms/setting" enctype="multipart/form-data" method="post">
     {{ csrf_field() }}
     <div class="row">
        <div class="col-md-12">
                             <div class="form-group">
            <label for="example-email">Nexmo Api Key * <span class="help"></span></label><br>
    <input type="text" class="form-control" value="{{\App\Gateway::first()->nexmo_key}}" name="nexmo_key">
                     </div>
                 </div>
                 <div class="col-md-12">
                             <div class="form-group">
            <label for="example-email">Nexmo Api Secret *<span class="help"></span></label>
<input type="text" class="form-control" value="{{\App\Gateway::first()->nexmo_sec}}" name="nexmo_sec">
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
                                </div>
                                 </div>
                                </div>
                </div>
            </div>