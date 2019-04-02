<div class="row">
                    <div class="col-sm-12">
                        
                        <div class="card card-body">
                            <h4 class="card-title">@lang('admin.year_book')</h4>
                            <h6 class="card-subtitle">@lang('admin.edit') @lang('admin.year_book')</h6>
<form class="" action="{{url('')}}/edit/ybook/create/{{$id}}" enctype="multipart/form-data" method="post">
     {{ csrf_field() }}
                             <div class="form-group">
            <label for="example-email">@lang('admin.year_book') @lang('admin.title')  *<span class="help"></span></label>
      <input type="text" value="{{\App\Yearbook::find($id)->title}}" required class="form-control" name="title">
                                </div>
                  <div class="row">
                    <div class="col-md-4">
                                <div class="form-group">
            <label for="example-email">@lang('admin.total_page') *<span class="help"></span></label>
      <input type="number" value="{{\App\Yearbook::find($id)->number}}" required class="form-control" name="number">
                                </div>
                            </div>
                             <div class="col-md-4">
                                 <div class="form-group">
            <label for="example-email">@lang('admin.grad_set') *<span class="help"></span></label>
  <select class="form-control" name="session">
    <option value="{{\App\Yearbook::find($id)->session}}">{{\App\Yearbook::find($id)->session}}</option>
     <option value="{{\Carbon\Carbon::today()->subYear(1)->format('Y')}}/{{\Carbon\Carbon::today()->subYear(0)->format('Y')}}">{{\Carbon\Carbon::today()->subYear(1)->format('Y')}}/{{\Carbon\Carbon::today()->subYear(0)->format('Y')}}</option>
      <option value="{{\Carbon\Carbon::today()->subYear(2)->format('Y')}}/{{\Carbon\Carbon::today()->subYear(1)->format('Y')}}">{{\Carbon\Carbon::today()->subYear(2)->format('Y')}}/{{\Carbon\Carbon::today()->subYear(1)->format('Y')}}</option>
     <option value="{{\Carbon\Carbon::today()->addYear(0)->format('Y')}}/{{\Carbon\Carbon::today()->addYear(1)->format('Y')}}">{{\Carbon\Carbon::today()->addYear(0)->format('Y')}}/{{\Carbon\Carbon::today()->addYear(1)->format('Y')}}</option>
  </select>
                                </div>
                            </div>
                           
                                <div class="col-md-4">
                                <div class="form-group">
            <label for="example-email">@lang('admin.price') *<span class="help"></span></label>
      <input type="number" required class="form-control" value="{{\App\Yearbook::find($id)->price}}" placeholder="{{\App\Currency::find(\App\Setting::first()->currency)->symbol}}0 @lang('admin.for_free')" name="price">
                                </div>
                           
                            </div>
                        </div>
                                 <div class="form-group">
            <label for="example-email">@lang('admin.year_book') @lang('admin.describe')<span class="help"></span></label>
     <textarea class="form-control" name="description">{{\App\Yearbook::find($id)->description}}</textarea>
                                </div>
                                 <div class="form-group">
            <label for="example-email">@lang('admin.upload_year_book') *<span class="help"></span></label>
    <input type="file" class="form-control" name="file">
                                </div>
                                 <div class="form-group">
            <label for="example-email">@lang('admin.cover_thumbnail') *<span class="help"></span></label>
    <input type="file" class="dropify" data-default-file="{{url('')}}/uploads/yearbook/{{\App\Yearbook::find($id)->cover}}" name="cover">
                                </div>             
             <div class="row">
         <div class="col-sm-3"></div>
                    <div class="col-sm-6">
                 <div class="form-group">
                <input type="submit" class="form-control btn btn-primary" value="@lang('admin.submit')">
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