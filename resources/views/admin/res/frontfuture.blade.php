 <div class="card card-body">
                  <div class="row">
                    <div class="col-md-12">
                       <form  action="{{url('')}}/add/future/page" method="post" enctype="multipart/form-data" class="">
             {{ csrf_field() }}
              <div class="form-group">
               <label>@lang('admin.future') @lang('admin.header') @lang('admin.image') (W770 * H326)</label>
               <input type="file" id="input-file-now-custom-1" class="dropify" name="image" data-default-file="{{url('')}}/uploads/frontend/{{\App\Fronthome::first()->feature_back}}" />
             </div>
              <div class="form-group">
                              <label>@lang('admin.future') @lang('admin.header') @lang('admin.image') @lang('admin.button') @lang('admin.text')</label>
                      <input type="text" value="{{\App\Fronthome::first()->feature_btn_text}}" placeholder="" class="form-control" name="feature_button_text">
                          </div>
                            <div class="form-group">
                              <label>@lang('admin.future') @lang('admin.body') @lang('admin.header')</label>
                      <input type="text" value="{{\App\Fronthome::first()->feature_body_title}}" placeholder="" class="form-control" name="feature_body_title">
                          </div>
                           <div class="form-group">
                              <label>@lang('admin.future') @lang('admin.body') @lang('admin.describe')</label>
                     <textarea class="form-control" rows="7" name="feature_body_content">{{\App\Fronthome::first()->feature_body_content}}</textarea>
                          </div>
                          <div class="form-group">
                              <label>@lang('admin.admission') @lang('admin.form') @lang('admin.detail')</label>
                     <textarea class="form-control" rows="7" name="feature_print_info">{{\App\Fronthome::first()->feature_print_info}}</textarea>
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
                             <script type="text/javascript">
                                                   $(document).ready(function() {
            $('.select2').select2();
        $('.dropify').dropify();
        $('.sems').DataTable();
         });
    </script>
                                              </script>