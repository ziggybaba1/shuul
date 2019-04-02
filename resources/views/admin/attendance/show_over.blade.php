 <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">{{\App\Course::find($id)->title}} @lang('admin.attend_export') </h4>
                                <h6 class="card-subtitle">@lang('admin.event-list-data')</h6>
                                <div class="table-responsive m-t-40">
        <table id="example23" class="display nowrap table  table-bordered" cellspacing="0" width="100%">
                                       <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>@lang('admin.student_id')</th>
                                                <th>@lang('admin.student')</th>
                                                <th>@lang('admin.no_present')</th>
                                                <th>@lang('admin.no_absent')</th> 
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                              <th>#</th>
                                                <th>@lang('admin.student_id')</th>
                                                <th>@lang('admin.student')</th>
                                                <th>@lang('admin.no_present')</th>
                                                <th>@lang('admin.no_absent')</th> 
                                            </tr>
                                        </tfoot>
                                        <tbody>
@foreach(\App\Student::where('class',$id)->get() as $class)
                                            <tr>
<td>{{$loop->iteration}}</td>
<td>{{$class->user_id}}</td>
<td>{{$class->gname}} {{$class->fname}} </td>
<td>{{count(\App\Attendance::where('student_id',$class->id)->where('status','1')->get())}}</td>
<td>{{count(\App\Attendance::where('student_id',$class->id)->where('status','0')->get())}}</td>
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