 <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">@lang('admin.e_test') @lang('admin.result') @lang('admin.list')</h4>
                                <h6 class="card-subtitle"></h6>
                                <div class="table-responsive m-t-40">
      <table class="display nowrap table  table-bordered customed" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>@lang('admin.type')</th>
                                                <th>@lang('admin.student')</th>
                                                 <th>@lang('admin.class')</th>
                                               <th>@lang('admin.subject')</th>
                                                <th>@lang('admin.batch')</th>
                                                <th>@lang('admin.score')</th>
                                                <th>@lang('admin.date_submit')</th>
                                               <th>@lang('admin.result_col_perm')</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                               <th>#</th>
                                               <th>@lang('admin.type')</th>
                                                <th>@lang('admin.student')</th>
                                                 <th>@lang('admin.class')</th>
                                               <th>@lang('admin.subject')</th>
                                                <th>@lang('admin.batch')</th>
                                                <th>@lang('admin.score')</th>
                                                <th>@lang('admin.date_submit')</th>
                                               <th>@lang('admin.result_col_perm')</th>
                                            </tr>
                                        </tfoot>
                      <tbody>
@foreach(\App\Esubmit::latest()->get() as $batch)
                       <tr>
                            <td>{{$loop->iteration}}</td>
                              @if(\App\Batch::find($batch->batch_id)->type=='1')
                        <td>Student</td>
                    @elseif(\App\Batch::find($batch->batch_id)->type=='2')
                        <td>Staff</td>
                    @endif
        <td>
        @if(\App\Batch::find($batch->batch_id)->type=='1')
          {{\App\User::find(\App\Student::find($batch->student_id)->data_id)->name}}
          @elseif(\App\Batch::find($batch->batch_id)->type=='2')
{{\App\User::find(\App\Teacher::find($batch->student_id)->user_table)->name}}
          @endif
        </td>
                            <td>
                           @if(\App\Batch::find($batch->batch_id)->type=='1')
                              {{\App\Course::find(\App\Batch::find($batch->batch_id)->class)->title}}
                              @endif
                            </td>
                        <td>
                           @if(\App\Batch::find($batch->batch_id)->type=='1')
                          {{\App\Subject::find(\App\Batch::find($batch->batch_id)->subject)->title}}
                          @elseif(\App\Batch::find($batch->batch_id)->type=='2')
                          {{\App\Batch::find($batch->batch_id)->subject}}
                          @endif
                            @if($batch->score=='')
                         <span class="label label-info m-r-10">New!!</span>
                         @elseif($batch->score!='')
                          <span class="label label-success m-r-10">New Score!!</span>
                         @endif
                     </td>
                     <td>{{\App\Batch::find($batch->batch_id)->batch}}</td>
                     <td style="text-align: center;">{{$batch->score}}%</td>
                        <td>{{\Carbon\Carbon::parse($batch->created_at)->toFormattedDateString()}}</td>
                        <td><button onclick="showAjaxModal('{{url('')}}/etest/generate/score/{{$batch->id}}')" class="btn btn-primary btn-sm">@lang('admin.generate') @lang('admin.score')</button></td>
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
       $('.customed').DataTable( {
        initComplete: function () {
            this.api().columns([1,2 , 5]).every( function () {
                var column = this;
                var select = $('<select class="form-control"><option value=""></option></select>')
                    .appendTo( $(column.footer()).empty() )
                    .on( 'change', function () {
                        var val = $.fn.dataTable.util.escapeRegex(
                            $(this).val()
                        );
 
                        column
                            .search( val ? '^'+val+'$' : '', true, false )
                            .draw();
                    } );
 
                column.data().unique().sort().each( function ( d, j ) {
                    select.append( '<option value="'+d+'">'+d+'</option>' )
                } );
            } );
        }
    } );
    </script>