@extends('layouts.student')
@section('content')

                <!-- ============================================================== -->
                <!-- Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
               <div class="row page-titles">
                    <div class="col-md-5 col-8 align-self-center">
                        <h3 class="text-themecolor">{{\Auth::user()->name}} @lang('admin.profile') @lang('admin.setting')</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{url('')}}/admin/page.fmp?page=1">@lang('admin.home')</a></li>
                            <li class="breadcrumb-item active">@lang('admin.profile') @lang('admin.setting')</li>
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
    <div class="col-sm-2"></div>
                    <div class="col-sm-8">
                         @if (session('message'))
                 <div class="alert alert-info alert-rounded">{{ session('message') }}</div>
                    @endif
                        <div class="card card-body">
                            <h4 class="card-title">@lang('admin.change') @lang('admin.profile')</h4>
                            <h6 class="card-subtitle"></h6>
                            <form action="{{url('')}}/create/student/profile" method="post" enctype="multipart/form-data" class="form-horizontal m-t-40">
                                 {{ csrf_field() }}
                                <div class="form-group">
                                    <label>@lang('admin.change') @lang('admin.username')</label>
                                    <input name="name" value="{{\Auth::user()->email}}" type="text" class="form-control" value="">
                                </div>
                                <div class="form-group">
                                    <label for="example-email">@lang('admin.change') @lang('admin.password')<span class="help"></span></label>
                                    <input type="password" id="example-email" name="password" class="form-control" >
                                </div>
                                <div class="form-group">
                                    <label>@lang('admin.change') @lang('admin.image')<span class="help"></span></label>
                                    <input name="image" type="file" class="form-control" value="">
                                </div>
                                <div class="form-group">
                                    <label>@lang('admin.select') @lang('admin.menu_lay')<span class="help"></span></label>
                                   <select class="form-control" name="style">
                            @if(count(\App\Profile::where('user_table',\Auth::user()->id)->get())>0)
                                @if(\App\Profile::where('user_table',\Auth::user()->id)->first()->style=='1')
                                       <option value="1">Horizontal</option>
                                       <option value="0">Vertical</option>
                                       <option value="2">Dark Vertical</option>
                                        <option value="3">Vertical RTL</option>
                            @elseif(\App\Profile::where('user_table',\Auth::user()->id)->first()->style=='0')
                            <option value="0">Vertical</option>
                            <option value="1">Horizontal</option>
                             <option value="2">Dark Vertical</option>
                              <option value="3">Vertical RTL</option>
                              @elseif(\App\Profile::where('user_table',\Auth::user()->id)->first()->style=='2')
                              <option value="2">Dark Vertical</option>
                            <option value="0">Vertical</option>
                            <option value="1">Horizontal</option>
                             <option value="3">Vertical RTL</option>
                               @elseif(\App\Profile::where('user_table',\Auth::user()->id)->first()->style=='3')
                                <option value="3">Vertical RTL</option>
                              <option value="2">Dark Vertical</option>
                            <option value="0">Vertical</option>
                            <option value="1">Horizontal</option>
                            @endif
                            @elseif(count(\App\Profile::where('user_table',\Auth::user()->id)->get())==0)
                              <option value="1">Horizontal</option>
                                       <option value="0">Vertical</option>
                                        <option value="2">Dark Vertical</option>
                                         <option value="3">Vertical RTL</option>
                                       @endif
                                   </select>
                                </div>
                               <div class="form-group">
                                    <input type="submit" class="form-control btn btn-primary" value="@lang('admin.submit')">
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-sm-2"></div>
                </div>            
                @endsection