@extends('layouts.staff')
@section('content')

    <div class="row page-titles">
                    <div class="col-md-5 col-8 align-self-center">
        <h3 class="text-themecolor">{{\App\Student::find($id)->gname}} {{\App\Student::find($id)->fname}} Test Grade</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                            <li class="breadcrumb-item active">grade</li>
                        </ol>
                    </div>
                    <div class="col-md-7 col-4 align-self-center">
                        <div class="d-flex m-t-10 justify-content-end">
                            <div class="d-flex m-r-20 m-l-10 hidden-md-down">
                                <div class="chart-text m-r-10">
                                    <h6 class="m-b-0"><small>THIS MONTH</small></h6>
                                    <h4 class="m-t-0 text-info">$58,356</h4></div>
                                <div class="spark-chart">
                                    <div id="monthchart"></div>
                                </div>
                            </div>
                            <div class="d-flex m-r-20 m-l-10 hidden-md-down">
                                <div class="chart-text m-r-10">
                                    <h6 class="m-b-0"><small>LAST MONTH</small></h6>
                                    <h4 class="m-t-0 text-primary">$48,356</h4></div>
                                <div class="spark-chart">
                                    <div id="lastmonthchart"></div>
                                </div>
                            </div>
                            <div class="">
                                <button class="right-side-toggle waves-effect waves-light btn-success btn btn-circle btn-sm pull-right m-l-10"><i class="ti-settings text-white"></i></button>
                            </div>
                        </div>
                    </div>
                </div>

                    <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">{{\App\Student::find($id)->gname}} {{\App\Student::find($id)->fname}} Test Grade List Export</h4>
                                <h6 class="card-subtitle">Export data to Copy, CSV, Excel, PDF & Print</h6>
                                <div class="table-responsive m-t-40">
        <table id="example23" class="display nowrap table  table-bordered" cellspacing="0" width="100%">
                                       <thead>
                                            <tr>
                                                <th>Subject</th>
                                                <th>Student</th>
                                                <th>Score</th>
                                                <th>Overall Score</th>
                                                <th>Term</th>
                                                <th>Session</th> 
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                               <th>Subject</th>
                                                <th>Student</th>
                                                <th>Score</th>
                                                <th>Overall Score</th>
                                                <th>Term</th>
                                                <th>Session</th> 
                                            </tr>
                                        </tfoot>
                                        <tbody>
            @foreach(\App\Testgrade::where('student_id',$id)->get() as $class)
                                            <tr>
<td>{{\App\Subject::find($class->subject)->title}}</td>
                <td>{{\App\Student::find($class->student_id)->gname}} {{\App\Student::find($class->student_id)->fname}} </td>
                                                <td>{{$class->score}}</td>
                                                <td>{{$class->over}}</td>
                                                 <td>{{$class->term}}</td>
                                                <td>{{$class->session}}</td>
                                            </tr>
                        @endforeach
                                        </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</div>          

@endsection