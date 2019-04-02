  <form action="{{url('')}}/edit/feature/image/{{$id}}" method="post" enctype="multipart/form-data" class="">
             {{ csrf_field() }}
              <div class="form-group">
                              <label>@lang('admin.feat_title')</label>
                      <input type="text" value="{{\App\Frontpage::find($id)->title}}" placeholder="" class="form-control" name="title">
                          </div>
                           <div class="form-group">
                              <label>@lang('admin.feat_describe')</label>
                     <textarea class="form-control" name="description">{{\App\Frontpage::find($id)->description}}</textarea>
                          </div>
                           <div class="form-group">
                              <label>@lang('admin.status')</label>
                   <select class="form-control" name="status">
                     @if(\App\Frontpage::find($id)->status=='1')
                    <option value="1">@lang('admin.publish')</option> 
                    <option value="0">@lang('admin.pending')</option>
                    @else((\App\Frontpage::find($id)->status=='0'))
                    <option value="0">@lang('admin.pending')</option>
                    <option value="1">@lang('admin.publish')</option> 
                    @endif
                   </select>
                          </div>
             <div class="form-group">
               <label>@lang('admin.feat_image') (W242 * H268)</label>
               <input type="file" id="input-file-now-custom-1" class="dropify" name="file" data-default-file="" />
             </div>
               
                <div class="row">
                                        <div class="col-md-2"></div>
                                    <div class="col-md-8">
                      <input type="submit" class="form-control btn btn-primary btn-block" value="@lang('admin.submit')">
                                     </div>
                                        <div class="col-md-2"></div>
                                    </div>
                                </form>