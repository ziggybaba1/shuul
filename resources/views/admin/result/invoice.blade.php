<div class="row">
                    <div class="col-md-12">
                        <div id="content-inv" class="card card-body">
                            <h3><b>INVOICE</b> <span class="pull-right">#5669626</span></h3>
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
                                            <h5>To,</h5>
                                            <h6 class="font-bold">{{\App\Student::find($id)->gname}} {{\App\Student::find($id)->fname}},</h6>
                                            <p class="text-muted m-l-30">{{\App\Student::find($id)->user_id}}</p>
                                            <p class="m-t-30"><b>Invoice Date :</b> <i class="fa fa-calendar"></i> 
             @if(count(\App\Invoice::where('class_id',\App\Student::find($id)->class)->get())>0)
                                        {{\Carbon\Carbon::parse(\App\Invoice::where('class_id',\App\Student::find($id)->class)->latest()->first()->inv_date)->toFormattedDateString()}}
                                        @endif
                                    </p>
                                            <p><b>Due Date :</b> <i class="fa fa-calendar"></i>
                                @if(count(\App\Invoice::where('class_id',\App\Student::find($id)->class)->get())>0)
                            {{\Carbon\Carbon::parse(\App\Invoice::where('class_id',\App\Student::find($id)->class)->latest()->first()->due_date)->toFormattedDateString()}}
                                                @endif
                                            </p>
                                        </address>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="table-responsive m-t-40" style="clear: both;">
                                        <table class="table table-hover">
                                            <thead>
                                                <tr>
                                                   <th class="text-center">#</th>
                                                    <th>Description</th>
                                                    <th class="text-right">Total</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                        @foreach(\App\Fee::where('class',$class)->where('term',$term)->get() as $invoice)
                                                <tr>
                                                    <td class="text-center">1</td>
                                                    <td>{{$invoice->name}}</td>
                                                    <td class="text-right">{{$invoice->price}}</td>
                                                </tr>
                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="pull-right m-t-30 text-right">
                                        <hr>
                                        <h3><b>Total :</b> {{\App\Currency::find(\App\Setting::first()->currency)->symbol}}{{\App\Fee::where('class',$class)->where('term',$term)->sum('price')}}</h3>
                                    </div>
                                    <div class="clearfix"></div>
                                    <hr>
                                    <div class="text-right">
                                        <button onclick="printpago('content-inv')" class="btn btn-default btn-outline" type="button"> <span><i class="fa fa-print"></i> Print</span> </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>