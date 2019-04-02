<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{url('')}}/assets/images/favicon.png">
    <title></title>
    <!-- Bootstrap Core CSS -->
    <link href="{{url('')}}/assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
     <link href="{{url('')}}/assets/plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css" rel="stylesheet">
     <link rel="stylesheet" href="{{url('')}}/assets/plugins/dropify/dist/css/dropify.min.css">
     <link rel="stylesheet" href="{{url('')}}/css/select2.css">
     <link href="{{url('')}}/assets/plugins/clockpicker/dist/jquery-clockpicker.min.css" rel="stylesheet">
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
    <!--This page css - Morris CSS -->
    <link href="{{url('')}}/assets/plugins/c3-master/c3.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="{{url('')}}/css/style.css" rel="stylesheet">
    <!-- You can change the theme colors from here -->
    <link href="{{url('')}}/css/colors/blue.css" id="theme" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
<style type="text/css">
    
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
                            <img src="{{url('')}}/assets/images/logo-icon.png" alt="homepage" class="dark-logo" />
                            <!-- Light Logo icon -->
                            <img src="{{url('')}}/assets/images/logo-light-icon.png" alt="homepage" class="light-logo" />
                        </b>
                        <!--End Logo icon -->
                        <!-- Logo text --><span>
                         <!-- dark Logo text -->
                         <img src="{{url('')}}/assets/images/logo-text.png" alt="homepage" class="dark-logo" />
                         <!-- Light Logo text -->    
                         <img src="{{url('')}}/assets/images/logo-light-text.png" class="light-logo" alt="homepage" /></span> </a>
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
                        <li class="nav-item hidden-sm-down search-box"> <a class="nav-link hidden-sm-down text-muted waves-effect waves-dark" href="javascript:void(0)"><i class="ti-search"></i></a>
                            <form class="app-search">
                                <input type="text" class="form-control" placeholder="Search & enter"> <a class="srh-btn"><i class="ti-close"></i></a> </form>
                        </li>
                        <!-- ============================================================== -->
                        <!-- Messages -->
                        <!-- ============================================================== -->
                        <li class="nav-item dropdown mega-dropdown"> <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="mdi mdi-view-grid"></i></a>
                            <div class="dropdown-menu scale-up-left">
                                <ul class="mega-dropdown-menu row">
                                    <li class="col-lg-3 col-xlg-2 m-b-30">
                                        <h4 class="m-b-20">CAROUSEL</h4>
                                        <!-- CAROUSEL -->
                                        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                                            <div class="carousel-inner" role="listbox">
                                                <div class="carousel-item active">
                                                    <div class="container"> <img class="d-block img-fluid" src="{{url('')}}/assets/images/big/img1.jpg" alt="First slide"></div>
                                                </div>
                                                <div class="carousel-item">
                                                    <div class="container"><img class="d-block img-fluid" src="{{url('')}}/assets/images/big/img2.jpg" alt="Second slide"></div>
                                                </div>
                                                <div class="carousel-item">
                                                    <div class="container"><img class="d-block img-fluid" src="{{url('')}}/assets/images/big/img3.jpg" alt="Third slide"></div>
                                                </div>
                                            </div>
                                            <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev"> <span class="carousel-control-prev-icon" aria-hidden="true"></span> <span class="sr-only">Previous</span> </a>
                                            <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next"> <span class="carousel-control-next-icon" aria-hidden="true"></span> <span class="sr-only">Next</span> </a>
                                        </div>
                                        <!-- End CAROUSEL -->
                                    </li>
                                    <li class="col-lg-3 m-b-30">
                                        <h4 class="m-b-20">ACCORDION</h4>
                                        <!-- Accordian -->
                                        <div id="accordion" class="nav-accordion" role="tablist" aria-multiselectable="true">
                                            <div class="card">
                                                <div class="card-header" role="tab" id="headingOne">
                                                    <h5 class="mb-0">
                                                <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                  Collapsible Group Item #1
                                                </a>
                                              </h5> </div>
                                                <div id="collapseOne" class="collapse show" role="tabpanel" aria-labelledby="headingOne">
                                                    <div class="card-body"> Anim pariatur cliche reprehenderit, enim eiusmod high. </div>
                                                </div>
                                            </div>
                                            <div class="card">
                                                <div class="card-header" role="tab" id="headingTwo">
                                                    <h5 class="mb-0">
                                                <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                                  Collapsible Group Item #2
                                                </a>
                                              </h5> </div>
                                                <div id="collapseTwo" class="collapse" role="tabpanel" aria-labelledby="headingTwo">
                                                    <div class="card-body"> Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. </div>
                                                </div>
                                            </div>
                                            <div class="card">
                                                <div class="card-header" role="tab" id="headingThree">
                                                    <h5 class="mb-0">
                                                <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                                  Collapsible Group Item #3
                                                </a>
                                              </h5> </div>
                                                <div id="collapseThree" class="collapse" role="tabpanel" aria-labelledby="headingThree">
                                                    <div class="card-body"> Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="col-lg-3  m-b-30">
                                        <h4 class="m-b-20">CONTACT US</h4>
                                        <!-- Contact -->
                                        <form>
                                            <div class="form-group">
                                                <input type="text" class="form-control" id="exampleInputname1" placeholder="Enter Name"> </div>
                                            <div class="form-group">
                                                <input type="email" class="form-control" placeholder="Enter email"> </div>
                                            <div class="form-group">
                                                <textarea class="form-control" id="exampleTextarea" rows="3" placeholder="Message"></textarea>
                                            </div>
                                            <button type="submit" class="btn btn-info">Submit</button>
                                        </form>
                                    </li>
                                    <li class="col-lg-3 col-xlg-4 m-b-30">
                                        <h4 class="m-b-20">List style</h4>
                                        <!-- List style -->
                                        <ul class="list-style-none">
                                            <li><a href="javascript:void(0)"><i class="fa fa-check text-success"></i> You can give link</a></li>
                                            <li><a href="javascript:void(0)"><i class="fa fa-check text-success"></i> Give link</a></li>
                                            <li><a href="javascript:void(0)"><i class="fa fa-check text-success"></i> Another Give link</a></li>
                                            <li><a href="javascript:void(0)"><i class="fa fa-check text-success"></i> Forth link</a></li>
                                            <li><a href="javascript:void(0)"><i class="fa fa-check text-success"></i> Another fifth link</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
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
                            <a class="nav-link dropdown-toggle text-muted text-muted waves-effect waves-dark" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="mdi mdi-message"></i>
                                <div class="notify"> <span class="heartbit"></span> <span class="point"></span> </div>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right mailbox scale-up">
                                <ul>
                                    <li>
                                        <div class="drop-title">Notifications</div>
                                    </li>
                                    <li>
                                        <div class="message-center">
                                            <!-- Message -->
                                            <a href="#">
                                                <div class="btn btn-danger btn-circle"><i class="fa fa-link"></i></div>
                                                <div class="mail-contnet">
                                                    <h5>Luanch Admin</h5> <span class="mail-desc">Just see the my new admin!</span> <span class="time">9:30 AM</span> </div>
                                            </a>
                                            <!-- Message -->
                                            <a href="#">
                                                <div class="btn btn-success btn-circle"><i class="ti-calendar"></i></div>
                                                <div class="mail-contnet">
                                                    <h5>Event today</h5> <span class="mail-desc">Just a reminder that you have event</span> <span class="time">9:10 AM</span> </div>
                                            </a>
                                            <!-- Message -->
                                            <a href="#">
                                                <div class="btn btn-info btn-circle"><i class="ti-settings"></i></div>
                                                <div class="mail-contnet">
                                                    <h5>Settings</h5> <span class="mail-desc">You can customize this template as you want</span> <span class="time">9:08 AM</span> </div>
                                            </a>
                                            <!-- Message -->
                                            <a href="#">
                                                <div class="btn btn-primary btn-circle"><i class="ti-user"></i></div>
                                                <div class="mail-contnet">
                                                    <h5>Pavan kumar</h5> <span class="mail-desc">Just see the my admin!</span> <span class="time">9:02 AM</span> </div>
                                            </a>
                                        </div>
                                    </li>
                                    <li>
                                        <a class="nav-link text-center" href="javascript:void(0);"> <strong>Check all notifications</strong> <i class="fa fa-angle-right"></i> </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <!-- ============================================================== -->
                        <!-- End Comment -->
                        <!-- ============================================================== -->
                        <!-- ============================================================== -->
                        <!-- Messages -->
                        <!-- ============================================================== -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark" href="" id="2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="mdi mdi-email"></i>
                                <div class="notify"> <span class="heartbit"></span> <span class="point"></span> </div>
                            </a>
                            <div class="dropdown-menu mailbox dropdown-menu-right scale-up" aria-labelledby="2">
                                <ul>
                                    <li>
                                        <div class="drop-title">You have 4 new messages</div>
                                    </li>
                                    <li>
                                        <div class="message-center">
                                            <!-- Message -->
                                            <a href="#">
                                                <div class="user-img"> <img src="{{url('')}}/assets/images/users/1.jpg" alt="user" class="img-circle"> <span class="profile-status online pull-right"></span> </div>
                                                <div class="mail-contnet">
                                                    <h5>Pavan kumar</h5> <span class="mail-desc">Just see the my admin!</span> <span class="time">9:30 AM</span> </div>
                                            </a>
                                            <!-- Message -->
                                            <a href="#">
                                                <div class="user-img"> <img src="{{url('')}}/assets/images/users/2.jpg" alt="user" class="img-circle"> <span class="profile-status busy pull-right"></span> </div>
                                                <div class="mail-contnet">
                                                    <h5>Sonu Nigam</h5> <span class="mail-desc">I've sung a song! See you at</span> <span class="time">9:10 AM</span> </div>
                                            </a>
                                            <!-- Message -->
                                            <a href="#">
                                                <div class="user-img"> <img src="{{url('')}}/assets/images/users/3.jpg" alt="user" class="img-circle"> <span class="profile-status away pull-right"></span> </div>
                                                <div class="mail-contnet">
                                                    <h5>Arijit Sinh</h5> <span class="mail-desc">I am a singer!</span> <span class="time">9:08 AM</span> </div>
                                            </a>
                                            <!-- Message -->
                                            <a href="#">
                                                <div class="user-img"> <img src="{{url('')}}/assets/images/users/4.jpg" alt="user" class="img-circle"> <span class="profile-status offline pull-right"></span> </div>
                                                <div class="mail-contnet">
                                                    <h5>Pavan kumar</h5> <span class="mail-desc">Just see the my admin!</span> <span class="time">9:02 AM</span> </div>
                                            </a>
                                        </div>
                                    </li>
                                    <li>
                                        <a class="nav-link text-center" href="javascript:void(0);"> <strong>See all e-Mails</strong> <i class="fa fa-angle-right"></i> </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <!-- ============================================================== -->
                        <!-- End Messages -->
                        <!-- ============================================================== -->
                        <!-- ============================================================== -->
                        <!-- Profile -->
                        <!-- ============================================================== -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="{{url('')}}/assets/images/users/1.jpg" alt="user" class="profile-pic" /></a>
                            <div class="dropdown-menu dropdown-menu-right scale-up">
                                <ul class="dropdown-user">
                                    <li>
                                        <div class="dw-user-box">
                                            <div class="u-img"><img src="{{url('')}}/assets/images/users/1.jpg" alt="user"></div>
                                            <div class="u-text">
                                                <h4>Steave Jobs</h4>
                                                <p class="text-muted">varun@gmail.com</p><a href="profile.html" class="btn btn-rounded btn-danger btn-sm">View Profile</a></div>
                                        </div>
                                    </li>
                                    <li role="separator" class="divider"></li>
                                    <li><a href="#"><i class="ti-user"></i> My Profile</a></li>
                                    <li><a href="#"><i class="ti-wallet"></i> My Balance</a></li>
                                    <li><a href="#"><i class="ti-email"></i> Inbox</a></li>
                                    <li role="separator" class="divider"></li>
                                    <li><a href="#"><i class="ti-settings"></i> Account Setting</a></li>
                                    <li role="separator" class="divider"></li>
                                    <li><a href="{{url('')}}/logout"><i class="fa fa-power-off"></i> Logout</a></li>
                                </ul>
                            </div>
                        </li>
                        <!-- ============================================================== -->
                        <!-- Language -->
                        <!-- ============================================================== -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="flag-icon flag-icon-us"></i></a>
                            <div class="dropdown-menu dropdown-menu-right scale-up"> <a class="dropdown-item" href="#"><i class="flag-icon flag-icon-in"></i> India</a> <a class="dropdown-item" href="#"><i class="flag-icon flag-icon-fr"></i> French</a> <a class="dropdown-item" href="#"><i class="flag-icon flag-icon-cn"></i> China</a> <a class="dropdown-item" href="#"><i class="flag-icon flag-icon-de"></i> Dutch</a> </div>
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
        <aside class="left-sidebar">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <li class="nav-small-cap">PERSONAL</li>
                        <li>
    <a class="has-arrow" href="{{url('')}}/home" aria-expanded="false"><i class="mdi mdi-gauge"></i><span class="hide-menu">Dashboard </span></a>
                        </li>
                        <li class="two-column">
                            <a class="has-arrow " href="#" aria-expanded="false"><i class="mdi mdi-bullseye"></i><span class="hide-menu">Class Academic</span></a>
                            <ul aria-expanded="false" class="collapse">
                               <li>
            <a class="has-arrow" href="#" aria-expanded="false">Test Grade</a>
                                    <ul aria-expanded="false" class="collapse">
                                <li><a href="{{url('')}}/staff/test-grade">Add Test Grade</a></li>
                        <li><a href="{{url('')}}/staff/class-testgrade">Test Inventory</a></li>
                                    </ul>
                                </li>
                                <li>
                        <a class="has-arrow" href="#" aria-expanded="false">Exam Grade</a>
                                    <ul aria-expanded="false" class="collapse">
                    <li><a href="{{url('')}}/staff/exam-grade">Add Exam Grade</a></li>
                                <li><a href="{{url('')}}/staff/class-examgrade">Test Grade Inventory</a></li>
                                    </ul>
                                </li>
                                <li>
                        <a class="has-arrow" href="#" aria-expanded="false">Assignment Grade</a>
                                    <ul aria-expanded="false" class="collapse">
            <li><a href="{{url('')}}/staff/assignment-grade">Add Assignment Grade</a></li>
        <li><a href="{{url('')}}/staff/class-assignmentgrade">Assignment Grade Inventory</a></li>
                                    </ul>
                                </li>
                             <li>
        <a class="has-arrow" href="#" aria-expanded="false">Results</a>
                                    <ul aria-expanded="false" class="collapse">
                 <li><a href="{{url('')}}/design/report-sheet">Edit Results</a></li>
                <li><a href="app-email.html">Print Current Results</a></li>
                <li><a href="app-email-detail.html">Class Performace</a></li>
                <li><a href="app-email-detail.html">Result sheet Overview</a></li>
                                    </ul>
                                </li>
                                <li>
        <a class="has-arrow" href="#" aria-expanded="false">E-Test</a>
                                    <ul aria-expanded="false" class="collapse">
    <li><a href="{{url('')}}/create/online-test">Create e-test</a></li>
                <li><a href="{{url('')}}/show/all-questions">Questions </a></li>
                <li><a href="{{url('')}}/asign/questions">Assign Question</a></li>
                <li><a href="{{url('')}}/list/e-test">Collate Results</a></li>              
                                    </ul>
                                </li>
                            </ul>
                        </li>
            <li>
        <a class="has-arrow" href="#" aria-expanded="false"><i class="mdi mdi-chart-bubble"></i><span class="hide-menu">Attendance</span></a>
                            <ul aria-expanded="false" class="collapse">
                           <li>
        <a class="has-arrow" href="#" aria-expanded="false">Attendance</a>
                                    <ul aria-expanded="false" class="collapse">
    <li><a href="{{url('')}}/daily/attendance">Daily Attendance</a></li>
    <li><a href="{{url('')}}/overview/attendance">Attendance Overview</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li>
        <a class="has-arrow" href="#" aria-expanded="false"><i class="mdi mdi-table"></i><span class="hide-menu">Subject Assigned</span></a>
                            <ul aria-expanded="false" class="collapse">
    <li><a href="{{url('')}}/grade/assign">Add Scores</a></li>
                                <li><a href="{{url('')}}/overview/scores">Scores Overview</a></li>
                            </ul>
                        </li>
                        <li>
                            <a class="has-arrow " href="#" aria-expanded="false"><i class="mdi mdi-calendar"></i><span class="hide-menu">Events & Calendar</span></a>
                            <ul aria-expanded="false" class="collapse">
                          <li><a href="starter-kit.html">Set Event</a></li>
                        <li><a href="pages-profile.html">Calendar</a></li>      
                            </ul>
                        </li>
                        <li>
                            <a class="has-arrow " href="#" aria-expanded="false"><i class="mdi mdi-arrange-send-backward"></i><span class="hide-menu">Settings</span></a>
                            <ul aria-expanded="false" class="collapse">
                                 <li>
            <a class="has-arrow" href="#" aria-expanded="false">Set User Role</a>
                                    <ul aria-expanded="false" class="collapse">
                                        <li><a href="#">Set User's Role</a></li>
                                        <li><a href="#">Set Group Role</a></li>
                                        <li><a href="#">Reset User's Role</a></li>
                                    </ul>
                                </li>
                                 <li>
            <a class="has-arrow" href="#" aria-expanded="false">Account Settings</a>
                                    <ul aria-expanded="false" class="collapse">
                                        <li><a href="#">Set Students fee</a></li>
                                        <li><a href="#">Set Employ's Salaries</a></li>
                                    </ul>
                                </li>
                                <li><a href="#">Set General Information</a></li>
                                <li><a href="#">Official Day Settings</a></li>
                            </ul>
                        </li>
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
        @yield('content')
        <div class="right-sidebar">
                    <div class="slimscrollright">
                        <div class="rpanel-title"> Service Panel <span><i class="ti-close right-side-toggle"></i></span> </div>
                        <div class="r-panel-body">
                            <ul id="themecolors" class="m-t-20">
                                <li><b>With Light sidebar</b></li>
                                <li><a href="javascript:void(0)" data-theme="default" class="default-theme">1</a></li>
                                <li><a href="javascript:void(0)" data-theme="green" class="green-theme">2</a></li>
                                <li><a href="javascript:void(0)" data-theme="red" class="red-theme">3</a></li>
                                <li><a href="javascript:void(0)" data-theme="blue" class="blue-theme working">4</a></li>
                                <li><a href="javascript:void(0)" data-theme="purple" class="purple-theme">5</a></li>
                                <li><a href="javascript:void(0)" data-theme="megna" class="megna-theme">6</a></li>
                                <li class="d-block m-t-30"><b>With Dark sidebar</b></li>
                                <li><a href="javascript:void(0)" data-theme="default-dark" class="default-dark-theme">7</a></li>
                                <li><a href="javascript:void(0)" data-theme="green-dark" class="green-dark-theme">8</a></li>
                                <li><a href="javascript:void(0)" data-theme="red-dark" class="red-dark-theme">9</a></li>
                                <li><a href="javascript:void(0)" data-theme="blue-dark" class="blue-dark-theme">10</a></li>
                                <li><a href="javascript:void(0)" data-theme="purple-dark" class="purple-dark-theme">11</a></li>
                                <li><a href="javascript:void(0)" data-theme="megna-dark" class="megna-dark-theme ">12</a></li>
                            </ul>
                            <ul class="m-t-20 chatonline">
                                <li><b>Chat option</b></li>
                                <li>
                                    <a href="javascript:void(0)"><img src="{{url('')}}/assets/images/users/1.jpg" alt="user-img" class="img-circle"> <span>Varun Dhavan <small class="text-success">online</small></span></a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)"><img src="{{url('')}}/assets/images/users/2.jpg" alt="user-img" class="img-circle"> <span>Genelia Deshmukh <small class="text-warning">Away</small></span></a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)"><img src="{{url('')}}/assets/images/users/3.jpg" alt="user-img" class="img-circle"> <span>Ritesh Deshmukh <small class="text-danger">Busy</small></span></a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)"><img src="{{url('')}}/assets/images/users/4.jpg" alt="user-img" class="img-circle"> <span>Arijit Sinh <small class="text-muted">Offline</small></span></a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)"><img src="{{url('')}}/assets/images/users/5.jpg" alt="user-img" class="img-circle"> <span>Govinda Star <small class="text-success">online</small></span></a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)"><img src="{{url('')}}/assets/images/users/6.jpg" alt="user-img" class="img-circle"> <span>John Abraham<small class="text-success">online</small></span></a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)"><img src="{{url('')}}/assets/images/users/7.jpg" alt="user-img" class="img-circle"> <span>Hritik Roshan<small class="text-success">online</small></span></a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)"><img src="{{url('')}}/assets/images/users/8.jpg" alt="user-img" class="img-circle"> <span>Pwandeep rajan <small class="text-success">online</small></span></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
    </div>
     <footer class="footer"> © 2017 Material Pro Admin by wrappixel.com </footer>
            <!-- ============================================================== -->
            <!-- End footer -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="{{url('')}}/assets/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="{{url('')}}/assets/plugins/bootstrap/js/popper.min.js"></script>
    <script src="{{url('')}}/assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="{{url('')}}/js/jquery.slimscroll.js"></script>
    <!--Wave Effects -->
    <script src="{{url('')}}/js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="{{url('')}}/js/sidebarmenu.js"></script>
    <!--stickey kit -->
    <script src="{{url('')}}/assets/plugins/sticky-kit-master/dist/sticky-kit.min.js"></script>
    <script src="{{url('')}}/assets/plugins/sparkline/jquery.sparkline.min.js"></script>
    <!--Custom JavaScript -->
    <script src="{{url('')}}/js/custom.min.js"></script>
    <script src="../assets/plugins/datatables/jquery.dataTables.min.js"></script>
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
    <script src="{{url('')}}/assets/plugins/chartist-js/dist/chartist.min.js"></script>
    <script src="{{url('')}}/assets/plugins/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.min.js"></script>
    <!--c3 JavaScript -->
    <script src="{{url('')}}/assets/plugins/d3/d3.min.js"></script>
    <script src="{{url('')}}/assets/plugins/c3-master/c3.min.js"></script>
    <!-- Chart JS -->
    <script src="{{url('')}}/js/dashboard1.js"></script>
    <script src="{{url('')}}/js/wris.js"></script>
    <script src="{{url('')}}/assets/plugins/dropify/dist/js/dropify.min.js"></script>
    <!-- ============================================================== -->
    <!-- Style switcher -->
    <!-- ============================================================== -->
    <script src="{{url('')}}/assets/plugins/styleswitcher/jQuery.style.switcher.js"></script>
    <!-- Plugin JavaScript -->
    <script src="{{url('')}}/assets/plugins/moment/moment.js"></script>
    <script src="{{url('')}}/assets/plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js"></script>
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
    <script type="text/javascript">
        $('#example23').DataTable({
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    });

        $('#mdate').bootstrapMaterialDatePicker({
        weekStart: 0,
        time: false
    });
    
         $(document).ready(function() {
            $('.select2').select2();
        $('.dropify').dropify();
         });
    </script>
 <script>
    jQuery(document).ready(function() {

        $('.mymce').summernote({
            height: 500, // set editor height
            width:1000,
            minHeight: null, // set minimum height of editor
            maxHeight: null, // set maximum height of editor
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
   jQuery('#showresultshere').html('<div style="text-align:center;margin-top:200px;"><img src="{{url('')}}/assets/images/preloader.gif" style="height:50px;" /></div>');
    $form = $(this);
  $.ajax({
            url     : $form.attr('action'),
            type    : 'POST',
            data    : formDatan,
    success: function (data) {
        swal("Information Saved!", "clicked the button to continue!", "success");
        jQuery('#showresultshere').html(data);
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
      $(document).ready(function() {
      $('#classdetail').change(function(){
    var countryID = $(this).val();    
    if(countryID){
        $.ajax({
           type:"GET",
 url:"{{url('/api/get_studentsub')}}?student="+countryID+"&class="+{{\App\Teacher::where('user_table',\Auth::user()->id)->first()->assign}},
           success:function(res){               
            if(res){
                $("#subjectdetail").empty();
                $("#subjectdetail").append('<option value="">Select Subject</option>');
                $.each(res,function(key,value){
$("#subjectdetail").append('<option value="'+value['id']+'">'+value['title']+'</option>');
                });
           
            }else{
               $("#subjectdetail").empty();
            }
           }
        });
    }else{
        $("#subjectdetail").empty();
    }      
   });
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
                $("#testerdetail").append('<option value="">Select E-test Batch</option>');
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
<script>
    window.onload = function () {
          editor = com.wiris.jsEditor.JsEditor.newInstance({
            'language': 'en','toolbar':'<toolbar ref="chemistry"/>', 'fontSize':'32px'
          });
           editor1 = com.wiris.jsEditor.JsEditor.newInstance({
            'language': 'en', 'toolbar':'<toolbar ref="chemistry"/>', 'fontSize':'32px'
          });
           editor2 = com.wiris.jsEditor.JsEditor.newInstance({
            'language': 'en', 'toolbar':'<toolbar ref="chemistry"/>', 'fontSize':'32px'
          });
           editor3 = com.wiris.jsEditor.JsEditor.newInstance({
            'language': 'en', 'toolbar':'<toolbar ref="chemistry"/>', 'fontSize':'32px'
          });
            editor4 = com.wiris.jsEditor.JsEditor.newInstance({
            'language': 'en', 'toolbar':'<toolbar ref="chemistry"/>', 'fontSize':'32px'
          });
          editor.insertInto(document.getElementById('editorContainer'));
          editor1.insertInto(document.getElementById('editorContainer1'));
          editor2.insertInto(document.getElementById('editorContainer2'));
          editor3.insertInto(document.getElementById('editorContainer3'));
          editor4.insertInto(document.getElementById('editorContainer4'));
          
        }
    </script>
    <script type="text/javascript">
     $(function () {
    setInterval(function(){
  document.getElementById('question').value = editor.getMathML();
  document.getElementById('opta').value = editor1.getMathML();
  document.getElementById('optb').value = editor2.getMathML();
  document.getElementById('optc').value = editor3.getMathML();
  document.getElementById('optd').value = editor4.getMathML();
}, 1000);
});
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
</body>

</html>
