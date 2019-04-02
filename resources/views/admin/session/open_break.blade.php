  <h4 class="card-title">@lang('admin.open') @lang('admin.academic') @lang('admin.break')</h4>
<form class="formsubmit" action="{{url('')}}/add/open/break" method="post">
     {{ csrf_field() }}
     <div class="row">
      <div class="col-md-6">
                             <div class="form-group">
            <label for="example-email">@lang('admin.session') *<span class="help"></span></label>
            <select name="session" required class="form-control select2">
             <option value="{{\App\Session::first()->session}}">{{\App\Session::first()->session}}</option>
            </select>
                                </div>
                              </div>
                              <div class="col-md-6">
                             <div class="form-group">
            <label for="example-email">@lang('admin.term') *<span class="help"></span></label>
           <select required name="term" class="form-control">
              <option value="{{\App\Session::first()->terms}}">{{\App\Session::first()->terms}}</option>
            </select>
          </div>
        </div>
      </div>
                         
           <div class="form-group">
                <input type="submit" required class="btn btn-primary btn-bg btn-block" value="@lang('admin.submit')">
                    </div>  
    </form>
    <script type="text/javascript">
       $('.imdate').bootstrapMaterialDatePicker({
        weekStart: 0,
        time: false
    });
    </script>
