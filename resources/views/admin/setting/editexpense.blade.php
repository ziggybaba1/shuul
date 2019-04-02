<div class="row">
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-body">
<h4 class="card-title">@lang('admin.edit') @lang('admin.expense')</h4>
                <h6 class="card-subtitle"></h6>
    <form action="{{url('')}}/edit/old/expense/{{$id}}" method="post" enctype="multipart/form-data" class="">
         {{ csrf_field() }}
         <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                              <label>@lang('admin.expense') @lang('admin.type')</label>
                            <select class="form-control select2" name="type">
          <option>{{\App\Expense::find($id)->type}}</option>
                            </select>
                            </div>
                            </div>
                            <div class="col-md-6">
                             <div class="form-group">
                              <label>@lang('admin.title')</label>
                             <input type="text" value="{{\App\Expense::find($id)->name}}" class="form-control" name="name">
                            </div>
                        </div>  
                    </div>
            <div class="row">
                        <div class="col-md-6">
                             <div class="form-group">
                              <label>@lang('admin.invoice') @lang('admin.number')</label>
                             <input type="text" value="{{\App\Expense::find($id)->invoice}}" class="form-control" name="number">
                            </div>
                            </div>
                        <div class="col-md-6"> 
                            <div class="form-group">
                             <label>@lang('admin.date')</label>
                             <input type="text" value="{{\App\Expense::find($id)->date}}" class="form-control mdate" name="date">
                            </div> 
                        </div>
                            </div>
                            <div class="row">
                                 <div class="col-md-6"> 
                            <div class="form-group">
                             <label>@lang('admin.amount')</label>
                             <input type="number" value="{{\App\Expense::find($id)->amount}}" class="form-control" name="amount">
                            </div> 
                        </div>
                         <div class="col-md-6"> 
                            <div class="form-group">
                             <label>@lang('admin.upload_doc')</label>
                             <input type="file" class="form-control" name="file">
                            </div> 
                        </div>
                    </div>
                     <div class="row">
                        <div class="col-md-12">
                             <div class="form-group">
                              <label>@lang('admin.describe')</label>
                           <textarea class="form-control" name="describe">{{\App\Expense::find($id)->description}}</textarea>
                            </div>
                            </div>
                            </div>
                                     <div class="row">
                                        <div class="col-md-2"></div>
                                    <div class="col-md-8">
                      <input type="submit" class="form-control btn btn-primary btn-block" value="@lang('admin.submit')">
                                     </div>
                                        <div class="col-md-2"></div>
                                    </div>
                                  </form>
                        </div>
                    </div>
                </div>
            </div>
            <script type="text/javascript">
                 $('.mdate').bootstrapMaterialDatePicker({
        weekStart: 0,
        time: false
    });
                 $(document).ready(function() {
            $('.select2').select2();
         });
            </script>