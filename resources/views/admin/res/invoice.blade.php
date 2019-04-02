@extends('layouts.admin')
@section('content')
<div class="row page-titles">
                    <div class="col-md-5 col-8 align-self-center">
                        <h3 class="text-themecolor">{{\App\Student::find($id)->gname}} {{\App\Student::find($id)->fname}} @lang('admin.payment')</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{url('')}}/admin/page.fmp?page=1">@lang('admin.home')</a></li>
                             <li class="breadcrumb-item"><a href="{{url('')}}/admin/page.fmp?page=13">@lang('admin.student') @lang('admin.list')</a></li>
                            <li class="breadcrumb-item active">{{\App\Student::find($id)->gname}} {{\App\Student::find($id)->fname}} @lang('admin.payment')</li>
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
  <div class="col-md-12">
  <div class="card">
<div class="card-body">
                                   <h4 class="card-title">{{\App\Student::find($id)->gname}} @lang('admin.payment') @lang('admin.history')</h4>
                                <h6 class="card-subtitle">@lang('admin.event-list-data')</h6>
                         
                                <div class="table-responsive m-t-40">
                                    <table id="example24" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                               <th>#</th>
                                                <th>@lang('admin.student_id')</th>
                                                <th>@lang('admin.student')</th>
                                                <th>@lang('admin.payment_id')</th>
                                                <th>@lang('admin.session')</th>
                                                <th>@lang('admin.term')</th>
                                                <th>@lang('admin.date_pay_made')</th>
                                                 <th>@lang('admin.print') @lang('admin.receipt')</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                              <th>#</th>
                                                 <th>@lang('admin.student_id')</th>
                                                <th>@lang('admin.student')</th>
                                                <th>@lang('admin.payment_id')</th>
                                                <th>@lang('admin.session')</th>
                                                <th>@lang('admin.term')</th>
                                                <th>@lang('admin.date_pay_made')</th>
                                                 <th>@lang('admin.print') @lang('admin.receipt')</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
      @foreach(\App\Payment::where('student_id',$id)->get() as $payment)
                                            <tr>
                                              <td>{{$loop->iteration}}</td>
                                    <td>{{\App\Student::find($id)->user_id}}</td>
                                    <td>{{\App\Student::find($id)->gname}} {{\App\Student::find($id)->fname}}</td>
                <td>{{$payment->receipt_id}}</td>
                   <td>{{$payment->session}}</td>
                   <td>{{$payment->term}}</td>
                   <td>{{\Carbon\Carbon::parse($payment->created_at)->toFormattedDateString()}}</td>
                    <td><a onclick="showAjaxModal('{{url('')}}/view/invoice/payment/{{$id}}')" class="btn btn-primary btn-sm btn-block"><i class="fa fa-book"></i>@lang('admin.print') @lang('admin.receipt')</a></td>
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