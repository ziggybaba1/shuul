<div class="row">
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-body">
<h4 class="card-title">@lang('admin.edit') @lang('admin.book') @lang('admin.inventory')</h4>
                <h6 class="card-subtitle"></h6>
    <form action="{{url('')}}/edit/inventory/book/{{$id}}" method="post" enctype="multipart/form-data" class="">
         {{ csrf_field() }}
         <div class="row">
                        <div class="col-md-6">
                                      <div class="form-group">
                                         <label>@lang('admin.book') @lang('admin.title')</label>
  <input type="text" value="{{\App\Inventory::find($id)->title}}" class="form-control" name="title">
                                      </div>   
                            </div>
                                    <div class="col-md-6">
                                <div class="form-group">
                                  <label>@lang('admin.book') @lang('admin.author')</label>
  <input type="text" value="{{\App\Inventory::find($id)->author}}" class="form-control" name="author">
                                  </div>   
                                </div>
                              </div>
                       <div class="row">
                                        <div class="col-md-6">
                                           <div class="form-group">
                                         <label>@lang('admin.book') @lang('admin.edition')</label>
<input type="text" value="{{\App\Inventory::find($id)->edition}}" class="form-control" name="edition">
                                      </div>   
                                        </div>
                        <div class="col-md-6">
                                      <div class="form-group">
                          <label>@lang('admin.book') @lang('admin.category')</label>
                  <select style="width: 100%;" class="form-control select2" name="category">
                              <option>{{\App\Inventory::find($id)->category}}</option>
                  @foreach(\App\Category::latest()->get() as $subject)
                              <option value="{{$subject->title}}">{{$subject->title}}</option>
                              @endforeach
                            </select>
                                      </div>   
                                        </div>
                                      </div>
                                      <div class="row">
                                        <div class="col-md-6">
                                           <div class="form-group">
                                         <label>@lang('admin.book') @lang('admin.total')</label>
<input type="number" value="{{\App\Inventory::find($id)->total}}" class="form-control" name="total">
                                      </div>   
                                        </div>
                                        <div class="col-md-6">
                                           <div class="form-group">
                                         <label>@lang('admin.class') @lang('admin.tag')</label>
                               <select style="width: 100%;" class="form-control select2" name="class">
                              <option>{{\App\Inventory::find($id)->class}}</option>
                  @foreach(\App\Course::all() as $class)
                              <option value="{{$class->title}}">{{$class->title}}</option>
                              @endforeach
                            </select>
                                      </div>   
                                        </div>
                                      </div>
                            
                                     <div class="row">
                                        <div class="col-md-2"></div>
                                    <div class="col-md-8">
                      <input type="submit" class="form-control btn btn-primary btn-block text-white" value="@lang('admin.update') @lang('admin.inventory')">
                                     </div>
                                        <div class="col-md-2"></div>
                                    </div>
                                  </form>
                        </div>
                    </div>
                </div>
            </div>
            <script type="text/javascript">
               $(document).ready(function() {
            $('.select2').select2();
         });
            </script>