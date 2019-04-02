<div class="card card-body">
                  <div class="row">
                    <div class="col-md-12">
                                       <form  action="{{url('')}}/add/support/setting" method="post" enctype="multipart/form-data" class="">
                                       	<div class="row">
             {{ csrf_field() }}       
                                                <div class="col-md-6">
              <div class="form-group">
                              <label>@lang('admin.tawk_url')</label>
                      <input type="text" value="{{\App\Support::first()->url}}" placeholder="" class="form-control" name="tawk_url">
                          </div>
                      <div class="form-group">
                              <label>@lang('admin.tawk_status')</label>
                    <select class="form-control" name="tawk_status">
                    @if(\App\Support::first()->status=='1')
                      <option value="1">@lang('admin.active')</option>
                       <option value="0">@lang('admin.suspend')</option>
                  @elseif(\App\Support::first()->status=='0')
                  <option value="0">@lang('admin.suspend')</option>
                   <option value="1">@lang('admin.active')</option>
                  @endif
                    </select>
                          </div>
                           <div class="form-group">
                      <input type="submit" value="@lang('admin.submit')" placeholder="" class="btn btn-primary btn-block">
                          </div>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>