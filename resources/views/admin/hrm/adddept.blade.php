<div class="row">
                    <div class="col-sm-12">
                        
                        <div class="card card-body">
                            <h4 class="card-title"> @lang('admin.school_dept')</h4>
                            <h6 class="card-subtitle">@lang('admin.new') @lang('admin.school_dept')</h6>
<form class="" action="{{url('')}}/add/department/create" method="post">
     {{ csrf_field() }}
                             <div class="form-group">
            <label for="example-email">@lang('admin.school_dept') @lang('admin.name') *<span class="help"></span></label>
      <input type="text" required class="form-control" name="name">
                                </div>
                                 <div class="form-group">
            <label for="example-email">@lang('admin.describe')<span class="help"></span></label>
     <textarea class="form-control" name="description"></textarea>
                                </div>
                                 <div class="form-group">
            <label for="example-email">@lang('admin.type') *<span class="help"></span></label>
    <select class="form-control" required name="type">
    	<option value="">@lang('admin.select_type')</option>
    	<option value="1">@lang('admin.teach')</option>
    	<option value="0">@lang('admin.no_teach')</option>
    </select>
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
         $('#mdate').bootstrapMaterialDatePicker({
        weekStart: 0,
        time: false
    });
    </script>