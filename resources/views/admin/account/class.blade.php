 <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">{{\App\Course::find($id)->title}} @lang('admin.student_pay') </h4>
                                <h6 class="card-subtitle">@lang('admin.event-list-data')</h6>
                                <div class="table-responsive m-t-40">
        <table id="example23" class="display nowrap table  table-bordered" cellspacing="0" width="100%">
                                       <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>@lang('admin.student_id')</th>
                                                <th>@lang('admin.student')</th>
                                                <th>@lang('admin.total') @lang('admin.amount')</th>
                                                <th>@lang('admin.current') @lang('admin.plan')</th>
                                                <th>@lang('admin.discount')</th>
                                                <th>@lang('admin.analyse')</th>
                                                <th>@lang('admin.pay_ver')</th>
                                                <th>@lang('admin.history')</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                               <th>#</th>
                                               <th>@lang('admin.student_id')</th>
                                                <th>@lang('admin.student')</th>
                                                <th>@lang('admin.total') @lang('admin.amount')</th>
                                                <th>@lang('admin.current') @lang('admin.plan')</th>
                                                <th>@lang('admin.discount')</th>
                                                <th>@lang('admin.analyse')</th>
                                                <th>@lang('admin.pay_ver')</th>
                                                <th>@lang('admin.history')</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
@foreach(\App\Student::where('class',$id)->get() as $class)
                                            <tr>
<td>{{$loop->iteration}}</td>
<td>{{$class->user_id}}</td>
<td>{{$class->gname}} {{$class->fname}} </td>
@if(count(\App\Fpayment::where('student_id',$class->id)->where('session',\App\Session::first()->session)->where('term',\App\Session::first()->terms)->get())>0)
<td>{{\App\Currency::find(\App\Setting::first()->currency)->symbol}}{{\App\Fpayment::where('student_id',$class->id)->where('session',\App\Session::first()->session)->where('term',\App\Session::first()->terms)->first()->pamount}}</td>
<td>{{\App\Plan::find(\App\Fpayment::where('student_id',$class->id)->where('session',\App\Session::first()->session)->where('term',\App\Session::first()->terms)->first()->plan)->name}}</td>
<td>{{\App\Fpayment::where('student_id',$class->id)->where('session',\App\Session::first()->session)->where('term',\App\Session::first()->terms)->first()->discount}}%</td>
@elseif(count(\App\Fpayment::where('student_id',$class->id)->where('session',\App\Session::first()->session)->where('term',\App\Session::first()->terms)->get())==0)
<td></td>
<td></td>

<td></td>

@endif
<td>
@if(count(\App\Fpayment::where('student_id',$class->id)->where('session',\App\Session::first()->session)->where('term',\App\Session::first()->terms)->get())>0)
<button onclick="showAjaxModal('{{url('')}}/analysis/payment/{{$class->id}}')" class="btn btn-dark text-white"> @lang('admin.payment') @lang('admin.analyse')</button>
@elseif(count(\App\Fpayment::where('student_id',$class->id)->where('session',\App\Session::first()->session)->where('term',\App\Session::first()->terms)->get())==0)
No Payment Yet
@endif
</td>
<td>
@if(count(\App\Fpayment::where('student_id',$class->id)->where('session',\App\Session::first()->session)->where('term',\App\Session::first()->terms)->get())>0)
@if(count(\App\Feepay::where('pay_id',\App\Fpayment::where('student_id',$class->id)->where('session',\App\Session::first()->session)->where('term',\App\Session::first()->terms)->first()->id)->get())==count(\App\Feepay::where('pay_id',\App\Fpayment::where('student_id',$class->id)->where('session',\App\Session::first()->session)->where('term',\App\Session::first()->terms)->first()->id)->where('status','1')->get()))
<span class="btn btn-success">@lang('admin.payment') @lang('admin.complete')</span>
@elseif(count(\App\Feepay::where('pay_id',\App\Fpayment::where('student_id',$class->id)->where('session',\App\Session::first()->session)->where('term',\App\Session::first()->terms)->first()->id)->get())!=count(\App\Feepay::where('pay_id',\App\Fpayment::where('student_id',$class->id)->where('session',\App\Session::first()->session)->where('term',\App\Session::first()->terms)->first()->id)->where('status','1')->get()))
<span class="btn btn-warning">@lang('admin.payment') @lang('admin.uncomplete')</span>
@endif
@elseif(count(\App\Fpayment::where('student_id',$class->id)->where('session',\App\Session::first()->session)->where('term',\App\Session::first()->terms)->get())==0)
<button onclick="showAjaxModal('{{url('')}}/accept/payment/{{$class->id}}')" class="btn btn-info">@lang('admin.initiate') @lang('admin.payment')</button>
@endif
</td>
<td>
<button onclick="showAjaxModal('{{url('')}}/list/student/payment/{{$class->id}}')" class="btn btn-primary">@lang('admin.payment') @lang('admin.history')</button>
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
<script type="text/javascript">
     $('#example23').DataTable({
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    });
     
</script>