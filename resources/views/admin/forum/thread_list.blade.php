 @extends('layouts.admin')
@section('content')

                <!-- ============================================================== -->
                <!-- Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
               <div class="row page-titles">
                    <div class="col-md-5 col-8 align-self-center">
                        <h3 class="text-themecolor">@lang('admin.forum') @lang('admin.topic')</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{url('')}}/admin/page.fmp?page=1">@lang('admin.home')</a></li>
                             <li class="breadcrumb-item"><a href="{{url('')}}/admin/page.fmp?page=70">@lang('admin.forum_list')</a></li>
                            <li class="breadcrumb-item active">{{\App\Forum::find($id)->title}}</li>
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
                                <h4 class="card-title">{{\App\Forum::find($id)->title}} @lang('admin.topic') @lang('admin.export')</h4>
                                <h6 class="card-subtitle"></h6>
                                 <div class="pull-left">
                               
                             </div>
                                 <div class="pull-right">
                                 <button onclick="showAjaxModal('{{url('')}}/new/thread/page/{{$id}}')" class="btn btn-primary btn-bg">@lang('admin.add') @lang('admin.topic') ({{\App\Forum::find($id)->title}})</button>
                             </div>
                                <div class="table-responsive m-t-40">
                                    <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                  <th>@lang('admin.title')</th>
                                               
                                                <th>@lang('admin.created_by')</th>
                                                <th>@lang('admin.replies')</th>
                                                 <th>@lang('admin.status')</th>
                                                <th>@lang('admin.date_create')</th>
                                               <th>@lang('admin.option')</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                 <th>#</th>
                                                 <th>@lang('admin.title')</th>
                                               
                                                <th>@lang('admin.created_by')</th>
                                                <th>@lang('admin.replies')</th>
                                                 <th>@lang('admin.status')</th>
                                                <th>@lang('admin.date_create')</th>
                                               <th>@lang('admin.option')</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                        @foreach(\App\Thread::where('forum_id',$id)->get() as $class)
                                            <tr>
                                                <td>{{$loop->iteration}}</td>
                                                <td>{{$class->title}}</td>
                                                <td>{{$class->name}}</td>
                                               <td>{{count(\App\Reply::where('thread_id',$class->id)->get())}}</td>
                                                <td>{{$class->status}}</td>
                                                <td>{{\Carbon\Carbon::parse($class->createde_at)->toFormattedDateString()}}</td>
                    <td><div class="btn-group">
<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="ti-settings"></i></button>
     <div class="dropdown-menu">
                <a class="dropdown-item" href="{{url('')}}/forum/topic?topic={{$class->id}}">@lang('admin.view_topic')</a>
                <a onclick="showAjaxModal('{{url('')}}/edit/old/thread/{{$class->id}}')" class="dropdown-item" href="javascript:void(0)">@lang('admin.edit')</a>
                <a class="dropdown-item" onclick="deletethread('{{$class->id}}')" href="javascript:void(0)">@lang('admin.delete')</a>
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
              function deletethread(id)
              {
                if(confirm("@lang('admin.confirm_delete')")){ 
                $.get('{{url('')}}/delete/thread/'+id,function(data)
                {
                if(data==0){
                  swal("@lang('admin.account_delete')", "@lang('admin.continue-button')", "success");
                    window.location.assign('{{url('')}}/view/list/thread?forum={{$id}}');
                }
            else{
                     swal("@lang('admin.error_delete')", "@lang('admin.continue-button')", "error");
                    }    
                });
            }
              }
          </script>
                @endsection