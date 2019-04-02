 <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">{{\App\Course::find($id)->title}} @lang('admin.student') @lang('admin.export')</h4>
                                <h6 class="card-subtitle">@lang('admin.event-list-data')</h6>
                                <div class="table-responsive m-t-40">
                                    <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th>@lang('admin.student_id')</th>
                                                <th>@lang('admin.image')</th>
                                                <th>@lang('admin.student_name')</th>
                                                <th>@lang('admin.phone')</th>
                                                <th>@lang('admin.address')</th>
                                                <th>@lang('admin.edit')</th>
                                                <th>@lang('admin.view')</th>
                                                <th>@lang('admin.delete')</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                 <th>@lang('admin.student_id')</th>
                                                <th>@lang('admin.image')</th>
                                                <th>@lang('admin.student_name')</th>
                                                <th>@lang('admin.phone')</th>
                                                <th>@lang('admin.address')</th>
                                                <th>@lang('admin.edit')</th>
                                                <th>@lang('admin.view')</th>
                                                <th>@lang('admin.delete')</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                        @foreach(\App\Student::where('class',$id)->get() as $class)
                                            <tr>
                                                <td>{{$class->user_id}}</td>
            <td><img src="{{url('')}}/uploads/avatars/{{$class->image}}" width="70px" height="70px"></td>
                <td>{{$class->gname}} {{$class->mname}} {{$class->fname}}</td>
                                                <td>{{$class->dom1}}</td>
                                             <td>{{$class->praddress}}</td>
        <td><button onclick="showAjaxModal('{{url('')}}/edit/student/profile/{{$class->id}}')" class="btn btn-primary btn-sm btn-block"><i class="fa fa-book"></i> @lang('admin.edit')</button></td>
        <td><a href="{{url('')}}/admin/generate/resulted?student={{$class->id}}" class="btn btn-secondary btn-sm btn-block"><i class="fa fa-eye"></i> @lang('admin.view')</a></td>
        <td><button onclick="deletesubject('{{$class->id}}')" class="btn btn-danger btn-sm btn-block"><i class="fa fa-trash"></i> @lang('admin.delete')</button></td>
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
            $('#example23').DataTable({
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    });
        </script>
        <script type="text/javascript">
              function deletesubject(id)
              {
                 if(confirm("@lang('admin.confirm_delete')")){ 
                $.get('{{url('')}}/delete/student/'+id,function(data)
                {
               if(data==0){
                  swal("@lang('admin.account_delete')", "@lang('admin.continue-button')", "success");
                    window.location.assign('{{url('')}}/admin/page.fmp?page=17');
                }
            else{
                     swal("@lang('admin.error_delete')", "@lang('admin.continue-button')", "error");
                    }   
                });
            }
              }
          </script>
              