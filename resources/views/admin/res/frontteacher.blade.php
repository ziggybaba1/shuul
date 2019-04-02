
                  <div class="row">
                     <div class="col-md-12">
                       <div class="card">
                         <div class="card-body">
 <form  action="{{url('')}}/add/teacher/page" method="post" enctype="multipart/form-data" class="">
             {{ csrf_field() }}
              <div class="form-group">
                              <label>@lang('admin.teacher') @lang('admin.page') @lang('admin.title')</label>
                      <input type="text" value="{{\App\Fronthome::first()->teacher_title}}" placeholder="" class="form-control" name="title">
                          </div>
                           <div class="form-group">
                              <label>@lang('admin.teacher') @lang('admin.page') @lang('admin.describe')</label>
                     <textarea class="form-control" rows="7" name="description">{{\App\Fronthome::first()->teacher_description}}</textarea>
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
                    <div class="col-md-12">
                       <div class="card">
                        <div class="card-body">

                              <label>@lang('admin.feat_teacher')</label>
                                                  <div class="table-responsive m-t-40">
                                    <table class="display nowrap table table-hover table-striped table-bordered sems" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                              <th>#</th>
                                                <th>@lang('admin.user_id')</th>
                                                <th>@lang('admin.name')</th>
                                                <th>@lang('admin.image')</th>
                                                <th>@lang('admin.option')</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                    @foreach(\App\Teacher::where('role','teacher')->where('status','0')->get() as $list)
                                            <tr>
                                              <td>{{$loop->iteration}}</td>
        <td>{{$list->user_id}}</td> 
                                              <td>{{$list->gname}} {{$list->fname}}</td> 
                                               <td><img width="70" src="{{url('')}}/uploads/avatars/{{$list->image}}"></td>
                                               <td>
                                      @if($list->feat!='1')
                <button onclick="addfeature('{{$list->id}}')" class="btn btn-primary" href="javascript:void(0)">@lang('admin.add_feat')</button>
                @elseif($list->feat=='1')
                 <button onclick="removefeature('{{$list->id}}')" class="btn btn-dark" href="javascript:void(0)">@lang('admin.remove_feat')</button>
                @endif
                                               </td>
                                            </tr>
                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                              </div>
                            </div>
                                                </div>
                   
                        </div>
                          <script type="text/javascript">
                            $('.sems').DataTable();
                            function addfeature(id)
              {
                if(confirm("@lang('admin.confirm_feature')")){ 
                $.get('{{url('')}}/add/feature/'+id,function(data)
                {
               if(data==0){
                  swal("@lang('admin.teach_feat')", "@lang('admin.continue-button')", "success");
                    window.location.assign('{{url('')}}/admin/page.fmp?page=59');
                }
            
                });
            }
              }
               function removefeature(id)
              {
                if(confirm("@lang('admin.confirm_rfeature')")){ 
                $.get('{{url('')}}/remove/feature/'+id,function(data)
                {
               if(data==0){
                  swal("@lang('admin.teach_rfeat')", "@lang('admin.continue-button')", "success");
                    window.location.assign('{{url('')}}/admin/page.fmp?page=59');
                }
            
                });
            }
              }
                          </script>