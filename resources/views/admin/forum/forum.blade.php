 @extends('layouts.admin')
@section('content')

                <!-- ============================================================== -->
                <!-- Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
               <div class="row page-titles">
                    <div class="col-md-5 col-8 align-self-center">
                        <h3 class="text-themecolor">@lang('admin.forum')</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{url('')}}/admin/page.fmp?page=1">@lang('admin.home')</a></li>
                            <li class="breadcrumb-item active">@lang('admin.forum')</li>
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
                                <h4 class="card-title">@lang('admin.forum_export')</h4>
                                <h6 class="card-subtitle">@lang('admin.forum_list')</h6>
                                 <div class="pull-left">
                               
                             </div>
                                 <div class="pull-right">
                                 <button onclick="showAjaxModal('{{url('')}}/new/forum/page')" class="btn btn-primary btn-bg">@lang('admin.add_forum')</button>
                             </div>
                                <div class="table-responsive m-t-40">
                                    <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>@lang('admin.title')</th>
                                                <th>@lang('admin.describe')</th>
                                                <th>@lang('admin.created_by')</th>
                                                <th>@lang('admin.total_topic')</th>
                                                <th>@lang('admin.member')</th>
                                                <th>@lang('admin.date_create')</th>
                                               <th>@lang('admin.option')</th> 
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>#</th>
                                                <th>@lang('admin.title')</th>
                                                <th>@lang('admin.describe')</th>
                                                <th>@lang('admin.created_by')</th>
                                                <th>@lang('admin.total_topic')</th>
                                                <th>@lang('admin.member')</th>
                                                <th>@lang('admin.date_create')</th>
                                               <th>@lang('admin.option')</th> 
                                            </tr>
                                        </tfoot>
                                        <tbody>
                        @foreach(\App\Forum::latest()->get() as $class)
                                            <tr>
                                                <td>{{$loop->iteration}}</td>
                                                <td>{{$class->title}}</td>
                                                <td>{{$class->description}}</td>
                                                <td>{{$class->name}}</td>
                                                 <td>{{count(\App\Thread::where('forum_id',$class->id)->get())}}</td>
                                                
                                                <td>{{count(\App\Member::where('forum_id',$class->id)->get())}}</td>
                                                <td>{{\Carbon\Carbon::parse($class->created_at)->toFormattedDateString()}}</td>
                    <td><div class="btn-group">
<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="ti-settings"></i></button>
     <div class="dropdown-menu ">
                <a class="dropdown-item" href="{{url('')}}/view/list/thread?forum={{$class->id}}">@lang('admin.view_topic')</a>
                <a onclick="showAjaxModal('{{url('')}}/edit/show/forum/{{$class->id}}')" class="dropdown-item" href="javascript:void(0)">@lang('admin.edit')</a>
                <a onclick="showAjaxModal('{{url('')}}/add/forum/user/{{$class->id}}')" class="dropdown-item" href="javascript:void(0)">@lang('admin.add_rem_user')</a>
                <a class="dropdown-item" onclick="deleteforum('{{$class->id}}')" href="javascript:void(0)">@lang('admin.delete')</a>
      </div>
          </div></td>
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
              function deleteforum(id)
              {
                if(confirm("@lang('admin.confirm_delete')")){ 
                $.get('{{url('')}}/delete/forum/'+id,function(data)
                {
               if(data==0){
                  swal("@lang('admin.account_delete')", "@lang('admin.continue-button')", "success");
                    window.location.assign('{{url('')}}/admin/page.fmp?page=70');
                }
            else{
                     swal("@lang('admin.error_delete')", "@lang('admin.continue-button')", "error");
                    }     
                });
            }
              }
          </script>
                @endsection