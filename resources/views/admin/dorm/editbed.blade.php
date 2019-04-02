<div class="row">
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-body">
<h4 class="card-title">@lang('admin.edit_bed_to') {{\App\Room::find($id)->name}} {{\App\Room::find($id)->number}} @lang('admin.room')</h4>
                <h6 class="card-subtitle"></h6>
    <form action="{{url('')}}/edit/new/bed/{{$id}}" method="post" enctype="multipart/form-data" class="">
         {{ csrf_field() }}
         <div class="row">
                        <div class="col-md-6">
                                      <div class="form-group">
                                         <label>@lang('admin.bed_name')</label>
          <input type="text" value="{{\App\Bed::find($id)->name}}" class="form-control" name="name">
                                      </div>   
                            </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                         <label>@lang('admin.bed_number')</label>
                  <input type="text" value="{{\App\Bed::find($id)->number}}" class="form-control" name="number">
                                      </div>   
                                </div>
                                       
                                    </div>
        <div class="row">
                        <div class="col-md-6">
                                      <div class="form-group">
                                         <label>@lang('admin.bed_code')</label>
                    <input type="text" value="{{\App\Bed::find($id)->code}}" class="form-control" name="code">
                                      </div>   
                                        </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                         <label>@lang('admin.bed_capacity')</label>
                                        <input type="number" value="{{\App\Bed::find($id)->capacity}}" class="form-control" name="capacity">
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