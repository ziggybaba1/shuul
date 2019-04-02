 <div id="load"  style="position: relative;">
 <div class="row">
   @if(\App\Fronttheme::first()->theme=='1')
             @foreach($events as $task)
            <div class="col-md-6 col-sm-12 col-xs-12 col-xxs-12">
              <a href="#" class="probootstrap-featured-news-box">
                <figure class="probootstrap-media"><img src="{{url('')}}/uploads/avatars/{{$task->image}}" alt="{{$task->title}}" class="img-responsive"></figure>
                <div class="probootstrap-text">
                  <h3>{{$task->title}}</h3>
                  <span class="probootstrap-date"><i class="icon-calendar"></i>{{\Carbon\Carbon::parse($task->sdate)->toFormattedDateString()}}</span>
                  <span class="probootstrap-location"><i class="icon-location2"></i>{{$task->venue}}</span>
                   <p>{{$task->description}}</p>
                </div>
              </a>
            </div>
            @endforeach
  @elseif(\App\Fronttheme::first()->theme=='2')
         @foreach($events as $task)
<div class="col-md-4 animate-box">
          <div class="fh5co-event">
            <div class="date text-center"><span>{{\Carbon\Carbon::parse($task->sdate)->toFormattedDateString()}}.</span></div>
            <h3><a href="#"><i class="icon-location"></i>  {{$task->venue}}</a></h3>
            <p>{{$task->title}}</p>
            <p>{{$task->description}}</p>
          </div>
        </div>
        @endforeach
        @endif
         </div>
        </div>
 {{$events->links() }}