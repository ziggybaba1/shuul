<div class="row">
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-body">
<h4 class="card-title">Edit Gallery Slidebbbbb </h4>
                <h6 class="card-subtitle"></h6>
    <form action="{{url('')}}/edit/image/slide/{{$id}}" method="post" enctype="multipart/form-data" class="">
         {{ csrf_field() }}
         <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                              <label>Image Description</label>
                             <input value="{{\App\Frontgallery::find($id)->description}}" type="text" class="form-control" name="description">
                            </div>
                            </div>
                            <div class="col-md-6">
                             <div class="form-group">
                              <label>Image Status</label>
                          <select class="form-control" name="status">
                @if(\App\Frontgallery::find($id)->status=='1')
                            <option value="1">Publish</option>
                            <option value="0">Pending</option>
                @elseif(\App\Frontgallery::find($id)->status=='0')
                <option value="0">Pending</option>
                <option value="1">Publish</option>
                @endif
                          </select>
                            </div>
                        </div>  
                    </div>
            <div class="row">
                        <div class="col-md-12">
                             <div class="form-group">
                              <label>Upload Image (1900px by 1200px)</label>
                             <input type="file" data-default-file="{{url('')}}/uploads/frontend/{{\App\Frontgallery::find($id)->image}}" id="input-file-now-custom-1" class="dropify" name="file">
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
            <script type="text/javascript">
               $(document).ready(function() {
            $('.select2').select2();
        $('.dropify').dropify();
         });
            </script>