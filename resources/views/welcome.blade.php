@extends('layouts.haris')
@section('content')
@if(\App\Fronttheme::first()->theme=='1')
 <section class="flexslider">
        <ul class="slides">
              @foreach(\App\Frontgallery::where('status','1')->get() as $gallery)
        <li style="background-image: url({{url('')}}/uploads/frontend/{{$gallery->image}})" class="overlay">
            <div class="container">
              <div class="row">
                <div class="col-md-8 col-md-offset-2">
                  <div class="probootstrap-slider-text text-center">
                    <h1 class="probootstrap-heading probootstrap-animate">{{$gallery->title}}</h1>
                     <p style="color: white;">{{$gallery->description}}</p>
                  </div>
                </div>
              </div>
            </div>
          </li>
           @endforeach
                                            </ul>
      </section>
<section class="probootstrap-section">
        <div class="container">
           <div class="row">
      @foreach(\App\Frontpage::where('status','1')->get() as $feat)
       <div class="col-md-6">
              <div class="service left-icon probootstrap-animate">
                <div class="icon" style="padding-right: 10px;"><img width="112" src="{{url('')}}/uploads/frontend/{{$feat->image}}" alt=""></div>
                <div class="text">
                  <h3>{{$feat->title}}</h3>
                  <p>{{$feat->description}}</p>
                </div>  
              </div>
     </div>
      @endforeach
    </div>
  </section>
  <section class="probootstrap-section" id="probootstrap-counter">
        <div class="container">
          
          <div class="row">
            <div class="col-md-3 col-sm-6 col-xs-6 col-xxs-12 probootstrap-animate">
              <div class="probootstrap-counter-wrap">
                <div class="probootstrap-icon">
                  <i class="icon-users2"></i>
                </div>
                <div class="probootstrap-text">
                  <span class="probootstrap-counter">
                    <span class="js-counter" data-from="0" data-to="{{\App\Fronthome::first()->count_stud}}" data-speed="5000" data-refresh-interval="50">1</span>
                  </span>
                  <span class="probootstrap-counter-label">@lang('admin.student_enrol')</span>
                </div>
              </div>
            </div>
            <div class="col-md-3 col-sm-6 col-xs-6 col-xxs-12 probootstrap-animate">
              <div class="probootstrap-counter-wrap">
                <div class="probootstrap-icon">
                  <i class="icon-user-tie"></i>
                </div>
                <div class="probootstrap-text">
                  <span class="probootstrap-counter">
                    <span class="js-counter" data-from="0" data-to="{{\App\Fronthome::first()->cert_teach}}" data-speed="5000" data-refresh-interval="50">1</span>
                  </span>
                  <span class="probootstrap-counter-label">@lang('admin.cert_teach')</span>
                </div>
              </div>
            </div>
            <div class="clearfix visible-sm-block visible-xs-block"></div>
            <div class="col-md-3 col-sm-6 col-xs-6 col-xxs-12 probootstrap-animate">
              <div class="probootstrap-counter-wrap">
                <div class="probootstrap-icon">
                  <i class="icon-library"></i>
                </div>
                <div class="probootstrap-text">
                  <span class="probootstrap-counter">
                    <span class="js-counter" data-from="0" data-to="{{\App\Fronthome::first()->uni_pass}}" data-speed="5000" data-refresh-interval="50">1</span>%
                  </span>
                  <span class="probootstrap-counter-label">@lang('admin.pass_uni')</span>
                </div>
              </div>
            </div>
            <div class="col-md-3 col-sm-6 col-xs-6 col-xxs-12 probootstrap-animate">
               
               <div class="probootstrap-counter-wrap">
                <div class="probootstrap-icon">
                  <i class="icon-smile2"></i>
                </div>
                <div class="probootstrap-text">
                  <span class="probootstrap-counter">
                    <span class="js-counter" data-from="0" data-to="{{\App\Fronthome::first()->parent_sat}}" data-speed="5000" data-refresh-interval="50">1</span>%
                  </span>
                  <span class="probootstrap-counter-label">@lang('admin.parent_satisfy')</span>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <section class="probootstrap-section probootstrap-section-colored probootstrap-bg probootstrap-custom-heading probootstrap-tab-section" style="background-image: url(img/slider_2.jpg)">
        <div class="container">
          <div class="row">
            <div class="col-md-12 text-center section-heading probootstrap-animate">
              <h2 class="mb0">@lang('admin.high_light')</h2>
            </div>
          </div>
        </div>
        <div class="probootstrap-tab-style-1">
          <ul class="nav nav-tabs probootstrap-center probootstrap-tabs no-border">
            <li class="active"><a data-toggle="tab" href="#featured-news">@lang('admin.notice')</a></li>
            <li><a data-toggle="tab" href="#upcoming-events">@lang('admin.up_event')</a></li>
          </ul>
        </div>
      </section>
       <section class="probootstrap-section probootstrap-section">
        <div class="container">
          <div class="row">
            <div class="col-md-12">
              
              <div class="tab-content">

                <div id="featured-news" class="tab-pane fade in active">
                  <div class="row">
                    <div class="col-md-12">
                      <div class="owl-carousel" id="owl1">
                    @foreach(\App\Noticeboard::where('status','0')->orWhere('status','6')->latest()->simplePaginate(2) as $notice)
                        <div class="item">
                          <a href="#" class="probootstrap-featured-news-box">
                            <figure class="probootstrap-media"><img src="{{url('')}}/uploads/notice/{{$notice->image}}" alt="" class="img-responsive"></figure>
                            <div class="probootstrap-text">
                              <h3>{{$notice->title}}</h3>
                              <p>{{ str_limit($notice->description, $limit = 100, $end = '...') }}</p>
                              <span class="probootstrap-date"><i class="icon-calendar"></i>{{\Carbon\Carbon::parse($notice->sdate)->toFormattedDateString()}}, {{$notice->sign}}</span>
                              
                            </div>
                          </a>
                        </div>
                        @endforeach
                      </div>
                    </div>
                  </div>
                  <!-- END row -->
                  <div class="row">
                    <div class="col-md-12 text-center">
                      <p><a href="{{url('')}}/view/page.fmp?page=notice" class="btn btn-primary">@lang('admin.view') @lang('admin.notice')</a></p>  
                    </div>
                  </div>
                </div>
                <div id="upcoming-events" class="tab-pane fade">
                  <div class="row">
                    <div class="col-md-12">
                      <div class="owl-carousel" id="owl2">
                   @foreach(\App\Event::where('edate','>=',\Carbon\Carbon::today()->format('Y-m-d'))->latest()->simplePaginate(4) as $task)
                        <div class="item">
                          <a href="#" class="probootstrap-featured-news-box">
                            <figure class="probootstrap-media"><img src="{{url('')}}/uploads/avatars/{{$task->image}}" alt="Free Bootstrap Template by uicookies.com" class="img-responsive"></figure>
                            <div class="probootstrap-text">
                              <h3>{{$task->title}}</h3>
                              <span class="probootstrap-date"><i class="icon-calendar"></i>{{\Carbon\Carbon::parse($task->sdate)->toFormattedDateString()}}</span>
                              <span class="probootstrap-location"><i class="icon-location2"></i>{{$task->venue}}</span>
                            </div>
                          </a>
                        </div>
                        <!-- END item -->
                  @endforeach
                        
                        <!-- END item -->
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12 text-center">
                      <p><a href="{{url('')}}/view/page.fmp?page=event" class="btn btn-primary">@lang('admin.view') @lang('admin.up_event')</a></p>  
                    </div>
                  </div>
                </div>

              </div>
            
            </div>
          </div>
        </div>
      </section>
    <section class="probootstrap-section">
        <div class="container">
          <div class="row">
            <div class="col-md-6 col-md-offset-3 text-center section-heading probootstrap-animate">
              <h2>{{\App\Fronthome::first()->teacher_title}}</h2>
              <p class="lead">{{\App\Fronthome::first()->teacher_description}}</p>
            </div>
          </div>
          <!-- END row -->

          <div class="row">
            @foreach(\App\Teacher::where('role','teacher')->where('status','0')->simplePaginate(4) as $staff)
            <div class="col-md-3 col-sm-6">
              <div class="probootstrap-teacher text-center probootstrap-animate">
                <figure class="media">
                  @if($staff->image!='')
                  <img src="{{url('')}}/uploads/avatars/{{$staff->image}}" alt="{{$staff->gname}} {{$staff->fname}}" class="img-responsive">
          @elseif($staff->image=='')
           <img src="{{url('')}}/haris/images/5_11.png" alt="{{$staff->gname}} {{$staff->fname}}" class="img-responsive">
           @endif
                </figure>
                <div class="text">
                  <h3>{{$staff->gname}} {{$staff->fname}}</h3>
                  <p>{{$staff->subassign}}</p>
                  <ul class="probootstrap-footer-social">
                    @if($staff->twitter!='')
                <li class="twitter"><a target="_blank" href="https://twitter.com/intent/user?user_id={{$staff->twitter}}"><i class="icon-twitter"></i></a></li>
                @else
                 <li class="twitter"><a target="_blank" href="javascript:void(0)"><i class="icon-twitter"></i></a></li>
                @endif
                 @if($staff->facebook!='')
                <li class="facebook"><a target="_blank" href="https://facebook.com/profile.php?id={{$staff->facebook}}"><i class="icon-facebook2"></i></a></li>
                  @else
                 <li class="facebook"><a  href="javascript:void(0)"><i class="icon-facebook2"></i></a></li>
                @endif
                  @if($staff->instagram!='')
                <li class="instagram"><a target="_blank" href="https://www.instagram.com/{{$staff->twitter}}/"><i class="icon-instagram2"></i></a></li>
                  @else
                 <li class="instagram"><a href="javascript:void(0)"><i class="icon-instagram2"></i></a></li>
                @endif
                  @if($staff->google!='')
                <li class="google-plus"><a target="_blank" href="{{$staff->google}}"><i class="icon-google-plus"></i></a></li>
                  @else
                 <li class="google-plus"><a href="javascript:void(0)"><i class="icon-google-plus"></i></a></li>
                @endif
                  </ul>
                </div>
              </div>
            </div>
      @endforeach
          </div>

        </div>
      </section>
      <section class="probootstrap-section probootstrap-bg probootstrap-section-colored probootstrap-testimonial" style="background-image: url(url('')}}/haris/img/slider_4.jpg);">
        <div class="container">
          <div class="row">
            <div class="col-md-6 col-md-offset-3 text-center section-heading probootstrap-animate">
              <h2>{{\App\Fronthome::first()->test_title}}</h2>
              <p class="lead">{{\App\Fronthome::first()->test_description}}</p>
            </div>
          </div>
          <!-- END row -->
          <div class="row">
            <div class="col-md-12 probootstrap-animate">
              <div class="owl-carousel owl-carousel-testimony owl-carousel-fullwidth">
                  @foreach(\App\Testimonial::where('status','1')->get() as $testimony)
              @if(count(\App\Testimonial::where('status','1')->get())< 2)
                <div class="item">

                  <div class="probootstrap-testimony-wrap text-center">
                    <figure>
                      <img src="{{url('')}}/uploads/frontend/{{$testimony->image}}" alt="{{$testimony->name}}">
                    </figure>
                    <blockquote class="quote">&ldquo;{{$testimony->content}}&rdquo; <cite class="author"> &mdash; <span>{{$testimony->name}}</span></cite></blockquote>
                  </div>

                </div>
                <div class="item" style="display: none;">
                  <div class="probootstrap-testimony-wrap text-center">
                    <figure>
                      <img src="{{url('')}}/uploads/frontend/{{$testimony->image}}" alt="{{$testimony->name}}">
                    </figure>
                    <blockquote class="quote">&ldquo;{{$testimony->content}}&rdquo; <cite class="author">&mdash; <span>{{$testimony->name}}</span></cite></blockquote>
                  </div>
                </div>
                @elseif(count(\App\Testimonial::where('status','1')->get())> 2)
                <div class="item">

                  <div class="probootstrap-testimony-wrap text-center">
                    <figure>
                      <img src="{{url('')}}/uploads/frontend/{{$testimony->image}}" alt="{{$testimony->name}}">
                    </figure>
                    <blockquote class="quote">&ldquo;{{$testimony->content}}&rdquo; <cite class="author"> &mdash; <span>{{$testimony->name}}</span></cite></blockquote>
                  </div>

                </div>
                @endif
                @endforeach
              </div>
            </div>
          </div>
          <!-- END row -->
        </div>
      </section>
       <script src="{{url('')}}/assets/plugins/jquery/jquery.min.js"></script>
<script type="text/javascript">
   $(function () {
  $(".nav-link").removeClass("active");
  $("#home").css("color","blue");
   });
</script>
 @elseif(\App\Fronttheme::first()->theme=='2')

<aside id="fh5co-hero">
    <div class="flexslider">
      <ul class="slides">
@foreach(\App\Frontgallery::where('status','1')->get() as $gallery)
        <li style="background-image: url({{url('')}}/uploads/frontend/{{$gallery->image}});">
          <div class="overlay-gradient"></div>
          <div class="container">
            <div class="row">
              <div class="col-md-8 col-md-offset-2 text-center slider-text">
                <div class="slider-text-inner">
                  <h1>{{$gallery->title}}</h1>
                  <h2>{{$gallery->description}}</h2>
                  <p><a class="btn btn-primary btn-lg" href="{{url('')}}/view/school/admission">{{\App\Frontheader::first()->future}}</a></p>
                </div>
              </div>
            </div>
          </div>
        </li>
@endforeach
        </ul>
      </div>
  </aside>

  <div id="fh5co-course-categories">
    <div class="container">
      <div class="row animate-box">
        <div class="col-md-6 col-md-offset-3 text-center fh5co-heading">
          <h2>{{\App\Frontcategory::first()->head_tag}}</h2>
          <p>{{\App\Frontcategory::first()->head_describe}}</p>
        </div>
      </div>
      <div class="row">
 @foreach(\App\Frontpage::where('status','1')->get() as $feat)
        <div class="col-md-3 col-sm-6 text-center animate-box">
          <div class="services">
            <span class="icon">
             <img width="112" src="{{url('')}}/uploads/frontend/{{$feat->image}}" alt="">
            </span>
            <div class="desc">
              <h3><a >{{$feat->title}}</a></h3>
              <p>{{$feat->description}}</p>
            </div>
          </div>
      </div>
       @endforeach
    </div>
  </div>
</div>
  <div id="fh5co-counter" class="fh5co-counters" style="background-image: url(images/img_bg_4.jpg);" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
      <div class="row">
        <div class="col-md-10 col-md-offset-1">
          <div class="row">
            <div class="col-md-3 col-sm-6 text-center animate-box">
              <span class="icon"><i class="icon-world"></i></span>
              <span class="fh5co-counter js-counter" data-from="0" data-to="{{\App\Fronthome::first()->count_stud}}" data-speed="5000" data-refresh-interval="50"></span>
              <span class="fh5co-counter-label">@lang('admin.student_enrol')</span>
            </div>
            <div class="col-md-3 col-sm-6 text-center animate-box">
              <span class="icon"><i class="icon-bulb"></i></span>
              <span class="fh5co-counter js-counter" data-from="0" data-to="{{\App\Fronthome::first()->cert_teach}}" data-speed="5000" data-refresh-interval="50"></span>
              <span class="fh5co-counter-label">@lang('admin.cert_teach')</span>
            </div>
            <div class="col-md-3 col-sm-6 text-center animate-box">
              <span class="icon"><i class="icon-study"></i></span>
              <span class="fh5co-counter js-counter" data-from="0" data-to="{{\App\Fronthome::first()->uni_pass}}" data-speed="5000" data-refresh-interval="50"></span>
              <span class="fh5co-counter-label">@lang('admin.pass_uni')</span>
            </div>
            <div class="col-md-3 col-sm-6 text-center animate-box">
              <span class="icon"><i class="icon-head"></i></span>
              <span class="fh5co-counter js-counter" data-from="0" data-to="{{\App\Fronthome::first()->parent_sat}}" data-speed="5000" data-refresh-interval="50"></span>
              <span class="fh5co-counter-label">@lang('admin.parent_satisfy')</span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

   <div id="fh5co-course">
    <div class="container">
      <div class="row animate-box">
        <div class="col-md-6 col-md-offset-3 text-center fh5co-heading">
          <h2>{{\App\Fronthome::first()->teacher_title}}</h2>
          <p>{{\App\Fronthome::first()->teacher_description}}</p>
        </div>
      </div>
      <div class="row">
    @foreach(\App\Teacher::where('role','teacher')->where('status','0')->where('feat','1')->simplePaginate(4) as $staff)
     <div class="col-md-3 text-center">
          <div class="staff">
           @if($staff->image!='')
            <div class="staff-img" style="background-image: url({{url('')}}/uploads/avatars/{{$staff->image}});">
         @elseif($staff->image=='')
       <div class="staff-img" style="background-image: url({{url('')}}/haris/images/5_11.png);">
           @endif
              <ul class="fh5co-social">
               @if($staff->twitter!='')
                <li><a target="_blank" href="https://twitter.com/intent/user?user_id={{$staff->twitter}}"><i class="icon-social-twitter"></i></a></li>
                @else
                 <li><a target="_blank" href="javascript:void(0)"><i class="icon-social-twitter"></i></a></li>
                @endif
                 @if($staff->facebook!='')
                <li><a target="_blank" href="https://facebook.com/profile.php?id={{$staff->facebook}}"><i class="icon-social-facebook"></i></a></li>
                  @else
                 <li><a  href="javascript:void(0)"><i class="icon-social-facebook"></i></a></li>
                @endif
                  @if($staff->instagram!='')
                <li><a target="_blank" href="https://www.instagram.com/{{$staff->twitter}}/"><i class="icon-instagram"></i></a></li>
                  @else
                 <li><a href="javascript:void(0)"><i class="icon-instagram"></i></a></li>
                @endif
                  @if($staff->google!='')
                <li><a target="_blank" href="{{$staff->google}}"><i class="icon-google-plus"></i></a></li>
                  @else
                 <li><a href="javascript:void(0)"><i class="icon-google-plus"></i></a></li>
                @endif
              </ul>
            </div>
           <span>{{$staff->subassign}}</span>
            <h3><a href="#">{{$staff->gname}} {{$staff->fname}}</a></h3>
          </div>
        </div>
@endforeach
      </div>
    </div>
  </div>
  <div id="fh5co-testimonial" style="background-image: url(images/school.jpg);">
    <div class="overlay"></div>
    <div class="container">
      <div class="row animate-box">
        <div class="col-md-6 col-md-offset-3 text-center fh5co-heading">
          <h2><span>{{\App\Fronthome::first()->test_title}}</span></h2>
          <p class="lead">{{\App\Fronthome::first()->test_description}}</p>
        </div>
      </div>
      <div class="row">
        <div class="col-md-10 col-md-offset-1">
          <div class="row animate-box">
            <div class="owl-carousel owl-carousel-fullwidth">
        @foreach(\App\Testimonial::where('status','1')->get() as $testimony)
               @if(count(\App\Testimonial::where('status','1')->get())< 2)
              <div class="item">
                <div class="testimony-slide active text-center">
                  <div class="user" style="background-image: url({{url('')}}/uploads/frontend/{{$testimony->image}});"></div>
                  <span>{{$testimony->name}}<br><small>{{$testimony->job}}</small></span>
                  <blockquote>
                    <p>&ldquo;{{$testimony->content}}&rdquo;</p>
                  </blockquote>
                </div>
              </div>
               <div class="item" style="display: none;">
                <div class="testimony-slide active text-center">
                  <div class="user" style="background-image: url(images/person2.jpg);"></div>
                  <span>Mike Smith<br><small>Students</small></span>
                  <blockquote>
                    <p>&ldquo;Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.&rdquo;</p>
                  </blockquote>
                </div>
              </div>
             @elseif(count(\App\Testimonial::where('status','1')->get())> 1) 
              <div class="item">
                <div class="testimony-slide active text-center">
                  <div class="user" style="background-image: url({{url('')}}/uploads/frontend/{{$testimony->image}});"></div>
                  <span>{{$testimony->name}}<br><small>{{$testimony->job}}</small></span>
                  <blockquote>
                    <p>&ldquo;{{$testimony->content}}&rdquo;</p>
                  </blockquote>
                </div>
              </div>
             @endif
             @endforeach
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div id="fh5co-blog">
    <div class="container">
      <div class="row animate-box">
        <div class="col-md-8 col-md-offset-2 text-center fh5co-heading">
          <h2>@lang('admin.notice') &amp; @lang('admin.up_event')</h2>
        </div>
      </div>
      <div class="row row-padded-mb">
      @foreach(\App\Event::where('edate','>=',\Carbon\Carbon::today()->format('Y-m-d'))->latest()->simplePaginate(6) as $task)
        <div class="col-md-4 animate-box">
          <div class="fh5co-event">
            <div class="date text-center"><span>{{\Carbon\Carbon::parse($task->sdate)->toFormattedDateString()}}.</span></div>
            <h3><a href="#"><i class="icon-location"></i>{{$task->venue}}</a></h3>
            <p>{{$task->title}}</p>
            <p>{{ str_limit($task->description, $limit = 100, $end = '...') }}</p>
          </div>
        </div>
        @endforeach
      </div>
      <div class="row">
  @foreach(\App\Noticeboard::where('status','0')->orWhere('status','6')->latest()->simplePaginate(3) as $notice)
        <div class="col-lg-4 col-md-4">
          <div class="fh5co-blog animate-box">
            <a href="#" class="blog-img-holder" style="background-image: url({{url('')}}/uploads/notice/{{$notice->image}});"></a>
            <div class="blog-text">
              <h3><a href="#">{{$notice->title}}</a></h3>
              <span class="posted_on">{{\Carbon\Carbon::parse($notice->sdate)->toFormattedDateString()}}, {{$notice->sign}}</span>
              <p>{{ str_limit($notice->description, $limit = 100, $end = '...') }}</p>
            </div> 
          </div>
        </div>
       @endforeach
      </div>
    </div>
  </div>

  <div id="fh5co-gallery" class="fh5co-bg-section">
    <div class="row text-center">
      <h2><span>@lang('admin.gallery')</span></h2>
    </div>
    <div class="row">
  @foreach(\App\Gallery::where('status','2')->latest()->paginate(4) as $gala)
      <div class="col-md-3 col-padded">
        <a href="#" class="gallery" style="background-image: url({{url('')}}/uploads/gallery/{{$gala->image}});"></a>
      </div>
      @endforeach
    </div>
  </div>
   <script src="{{url('')}}/assets/plugins/jquery/jquery.min.js"></script>
<script type="text/javascript">
  $(function () {
    $(".fh5co-nav ul li a#home").css("color","red");
    });
  </script>
 @endif
  
@endsection