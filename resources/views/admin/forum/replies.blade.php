 @extends('layouts.admin')
@section('content')

                <!-- ============================================================== -->
                <!-- Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
               <div class="row page-titles">
                    <div class="col-md-5 col-8 align-self-center">
                        <h3 class="text-themecolor">@lang('admin.replies')</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{url('')}}/admin/page.fmp?page=1">@lang('admin.home')</a></li>
                            <li class="breadcrumb-item active">@lang('admin.replies')
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
                                <h4 class="card-title">@lang('admin.replies') @lang('admin.export')</h4>
                                <h6 class="card-subtitle">@lang('admin.replies')</h6>
                                 <div class="pull-left">
                               
                             </div>
                               
                                <div class="table-responsive m-t-40">
                                    <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                 <th>#</th>
                                                <th>@lang('admin.replies')</th>
                                                <th>@lang('admin.topic')</th>
                                                <th>@lang('admin.created_by')</th>
                                                <th>@lang('admin.date_create')</th>
                                               <th>@lang('admin.option')</th> 
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>#</th>
                                               <th>@lang('admin.replies')</th>
                                                <th>@lang('admin.topic')</th>
                                                <th>@lang('admin.created_by')</th>
                                                <th>@lang('admin.date_create')</th>
                                               <th>@lang('admin.option')</th> 
                                            </tr>
                                        </tfoot>
                                        <tbody>
                        @foreach(\App\Reply::latest()->get() as $class)
                                            <tr>
                                                <td>{{$loop->iteration}}</td>
                                                <td>{{$class->body}}</td>
                                                <td>{{\App\Thread::find($class->thread_id)->title}}</td>
                                                <td>{{\App\User::find($class->user_id)->name}}</td>
                                                <td>{{\Carbon\Carbon::parse($class->created_at)->toFormattedDateString()}}</td>
                    <td> <a class="btn btn-danger text-white" onclick="deletereply('{{$class->id}}')" href="javascript:void(0)">@lang('admin.delete')</a></td>
                                            </tr>
                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
          <script type="text/javascript">
              function deletereply(id)
              {
                if(confirm("@lang('admin.confirm_delete')")){ 
                $.get('{{url('')}}/delete/reply/'+id,function(data)
                {
                if(data==0){
                  swal("@lang('admin.account_delete')", "@lang('admin.continue-button')", "success");
                    window.location.assign('{{url('')}}/admin/page.fmp?page=63');
                }
            else{
                     swal("@lang('admin.error_delete')", "@lang('admin.continue-button')", "error");
                    }  
                });
            }
              }
          </script>
                @endsection