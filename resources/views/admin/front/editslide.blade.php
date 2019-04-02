  <form action="{{url('')}}/edit/gallery/image/{{$id}}" method="post" enctype="multipart/form-data" class="">
             {{ csrf_field() }}
              <div class="form-group">
                              <label>@lang('admin.slide') @lang('admin.title')</label>
                      <input type="text" value="{{\App\Frontgallery::find($id)->title}}" placeholder="" class="form-control" name="title">
                          </div>
                           <div class="form-group">
                              <label>@lang('admin.slide') @lang('admin.describe')</label>
                     <textarea class="form-control" name="description">{{\App\Frontgallery::find($id)->description}}</textarea>
                          </div>
                            <div class="form-group">
                              <label>@lang('admin.status')</label>
                   <select class="form-control" name="status">
                    @if(\App\Frontgallery::find($id)->status=='1')
                    <option value="1">@lang('admin.publish')</option> 
                    <option value="0">@lang('admin.pending')</option>
                    @else((\App\Frontgallery::find($id)->status=='0'))
                    <option value="0">@lang('admin.pending')</option>
                    <option value="1">@lang('admin.publish')</option> 
                    @endif
                   </select>
                          </div>
             <div class="form-group">
               <label>@lang('admin.slide') @lang('admin.image') (W1920 * H600)</label>
               <input type="file" id="input-file-now-custom-1" class="dropify" name="file" data-default-file="{{url('')}}/uploads/frontend/{{\App\Frontgallery::find($id)->image}}" />
             </div>
               
                <div class="row">
                                        <div class="col-md-2"></div>
                                    <div class="col-md-8">
                      <input type="submit" class="form-control btn btn-primary btn-block" value="@lang('admin.submit')">
                                     </div>
                                        <div class="col-md-2"></div>
                                    </div>
                                </form>
                                 <script type="text/javascript">
               $(document).ready(function() {
            $('.select2').select2();
        $('.dropify').dropify();
         });
            </script>