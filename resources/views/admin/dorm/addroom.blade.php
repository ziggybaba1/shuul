<div class="row">
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-body">
<h4 class="card-title">@lang('admin.add_room_to') {{\App\Dormitory::find($id)->name}}</h4>
                <h6 class="card-subtitle"></h6>
    <form action="{{url('')}}/add/new/room/{{$id}}" method="post" enctype="multipart/form-data" class="">
         {{ csrf_field() }}
         <div class="row">
                        <div class="col-md-6">
                                      <div class="form-group">
                                         <label>@lang('admin.room_name')</label>
                                        <input type="text" class="form-control" name="name">
                                      </div>   
                            </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                         <label>@lang('admin.room_number')</label>
                                        <input type="text" class="form-control" name="number">
                                      </div>   
                                </div>
                                       
                                    </div>
        <div class="row">
                        <div class="col-md-6">
                                      <div class="form-group">
                                         <label>@lang('admin.room_code')</label>
                                        <input type="text" class="form-control" name="code">
                                      </div>   
                                        </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                         <label>@lang('admin.room_capacity')</label>
                                        <input type="number" class="form-control" name="capacity">
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