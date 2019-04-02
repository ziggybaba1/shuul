<div class="card card-body">
                  <div class="row">
                    <div class="col-md-6">
                                                  <button data-toggle="modal" data-target=".bs-example-modal-tm" class="btn btn-info">@lang('admin.add') @lang('admin.testimony')</button>
                                                  <div class="table-responsive m-t-40">
                                    <table class="display nowrap table table-hover table-striped table-bordered sems" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                              <th>@lang('admin.image')</th>
                                               <th>@lang('admin.name')</th>
                                                <th>@lang('admin.graduate_year')</th>
                                                <th>@lang('admin.current_job')</th>
                                                <th>@lang('admin.status')</th>
                                                <th>@lang('admin.option')</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                     @foreach(\App\Testimonial::all() as $feat)
                                            <tr>
                                             <td><img width="50px" src="{{url('')}}/uploads/frontend/{{$feat->image}}"></td> 
                                              <td>{{$feat->name}}</td>
                                              <td>{{$feat->grad}}</td>
                                              <td>{{$feat->job}}</td> 
                                              @if($feat->status=='1')
                                               <td>@lang('admin.published')</td>
                                               @elseif($feat->status=='0')
                                               <td>@lang('admin.pending')</td>
                                               @endif 
                                               <td>
                                                 <div class="btn-group">
<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="ti-settings"></i></button>
     <div class="dropdown-menu ">
                <a onclick="showAjaxModal('{{url('')}}/edit/testimony/home/{{$feat->id}}')" class="dropdown-item" href="javascript:void(0)">@lang('admin.edit')</a>
                <a class="dropdown-item" onclick="deletetestimony('{{$feat->id}}')" href="javascript:void(0)">@lang('admin.delete')</a>
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
                                                  <form  action="{{url('')}}/add/testimony/page" method="post" enctype="multipart/form-data" class="">
             {{ csrf_field() }}
              <div class="form-group">
                              <label>@lang('admin.testimony') @lang('admin.home_page') @lang('admin.title')</label>
                      <input type="text" value="{{\App\Fronthome::first()->test_title}}" placeholder="" class="form-control" name="test_title">
                          </div>
                           <div class="form-group">
                              <label>@lang('admin.testimony') @lang('admin.home_page') @lang('admin.describe')</label>
                     <textarea class="form-control" maxlength="400" rows="7" name="test_description">{{\App\Fronthome::first()->test_description}}</textarea>
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
                                      </div>
                                       <script type="text/javascript">
                                                   $(document).ready(function() {
            $('.select2').select2();
        $('.dropify').dropify();
        $('.sems').DataTable();
         });
    </script>
                                              </script>