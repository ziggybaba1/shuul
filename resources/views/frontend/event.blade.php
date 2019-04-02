@extends('layouts.haris')
@section('content')
            <section class="probootstrap-section probootstrap-section-colored">
        <div class="container">
          <div class="row">
            <div class="col-md-12 text-left section-heading probootstrap-animate mb0">
              <h1 class="mb0">{{\App\Frontheader::first()->event}}</h1>
            </div>
          </div>
          <div class="row page-titles">
                     <div class="col-md-5 col-8 align-self-center">
                        <h3 class="text-themecolor m-b-0 m-t-0"></h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{url('')}}">{{\App\Frontheader::first()->home}}</a></li>
                            <li class="breadcrumb-item active">{{\App\Frontheader::first()->event}}</li>
                        </ol>
                    </div>
                  </div>
        </div>
      </section>
           <section class="probootstrap-section">
        <div class="container">
          @if (count($events) > 0)
           <section class="articles">
           @include('frontend.list.eventlist')
         </section>
         @endif
    </div>
</section>
                
                  <div class="row">
               
                <div class="col-md-4">
                      <div id="calendar"></div>
                </div>
                  </div>

             </section>
 <script src="{{url('')}}/assets/plugins/jquery/jquery.min.js"></script>
<script type="text/javascript">
     $(function () {
        $('.nav-link').removeClass("active");
   @if(\App\Fronttheme::first()->theme=='1')
    $("#events").css("color","blue");
@elseif(\App\Fronttheme::first()->theme=='2')
    $(".fh5co-nav ul li a#events").css("color","red");
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