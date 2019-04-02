 <div class="card card-body">
                  <div class="row">
                    <div class="col-md-12">
                                       <form  action="{{url('')}}/add/aboutfooter/setting" method="post" enctype="multipart/form-data" class="">
                                       	<div class="row">
             {{ csrf_field() }}       
                                                <div class="col-md-6">
              <div class="form-group">
                              <label>@lang('admin.request') @lang('admin.button') @lang('admin.title') @lang('admin.text')</label>
                      <input type="text" value="{{\App\Frontfooter::first()->req_title}}" placeholder="" class="form-control" name="req_title">
                          </div>
                      <div class="form-group">
                              <label>@lang('admin.request') @lang('admin.button') @lang('admin.sub') @lang('admin.text')</label>
                      <input type="text" value="{{\App\Frontfooter::first()->req_sub}}" placeholder="" class="form-control" name="req_sub">
                          </div>
                           <div class="form-group">
                              <label>@lang('admin.contact') @lang('admin.address')</label>
                      <input type="text" value="{{\App\Frontfooter::first()->con_address}}" placeholder="" class="form-control" name="con_address">
                          </div>
                           <div class="form-group">
                              <label>@lang('admin.contact') @lang('admin.email')</label>
                      <input type="text" value="{{\App\Frontfooter::first()->con_email}}" placeholder="" class="form-control" name="con_email">
                          </div>  
                           <div class="form-group">
                              <label>@lang('admin.contact') @lang('admin.tel_no')</label>
                      <input type="text" value="{{\App\Frontfooter::first()->con_phone}}" placeholder="" class="form-control" name="con_phone">
                          </div>
                           <div class="form-group">
                              <label>@lang('admin.social') @lang('admin.media') @lang('admin.text')</label>
                      <input type="text" value="{{\App\Frontfooter::first()->social}}" placeholder="" class="form-control" name="social">
                          </div>
                      <div class="form-group">
                              <label>@lang('admin.contact') @lang('admin.text')</label>
                      <input type="text" value="{{\App\Frontfooter::first()->contact}}" placeholder="" class="form-control" name="contact">
                          </div>
                            <div class="form-group">
                              <label>@lang('admin.copyright') @lang('admin.text')</label>
                      <input type="text" value="{{\App\Frontfooter::first()->copyright}}" placeholder="" class="form-control" name="copyright">
                          </div>
                           <div class="form-group" style="display: none;">
                              <label>Newsletter Head Text</label>
                      <input type="text" value="{{\App\Frontfooter::first()->news_head}}" placeholder="" class="form-control" name="news_head">
                          </div> 
                           <div class="form-group">
                              <label>@lang('admin.social') @lang('admin.head') @lang('admin.text')</label>
                      <input type="text" value="{{\App\Frontfooter::first()->social_head}}" placeholder="" class="form-control" name="social_head">
                          </div> 
                            
                        </div>
                                    <div class="col-md-6">
                                       <div class="form-group">
                              <label>@lang('admin.social') Facebook</label>
                         <div class="input-group">
                                            <div class="input-group-addon"><i class="fa fa-facebook"></i></div>
                      <input type="text" value="{{\App\Frontfooter::first()->social_fb}}" placeholder="" class="form-control" name="social_fb">
                          </div>
                        </div>
                                   <div class="form-group">
                              <label>@lang('admin.social') Twitter</label>
                               <div class="input-group">
                                            <div class="input-group-addon"><i class="fa fa-twitter"></i></div>
                      <input type="text" value="{{\App\Frontfooter::first()->social_twt}}" placeholder="" class="form-control" name="social_twt">
                          </div> 
                            <div class="form-group">
                              <label>@lang('admin.social') Google+</label>
                               <div class="input-group">
                                            <div class="input-group-addon"><i class="fa fa-google-plus"></i></div>
                      <input type="text" value="{{\App\Frontfooter::first()->social_gg}}" placeholder="" class="form-control" name="social_gg">
                          </div>
                        </div>
                            <div class="form-group">
                              <label>@lang('admin.social') Linkedin</label>
                              <div class="input-group">
                                            <div class="input-group-addon"><i class="fa fa-linkedin"></i></div>
                      <input type="text" value="{{\App\Frontfooter::first()->social_ln}}" placeholder="" class="form-control" name="social_ln">
                          </div>
                        </div>
                            <div class="form-group">
                              <label>@lang('admin.social') Instagram</label>
                               <div class="input-group">
                                            <div class="input-group-addon"><i class="fa fa-instagram"></i></div>
                      <input type="text" value="{{\App\Frontfooter::first()->social_gram}}" placeholder="" class="form-control" name="social_gram">
                          </div>
                        </div>
                            <div class="form-group">
                              <label>@lang('admin.social') Pinterest</label>
                               <div class="input-group">
                                            <div class="input-group-addon"><i class="fa fa-pinterest"></i></div>
                      <input type="text" value="{{\App\Frontfooter::first()->social_pin}}" placeholder="" class="form-control" name="social_pin">
                          </div>
                        </div>
                                       <div class="form-group">
                              <label>@lang('admin.contact')</label>
                                <select class="form-control" name="contact_id">
                                  @if(\App\Frontfooter::first()->contact_id=='1')
                                	<option value="1">@lang('admin.enabled')</option>
                                	<option value="0">@lang('admin.disabled')</option>
                                	@elseif(\App\Frontfooter::first()->contact_id=='0')
                                <option value="0">@lang('admin.disabled')</option>
                                <option value="1">@lang('admin.enabled')</option>
                                	@endif
                                </select>
                                      </div>
                                      
                                      <div class="form-group">
                              <label>@lang('admin.social') @lang('admin.media')</label>
                                <select class="form-control" name="social_id">
                                  @if(\App\Frontfooter::first()->social_id=='1')
                                	<option value="1">@lang('admin.enabled')</option>
                                  <option value="0">@lang('admin.disabled')</option>
                                	@elseif(\App\Frontfooter::first()->social_id=='0')
                                 <option value="0">@lang('admin.disabled')</option>
                                <option value="1">@lang('admin.enabled')</option>
                                	@endif
                                </select>
                                      </div>
                                        <div class="form-group" style="display: none;">
                              <label>
                                       <div class="form-group">
                              <label>@lang('admin.request') @lang('admin.section')</label>
                                <select class="form-control" name="request_id">
                                  @if(\App\Frontfooter::first()->request_id=='1')
                                    <option value="1">@lang('admin.enabled')</option>
                                  <option value="0">@lang('admin.disabled')</option>
                                  @elseif(\App\Frontfooter::first()->request_id=='0')
                                  <option value="0">@lang('admin.disabled')</option>
                                <option value="1">@lang('admin.enabled')</option>
                                  @endif
                                </select>
                                      </div>
                                    	   <div class="row">
                                        <div class="col-md-2"></div>
                                    <div class="col-md-8">
                      <input type="submit" class="form-control btn btn-primary btn-block" value="@lang('admin.submit')">
                                     </div>
                                        <div class="col-md-2"></div>
                                    </div>
                                    </div>
                                      </div>
                                                  </form>
                                               
                    </div>
                </div>
            </div>
