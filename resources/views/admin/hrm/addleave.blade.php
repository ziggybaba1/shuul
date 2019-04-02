<div class="card card-body">
                            <h4 class="card-title">@lang('admin.staff') @lang('admin.leave') @lang('admin.request')</h4>
                            <h6 class="card-subtitle">@lang('admin.add') @lang('admin.add') @lang('admin.leave') @lang('admin.request')</h6>
<form action="{{url('')}}/create/leave/request" enctype="multipart/form-data" method="post" class="form-horizontal m-t-40">
                                 {{ csrf_field() }}
                                 <div class="row">
                                  <div class="col-md-8"> 
                      <div class="form-group">
            <label for="example-email">@lang('admin.staff_name') *<span class="help"></span></label>
          <select name="staff" class="form-control">
      <option value="{{\App\Teacher::where('user_table',\Auth::user()->id)->first()->id}}">{{\Auth::user()->name}}</option>
            
            </select>
                                </div>
                              </div>
                                <div class="col-md-4">
                             <div class="form-group">
            <label for="example-email">@lang('admin.start-date-time') *<span class="help"></span></label>
               <input name="sdate" type="text" required id="example-email"  class="form-control mdate" >
                                </div>
                              </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                  <div class="form-group">
            <label for="example-email">@lang('admin.end-date-time') *<span class="help"></span></label>
               <input name="edate" type="text" required id="example-email"  class="form-control mdate" >
                                </div>
                              </div>
                                <div class="col-md-4">
                                  <div class="form-group">
            <label for="example-email">@lang('admin.session') *<span class="help"></span></label>
               <input name="session"  readonly value="{{\App\Session::latest()->first()->session}}" type="text" required id="example-email"  class="form-control" >
                                </div>
                              </div>
                                <div class="col-md-4">
                                <div class="form-group">
            <label for="example-email">@lang('admin.term') <span class="help"></span></label>
               <input name="term" type="text" readonly value="{{\App\Session::latest()->first()->terms}}"  class="form-control" >
                                </div>
                               </div>
                             </div>
                              <div class="form-group">
            <label for="example-email">@lang('admin.reason') *<span class="help"></span></label>
              <textarea class="form-control" rows="5" required name="reason"></textarea>
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