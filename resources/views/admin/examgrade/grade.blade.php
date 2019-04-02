                    <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">{{\App\Course::find($id)->title}} Exam Grade List Export</h4>
                                <h6 class="card-subtitle">Export data to Copy, CSV, Excel, PDF & Print</h6>
                                <div class="table-responsive m-t-40">
        <table id="datatabler" class="display nowrap table  table-bordered" cellspacing="0" width="100%">
                                       <thead>
                                            <tr>
                                                <th>Subject</th>
                                                <th>Student</th>
                                                <th>Score</th>
                                                <th>Overall Score</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>Subject</th>
                                                <th>Student</th>
                                                <th>Score</th>
                                                <th>Overall Score</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                        @foreach(\App\Examgrade::where('class',$id)->get() as $class)
                                            <tr>
                <td>{{\App\Subject::find($class->subject)->title}}</td>
                <td>{{\App\Student::find($class->student_id)->user_id}} {{\App\Student::find($class->student_id)->gname}} {{\App\Student::find($class->student_id)->fname}}</td>
                                                <td>{{$class->score}}</td>
                                                <td>{{$class->over}}</td>
                    
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