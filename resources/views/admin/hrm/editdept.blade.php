<div class="row">
                    <div class="col-sm-12">
                        
                        <div class="card card-body">
                            <h4 class="card-title">@lang('admin.dept')</h4>
                            <h6 class="card-subtitle">@lang('admin.edit') @lang('admin.dept')</h6>
<form class="" action="{{url('')}}/edit/department/create/{{$id}}" method="post">
     {{ csrf_field() }}
                             <div class="form-group">
            <label for="example-email"> @lang('admin.dept') @lang('admin.name') *<span class="help"></span></label>
      <input type="text" required value="{{\App\Department::find($id)->name}}" class="form-control" name="name">
                                </div>
                                 <div class="form-group">
            <label for="example-email">@lang('admin.describe')<span class="help"></span></label>
     <textarea class="form-control" name="description">{{\App\Department::find($id)->description}}</textarea>
                                </div>
                                 <div class="form-group">
            <label for="example-email">@lang('admin.type') *<span class="help"></span></label>
    <select class="form-control" required name="type">
        @if(\App\Department::find($id)->type=='1')
    	<option value="1">@lang('admin.teach')</option>
        <option value="0">@lang('admin.no_teach')</option>
        @else
    	<option value="0">@lang('admin.no_teach')</option>
        <option value="1">@lang('admin.teach')</option>
        @endif
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