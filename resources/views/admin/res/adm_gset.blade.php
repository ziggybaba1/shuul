 <div class="row">
    <div class="col-md-2"></div>
                    <div class="col-sm-8">
                        <div class="card card-body">
                            <h4 class="card-title">@lang('admin.school') @lang('admin.general') @lang('admin.information')</h4>
    <h6 class="card-subtitle">@lang('admin.add') @lang('admin.school') @lang('admin.general') @lang('admin.information')</h6>
<form class="" action="{{url('')}}/add/school/create" enctype="multipart/form-data" method="post">
     {{ csrf_field() }}
                             <div class="form-group">
            <label for="example-email">@lang('admin.school') @lang('admin.name') * <span class="help"></span></label>
           <input type="text" class="form-control" value="{{\App\Provider::first()->name}}" name="name">
                                </div>
                     <div class="form-group">
            <label for="example-email">@lang('admin.school') @lang('admin.sms') @lang('admin.name') (@lang('admin.max_length') 10) * <span class="help"></span></label>
           <input type="text" maxlength="10" class="form-control" value="{{\App\Provider::first()->sms_name}}" name="sms_name">
                                </div>
                             <div class="form-group">
            <label for="example-email">@lang('admin.school') @lang('admin.address') *<span class="help"></span></label>
            <input type="text" class="form-control" value="{{\App\Provider::first()->address}}" name="address">
                                </div>
                            
                             <div class="form-group">
            <label for="example-email">@lang('admin.school') @lang('admin.mobile') 1 *<span class="help"></span></label>
     <input type="number" class="form-control" value="{{\App\Provider::first()->phone1}}" name="mobile1">
                                </div>
                                 <div class="form-group">
            <label for="example-email">@lang('admin.school') @lang('admin.mobile') 2 *<span class="help"></span></label>
     <input type="number" class="form-control" value="{{\App\Provider::first()->phone2}}" name="mobile2">
                                </div>
                                 <div class="form-group">
            <label for="example-email">@lang('admin.school') @lang('admin.website') *<span class="help"></span></label>
     <input type="text" class="form-control" value="{{\App\Provider::first()->web}}" name="web">
                                </div>
                                 <div class="form-group">
            <label for="example-email">@lang('admin.school') @lang('admin.email') *<span class="help"></span></label>
      <input type="email" class="form-control" value="{{\App\Provider::first()->email}}" name="email">
                                </div>

                <div class="form-group">
                 <label>@lang('admin.school') @lang('admin.result') @lang('admin.type')</label>
              <select class="form-control" name="result_type">
    <option value="1">@lang('admin.prolong') @lang('admin.type')</option>
              </select>
        </div>
         <div class="form-group">
            <label for="example-email">@lang('admin.logged_in') @lang('admin.page') @lang('admin.image') *<span class="help"></span></label>
             <img width="100px" src="{{url('')}}/uploads/avatars/{{\App\Provider::first()->back}}">
      <input type="file" class="form-control" name="back">
          
                                </div>
                                  <div class="form-group">
            <label for="example-email">@lang('admin.school') @lang('admin.logo') *<span class="help"></span></label>
            <img width="100px" src="{{url('')}}/uploads/avatars/{{\App\Provider::first()->logo}}">
      <input type="file" class="form-control" name="logo">
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
                    <div class="col-md-2"></div>
                </div>