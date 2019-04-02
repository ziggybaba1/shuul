@extends('layouts.student')
@section('content')
<div class="row page-titles">
                    <div class="col-md-6 col-8 align-self-center">
                        <h3 class="text-themecolor">{{\Auth::user()->name}} Project Grade List</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                            <li class="breadcrumb-item active">project-grade</li>
                        </ol>
                    </div>
                    <div class="col-md-6 col-4 align-self-center">
                        <div class="d-flex m-t-10 justify-content-end">
                              <h5 class="text-themecolor">Current Session: {{\App\Session::latest()->first()->session}} </h5><br>
                            <h5 class="text-themecolor">  ({{\App\Session::latest()->first()->terms}} Term)</h5>
                        </div>
                    </div>
                </div>
                                    <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
    <h4 class="card-title">Project Grade List Export</h4>
                                <h6 class="card-subtitle">Export data to Copy, CSV, Excel, PDF & Print</h6>
                                <div class="table-responsive m-t-40">
        <table id="example24" class="display nowrap table  table-bordered" cellspacing="0" width="100%">
                                       <thead>
                                            <tr>
                                                <th>Class</th>
                                                <th>Subject</th>
                                                <th>Session</th>
                                                <th>Term</th>
                                                <th>Score</th>
                                                <th>Overall Score</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>Class</th>
                                                <th>Subject</th>
                                                <th>Session</th>
                                                <th>Term</th>
                                                <th>Score</th>
                                                <th>Overall Score</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
               @foreach(\App\Assignmentgrade::where('student_id',\App\Student::where('data_id',\Auth::user()->id)->first()->id)->get() as $class)
                                            <tr>
                <td>{{\App\Course::find($class->class)->title}}</td>
                <td>{{\App\Subject::find($class->subject)->title}}</td>
                <td>{{$class->session}}</td>
                                                <td>{{$class->term}}</td>
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

@endsection