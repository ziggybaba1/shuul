<div class="row">
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-body">
<h4 class="card-title">Mark {{\App\Work::find($id)->title}} as Pending</h4>
                <h6 class="card-subtitle">Note: Course won't be published if mark as pending</h6>
    <form action="{{url('')}}/mark/pending/course/{{$id}}" method="post" enctype="multipart/form-data" class="">
         {{ csrf_field() }}
         <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                              <label>Title</label>
                <input value="{{\App\Work::find($id)->title}}" readonly type="text" class="form-control" name="title">
                            </div>
                            </div>
                             <div class="col-md-6"> 
                            <div class="form-group">
                              <label>Publishing Status</label>
                            <select style="width: 100%;" class="form-control select2" name="status">
                                <option value="0">Pending</option>  
                            </select>
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