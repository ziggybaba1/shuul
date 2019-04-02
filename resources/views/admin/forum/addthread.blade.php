
 <div class="row">
                    <div class="col-sm-12">
                        <div class="card card-body">
                            <h4 class="card-title">{{\App\Forum::find($id)->title}} @lang('admin.topic')</h4>
                            <h6 class="card-subtitle">@lang('admin.add') {{\App\Forum::find($id)->title}} @lang('admin.topic')</h6>
<form class="" action="{{url('')}}/add/new/thread/{$id}" method="post">
     {{ csrf_field() }}
     <div class="row">
      <div class="col-md-8">
      <div class="form-group">
        <label>@lang('admin.thread_title')</label>
        <input type="text" class="form-control" name="title">
      </div>
    </div>
    <div class="col-md-4">
      <div class="form-group">
        <label>@lang('admin.status')</label>
       <select class="form-control" name="status">
         <option value="Publish">@lang('admin.publish')</option>
         <option value="Pending">@lang('admin.pending')</option>
       </select>
      </div>
    </div>
  </div>
      <div class="form-group">
        <label>@lang('admin.content')</label>
       <textarea class="form-control mymce" name="content"></textarea>
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
   $(document).ready(function() {
            $('.select2').select2();
            $('.mymce').summernote({
            
            minHeight: 500, // set minimum height of editor
            maxHeight: 500, // set maximum height of editor
            focus: false // set focus to editable area after initializing summernote
        });
         });
</script>
