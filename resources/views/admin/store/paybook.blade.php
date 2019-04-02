@extends('layouts.admin')
@section('content')

    <div class="row page-titles">
                    <div class="col-md-6 col-8 align-self-center">
                        <h3 class="text-themecolor">@lang('admin.book') @lang('admin.purchase')</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{url('')}}/admin/page.fmp?page=1">@lang('admin.home')</a></li>
                            <li class="breadcrumb-item active">@lang('admin.book') @lang('admin.purchase')</li>
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
                                <h4 class="card-title">@lang('admin.book') @lang('admin.purchase') @lang('admin.export')</h4>
                                <h6 class="card-subtitle"></h6>
                                 <div class="pull-left">
                               
                             </div>
                                <div class="table-responsive m-t-40">
                                    <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>@lang('admin.student_id')</th>
                                                <th>@lang('admin.student_name')</th>
                                                 <th>@lang('admin.class')</th>
                                                 <th>@lang('admin.total') @lang('admin.book') @lang('admin.order')</th>
                                               <th>@lang('admin.purchase') @lang('admin.date')</th>
                                               <th>@lang('admin.giveout')</th>
                                                <th>@lang('admin.option')</th>  
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>#</th>
                                                <th>@lang('admin.student_id')</th>
                                                <th>@lang('admin.student_name')</th>
                                                 <th>@lang('admin.class')</th>
                                                 <th>@lang('admin.total') @lang('admin.book') @lang('admin.order')</th>
                                               <th>@lang('admin.purchase') @lang('admin.date')</th>
                                               <th>@lang('admin.giveout')</th>
                                                <th>@lang('admin.option')</th>  
                                            </tr>
                                        </tfoot>
                                        <tbody>
                        @foreach(\App\Payment::latest()->get() as $class)
                                            <tr>
                                                <td>{{$loop->iteration}}</td>
                                <td>{{\App\Student::findOrFail($class->student_id)->user_id}}</td>
                                <td>{{\App\User::findOrFail(\App\Student::findOrFail($class->student_id)->data_id)->name}}</td>
                    <td>{{\App\Course::findOrFail(\App\Student::findOrFail($class->student_id)->class)->title}}</td>
                  
                        <td style="text-align: center;">{{count(\App\Payitem::where('pay_id',$class->id)->get())}}</td>
                     
                        <td>{{\Carbon\Carbon::parse($class->created_at)->toFormattedDateString()}}</td>
                        <td>
@if(count(\App\Payitem::where('pay_id',$class->id)->get())==count(\App\Payitem::where('pay_id',$class->id)->where('give_status','1')->get()))
 <button onclick="showAjaxModal('{{url('')}}/give/book/payment/{{$class->id}}')" class="btn btn-success btn-sm btn-block"><i class="fa fa-book"></i>@lang('admin.order') @lang('admin.released')</button>
 @elseif(count(\App\Payitem::where('pay_id',$class->id)->get())>count(\App\Payitem::where('pay_id',$class->id)->where('give_status','1')->get()))
                            <button onclick="showAjaxModal('{{url('')}}/give/book/payment/{{$class->id}}')" class="btn btn-warning btn-sm btn-block"><i class="fa fa-book"></i>@lang('admin.order') @lang('admin.giveout')</button>
                        @endif
                    </td>
                <td>
                     
                <button onclick="showAjaxModal('{{url('')}}/view/book/payment/{{$class->id}}')" class="btn btn-info btn-sm btn-block"><i class="fa fa-eye"></i> @lang('admin.order') @lang('admin.receipt')</button></td>
                                            </tr>
                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
          
@endsection