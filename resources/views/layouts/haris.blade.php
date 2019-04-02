@if(\App\Fronttheme::first()->theme=='1')
<!DOCTYPE html>
@if(App::isLocale('ar'))
                          <html lang="ar" dir="rtl">
            @elseif(App::isLocale('es'))
            <html lang="es">
                 @elseif(App::isLocale('fr'))
            <html lang="fr">
                 @elseif(App::isLocale('in'))
            <html lang="in">
                 @elseif(App::isLocale('nl-BE'))
            <html lang="nl">
                 @elseif(App::isLocale('th'))
            <html lang="th">
                 @elseif(App::isLocale('id'))
            <html lang="id">
                 @elseif(App::isLocale('pr'))
            <html lang="pt">
                  @elseif(App::isLocale('tr'))
            <html lang="tr">
                  @elseif(App::isLocale('en'))
            <html lang="en">
        @endif

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
  
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->

    <link rel="icon" type="image/png" sizes="16x16" href="{{url('')}}/uploads/avatars/{{\App\Provider::first()->logo}}">
    <title>{{\App\Provider::first()->name}}</title>
    <!-- Bootstrap Core CSS -->
   <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,500,700|Open+Sans" rel="stylesheet">

 <link rel="stylesheet" href="{{url('')}}/scss/icons/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{url('')}}/haris/css/styles-merged.css">
    <link rel="stylesheet" href="{{url('')}}/haris/css/style.min.css">
    <link rel="stylesheet" href="{{url('')}}/haris/css/custom.css">
     <link href="{{url('')}}/assets/plugins/toast-master/css/jquery.toast.css" rel="stylesheet">
      <link href="{{url('')}}/assets/plugins/sweetalert/sweetalert.css" rel="stylesheet">
<style type="text/css">
  .probootstrap-navbar .navbar-brand {
    background: url({{url('')}}/uploads/avatars/{{\App\Provider::first()->logo}}) left 100% no-repeat;
    background-size:cover;
    height:50px;
    width:50px;
}
</style>
<style type="text/css">
  {{\App\Fronttheme::first()->css}}
</style>
<script>
    (function(i, s, o, g, r, a, m) {
        i['GoogleAnalyticsObject'] = r;
        i[r] = i[r] || function() {
            (i[r].q = i[r].q || []).push(arguments)
        }, i[r].l = 1 * new Date();
        a = s.createElement(o), m = s.getElementsByTagName(o)[0];
        a.async = 1;
        a.src = g;
        m.parentNode.insertBefore(a, m)
    })(window, document, 'script', 'https://www.google-analytics.com/analytics.js', 'ga');
    ga('create', 'UA-85622565-1', 'auto');
    ga('send', 'pageview');
    </script>
</head>
<body>

    <div class="probootstrap-search" id="probootstrap-search">
      <a href="#" class="probootstrap-close js-probootstrap-close"><i class="icon-cross"></i></a>
      <form action="#">
        <input type="search" name="s" id="search" placeholder="Search a keyword and hit enter...">
      </form>
    </div>
    
    <div class="probootstrap-page-wrapper">
      <!-- Fixed navbar -->
      
      <div class="probootstrap-header-top">
        <div class="container">
          <div class="row">
            <div class="col-lg-9 col-md-9 col-sm-9 probootstrap-top-quick-contact-info">
              <span><i class="icon-location2"></i>{{\App\Frontfooter::first()->con_address}}</span>
              <span><i class="icon-phone2"></i>{{\App\Frontfooter::first()->con_phone}}</span>
              <span><i class="icon-mail"></i>{{\App\Frontfooter::first()->con_email}}</span>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-3 probootstrap-top-social">
              <ul>
               
                <li>
                  @if(\Auth::check())
                  <a href="{{url('')}}/admin/page.fmp?page=1"><i class="fa fa-user"></i> @lang('admin.hello') {{\Auth::user()->name}}</a>
                  @else
                  <a href="{{url('')}}/login"><i class="fa fa-user"></i>  @lang('admin.login')</a>
                  @endif

                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
      <nav class="navbar navbar-default probootstrap-navbar">
        <div class="container">
          <div class="navbar-header">
            <div class="btn-more js-btn-more visible-xs">
              <a href="#"><i class="icon-dots-three-vertical "></i></a>
            </div>
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false" aria-controls="navbar">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{url('')}}" title="">{{\App\Provider::first()->name}}</a>
          </div>

          <div id="navbar-collapse" class="navbar-collapse collapse">
            <ul class="nav navbar-nav navbar-right">
               <li class="nav-item"> <a class="nav-link" id="home" href="{{url('')}}">{{\App\Frontheader::first()->home}}</a> </li>
          @if(\App\Frontheader::first()->notice_id=='1')
               <li class="nav-item"> <a class="nav-link" id="notice" href="{{url('')}}/view/school/notice">{{\App\Frontheader::first()->notice}}</a> </li>
               @endif
        @if(\App\Frontheader::first()->event_id=='1')
                <li class="nav-item"> <a class="nav-link" id="events" href="{{url('')}}/view/school/event">{{\App\Frontheader::first()->event}}</a> </li>
        @endif
        @if(\App\Frontheader::first()->teacher_id=='1')
                 <li class="nav-item"> <a class="nav-link" id="teacher" href="{{url('')}}/view/school/teacher">{{\App\Frontheader::first()->teacher}}</a> </li>
        @endif
        @if(\App\Frontheader::first()->course_id=='1')
               <li class="nav-item"> <a class="nav-link" id="course" href="{{url('')}}/view/yearbook/sales">{{\App\Frontheader::first()->course}}</a> </li>
      @endif
      @if(\App\Frontheader::first()->gallery_id=='1')
                  <li class="nav-item"> <a class="nav-link" id="gallery" href="{{url('')}}/view/school/gallery">{{\App\Frontheader::first()->gallery}}</a> </li>
      @endif
                   <li class="nav-item"> <a class="nav-link" id="about" href="{{url('')}}/view/school/about_us">{{\App\Frontheader::first()->about}}</a> </li>
              @if(\App\Frontheader::first()->future_id=='1')
                            <li class="nav-item"> <a class="nav-link" id="admission" href="{{url('')}}/view/school/admission">{{\App\Frontheader::first()->future}}</a> </li>
              @endif
            </ul>
          </div>
        </div>
      </nav>
@if(\App\Support::first()->front=='1') {
 @yield('content')
 @endif
@if(\App\Frontfooter::first()->request_id=='1')
  <section class="probootstrap-cta">
        <div class="container">
          <div class="row">
            <div class="col-md-12">
              <h2 class="probootstrap-animate" data-animate-effect="fadeInRight">{{\App\Frontfooter::first()->req_sub}}</h2>
              <a href="{{url('')}}/view/school/contact" role="button" class="btn btn-primary btn-lg btn-ghost probootstrap-animate" data-animate-effect="fadeInLeft">{{\App\Frontfooter::first()->req_title}}</a>
            </div>
          </div>
        </div>
      </section>
@endif
      <footer class="probootstrap-footer probootstrap-bg">
        <div class="container">
          <div class="row">
            <div class="col-md-4">
              <div class="probootstrap-footer-widget">
               <h3>{{\App\Frontcategory::first()->head_tag}}</h3>
          <p>{{ str_limit(\App\Frontcategory::first()->head_describe, $limit = 100, $end = '...') }}</p>
                <h3>@lang('admin.social')</h3>
                <ul class="probootstrap-footer-social">
                  <li><a href="https://www.instagram.com/{{\App\Frontfooter::first()->social_twt}}"><i class="icon-twitter"></i></a></li>
                  <li><a href="https://facebook.com/profile.php?id={{\App\Frontfooter::first()->social_fb}}"><i class="icon-facebook"></i></a></li>
                  <li><a href="https://www.instagram.com/{{\App\Frontfooter::first()->social_gram}}/"><i class="icon-instagram2"></i></a></li>
                  <li><a href="{{\App\Frontfooter::first()->social_gg}}"><i class="icon-google-plus"></i></a></li>
                </ul>
              </div>
            </div>
            <div class="col-md-3 col-md-push-1">
              <div class="probootstrap-footer-widget">
                <h3>@lang('admin.url')</h3>
                <ul>
                  <li class="nav-item"> <a class="nav-link" id="home" href="{{url('')}}">{{\App\Frontheader::first()->home}}</a> </li>
          @if(\App\Frontheader::first()->notice_id=='1')
               <li class="nav-item"> <a class="nav-link" id="notice" href="{{url('')}}/view/school/notice">{{\App\Frontheader::first()->notice}}</a> </li>
               @endif
        @if(\App\Frontheader::first()->event_id=='1')
                <li class="nav-item"> <a class="nav-link" id="events" href="{{url('')}}/view/school/event">{{\App\Frontheader::first()->event}}</a> </li>
        @endif
        @if(\App\Frontheader::first()->teacher_id=='1')
                 <li class="nav-item"> <a class="nav-link" id="teacher" href="{{url('')}}/view/school/teacher">{{\App\Frontheader::first()->teacher}}</a> </li>
        @endif
        @if(\App\Frontheader::first()->course_id=='1')
               <li class="nav-item"> <a class="nav-link" id="course" href="{{url('')}}/view/yearbook/sales">{{\App\Frontheader::first()->course}}</a> </li>
      @endif
      @if(\App\Frontheader::first()->gallery_id=='1')
                  <li class="nav-item"> <a class="nav-link" id="gallery" href="{{url('')}}/view/school/gallery">{{\App\Frontheader::first()->gallery}}</a> </li>
      @endif
                   <li class="nav-item"> <a class="nav-link" id="about" href="{{url('')}}/view/school/about_us">{{\App\Frontheader::first()->about}}</a> </li>
              @if(\App\Frontheader::first()->future_id=='1')
                            <li class="nav-item"> <a class="nav-link" id="admission" href="{{url('')}}/view/school/admission">{{\App\Frontheader::first()->future}}</a> </li>
              @endif
                </ul>
              </div>
            </div>
            <div class="col-md-4">
              <div class="probootstrap-footer-widget">
                <h3>@lang('admin.contact') @lang('admin.information')</h3>
                <ul class="probootstrap-contact-info">
                  <li><i class="icon-location2"></i> <span>{{\App\Frontfooter::first()->con_address}}</span></li>
                  <li><i class="icon-mail"></i><span>{{\App\Frontfooter::first()->con_email}}</span></li>
                  <li><i class="icon-phone2"></i><span>{{\App\Frontfooter::first()->con_phone}}</span></li>
                </ul>
              </div>
            </div>
           
          </div>
          <!-- END row -->
          
        </div>

        <div class="probootstrap-copyright">
          <div class="container">
            <div class="row">
              <div class="col-md-8 text-left">
                <p>&copy; {{date("Y")}}  <a href="{{url('')}}">{{\App\Frontfooter::first()->copyright}}<i class="icon icon-heart"></i> by <a href="{{url('')}}">Schuul</a></p>
              </div>
              <div class="col-md-4 probootstrap-back-to-top">
                <p><a href="#" class="js-backtotop"><i class="icon-arrow-long-up"></i></a></p>
              </div>
            </div>
          </div>
        </div>
      </footer>
 </div>
 <div class="modal fade bs-example-modal-lg" id="modal_ajag" aria-hidden="true" style="display: none;">
        <div class="modal-dialog modal-lg">
            <div  class="come modal-content" style="height:auto; overflow:auto;">
                <div class="modal-header">
                    <h4 class="modal-title">Wepay @lang('admin.payment')</h4>
                    <button id="first" type="button" class="hider btn btn-danger btn-sm" data-dismiss="modal">@lang('admin.close')</button>
                </div>
                
                <div class="modal-body">
                  <div id="preapproval_div_id" class="container">
    
</div>
                </div>
                
                <div class="modal-footer">
                    <button type="button" class="hider btn btn-default" data-dismiss="modal">@lang('admin.close')</button>
                </div>
            </div>
        </div>
    </div>
<script src="{{url('')}}/haris/js/scripts.min.js"></script>
    <script src="{{url('')}}/haris/js/main.min.js"></script>
    <script src="{{url('')}}/haris/js/custom.js"></script>
     <script src="{{url('')}}/assets/printThis.js" type="text/javascript" charset="utf-8"></script>
     <script src="{{url('')}}/assets/plugins/toast-master/js/jquery.toast.js"></script>
       <script src="https://js.paystack.co/v1/inline.js"></script>
  <script src="https://checkout.stripe.com/checkout.js"></script>
   <script src="https://www.paypalobjects.com/api/checkout.js"></script>
<script type="text/javascript" src="https://www.wepay.com/js/iframe.wepay.js"></script>
 <script src="{{url('')}}/assets/plugins/sweetalert/sweetalert-dev.js"></script>
 <script type="text/javascript">
    $(".formsubmit").submit(function(e) {
  var formDatan = new FormData(this);
    $form = $(this);
    $('#submit').val('Sending......');
  $.ajax({
            url     : $form.attr('action'),
            type    : 'POST',
            data    : formDatan,
    success: function (data) {
       $(".form-control").val('');
      $.toast({heading: '@lang('admin.message')',text: '@lang('admin.sent_success')',position: 'top-right',loaderBg:'#ff6849',icon: 'success',hideAfter: 3500, stack: 6
          });
     $('#submit').val('@lang('admin.message_sent')');
      
      },
      error:function(data){
        $('#submit').val(' @lang('admin.message_failed')');
      },
       cache: false,
        contentType: false,
        processData: false
 });
   e.preventDefault();
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
   @if(\App\Support::first()->status=='1'&&\App\Support::first()->url!='')
   <script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='{{\App\Support::first()->url}}';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>
@endif
</body>

</html>
@elseif(\App\Fronttheme::first()->theme=='2')

<!DOCTYPE HTML>
@if(App::isLocale('ar'))
                          <html lang="ar" dir="rtl">
            @elseif(App::isLocale('es'))
            <html lang="es">
                 @elseif(App::isLocale('fr'))
            <html lang="fr">
                 @elseif(App::isLocale('in'))
            <html lang="in">
                 @elseif(App::isLocale('nl-BE'))
            <html lang="nl">
                 @elseif(App::isLocale('th'))
            <html lang="th">
                 @elseif(App::isLocale('id'))
            <html lang="id">
                 @elseif(App::isLocale('pr'))
            <html lang="pt">
                  @elseif(App::isLocale('tr'))
            <html lang="tr">
                  @elseif(App::isLocale('en'))
            <html lang="en">
        @endif
  <head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
 <link rel="icon" type="image/png" sizes="16x16" href="{{url('')}}/uploads/avatars/{{\App\Provider::first()->logo}}">
    <title>{{\App\Provider::first()->name}}</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="" />
  <meta name="keywords" content="" />
  <meta name="author" content="" />
  <meta property="og:title" content=""/>
  <meta property="og:image" content=""/>
  <meta property="og:url" content=""/>
  <meta property="og:site_name" content=""/>
  <meta property="og:description" content=""/>
  <meta name="twitter:title" content="" />
  <meta name="twitter:image" content="" />
  <meta name="twitter:url" content="" />
  <meta name="twitter:card" content="" />

  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:300,400" rel="stylesheet">
  

  <link rel="stylesheet" href="{{url('')}}/extra/css/animate.css">

  <link rel="stylesheet" href="{{url('')}}/extra/css/icomoon.css">
  
  <link rel="stylesheet" href="{{url('')}}/extra/css/bootstrap.css">

 
  <link rel="stylesheet" href="{{url('')}}/extra/css/magnific-popup.css">


  <link rel="stylesheet" href="{{url('')}}/extra/css/owl.carousel.min.css">
  <link rel="stylesheet" href="{{url('')}}/extra/css/owl.theme.default.min.css">


  <link rel="stylesheet" href="{{url('')}}/extra/css/flexslider.css">


  <link rel="stylesheet" href="{{url('')}}/extra/css/pricing.css">
  <link rel="stylesheet" href="{{url('')}}/extra/photoswipe.css">


  <link rel="stylesheet" href="{{url('')}}/extra/css/style.css">
 <link href="{{url('')}}/assets/plugins/toast-master/css/jquery.toast.css" rel="stylesheet">
      <link href="{{url('')}}/assets/plugins/sweetalert/sweetalert.css" rel="stylesheet">

<style type="text/css">
   .navbar-brand {
    background: url({{url('')}}/uploads/avatars/{{\App\Provider::first()->logo}}) left 100% no-repeat;
    background-size:cover;
    height:50px;
    width:50px;
}
.probootstrap-cta{
  padding: 30px;
}
</style>
<style type="text/css">
  {{\App\Fronttheme::first()->css}}
</style>
  </head>
  <body> 
  <div class="fh5co-loader"></div>
<div id="page">
  <nav class="fh5co-nav" role="navigation">
    <div class="top">
      <div class="container">
        <div class="row">
          <div class="col-xs-12 text-right">
            <p class="site" style="font-weight: bold;">{{\App\Provider::first()->name}}</p>
            <p class="num">Call: {{\App\Frontfooter::first()->con_phone}}</p>
            <ul class="fh5co-social">
               <li><a href="https://www.instagram.com/{{\App\Frontfooter::first()->social_twt}}"><i class="icon-social-twitter"></i></a></li>
                  <li><a href="https://facebook.com/profile.php?id={{\App\Frontfooter::first()->social_fb}}"><i class="icon-social-facebook"></i></a></li>
                  <li><a href="https://www.instagram.com/{{\App\Frontfooter::first()->social_gram}}/"><i class="icon-instagram"></i></a></li>
                  <li><a href="{{\App\Frontfooter::first()->social_gg}}"><i class="icon-google-plus"></i></a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
    <div class="top-menu">
      <div class="container">
        <div class="row">
          <div class="col-xs-2">
           <a class="navbar-brand" href="{{url('')}}" title=""></a>
          </div>
          <div class="col-xs-10 text-right menu-1">
            <ul>
             <li class="nav-item"> <a class="nav-link" id="home" href="{{url('')}}">{{\App\Frontheader::first()->home}}</a> </li>
          @if(\App\Frontheader::first()->notice_id=='1')
               <li class="nav-item"> <a class="nav-link" id="notice" href="{{url('')}}/view/school/notice">{{\App\Frontheader::first()->notice}}</a> </li>
               @endif
        @if(\App\Frontheader::first()->event_id=='1')
                <li class="nav-item"> <a class="nav-link" id="events" href="{{url('')}}/view/school/event">{{\App\Frontheader::first()->event}}</a> </li>
        @endif
        @if(\App\Frontheader::first()->teacher_id=='1')
                 <li class="nav-item"> <a class="nav-link" id="teacher" href="{{url('')}}/view/school/teacher">{{\App\Frontheader::first()->teacher}}</a> </li>
        @endif
        @if(\App\Frontheader::first()->course_id=='1')
               <li class="nav-item"> <a class="nav-link" id="course" href="{{url('')}}/view/yearbook/sales">{{\App\Frontheader::first()->course}}</a> </li>
      @endif
      @if(\App\Frontheader::first()->gallery_id=='1')
                  <li class="nav-item"> <a class="nav-link" id="gallery" href="{{url('')}}/view/school/gallery">{{\App\Frontheader::first()->gallery}}</a> </li>
      @endif
                   <li class="nav-item"> <a class="nav-link" id="about"  href="{{url('')}}/view/school/about_us">{{\App\Frontheader::first()->about}}</a> </li>
              @if(\App\Frontheader::first()->future_id=='1')
                            <li class="nav-item"> <a class="nav-link" id="admission" href="{{url('')}}/view/school/admission">{{\App\Frontheader::first()->future}}</a> </li>
              @endif
               <li class="btn-cta">
                  @if(\Auth::check())
                  <a href="{{url('')}}/admin/page.fmp?page=1"><i class="fa fa-user"></i><span> Welcome {{\Auth::user()->name}}</span></a>
                  @else
                  <a href="{{url('')}}/login"><i class="fa fa-user"></i> <span> Login</span></a>
                  @endif

                </li>
            </ul>
          </div>
        </div>
        
      </div>
    </div>
  </nav>
@yield('content')
<hr>
@if(\App\Frontfooter::first()->request_id=='1')
  <section class="probootstrap-cta">
        <div class="container">
          <div class="row">
            <div class="col-md-12">
              <h2 class="probootstrap-animate" data-animate-effect="fadeInRight">{{\App\Frontfooter::first()->req_sub}}</h2>
              <a href="{{url('')}}/view/school/contact" role="button" class="btn btn-primary btn-lg btn-ghost probootstrap-animate" data-animate-effect="fadeInLeft">{{\App\Frontfooter::first()->req_title}}</a>
            </div>
          </div>
        </div>
      </section>
@endif
<hr>
  <footer id="fh5co-footer" role="contentinfo" style="background-image: url(images/img_bg_4.jpg);">
    <div class="overlay"></div>
    <div class="container">
      <div class="row row-pb-md">
        <div class="col-md-3 fh5co-widget">
          <h3>{{\App\Frontcategory::first()->head_tag}}</h3>
          <p>{{ str_limit(\App\Frontcategory::first()->head_describe, $limit = 100, $end = '...') }}</p>
        </div>
        <div class="col-md-2 col-sm-4 col-xs-6 col-md-push-1 fh5co-widget">
         
          <ul class="fh5co-footer-links">
           <li class="nav-item"> <a class="nav-link" id="home" href="{{url('')}}">{{\App\Frontheader::first()->home}}</a> </li>
          @if(\App\Frontheader::first()->notice_id=='1')
               <li class="nav-item"> <a class="nav-link" id="notice" href="{{url('')}}/view/school/notice">{{\App\Frontheader::first()->notice}}</a> </li>
               @endif
        @if(\App\Frontheader::first()->event_id=='1')
                <li class="nav-item"> <a class="nav-link" id="events" href="{{url('')}}/view/school/event">{{\App\Frontheader::first()->event}}</a> </li>
                @endif
          </ul>
        </div>

        <div class="col-md-2 col-sm-4 col-xs-6 col-md-push-1 fh5co-widget">
        
          <ul class="fh5co-footer-links">
           @if(\App\Frontheader::first()->teacher_id=='1')
                 <li class="nav-item"> <a class="nav-link" id="teacher" href="{{url('')}}/view/school/teacher">{{\App\Frontheader::first()->teacher}}</a> </li>
        @endif
        @if(\App\Frontheader::first()->course_id=='1')
               <li class="nav-item"> <a class="nav-link" id="course" href="{{url('')}}/view/yearbook/sales">{{\App\Frontheader::first()->course}}</a> </li>
      @endif
      @if(\App\Frontheader::first()->gallery_id=='1')
                  <li class="nav-item"> <a class="nav-link" id="gallery" href="{{url('')}}/view/school/gallery">{{\App\Frontheader::first()->gallery}}</a> </li>
      @endif
          </ul>
        </div>

        <div class="col-md-2 col-sm-4 col-xs-6 col-md-push-1 fh5co-widget">
         
          <ul class="fh5co-footer-links">
            <li class="nav-item"> <a class="nav-link" id="about" href="{{url('')}}/view/school/about_us">{{\App\Frontheader::first()->about}}</a> </li>
              @if(\App\Frontheader::first()->future_id=='1')
                            <li class="nav-item"> <a class="nav-link" id="admission" href="{{url('')}}/view/school/admission">{{\App\Frontheader::first()->future}}</a> </li>
              @endif
               <li class="btn-cta">
                  @if(\Auth::check())
                  <a href="{{url('')}}/admin/page.fmp?page=1"><i class="fa fa-user"></i><span> @lang('admin.hello') {{\Auth::user()->name}}</span></a>
                  @else
                  <a href="{{url('')}}/login"><i class="fa fa-user"></i> <span> @lang('admin.login')</span></a>
                  @endif
                </li>
          </ul>
        </div>

        <div class="col-md-2 col-sm-4 col-xs-6 col-md-push-1 fh5co-widget">
                <h3>Contact Info</h3>
                <ul class="probootstrap-contact-info">
                  <li><i class="icon-location2"></i> <span>{{\App\Frontfooter::first()->con_address}}</span></li>
                  <li><i class="icon-mail"></i><span>{{\App\Frontfooter::first()->con_email}}</span></li>
                  <li><i class="icon-phone2"></i><span>{{\App\Frontfooter::first()->con_phone}}</span></li>
                </ul>
              </div>
           
        </div>
      </div>

      <div class="row copyright">
        <div class="col-md-12 text-center">
          <p>
            <small class="block">&copy; {{\App\Frontfooter::first()->copyright}}.</small> 
            <small class="block">{{date("Y")}} <a href="{{url('')}}">Schuul (1.0)</a> </small>
          </p>
        </div>
      </div>

    </div>
  </footer>
  </div>

  <div class="gototop js-top">
    <a href="#" class="js-gotop"><i class="icon-arrow-up"></i></a>
  </div>
  
  <!-- jQuery -->
  <script src="{{url('')}}/extra/js/jquery.min.js"></script>
  <!-- jQuery Easing -->
  <script src="{{url('')}}/extra/js/jquery.easing.1.3.js"></script>
  <!-- Bootstrap -->
  <script src="{{url('')}}/extra/js/bootstrap.min.js"></script>
  <!-- Waypoints -->
  <script src="{{url('')}}/extra/js/jquery.waypoints.min.js"></script>
  <!-- Stellar Parallax -->
  <script src="{{url('')}}/extra/js/jquery.stellar.min.js"></script>
  <!-- Carousel -->
  <script src="{{url('')}}/extra/js/owl.carousel.min.js"></script>
  <!-- Flexslider -->
  <script src="{{url('')}}/extra/js/jquery.flexslider-min.js"></script>
  <!-- countTo -->
  <script src="{{url('')}}/extra/js/jquery.countTo.js"></script>
  <!-- Magnific Popup -->
  <script src="{{url('')}}/extra/js/jquery.magnific-popup.min.js"></script>
  <script src="{{url('')}}/extra/js/magnific-popup-options.js"></script>
  <!-- Count Down -->
  <script src="{{url('')}}/extra/js/simplyCountdown.js"></script>
  <!-- Main -->
  <script src="{{url('')}}/extra/js/main.js"></script>
  <!-- Modernizr JS -->
  <script src="{{url('')}}/extra/photoswipe.js"></script>
  <script src="{{url('')}}/extra/photoswipe-ui-default.js"></script>
  <script src="{{url('')}}/extra/js/modernizr-2.6.2.min.js"></script>
   <script src="{{url('')}}/assets/printThis.js" type="text/javascript" charset="utf-8"></script>
     <script src="{{url('')}}/assets/plugins/toast-master/js/jquery.toast.js"></script>
       <script src="https://js.paystack.co/v1/inline.js"></script>
  <script src="https://checkout.stripe.com/checkout.js"></script>
   <script src="https://www.paypalobjects.com/api/checkout.js"></script>
<script type="text/javascript" src="https://www.wepay.com/js/iframe.wepay.js"></script>
 <script src="{{url('')}}/assets/plugins/sweetalert/sweetalert-dev.js"></script>
  <script>
    var d = new Date(new Date().getTime() + 1000 * 120 * 120 * 2000);

 
    simplyCountdown('.simply-countdown-one', {
        year: d.getFullYear(),
        month: d.getMonth() + 1,
        day: d.getDate()
    });

   
    $('#simply-countdown-losange').simplyCountdown({
        year: d.getFullYear(),
        month: d.getMonth() + 1,
        day: d.getDate(),
        enableUtc: false
    });
  </script>
   <script type="text/javascript">
    $(".formsubmit").submit(function(e) {
  var formDatan = new FormData(this);
    $form = $(this);
    $('#submit').val('Sending......');
  $.ajax({
            url     : $form.attr('action'),
            type    : 'POST',
            data    : formDatan,
    success: function (data) {
     $.toast({heading: '@lang('admin.message')',text: '@lang('admin.sent_success')',position: 'top-right',loaderBg:'#ff6849',icon: 'success',hideAfter: 3500, stack: 6
          });
     $('#submit').val('@lang('admin.message_sent')');
      
      },
      error:function(data){
        $('#submit').val(' @lang('admin.message_failed')');
      },
       cache: false,
        contentType: false,
        processData: false
 });
   e.preventDefault();
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
   @if(\App\Support::first()->status=='1'&&\App\Support::first()->url!='')
   <script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='{{\App\Support::first()->url}}';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>
@endif
  </body>
</html>

@endif