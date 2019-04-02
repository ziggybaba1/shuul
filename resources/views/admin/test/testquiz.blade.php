<div class="row">
                    <div class="col-12">
                     @if (session('message'))
                 <div class="alert alert-info alert-rounded">{{ session('message') }}</div>
                    @endif
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">@if(\App\Batch::Find($id)->type=='1') 
  {{\App\Subject::find(\App\Batch::Find($id)->subject)->title}}  Questions,  Type: Student
@elseif(\App\Batch::Find($id)->type=='2')
{{\App\Batch::Find($id)->subject}}  Questions,  Type: Staff
@endif</h4>
                                <h6 class="card-subtitle">Export data to Copy, CSV, Excel, PDF & Print</h6>
                                <div class="table-responsive m-t-40">
        <table id="example230" class="display nowrap table  table-bordered" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Subject</th>
                                                <th>Type</th>
                                                <th>Date Created</th>
                                                <th>Edit</th>
                                               <th>Delete</th>
                                               
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>ID</th>
                                               <th>Subject</th>
                                                <th>Type</th>
                                                <th>Date Created</th>
                                                <th>Edit</th>
                                               <th>Delete</th>
                                           
                                            </tr>
                                        </tfoot>
                      <tbody>
                 @foreach(\App\Question::where('batch_id',$id)->get() as $batch)
                        <tr>
                            <td>{{$loop->iteration}}</td>
        <td>@if(\App\Batch::Find($id)->type=='1') 
  {{\App\Subject::find(\App\Batch::Find($id)->subject)->title}}
@elseif(\App\Batch::Find($id)->type=='2')
{{\App\Batch::Find($id)->subject}}
@endif</td>
                        <td>{{$batch->type}}</td>
                        <td>{{$batch->created_at}}</td>
<td><a class="btn btn-sm btn-secondary btn-block"><i class="fa fa-book"></i></a></td>
<td><a class="btn btn-sm btn-danger btn-block"><i class="fa fa-trash"></i></a></td>
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