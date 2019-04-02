@extends('layouts.admin')
@section('content')

    <div class="row page-titles">
                    <div class="col-md-5 col-8 align-self-center">
                        <h3 class="text-themecolor">Project Grade List</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{url('')}}/admin/page.fmp?page=1">Home</a></li>
                            <li class="breadcrumb-item active">project-grades</li>
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
                                 <div class="pull-right">
                                 <button onclick="showAjaxModal('{{url('')}}/add/project-grade')" class="btn btn-primary btn-bg">Add New Project Grade</button>
                             </div>
                                <div class="table-responsive m-t-40">
        <table id="example23" class="display nowrap table  table-bordered" cellspacing="0" width="100%">
                                       <thead>
                                            <tr>
                                                <th>Class Name</th>
                                                <th>Class Code</th>
                                                <th>Total Student</th>
                                                <th>View Project Grade</th>
                                               
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                 <th>Class Name</th>
                                                <th>Class Code</th>
                                                <th>Total Student</th>
                                                <th>View Project Grade</th>
                                               
                                            </tr>
                                        </tfoot>
                                        <tbody>
                        @foreach(\App\Course::all() as $class)
                                            <tr>
                                                <td>{{$class->title}}</td>
                                                <td>{{$class->code}}</td>
                    <td>{{count(\App\Student::where('class',$class->id)->get())}}</td>
<td><button onclick="showAjaxModal('{{url('')}}/check/class-assignmentgrade?class={{$class->id}}')"class="btn btn-primary btn-sm btn-block"><i class="fa fa-eye"></i></button></td>
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