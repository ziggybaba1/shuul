@foreach(\App\Work::where('status','1')->get() as $course)
            <div class="col-md-6">
              <div class="probootstrap-service-2 probootstrap-animate">
                <div class="image">
                  <div class="image-bg">
                    <img src="{{url('')}}/uploads/thumbnail/{{$course->file}}" alt="Free Bootstrap Template by uicookies.com">
                  </div>
                </div>
                <div class="text">
                  <span class="probootstrap-meta"><i class="icon-calendar2"></i>{{\Carbon\Carbon::parse($course->created_at)->toFormattedDateString()}}</span>
                  <h3>{{$course->category}}</h3>
                  <p><b>{{$course->title}}</b></p>
                  <br>
                  <p>{{$course->description}}</p>
                  <p><a href="#" class="btn btn-primary">Enroll now</a> <span class="enrolled-count">2,928 students enrolled</span></p>
                </div>
              </div>
            </div>
            @endforeach