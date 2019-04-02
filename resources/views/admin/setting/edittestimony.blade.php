<div class="row">
          <div class="col-md-12">
          <form action="{{url('')}}/edit/testimony/request/{{$id}}" method="post" enctype="multipart/form-data" class="">
             {{ csrf_field() }}
             
                          <div class="row">
                            <div class="col-md-6">
                          <div class="form-group">
                              <label>@lang('admin.name')</label>
                      <input type="text" value="{{\App\Testimonial::find($id)->name}}" placeholder="" class="form-control" name="name">
                          </div>
                        </div>
                           <div class="col-md-6">
                          <div class="form-group">
                          <label>@lang('admin.test_year_grad')</label>
                      <input type="number" value="{{\App\Testimonial::find($id)->grad}}" placeholder="" class="form-control" name="grad">
                          </div>
                        </div>
                      </div>
                      <div class="row">
                            <div class="col-md-6">
                          <div class="form-group">
                          <label>@lang('admin.test_cu_job')</label>
                      <input type="text" value="{{\App\Testimonial::find($id)->job}}" placeholder="" class="form-control" name="job">
                          </div>
                           </div>
                           <div class="col-md-6">
                             <div class="form-group">
                              <label>@lang('admin.status')</label>
                   <select class="form-control" name="status">
            @if(\App\Testimonial::find($id)->status=='1')
                    <option value="1">@lang('admin.publish')</option> 
                    <option value="0">@lang('admin.pending')</option>
                    @elseif(\App\Testimonial::find($id)->status=='0')
                     <option value="0">@lang('admin.pending')</option>
                     <option value="1">@lang('admin.publish')</option> 
                     @endif
                   </select>
                          </div>
                           </div>
                         </div>
                           <div class="form-group">
                              <label>@lang('admin.testimony')</label>
                     <textarea class="form-control" rows="5" name="description">{{\App\Testimonial::find($id)->content}}</textarea>
                          </div>
                           
             <div class="form-group">
               <label>@lang('admin.testifier') @lang('admin.image') (W242 * H268)</label>
               <input type="file" id="input-file-now-custom-1" class="dropify" name="file" data-default-file="{{url('')}}/uploads/frontend/{{\App\Testimonial::find($id)->image}}" />
             </div>
               
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
        <script type="text/javascript">
               $(document).ready(function() {
            $('.select2').select2();
        $('.dropify').dropify();
         });
            </script>