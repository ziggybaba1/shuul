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
@if(\App\Fronttheme::first()->theme=='1')
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <section class="probootstrap-section probootstrap-section-colored">
        <div class="container">
          <div class="row">
            <div class="col-md-12 text-left section-heading probootstrap-animate mb0">
              <h1 class="mb0">{{\App\Frontheader::first()->gallery}}</h1>
            </div>
          </div>
          <div class="row page-titles">
                     <div class="col-md-5 col-8 align-self-center">
                        <h3 class="text-themecolor m-b-0 m-t-0"></h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{url('')}}">{{\App\Frontheader::first()->home}}</a></li>
                            <li class="breadcrumb-item active">{{\App\Frontheader::first()->gallery}}</li>
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
                  <h3>{{\App\Fronthome::first()->gallery_title}}</h3>
          <p>{{\App\Fronthome::first()->gallery_description}}</p>
                </div>  
              </div>
     </div>
    </div>
  </div>
  </section>
       <section class="probootstrap-section probootstrap-bg-white">
      <div class="container">
        
        <div class="row">
          <div class="col-md-12">
            <div class="portfolio-feed three-cols">
              <div class="grid-sizer"></div>
              <div class="gutter-sizer"></div>
              <div class="probootstrap-gallery">
                 @if (count($gallerys) > 0)
           <section class="articles">
           @include('frontend.list.gallerylist')
         </section>
         @endif
              </div>
            </div>
          </div>
        </div>

      </div>
    </section>

   <!-- Photoswipe Modal -->
    <div class="pswp" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="pswp__bg"></div>
      <div class="pswp__scroll-wrap">

          <div class="pswp__container">
              <div class="pswp__item"></div>
              <div class="pswp__item"></div>
              <div class="pswp__item"></div>
          </div>

          <div class="pswp__ui pswp__ui--hidden">
              <div class="pswp__top-bar">
                  <div class="pswp__counter"></div>
                  <button class="pswp__button pswp__button--close" title="Close (Esc)"></button>
                  <button class="pswp__button pswp__button--share" title="Share"></button>
                  <button class="pswp__button pswp__button--fs" title="Toggle fullscreen"></button>
                  <button class="pswp__button pswp__button--zoom" title="Zoom in/out"></button>
                  <div class="pswp__preloader">
                      <div class="pswp__preloader__icn">
                        <div class="pswp__preloader__cut">
                          <div class="pswp__preloader__donut"></div>
                        </div>
                      </div>
                  </div>
              </div>
              <div class="pswp__share-modal pswp__share-modal--hidden pswp__single-tap">
                  <div class="pswp__share-tooltip"></div> 
              </div>
              <button class="pswp__button pswp__button--arrow--left" title="Previous (arrow left)">
              </button>
              <button class="pswp__button pswp__button--arrow--right" title="Next (arrow right)">
              </button>
              <div class="pswp__caption">
                  <div class="pswp__caption__center"></div>
              </div>
          </div>
      </div>
    </div>
     @elseif(\App\Fronttheme::first()->theme=='2')

 <section class="probootstrap-section probootstrap-bg-white">
      <div class="container">
        
        <div class="row">
          <div class="col-md-12">
            <div class="portfolio-feed three-cols">
              <div class="grid-sizer"></div>
              <div class="gutter-sizer"></div>
              <div class="probootstrap-gallery">
                 @if (count($gallerys) > 0)
           <section class="articles">
           @include('frontend.list.gallerylist')
         </section>
         @endif
              </div>
            </div>
          </div>
        </div>

      </div>
    </section>
    @endif  
            <script src="{{url('')}}/assets/plugins/jquery/jquery.min.js"></script>
<script type="text/javascript">
     $(function () {
        $('.nav-link').removeClass("active");
    
     @if(\App\Fronttheme::first()->theme=='1')
    $("#gallery").css("color","blue");
@elseif(\App\Fronttheme::first()->theme=='2')
    $(".fh5co-nav ul li a#gallery").css("color","red");
    @endif
     });
     function gallerycatch(title,value){
         $('.semo').removeClass("current");
    $("#"+value).addClass("current");
         jQuery(".showgalla").html('<div style="text-align:center;margin-top:200px;"><img src="{{url('')}}/assets/images/preloader.gif" style="height:70px;" /></div>');
       $.get('{{url('')}}/get/gallery/image/'+title, function(data, status){
        if(status == "success")
        {
            $('.showgalla').html(data);
        }
      if(status == "error")
          {
            alert('error');
          }
    });
     }
</script>
<script type="text/javascript">

        $(function() {
            $('body').on('click', '.pagination a', function(e) {
                e.preventDefault();

                $('#load a').css('color', '#dfecf6');
                $('#load').append('<img style="position: absolute; left: 0; top: 0; width:100px; z-index: 100000;"  src="{{url('')}}/assets/images/preloader.gif" />');

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
                    alert('Error.');
                });
            }
        });
    </script>
          @endsection

