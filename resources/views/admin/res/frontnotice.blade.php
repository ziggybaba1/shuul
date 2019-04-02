 <div class="card card-body">
                  <div class="row">
                    <div class="col-md-12">
 <form  action="{{url('')}}/add/noticeboard/page" method="post" enctype="multipart/form-data" class="">
             {{ csrf_field() }}
              <div class="form-group">
                              <label>@lang('admin.noticeboard') @lang('admin.page') @lang('admin.title')</label>
                      <input type="text" value="{{\App\Fronthome::first()->notice_title}}" placeholder="" class="form-control" name="title">
                          </div>
                           <div class="form-group">
                              <label>@lang('admin.noticeboard') @lang('admin.page') @lang('admin.describe')</label>
                     <textarea class="form-control" rows="7" name="description">{{\App\Fronthome::first()->notice_description}}</textarea>
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