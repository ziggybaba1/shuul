<div class="row">
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-body">
<h4 class="card-title">Edit Course Category</h4>
                <h6 class="card-subtitle"></h6>
    <form action="{{url('')}}/edit/course/category/{{$id}}" method="post" enctype="multipart/form-data" class="formsubmit">
         {{ csrf_field() }}
         <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                              <label>Title</label>
                             <input type="text" value="{{\App\Category::find($id)->title}}" class="form-control" name="title">
                            </div>   
                            </div>
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
            </div>
                   