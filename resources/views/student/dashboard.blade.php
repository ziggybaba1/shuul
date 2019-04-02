@extends('layouts.student')
@section('content')
               <div class="row page-titles">
                    <div class="col-md-5 col-8 align-self-center">
                        <h3 class="text-themecolor">@lang('admin.dashboard')</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">@lang('admin.home')</a></li>
                            <li class="breadcrumb-item active">@lang('admin.dashboard')</li>
                        </ol>
                    </div>
                     <div class="col-md-6 col-4 align-self-center">
                        <div class="d-flex m-t-10 justify-content-end">
                              <h5 class="text-themecolor">@lang('admin.current-sess'): {{\App\Session::latest()->first()->session}} </h5><br>
                            <h5 class="text-themecolor"> (
                                @if(\App\Session::latest()->first()->terms==='First')
                                @lang('admin.first_term')
                                @elseif(\App\Session::latest()->first()->terms==='Second')
                                @lang('admin.second_term')
                                 @elseif(\App\Session::latest()->first()->terms==='Third')
                                @lang('admin.third_term')
                                 @elseif(\App\Session::latest()->first()->terms==='Fourth')
                                @lang('admin.fourth_term')
                             @endif
                             )
                         </h5>
                        </div>
                    </div>
                </div>
              <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">@lang('admin.student-info') ({{\Auth::user()->name}})</h4>
                                <div class="d-flex flex-row">
                                    <div class="p-10 p-l-0 b-r">
                                        <h6 class="font-light">@lang('admin.current_class')</h6><b>{{\App\Course::find(\App\Student::where('data_id',\Auth::user()->id)->first()->class)->title}}</b></div>
                                    <div class="p-10 b-r">
                <h6 class="font-light">@lang('admin.current_term') @lang('admin.school') @lang('admin.paid_fee') @lang('admin.status')</h6><b>{{\App\Currency::find(\App\Setting::first()->currency)->symbol}}
                     @php
                     $summer=0;
foreach(\App\Fpayment::where('session',\App\Session::latest()->first()->session)->where('term',\App\Session::latest()->first()->terms)->where('student_id',\App\Student::where('data_id',\Auth::user()->id)->first()->id)->get() as $pay){
      $summer=\App\Feepay::where('pay_id',$pay->id)->where('status','1')->sum('amount');
}
      
                    @endphp
                    {{$summer}}
                </b>
                                    </div>
                                    <div class="p-10 b-r">
                <h6 class="font-light">@lang('admin.current_term') @lang('admin.school') @lang('admin.unpaid_fee') @lang('admin.status')</h6><b>{{\App\Currency::find(\App\Setting::first()->currency)->symbol}}
                     @php
                     $summer=0;
          if(count(\App\Fpayment::where('session',\App\Session::latest()->first()->session)->where('term',\App\Session::latest()->first()->terms)->where('student_id',\App\Student::where('data_id',\Auth::user()->id)->first()->id)->get())>0){
  foreach(\App\Fpayment::where('session',\App\Session::latest()->first()->session)->where('term',\App\Session::latest()->first()->terms)->where('student_id',\App\Student::where('data_id',\Auth::user()->id)->first()->id)->get() as $pay){

      $summer=\App\Feepay::where('pay_id',$pay->id)->where('status','!=','1')->sum('amount');
}
        }
        elseif(count(\App\Fpayment::where('session',\App\Session::latest()->first()->session)->where('term',\App\Session::latest()->first()->terms)->where('student_id',\App\Student::where('data_id',\Auth::user()->id)->first()->id)->get())==0){
         $summer=\App\Fee::where('class',\App\Student::where('data_id',\Auth::user()->id)->first()->class)->where('term',\App\Session::latest()->first()->terms)->sum('price');
      }

      
                    @endphp
                    {{$summer}}

                </b>
                @if($summer!=0)
                <a class="btn btn-primary text-white" href="{{url('')}}/student/page.fmp?page=11">@lang('admin.make_pay')</a>
                @endif
                                    </div>
                                    <div class="p-10 b-r">
                                        <h6 class="font-light">@lang('admin.library_status')</h6><b>{{count(\App\Borrow::where('collector',\App\Student::where('data_id',\Auth::user()->id)->first()->id)->where('status','!=','Returned')->where('dom1','student')->get())}}</b>
                                    </div>
                                     <div class="p-10 b-r">
                                        <h6 class="font-light">@lang('admin.await_etest_stat')</h6><b>{{count(\App\Assign::where('student_id',\App\Student::where('data_id',\Auth::user()->id)->first()->id)->get())}} </b>
                                        @if(count(\App\Assign::where('student_id',\App\Student::where('data_id',\Auth::user()->id)->first()->id)->get())>0)
                                        <a class="btn btn-success text-white" href="{{url('')}}/student/page.fmp?page=19">@lang('admin.take_test')</a>
                                        @endif
                                    </div>
                                     <div class="p-10 b-r">
                                        <h6 class="font-light">@lang('admin.attend_status')</h6><b>@lang('admin.present'): {{count(\App\Attendance::where('student_id',\App\Student::where('data_id',\Auth::user()->id)->first()->id)->where('status','1')->where('session',\App\Session::latest()->first()->session)->where('term',\App\Session::latest()->first()->terms)->get())}},&nbsp; &nbsp; &nbsp;@lang('admin.absent'): {{count(\App\Attendance::where('student_id',\App\Student::where('data_id',\Auth::user()->id)->first()->id)->where('status','0')->where('session',\App\Session::latest()->first()->session)->where('term',\App\Session::latest()->first()->terms)->get())}} </b>
                                     
                                    </div>
                                </div>
                            </div>
                            <div id="spark1" class="sparkchart"></div>
                        </div>
                </div>
              </div>
                <div class="row">
                    <!-- Column -->
                    <div class="col-lg-8 col-md-7">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <div id="calendar"></div>
                            </div>
                        </div>
                    </div>
                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-5">
                          @if (session('message'))
                 <div class="alert alert-info alert-rounded">{{ session('message') }}</div>
                    @endif
                      @if (session('error'))
                 <div class="alert alert-warning alert-rounded">{{ session('error') }}</div>
                    @endif
                        <div class="card">
                            <div class="card-body">
                                <h3 class="card-title">@lang('admin.session') @lang('admin.log')</h3>
                                <h6 class="card-subtitle">@lang('admin.open_close')</h6>
                            </div>
                          <div class="card">
                            <img class="" src="{{url('')}}/assets/images/background/weatherbg.jpg" alt="Card image cap">
            @if(\App\Session::latest()->first()->status==1)
                            <div class="card-img-overlay bg-warning" style="height:110px;">
                                <h3 class="card-title text-white m-b-0 dl">@lang('admin.academic') @lang('admin.close')</h3><br>
                                <h3 class="card-title text-white m-b-0 dl">@lang('admin.term'): {{\App\Session::latest()->first()->terms}} @if(\App\Session::latest()->first()->terms==='First')
                                @lang('admin.first_term')
                                @elseif(\App\Session::latest()->first()->terms==='Second')
                                @lang('admin.second_term')
                                 @elseif(\App\Session::latest()->first()->terms==='Third')
                                @lang('admin.third_term')
                                 @elseif(\App\Session::latest()->first()->terms==='Fourth')
                                @lang('admin.fourth_term')
                             @endif</h3><br>
                                <h3 class="card-title text-white m-b-0 dl">@lang('admin.session'): {{\App\Session::latest()->first()->session}}</h3><br>
                                <small class="card-text text-white font-light">@lang('admin.resume') @lang('admin.date'):{{\Carbon\Carbon::parse(\App\Session::latest()->first()->close_close)->toFormattedDateString()}}</small>
                            </div>
                            @elseif(\App\Session::latest()->first()->status==2)
             <div class="card-img-overlay bg-default" style="height:110px;">
                                <h3 class="card-title text-white m-b-0 dl">@lang('admin.academic') @lang('admin.on') @lang('admin.break')</h3><br>
                               <h3 class="card-title text-white m-b-0 dl">@lang('admin.term'):  @if(\App\Session::latest()->first()->terms==='First')
                                @lang('admin.first_term')
                                @elseif(\App\Session::latest()->first()->terms==='Second')
                                @lang('admin.second_term')
                                 @elseif(\App\Session::latest()->first()->terms==='Third')
                                @lang('admin.third_term')
                                 @elseif(\App\Session::latest()->first()->terms==='Fourth')
                                @lang('admin.fourth_term')
                             @endif</h3><br>
                                <h3 class="card-title text-white m-b-0 dl">@lang('admin.session'): {{\App\Session::latest()->first()->session}}</h3><br>
                                <small class="card-text text-white font-light">@lang('admin.resume') @lang('admin.date'):{{\Carbon\Carbon::parse(\App\Session::latest()->first()->brk_close)->toFormattedDateString()}}</small>
                            </div>
            @elseif(\App\Session::latest()->first()->status==0)
             <div class="card-img-overlay bg-primary" style="height:110px;">
                                <h3 class="card-title text-white m-b-0 dl">@lang('admin.academic') @lang('admin.running')</h3><br>
                               <h3 class="card-title text-white m-b-0 dl">@lang('admin.term'):  @if(\App\Session::latest()->first()->terms==='First')
                                @lang('admin.first_term')
                                @elseif(\App\Session::latest()->first()->terms==='Second')
                                @lang('admin.second_term')
                                 @elseif(\App\Session::latest()->first()->terms==='Third')
                                @lang('admin.third_term')
                                 @elseif(\App\Session::latest()->first()->terms==='Fourth')
                                @lang('admin.fourth_term')
                             @endif</h3><br>
                                <h3 class="card-title text-white m-b-0 dl">Session: {{\App\Session::latest()->first()->session}}</h3><br>
                                <small class="card-text text-white font-light">{{\Carbon\Carbon::parse(\App\Session::latest()->first()->open_date)->toFormattedDateString()}}</small>
                            </div>
            @endif
           
                            <div class="card-body weather-small">
                                <div class="row">
        
                                </div>
                            </div>
                        </div>
                            <div class="card-body text-center ">
                                <ul class="list-inline m-b-0">
                                    <li>
                                        <h6 class="text-muted text-info"><i class="fa fa-circle font-10 m-r-10 "></i>@lang('admin.open')</h6> </li>
                                    <li>
                                        <h6 class="text-muted  text-primary"><i class="fa fa-circle font-10 m-r-10"></i>@lang('admin.holiday')</h6> </li>
                                    <li>
                                        <h6 class="text-muted  text-warning"><i class="fa fa-circle font-10 m-r-10"></i>@lang('admin.close')</h6> </li>
                                </ul>
                            </div>
                        </div>
                         <div class="row">
               <div class="col-lg-12 col-md-12">
                        <div class="card bg-inverse">
                            <div class="card-body">
                                 <h4 class="card-title text-white">@lang('admin.notice')</h4>
                                <div id="myCarousel3" class="carousel slide" data-ride="carousel">
                                    <!-- Carousel items -->
                                    <div class="carousel-inner">
                            @forelse(\App\Noticeboard::where('status','0')->orWhere('status','1')->get() as $notice)
                            @if($loop->iteration==1)
                                        <div class="carousel-item active flex-column">
                                            <p class="text-white">{{\Carbon\Carbon::parse($notice->sdate)->toFormattedDateString()}}</p>
                                            <h3 class="text-white">{{$notice->title}}</h3>
                                            <div>
                                               <h4 class="card-title text-white"><em>{{$notice->description}}</em></h4>
                                            </div>
                                        </div>
                            @else
                             <div class="carousel-item flex-column">
                                            <p class="text-white">{{\Carbon\Carbon::parse($notice->sdate)->toFormattedDateString()}}</p>
                                            <h3 class="text-white">{{$notice->title}}</h3>
                                            <div>
                                               <h4 class="card-title text-white"><em>{{$notice->description}}</em></h4>
                                            </div>
                                        </div>
                                        @endif
                                        @empty
                                         <div class="carousel-item active flex-column">
                                            <p class="text-white">{{\Carbon\Carbon::today()->toFormattedDateString()}}</p>
                                            <h3 class="text-white">No Notice</h3>
                                            <div>
                                               
                                            </div>
                                        </div>
                    @endforelse
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> 
            </div>
                    </div>
              <div class="col-lg-6 col-md-6">
                        <div class="card bg-primary">
                            <div class="card-body">
                                 <h4 class="card-title text-white">@lang('admin.latest') @lang('admin.student') @lang('admin.award')</h4>
                                <div id="myCarousel3" class="carousel slide" data-ride="carousel">
                                    <!-- Carousel items -->
                                   <div class="carousel-inner">
                @forelse(\App\Award::where('status','1')->latest()->simplePaginate(10) as $notice)
                @if($loop->iteration==1)
                                        <div class="carousel-item active flex-column">
                                            <p class="text-white">{{\Carbon\Carbon::parse($notice->sdate)->toFormattedDateString()}}</p>
                                             <img width="100" class="img-circle" src="{{url('')}}/uploads/avatars/{{\App\Student::find($notice->user_id)->image}}">
                                            <p class="text-gray"><b>{{\App\Student::find($notice->user_id)->gname}} {{\App\Teacher::find($notice->user_id)->fname}}</b></p>
                                            <h3 class="text-white">{{$notice->name}}</h3>
                                            <div>
                                               <h4 class="card-title text-white"><em>{{$notice->description}}</em></h4>
                                            </div>
                                        </div>
            @else
              <div class="carousel-item flex-column">
                                            <p class="text-white">{{\Carbon\Carbon::parse($notice->sdate)->toFormattedDateString()}}</p>
                                             <img width="100" class="img-circle" src="{{url('')}}/uploads/avatars/{{\App\Student::find($notice->user_id)->image}}">
                                            <p class="text-gray"><b>{{\App\Student::find($notice->user_id)->gname}} {{\App\Teacher::find($notice->user_id)->fname}}</b></p>
                                            <h3 class="text-white">{{$notice->name}}</h3>
                                            <div>
                                               <h4 class="card-title text-white"><em>{{$notice->description}}</em></h4>
                                            </div>
                                        </div>
            @endif
                                        @empty
                                         <div class="carousel-item active flex-column">
                                            <p class="text-white">{{\Carbon\Carbon::today()->toFormattedDateString()}}</p>
                                            <h3 class="text-white">@lang('admin.no_award')</h3>
                                            <div>
                                               
                                            </div>
                                        </div>
                    @endforelse
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> 
                     <div class="col-lg-6 col-md-6">
                        <div class="card bg-success">
                            <div class="card-body">
                                 <h4 class="card-title text-white">@lang('admin.latest') @lang('admin.staff') @lang('admin.award')</h4>
                                <div id="myCarousel3" class="carousel slide" data-ride="carousel">
                                    <!-- Carousel items -->
                                    <div class="carousel-inner">
                @forelse(\App\Award::where('status','0')->latest()->simplePaginate(10) as $notice)
                @if($loop->iteration==1)
                                        <div class="carousel-item active flex-column">
                                            <p class="text-white">{{\Carbon\Carbon::parse($notice->sdate)->toFormattedDateString()}}</p>
                                            <img width="100" class="img-circle" src="{{url('')}}/uploads/avatars/{{\App\Teacher::find($notice->user_id)->image}}">
                                            <p class="text-gray"><b>{{\App\Teacher::find($notice->user_id)->gname}} {{\App\Teacher::find($notice->user_id)->fname}}</b></p>
                                            <h3 class="text-white">{{$notice->name}}</h3>
                                            <div>
                                               <h4 class="card-title text-white"><em>{{$notice->description}}</em></h4>
                                            </div>
                                        </div>
                @else
                 <div class="carousel-item flex-column">
                                            <p class="text-white">{{\Carbon\Carbon::parse($notice->sdate)->toFormattedDateString()}}</p>
                                             <img width="100" class="img-circle" src="{{url('')}}/uploads/avatars/{{\App\Teacher::find($notice->user_id)->image}}">
                                            <p class="text-gray"><b>{{\App\Teacher::find($notice->user_id)->gname}} {{\App\Teacher::find($notice->user_id)->fname}}</b></p>
                                            <h3 class="text-white">{{$notice->name}}</h3>
                                            <div>
                                               <h4 class="card-title text-white"><em>{{$notice->description}}</em></h4>
                                            </div>
                                        </div>
                @endif

                                        @empty
                                         <div class="carousel-item active flex-column">
                                            <p class="text-white">{{\Carbon\Carbon::today()->toFormattedDateString()}}</p>
                                            <h3 class="text-white">@lang('admin.no_award')</h3>
                                            <div>
                                              
                                            </div>
                                        </div>
                    @endforelse
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
@endsection