<div class="row">
                    <div class="col-sm-12">
                        
                        <div class="card card-body">
                            <h4 class="card-title">@lang('admin.staff') @lang('admin.daily_attend')</h4>
                            <h6 class="card-subtitle">@lang('admin.daily_attend')</h6>
<form class="" action="{{url('')}}/add/employee/attendance/{{$id}}" method="post">
     {{ csrf_field() }}
    <div class="row">
       <div  class="col-sm-4">
                             <div id="studentpage" class="form-group">
            <label for="example-email">@lang('admin.staff_name')<span class="help"></span></label>
   <input type="text" class="form-control" readonly value="{{\App\Teacher::find($id)->gname}} {{\App\Teacher::find($id)->fname}}" name="employee">
                                </div>
                              </div>
                    <div class="col-sm-4">
                             <div class="form-group">
            <label for="example-email">@lang('admin.date')<span class="help"></span></label>
          <input type="date" id="mdate" value="{{\Carbon\Carbon::today()}}" class="form-control" name="date">
                                </div>
                              </div>
                              <div class="col-sm-4">
                             <div class="form-group">
  <label for="example-email">@lang('admin.staff') @lang('admin.status')<span class="help"></span></label>
          <select class="form-control" required name="status">
            <option value="">@lang('admin.select') @lang('admin.status')</option>
            <option value="1">@lang('admin.present')</option>
            <option value="0">@lang('admin.absent')</option>
          </select>
                                </div>
                              </div>
             </div>
                         <div class="row">
                          <div class="col-sm-4">
                             <div class="form-group">
            <label for="example-email">@lang('admin.select') @lang('admin.term') <span class="help"></span></label>
           <input type="text" class="form-control" readonly value="{{\App\Session::latest()->first()->terms}}" name="term">
                                </div>
                              </div>
                              <div class="col-sm-4">
                             <div class="form-group">
        <label for="example-email">@lang('admin.select') @lang('admin.session') * (4)<span class="help"></span></label>
            <input type="text" class="form-control" readonly value="{{\App\Session::latest()->first()->session}}" name="session">
                                </div>
                              </div>
                              
                               <div class="col-sm-4">
                             <div class="form-group">
  <label for="example-email">@lang('admin.reason')<span class="help"></span></label>
         <textarea class="form-control" name="reason"></textarea>
                                </div>
                              </div>
             </div>            
             <div class="row">
         <div class="col-sm-3"></div>
                    <div class="col-sm-6">
                 <div class="form-group">
                <input type="submit" required class="form-control btn btn-primary" value="@lang('admin.submit')">
                    </div>  
                </div>
                        </div>
                        </form>
                        </div>
                    </div>
                </div>
    <script type="text/javascript">
         $('#mdate').bootstrapMaterialDatePicker({
        weekStart: 0,
        time: false
    });
    </script>