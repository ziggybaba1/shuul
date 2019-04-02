@extends('layouts.parent')
@section('content')
<div class="row page-titles">
                    <div class="col-md-5 col-8 align-self-center">
                        <h3 class="text-themecolor">@lang('parent.student-award')</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{url('')}}/parent/page.fmp?page=1">@lang('parent.home')</a></li>
                            <li class="breadcrumb-item active">@lang('parent.student-award')</li>
                        </ol>
                    </div>
                      <div class="col-md-6 col-4 align-self-center">
                        <div class="d-flex m-t-10 justify-content-end">
                              <h5 class="text-themecolor">@lang('admin.current-sess'): {{\App\Session::latest()->first()->session}} </h5><br>
                            <h5 class="text-themecolor"> (
                                @if(\App\Session::latest()->first()->terms==='First')
                                @lang('admin.first_term')
                                @elseif(\App\Session::latest()->first()->terms==='Second')
                                @lang('admin.second_term')
                                 @elseif(\App\Session::latest()->first()->terms==='Third')
                                @lang('admin.third_term')
                                 @elseif(\App\Session::latest()->first()->terms==='Fourth')
                                @lang('admin.fourth_term')
                             @endif
                             )
                         </h5>
                        </div>
                    </div>
                </div>
 <div class="row">
                    <div class="col-sm-12">
                        <div class="card card-body">
                            <h4 class="card-title">@lang('parent.student-info')</h4>
                            <h6 class="card-subtitle">@lang('parent.student-name')</h6>

    <div class="row">
         @if (session('message'))
                 <div class="alert alert-info alert-rounded">{{ session('message') }}</div>
                    @endif
       <div class="col-md-2"></div>
                    <div class="col-sm-8">
                             <div class="form-group">
            <label for="example-email">@lang('parent.student-select') *<span class="help"></span></label>
            <input type="hidden" id="searchvalue" value="5" name="">
            <select id="classtatus" class="form-control select2">
                <option></option>
                 @foreach(\App\Relation::where('parent_id',\App\Parenting::where('user_id',\Auth::user()->id)->first()->id)->get() as $student)
                            <option id="{{$student->student_id}}">{{\App\Student::findOrFail($student->student_id)->gname}} {{\App\Student::findOrFail($student->student_id)->fname}}</option>
                     @endforeach
            </select>
                                </div>
                              </div>
                               <div class="col-md-2"></div>
                        </div>
                        </div>
                    </div>
                </div>
                <div id="showtable"></div>
@endsection