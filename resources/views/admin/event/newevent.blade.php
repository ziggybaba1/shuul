@extends('layouts.admin')
@section('content')

    <div class="row page-titles">
                    <div class="col-md-5 col-8 align-self-center">
                        <h3 class="text-themecolor">@lang('admin.event-list')</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">@lang('admin.home')</a></li>
                            <li class="breadcrumb-item active">@lang('admin.event-list')</li>
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
                                <div class="pull-right">
                                     <button onclick="showAjaxModal('{{url('')}}/add/new_event')" class="btn btn-primary btn-block btn-sm">@lang('admin.event_add')</button>
                                </div>
                                <h4 class="card-title">@lang('admin.event_export')</h4>
                                <h6 class="card-subtitle">@lang('admin.event-list-data')</h6>
                                <div class="table-responsive m-t-40">
        <table id="example23" class="display nowrap table  table-bordered" cellspacing="0" width="100%">
                                       <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>@lang('admin.event-title')</th>
                                                <th>@lang('admin.start-date-time')</th>
                                                <th>@lang('admin.end-date-time')</th>
                                                <th>@lang('admin.option')</th>
                                               
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>#</th>
                                                 <th>@lang('admin.event-title')</th>
                                                <th>@lang('admin.start-date-time')</th>
                                                <th>@lang('admin.end-date-time')</th>
                                                <th>@lang('admin.option')</th>
                                               
                                            </tr>
                                        </tfoot>
                                        <tbody>
                        @forelse(\App\Event::all() as $class)
                                            <tr>
                                                <td>{{$loop->iteration}}</td>
                                                <td>{{$class->title}}</td>
                <td>{{\Carbon\Carbon::parse($class->sdate)->toFormattedDateString()}}<br>{{$class->stime}}</td>
                    <td>{{\Carbon\Carbon::parse($class->edate)->toFormattedDateString()}}<br>{{$class->etime}}</td>
                     <td>
                        <div class="btn-group">
<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="ti-settings"></i></button>
     <div class="dropdown-menu ">
                <a onclick="showAjaxModal('{{url('')}}/edit/event/{{$class->id}}')" class="dropdown-item" href="javascript:void(0)">@lang('admin.edit')</a>
                <a class="dropdown-item" onclick="deleteevent('{{$class->id}}')" href="javascript:void(0)">@lang('admin.delete')</a>
      </div>
          </div>
      </td>
                                            </tr>
                        @empty
                        <tr><td colspan="6">@lang('admin.no-event')</td></tr>
                        @endforelse
                                        </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</div>          
  <script type="text/javascript">
               function deleteevent(id)
              {
                if(confirm("@lang('admin.confirm_delete')")){ 
                $.get('{{url('')}}/deleten/event/'+id,function(data)
                {
               if(data==0){
                  swal("@lang('admin.account_delete')", "@lang('admin.continue-button')", "success");
                    window.location.assign('{{url('')}}/admin/page.fmp?page=42');
                }
            else{
                     swal("@lang('admin.error_delete')", "@lang('admin.continue-button')", "error");
                    }   
                });
            }
              }
          </script>
@endsection