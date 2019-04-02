<h6>
<div class="row">
                          <div class="col-sm-12">
                             <div class="card card-body">
                                 <h4 class="card-title">@lang('admin.student') @lang('admin.information')</h4>
                            <h6 class="card-subtitle">{{\App\Course::find($id)->title}} @lang('admin.student')</h6>
                         <!-- Tab panes -->
                                          <div class="row">
                    <div class="col-12">
                        <div style="overflow: auto;">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">{{\App\Course::find($id)->title}} @lang('admin.student') @lang('admin.list') @lang('admin.export')</h4>
                                <h6 class="card-subtitle">@lang('admin.event-list-data')</h6>
                                <div class="table-responsive m-t-40">
        <table id="example23" class="display nowrap table  table-bordered" cellspacing="0" width="100%">
                                       <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>@lang('admin.student_id')</th>
                                                <th>@lang('admin.student_name')</th>
                                             <th>@lang('admin.last_gen')</th>
                                              <th>@lang('admin.payment')</th>
                                               <th>@lang('admin.result') @lang('admin.list')</th>
                                                <th>@lang('admin.result') @lang('admin.generation')</th>
                                               
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                 <th>#</th>
                                                 <th>@lang('admin.student_id')</th>
                                                <th>@lang('admin.student_name')</th>
                                             <th>@lang('admin.last_gen')</th>
                                              <th>@lang('admin.payment')</th>
                                               <th>@lang('admin.result') @lang('admin.list')</th>
                                                <th>@lang('admin.result') @lang('admin.generation')</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                        @foreach(\App\Student::where('class',$id)->get() as $student)
                                            <tr>
                                                <td>{{$loop->iteration}}</td>
                                                <td>{{$student->user_id}}</td>
                    <td>{{$student->fname}} {{$student->gname}}</td>
                    <td>
                        @if(count(\App\Result::where('student_id',$student->id)->get())>0)
                        {{\Carbon\Carbon::parse(\App\Result::where('student_id',$student->id)->latest()->first()->created_date)->toFormattedDateString()}}
                        @endif
                    </td>
                     <td><a href="{{url('')}}/admin/list/payments?student={{$student->id}}" class="btn btn-info btn-sm btn-block text-white"><i class="fa fa-check"></i>@lang('admin.payment')</a></td>
                      <td><a href="{{url('')}}/admin/list/results?student={{$student->id}}" class="btn btn-dark btn-sm btn-block text-white"><i class="fa fa-check"></i>@lang('admin.result')</a></td>
                     <td><a href="{{url('')}}/admin/generate/resulted?student={{$student->id}}" class="btn btn-primary btn-sm btn-block text-white"><i class="fa fa-check"></i>@lang('admin.generate') @lang('admin.result')</a></td>
                                            </tr>
                        @endforeach
                                        </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</div>
</div>
                                    </div>
                                </div>
                        </div>
</h6>
<script type="text/javascript">
   $('#example23').DataTable({
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    });
</script>