 @extends('layouts.student')
@section('content')

                <!-- ============================================================== -->
                <!-- Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
               <div class="row page-titles">
                    <div class="col-md-5 col-8 align-self-center">
                        <h3 class="text-themecolor">Enrolled Course</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{url('')}}/admin/page.fmp?page=1">Home</a></li>
                            <li class="breadcrumb-item active">enrolled-course</li>
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
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="row">
                                    <div class="card-body p-t-0">
                                         <div class="table-responsive m-t-40">
       <table id="example23" class="display nowrap table table-hover table-striped table-bordered " cellspacing="0" width="100%">
                                       <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Title</th>
                                                <th>Category</th>
                                                <th>Instructor</th>
                                                <th>Number<br>of<br>Section</th>
                                                <th>Number<br>of<br>Lesson</th>
                                                <th>Progress</th>
                                                <th>Option</th> 
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                               <th>ID</th>
                                                <th>Title</th>
                                                <th>Category</th>
                                                <th>Instructor</th>
                                                <th>Number<br>of<br>Section</th>
                                                <th>Number<br>of<br>Lesson</th>
                                                <th>Progress</th>
                                                <th>Option</th>
                                            </tr>
                                        </tfoot>
                      <tbody>
                @foreach(\App\Work::where('status','1')->latest()->get() as $course)
                        <tr>
<td>{{$loop->iteration}}</td>
                      <td>{{$course->title}}</td>
                      <td>{{$course->category}}</td>
                      <td>{{$course->instructor}}</td>
                      <td>{{count(\App\Section::where('course_id',$course->id)->get())}}</td>
                       <td>{{count(\App\Lesson::where('course_id',$course->id)->get())}}</td>
                      <td>
                          <h5 class="m-t-30"><span class="pull-right">85%</span></h5>
                                        <div class="progress ">
                                            <div class="progress-bar bg-danger wow animated progress-animated" style="width: 40%; height:6px;" role="progressbar"> <span class="sr-only">40% Complete</span> </div>
                                        </div>
                      </td>
<td>
<a href="{{url('')}}/course/view/page.fmp?page={{$course->id}}" class="btn btn-primary">view</a>
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
</div>
@endsection