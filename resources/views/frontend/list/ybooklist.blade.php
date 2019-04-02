<div id="load" class="row" style="position: relative;">
  @if(\App\Fronttheme::first()->theme=='1')
@forelse($yearbooks as $course)
            <div class="col-md-4" >
              <div class="probootstrap-service-2">
                <div class="image">
                  <div class="image-bg">
              @if($course->cover=='')
                    <img src="{{url('')}}/haris/images/small.jpg" alt="">
              @elseif($course->cover!='')
              <img src="{{url('')}}/uploads/yearbook/{{$course->cover}}" alt="">
              @endif
                  </div>
                </div>
                <div class="text">
                  <span class="probootstrap-meta"><i class="fa fa-calendar"></i> @lang('admin.year'): {{$course->session}}</span>
                  <h3>{{$course->title}}</h3>
                   <span class="probootstrap-meta"><i class="fa fa-money"></i> Price:{{\App\Currency::find(\App\Setting::first()->currency)->symbol}}{{$course->price}}</span>
                  <p>{{ str_limit($course->description, $limit = 80, $end = '...') }}</p>
                  <p><a href="{{url('')}}/course/page.fmp?page=course_code&req={{$course->id}}" class="btn btn-primary">@lang('admin.purchase')</a> <span class="enrolled-count">{{$course->number}} @lang('admin.page') {{\App\Frontheader::first()->course}}</span></p>
                </div>
              </div>
            </div>
            @empty
            @endforelse
 @elseif(\App\Fronttheme::first()->theme=='2')
 @forelse($yearbooks as $course)
  <div class="col-lg-4 col-md-4">
          <div class="fh5co-blog animate-box">
              @if($course->cover=='')
            <a href="#" class="blog-img-holder" style="background-image: url({{url('')}}/haris/images/small.jpg);"></a>
               @elseif($course->cover!='')
        <a href="#" class="blog-img-holder" style="background-image: url({{url('')}}/uploads/yearbook/{{$course->cover}});"></a>
              @endif
            <div class="blog-text">
              <h3><a href="#">@lang('admin.year'): {{$course->session}}</a></h3>
              <span class="posted_on">{{$course->title}}</span>
              <p><a href="{{url('')}}/course/page.fmp?page=course_code&req={{$course->id}}" class="btn btn-primary">@lang('admin.purchase')</a> <span class="enrolled-count">{{$course->number}} @lang('admin.page') {{\App\Frontheader::first()->course}}</span></p>
            </div> 
          </div>
        </div>
            @empty
            @endforelse
 @endif
 </div>
{{$yearbooks->links() }}
