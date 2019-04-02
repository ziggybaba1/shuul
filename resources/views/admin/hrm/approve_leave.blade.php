<div class="card card-body">
                            <h4 class="card-title">@lang('admin.staff') {{\App\Teacher::find(\App\Leave::find($id)->user_id)->gname}} {{\App\Teacher::find(\App\Leave::find($id)->user_id)->fname}} @lang('admin.leave') @lang('admin.request')</h4>
                            <h6 class="card-subtitle">@lang('admin.change') @lang('admin.staff') @lang('admin.leave') @lang('admin.request')</h6>
<form action="{{url('')}}/approve/employee/request/{{$id}}" enctype="multipart/form-data" method="post" class="form-horizontal m-t-40">
                                 {{ csrf_field() }} 
                      <div class="form-group">
            <label for="example-email">@lang('admin.staff_name') *<span class="help"></span></label>
          <input type="text" class="form-control" readonly value="{{\App\Teacher::find(\App\Leave::find($id)->user_id)->gname}} {{\App\Teacher::find(\App\Leave::find($id)->user_id)->fname}}" name="">
                                </div>
                             <div class="form-group">
            <label for="example-email">@lang('admin.start-date-time') *<span class="help"></span></label>
               <input name="sdate" value="{{\Carbon\Carbon::parse(\App\Leave::find($id)->date)->toFormattedDateString()}}" type="text" va required id="example-email"  class="form-control mdate" >
                                </div>
                                  <div class="form-group">
            <label for="example-email">@lang('admin.end-date-time') *<span class="help"></span></label>
               <input name="edate"  value="{{\Carbon\Carbon::parse(\App\Leave::find($id)->rdate)->toFormattedDateString()}}" type="text" required id="example-email"  class="form-control mdate" >
                                </div>
                                 <div class="form-group">
            <label for="example-email">@lang('admin.reason') *<span class="help"></span></label>
              <textarea class="form-control" rows="7" name="reason">{{\App\Leave::find($id)->reason}}</textarea>
                                </div>
                                <div class="form-group">
            <label for="example-email">@lang('admin.status') *<span class="help"></span></label>
             <select required class="form-control" name="status">
               <option value="">@lang('admin.select') @lang('admin.status')</option>
               <option value="1">@lang('admin.approve')</option>
               <option value="2">@lang('admin.decline')</option>
             </select>
                                </div>

                               
                               <div class="form-group">
                            <input type="submit" class="form-control btn btn-primary" value="@lang('admin.submit')">
                                </div>
                            </form>
                        </div>
        
           <script type="text/javascript">
             $(document).ready(function() {
               $('.mdate').bootstrapMaterialDatePicker({
        weekStart: 0,
        time: false
    });
          $(".select2").select2();
          $('#hido').hide();
          $("#status").change(function(){
  var id = $(this).find("option:selected").attr("id");

  switch (id){
    case "nill":
      $('#hido').hide();
      break;
       case "teach":
      $('#hido').show();
      break;
       case "non":
      $('#hido').hide();
      break;
  }
});
             });
           </script>