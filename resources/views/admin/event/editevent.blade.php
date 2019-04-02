<div class="row">
                    <div class="col-sm-12">
                        
                        <div class="card card-body">
                            <h4 class="card-title">@lang('admin.edit_event')</h4>
                            <h6 class="card-subtitle">@lang('admin.edit_event')</h6>
<form class="" action="{{url('')}}/edit/event/create/{{$id}}" enctype="multipart/form-data" method="post">
     {{ csrf_field() }}
      <div class="row">
        <div class="col-md-6">
                             <div class="form-group">
            <label for="example-email">@lang('admin.event_title') *<span class="help"></span></label>
      <input type="text" required value="{{\App\Event::find($id)->title}}" class="form-control" name="title">
                                </div>
                            </div>
                 <div class="col-md-6">
                     <div class="form-group">
            <label for="example-email">@lang('admin.event_venue') *<span class="help"></span></label>
      <input type="text" required class="form-control" value="{{\App\Event::find($id)->venue}}" name="venue">
                                </div>
                 </div>
             </div>
                                 <div class="form-group">
            <label for="example-email">@lang('admin.event_describe')<span class="help"></span></label>
     <textarea class="form-control" rows="5" name="description">{{\App\Event::find($id)->description}}</textarea>
                                </div>
                                 <div class="form-group">
            <label for="example-email">@lang('admin.start-date-time') *<span class="help"></span></label>
   <div class="input-group">
    <input type="text" value="{{\App\Event::find($id)->sdate}}" class="form-control mdate" name="sdate">
    <input type="text" value="{{\App\Event::find($id)->stime}}" class="form-control mtime" name="stime">
   </div>
                                </div>
                                <div class="form-group">
            <label for="example-email">@lang('admin.end-date-time') *<span class="help"></span></label>
   <div class="input-group">
    <input type="text" value="{{\App\Event::find($id)->edate}}" class="form-control mdate" name="edate">
    <input type="text" value="{{\App\Event::find($id)->etime}}" class="form-control mtime" name="etime">
   </div>
                                </div>
                                 <div class="form-group">
            <label for="example-email">@lang('admin.event_banner') *<span class="help"></span></label>
            <img width="100px" src="{{url('')}}/uploads/avatars/{{\App\Event::find($id)->image}}">
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