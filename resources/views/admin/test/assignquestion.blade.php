@extends('layouts.admin')
@section('content')

    <div class="row page-titles">
                    <div class="col-md-5 col-8 align-self-center">
                        <h3 class="text-themecolor">Assign e-test Questions</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{url('')}}/admin/page.fmp?page=1">Home</a></li>
                            <li class="breadcrumb-item active">e-test</li>
                        </ol>
                    </div>
                     <div class="col-md-6 col-4 align-self-center">
                        <div class="d-flex m-t-10 justify-content-end">
                              <h5 class="text-themecolor">Current Session: {{\App\Session::latest()->first()->session}} </h5><br>
                            <h5 class="text-themecolor">  ({{\App\Session::latest()->first()->terms}} Term)</h5>
                        </div>
                    </div>
                </div>
                <div id="showtable">
                    <div class="row">
                    <div class="col-12">
                       @if (session('message'))
                 <div class="alert alert-info alert-rounded">{{ session('message') }}</div>
                    @endif
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">E-Test Assign Export</h4>
                                <h6 class="card-subtitle">Export data to Copy, CSV, Excel, PDF & Print</h6>
                    <div class="pull-right">
                                 <button onclick="showAjaxModal('{{url('')}}/asign/test/question')" class="btn btn-primary btn-bg">Assign Questions</button>
                             </div>
                                <div class="table-responsive m-t-40">
        <table id="example23" class="display nowrap table  table-bordered" cellspacing="0" width="100%">
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
                </div>
          

@endsection