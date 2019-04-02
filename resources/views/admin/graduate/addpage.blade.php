<div class="row">
                    <div class="col-sm-12">
                        
                        <div class="card card-body">
                            <h4 class="card-title">@lang('admin.student_year_book')</h4>
                            <h6 class="card-subtitle">@lang('admin.add_year_book')</h6>
<form class="" action="{{url('')}}/add/ybook/create" enctype="multipart/form-data" method="post">
     {{ csrf_field() }}
                             <div class="form-group">
            <label for="example-email">@lang('admin.title') *<span class="help"></span></label>
      <input type="text" value="" required class="form-control" name="title">
                                </div>
                <div class="row">
                    <div class="col-md-4">
                                <div class="form-group">
            <label for="example-email">@lang('admin.total_page') *<span class="help"></span></label>
      <input type="number" value="" required class="form-control" name="number">
                                </div>
                            </div>
                             <div class="col-md-4">
                                <div class="form-group">
            <label for="example-email">@lang('admin.grad_set') *<span class="help"></span></label>
  <select class="form-control" name="session">
     <option value="{{\Carbon\Carbon::today()->subYear(1)->format('Y')}}/{{\Carbon\Carbon::today()->subYear(0)->format('Y')}}">{{\Carbon\Carbon::today()->subYear(1)->format('Y')}}/{{\Carbon\Carbon::today()->subYear(0)->format('Y')}}</option>
      <option value="{{\Carbon\Carbon::today()->subYear(2)->format('Y')}}/{{\Carbon\Carbon::today()->subYear(1)->format('Y')}}">{{\Carbon\Carbon::today()->subYear(2)->format('Y')}}/{{\Carbon\Carbon::today()->subYear(1)->format('Y')}}</option>
     <option value="{{\Carbon\Carbon::today()->addYear(0)->format('Y')}}/{{\Carbon\Carbon::today()->addYear(1)->format('Y')}}">{{\Carbon\Carbon::today()->addYear(0)->format('Y')}}/{{\Carbon\Carbon::today()->addYear(1)->format('Y')}}</option>
  </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
            <label for="example-email">@lang('admin.price') *<span class="help"></span></label>
      <input type="number" required class="form-control" placeholder="{{\App\Currency::find(\App\Setting::first()->currency)->symbol}}0 @lang('admin.for_free')" name="price">
                                </div>
                            </div>
                            </div>
                                 <div class="form-group">
            <label for="example-email">@lang('admin.describe')<span class="help"></span></label>
     <textarea class="form-control" name="description"></textarea>
                                </div>
                                 
                                 
                                 <div class="form-group">
            <label for="example-email">@lang('admin.upload_year_book') *<span class="help"></span></label>
    <input type="file" class="form-control" required name="file">
                                </div>
                                 <div class="form-group">
            <label for="example-email">@lang('admin.cover_thumbnail') (W350 * H256) *<span class="help"></span></label>
    <input type="file" class="dropify" data-default-file="" required name="cover">
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