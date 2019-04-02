 @extends('layouts.parent')
@section('content')

                <!-- ============================================================== -->
                <!-- Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
               <div class="row page-titles">
                    <div class="col-md-5 col-8 align-self-center">
                        <h3 class="text-themecolor">@lang('parent.notice-list)</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{url('')}}/admin/page.fmp?page=1">Home</a></li>
                            <li class="breadcrumb-item active">@lang('parent.notice-list)</li>
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
                    <div class="col-12">
                          @if (session('message'))
                 <div class="alert alert-info alert-rounded">{{ session('message') }}</div>
                    @endif
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">@lang('parent.notice-export')</h4>
                                <h6 class="card-subtitle"></h6>
                                 <div class="pull-left">
                             </div>
                                
                                <div class="table-responsive m-t-40">
                                    <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>>@lang('parent.title')</th>
                                                <th>>@lang('parent.description')</th>
                                                
                                               <th>>@lang('parent.start-date-time')</th>
                                                <th>@lang('parent.start-date-time')</th>
                                               
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                               <th>#</th>
                                                <th>>@lang('parent.title')</th>
                                                <th>>@lang('parent.description')</th>
                                                
                                               <th>>@lang('parent.start-date-time')</th>
                                                <th>@lang('parent.start-date-time')</th>
                                              
                                            </tr>
                                        </tfoot>
                                        <tbody>
                        @foreach(\App\Noticeboard::latest()->get() as $expense)
                     @if($expense->status==0||$expense->status==5)
                                            <tr>
                                                <td>{{$loop->iteration}}</td>
                                                <td>{{$expense->title}}</td>
                                                <td>{{$expense->description}}</td>
                    <td>{{\Carbon\Carbon::parse($expense->sdate)->toFormattedDateString()}}</td>
                    <td>{{\Carbon\Carbon::parse($expense->edate)->toFormattedDateString()}}</td>
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