<div class="row">
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-body">
<h4 class="card-title">New Gallery Slide </h4>
                <h6 class="card-subtitle"></h6>
    <form action="{{url('')}}/create/slide/image" method="post" enctype="multipart/form-data" class="">
         {{ csrf_field() }}
         <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                              <label>Category 1</label>
          <input type="text" value="{{\App\Frontcategory::first()->dom2}}" class="form-control" name="dom2">
                            </div>
                            </div>
                            <div class="col-md-6">
                             <div class="form-group">
                              <label>Category 2</label>
                         <input type="text" value="{{\App\Frontcategory::first()->dom3}}" class="form-control" name="dom3">
                            </div>
                        </div>  
                    </div>
                     <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                              <label>Category 3</label>
                             <input type="text" value="{{\App\Frontcategory::first()->dom4}}" class="form-control" name="dom4">
                            </div>
                            </div>
                            <div class="col-md-6">
                             <div class="form-group">
                              <label>Category 4</label>
                         <input type="text" value="{{\App\Frontcategory::first()->dom5}}" class="form-control" name="dom5">
                            </div>
                        </div>  
                    </div>
                     <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                              <label>Category 5</label>
                             <input type="text" value="{{\App\Frontcategory::first()->dom6}}" class="form-control" name="dom6">
                            </div>
                            </div>
                            <div class="col-md-6">
                             <div class="form-group">
                              <label>Category 6</label>
                        <input type="text" value="{{\App\Frontcategory::first()->dom7}}" class="form-control" name="dom7">
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