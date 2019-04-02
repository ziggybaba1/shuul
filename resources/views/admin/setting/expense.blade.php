 @extends('layouts.admin')
@section('content')

                <!-- ============================================================== -->
                <!-- Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
               <div class="row page-titles">
                    <div class="col-md-5 col-8 align-self-center">
                        <h3 class="text-themecolor">@lang('admin.expense') @lang('admin.list')</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{url('')}}/admin/page.fmp?page=1">@lang('admin.home')</a></li>
                            <li class="breadcrumb-item active">@lang('admin.expense') @lang('admin.list')</li>
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
                                <h4 class="card-title">@lang('admin.expense') @lang('admin.export')</h4>
                                <h6 class="card-subtitle"></h6>
                                 <div class="pull-left">
                               
                             </div>
                              <div class="pull-left">
                                 <button onclick="showAjaxModal('{{url('')}}/add/expense/type')" class="btn btn-info btn-bg"> @lang('admin.new') @lang('admin.expense') @lang('admin.type')</button>
                             </div>
                                 <div class="pull-right">
                                 <button onclick="showAjaxModal('{{url('')}}/admin/new/expenses')" class="btn btn-primary btn-bg">@lang('admin.new') @lang('admin.expense')</button>
                             </div>
                                <div class="table-responsive m-t-40">
                                    <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th>@lang('admin.name')</th>
                                                <th>@lang('admin.invoice') @lang('admin.number')</th>
                                                <th>@lang('admin.date')</th>
                                                <th>@lang('admin.session')</th>
                                                <th>@lang('admin.term')</th>
                                               <th>@lang('admin.expense') @lang('admin.type')</th>
                                                <th>@lang('admin.amount')</th>
                                                <th>@lang('admin.option')</th>
                                                
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                 <th>@lang('admin.name')</th>
                                                <th>@lang('admin.invoice') @lang('admin.number')</th>
                                                <th>@lang('admin.date')</th>
                                                 <th>@lang('admin.session')</th>
                                                <th>@lang('admin.term')</th>
                                               <th>@lang('admin.expense') @lang('admin.type')</th>
                                                <th>@lang('admin.amount')</th>
                                                <th>@lang('admin.option')</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                        @foreach(\App\Expense::latest()->get() as $expense)
                                            <tr>
                                                <td>{{$expense->name}}</td>
                                                <td>{{$expense->invoice}}</td>
                    <td>{{\Carbon\Carbon::parse($expense->date)->toFormattedDateString()}}</td>
                    <td>{{$expense->session}}</td>
                    <td>
                        @if($expense->term==='First')
                                @lang('admin.first_term')
                                @elseif($expense->term==='Second')
                                @lang('admin.second_term')
                                 @elseif($expense->term==='Third')
                                @lang('admin.third_term')
                                 @elseif($expense->term==='Fourth')
                                @lang('admin.fourth_term')
                             @endif
                    </td>
                                                <td>{{$expense->type}}</td>
                                                <td>{{\App\Currency::find(\App\Setting::first()->currency)->symbol}}{{$expense->amount}}</td>
                    <td><div class="btn-group">
<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="ti-settings"></i></button>
     <div class="dropdown-menu animated flipInX">
                <a onclick="showAjaxModal('{{url('')}}/edit/expense/old/{{$expense->id}}')" class="dropdown-item" href="javascript:void(0)">@lang('admin.edit')</a>
                <a class="dropdown-item" onclick="deleteexpense('{{$expense->id}}')" href="javascript:void(0)">@lang('admin.delete')</a>
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
               function deleteexpense(id)
              {
                if(confirm("@lang('admin.confirm_delete')")){ 
                $.get('{{url('')}}/delete/expense/'+id,function(data)
                {
                if(data==0){
                  swal("@lang('admin.account_delete')", "@lang('admin.continue-button')", "success");
                    window.location.assign('{{url('')}}/admin/page.fmp?page=56');
                }
            else{
                     swal("@lang('admin.error_delete')", "@lang('admin.continue-button')", "error");
                    }       
                });
            }
              }
          </script>
                @endsection