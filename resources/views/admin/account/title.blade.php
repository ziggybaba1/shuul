@extends('layouts.admin')
@section('content')
<style type="text/css">
 .dropdown-menu {
    position: absolute;
    top: 100%;
    left: 0;
    z-index: 1000;
    display: none;
    float: left;
    min-width: 160px;
    padding: 3px 0;
    margin: 2px 0 0;
    list-style: none;
    font-size: 12px;
    background-color: #ffffff;
    border: 1px solid #cccccc;
    border: 1px solid #ebebeb;
    border-radius: 3px;
    -moz-box-shadow: none;
    -webkit-box-shadow: none;
    box-shadow: none;
    background-clip: padding-box;
}
</style>
    <div class="row page-titles">
                    <div class="col-md-5 col-8 align-self-center">
                        <h3 class="text-themecolor">@lang('admin.account_title')</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{url('')}}/admin/page.fmp?page=1">@lang('admin.home')</a></li>
                            <li class="breadcrumb-item active">@lang('admin.account_title')</li>
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
            <button data-toggle="modal" data-target=".bs-example-modal-lg" class="btn btn-primary btn-block">@lang('admin.add_account')</button>
                </div>
                                <h4 class="card-title">@lang('admin.account_list_export')</h4>
                                <h6 class="card-subtitle">@lang('admin.event-list-data')</h6>
                                <div class="table-responsive m-t-40">
        <table id="example23" class="display nowrap table  table-bordered" cellspacing="0" width="100%">
                                       <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>@lang('admin.account_name')</th>
                                                <th>@lang('admin.account_number')</th>
                                                <th>@lang('admin.bank_name')</th>
                                                <th>@lang('admin.sort_code')</th>
                                                 <th>@lang('admin.status')</th>
                                                <th>@lang('admin.option')</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                               <th>#</th>
                                                <th>@lang('admin.account_name')</th>
                                                <th>@lang('admin.account_number')</th>
                                                <th>@lang('admin.bank_name')</th>
                                                <th>@lang('admin.sort_code')</th>
                                                 <th>@lang('admin.status')</th>
                                                <th>@lang('admin.option')</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                        @foreach(\App\Account::all() as $class)
                                            <tr>
                                                <td>{{$loop->iteration}}</td>
                                                <td>{{$class->name}}</td>
                                                 <td>{{$class->number}}</td>
                                                 <td>{{$class->bank}}</td>
                                                <td>{{$class->code}}</td>
                                                <td>
                                            @if($class->status=='1')
                                                @lang('admin.active')
                                            @elseif($class->status=='0')
                                             @lang('admin.pending')
                                            @endif
                                                </td>
                     <td>
                         <div class="btn-group">
                                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="ti-settings"></i>
                                    </button>
                                    <div class="dropdown-menu">
                        <a onclick="showAjaxModal('{{url('')}}/edit/school/account/{{$class->id}}')" class="dropdown-item" href="javascript:void(0)">@lang('admin.edit')</a>
                        <a class="dropdown-item" onclick="deleteaccount('{{$class->id}}')" href="javascript:void(0)">@lang('admin.delete')</a>
                                    </div>
                            </div>
                     </td>
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
<h4 class="card-title">@lang('admin.account_title')</h4>
                <h6 class="card-subtitle"></h6>
    <form action="{{url('')}}/add/school/account" method="post" enctype="multipart/form-data" class="">
         {{ csrf_field() }}
         <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                              <label>@lang('admin.account_name')</label>
                             <input type="text" class="form-control" name="name">
                            </div>
                            </div>
                            <div class="col-md-6">
                             <div class="form-group">
                              <label>@lang('admin.account_number')</label>
                             <input type="text" class="form-control" name="number">
                            </div>
                        </div>  
                    </div>
            <div class="row">
                        <div class="col-md-6">
                             <div class="form-group">
                              <label>@lang('admin.bank_name')</label>
                             <input type="text" class="form-control" name="bank">
                            </div>
                            </div>
                        <div class="col-md-6"> 
                            <div class="form-group">
                             <label>@lang('admin.sort_code')</label>
                             <input type="text" class="form-control" name="code">
                            </div> 
                        </div>
                            </div>
                            <div class="row">
                        <div class="col-md-6">
                             <div class="form-group">
                              <label>@lang('admin.status')</label>
                            <select class="form-control" name="status">
                                <option value="1">@lang('admin.active')</option>
                                <option value="0">@lang('admin.pending')</option>
                            </select>
                            </div>
                            </div>
                            </div>
                                     <div class="row">
                                        <div class="col-md-2"></div>
                                    <div class="col-md-8">
                      <input type="submit" class="form-control btn btn-primary btn-block" value="@lang('admin.submit')">
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
                                    function deleteaccount(id)
              {
                if(confirm("@lang('admin.confirm_delete')")){ 
                $.get('{{url('')}}/delete/account/'+id,function(data)
                {
                if(data==0){
                  swal("@lang('admin.account_delete')", "@lang('admin.continue-button')", "success");
                    window.location.assign('{{url('')}}/admin/page.fmp?page=38');
                }
            else{
                     swal("@lang('admin.error_delete')", "@lang('admin.continue-button')", "error");
                    }    
                });
            }
              }
                                </script>
@endsection