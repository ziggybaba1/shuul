@extends('layouts.haris')
@section('content')
@if(\App\Fronttheme::first()->theme=='1')
<style type="text/css">
.el-element-overlay .el-card-item .el-overlay-1 .el-info > li a {
    border-color: #ffffff;
    color: #ffffff;
    padding: 15px 15px 15px;
}
.probootstrap-section {
    padding: 1em 0;
}
</style>
                   <section class="probootstrap-section probootstrap-section-colored">
        <div class="container">
          <div class="row">
            <div class="col-md-12 text-left section-heading probootstrap-animate mb0">
              <h1 class="mb0">@lang('admin.our') {{\App\Frontheader::first()->course}}</h1>
            </div>
          </div>
          <div class="row page-titles">
                     <div class="col-md-5 col-8 align-self-center">
                        <h3 class="text-themecolor m-b-0 m-t-0"></h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{url('')}}">{{\App\Frontheader::first()->home}}</a></li>
                            <li class="breadcrumb-item active">{{\App\Frontheader::first()->course}}</li>
                        </ol>
                    </div>
                  </div>
        </div>
    </section>
   <section class="probootstrap-section">
        <div class="container">
           <div class="row">
       <div class="col-md-12">
              <div class="service left-icon probootstrap-animate">
               
                <div class="text">
                  <h3>{{\App\Fronthome::first()->course_title}}</h3>
          <p>{{\App\Fronthome::first()->course_description}}</p>
                </div>  
              </div>
     </div>
    </div>
  </div>
  </section>
                  <section class="probootstrap-section">
        <div class="container">
           @if (count($yearbooks) > 0)
           <section class="articles">
           @include('frontend.list.ybooklist')
         </section>
         @endif
         
    </div>
      </section>
           <script src="{{url('')}}/assets/plugins/jquery/jquery.min.js"></script>
<script type="text/javascript">
     $(function () {
        $('.nav-link').removeClass("active");
    $("#course").addClass("active");
     });
</script>
<script type="text/javascript">

        $(function() {
            $('body').on('click', '.pagination a', function(e) {
                e.preventDefault();

                $('#load a').css('color', '#dfecf6');
                $('#load').append('<img style="position: absolute; left: 0; top: 0; z-index: 100000;" src="{{url('')}}/assets/images/preloader.gif" />');

                var url = $(this).attr('href');
                getArticles(url);
                window.history.pushState("", "", url);
            });

            function getArticles(url) {
                $.ajax({
                    url : url
                }).done(function (data) {
                    $('.articles').html(data);
                }).fail(function () {
                    alert('Articles could not be loaded.');
                });
            }
        });
    </script>
    @elseif(\App\Fronttheme::first()->theme=='2')
<aside id="fh5co-hero">
    <div class="flexslider">
      <ul class="slides">
        <li style="background-image: url({{url('')}}/uploads/frontend/{{\App\Frontcategory::first()->image}});">
          <div class="overlay-gradient"></div>
          <div class="container">
            <div class="row">
              <div class="col-md-8 col-md-offset-2 text-center slider-text">
                <div class="slider-text-inner">
                  <h1 class="heading-section">{{\App\Fronthome::first()->course_title}}</h1>
                  <h2>{{\App\Fronthome::first()->course_description}}</h2>
                </div>
              </div>
            </div>
          </div>
        </li>
        </ul>
      </div>
  </aside>
   <br>
       <section class="probootstrap-section">
        <div class="container">
           @if (count($yearbooks) > 0)
           <section class="articles">
           @include('frontend.list.ybooklist')
         </section>
         @endif  
    </div>
      </section>
<script src="{{url('')}}/assets/plugins/jquery/jquery.min.js"></script>
<script type="text/javascript">
   $(function () {
    $('.nav-item').removeClass("active");
 $(".fh5co-nav ul li a#course").css("color","red");
   });
</script>
@endif
          @endsection