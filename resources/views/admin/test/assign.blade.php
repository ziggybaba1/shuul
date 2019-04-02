<div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">E-Test Assign Export</h4>
                                <h6 class="card-subtitle">Export data to Copy, CSV, Excel, PDF & Print</h6>
                                <div class="table-responsive m-t-40">
        <table id="example230" class="display nowrap table  table-bordered" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                               <th>ID</th>
                                                <th>Subject</th>
                                                <th>Class</th>
                                                <th>Batch</th>
                                                 <th>Created Date</th>
                                                <th>Results</th>
                                                <th>Edit</th>
                                               <th>Delete</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                               <th>ID</th>
                                                <th>Subject</th>
                                                <th>Class</th>
                                                <th>Batch</th>
                                                 <th>Created Date</th>
                                                <th>Results</th>
                                                <th>Edit</th>
                                               <th>Delete</th>
                                            </tr>
                                        </tfoot>
                      <tbody>
                @foreach(\App\Assign::all() as $batch)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                        <td>{{\App\Subject::find($batch->subject)->title}}</td>
                        <td>{{\App\Course::find($batch->class)->title}}</td>
                        <td>Batch {{$batch->batch_id}}</td>
                        <td>{{\Carbon\Carbon::parse($batch->created_at)->format('Y-m-d')}}</td>
    <td><a href="{{url('')}}/view/batch_results?result={{$batch->id}}" class="btn btn-sm btn-block btn-primary"><i class="fa fa-check-square-o"></i> view result</a></td>
    <td><a class="btn btn-sm btn-block btn-secondary"><i class="fa fa-book"></i></a></td>
    <td><a class="btn btn-sm btn-block btn-danger"><i class="fa fa-trash"></i></a></td>
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
     $('#example230').DataTable({
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    });
</script>