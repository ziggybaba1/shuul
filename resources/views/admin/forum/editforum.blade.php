
 <div class="row">
                    <div class="col-sm-12">
                         @if (session('message'))
                 <div class="alert alert-info alert-rounded">{{ session('message') }}</div>
                    @endif
                        <div class="card card-body">
                            <h4 class="card-title">{{\App\Forum::find($id)->title}} @lang('admin.forum')</h4>
                            <h6 class="card-subtitle">@lang('admin.edit') {{\App\Forum::find($id)->title}} @lang('admin.forum')</h6>
<form class="" action="{{url('')}}/edit/new/forum/{{$id}}" method="post">
     {{ csrf_field() }}
     <div class="row">
      <div class="col-md-12">
      <div class="form-group">
        <label>@lang('admin.forum_title')</label>
        <input type="text" value="{{\App\Forum::find($id)->title}}" class="form-control" name="forum_title">
      </div>
    </div>
  </div>
        <div class="form-group">
        <label>@lang('admin.describe')</label>
       <textarea class="form-control" rows="5" name="description">{{\App\Forum::find($id)->description}}</textarea>
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
