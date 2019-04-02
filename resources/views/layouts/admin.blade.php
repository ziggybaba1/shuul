<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

 @if(count(\App\Profile::where('user_table',\Auth::user()->id)->get())>0)
                                @if(\App\Profile::where('user_table',\Auth::user()->id)->first()->style=='1')
                          <html lang="en">       
                            @elseif(\App\Profile::where('user_table',\Auth::user()->id)->first()->style=='0')
                          <html lang="en">
         @elseif(\App\Profile::where('user_table',\Auth::user()->id)->first()->style=='2') 
                        <html lang="en">
                            @endif
                            @elseif(count(\App\Profile::where('user_table',\Auth::user()->id)->get())==0)
                            <html lang="en">
                                       @endif
                                        @if(App::isLocale('ar'))
                          <html lang="ar" dir="rtl">
                          @endif
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{url('')}}/uploads/avatars/{{\App\Provider::first()->logo}}">
    <title>{{\App\Provider::first()->name}}</title>
    <!-- Bootstrap Core CSS -->
    <link href="{{url('')}}/assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
     <link href="{{url('')}}/assets/plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css" rel="stylesheet">
     <link rel="stylesheet" href="{{url('')}}/assets/plugins/dropify/dist/css/dropify.min.css">
      <link rel="stylesheet" href="{{url('')}}/js/flipclock.css">
     <link rel="stylesheet" href="{{url('')}}/css/select2.css">
     <link href="{{url('')}}/assets/plugins/clockpicker/dist/jquery-clockpicker.min.css" rel="stylesheet">
      <link href="{{url('')}}/assets/plugins/bootstrap-datepicker/bootstrap-datepicker.min.css" rel="stylesheet">
     <!-- Popup CSS -->
    <link href="{{url('')}}/assets/plugins/Magnific-Popup-master/dist/magnific-popup.css" rel="stylesheet">
      <link href="{{url('')}}/assets/plugins/calendar/dist/fullcalendar.css" rel="stylesheet" />
      <link href="{{url('')}}/assets/plugins/select2/dist/css/select2.min.css" rel="stylesheet" type="text/css" />
    <link href="{{url('')}}/assets/plugins/switchery/dist/switchery.min.css" rel="stylesheet" />
      <link href="{{url('')}}/assets/plugins/wizard/steps.css" rel="stylesheet">
      <link href="{{url('')}}/assets/plugins/sweetalert/sweetalert.css" rel="stylesheet">
    <link href="{{url('')}}/assets/plugins/bootstrap-select/bootstrap-select.min.css" rel="stylesheet" />
   <link href="{{url('')}}/assets/plugins/multiselect/css/multi-select.css" rel="stylesheet" type="text/css" />
 <link href="{{url('')}}/assets/plugins/summernote/dist/summernote.css" rel="stylesheet" />
    <!-- chartist CSS -->
    <link href="{{url('')}}/assets/plugins/chartist-js/dist/chartist.min.css" rel="stylesheet">
    <link href="{{url('')}}/assets/plugins/chartist-js/dist/chartist-init.css" rel="stylesheet">
     <link rel="stylesheet" href="{{url('')}}/assets/print.css" type="text/css" media="print" />
    <link rel="stylesheet" href="{{url('')}}/assets/print-preview.css" type="text/css" media="screen">
    <link href="{{url('')}}/assets/plugins/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.css" rel="stylesheet">
    <link rel="stylesheet" href="{{url('')}}/build/css/intlTelInput.css">
    <!-- Cropper CSS -->
    <link href="{{url('')}}/assets/plugins/cropper/cropper.min.css" rel="stylesheet">
    <!--This page css - Morris CSS -->
    <link href="{{url('')}}/assets/plugins/c3-master/c3.min.css" rel="stylesheet">
    <!-- Custom CSS -->
 @if(count(\App\Profile::where('user_table',\Auth::user()->id)->get())>0)
                                @if(\App\Profile::where('user_table',\Auth::user()->id)->first()->style=='1')
                            <link href="{{url('')}}/css/style.css" rel="stylesheet">         
                            @elseif(\App\Profile::where('user_table',\Auth::user()->id)->first()->style=='0')
                           <link href="{{url('')}}/css/stylo.css" rel="stylesheet">

         @elseif(\App\Profile::where('user_table',\Auth::user()->id)->first()->style=='2') 
                          <link href="{{url('')}}/css/stylo.css" rel="stylesheet">
    <!-- You can change the theme colors from here -->
    <link href="{{url('')}}/css/colors/green-dark.css" id="theme" rel="stylesheet">
                            @endif
                            @elseif(count(\App\Profile::where('user_table',\Auth::user()->id)->get())==0)
                             <link href="{{url('')}}/css/style.css" rel="stylesheet">
                                       @endif
              @if(App::isLocale('ar'))
                           <link href="{{url('')}}/css/stylertl.css" rel="stylesheet">
                           <link href="{{url('')}}/css/colors/blue.css" id="theme" rel="stylesheet">
                           @endif
    
     <link href="{{url('')}}/assets/plugins/toast-master/css/jquery.toast.css" rel="stylesheet">
<link href="{{url('')}}/assets/plugins/dropzone-master/dist/dropzone.css" rel="stylesheet" type="text/css" />

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
<style type="text/css">

body{
        overflow-x: hidden;
    color: #2f3d4a;
    font-weight: 400;
}
.page-wrapper {
    background: #eee;
    padding-bottom: 60px;
    padding-top: 60px;
}
.sidebar-nav ul li a {
    color: #607d8b;
    padding: 8px 13px;
    display: block;
    font-size: 13px;
    white-space: nowrap;
}
</style>
</head>

<body class="fix-header fix-sidebar card-no-border logo-center">
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
            <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" /> </svg>
    </div>
<div id="main-wrapper">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <header class="topbar">
            <nav class="navbar top-navbar navbar-expand-md navbar-light">
                <!-- ============================================================== -->
                <!-- Logo -->
                <!-- ============================================================== -->
                <div class="navbar-header">
                    <a class="navbar-brand" href="index.html">
                        <!-- Logo icon --><b>
                            <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                            <!-- Dark Logo icon -->
                            <img width="50px" src="{{url('')}}/uploads/avatars/{{\App\Provider::first()->logo}}" alt="homepage" class="dark-logo" />
                            <!-- Light Logo icon -->
                           <h4 class="light-logo card-title"><br>{{\App\Provider::first()->name}}</h4>
                        </b>
                        <!--End Logo icon -->
                        <!-- Logo text --><span>
                         <!-- dark Logo text -->
                        
                       </span> </a>
                </div>
                <!-- ============================================================== -->
                <!-- End Logo -->
                <!-- ============================================================== -->
                <div class="navbar-collapse">
                    <!-- ============================================================== -->
                    <!-- toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav mr-auto mt-md-0">
                        <!-- This is  -->
                        <li class="nav-item"> <a class="nav-link nav-toggler hidden-md-up text-muted waves-effect waves-dark" href="javascript:void(0)"><i class="mdi mdi-menu"></i></a> </li>
                        <!-- ============================================================== -->
                        <!-- Search -->
                        <!-- ============================================================== -->
                        <li class="nav-item hidden-sm-down search-box"> <a class="nav-link hidden-sm-down text-muted waves-effect waves-dark" href="javascript:void(0)"></a>
            
                        </li>
                        <!-- ============================================================== -->
                        <!-- Messages -->
                        <!-- ============================================================== -->
                        <li class="nav-item dropdown mega-dropdown"> <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></a>
                            
                        </li>
                        <!-- ============================================================== -->
                        <!-- End Messages -->
                        <!-- ============================================================== -->
                    </ul>
                    <!-- ============================================================== -->
                    <!-- User profile and search -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav my-lg-0">
                        <!-- ============================================================== -->
                        <!-- Comment -->
                        <!-- ============================================================== -->
                        
                        <li class="nav-item dropdown">
                           <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                 @if(\App\Teacher::where('user_table',\Auth::user()->id)->first()->image=='')
                                  <img src="{{url('')}}/assets/images/user.png" alt="user" class="profile-pic" />
                                   @else
        <img src="{{url('')}}/uploads/avatars/{{\App\Teacher::where('user_table',\Auth::user()->id)->first()->image}}" alt="user" class="profile-pic" />
        @endif


    </a>
                            <div class="dropdown-menu dropdown-menu-right scale-up">
                                <ul class="dropdown-user">
                                    <li>
                                        <div class="dw-user-box">
                                            <div class="u-img">
                @if(\App\Teacher::where('user_table',\Auth::user()->id)->first()->image=='')
                                                <img src="{{url('')}}/assets/images/user.png" alt="user">
                @else
                 <img src="{{url('')}}/uploads/avatars/{{\App\Teacher::where('user_table',\Auth::user()->id)->first()->image}}" alt="user">
                @endif
                                            </div>
                                            <div class="u-text">
                                                <h4>{{\Auth::user()->name}}</h4>
        <p class="text-muted">{{\Auth::user()->email}}</p><a href="{{url('')}}/admin/page.fmp?page=54" class="btn btn-rounded btn-danger btn-sm">@lang('admin.view') @lang('admin.profile')</a></div>
                                        </div>
                                    </li>
                                    <li role="separator" class="divider"></li>
                                    <li><a href="{{url('')}}/logout"><i class="fa fa-power-off"></i> @lang('admin.logout')</a></li>
                                </ul>
                            </div>
                        </li>
                        <li class="nav-item dropdown">
                          <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark" href="" id="2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> 
                                <div class="notify"> <span class="heartbit"></span> <span class="point"></span> </div>
                            </a>  
                        </li>
                        <li class="nav-item dropdown">
                          <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark" href="" id="2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> 
                                <div class="notify"> <span class="heartbit"></span> <span class="point"></span> </div>
                            </a>  
                        </li>
                        <li class="nav-item dropdown">
                       <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark" href="" id="2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> 
                                <div class="notify"> <span class="heartbit"></span> <span class="point"></span> </div>
                            </a>
                        </li>
                        <!-- ============================================================== -->
                        <!-- End Comment -->
                        <!-- ============================================================== -->
                        <!-- ============================================================== -->
                        <!-- Messages -->
                        <!-- ============================================================== -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark" href="" id="2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            </a>
                           
                        </li>
                        <!-- ============================================================== -->
                        <!-- End Messages -->
                        <!-- ============================================================== -->
                        <!-- ============================================================== -->
                        <!-- Profile -->
                        <!-- ============================================================== -->
                        <li class="nav-item dropdown">
                            
                        </li>
                        <!-- ============================================================== -->
                        <!-- Language -->
                        <!-- ============================================================== -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></a>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
         @if(count(\App\Profile::where('user_table',\Auth::user()->id)->get())>0)
                                @if(\App\Profile::where('user_table',\Auth::user()->id)->first()->style=='1')
                         <aside class="left-sidebar">      
                            @elseif(\App\Profile::where('user_table',\Auth::user()->id)->first()->style=='0')
                          <aside class="left-sidebar" style="overflow-y: auto;">
                              @elseif(\App\Profile::where('user_table',\Auth::user()->id)->first()->style=='3')
                          <aside class="left-sidebar" style="overflow-y: auto;">
                              @elseif(\App\Profile::where('user_table',\Auth::user()->id)->first()->style=='2')
                          <aside class="left-sidebar" style="overflow-y: auto;">
                            @endif
                            @elseif(count(\App\Profile::where('user_table',\Auth::user()->id)->get())==0)
                           <aside class="left-sidebar"> 
                                       @endif
        
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <li class="nav-small-cap">@lang('admin.logged_in')</li>
                        <li>
    <a class="has-arrow" href="{{url('')}}/admin/page.fmp?page=1" aria-expanded="false"><i class="mdi mdi-gauge"></i><span class="hide-menu">@lang('admin.dashboard') </span></a>
                        </li>
                          <li>
        <a class="has-arrow" href="#" aria-expanded="false"><i class="mdi mdi-bullseye"></i>@lang('admin.academic')</a>
                                    <ul aria-expanded="false" class="collapse">
@if(\App\Role::where('staff_id',\Auth::user()->id)->first()->class=='1')
                        <li>
                            <a href="{{url('')}}/admin/page.fmp?page=3" >@lang('admin.class')</a>
                        </li>
@endif
   <li>
                        <a href="{{url('')}}/admin/page.fmp?page=8" >@lang('admin.routine')</a>
                                </li>
 @if(\App\Support::first()->res=='1')
 @if(\App\Role::where('staff_id',\Auth::user()->id)->first()->behave=='1'||\App\Role::where('staff_id',\Auth::user()->id)->first()->result_setting=='1')
<li>
        <a class="has-arrow" href="#" aria-expanded="false">@lang('admin.result')</a>
                                    <ul aria-expanded="false" class="collapse">
    @if(\App\Role::where('staff_id',\Auth::user()->id)->first()->behave=='1')
        <li><a href="{{url('')}}/admin/page.fmp?page=12">@lang('admin.behave_person')</a></li>
        @endif
        @if(\App\Role::where('staff_id',\Auth::user()->id)->first()->result_setting=='1')
                <li><a href="{{url('')}}/admin/page.fmp?page=13">@lang('admin.student') @lang('admin.result') @lang('admin.sheet')</a></li>

        <li><a href="{{url('')}}/admin/page.fmp?page=46">@lang('admin.result') @lang('admin.sheet') @lang('admin.setting')</a></li>        
        @endif
                                    </ul>
                                </li>
                                @endif
                                @endif
                                @if(\App\Support::first()->syl=='1')   
 @if(\App\Role::where('staff_id',\Auth::user()->id)->first()->syllabus=='1')
<li><a href="{{url('')}}/admin/page.fmp?page=55" >@lang('admin.syllabus')</a></li>
@endif
@endif
@if(\App\Support::first()->syl=='1')   
 @if(\App\Role::where('staff_id',\Auth::user()->id)->first()->lesson=='1')
<li><a href="{{url('')}}/admin/page.fmp?page=56" >@lang('admin.lesson_note')</a></li>
@endif
@endif
</ul>
</li>
@if(\App\Support::first()->etest=='1')
 <li>
        <a class="has-arrow" href="#" aria-expanded="false"><i class="mdi mdi-book"></i>@lang('admin.cbt')</a>
                                    <ul aria-expanded="false" class="collapse">
                <li><a href="{{url('')}}/admin/page.fmp?page=76">@lang('admin.take_test')</a></li>
                <li><a href="{{url('')}}/admin/page.fmp?page=77">@lang('admin.test') @lang('admin.history')</a></li> 
 @if(\App\Role::where('staff_id',\Auth::user()->id)->first()->batch=='1') 
                <li><a href="{{url('')}}/admin/page.fmp?page=14">@lang('admin.test') @lang('admin.branch')</a></li>
@endif
 @if(\App\Role::where('staff_id',\Auth::user()->id)->first()->result_col=='1')
                <li><a href="{{url('')}}/admin/page.fmp?page=15">@lang('admin.collate') @lang('admin.result')</a></li>
    @endif
     @if(\App\Role::where('staff_id',\Auth::user()->id)->first()->reset=='1')  
                <li><a href="{{url('')}}/admin/page.fmp?page=78" >@lang('admin.reset_test')</a></li>   
    @endif         
                                    </ul>
                                </li>
                                @endif
            <li>
        <a class="has-arrow" href="#" aria-expanded="false"><i class="mdi mdi-chart-bubble"></i><span class="hide-menu">@lang('admin.student')</span></a>
                            <ul aria-expanded="false" class="collapse">
                               
                                <li>
        <a class="has-arrow" href="#" aria-expanded="false">@lang('admin.student')</a>
                                    <ul aria-expanded="false" class="collapse">
          
 @if(\App\Role::where('staff_id',\Auth::user()->id)->first()->student=='1')
                <li><a href="{{url('')}}/admin/page.fmp?page=16">@lang('admin.admission')</a></li>
@endif
                <li><a href="{{url('')}}/admin/page.fmp?page=17">@lang('admin.student-info')</a></li>
                                    </ul>
                                </li>
                              <li>
        <a class="has-arrow" href="#" aria-expanded="false">@lang('admin.graduate')</a>
                                    <ul aria-expanded="false" class="collapse">
                 <li><a href="{{url('')}}/admin/page.fmp?page=20">@lang('admin.graduate') @lang('admin.record')</a></li>
     @if(\App\Role::where('staff_id',\Auth::user()->id)->first()->ybook=='1')
                <li><a href="{{url('')}}/admin/page.fmp?page=21">@lang('admin.year_book')</a></li>
        @endif
                                    </ul>
                                </li> 
                @if(\App\Support::first()->awa=='1')
         @if(\App\Role::where('staff_id',\Auth::user()->id)->first()->saward=='1')   
         <li><a href="{{url('')}}/admin/page.fmp?page=25">@lang('admin.student-award')</a></li>
         @endif
         @endif
 @if(\App\Support::first()->att=='1') 
          <li>
        <a class="has-arrow" href="#" aria-expanded="false"><span class="hide-menu">@lang('admin.attendance')</span></a>
                                    <ul aria-expanded="false" class="collapse">
           @if(\App\Role::where('staff_id',\Auth::user()->id)->first()->sattend=='1')    
                <li><a href="{{url('')}}/admin/page.fmp?page=18">@lang('admin.daily') @lang('admin.attendance')</a></li>
                @endif
                <li><a href="{{url('')}}/admin/page.fmp?page=47">@lang('admin.attendance') @lang('admin.overview')</a></li>
                                    </ul>
                                </li>
       @endif
                            </ul>
                        </li>
        
                       
        <li><a class="has-arrow" href="#" aria-expanded="false"><i class="fa fa-users"></i><span class="hide-menu">@lang('admin.source')</span></a>
 <ul aria-expanded="false" class="collapse">  
 @if(\App\Support::first()->pick=='1')  
     @if(\App\Role::where('staff_id',\Auth::user()->id)->first()->pickup=='1')
                <li><a href="{{url('')}}/admin/page.fmp?page=24">@lang('admin.daily') @lang('admin.student') @lang('admin.pickup')</a></li>
    @endif
                <li><a href="{{url('')}}/admin/page.fmp?page=48">@lang('admin.pickup') @lang('admin.overview')</a></li>
                @endif
                 <li><a href="{{url('')}}/admin/page.fmp?page=22">@lang('admin.parent')</a></li>
                <li><a href="{{url('')}}/admin/page.fmp?page=23">@lang('admin.guardian')</a></li>
              
                                    </ul>
        </li>
          
             <li>
                            <a class="has-arrow " href="#" aria-expanded="false"><i class="mdi mdi-table"></i><span class="hide-menu">@lang('admin.hospitalty')</span></a>
                            <ul aria-expanded="false" class="collapse">
                                 @if(\App\Support::first()->dorm=='1') 
                            <li><a class="has-arrow " href="#" aria-expanded="false"><span class="hide-menu">@lang('admin.dormitory')</span></a>
                                 <ul aria-expanded="false" class="collapse">
                         @if(\App\Role::where('staff_id',\Auth::user()->id)->first()->hostel=='1')
                                <li><a href="{{url('')}}/admin/page.fmp?page=71">@lang('admin.hostel') @lang('admin.list')</a></li>
                              <li><a href="{{url('')}}/admin/page.fmp?page=72">@lang('admin.room') @lang('admin.list')</a></li>
                              @endif
                <li><a href="{{url('')}}/admin/page.fmp?page=73">@lang('admin.bed') @lang('admin.list')</a></li>
                            </ul>
                            </li>
                            @endif
                            @if(\App\Support::first()->clin=='1')  
                            <li><a class="has-arrow " href="#" aria-expanded="false"><span class="hide-menu">@lang('admin.clinic_care')</span></a>
                                  <ul aria-expanded="false" class="collapse">
                                     @if(\App\Role::where('staff_id',\Auth::user()->id)->first()->report=='1')
                                <li><a href="{{url('')}}/admin/page.fmp?page=74">@lang('admin.health') @lang('admin.report')</a></li>
                                @endif
                              <li><a href="{{url('')}}/admin/page.fmp?page=75">@lang('admin.medical') @lang('admin.report') @lang('admin.history')</a></li>
               
                            </ul>
                            </li>
                           @endif
                            </ul>
                        </li>
             <li> <a class="has-arrow" href="#" aria-expanded="false"><i class="fa fa-book"></i><span class="hide-menu">@lang('admin.resource')</span></a>
                <ul aria-expanded="false" class="collapse">
              @if(\App\Support::first()->lib=='1') 
@if(\App\Role::where('staff_id',\Auth::user()->id)->first()->category=='1'||\App\Role::where('staff_id',\Auth::user()->id)->first()->inventory=='1'||\App\Role::where('staff_id',\Auth::user()->id)->first()->requestn=='1')   
                        <li>
                            <a class="has-arrow" href="#" aria-expanded="false"><span class="hide-menu">@lang('admin.library')</span></a>
                            <ul aria-expanded="false" class="collapse">
                 @if(\App\Role::where('staff_id',\Auth::user()->id)->first()->category=='1')
                                <li><a href="{{url('')}}/admin/page.fmp?page=49">@lang('admin.book') @lang('admin.category')</a></li>
                @endif
                 @if(\App\Role::where('staff_id',\Auth::user()->id)->first()->inventory=='1')
                              <li><a href="{{url('')}}/admin/page.fmp?page=26">@lang('admin.book') @lang('admin.inventory')</a></li>
                @endif
                 @if(\App\Role::where('staff_id',\Auth::user()->id)->first()->requestn=='1')
                <li><a href="{{url('')}}/admin/page.fmp?page=27">@lang('admin.book') @lang('admin.order')</a></li>
                @endif
                            </ul>
                        </li>
                        @endif
              @endif
               @if(\App\Support::first()->book=='1') 
 @if(\App\Role::where('staff_id',\Auth::user()->id)->first()->book=='1'||\App\Role::where('staff_id',\Auth::user()->id)->first()->order=='1')
                  <li>
                            <a class="has-arrow" href="#" aria-expanded="false"><span class="hide-menu">@lang('admin.book_store')</span></a>
                            <ul aria-expanded="false" class="collapse">
                                 @if(\App\Role::where('staff_id',\Auth::user()->id)->first()->book=='1')
                                <li><a href="{{url('')}}/admin/page.fmp?page=64">@lang('admin.student') @lang('admin.book')</a></li>
                                @endif
                                 @if(\App\Role::where('staff_id',\Auth::user()->id)->first()->order=='1')
                              <li><a href="{{url('')}}/admin/page.fmp?page=65">@lang('admin.book') @lang('admin.sale')</a></li>
                              @endif
                            </ul>
                        </li>
                        @endif
                        @endif
                        @if(\App\Support::first()->event=='1')
                         <li><a href="{{url('')}}/admin/page.fmp?page=43">@lang('admin.calendar')</a></li>
                                 <li>

                                     <li><a href="{{url('')}}/admin/page.fmp?page=42">@lang('admin.event')</a></li>
                                     @endif
                                     @if(\App\Support::first()->gall=='1') 
                              <li><a href="{{url('')}}/admin/page.fmp?page=45">@lang('admin.gallery')</a></li> 
                              @endif
                        
            </ul>
        </li>    
        @if(\App\Support::first()->hrm=='1') 
                       <li>
        <a class="has-arrow" href="#" aria-expanded="false"><i class="mdi mdi-book-open-variant"></i><span class="hide-menu">@lang('admin.hrm')</span></a>
                            <ul aria-expanded="false" class="collapse">
@if(\App\Role::where('staff_id',\Auth::user()->id)->first()->dept=='1'||\App\Role::where('staff_id',\Auth::user()->id)->first()->staff=='1')
                                <li>
        <a class="has-arrow" href="#" aria-expanded="false">@lang('admin.staff') @lang('admin.management')</a>
                                    <ul aria-expanded="false" class="collapse">
     @if(\App\Role::where('staff_id',\Auth::user()->id)->first()->dept=='1')
                <li><a href="{{url('')}}/admin/page.fmp?page=33">@lang('admin.dept')</a></li>
                @endif
                 @if(\App\Role::where('staff_id',\Auth::user()->id)->first()->staff=='1')
                <li><a href="{{url('')}}/admin/page.fmp?page=34">@lang('admin.staff')</a></li>
                @endif
                                    </ul>
                                </li>
                    @endif
                           <li>
                             @if(\App\Role::where('staff_id',\Auth::user()->id)->first()->stattend=='1')
        <a  href="{{url('')}}/admin/page.fmp?page=35" >@lang('admin.staff') @lang('admin.attendance')</a>
        @endif
        <a  href="{{url('')}}/admin/page.fmp?page=60" >@lang('admin.attendance') @lang('admin.overview')</a>
                                </li>
                              <li>
        <a href="{{url('')}}/admin/page.fmp?page=36" >@lang('admin.leave') @lang('admin.management')</a>
                                </li>
                                 @if(\App\Role::where('staff_id',\Auth::user()->id)->first()->staward=='1')
        <li><a href="{{url('')}}/admin/page.fmp?page=37">@lang('admin.staff_award')</a></li>
        @endif
        
                            </ul>
                        </li>
              @endif

                        <li>
                <a class="has-arrow " href="#" aria-expanded="false"><i class="mdi mdi-widgets"></i><span class="hide-menu">@lang('admin.account')</span></a>
                            <ul aria-expanded="false" class="collapse">
                          @if(\App\Role::where('staff_id',\Auth::user()->id)->first()->expense=='1')
                                <li><a href="{{url('')}}/admin/page.fmp?page=57">@lang('admin.expense')</a></li>
                            @endif
                              @if(\App\Role::where('staff_id',\Auth::user()->id)->first()->title=='1')
                                <li><a href="{{url('')}}/admin/page.fmp?page=38">@lang('admin.add') @lang('admin.account') @lang('admin.title')</a></li>
                            @endif
                              @if(\App\Role::where('staff_id',\Auth::user()->id)->first()->pay=='1')
                                <li><a href="{{url('')}}/admin/page.fmp?page=40">@lang('admin.school') @lang('admin.fee') @lang('admin.payment')</a></li>
                                <li><a href="{{url('')}}/admin/page.fmp?page=79">@lang('admin.book') @lang('admin.payment')</a></li>
                            @endif
                            @if(\App\Support::first()->ybook=='1') 
                              @if(\App\Role::where('staff_id',\Auth::user()->id)->first()->pay=='1')
                                <li><a href="{{url('')}}/admin/page.fmp?page=80">@lang('admin.year_book') @lang('admin.payment')</a></li>
                                @endif
                                @endif
                        <li><a href="{{url('')}}/admin/page.fmp?page=41">@lang('admin.payroll')</a></li>
                             
                            </ul>
                        </li>
          
        <li>
        <a class="has-arrow" href="#" aria-expanded="false"><i class="mdi mdi-message"></i><span class="hide-menu">@lang('admin.messaging')</span></a>
                            <ul aria-expanded="false" class="collapse">
                           <li>
        <a  href="{{url('')}}/admin/page.fmp?page=66" >@lang('admin.mailbox')</a></li>
        @if(\App\Support::first()->ann=='1') 
          @if(\App\Role::where('staff_id',\Auth::user()->id)->first()->announce=='1')
       <li> <a  href="{{url('')}}/admin/page.fmp?page=67" >@lang('admin.announce')</a>
                                </li>
                                @endif
                                @endif
                                 <li>
                <a class="has-arrow " href="#" aria-expanded="false"><span class="hide-menu">@lang('admin.forum')</span></a>
                            <ul aria-expanded="false" class="collapse">
                                 @if(\App\Support::first()->forum=='1') 
                      @if(\App\Role::where('staff_id',\Auth::user()->id)->first()->forum=='1')
                                <li><a href="{{url('')}}/admin/page.fmp?page=70">@lang('admin.forum')</a></li>
                    @endif
                                <li><a href="{{url('')}}/admin/page.fmp?page=62">@lang('admin.topic')</a></li>
                      @if(\App\Role::where('staff_id',\Auth::user()->id)->first()->topic=='1')
                                 <li><a href="{{url('')}}/admin/page.fmp?page=63">@lang('admin.reply')</a></li>
                                 @endif
                                 @endif
                            </ul>
                        </li>
                      @if(\App\Role::where('staff_id',\Auth::user()->id)->first()->contact=='1')
                                 <li> <a  href="{{url('')}}/admin/page.fmp?page=69" >@lang('admin.contact')</a>
                                </li>
                            @endif
                            </ul>
                        </li> 
@if(\App\Role::where('staff_id',\Auth::user()->id)->first()->front=='1'||\App\Role::where('staff_id',\Auth::user()->id)->first()->notice=='1'||\App\Role::where('staff_id',\Auth::user()->id)->first()->sfee=='1'||\App\Role::where('staff_id',\Auth::user()->id)->first()->stsalary=='1'||\App\Role::where('staff_id',\Auth::user()->id)->first()->ginfo=='1'||\App\Role::where('staff_id',\Auth::user()->id)->first()->ginfo=='1')
                        <li>
                            <a class="has-arrow " href="#" aria-expanded="false"><i class="mdi mdi-arrange-send-backward"></i><span class="hide-menu">@lang('admin.setting')</span></a>
                            <ul aria-expanded="false" class="collapse">
                                @if(\App\Support::first()->front=='1') 
                  @if(\App\Role::where('staff_id',\Auth::user()->id)->first()->front=='1')
                                 <li>
                <a  href="{{url('')}}/admin/page.fmp?page=59">@lang('admin.frontend')</a>
                        </li>
                @endif
                @endif
                  @if(\App\Role::where('staff_id',\Auth::user()->id)->first()->notice=='1')
                                <li><a href="{{url('')}}/admin/page.fmp?page=58">@lang('admin.notice')</a></li>
               @endif
                 @if(\App\Role::where('staff_id',\Auth::user()->id)->first()->role=='1')
               <li>
            <a href="{{url('')}}/admin/page.fmp?page=50">@lang('admin.permission')</a>
                                </li>
                                @endif
@if(\App\Role::where('staff_id',\Auth::user()->id)->first()->sfee=='1'||\App\Role::where('staff_id',\Auth::user()->id)->first()->stsalary=='1'||\App\Role::where('staff_id',\Auth::user()->id)->first()->ginfo=='1')
                                 <li>
            <a class="has-arrow" href="#" aria-expanded="false">@lang('admin.account') @lang('admin.setting')</a>
                                    <ul aria-expanded="false" class="collapse">
                          @if(\App\Role::where('staff_id',\Auth::user()->id)->first()->sfee=='1')
                                        <li><a href="{{url('')}}/admin/page.fmp?page=81">@lang('admin.payment') @lang('admin.plan')</a></li>
                        <li><a href="{{url('')}}/admin/page.fmp?page=51">@lang('admin.set') @lang('admin.school') @lang('admin.fee')</a></li>
                        @endif
                          @if(\App\Role::where('staff_id',\Auth::user()->id)->first()->stsalary=='1')
                    <li><a href="{{url('')}}/admin/page.fmp?page=52">@lang('admin.set') @lang('admin.staff') @lang('admin.fee')</a></li>
                    @endif
                                    </ul>
                                </li>
                                @endif
                              @if(\App\Role::where('staff_id',\Auth::user()->id)->first()->ginfo=='1')
                                <li><a href="{{url('')}}/admin/page.fmp?page=53">@lang('admin.set') @lang('admin.general') @lang('admin.information')</a></li>
                                @endif
                                
                            </ul>
                        </li>
                      @endif
                    </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
           
    <div class="container-fluid">
          <div class="row page-titles">
              <div class="col-md-5 col-8 align-self-center">
               <a href="{{url('')}}/"><i class="fa fa-globe"></i> @lang('admin.website')</a> 
        </div>
        <div class="col-md-6 col-4 align-self-center">
             <div class="d-flex m-t-10 justify-content-end">
               <a target="_blank" href="{{url('')}}/logout"><i class="fa fa-power-off"></i> @lang('admin.logout')</a> 
            </div>
        </div>
        </div>
        @yield('content')
    </div>
   
            <!-- ============================================================== -->
            <!-- End footer -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
    </div>
    <div class="modal fade bs-example-modal-lg" id="modal_ajax" aria-hidden="true" style="display: none;">
        <div class="modal-dialog modal-lg">
            <div  class="come modal-content" style="height:auto; overflow:auto;">
                <div class="modal-header">
                    <h4 class="modal-title">{{\App\Provider::first()->name}}</h4>
                    <button id="first" type="button" class="hider btn btn-danger btn-sm" data-dismiss="modal">@lang('admin.close')</button>
                </div>
                
                <div class="modal-body"  style="height:500px;overflow:auto;"><div style="text-align:center;margin-top:200px;"><img src="{{url('')}}/assets/images/preloader.gif" style="height:25px;"></div></div>
                
                <div class="modal-footer">
                    <button type="button" class="hider btn btn-default" data-dismiss="modal">@lang('admin.close')</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade bs-example-modal-lg" id="modal_ajax1" aria-hidden="true" style="display: none;">
        <div class="modal-dialog modal-lg" style="max-width: 1200px;margin: 30px auto;">
            <div  class="come modal-content" style="height:auto; overflow:auto;">
                <div class="modal-header">
                    <h4 class="modal-title">{{\App\Provider::first()->name}}</h4>
                    <button id="first" type="button" class="hider btn btn-danger btn-sm" data-dismiss="modal">@lang('admin.close')</button>
                </div>
                
                <div class="modal-body"  style="height:500px;overflow:auto;"><div style="text-align:center;margin-top:200px;"><img src="{{url('')}}/assets/images/preloader.gif" style="height:25px;"></div></div>
                
                <div class="modal-footer">
                    <button type="button" class="hider btn btn-default" data-dismiss="modal">@lang('admin.close')</button>
                </div>
            </div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="{{url('')}}/assets/plugins/jquery/jquery.min.js"></script>
    <script src="{{url('')}}/js/flipclock.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="{{url('')}}/assets/plugins/bootstrap/js/popper.min.js"></script>
    <script src="{{url('')}}/assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="{{url('')}}/js/jquery.slimscroll.js"></script>
    <!--Wave Effects -->
    <script src="{{url('')}}/js/waves.js"></script>
     @if(count(\App\Profile::where('user_table',\Auth::user()->id)->get())>0)
                                @if(\App\Profile::where('user_table',\Auth::user()->id)->first()->style=='1')
                           <script src="{{url('')}}/js/dashboard1.js"></script>
    <script src="{{url('')}}/js/sidebarmenu.js"></script>        
                            @elseif(\App\Profile::where('user_table',\Auth::user()->id)->first()->style=='0')
                          <script src="{{url('')}}/js/dashboard1v.js"></script>
    <script src="{{url('')}}/js/sidebarmenuv.js"></script>
                             @elseif(\App\Profile::where('user_table',\Auth::user()->id)->first()->style=='3')
                           <script src="{{url('')}}/js/dashboard1rtl.js"></script>
    <script src="{{url('')}}/js/sidebarmenurtl.js"></script>
         @elseif(\App\Profile::where('user_table',\Auth::user()->id)->first()->style=='2') 
                         <script src="{{url('')}}/js/dashboard1dark.js"></script>
    <script src="{{url('')}}/js/sidebarmenudark.js"></script>
                            @endif
                            @elseif(count(\App\Profile::where('user_table',\Auth::user()->id)->get())==0)
                            <script src="{{url('')}}/js/dashboard1.js"></script>
    <script src="{{url('')}}/js/sidebarmenu.js"></script>
                                       @endif
    <!--Menu sidebar -->

    <!--stickey kit -->
    <script src="{{url('')}}/assets/plugins/sticky-kit-master/dist/sticky-kit.min.js"></script>
    <script src="{{url('')}}/assets/plugins/sparkline/jquery.sparkline.min.js"></script>
    <!--Custom JavaScript -->
    <script src="{{url('')}}/js/custom.min.js"></script>
    <script src="{{url('')}}/assets/plugins/datatables/jquery.dataTables.min.js"></script>
    <!-- start - This is for export functionality only -->
    <script src="https://cdn.datatables.net/buttons/1.2.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.flash.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
    <script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js"></script>
    <script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.print.min.js"></script>
    <script src="{{url('')}}/assets/plugins/tinymce/tinymce.min.js"></script>
    <!-- ============================================================== -->
    <!-- This page plugins -->
    <!-- ============================================================== -->
    <!-- chartist chart -->
    <script src="{{url('')}}/assets/plugins/date-paginator/moment.min.js"></script>
    <script src="{{url('')}}/assets/plugins/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
     <script src="{{url('')}}/assets/plugins/date-paginator/bootstrap-datepaginator.min.js"></script>
    <script src="{{url('')}}/assets/plugins/chartist-js/dist/chartist.min.js"></script>
    <script src="{{url('')}}/assets/plugins/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.min.js"></script>
    <!--c3 JavaScript -->
    <script src="{{url('')}}/assets/plugins/d3/d3.min.js"></script>
    <script src="{{url('')}}/assets/plugins/c3-master/c3.min.js"></script>
    <!-- Chart JS -->
    <script src="{{url('')}}/js/wris.js"></script>
    <script src="{{url('')}}/assets/plugins/dropify/dist/js/dropify.min.js"></script>
    <script src="{{url('')}}/build/js/intlTelInput.js"></script>
    <!-- ============================================================== -->
    <!-- Style switcher -->
    <!-- ============================================================== -->
    <script src="{{url('')}}/assets/plugins/styleswitcher/jQuery.style.switcher.js"></script>
    <!-- Plugin JavaScript -->
    <script src="{{url('')}}/assets/plugins/moment/moment.js"></script>
    <script src="{{url('')}}/assets/plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js"></script>
    <script src="{{url('')}}/assets/plugins/calendar/dist/fullcalendar.min.js"></script>
    <script src="{{url('')}}/assets/plugins/clockpicker/dist/jquery-clockpicker.min.js"></script>
    <script src="{{url('')}}/assets/plugins/select2/dist/js/select2.full.min.js" type="text/javascript"></script>
    <script src="{{url('')}}/assets/plugins/bootstrap-select/bootstrap-select.min.js" type="text/javascript"></script>
    <script src="{{url('')}}/assets/plugins/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js"></script>
    <script src="{{url('')}}/assets/plugins/summernote/dist/summernote.min.js"></script>
    <script type="text/javascript" src="{{url('')}}/assets/plugins/multiselect/js/jquery.multi-select.js"></script>
    <script src="{{url('')}}/assets/plugins/wizard/jquery.steps.min.js"></script>
    <script src="{{url('')}}/assets/plugins/wizard/jquery.validate.min.js"></script>
    <!-- Sweet-Alert  -->
    <script src="{{url('')}}/assets/plugins/sweetalert/sweetalert-dev.js"></script>
    <script src="{{url('')}}/assets/plugins/wizard/steps.js"></script>
    <script src="{{url('')}}/assets/printThis.js" type="text/javascript" charset="utf-8"></script>
     <!-- Magnific popup JavaScript -->
    <script src="{{url('')}}/assets/plugins/Magnific-Popup-master/dist/jquery.magnific-popup.min.js"></script>
    <script src="{{url('')}}/assets/plugins/Magnific-Popup-master/dist/jquery.magnific-popup-init.js"></script>
    <!-- Image cropper JavaScript -->
    <script src="{{url('')}}/assets/plugins/cropper/cropper.min.js"></script>
    <script src="{{url('')}}/assets/plugins/cropper/cropper-init.js"></script>
<script src="{{url('')}}/editor/mode/xml/xml.js"></script>
<script src="{{url('')}}/editor/addon/display/fullscreen.js"></script>
<script src="{{url('')}}/assets/plugins/dropzone-master/dist/dropzone.js"></script>
<script src="{{url('')}}/assets/plugins/toast-master/js/jquery.toast.js"></script>
<script src="{{url('')}}/dist/jspdf.min.js"></script>
    <script type="text/javascript">
        $('#example23').DataTable({
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    });
        $('#example24').DataTable({
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    });
        $(document).ready(function() {
    $('.customed').DataTable( {
        initComplete: function () {
            this.api().columns([1,2 , 5]).every( function () {
                var column = this;
                var select = $('<select class="form-control"><option value=""></option></select>')
                    .appendTo( $(column.footer()).empty() )
                    .on( 'change', function () {
                        var val = $.fn.dataTable.util.escapeRegex(
                            $(this).val()
                        );
 
                        column
                            .search( val ? '^'+val+'$' : '', true, false )
                            .draw();
                    } );
 
                column.data().unique().sort().each( function ( d, j ) {
                    select.append( '<option value="'+d+'">'+d+'</option>' )
                } );
            } );
        }
    } );
} );


        $('#mdate').bootstrapMaterialDatePicker({
        weekStart: 0,
        time: false
    });
        $('.mdate').bootstrapMaterialDatePicker({
        weekStart: 0,
        time: false
    });
        $('.mtime').bootstrapMaterialDatePicker({
      date: false,
                shortTime: false,
                format: 'HH:mm'
    });
        
    
         $(document).ready(function() {
            $('.escape').DataTable();
            $('.select2').select2();
        $('.dropify').dropify();
        $('.sems').DataTable();
         });
    </script>
 <script>
    jQuery(document).ready(function() {

        $('.mymce').summernote({
            
            minHeight: 200, // set minimum height of editor
            maxHeight: 500, // set maximum height of editor
            focus: false // set focus to editable area after initializing summernote
        });

        $('.inline-editor').summernote({
            airMode: true
        });

    });

    window.edit = function() {
            $(".click2edit").summernote()
        },
        window.save = function() {
            $(".click2edit").summernote('destroy');
        }
    </script>
       
    <script type="text/javascript">
 $(document).ready(function() {
    $("#classtatus").change(function(){
  var id = $(this).find("option:selected").attr("id");
   jQuery('#showtable').html('<div style="text-align:center;margin-top:200px;"><img src="{{url('')}}/assets/images/preloader.gif" style="height:50px;" /></div>');
   var searchvalue=$('#searchvalue').val();
   $.ajax({
    url: '{{url('')}}/get_student/class/'+searchvalue+'/'+id,
    success: function (data) {

        jQuery('#showtable').html(data);
      },
      error:function(data){
         alert(data);
      }
 });
});
    });
</script>

<script type="text/javascript">
 $(document).ready(function() {
    $("#choosetype").change(function(){
   var id = $(this).find("option:selected").attr("id");

  switch (id){
    case "all":
    $('#studentpage').hide();
      break;
       case "specific":
    $('#studentpage').show();
      break;
  }
        });
});
</script>
<script type="text/javascript">
    $(".formsubmit").submit(function(e) {
  var formDatan = new FormData(this);
   jQuery('#showresults').html('<div style="text-align:center;margin-top:200px;"><img src="{{url('')}}/assets/images/preloader.gif" style="height:50px;" /></div>');
    $form = $(this);
  $.ajax({
            url     : $form.attr('action'),
            type    : 'POST',
            data    : formDatan,
    success: function (data) {
        swal("@lang('admin.save_info')", "@lang('admin.continue-button')", "success");
        jQuery('#showresultshere').html(data);
        jQuery('#showresults').hide();
      },
      error:function(data){
         alert(data);
      },
       cache: false,
        contentType: false,
        processData: false
 });
   e.preventDefault();
});
</script>
<script type="text/javascript">
    $(".formsubmitinv").submit(function(e) {
  var formDatan = new FormData(this);
   jQuery('#showinvoice').html('<div style="text-align:center;margin-top:200px;"><img src="{{url('')}}/assets/images/preloader.gif" style="height:50px;" /></div>');
    $form = $(this);
  $.ajax({
            url     : $form.attr('action'),
            type    : 'POST',
            data    : formDatan,
    success: function (data) {
        jQuery('#showinvoice').html(data);
      },
      error:function(data){
         alert(data);
         jQuery('#showinvoice').hide();
      },
       cache: false,
        contentType: false,
        processData: false
 });
   e.preventDefault();
});
</script>
 <script type="text/javascript">
    $(".formsubmitted").submit(function(e) {
  var formDatan = new FormData(this);
   jQuery('#showresults').html('<div style="text-align:center;margin-top:200px;"><img src="{{url('')}}/assets/images/preloader.gif" style="height:50px;" /></div>');
    $form = $(this);
  $.ajax({
            url     : $form.attr('action'),
            type    : 'POST',
            data    : formDatan,
    success: function (data) {
       swal("@lang('admin.save_info')", "@lang('admin.continue-button')", "success");
        jQuery('#showresultsd').html(data);
        jQuery('#showresults').hide();
      },
      error:function(data){
         alert(data);
      },
       cache: false,
        contentType: false,
        processData: false
 });
   e.preventDefault();
});
</script>
<script type="text/javascript">
    $(".formsubmittin").submit(function(e) {
  var formDatan = new FormData(this);
   jQuery('#showresults').html('<div style="text-align:center;margin-top:200px;"><img src="{{url('')}}/assets/images/preloader.gif" style="height:50px;" /></div>');
    $form = $(this);
  $.ajax({
            url     : $form.attr('action'),
            type    : 'POST',
            data    : formDatan,
    success: function (data) {
        swal("@lang('admin.save_info')", "@lang('admin.continue-button')", "success");
        jQuery('#showcontent').html(data);
        jQuery('#showresults').hide();
      },
      error:function(data){
         alert(data);
      },
       cache: false,
        contentType: false,
        processData: false
 });
   e.preventDefault();
});
</script>
<script type="text/javascript">
$('#classdetail').change(function(){
    var countryID = $(this).val();    
    if(countryID){
        $.ajax({
           type:"GET",
           url:"{{url('/api/get_student')}}?class="+countryID,
           success:function(res){               
            if(res){
                $("#studentdetail").empty();
                $("#studentdetail").append('<option value="all">@lang("admin.all") @lang("admin.student")</option>');
                $.each(res,function(key,value){
$("#studentdetail").append('<option value="'+value['id']+'">'+value['user_id']+' '+value['gname']+' '+value['fname']+'</option>');
                });
           
            }else{
               $("#studentdetail").empty();
            }
           }
        });
    }else{
        $("#studentdetail").empty();
    }      
   });
</script>
<script type="text/javascript">
$('#testdetail').change(function(){
    var countryID = $(this).val();    
    if(countryID){
        $.ajax({
           type:"GET",
           url:"{{url('/api/get_batch')}}?batch="+countryID,
           success:function(res){               
            if(res){
                $("#testerdetail").empty();
                $("#testerdetail").append('<option value="">@lang('admin.select') @lang('admin.e_test') @lang('admin.batch')</option>');
                $.each(res,function(key,value){
$("#testerdetail").append('<option value="'+value['id']+'">Batch '+value['batch']+' '+value['date']+'</option>');
                });
           
            }else{
               $("#testerdetail").empty();
            }
           }
        });
    }else{
        $("#testerdetail").empty();
    }      
   });
</script>  
<script type="text/javascript">
  function showAjaxModal(url)
  {
    // SHOWING AJAX PRELOADER IMAGE
    jQuery('#modal_ajax .modal-body').html('<div style="text-align:center;margin-top:200px;"><img src="{{url('')}}/assets/images/preloader.gif" style="height:50px;" /></div>');
    
    // LOADING THE AJAX MODAL
    jQuery('#modal_ajax').modal('show', {backdrop: 'true'});
    
    // SHOW AJAX RESPONSE ON REQUEST SUCCESS
    $.ajax({
      url: url,
      success: function(response)
      {
        jQuery('#modal_ajax .modal-body').html(response);
      }
    });

  }
  </script>
  <script type="text/javascript">
  function showAjaxModal1(url)
  {
    // SHOWING AJAX PRELOADER IMAGE
    jQuery('#modal_ajax1 .modal-body').html('<div style="text-align:center;margin-top:200px;"><img src="{{url('')}}/assets/images/preloader.gif" style="height:50px;" /></div>');
    
    // LOADING THE AJAX MODAL
    jQuery('#modal_ajax1').modal('show', {backdrop: 'true'});
    
    // SHOW AJAX RESPONSE ON REQUEST SUCCESS
    $.ajax({
      url: url,
      success: function(response)
      {
        jQuery('#modal_ajax1 .modal-body').html(response);
      }
    });

  }
  </script>
   <script type="text/javascript">
    function printpage(){

$('#content-main').printThis({
  debug: false,
  importCSS: true,
  importStyle: false,
  printContainer: true,
  loadCSS: "",
  pageTitle: "",
  removeInline: false,
  printDelay: 333,
  header: null,
  footer: null,   
  formValues: true,
  base: false,
  canvas: false,
  doctypeString: '<!DOCTYPE html>',
  removeScripts: false,
  copyTagClasses: false   
});

    }
   </script>
   <script type="text/javascript">
    function printpagen(res,was){

$('#content-maino').printThis({
  debug: false,
  importCSS: true,
  importStyle: false,
  printContainer: true,
  loadCSS: "",
  pageTitle: "",
  removeInline: false,
  printDelay: 333,
  header: "<h1>"+res+" "+was+"</h1>",
  footer: null,   
  formValues: true,
  base: false,
  canvas: false,
  doctypeString: '<!DOCTYPE html>',
  removeScripts: false,
  copyTagClasses: false   
});

    }
   </script>
   <script type="text/javascript">
    function printpago(content){

$('#'+content).printThis({
  debug: false,
  importCSS: true,
  importStyle: false,
  printContainer: true,
  loadCSS: "",
  pageTitle: "",
  removeInline: false,
  printDelay: 333,
  header: null,
  footer: null,   
  formValues: true,
  base: false,
  canvas: false,
  doctypeString: '<!DOCTYPE html>',
  removeScripts: false,
  copyTagClasses: false   
});

    }
    function cancelpage(){

    }
   </script> 
    <script>
  $(function () {

    /* initialize the external events
     -----------------------------------------------------------------*/
    function ini_events(ele) {
      ele.each(function () {

        // create an Event Object (http://arshaw.com/fullcalendar/docs/event_data/Event_Object/)
        // it doesn't need to have a start or end
        var eventObject = {
          title: $.trim($(this).text()) // use the element's text as the event title
        };

        // store the Event Object in the DOM element so we can get to it later
        $(this).data('eventObject', eventObject);

        // make the event draggable using jQuery UI
        $(this).draggable({
          zIndex: 1070,
          revert: true, // will cause the event to go back to its
          revertDuration: 0  //  original position after the drag
        });

      });
    }

    //ini_events($('#external-events div.external-event'));

    /* initialize the calendar
     -----------------------------------------------------------------*/
    //Date for the calendar events (dummy data)
    var date = new Date();
    var d = date.getDate(),
        m = date.getMonth(),
        y = date.getFullYear();
    $('#calendar').fullCalendar({
      header: {
        left: 'prev,next today',
        center: 'title',
        right: 'month,agendaWeek,agendaDay'
      },
      buttonText: {
        today: 'today',
        month: 'month',
        week: 'week',
        day: 'day'
      },
      //Random default events
      events: [
@foreach(\App\Event::where('edate','>=',\Carbon\Carbon::today()->format('Y-m-d'))->get() as $task)
                {
                    title : '{{ $task->title }}',
                    start : '{{ $task->sdate }}:{{ $task->stime }}',
                   color: '{{$task->color}}',
                    url : '{{url('')}}/show/event/detail/{{$task->id}}'
                },
                @endforeach
      ],
      editable: false,
      droppable: false, // this allows things to be dropped onto the calendar !!!
      eventClick: function (event) {
                showAjaxModal(event.url);
         return false;
      },
      drop: function (date, allDay) { // this function is called when something is dropped

        // retrieve the dropped element's stored Event Object
        var originalEventObject = $(this).data('eventObject');

        // we need to copy it, so that multiple events don't have a reference to the same object
        var copiedEventObject = $.extend({}, originalEventObject);

        // assign it the date that was reported
        copiedEventObject.start = date;
        copiedEventObject.allDay = allDay;
        copiedEventObject.backgroundColor = $(this).css("background-color");
        copiedEventObject.borderColor = $(this).css("border-color");

        // render the event on the calendar
        // the last `true` argument determines if the event "sticks" (http://arshaw.com/fullcalendar/docs/event_rendering/renderEvent/)
        $('#calendar').fullCalendar('renderEvent', copiedEventObject, true);

        // is the "remove after drop" checkbox checked?
        if ($('#drop-remove').is(':checked')) {
          // if so, remove the element from the "Draggable Events" list
          $(this).remove();
        }

      }
    });

    /* ADDING EVENTS */
    var currColor = "#fc8dbc"; //Red by default
    //Color chooser button
    var colorChooser = $("#color-chooser-btn");
    $("#color-chooser > li > a").click(function (e) {
      e.preventDefault();
      //Save color
      currColor = $(this).css("color");
      //Add color effect to button
      $('#add-new-event').css({"background-color": currColor, "border-color": currColor});
    });
    $("#add-new-event").click(function (e) {
      e.preventDefault();
      //Get value and make sure it is not null
      var val = $("#new-event").val();
      if (val.length == 0) {
        return;
      }

      //Create events
      var event = $("<div />");
      event.css({"background-color": currColor, "border-color": currColor, "color": "#fff"}).addClass("external-event");
      event.html(val);
      $('#external-events').prepend(event);

      //Add draggable funtionality
      ini_events(event);

      //Remove event from text input
      $("#new-event").val("");
    });
  });

</script>  

<script>
    var input = document.querySelector("#phone");
    errorMsg = document.querySelector("#error-msg"),
    validMsg = document.querySelector("#valid-msg");

// Error messages based on the code returned from getValidationError
var errorMap = [ "@lang('admin.inv_number')", "@lang('admin.inv_code')", "@lang('admin.too_short')", "@lang('admin.too_long')", "lang('admin.inv_number')"];
    var intl=window.intlTelInput(input, {
      // allowDropdown: false,
      // autoHideDialCode: false,
      // autoPlaceholder: "off",
      // dropdownContainer: document.body,
      // excludeCountries: ["us"],
      // formatOnDisplay: false,
      geoIpLookup: function(callback) {
       $.get("http://ipinfo.io", function() {}, "jsonp").always(function(resp) {
          var countryCode = (resp && resp.country) ? resp.country : "";
          callback(countryCode);
       });
       },
      // hiddenInput: "full_number",
      // initialCountry: "auto",
      // localizedCountries: { 'de': 'Deutschland' },
       nationalMode: false,
      // onlyCountries: ['us', 'gb', 'ch', 'ca', 'do'],
       placeholderNumberType: "MOBILE",
      // preferredCountries: ['cn', 'jp'],
       separateDialCode: true,
      utilsScript: "{{url('')}}/build/js/utils.js",
    });
var reset = function() {
    input.classList.remove("error");
    errorMsg.innerHTML = "";
    errorMsg.classList.add("hide");
    validMsg.classList.add("hide");
}
input.addEventListener('blur', function() {
    reset();
    if(input.value.trim()){
        if(intl.isValidNumber()){
            validMsg.classList.remove("hide");
             var number = intl.getNumber(intlTelInputUtils.numberFormat.E164);
             $('#phone').val(number);
        }else{
            input.classList.add("error");
            var errorCode = intl.getValidationError();
            errorMsg.innerHTML = errorMap[errorCode];
            errorMsg.classList.remove("hide");
        }
    }
});
  </script>
  
</body> 

</html>