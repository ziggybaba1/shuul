@extends('layouts.admin')
@section('content')

    <div class="row page-titles">
                    <div class="col-md-5 col-8 align-self-center">
                        <h3 class="text-themecolor">Add Teacher</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                            <li class="breadcrumb-item active">create teacher</li>
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
                        <div class="card card-body">
                            <h4 class="card-title">New Teacher Forms</h4>
                            <h6 class="card-subtitle"> Add New Teacher</h6>
<form action="{{url('')}}/create_new/teacher" enctype="multipart/form-data" method="post" class="form-horizontal m-t-40">
                                 {{ csrf_field() }} 
    <div class="row">
                    <div class="col-sm-6">
                             <div class="form-group">
            <label for="example-email">Given Name *<span class="help"></span></label>
               <input name="gname" type="text" required id="example-email"  class="form-control" placeholder="Given Name">
                                </div>
                                  <div class="form-group">
            <label for="example-email">Middle Name *<span class="help"></span></label>
               <input name="mname" type="text" required id="example-email"  class="form-control" placeholder="Middle Name">
                                </div>
                                  <div class="form-group">
            <label for="example-email">Family Name *<span class="help"></span></label>
               <input name="fname" type="text" required id="example-email"  class="form-control" placeholder="Family Name">
                                </div>
                                  <div class="form-group">
            <label for="example-email">Father Name *<span class="help"></span></label>
               <input name="faname" type="text" required id="example-email"  class="form-control" placeholder="Father Name">
                                </div>
                                  <div class="form-group">
            <label for="example-email">Mother Name *<span class="help"></span></label>
               <input name="maname" type="text" required id="example-email"  class="form-control" placeholder="Mother Name">
                                </div>
                                <div class="form-group">
            <label for="example-email">Date of Birth *<span class="help"></span></label>
               <input name="dob" type="text" required id="mdate" placeholder="Date of Birth"  class="form-control" >
                                </div>
                                 <div class="form-group">
                                <h4 class="card-title">Sex *</h4>
                                <div class="demo-radio-button">
                        <input name="sex" value="M" type="radio" id="radio_1" checked />
                                    <label for="radio_1">Male</label>
                            <input name="sex" value="F" type="radio" id="radio_2" />
                                    <label for="radio_2">Female</label>
                                     <input name="sex" value="O" type="radio" id="radio_3" />
                                    <label for="radio_3">Other</label>
                                </div>
                            </div>
                                <div class="form-group">
            <label for="example-email">Present Address *<span class="help"></span></label>
               <textarea required name="praddress" placeholder="Present Address" class="form-control"></textarea>
                                </div>
                                <div class="form-group">
            <label for="example-email">Permanent Address *<span class="help"></span></label>
               <textarea required name="peaddress" placeholder="Permanent Address" class="form-control"></textarea>
                                </div>
                            </div>
                    <div class="col-sm-6">
                    <div class="form-group">
                    <label for="example-email">Phone Number *<span class="help"></span></label>
                <input required name="mobile" type="text" id="example-email"  class="form-control" placeholder="Phone Number">
                                </div>
             <div class="form-group">
                    <label for="example-email">Username *<span class="help"></span></label>
                <input required name="username" type="text" id="example-email"  class="form-control" placeholder="Username">
                                </div>
                                 <div class="form-group">
                    <label for="example-email">Password *<span class="help"></span></label>
                <input required name="password" type="text" id="example-email"  class="form-control" placeholder="Password">
                                </div>
                                 <div class="form-group">
                    <label for="example-email">Post/Position *<span class="help"></span></label>
                <input required name="position" type="text" id="example-email"  class="form-control" placeholder="e.g Teacher, Head Master, Principal....">
                                </div>
                                 <div class="form-group">
                    <label for="example-email">Assign Class *<span class="help"></span></label>
               <select name="assign" class="form-control">
                   <option value="">Select Class</option>
                   @foreach(\App\Course::all() as $class)
                   <option value="{{$class->id}}">{{$class->title}}</option>
                   @endforeach
               </select>
                                </div>
                                <div class="form-group">
                    <label for="example-email">Assign Subjects *<span class="help"></span></label>
               <select name="subassign" multiple class="form-control select2">
                   <option value="">Select Class</option>
                   @foreach(\App\Subject::all() as $subject)
                   <option value="{{$subject->id}}">{{$subject->title}}</option>
                   @endforeach
               </select>
                                </div>
                                  <div class="form-group">
                    <label for="example-email">Working Hour *<span class="help"></span></label>
               <select name="work" class="form-control">
                   <option value="full">Full Time</option>
                   <option value="part">Part Time</option>
               </select>
                                </div>
                                <div class="form-group">
                        <label>Teacher Image<span class="help"></span></label>
            <input type="file" name="image" id="input-file-now-custom-1" class="dropify" data-default-file="" />
                                </div>
                               <div class="form-group">
                            <input type="submit" class="form-control btn btn-primary" value="Save Information">
                                </div>
                            </div>
                        </div>
                            </form>
                        </div>
                    </div>
                </div>            

@endsection