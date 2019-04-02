@extends('layouts.admin')
@section('content')

    <div class="row page-titles">
                    <div class="col-md-5 col-8 align-self-center">
                        <h3 class="text-themecolor">@lang('admin.add') @lang('admin.student')</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{url('')}}/admin/page.fmp?page=1">@lang('admin.home')</a></li>
                            <li class="breadcrumb-item active">@lang('admin.add') @lang('admin.student')</li>
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
                         @if (session('message'))
                 <div class="alert alert-info alert-rounded">{{ session('message') }}</div>
                    @endif
                        <div class="card card-body">
                            <h4 class="card-title">@lang('admin.new') @lang('admin.admission') @lang('admin.form')</h4>
                            <h6 class="card-subtitle"> @lang('admin.add') @lang('admin.new') @lang('admin.student')</h6>
<form action="{{url('')}}/create/student" enctype="multipart/form-data" method="post" class="form-horizontal m-t-40">
                                 {{ csrf_field() }} 
    <div class="row">
                    <div class="col-sm-6">
                             <div class="form-group">
            <label for="example-email">@lang('admin.gname') *<span class="help"></span></label>
               <input name="gname" type="text" required id="example-email"  class="form-control" placeholder="@lang('admin.gname')">
                                </div>
                                  <div class="form-group">
            <label for="example-email">@lang('admin.mname') *<span class="help"></span></label>
               <input name="mname" type="text" required id="example-email"  class="form-control" placeholder="@lang('admin.mname')">
                                </div>
                                  <div class="form-group">
            <label for="example-email">@lang('admin.fname') *<span class="help"></span></label>
               <input name="fname" type="text" required id="example-email"  class="form-control" placeholder="@lang('admin.fname')">
                                </div>
                                  <div class="form-group">
            <label for="example-email">@lang('admin.faname') *<span class="help"></span></label>
               <input name="faname" type="text" required id="example-email"  class="form-control" placeholder="@lang('admin.faname')">
                                </div>
                                  <div class="form-group">
            <label for="example-email">@lang('admin.maname') *<span class="help"></span></label>
               <input name="maname" type="text" required id="example-email"  class="form-control" placeholder="@lang('admin.maname')">
                                </div>
                                <div class="form-group">
            <label for="example-email">@lang('admin.dob') *<span class="help"></span></label>
               <input name="dob" type="text" required id="mdate" placeholder="@lang('admin.dob')"  class="form-control" >
                                </div>
                                 <div class="form-group">
                                <h4 class="card-title">@lang('admin.sex') *</h4>
                                <div class="demo-radio-button">
                        <input name="sex" value="M" type="radio" id="radio_1" checked />
                                    <label for="radio_1">@lang('admin.male')</label>
                            <input name="sex" value="F" type="radio" id="radio_2" />
                                    <label for="radio_2">@lang('admin.female')</label>
                                     <input name="sex" value="O" type="radio" id="radio_3" />
                                    <label for="radio_3">@lang('admin.other')</label>
                                </div>
                            </div>
                                <div class="form-group">
            <label for="example-email">@lang('admin.pr_address') *<span class="help"></span></label>
               <textarea required name="praddress" placeholder="@lang('admin.pr_address')" class="form-control"></textarea>
                                </div>
                                <div class="form-group">
            <label for="example-email">@lang('admin.pe_address') *<span class="help"></span></label>
               <textarea required name="peaddress" placeholder="@lang('admin.pe_address')" class="form-control"></textarea>
                                </div>
                            </div>
                    <div class="col-sm-6">
                    <div class="form-group">
                    <label for="example-email">@lang('admin.phone') *<span class="help"></span></label>
                <input required name="mobile" type="text" id="example-email"  class="form-control" placeholder="@lang('admin.phone')">
                                </div>
                         <div class="form-group">
                <label>@lang('admin.blood_grp')<span class="help"></span></label>
                        <select required name="group" class="form-control">
                            <option>O+</option>
                            <option>O-</option>
                            <option>A+</option>
                            <option>A-</option>
                            <option>B+</option>
                            <option>B-</option>
                            <option>AB+</option>
                            <option>AB-</option>
                        </select>
                                </div>
                                 <div class="form-group">
                        <label>@lang('admin.father_occ')<span class="help"></span></label>
                    <input name="foccupation" type="text" id="example-email"  class="form-control" placeholder="@lang('admin.father_occ')">
                                </div>
                                <div class="form-group">
                        <label>@lang('admin.mother_occ')<span class="help"></span></label>
                    <input name="moccupation" type="text" id="example-email"  class="form-control" placeholder="@lang('admin.mother_occ')">
                                </div>
                                 <div class="form-group">
                                    <label>@lang('admin.select') @lang('admin.class')<span class="help"></span></label>
                        <select required name="class" class="form-control">
                            @foreach(\App\Course::all() as $class)
                            <option value="{{$class->id}}">{{$class->title}}</option>
                            @endforeach
                        </select>
                                </div>
                                <div class="form-group">
                        <label>@lang('admin.student') @lang('admin.image')<span class="help"></span></label>
            <input type="file" name="image" id="input-file-now-custom-1" class="dropify" data-default-file="" />
                                </div>
                               <div class="form-group">
                            <input type="submit" class="form-control btn btn-primary text-white" value="@lang('admin.submit')">
                                </div>
                            </div>
                        </div>
                            </form>
                        </div>
                    </div>
                </div>            

@endsection