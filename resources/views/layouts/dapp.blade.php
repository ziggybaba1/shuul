<!DOCTYPE html>
 @if(App::isLocale('ar'))
                          <html lang="ar" dir="rtl">
@else
<html lang="en">
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
    <!-- Custom CSS -->
    <link href="{{url('')}}/css/style.css" rel="stylesheet">
    <!-- You can change the theme colors from here -->
    <link href="{{url('')}}/css/colors/blue.css" id="theme" rel="stylesheet">
 
</head>

<body>
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
            <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" /> </svg>
    </div>
@yield('content')
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
    <!-- ============================================================== -->
    <!-- Style switcher -->
    <!-- ============================================================== -->
    <script src="{{url('')}}/assets/plugins/styleswitcher/jQuery.style.switcher.js"></script>
</body>

</html>