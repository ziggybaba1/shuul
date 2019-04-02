 <div class="card card-body">
                  <div class="row">
                    <div class="col-md-12">
<form  action="{{url('')}}/add/course/page" method="post" enctype="multipart/form-data" class="">
             {{ csrf_field() }}
              <div class="form-group">
                              <label>@lang('admin.yearbook') Page Title</label>
                      <input type="text" value="{{\App\Fronthome::first()->course_title}}" placeholder="" class="form-control" name="title">
                          </div>
                           <div class="form-group">
                              <label>@lang('admin.yearbook') Page Description</label>
                     <textarea class="form-control" rows="7" name="description">{{\App\Fronthome::first()->course_description}}</textarea>
                          </div>
                      
                <div class="row">
                                        <div class="col-md-2"></div>
                                    <div class="col-md-8">
                      <input type="submit" class="form-control btn btn-primary btn-block" value="Submit">
                                     </div>
                                        <div class="col-md-2"></div>
                                    </div>
                                </form>
                              </div>
                            </div>
                          </div>