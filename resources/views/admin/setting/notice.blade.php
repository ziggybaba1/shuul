 @extends('layouts.admin')
@section('content')

                <!-- ============================================================== -->
                <!-- Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
               <div class="row page-titles">
                    <div class="col-md-5 col-8 align-self-center">
                        <h3 class="text-themecolor">@lang('admin.notice') @lang('admin.list')</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{url('')}}/admin/page.fmp?page=1">@lang('admin.home')</a></li>
                            <li class="breadcrumb-item active">@lang('admin.notice') @lang('admin.list')</li>
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
                                <h4 class="card-title">@lang('admin.notice') @lang('admin.export')</h4>
                                <h6 class="card-subtitle"></h6>
                                 <div class="pull-left">
                             </div>
                                 <div class="pull-right">
                                 <button onclick="showAjaxModal('{{url('')}}/admin/new/notice')" class="btn btn-primary btn-bg">@lang('admin.new') @lang('admin.notice')</button>
                             </div>
                                <div class="table-responsive m-t-40">
                                    <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>@lang('admin.title')</th>
                                                <th>@lang('admin.describe')</th>
                                                 <th>@lang('admin.audience')</th>
                                               <th>@lang('admin.start-date-time')</th>
                                                <th>@lang('admin.end-date-time')</th>
                                                <th>@lang('admin.option')</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>#</th>
                                                <th>@lang('admin.title')</th>
                                                <th>@lang('admin.describe')</th>
                                                 <th>@lang('admin.audience')</th>
                                               <th>@lang('admin.start-date-time')</th>
                                                <th>@lang('admin.end-date-time')</th>
                                                <th>@lang('admin.option')</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                        @foreach(\App\Noticeboard::latest()->get() as $expense)
                                            <tr>
                                                <td>{{$loop->iteration}}</td>
                                                <td>{{$expense->title}}</td>
                                                <td>{{$expense->description}}</td>
                                                <td>
                                                  @if($expense->status==0)
                                                  @lang('admin.staff'), @lang('admin.student'), @lang('admin.parent'), @lang('admin.guardian'), @lang('admin.other')
                                                  @elseif($expense->status==1)
                                                 @lang('admin.staff') @lang('admin.only')
                                                  @elseif($expense->status==2)
                                                   @lang('admin.student') @lang('admin.only')
                                                  @elseif($expense->status==3)
                                                  @lang('admin.parent') @lang('admin.guardian') @lang('admin.only')
                                                  @elseif($expense->status==4)
                                                  @lang('admin.other')
                                                  @endif
                                                </td>
                    <td>{{\Carbon\Carbon::parse($expense->sdate)->toFormattedDateString()}}</td>
                    <td>{{\Carbon\Carbon::parse($expense->edate)->toFormattedDateString()}}</td>
                    <td><div class="btn-group">
<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="ti-settings"></i></button>
     <div class="dropdown-menu ">
                <a onclick="showAjaxModal('{{url('')}}/edit/notice/old/{{$expense->id}}')" class="dropdown-item" href="javascript:void(0)">@lang('admin.edit')</a>
                <a class="dropdown-item" onclick="deletenotice('{{$expense->id}}')" href="javascript:void(0)">@lang('admin.delete')</a>
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
               function deletenotice(id)
              {
                if(confirm("@lang('admin.confirm_delete')")){ 
                $.get('{{url('')}}/delete/notice/'+id,function(data)
                {
                if(data==0){
                  swal("@lang('admin.account_delete')", "@lang('admin.continue-button')", "success");
                    window.location.assign('{{url('')}}/admin/page.fmp?page=58');
                }
            else{
                     swal("@lang('admin.error_delete')", "@lang('admin.continue-button')", "error");
                    }     
                });
            }
              }
          </script>
                @endsection