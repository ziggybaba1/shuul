@extends('layouts.parent')
@section('content')

                <!-- ============================================================== -->
                <!-- Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
               <div class="row page-titles">
                    <div class="col-md-5 col-8 align-self-center">
                        <h3 class="text-themecolor">{{\Auth::user()->name}} @lang('parent.profile-setting')</h3>
                        <ol class="breadcrumb">
                          <li class="breadcrumb-item"><a href="{{url('')}}/parent/page.fmp?page=1">@lang('parent.home')</a></li>
                            <li class="breadcrumb-item active">@lang('parent.profile-setting')</li>
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
                            <h4 class="card-title">@lang('parent.profile-change')</h4>
                            <h6 class="card-subtitle"></h6>
                            <form action="{{url('')}}/create/student/profile" method="post" enctype="multipart/form-data" class="form-horizontal m-t-40">
                                 {{ csrf_field() }}
                                <div class="form-group">
                                    <label>@lang('parent.username')</label>
                                    <input name="name" value="{{\Auth::user()->email}}" type="text" class="form-control" value="">
                                </div>
                                <div class="form-group">
                                    <label for="example-email">@lang('parent.password')<span class="help"></span></label>
                                    <input type="password" id="example-email" name="password" class="form-control" >
                                </div>
                                <div class="form-group">
                                    <label>@lang('parent.profile-image')<span class="help"></span></label>
                                    <input name="image" type="file" class="form-control" value="">
                                </div>
                                   <div class="form-group">
                                    <label>@lang('parent.language')<span class="help"></span></label>
                                   <select required class="form-control" name="style">
                                    <option value="">Select Language</option>
                              @foreach(\App\Language::all() as $lang)
                                    <option value="{{$lang->id}}">{{$lang->name}}</option>
                                    @endforeach
                                   </select>
                                 </div>
                                <div class="form-group">
                                    <label>@lang('parent.menu-style')<span class="help"></span></label>
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
                                    <input type="submit" class="form-control btn btn-primary" value="@lang('parent.submit')">
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-sm-2"></div>
                </div>            
                @endsection