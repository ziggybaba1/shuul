@extends('layouts.admin')
@section('content')

    <div class="row page-titles">
                    <div class="col-md-5 col-8 align-self-center">
                        <h3 class="text-themecolor">@lang('admin.student_award')</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">@lang('admin.home')</a></li>
                            <li class="breadcrumb-item active">@lang('admin.student_award')</li>
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
                         @if (session('message'))
                 <div class="alert alert-info alert-rounded">{{ session('message') }}</div>
                    @endif
                            <div class="pull-right">
    <button onclick="showAjaxModal('{{url('')}}/add/student_award')" class="btn btn-primary btn-bg">@lang('admin.new_student_award')</button>
</div>
</div>
</div>
<hr>
 <div class="row">
                    <div class="col-md-12">
 <div class="card">
        <div class="card-body">
                 <!-- .col -->
    @forelse($student as $stud)
    @if(count(\App\Award::where('user_id',$stud->id)->where('status','0')->get())>0)
                    <div class="col-md-4 col-lg-4 col-xlg-4">
                        <div class="ribbon-wrapper-reverse card card-body">
            <div class="ribbon ribbon-bookmark ribbon-vertical-r ribbon-success"><i class="fa fa-trophy"></i></div>
             <div class="ribbon ribbon-corner ribbon-info"><i class="fa fa-trophy"></i></div>
                            <div class="row">

                                <div class="col-md-4 col-lg-3 text-center">
                <a >
                @if($stud->image!='')
                    <img src="{{url('')}}/uploads/avatars/{{$stud->image}}" alt="user" class="img-circle img-responsive">
                @else
                 <img src="{{url('')}}/assets/images/user.png" alt="user" class="img-circle img-responsive">
                 @endif
            </a>
                                </div>
                                <div class="col-md-8 col-lg-9">

                                    <h3 class="box-title m-b-0">{{$stud->gname}} {{$stud->fname}}</h3> <small>{{$stud->user_id}}</small>
                                    <address>
                                        <br/>
                                        <br/>
                             <div class="row">
                            @foreach(\App\Award::where('user_id',$stud->id)->where('status','0')->get() as $award)
                            <center>
                <a href="javascript:void(0)" onclick="showAjaxModal('{{url('')}}/show/award/{{$award->id}}')"><i class="fa fa-2x fa-trophy"></i></a><br>
                                      <small style="font-size: 12px;">{{ str_limit($award->name, $limit = 10, $end = '...') }}</small>
                                  </center>
                                  <label>&nbsp; &nbsp;</label>
                                      @endforeach
                                  </div>
                                    </address>
                                </div>
                            </div>
                        </div>
                    </div>
        @endif
        @empty
        <tr><td colspan="6">@lang('admin.no_award')</td></tr>
                    <!-- /.col -->
@endforelse
                    </div>  
                </div>
            </div>
        </div>
                    <div class="row">
                    <div class="col-md-4"></div>
                    <div class="col-md-4"></div>
   <div class="col-lg-4 m-b-30">
                                        {{$student->links()}}
                                    </div>
</div>       

@endsection