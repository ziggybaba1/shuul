 @extends('layouts.admin')
@section('content')

                <!-- ============================================================== -->
                <!-- Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
               <div class="row page-titles">
                    <div class="col-md-5 col-8 align-self-center">
                        <h3 class="text-themecolor">@lang('admin.hostel')</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{url('')}}/admin/page.fmp?page=1">@lang('admin.home')</a></li>
                            <li class="breadcrumb-item active">@lang('admin.hostel')</li>
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
                                <h4 class="card-title">@lang('admin.hostel') @lang('admin.export')</h4>
                                <h6 class="card-subtitle">@lang('admin.hostel_list')</h6>
                                 <div class="pull-left">
                               
                             </div>
                                 <div class="pull-right">
                                 <button data-toggle="modal" data-target=".bs-example-modal-lg" class="btn btn-primary btn-bg text-white">@lang('admin.add_hostel')</button>
                             </div>
                                <div class="table-responsive m-t-40">
                                    <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>@lang('admin.name')</th>
                                                <th>@lang('admin.address')</th>
                                                <th>@lang('admin.code')</th>
                                                <th>@lang('admin.capacity')</th>
                                                <th>@lang('admin.block')</th>
                                                <th>@lang('admin.total_room')</th>
                                                 <th>@lang('admin.total_bed')</th>
                                                 <th>@lang('admin.total_student')</th>
                                                <th>@lang('admin.date_create')</th>
                                               <th>@lang('admin.option')</th> 
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                              <th>#</th>
                                                <th>@lang('admin.name')</th>
                                                <th>@lang('admin.address')</th>
                                                <th>@lang('admin.code')</th>
                                                <th>@lang('admin.capacity')</th>
                                                <th>@lang('admin.block')</th>
                                                <th>@lang('admin.total_room')</th>
                                                 <th>@lang('admin.total_bed')</th>
                                                 <th>@lang('admin.total_student')</th>
                                                <th>@lang('admin.date_create')</th>
                                               <th>@lang('admin.option')</th> 
                                            </tr>
                                        </tfoot>
                                        <tbody>
                        @foreach(\App\Dormitory::all() as $class)
                                            <tr>
                                                <td>{{$loop->iteration}}</td>
                                                <td>{{$class->name}}</td>
                                                <td>{{$class->address}}</td>
                                                <td>{{$class->code}}</td>
                                                 <td>{{$class->capacity}}</td>
                                                <td>{{$class->blocks}}</td>
    <td>{{count(\App\Room::where('dorm_id',$class->id)->get())}}</td>
        <td>{{count(\App\Bed::where('dorm_id',$class->id)->get())}}</td>
        <td>{{count(\App\Allocate::where('dorm_id',$class->id)->get())}}</td>
                        <td>{{\Carbon\Carbon::parse($class->created_at)->toFormattedDateString()}}</td>
                    <td><div class="btn-group">
<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="ti-settings"></i></button>
     <div class="dropdown-menu ">
                <a onclick="showAjaxModal('{{url('')}}/add/bed/hostel/{{$class->id}}')" class="dropdown-item" href="javascript:void(0)">@lang('admin.add_room')</a>
                <a onclick="showAjaxModal('{{url('')}}/edit/hostel/info/{{$class->id}}')" class="dropdown-item" href="javascript:void(0)">@lang('admin.edit')</a>
                <a class="dropdown-item" onclick="deletehostel('{{$class->id}}')" href="javascript:void(0)">@lang('admin.delete')</a>
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
                <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title" id="myLargeModalLabel">{{\App\Provider::first()->name}}</h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                            </div>
                                            <div class="modal-body">
                                              <div class="row">
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-body">
<h4 class="card-title">@lang('admin.add_hostel')</h4>
                <h6 class="card-subtitle"></h6>
    <form action="{{url('')}}/add/new/hostel" method="post" enctype="multipart/form-data" class="">
         {{ csrf_field() }}
         <div class="row">
                        <div class="col-md-6">
                                      <div class="form-group">
                                         <label>@lang('admin.hostel') @lang('admin.name')</label>
                                        <input type="text" class="form-control" name="name">
                                      </div>   
                            </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                         <label>@lang('admin.hostel') @lang('admin.address')</label>
                                        <input type="text" class="form-control" name="address">
                                      </div>   
                                </div>
                                       
                                    </div>
        <div class="row">
                        <div class="col-md-4">
                                      <div class="form-group">
                                         <label>@lang('admin.hostel') @lang('admin.code')</label>
                                        <input type="text" class="form-control" name="code">
                                      </div>   
                                        </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                         <label>@lang('admin.hostel_capacity')</label>
                                        <input type="number" class="form-control" name="capacity">
                                      </div>   
                                        </div>
                                        <div class="col-md-4">
                                           <div class="form-group">
                                         <label>@lang('admin.hostel_block')</label>
                                        <input type="text" class="form-control" name="block">
                                      </div>   
                                        </div>
                                    </div>
                                     <div class="row">
                                        <div class="col-md-2"></div>
                                    <div class="col-md-8">
                      <input type="submit" class="form-control btn btn-primary btn-block text-white" value="@lang('admin.submit')">
                                     </div>
                                        <div class="col-md-2"></div>
                                    </div>
                                  </form>
                        </div>
                    </div>
                </div>
            </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-danger waves-effect text-left" data-dismiss="modal">@lang('admin.close')</button>
                                            </div>
                                        </div>
                                        <!-- /.modal-content -->
                                    </div>
                                    <!-- /.modal-dialog -->
                                </div>
          <script type="text/javascript">
              function deletehostel(id)
              {
                if(confirm("@lang('admin.confirm_delete')")){ 
                $.get('{{url('')}}/delete/hostel/'+id,function(data)
                {
               if(data==0){
                  swal("@lang('admin.account_delete')", "@lang('admin.continue-button')", "success");
                    window.location.assign('{{url('')}}/admin/page.fmp?page=71');
                }
            else{
                     swal("@lang('admin.error_delete')", "@lang('admin.continue-button')", "error");
                    }      
                });
            }
              }
          </script>
                @endsection