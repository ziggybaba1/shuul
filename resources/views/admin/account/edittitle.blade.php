<div class="row">
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-body">
<h4 class="card-title">@lang('admin.edit_account') </h4>
                <h6 class="card-subtitle"></h6>
    <form action="{{url('')}}/edit/create/account/{{$id}}" method="post" enctype="multipart/form-data" class="">
         {{ csrf_field() }}
         <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                              <label>@lang('admin.account_name')</label>
                             <input value="{{\App\Account::find($id)->name}}" type="text" class="form-control" name="name">
                            </div>
                            </div>
                            <div class="col-md-6">
                             <div class="form-group">
                              <label>@lang('admin.account_number')</label>
                             <input value="{{\App\Account::find($id)->number}}" type="text" class="form-control" name="number">
                            </div>
                        </div>  
                    </div>
            <div class="row">
                        <div class="col-md-6">
                             <div class="form-group">
                              <label>@lang('admin.bank_name')</label>
                             <input value="{{\App\Account::find($id)->bank}}" type="text" class="form-control" name="bank">
                            </div>
                            </div>
                        <div class="col-md-6"> 
                            <div class="form-group">
                             <label>@lang('admin.sort_code')</label>
                             <input value="{{\App\Account::find($id)->code}}" type="text" class="form-control" name="code">
                            </div> 
                        </div>
                            </div>
                            <div class="row">
                        <div class="col-md-6">
                             <div class="form-group">
                              <label>@lang('admin.status')</label>
                            <select class="form-control" name="status">
                      @if(\App\Account::find($id)->status=='1')
                                <option value="1">@lang('admin.active')</option>
                                <option value="0">@lang('admin.pending')</option>
                      @elseif(\App\Account::find($id)->status=='Pending')
                       <option value="0">@lang('admin.pending')</option>
                       <option value="1">@lang('admin.active')</option>
                          @endif     
                            </select>
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