  <h4 class="card-title">@lang('admin.start') @lang('admin.new') @lang('admin.academic') @lang('admin.session')/@lang('admin.term')</h4>
<form class="formsubmit" action="{{url('')}}/admin/new/session" method="post">
     {{ csrf_field() }}
     <div class="row">
      <div class="col-md-6">
                             <div class="form-group">
            <label for="example-email">@lang('admin.select') @lang('admin.session') *<span class="help"></span></label>
            <select name="session" required class="form-control select2">
             <option value="{{\App\Session::first()->session}}">{{\App\Session::first()->session}}</option>
              <option value="{{\Carbon\Carbon::today()->format('Y')}}/{{\Carbon\Carbon::today()->addYear(1)->format('Y')}}">{{\Carbon\Carbon::today()->format('Y')}}/{{\Carbon\Carbon::today()->addYear(1)->format('Y')}}</option>
               <option value="{{\Carbon\Carbon::today()->addYear(-1)->format('Y')}}/{{\Carbon\Carbon::today()->format('Y')}}">{{\Carbon\Carbon::today()->addYear(-1)->format('Y')}}/{{\Carbon\Carbon::today()->format('Y')}}</option>
            </select>
                                </div>
                              </div>
                              <div class="col-md-6">
                             <div class="form-group">
            <label for="example-email">@lang('admin.select') @lang('admin.term') *<span class="help"></span></label>
           <select required name="term" class="form-control">
                <option value="First">@lang('admin.first_term')</option>
                <option value="Second">@lang('admin.second_term')</option>
                <option value="Third">@lang('admin.third_term')</option>
                <option value="Fourth">@lang('admin.fourth_term')</option>
            </select>
          </div>
        </div>
      </div>
                           <div class="row">
      <div class="col-md-6">
                             <div class="form-group">
            <label for="example-email">@lang('admin.begin') @lang('admin.date') *<span class="help"></span></label>
        <input type="date" class="form-control imdate" name="open_date">
          </div>
        </div>
        <div class="col-md-6">
           <div class="form-group">
            <label for="example-email">@lang('admin.end') @lang('admin.date') *<span class="help"></span></label>
        <input type="date"  class="form-control imdate" name="close_date">
          </div>
        </div>
      </div>
           <div class="form-group">
                <input type="submit" required class="btn btn-primary btn-bg btn-block" value="@lang('admin.start') @lang('admin.term')">
                    </div>  
    </form>
    <script type="text/javascript">
       $('.imdate').bootstrapMaterialDatePicker({
        weekStart: 0,
        time: false
    });
    </script>
