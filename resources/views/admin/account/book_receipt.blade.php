<div class="row">
                    <div class="col-md-12">
                        <div id="content-main" class="card card-body">
                            <h3><b>@lang('admin.book_receipt')</b> <span class="pull-right">#{{\App\Payment::find($id)->receipt_id}}{{\App\Student::find(\App\Payment::find($id)->student_id)->user_id}}</span></h3>
                           
                            <hr>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="pull-left">
                                        <address>
                                            <h6> &nbsp;<b class="text-danger">{{\App\Provider::first()->name}}</b></h6><br>
                                            <h6 class="text-muted m-l-2">{{\App\Provider::first()->address}}
                                                <br/>{{\App\Provider::first()->phone1}}</h6>
                                        </address>
                                    </div>
                                    <div class="pull-right text-right">
                                        <address>
                                            <h5>@lang('admin.to'),</h5>
                                            <h6 class="font-bold">{{\App\Student::find(\App\Payment::find($id)->student_id)->gname}} {{\App\Student::find(\App\Payment::find($id)->student_id)->fname}},</h6>
                                            <p class="text-muted m-l-30">{{\App\Student::find(\App\Payment::find($id)->student_id)->user_id}}</p>
                                            <p class="m-t-30"><b>@lang('admin.pay_date') :</b> <i class="fa fa-calendar"></i>{{\Carbon\Carbon::parse(\App\Payment::find($id)->created_at)->toFormattedDateString()}}</p>
                                        </address>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="table-responsive m-t-40" style="clear: both;">
                                        <table class="table table-hover">
                                            <thead>
                                                <tr>
                                                    <th class="text-center">#</th>
                                                    <th>@lang('admin.description')</th>
                                                    <th class="text-right">@lang('admin.total')</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                            @foreach(\App\Payitem::where('pay_id',$id)->get() as $list)
                                                <tr>
                                                    <td class="text-center">{{$loop->iteration}}</td>
                                                    <td>{{\App\Bookassign::find($list->item_id)->name}}</td>
                                                    <td class="text-right">{{\App\Currency::find(\App\Setting::first()->currency)->symbol}}{{\App\Bookassign::find($list->item_id)->price}}</td>
                                                </tr>
                                    @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="pull-right m-t-30 text-right">
                                        <p>@lang('admin.sub_total') {{\App\Currency::find(\App\Setting::first()->currency)->symbol}}{{\App\Payment::find($id)->amount}}</p>
                                        <hr>
                                        <h3><b>@lang('admin.total'):</b> {{\App\Currency::find(\App\Setting::first()->currency)->symbol}}{{\App\Payment::find($id)->amount}}</h3>
                                    </div>
                                    <div class="clearfix"></div>
                                    <hr>
                                    <div class="text-right">
                                        <button onclick="printpage()" class="btn btn-default btn-outline" type="button"> <span><i class="fa fa-print"></i>@lang('admin.print_receipt')</span> </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>