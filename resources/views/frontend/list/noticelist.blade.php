 <div id="load"  style="position: relative;">
  <div class="row">
     @if(\App\Fronttheme::first()->theme=='1')
  @foreach($notices as $notice)
            <div class="col-md-4 col-sm-6 col-xs-6 col-xxs-12">
              <a href="#" class="probootstrap-featured-news-box">
                <figure class="probootstrap-media"><img src="{{url('')}}/uploads/notice/{{$notice->image}}" alt="Free Bootstrap Template by uicookies.com" class="img-responsive"></figure>
                <div class="probootstrap-text">
                  <h3>{{$notice->title}}</h3>
                  <p>{{$notice->description}}</p>
                  <span class="probootstrap-date"><i class="icon-calendar"></i>{{\Carbon\Carbon::parse($notice->sdate)->toFormattedDateString()}}</span>
                  <span class="probootstrap-location"><i class="icon-user2"></i>By {{$notice->sign}}</span>
                </div>
              </a>
            </div>
           @endforeach
            @elseif(\App\Fronttheme::first()->theme=='2')
            @foreach($notices as $notice)
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
            @endif
         </div>
       </div>
 
 {{$notices->links() }}