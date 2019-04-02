 <div class="card card-body">
                  <div class="row">
                    <div class="col-md-12">
                      <h3>@lang('admin.current') @lang('admin.theme'):</h3>
 <form  action="{{url('')}}/add/theme/style" method="post" enctype="multipart/form-data" class="">
             {{ csrf_field() }}
              <div class="form-group">
                              <label>@lang('admin.choose') @lang('admin.theme')</label>
                    <select class="form-control" name="theme">
                @if(\App\Fronttheme::first()->theme=='1')
                      <option value="1">@lang('admin.default') @lang('admin.theme')</option>
                       <option value="2">@lang('admin.second') @lang('admin.theme')</option>
                @elseif(\App\Fronttheme::first()->theme=='2')
                <option value="2">@lang('admin.second') @lang('admin.theme')</option>
                    <option value="1">@lang('admin.default') @lang('admin.theme')</option>
                    @endif
                    </select>
                          </div>
                           <div class="form-group">
                              <label>@lang('admin.additional') @lang('admin.stylesheet')</label>
                     <textarea class="form-control" rows="20" name="css">{{\App\Fronttheme::first()->css}}</textarea>
                          </div>
                      
                <div class="row">
                                        <div class="col-md-2"></div>
                                    <div class="col-md-8">
                      <input type="submit" class="form-control btn btn-primary btn-block" value="@lang('admin.submit')">
                                     </div>
                                        <div class="col-md-2"></div>
                                    </div>
                                </form>
                              </div>
                            </div>
                          </div>