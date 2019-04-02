<div class="row">
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-body">
<h4 class="card-title">{{\App\Teacher::find($id)->gname}} {{\App\Teacher::find($id)->fname}} @lang('admin.salary_pay')</h4>
                <h6 class="card-subtitle"></h6>
    <form action="{{url('')}}/add/staff/payment/{{$id}}" method="post" enctype="multipart/form-data" class="">
         {{ csrf_field() }}
         <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                              <label>@lang('admin.name')</label>
                             <input value="{{\App\Teacher::find($id)->gname}} {{\App\Teacher::find($id)->fname}}" type="text" class="form-control" name="name">
                            </div>
                            </div>
                            <div class="col-md-6">
                             <div class="form-group">
                              <label>@lang('admin.date')</label>
                             <input type="text" class="form-control mdate" name="date">
                            </div>
                        </div>  
                    </div>
            <div class="row">
                        <div class="col-md-6">
                             <div class="form-group">
                              <label>@lang('admin.exp_amount') ({{\App\Currency::find(\App\Setting::first()->currency)->symbol}})</label>
                             <input readonly value="{{\App\Salary::where('user_id',$id)->sum('price')}}" type="number" class="form-control" name="amount">
                            </div>
                            </div>
                        <div class="col-md-6"> 
                            <div class="form-group">
                             <label>@lang('admin.duc_amount') ({{\App\Currency::find(\App\Setting::first()->currency)->symbol}})</label>
                             <input value="0" type="number" class="form-control" name="deduct">
                            </div> 
                        </div>
                            </div>
                            <div class="row">
                        <div class="col-md-12">
                             <div class="form-group">
                              <label>@lang('admin.duc_reason')</label>
                           <textarea class="form-control" name="reason"></textarea>
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
            <script type="text/javascript">
                 $('.mdate').bootstrapMaterialDatePicker({
        weekStart: 0,
        time: false
    });
            </script>