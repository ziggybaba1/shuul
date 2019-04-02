<form action="{{url('')}}/edit/about/feature/{{$id}}" method="post" enctype="multipart/form-data" class="">
             {{ csrf_field() }}
              <div class="form-group">
                              <label>@lang('admin.about') @lang('admin.feat_title')</label>
                      <input type="text" value="{{\App\Frontlist::find($id)->title}}" class="form-control" name="title">
                          </div>
                           <div class="form-group">
                              <label>@lang('admin.about') @lang('admin.feat_describe')</label>
                     <textarea class="form-control" name="description">{{\App\Frontlist::find($id)->description}}</textarea>
                          </div>
                            <div class="form-group">
                              <label>@lang('admin.about') @lang('admin.feat_type')</label>
                   <select class="form-control" name="status">
              @if(\App\Frontlist::find($id)->status=='Point')
                    <option value="Point">Point</option> 
                    <option value="Bullet">Bullet</option>
                    @elseif(\App\Frontlist::find($id)->status=='Bullet')
                    <option value="Bullet">Bullet</option>
                    <option value="Point">Point</option> 
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
                                </form>