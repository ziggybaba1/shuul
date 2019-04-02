 <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
    <h4 class="card-title">{{\App\Student::find($id)->gname}} {{\App\Student::find($id)->fname}} Report Card List Export</h4>
                                <h6 class="card-subtitle">Export data to Copy, CSV, Excel, PDF & Print</h6>
                                <div class="table-responsive m-t-40">
        <table id="datatabler" class="display nowrap table  table-bordered" cellspacing="0" width="100%">
                                       <thead>
                                            <tr>
                                                <th>Class</th>
                                                <th>Session</th>
                                                <th>Term</th>
                                                <th>View</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>Class</th>
                                                <th>Session</th>
                                                <th>Term</th>
                                                <th>View</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
               @foreach(\App\Result::where('student_id',$id)->get() as $class)
                                            <tr>
                <td>{{\App\Course::find($class->class_id)->title}}</td>
                <td>{{$class->session}}</td>
                                                <td>{{$class->term}}</td>
                                                <td>
                            <a onclick="showAjaxModal('{{url('')}}/show/result/{{$class->id}}')" class="btn btn-primary btn-sm btn-block"><i class="fa fa-book"></i>Print Result</a>                        
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
    $(document).ready(function() {
$("#datatabler").DataTable();
    });
</script> 