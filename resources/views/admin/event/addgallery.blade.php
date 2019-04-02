<div class="row">
                    <div class="col-sm-12">
                        
                        <div class="card card-body">
                            <h4 class="card-title">@lang('admin.event_image')</h4>
                            <h6 class="card-subtitle">@lang('admin.add_event_image')</h6>
<form class="" action="{{url('')}}/add/gallery/create" enctype="multipart/form-data" method="post">
     {{ csrf_field() }}
     <div class="row">
        <div class="col-md-6">
                            <div class="form-group">
            <label for="example-email">@lang('admin.session') *<span class="help"></span></label>
    <input type="text" readonly="" value="{{\App\Session::latest()->first()->session}}" class="form-control" name="session">
                                </div>
                            </div>
         <div class="col-md-6">
                            <div class="form-group">
            <label for="example-email">@lang('admin.select_category') *<span class="help"></span></label>
 <select required class="form-control select2" name="category">
@forelse(\App\Gcategory::all() as $cat)
     <option value="{{$cat->title}}">{{$cat->title}}</option>
     @empty
<option value="">>@lang('admin.info_category')</option>
     @endforelse
 </select>
                                </div>
                            </div>
                            </div>

                                 <div class="form-group">
            <label for="example-email">@lang('admin.event_image') *<span class="help"></span></label>
    <input type="file" class="form-control dropify" name="file">
                                </div>
                                 <div class="form-group">
            <label for="example-email">@lang('admin.image_caption') *<span class="help"></span></label>
      <input type="text" value="" required class="form-control" name="caption">
                                </div>
                               <div class="form-group">
                                <h4 class="card-title">@lang('admin.publicity') *</h4>
                                <div class="demo-radio-button">
                        <input name="status" value="1" type="radio" id="radio_1" checked />
                                    <label for="radio_1">@lang('admin.private')</label>
                            <input name="status" value="2" type="radio" id="radio_2" />
                                    <label for="radio_2">@lang('admin.public')</label>
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
         $('.mdate').bootstrapMaterialDatePicker({
        weekStart: 0,
        time: false
    });
         $('.mtime').bootstrapMaterialDatePicker({
       date: false,
        shortTime: false,
        format: 'HH:mm'
    });
           $(document).ready(function() {
            $('.select2').select2();
        $('.dropify').dropify();
         });
    </script>