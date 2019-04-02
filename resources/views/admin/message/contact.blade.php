 @extends('layouts.admin')
@section('content')

                <!-- ============================================================== -->
                <!-- Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
               <div class="row page-titles">
                    <div class="col-md-5 col-8 align-self-center">
                        <h3 class="text-themecolor">@lang('admin.contact')</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{url('')}}/admin/page.fmp?page=1">@lang('admin.home')</a></li>
                            <li class="breadcrumb-item active">@lang('admin.contact')</li>
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
                      @if (session('error'))
                 <div class="alert alert-danger alert-rounded">{{ session('error') }}</div>
                    @endif
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">@lang('admin.contact') @lang('admin.export')</h4>
                                <h6 class="card-subtitle">@lang('admin.contact') @lang('admin.list')</h6>
                                 <div class="pull-left">
                               
                             </div>
                                
                                <div class="table-responsive m-t-40">
                                    <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                 <th>#</th>
                                                <th>@lang('admin.name')</th>
                                                <th>@lang('admin.email')</th>
                                                <th>@lang('admin.title')</th>
                                                <th>@lang('admin.date_create')</th>
                                                <th>@lang('admin.action')</th>
                                               <th>@lang('admin.delete')</th> 
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                 <th>#</th>
                                               <th>@lang('admin.name')</th>
                                                <th>@lang('admin.email')</th>
                                                <th>@lang('admin.title')</th>
                                                <th>@lang('admin.date_create')</th>
                                                <th>@lang('admin.action')</th>
                                               <th>@lang('admin.delete')</th> 
                                            </tr>
                                        </tfoot>
                                        <tbody>
                        @foreach(\App\Contact::latest()->get() as $class)
                                            <tr>
                                                <td>{{$loop->iteration}}</td>
                                                <td>{{$class->name}}</td>
                                                <td>{{$class->email}}</td>
                                                <td>{{$class->subject}}</td>
                                                <td>{{\Carbon\Carbon::parse($class->created_at)->toFormattedDateString()}}</td>

                    <td> 
                  @if($class->status=='0')
                      <a class="btn btn-warning text-white" onclick="showAjaxModal('{{url('')}}/add/contact/reply/{{$class->id}}')" href="javascript:void(0)">@lang('admin.reply') @lang('admin.now')</a>
                      @elseif($class->status=='1')
                       <a class="btn btn-success text-white" onclick="showAjaxModal('{{url('')}}/add/contact/reply/{{$class->id}}')" href="javascript:void(0)">@lang('admin.replied')</a>
                        @elseif($class->status=='2')
                       <a class="btn btn-success text-white" onclick="showAjaxModal('{{url('')}}/add/contact/reply/{{$class->id}}')" href="javascript:void(0)">@lang('admin.replied_but')</a>
                      @endif
                    </td>
                     <td> <a class="btn btn-danger text-white" onclick="deletecontact('{{$class->id}}')" href="javascript:void(0)">@lang('admin.delete')</a></td>
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
                if(confirm('@lang('admin.confirm_delete')')){ 
                $.get('{{url('')}}/delete/reply/'+id,function(data)
                {
                if(data==0){
                if(data==0){
                  swal("@lang('admin.account_delete')", "@lang('admin.continue-button')", "success");
                    window.location.assign('{{url('')}}/admin/page.fmp?page=69');
                }
            else{
                     swal("@lang('admin.error_delete')", "@lang('admin.continue-button')", "error");
                    }   
                });
            }
              }
          </script>
                @endsection