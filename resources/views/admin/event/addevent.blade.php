<div class="row">
                    <div class="col-sm-12">
                        
                        <div class="card card-body">
                            <h4 class="card-title">@lang('admin.new_event')</h4>
                            <h6 class="card-subtitle">@lang('admin.add_new_event')</h6>
<form class="" action="{{url('')}}/add/event/create" enctype="multipart/form-data" method="post">
     {{ csrf_field() }}
      <div class="row">
        <div class="col-md-6">
                             <div class="form-group">
            <label for="example-email">@lang('admin.event_title') *<span class="help"></span></label>
      <input type="text" required class="form-control" name="title">
                                </div>
                            </div>
             <div class="col-md-6">
                 <div class="form-group">
            <label for="example-email">@lang('admin.event_venue') *<span class="help"></span></label>
      <input type="text" required class="form-control" name="venue">
                                </div>
             </div>
         </div>
                                 <div class="form-group">
            <label for="example-email">@lang('admin.event_describe')<span class="help"></span></label>
     <textarea class="form-control" rows="5" name="description"></textarea>
                                </div>
            <input type="hidden" value="" name="color">
                                 <div class="form-group">
            <label for="example-email">@lang('admin.start-date-time') *<span class="help"></span></label>
   <div class="input-group">
    <input type="date" class="form-control mdate" name="sdate">
    <input type="time" class="form-control mtime" name="stime">
   </div>
                                </div>
                                <div class="form-group">
            <label for="example-email">@lang('admin.end-date-time') *<span class="help"></span></label>
   <div class="input-group">
    <input type="date" class="form-control mdate" name="edate">
    <input type="time" class="form-control mtime" name="etime">
   </div>
                                </div>
                                 <div class="form-group">
            <label for="example-email">@lang('admin.event_banner') *<span class="help"></span></label>
    <input type="file" class="form-control" name="file">
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
         $('.mdate').bootstrapMaterialDatePicker({
        weekStart: 0,
        time: false
    });
         $('.mtime').bootstrapMaterialDatePicker({
       date: false,
        shortTime: false,
        format: 'HH:mm'
    });
    </script>