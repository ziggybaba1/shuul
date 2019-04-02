@extends('layouts.staff')
@section('content')

    <div class="row page-titles">
                    <div class="col-md-5 col-8 align-self-center">
<h3 class="text-themecolor">Take Daily Attendance for {{\App\Course::find(\App\Teacher::where('user_table',\Auth::user()->id)->first()->assign)->title}}</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                            <li class="breadcrumb-item active">attendance</li>
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
                    <div class="col-sm-12">
                         @if (session('message'))
                 <div class="alert alert-info alert-rounded">{{ session('message') }}</div>
                    @endif
                      @if (session('error'))
                 <div class="alert alert-warning alert-rounded">{{ session('error') }}</div>
                    @endif
                        <div class="card card-body">
                            <h4 class="card-title">Daily Attendance</h4>
                            <h6 class="card-subtitle">Take Attendance</h6>
<form class="" action="{{url('')}}/add/attendance/create" method="post">
    @csrf
    <div class="row">
       <div  class="col-sm-4">
                             <div id="studentpage" class="form-group">
            <label for="example-email">Select Student * (1)<span class="help"></span></label>
    <select id="classdetail" required name="student" class="form-control select2">
      <option></option>
      @foreach(\App\Student::where('class',\App\Teacher::where('user_table',\Auth::user()->id)->first()->assign)->get() as $student)
      <option value="{{$student->id}}">{{$student->gname}} {{$student->fname}}</option>
      @endforeach
            </select>
                                </div>
                              </div>
                    <div class="col-sm-4">
                             <div class="form-group">
            <label for="example-email">Choose Date * (2)<span class="help"></span></label>
          <input type="date" id="mdate" value="{{\Carbon\Carbon::today()}}" class="form-control" name="date">
                                </div>
                              </div>
                              <div class="col-sm-4">
                             <div class="form-group">
  <label for="example-email">Choose Student Status<span class="help"></span></label>
          <select class="form-control" name="status">
            <option value="">Select Status</option>
            <option value="1">Present</option>
            <option value="0">Absent</option>
          </select>
                                </div>
                              </div>
             </div>
                         <div class="row">
                          <div class="col-sm-4">
                             <div class="form-group">
            <label for="example-email">Select Term * (3)<span class="help"></span></label>
            <select name="term" required class="form-control select2">
              <option value="">Select term</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
            </select>
                                </div>
                              </div>
                              <div class="col-sm-4">
                             <div class="form-group">
        <label for="example-email">Select Session * (4)<span class="help"></span></label>
            <select  name="session" required class="form-control select2">
  <option value="">Select Session</option>
  <option value="{{\Carbon\Carbon::today()->format('Y')}}/{{\Carbon\Carbon::today()->addYear(1)->format('Y')}}">{{\Carbon\Carbon::today()->format('Y')}}/{{\Carbon\Carbon::today()->addYear(1)->format('Y')}}</option>

<option value="{{\Carbon\Carbon::today()->addYear(-1)->format('Y')}}/{{\Carbon\Carbon::today()->format('Y')}}">{{\Carbon\Carbon::today()->addYear(-1)->format('Y')}}/{{\Carbon\Carbon::today()->format('Y')}}</option>
              
            </select>
                                </div>
                              </div>
                              
                               <div class="col-sm-4">
                             <div class="form-group">
  <label for="example-email">Reason (Optional)<span class="help"></span></label>
         <textarea class="form-control" name="reason"></textarea>
                                </div>
                              </div>
             </div>
                          
             <div class="row">
         <div class="col-sm-3"></div>
                    <div class="col-sm-6">
                 <div class="form-group">
                <input type="submit" required class="form-control btn btn-primary" value="Add Attendance">
                    </div>  
                </div>
                        </div>
                        </form>
                        </div>
                    </div>
                </div>
       <script src="{{url('')}}/assets/plugins/jquery/jquery.min.js"></script>
    
@endsection