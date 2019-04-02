
                                    <div class="card-body">
                                        <h3 class="card-title">@lang('admin.compose') @lang('admin.new') @lang('admin.message')</h3>
            <form action="{{url('')}}/create/new/message" id="formsubmitk" enctype="multipart/form-data" method="post" class="form-horizontal m-t-40 formsubmitk">
                                 {{ csrf_field() }} 
                                        <div class="form-group">
                                            <label>@lang('admin.to'):</label>
                                            <select required name="receive_id" class="form-control select2">
                                                <option value="">@lang('admin.select') @lang('admin.staff')</option>
                                    @foreach(\App\Teacher::where('status','0')->get() as $staff)
                                    <option value="{{$staff->user_table}}">{{$staff->gname}} {{$staff->fname}} {{$staff->user_id}}</option>
                                    @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                          <input name="title" class="form-control" placeholder="@lang('admin.title'):">
                                        </div>
                                        <div class="form-group">
                                            <textarea name="content" class="mymce form-control" rows="15" placeholder="@lang('admin.enter_text')"></textarea>
                                        </div>
                                        <h4><i class="ti-link"></i> @lang('admin.attachment')</h4>
                                            <div class="fallback">
                                                <input name="file[]" class="form-control bg-primary text-white" type="file" multiple />
                                            </div>
                                          
                                        <button type="submit" class="btn btn-success m-t-20"><i class="fa fa-envelope-o"></i> @lang('admin.send') <span id="showresultn"></span></button>
                                       
                                    </form>
                                    </div>
                              <script type="text/javascript">
                                  $('.select2').select2();
                                   $('.mymce').summernote({
            
            minHeight: 200, // set minimum height of editor
            maxHeight: 500, // set maximum height of editor
            focus: false // set focus to editable area after initializing summernote
        });

                                   $(".formsubmitk").submit(function(e) {
  var formDatan = new FormData(this);
   jQuery('#showresultn').html('<div style="text-align:center;margin-top:0px;"><img src="{{url('')}}/assets/images/preloader.gif" style="height:30px;" /></div>');
    $form = $(this);
  $.ajax({
            url     : $form.attr('action'),
            type    : 'POST',
            data    : formDatan,
    success: function (data) {
        swal("@lang('admin.sent_success')!", "@lang('admin.continue-button')", "success");
        document.getElementById("formsubmitk").reset();
        jQuery('#showresultn').hide();
      },
      error:function(data){
         alert(data);
      },
       cache: false,
        contentType: false,
        processData: false
 });
   e.preventDefault();
});
                              </script>