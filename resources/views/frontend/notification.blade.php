@extends('layouts.haris')
@section('content')
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
              <h1 class="mb0">{{\App\Frontheader::first()->notice}}</h1>
            </div>
          </div>
          <div class="row page-titles">
                     <div class="col-md-5 col-8 align-self-center">
                        <h3 class="text-themecolor m-b-0 m-t-0"></h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{url('')}}">{{\App\Frontheader::first()->home}}</a></li>
                            <li class="breadcrumb-item active">{{\App\Frontheader::first()->notice}}</li>
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
                  <h3>{{\App\Fronthome::first()->notice_title}}</h3>
          <p>{{\App\Fronthome::first()->notice_description}}</p>
                </div>  
              </div>
     </div>
    </div>
  </div>
  </section>
        <section class="probootstrap-section">

        <div class="container">
          @if (count($notices) > 0)
           <section class="articles">
           @include('frontend.list.noticelist')
         </section>
         @endif
        </div>
      </section>
  
             
 <script src="{{url('')}}/assets/plugins/jquery/jquery.min.js"></script>
<script type="text/javascript">
   $(function () {
    $('.nav-link').removeClass("active");
  @if(\App\Fronttheme::first()->theme=='1')
    $("#notice").css("color","blue");
@elseif(\App\Fronttheme::first()->theme=='2')
    $(".fh5co-nav ul li a#notice").css("color","red");
    @endif
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
  @endsection