  @extends('layouts.parent')
@section('content')

                <!-- ============================================================== -->
                <!-- Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
               <div class="row page-titles">
                    <div class="col-md-5 col-8 align-self-center">
                        <h3 class="text-themecolor">@lang('admin.topic') @lang('admin.list')</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{url('')}}/admin/page.fmp?page=1">@lang('admin.home')</a></li>
                            <li class="breadcrumb-item active">@lang('admin.topic') @lang('admin.list')</li>
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
                           
                                    <div class="card-body p-t-0">
                                         <div class="table-responsive m-t-40">
       <table id="example23" class="display nowrap table table-hover table-striped table-bordered " cellspacing="0" width="100%">
                                       <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>@lang('admin.forum')</th>
                                                <th>@lang('admin.topic') @lang('admin.title')</th>
                                                <th>@lang('admin.replies')</th>
                                                <th>@lang('admin.created_by')</th>
                                                <th>@lang('admin.date_create')</th>
                                                <th>@lang('admin.option')</th> 
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                             <th>#</th>
                                              <th>@lang('admin.forum')</th>
                                                <th>@lang('admin.topic') @lang('admin.title')</th>
                                                <th>@lang('admin.replies')</th>
                                                <th>@lang('admin.created_by')</th>
                                                <th>@lang('admin.date_create')</th>
                                                <th>@lang('admin.option')</th> 
                                            </tr>
                                        </tfoot>
                      <tbody>
                @foreach(\App\Thread::where('status','Publish')->latest()->get() as $course)
    @if(count(\App\Member::where('forum_id',$course->forum_id)->where('user_id',\Auth::user()->id)->get())>0)
                        <tr>
<td>{{$loop->iteration}}</td>
<td>{{\App\Forum::find($course->forum_id)->title}}</td>
                      <td>{{$course->title}}</td>
                      <td>{{count(\App\Reply::where('thread_id',$course->id)->get())}}</td>
                      <td>{{\App\User::find($course->user_id)->name}}</td>
                      <td>{{\Carbon\Carbon::parse($course->created_at)->toFormattedDateString()}}</td>
<td>
<a href="{{url('')}}/pforum/topic?topic={{$course->id}}" class="btn btn-primary text-white">@lang('admin.view') @lang('admin.topic')</a>
</td>
                        </tr>
                        @endif
                        @endforeach
                    </tbody>
                </table>
            </div>
                                    </div>
                          
                        </div>
                    </div>
</div>
@endsection