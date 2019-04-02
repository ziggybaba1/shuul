@extends('layouts.admin')

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
                    <!-- Column -->
                    <div class="col-md-6 col-lg-4 col-xlg-2">
                        <div class="card card-inverse card-info">
                            <div class="box bg-info text-center">
                                <h1 class="font-light text-white">{{count(\App\Student::where('status','0')->get())}}</h1>
                                <h6 class="text-white">@lang('admin.active') @lang('admin.student')</h6>
                            </div>
                        </div>
                    </div>
                      <div class="col-md-6 col-lg-4 col-xlg-2">
                        <div class="card card-inverse card-warning">
                            <div class="box text-center">
                                <h1 class="font-light text-white">{{count(\App\Student::where('status','1')->get())}}</h1>
                                <h6 class="text-white">@lang('admin.graduate')</h6>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                    <div class="col-md-6 col-lg-4 col-xlg-2">
                        <div class="card card-primary card-inverse">
                            <div class="box text-center">
                                <h1 class="font-light text-white">{{count(\App\Teacher::where('status','0')->get())}}</h1>
                                <h6 class="text-white">@lang('admin.total') @lang('admin.staff')</h6>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                    <div class="col-md-6 col-lg-4 col-xlg-2">
                        <div class="card card-inverse card-success">
                            <div class="box text-center">
                                <h1 class="font-light text-white">{{count(\App\Result::all())}}</h1>
                                <h6 class="text-white">@lang('admin.total') @lang('admin.generated') @lang('admin.result')</h6>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                    <div class="col-md-6 col-lg-4 col-xlg-2">
                        <div class="card card-inverse card-dark">
                            <div class="box text-center">
                                <h1 class="font-light text-white">{{count(\App\Parenting::all())}}</h1>
                                <h6 class="text-white">@lang('admin.total') @lang('admin.parent_guard')</h6>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                    <div class="col-md-6 col-lg-4 col-xlg-2">
                        <div class="card card-inverse card-megna">
                            <div class="box text-center">
                                <h1 class="font-light text-white">{{count(\App\Course::all())}}</h1>
                                <h6 class="text-white">@lang('admin.total') @lang('admin.class') @lang('admin.room')</h6>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                  
                </div>
                  <div class="row">
    @foreach(\App\Course::all() as $class)
                 <div class="col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <!-- Row -->
                                <div class="row">
                                    <div class="col-8"><span class="display-6">{{count(\App\Student::where('class',$class->id)->get())}}<i class="ti-angle-up font-14 text-success"></i></span>
                                        <h6>{{$class->title}} @lang('admin.total') @lang('admin.student')</h6></div>
                                    <div class="col-4 align-self-center text-primary text-right p-l-0">
                                       <i class="fa fa-bar-chart-o fa-3x"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
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
                             @if(\Auth::user()->role=='admin')
                            <div class="card-body weather-small" >
                                <div class="row">
        @if(\App\Session::latest()->first()->status=='1')
                                    <div class="col-4 b-r ">
                                        <div class="d-flex">
                                            <div class="m-l-20">
                <button onclick="showAjaxModal('{{url('')}}/admin/start/session')" class="btn btn-primary btn-bg">@lang('admin.open')</button>
                                            </div>
                                        </div>
                                    </div>
                @elseif(\App\Session::latest()->first()->status=='0')
                                    <div class="col-4 b-r ">
                                        <div class="d-flex">
                                            <div class="m-l-20">
            <button onclick="showAjaxModal('{{url('')}}/admin/break/session')" class="btn btn-default btn-bg">@lang('admin.break')</button>
                                            </div>
                                        </div>
                                    </div>
                 
                                    <div class="col-4 text-center">
                <button onclick="showAjaxModal('{{url('')}}/admin/close/session')" class="btn btn-warning btn-bg">@lang('admin.close')</button>
                                    </div>
                                    @elseif(\App\Session::latest()->first()->status=='2')
                                    <div class="col-4 text-center">
                <button onclick="showAjaxModal('{{url('')}}/admin/open-break/session')" class="btn btn-info btn-bg">@lang('admin.open') @lang('admin.break')</button>
                                    </div>
               
                @endif
                                </div>
                            </div>
                            @endif
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
                </div>
                <div class="row">
@if(\App\Role::where('staff_id',\Auth::user()->id)->first()->hostel=='1'||\Auth::user()->role=='admin')
                    <div class="col-lg-5">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">@lang('admin.dormitory')</h4>
                                <div class="d-flex flex-row">
                                    <div class="p-10 p-l-0 b-r">
                                        <h6 class="font-light">@lang('admin.total') @lang('admin.hostel')</h6><b>{{count(\App\Dormitory::all())}}</b></div>
                                    <div class="p-10 b-r">
                                        <h6 class="font-light">@lang('admin.total') @lang('admin.room')</h6><b>{{count(\App\Room::all())}}</b>
                                    </div>
                                    <div class="p-10 b-r">
                                        <h6 class="font-light">@lang('admin.allocated') @lang('admin.bed') @lang('admin.space')</h6><b>{{count(\App\Allocate::all())}}</b>
                                    </div>
                                  
                                     <div class="p-10 b-r">
                                        <h6 class="font-light">@lang('admin.unallocated') @lang('admin.bed') @lang('admin.space')</h6><b>{{count(\App\Bed::all())-count(\App\Allocate::all())}}</b>
                                    </div>
                                </div>
                            </div>
                            <div id="spark1" class="sparkchart"></div>
                        </div>
                    </div>
                     @endif
                     @if(\App\Role::where('staff_id',\Auth::user()->id)->first()->report=='1'||\Auth::user()->role=='admin')
                 <div class="col-lg-3 col-md-3">
                        <div class="card">
                            <div class="card-body">
                               <h4 class="card-title">@lang('admin.medical') @lang('admin.record')</h4>
                                <div class="row">
                                    <div class="col-8"><span class="display-6">{{count(\App\Report::all())}}<i class="ti-angle-up font-14 text-success"></i></span>
                    <h6>@lang('admin.total') @lang('admin.health_report')</h6></div>
                                    <div class="col-4 align-self-center text-primary text-right p-l-0">
                                       <i class="fa fa-bar-chart-o fa-3x"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                   
                    @endif
         @if(\App\Role::where('staff_id',\Auth::user()->id)->first()->leave=='1'||\Auth::user()->role=='admin'||\Auth::user()->role=='library')
                  <div class="col-lg-4">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">@lang('admin.library')</h4>
                                <div class="d-flex flex-row">
                                    <div class="p-10 p-l-0 b-r">
                                        <h6 class="font-light">@lang('admin.total') @lang('admin.book')</h6><b>{{count(\App\Inventory::all())}}</b></div>
                                    <div class="p-10 b-r">
                <h6 class="font-light">@lang('admin.non_return') @lang('admin.request')</h6><b>{{count(\App\Borrow::where('status','Pending Return')->get())}}</b>
                                    </div>
                                    <div class="p-10 b-r">
                                        <h6 class="font-light">@lang('admin.return') @lang('admin.request')</h6><b>{{count(\App\Borrow::where('status','Returned')->get())}}</b>
                                    </div>
                                </div>
                            </div>
                            <div id="spark1" class="sparkchart"></div>
                        </div>
                    </div>
                    @endif
                     @if(\App\Role::where('staff_id',\Auth::user()->id)->first()->leave=='1'||\Auth::user()->role=='admin'||\Auth::user()->role=='hrm')
                     <div class="col-lg-5">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">@lang('admin.staff') @lang('admin.management')</h4>
                                <div class="d-flex flex-row">
                                    <div class="p-10 p-l-0 b-r">
                                        <h6 class="font-light">@lang('admin.total') @lang('admin.teach') @lang('admin.staff')</h6><b>{{count(\App\Inventory::all())}}</b></div>
                                    <div class="p-10 b-r">
                <h6 class="font-light">@lang('admin.total') @lang('admin.no_teach') Staff</h6><b>{{count(\App\Borrow::where('status','Pending Return')->get())}}</b>
                                    </div>
                                    <div class="p-10 b-r">
                                        <h6 class="font-light">@lang('admin.new') @lang('admin.leave') @lang('admin.request')</h6><b>{{count(\App\Leave::where('status','0')->get())}}</b>
                                    </div>
                                </div>
                            </div>
                            <div id="spark1" class="sparkchart"></div>
                        </div>
                    </div>
                    @endif
            @if(\App\Role::where('staff_id',\Auth::user()->id)->first()->leave=='1'||\Auth::user()->role=='admin')
                      <div class="col-lg-3 col-md-3">
                        <div class="card">
                            <div class="card-body">
                               <h4 class="card-title">@lang('admin.contact')</h4>
                                <div class="row">
                                    <div class="col-8"><span class="display-6">{{count(\App\Contact::where('answer',null)->get())}}<i class="ti-angle-up font-14 text-success"></i></span>
                                        <h6>@lang('admin.latest') @lang('admin.contact') @lang('admin.form') @lang('admin.request')</h6></div>
                                    <div class="col-4 align-self-center text-primary text-right p-l-0">
                                       <i class="fa fa-bar-chart-o fa-3x"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif
                     @if(\App\Role::where('staff_id',\Auth::user()->id)->first()->forum=='1'||\Auth::user()->role=='admin')
                    <div class="col-lg-4">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">@lang('admin.forum')</h4>
                                <div class="d-flex flex-row">
                                    <div class="p-10 p-l-0 b-r">
                                        <h6 class="font-light">@lang('admin.total') @lang('admin.forum')</h6><b>{{count(\App\Forum::all())}}</b></div>
                                    <div class="p-10 b-r">
                <h6 class="font-light">@lang('admin.total') @lang('admin.topic')</h6><b>{{count(\App\Thread::all())}}</b>
                                    </div>
                                    <div class="p-10 b-r">
                                        <h6 class="font-light">@lang('admin.total') @lang('admin.replies')</h6><b>{{count(\App\Reply::all())}}</b>
                                    </div>
                                </div>
                            </div>
                            <div id="spark1" class="sparkchart"></div>
                        </div>
                    </div>
                    @endif
     @if(\App\Role::where('staff_id',\Auth::user()->id)->first()->leave=='1'||\Auth::user()->role=='admin'||\Auth::user()->role=='account')
                    <div class="col-lg-8">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">@lang('admin.account')</h4>
                                <div class="d-flex flex-row">
                                    <div class="p-10 p-l-0 b-r">
                                        <h6 class="font-light">@lang('admin.current-sess') @lang('admin.expense')</h6><b>{{\App\Currency::find(\App\Setting::first()->currency)->symbol}}{{\App\Expense::where('session',\App\Session::latest()->first()->session)->sum('amount')}}</b></div>
                                    <div class="p-10 b-r">
                <h6 class="font-light">@lang('admin.current-sess') @lang('admin.school') @lang('admin.fee') @lang('admin.payment')</h6><b>{{\App\Currency::find(\App\Setting::first()->currency)->symbol}}
                     @php
                     $summer=0;
foreach(\App\Fpayment::where('session',\App\Session::latest()->first()->session)->get() as $pay){
      $summer=\App\Feepay::where('pay_id',$pay->id)->where('status','1')->sum('amount');
}
      
                    @endphp
                    {{$summer}}
                </b>
                                    </div>
                                    <div class="p-10 b-r">
                                        <h6 class="font-light">@lang('admin.current-sess') @lang('admin.book') @lang('admin.payment')</h6><b>{{\App\Currency::find(\App\Setting::first()->currency)->symbol}}{{\App\Payment::where('status','1')->where('session',\App\Session::latest()->first()->session)->sum('amount')}}</b>
                                    </div>
                                     <div class="p-10 b-r">
                                        <h6 class="font-light">@lang('admin.total') @lang('admin.year') @lang('admin.book') @lang('admin.sale')</h6><b>{{\App\Currency::find(\App\Setting::first()->currency)->symbol}}{{\App\Ypayment::where('pstatus','1')->sum('amount')}}</b>
                                    </div>
                                </div>
                            </div>
                            <div id="spark1" class="sparkchart"></div>
                        </div>
                    </div>
                     <div class="col-lg-4">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">@lang('admin.term_analyse')</h4>
                                <div class="d-flex flex-row">
                                    <div class="p-10 p-l-0 b-r">
                                        <h6 class="font-light">@lang('admin.num_bal_fee')</h6><b>
                                           @php
                                    $summern=0;
  foreach(\App\Student::where('status','0')->get() as $stud){
  if(count(\App\Fpayment::where('student_id',$stud->id)->where('session',\App\Session::latest()->first()->session)->where('term',\App\Session::latest()->first()->terms)->get())>0){

if(count(\App\Feepay::where('pay_id',\App\Fpayment::where('student_id',$stud->id)->where('session',\App\Session::latest()->first()->session)->where('term',\App\Session::latest()->first()->terms)->latest()->first()->id)->where('status','1')->get())==count(\App\Feepay::where('pay_id',\App\Fpayment::where('student_id',$stud->id)->where('session',\App\Session::latest()->first()->session)->where('term',\App\Session::latest()->first()->terms)->latest()->first()->id)->get())){
$summern+=count($stud);
        }
    }
}
                                @endphp   
{{$summern}}
                                        </b></div>
                                    <div class="p-10 b-r">
                <h6 class="font-light">@lang('admin.num_unpaid_fee')</h6><b>
                    @php
                                    $summerp=0;
  foreach(\App\Student::where('status','0')->get() as $stud){
if(count(\App\Fpayment::where('student_id',$stud->id)->where('session',\App\Session::latest()->first()->session)->where('term',\App\Session::latest()->first()->terms)->get())==0){
$summerp+=count($stud);
  }
}
                                @endphp   
{{$summerp}}
                </b>
                                    </div>

                                    <div class="p-10 b-r">
                                        <h6 class="font-light">@lang('admin.num_unbal_fee')</h6><b>
                                          @php
                                    $summer=0;
  foreach(\App\Student::where('status','0')->get() as $stud){
  if(count(\App\Fpayment::where('student_id',$stud->id)->where('session',\App\Session::latest()->first()->session)->where('term',\App\Session::latest()->first()->terms)->get())>0){
if(count(\App\Feepay::where('pay_id',\App\Fpayment::where('student_id',$stud->id)->where('session',\App\Session::latest()->first()->session)->where('term',\App\Session::latest()->first()->terms)->latest()->first()->id)->where('status','1')->get())!=count(\App\Feepay::where('pay_id',\App\Fpayment::where('student_id',$stud->id)->where('session',\App\Session::latest()->first()->session)->where('term',\App\Session::latest()->first()->terms)->latest()->first()->id)->get())){
$summer+=count($stud);
    }
  }
}
                                @endphp   
{{$summer}}
                                        </b>
                                    </div>
                                </div>
                            </div>
                            <div id="spark1" class="sparkchart"></div>
                        </div>
                    </div>
                    @endif
                </div>
                <div class="row">
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