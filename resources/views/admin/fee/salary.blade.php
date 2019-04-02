@extends('layouts.admin')
@section('content')

    <div class="row page-titles">
                    <div class="col-md-5 col-8 align-self-center">
                        <h3 class="text-themecolor">@lang('admin.staff_salary')</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{url('')}}/admin/page.fmp?page=1">@lang('admin.home')</a></li>
                            <li class="breadcrumb-item active">@lang('admin.staff_salary')</li>
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
                                <h4 class="card-title">@lang('admin.staff_sal_ex')</h4>
                                <h6 class="card-subtitle">@lang('admin.event-list-data')</h6>
                                <div class="table-responsive m-t-40">
        <table id="example23" class="display nowrap table  table-bordered" cellspacing="0" width="100%">
                                       <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>@lang('admin.staff_id')</th>
                                                <th>@lang('admin.staff_name')</th>
                                                <th>@lang('admin.amount-paid')</th>
                                                <th>@lang('admin.last_pay')</th>
                                                <th>@lang('admin.option')</th>
                                               
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                               <th>#</th>
                                                <th>@lang('admin.staff_id')</th>
                                                <th>@lang('admin.staff_name')</th>
                                                <th>@lang('admin.amount_paid')</th>
                                                <th>@lang('admin.last_pay')</th>
                                                <th>@lang('admin.option')</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                        @forelse(\App\Teacher::all() as $class)
                                            <tr>
                                                <td>{{$loop->iteration}}</td>
                                                <td>{{$class->user_id}}</td>
                                                <td>{{$class->gname}} {{$class->fname}}</td>
                @if(count(\App\Salary::where('user_id',$class->id)->get())>0)
                    <td>{{\App\Salary::where('user_id',$class->id)->latest()->first()->price}}</td>
            @else
            <td>@lang('admin.nill')</td>
            @endif  
            @if(count(\App\Pay::where('staff_id',$class->id)->get())>0)
                    <td>{{\Carbon\Carbon::parse(\App\Pay::where('staff_id',$class->id)->latest()->first()->date)->toFormattedDateString()}}</td>
            @else
            <td>@lang('admin.nill')</td>
            @endif
                     <td><button onclick="showAjaxModal('{{url('')}}/add/salary/class/{{$class->id}}')" class="btn btn-primary btn-sm btn-block"><i class="fa fa-eye"></i>@lang('admin.add_edit_salary')</button></td>
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

@endsection