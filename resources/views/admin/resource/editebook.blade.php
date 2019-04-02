<div class="row">
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-body">
<h4 class="card-title">@lang('admin.edit') @lang('admin.book')</h4>
                <h6 class="card-subtitle"></h6>
    <form action="{{url('')}}/edit/exist/ebook/{{$id}}" method="post" enctype="multipart/form-data" class="">
         {{ csrf_field() }}
         <div class="row">
                        <div class="col-md-6">
                                      <div class="form-group">
                                         <label>@lang('admin.name')</label>
          <input type="text" value="{{\App\Ebook::find($id)->name}}" class="form-control" name="name">
                                      </div>   
                            </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                         <label>@lang('admin.author')</label>
          <input type="text" value="{{\App\Ebook::find($id)->author}}" class="form-control" name="author">
                                      </div>   
                                </div>
                              </div>
                       <div class="row">
                                        <div class="col-md-6">
                                           <div class="form-group">
                                         <label>@lang('admin.description')</label>
  <textarea type="text" class="form-control" name="description">{{\App\Ebook::find($id)->description}}</textarea>
                                      </div>   
                                        </div>
                        <div class="col-md-6">
                                      <div class="form-group">
                          <label>@lang('admin.price') {{\App\Currency::find(\App\Setting::first()->currency)->symbol}}</label>
      <input type="number" value="{{\App\Ebook::find($id)->price}}" class="form-control" name="price">
                                      </div>   
                                        </div>
                                      </div>
                             <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                         <label>@lang('admin.subject') @lang('admin.tag')</label>
                                       <select class="form-control select2" name="subject">
            <option>{{\App\Ebook::find($id)->subject}}</option>
                            @foreach(\App\Subjecttype::all() as $subject)
                              <option value="{{$subject->title}}">{{$subject->title}}</option>
                              @endforeach
                                       </select>
                                      </div>   
                                        </div>
                                        <div class="col-md-6">
                                           <div class="form-group">
                                         <label>@lang('admin.class') @lang('admin.tag')</label>
                                     <select class="form-control select2" name="class">
            <option>{{\App\Ebook::find($id)->class}}</option>
                            @foreach(\App\Course::all() as $class)
                              <option value="{{$class->title}}">{{$class->title}}</option>
                              @endforeach
                                       </select>
                                      </div>   
                                        </div>
                                    </div>
                                  <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                         <label>@lang('admin.add') @lang('admin.file')</label>
                                     <input type="file" class="form-control" name="file">
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
              
            </script>