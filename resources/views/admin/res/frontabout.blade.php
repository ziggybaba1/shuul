<div class="row">
                                              
                                                <div class="col-md-6">
                                <button data-toggle="modal" data-target=".bs-example-modal-ab" class="btn btn-primary btn-sm">@lang('admin.add') @lang('admin.about') @lang('admin.feat_type')</button>
                                                  <div class="table-responsive m-t-40">
                                    <table class="display nowrap table table-hover table-striped table-bordered sems" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th>@lang('admin.about') @lang('admin.feat_title')</th>
                                                <th>@lang('admin.feat_describe')</th>
                                                <th>@lang('admin.about') @lang('admin.feat_type')</th>
                                                <th>@lang('admin.option')</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                    @foreach(\App\Frontlist::all() as $list)
                                            <tr>
        <td>{{$list->title}}</td> 
                                              <td>{{$list->description}}</td> 
                                               <td>{{$list->status}}</td>
                                               <td>
                                                 <div class="btn-group">
<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="ti-settings"></i></button>
     <div class="dropdown-menu ">
                <a onclick="showAjaxModal('{{url('')}}/editn/about/feature/{{$list->id}}')" class="dropdown-item" href="javascript:void(0)">@lang('admin.edit')</a>
                <a class="dropdown-item" onclick="deleteabtfeat('{{$list->id}}')" href="javascript:void(0)">@lang('admin.delete')</a>
      </div>
          </div>
                                               </td>
                                            </tr>
                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                                </div>
                                                <div class="col-md-6">
                            <form  action="{{url('')}}/add/about/page" method="post" enctype="multipart/form-data" class="">
             {{ csrf_field() }}
              <div class="form-group">
                              <label>@lang('admin.about') @lang('admin.head_tag') @lang('admin.title')</label>
                      <input type="text" value="{{\App\Frontcategory::first()->head_tag}}" placeholder="" class="form-control" name="title">
                          </div>
                           <div class="form-group">
                              <label>@lang('admin.about') @lang('admin.head_tag') @lang('admin.describe')</label>
                     <textarea class="form-control" rows="7" name="description">{{\App\Frontcategory::first()->head_describe}}</textarea>
                          </div>
                       <div class="form-group">
               <label>About Head-Tag Image (W242 * H268)</label>
               <input type="file" id="input-file-now-custom-1" class="dropify" name="file" data-default-file="{{url('')}}/uploads/frontend/{{\App\Frontcategory::first()->head_image}}" />
             </div>
              <div class="form-group">
               <label>@lang('admin.about') @lang('admin.head_tag') @lang('admin.image') (W770 * H326)</label>
               <input type="file" id="input-file-now-custom-1" class="dropify" name="image" data-default-file="{{url('')}}/uploads/frontend/{{\App\Frontcategory::first()->image}}" />
             </div>
              <div class="form-group">
                              <label>@lang('admin.about') @lang('admin.body') @lang('admin.title')</label>
                      <input type="text" value="{{\App\Frontcategory::first()->body_title}}" placeholder="" class="form-control" name="body_title">
                          </div>
                           <div class="form-group">
                              <label>@lang('admin.about') @lang('admin.body') @lang('admin.describe')</label>
                     <textarea class="form-control" rows="7" name="body_describe">{{\App\Frontcategory::first()->body_describe}}</textarea>
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