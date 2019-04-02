@extends('layouts.admin')
@section('content')

    <div class="row page-titles">
                    <div class="col-md-5 col-8 align-self-center">
                        <h3 class="text-themecolor">E-test Question Head</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                            <li class="breadcrumb-item active">E-test</li>
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
                                <h4 class="card-title">E-Test Head Export</h4>
                                <h6 class="card-subtitle">Export data to Copy, CSV, Excel, PDF & Print</h6>
                                <div class="table-responsive m-t-40">
        <table id="example23" class="display nowrap table  table-bordered" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th>Subject</th>
                                                <th>Duration</th>
                                                <th>Batch</th>
                                                <th>Total Question</th>
                                                <th>Start Date</th>
                                                <th>Instruction</th>
                                                <th>Add Questions</th>
                                                <th>Edit</th>
                                               <th>Delete</th>
                                               
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                               <th>Subject</th>
                                                <th>Duration</th>
                                                <th>Batch</th>
                                                <th>Total Question</th>
                                                <th>Start Date</th>
                                                <th>Instruction</th>
                                                <th>Add Questions</th>
                                                <th>Edit</th>
                                               <th>Delete</th>
                                           
                                            </tr>
                                        </tfoot>
                      <tbody>
                @foreach(\App\Batch::all() as $batch)
                        <tr>
                        <td>{{\App\Subject::find($batch->subject)->title}}</td>
                        <td>{{$batch->duration}}</td>
                        <td>{{$batch->batch}}</td>
                    <td>{{count(\App\Question::where('batch_id',$batch->id)->get())}}</td>
                        <td>{{$batch->date}}</td>
                        <td>{{$batch->instruction}}</td>
    <td><a href="{{url('')}}/add/batch_questions?quiz={{$batch->id}}" class="btn btn-sm btn-block btn-primary"><i class="fa fa-plus"></i></a></td>
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

@endsection