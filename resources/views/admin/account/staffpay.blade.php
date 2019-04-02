 @extends('layouts.admin')
@section('content')

    <div class="row page-titles">
                    <div class="col-md-5 col-8 align-self-center">
                        <h3 class="text-themecolor">@lang('admin.salary_pay')</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{url('')}}/admin/page.fmp?page=1">@lang('admin.home')</a></li>
                            <li class="breadcrumb-item active">@lang('admin.salary_pay')</li>
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
                                <h4 class="card-title">@lang('admin.salary_pay')</h4>
                                <h6 class="card-subtitle">@lang('admin.event-list-data')</h6>
                                <div class="table-responsive m-t-40">
        <table id="example23" class="display nowrap table  table-bordered" cellspacing="0" width="100%">
                                       <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>@lang('admin.staff_id')</th>
                                                <th>@lang('admin.name')</th>
                                                <th>@lang('admin.last_pay')</th>
                                                <th>@lang('admin.salary')</th>
                                                <th>@lang('admin.salary')</th>
                                                <th>@lang('admin.salary')</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                               <th>#</th>
                                                <th>@lang('admin.staff_id')</th>
                                                <th>@lang('admin.name')</th>
                                                <th>@lang('admin.last_pay')</th>
                                                <th>@lang('admin.salary')</th>
                                                <th>@lang('admin.salary')</th>
                                                <th>@lang('admin.salary')</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
@if(\Auth::user()->role=='admin'||\Auth::user()->role=='account'||\App\Role::where('staff_id',\Auth::user()->id)->first()->payroll=='1')
@foreach(\App\Teacher::where('status','0')->get() as $class)
                                            <tr>
<td>{{$loop->iteration}}</td>
<td>{{$class->user_id}}</td>
<td>{{$class->gname}} {{$class->fname}} </td>
<td>
@if(count(\App\Pay::where('staff_id',$class->id)->get())>0)
{{\Carbon\Carbon::parse(\App\Pay::where('staff_id',$class->id)->latest()->first()->date)->toFormattedDateString()}}
@else
@lang('admin.no_pay')
@endif
</td>
<td>{{\App\Currency::find(\App\Setting::first()->currency)->symbol}}{{\App\Salary::where('user_id',$class->id)->sum('price')}}</td>
<td>
<button onclick="showAjaxModal('{{url('')}}/make/staff/payment/{{$class->id}}')" class="btn btn-primary">@lang('admin.payment')</button>
</td>
<td><button onclick="showAjaxModal('{{url('')}}/show/staff/payment/{{$class->id}}')" class="btn btn-info">@lang('admin.detail')</button></td>
                                            </tr>
                        @endforeach
                        @else
@foreach(\App\Teacher::where('user_table',\Auth::user()->id)->get() as $class)
                                            <tr>
<td>{{$loop->iteration}}</td>
<td>{{$class->user_id}}</td>
<td>{{$class->gname}} {{$class->fname}} </td>
<td>
@if(count(\App\Pay::where('staff_id',$class->id)->get())>0)
{{\Carbon\Carbon::parse(\App\Pay::where('staff_id',$class->id)->latest()->first()->date)->toFormattedDateString()}}
@else
@lang('admin.no_pay')
@endif
</td>
<td>{{\App\Currency::find(\App\Setting::first()->currency)->symbol}}{{\App\Salary::where('user_id',$class->id)->sum('price')}}</td>
<td>

</td>
<td><button onclick="showAjaxModal('{{url('')}}/show/staff/payment/{{$class->id}}')" class="btn btn-info">@lang('admin.detail')</button></td>
                                            </tr>
                        @endforeach
                        @endif
                                        </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</div>
<script type="text/javascript">
     $('#example23').DataTable({
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    });
</script>
@endsection