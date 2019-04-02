 <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">{{\App\Course::find($id)->title}} @lang('admin.book') @lang('admin.payment') </h4>
                                <h6 class="card-subtitle">@lang('admin.event-list-data')</h6>
                                <div class="table-responsive m-t-40">
        <table id="example23" class="display nowrap table  table-bordered" cellspacing="0" width="100%">
                                       <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>@lang('admin.student_id')</th>
                                                <th>@lang('admin.student')</th>
                                                <th>@lang('admin.amount') @lang('admin.paid')</th>
                                                 <th>@lang('admin.mode_pay')</th>
                                                <th>@lang('admin.sign')</th>
                                                <th>@lang('admin.pay_ver')</th>
                                                <th>@lang('admin.print_receipt')</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                             <th>#</th>
                                                <th>@lang('admin.student_id')</th>
                                                <th>@lang('admin.student')</th>
                                                <th>@lang('admin.amount') @lang('admin.paid')</th>
                                                 <th>@lang('admin.mode_pay')</th>
                                                <th>@lang('admin.sign')</th>
                                                <th>@lang('admin.pay_ver')</th>
                                                <th>@lang('admin.print_receipt')</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
@foreach(\App\Student::where('class',$id)->get() as $class)
                                            <tr>
<td>{{$loop->iteration}}</td>
<td>{{$class->user_id}}</td>
<td>{{$class->gname}} {{$class->fname}} </td>
<td>{{\App\Currency::find(\App\Setting::first()->currency)->symbol}}{{\App\Payitem::where('class',$class->class)->where('student_id',$class->id)->sum('amount')}}</td>
<td>
    @if(count(\App\Payment::where('class',$class->class)->where('student_id',$class->id)->get())>0)
    {{\App\Payment::where('class',$class->class)->where('student_id',$class->id)->latest()->first()->method}}
    @else
    No Payment Yet
    @endif
</td>
<td>
      @if(count(\App\Payment::where('class',$class->class)->where('student_id',$class->id)->get())>0)
    {{\App\Payment::where('class',$id)->where('student_id',$class->id)->latest()->first()->sign}}
     @else
    No Payment Yet
    @endif
</td>
<td>
      @if(count(\App\Payment::where('class',$class->class)->where('student_id',$class->id)->get())>0)
<button onclick="showAjaxModal('{{url('')}}/accept/bookpayment/{{$class->id}}')" class="btn btn-success btn-sm">@lang('admin.view') @lang('admin.payment')</button>
 @else
   <button onclick="showAjaxModal('{{url('')}}/accept/bookpayment/{{$class->id}}')" class="btn btn-info btn-sm">@lang('admin.accept') @lang('admin.payment')</button>
    @endif
</td>
<td>
     @if(count(\App\Payment::where('class',$class->class)->where('student_id',$class->id)->get())>0)
    <button onclick="showAjaxModal('{{url('')}}/view/book/payment/{{\App\Payment::where('class',$id)->where('student_id',$class->id)->latest()->first()->id}}')" class="btn btn-primary btn-sm btn-block"><i class="fa fa-book"></i>@lang('admin.print_receipt')</button>  
    @endif
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