<div class="row">
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-body">
<h4 class="card-title">@lang('admin.gen_inv') {{\App\Course::find($id)->title}}</h4>
                <h6 class="card-subtitle"></h6>
    <form action="{{url('')}}/manage/generate/invoice/{{$id}}" method="post" enctype="multipart/form-data" class="">
         {{ csrf_field() }}
         <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                              <label>@lang('admin.invoice_id')</label>
        <input value="{{\Carbon\Carbon::now()->format('di').\mt_rand(00, 99)}}" type="text" class="form-control" name="token">
                            </div>
                            </div>
                            <div class="col-md-6">
                             <div class="form-group">
                              <label>@lang('admin.class')</label>
                   <select class="form-control" name="class">
                       <option value="{{$id}}">{{\App\Course::find($id)->title}}</option>
                   </select>
                            </div>
                        </div>  
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                             <div class="form-group">
                              <label>@lang('admin.session')</label>
            <select class="form-control" name="session">
            <option>{{\Carbon\Carbon::today()->addYear(0)->format('Y')}}/{{\Carbon\Carbon::today()->addYear(1)->format('Y')}}</option> 
             <option>{{\Carbon\Carbon::today()->addYear(-1)->format('Y')}}/{{\Carbon\Carbon::today()->addYear(0)->format('Y')}}</option>    
            </select>
                            </div>
                            </div>
                        <div class="col-md-6"> 
                            <div class="form-group">
                             <label>@lang('admin.term')</label>
            <select class="form-control" name="term">
            <option value="First">@lang('admin.first_term')</option> 
             <option value="Second">@lang('admin.second_term')</option>
              <option value="Third">@lang('admin.third_term')</option>
              <option value="Fourth">@lang('admin.fourth_term')</option>    
            </select>
                            </div> 
                        </div>
                            </div>
            <div class="row">
                        <div class="col-md-6">
                             <div class="form-group">
                              <label>@lang('admin.invoice_date')</label>
                             <input type="text" class="form-control mdate" name="inv_date">
                            </div>
                            </div>
                        <div class="col-md-6"> 
                            <div class="form-group">
                             <label>@lang('admin.due_date')</label>
                             <input type="text" class="form-control mdate" name="due_date">
                            </div> 
                        </div>
                            </div>
                                     <div class="row">
                                        <div class="col-md-2"></div>
                                    <div class="col-md-8">
                      <input type="submit" class="form-control btn btn-primary btn-block text-white" value="@lang('admin.submit')">
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