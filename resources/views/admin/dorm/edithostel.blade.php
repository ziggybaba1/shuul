 <div class="row">
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-body">
<h4 class="card-title">@lang('admin.edit') @lang('admin.hostel')</h4>
                <h6 class="card-subtitle"></h6>
    <form action="{{url('')}}/edit/old/hostel/{{$id}}" method="post" enctype="multipart/form-data" class="">
         {{ csrf_field() }}
         <div class="row">
                        <div class="col-md-6">
                                      <div class="form-group">
                                         <label>@lang('admin.hostel') @lang('admin.name')</label>
                                        <input type="text" value="{{\App\Dormitory::find($id)->name}}" class="form-control" name="name">
                                      </div>   
                            </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                         <label>@lang('admin.hostel') @lang('admin.address')</label>
                                        <input type="text" value="{{\App\Dormitory::find($id)->address}}" class="form-control" name="address">
                                      </div>   
                                </div>
                                       
                                    </div>
        <div class="row">
                        <div class="col-md-4">
                                      <div class="form-group">
                                         <label>@lang('admin.hostel') @lang('admin.code')</label>
                                        <input type="text" value="{{\App\Dormitory::find($id)->code}}" class="form-control" name="code">
                                      </div>   
                                        </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                         <label>@lang('admin.hostel_capacity')</label>
                                        <input type="number" value="{{\App\Dormitory::find($id)->capacity}}" class="form-control" name="capacity">
                                      </div>   
                                        </div>
                                        <div class="col-md-4">
                                           <div class="form-group">
                                         <label>@lang('admin.hostel_block')</label>
                                        <input type="text" value="{{\App\Dormitory::find($id)->blocks}}" class="form-control" name="block">
                                      </div>   
                                        </div>
                                    </div>
                                     <div class="row">
                                        <div class="col-md-2"></div>
                                    <div class="col-md-8">
                      <input type="submit" class="form-control btn btn-primary btn-block text-white" value="@lang('admin.submit')">
                                     </div>
                                        <div class="col-md-2"></div>
                                    </div>
                                  </form>
                        </div>
                    </div>
                </div>
            </div>