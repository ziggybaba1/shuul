@extends('layouts.admin')
@section('content')

    <div class="row page-titles">
                    <div class="col-md-5 col-8 align-self-center">
                        <h3 class="text-themecolor">Assign Subject</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{url('')}}/admin/page.fmp?page=1">Home</a></li>
                            <li class="breadcrumb-item active">assign-subject</li>
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
    <div class="col-sm-2"></div>
                    <div class="col-sm-8">
                         @if (session('message'))
                 <div class="alert alert-info alert-rounded">{{ session('message') }}</div>
                    @endif
                    @if (session('error'))
                 <div class="alert alert-danger alert-rounded">{{ session('error') }}</div>
                    @endif
                        <div class="card card-body">
                            <h4 class="card-title">Subject Assign Form</h4>
                            <h6 class="card-subtitle">Assign Subject to Student or class</h6>
        <form action="{{url('')}}/assign/subject" method="post" class="form-horizontal m-t-40">
                                 {{ csrf_field() }} 
                             <div class="form-group">
                    <label for="example-email">Choose Class *<span class="help"></span></label>
                <select id="classdetail" name="class" class="form-control">
                    <option></option>
                    @foreach(\App\Course::all() as $type)
                    <option value="{{$type->id}}">{{$type->title}}</option>
                @endforeach
                </select>
                    </div>
                    <div class="form-group">
                                    <label for="example-email">Select Student *<span class="help"></span></label>
                <select id="studentdetail" name="student" class="form-control"> 
                </select>
                        </div>
                    <div class="form-group">
                    <label for="example-email">Assign Subject *<span class="help"></span></label>
                     <select name="subject" class="form-control select2">
                    @foreach(\App\Subject::all() as $type)
                    <option value="{{$type->id}}">{{$type->title}}</option>
                @endforeach
                </select>
                    </div>
                     <div class="form-group">
                    <label for="example-email">Assign Term *<span class="help"></span></label>
                     <select name="term" class="form-control">
                    <option value="First">First Term</option>
                     <option value="Second">Second Term</option>
                      <option value="Third">Third Term</option>
                     <option value="Fourth">Fourth Term</option>
                </select>
                    </div>
                    <div class="form-group">
                            <input type="submit" class="form-control btn btn-primary" value="Submit">
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-sm-2"></div>
                </div> 
  
@endsection