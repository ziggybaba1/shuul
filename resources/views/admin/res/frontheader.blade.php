 <div class="card card-body">
                  <div class="row">
                    <div class="col-md-12">
                                       <form  action="{{url('')}}/add/aboutheader/setting" method="post" enctype="multipart/form-data" class="">
                                       	<div class="row">
             {{ csrf_field() }}       
                                                <div class="col-md-6">
              <div class="form-group">
                              <label>@lang('admin.home')</label>
                      <input type="text" value="{{\App\Frontheader::first()->home}}" placeholder="" class="form-control" name="home">
                          </div>
                      <div class="form-group">
                              <label>@lang('admin.noticeboard')</label>
                      <input type="text" value="{{\App\Frontheader::first()->notice}}" placeholder="" class="form-control" name="notice">
                          </div>
                           <div class="form-group">
                              <label>@lang('admin.event')</label>
                      <input type="text" value="{{\App\Frontheader::first()->event}}" placeholder="" class="form-control" name="event">
                          </div>
                           <div class="form-group">
                              <label>@lang('admin.teacher')</label>
                      <input type="text" value="{{\App\Frontheader::first()->teacher}}" placeholder="" class="form-control" name="teacher">
                          </div>
                           
                           <div class="form-group">
                              <label>@lang('admin.yearbook')</label>
                      <input type="text" value="{{\App\Frontheader::first()->course}}" placeholder="" class="form-control" name="course">
                          </div>
                           <div class="form-group">
                              <label>@lang('admin.gallery')</label>
                      <input type="text" value="{{\App\Frontheader::first()->gallery}}" placeholder="" class="form-control" name="gallery">
                          </div>
                      <div class="form-group">
                              <label>@lang('admin.about_us')</label>
                      <input type="text" value="{{\App\Frontheader::first()->about}}" placeholder="" class="form-control" name="about">
                          </div>
                           <div class="form-group">
                              <label>@lang('admin.future') @lang('admin.student')</label>
                      <input type="text" value="{{\App\Frontheader::first()->future}}" placeholder="" class="form-control" name="future">
                          </div>
                                                </div>
                                    <div class="col-md-6">
                                    	 <div class="form-group">
                              <label>@lang('admin.noticeboard')</label>
                                <select class="form-control" name="notice_id">
                             @if(\App\Frontheader::first()->notice_id=='1')
                                	<option value="1">@lang('admin.enabled')</option>
                                	<option value="0">@lang('admin.disabled')</option>
                                	@elseif(\App\Frontheader::first()->notice_id=='0')
                                	<option value="0">@lang('admin.disabled')</option>
                                	<option value="1">@lang('admin.enabled')</option>
                                	@endif
                                </select>
                                      </div>
                                       <div class="form-group">
                              <label>@lang('admin.event')</label>
                                <select class="form-control" name="event_id">
                                  @if(\App\Frontheader::first()->event_id=='1')
                                	 <option value="1">@lang('admin.enabled')</option>
                                  <option value="0">@lang('admin.disabled')</option>
                                	@elseif(\App\Frontheader::first()->event_id=='0')
                                	<option value="0">@lang('admin.disabled')</option>
                                  <option value="1">@lang('admin.enabled')</option>
                                	@endif
                                </select>
                                      </div>
                                       <div class="form-group">
                              <label>@lang('admin.teacher')</label>
                                <select class="form-control" name="teacher_id">
                                  @if(\App\Frontheader::first()->teacher_id=='1')
                                	<option value="1">@lang('admin.enabled')</option>
                                  <option value="0">@lang('admin.disabled')</option>
                                	@elseif(\App\Frontheader::first()->teacher_id=='0')
                                	<option value="0">@lang('admin.disabled')</option>
                                  <option value="1">@lang('admin.enabled')</option>
                                	@endif
                                </select>
                                      </div>
                                      <div class="form-group">
                              <label>@lang('admin.yearbook')</label>
                                <select class="form-control" name="course_id">
                                	  @if(\App\Frontheader::first()->course_id=='1')
                                	<option value="1">@lang('admin.enabled')</option>
                                  <option value="0">@lang('admin.disabled')</option>
                                	@elseif(\App\Frontheader::first()->course_id=='0')
                                	<option value="0">@lang('admin.disabled')</option>
                                  <option value="1">@lang('admin.enabled')</option>
                                	@endif
                                </select>
                                      </div>
                                      <div class="form-group">
                              <label>@lang('admin.gallery')</label>
                                <select class="form-control" name="gallery_id">
                                  @if(\App\Frontheader::first()->gallery_id=='1')
                                	<option value="1">@lang('admin.enabled')</option>
                                  <option value="0">@lang('admin.disabled')</option>
                                	@elseif(\App\Frontheader::first()->gallery_id=='0')
                                	<option value="0">@lang('admin.disabled')</option>
                                  <option value="1">@lang('admin.enabled')</option>
                                	@endif
                                </select>
                                      </div>
                                        <div class="form-group">
                              <label>@lang('admin.future') @lang('admin.student')</label>
                                <select class="form-control" name="future_id">
                                  @if(\App\Frontheader::first()->future_id=='1')
                                	<option value="1">@lang('admin.enabled')</option>
                                  <option value="0">@lang('admin.disabled')</option>
                                	@elseif(\App\Frontheader::first()->future_id=='0')
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
