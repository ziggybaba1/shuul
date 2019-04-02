<div class="row">
                    <div class="col-sm-12">
                        
                        <div class="card card-body">
                            <h4 class="card-title">@lang('admin.add_gallery_cat')</h4>
                            <h6 class="card-subtitle"></h6>
<form class="" action="{{url('')}}/create/gallery/category" enctype="multipart/form-data" method="post">
     {{ csrf_field() }}
                                     <br>
                               <span id="medicine">
    @foreach(\App\Gcategory::all() as $category)
                         <div class="form-group">
                        <div class="col-sm-12">
                          <div class="input-group">
                  <input name="title[]" value="{{$category->title}}" type="text" class="form-control col-md-7 col-xs-12">
                            <span class="input-group-btn">
              <button onclick="deletemedicineParentElement(this)"  type="button" class="btn btn-danger btn-md"><i class="fa fa-trash"></i></button>
                                          </span>
                          </div>
                        </div>
                      </div>
          @endforeach
            <div class="form-group">
                          <div class="input-group">
                  <input name="title[]"  type="text" placeholder="@lang('admin.name_gallery_cat')" class="form-control col-md-7 col-xs-12">
                            <span class="input-group-btn">
              <button onclick="add_medicine()"  type="button" class="btn btn-primary btn-md"><i class="fa fa-plus"></i></button>
                                          </span>
                          </div>
                      </div>
                               </span>
                              <span id="medicine_input">
                               <div class="form-group">
                          <div class="input-group">
                  <input name="title[]"  type="text" class="form-control col-md-7 col-xs-12">
                            <span class="input-group-btn">
              <button onclick="deletemedicineParentElement(this)" type="button" class="btn btn-danger btn-md"><i class="fa fa-trash"></i></button>
                                          </span>
                          </div>
                      </div>
                               </span>
                               <div class="row">
         <div class="col-sm-3"></div>
                    <div class="col-sm-6">
                 <div class="form-group">
                <input type="submit" required class="form-control btn btn-primary" value="@lang('admin.submit')">
                    </div>  
                </div>
                        </div>
                  </form>
                </div>
              </div>
            </div>
          <script type="text/javascript">
    var medicine_count      = {{count(\App\Gcategory::all())}};
    var total_amount        = 0;
    var deleted_medicines   = [];
    $('#medicine_input').hide();
    // CREATING BLANK medicine INPUT
    var blank_medicine = '';
    $(document).ready(function () {
        blank_medicine = $('#medicine_input').html();
    });
    function add_medicine()
    {
        medicine_count++;
        $("#medicine").append(blank_medicine);

        $('#medicine_id').attr('id', 'medicine_id_' + medicine_count);
        $('#medicine_delete').attr('id', 'medicine_delete_' + medicine_count);
        $('#medicine_delete_' + medicine_count).attr('onclick', 'deletemedicineParentElement(this, ' + medicine_count + ')');
    }

    // REMOVING medicine INPUT
    function deletemedicineParentElement(n, medicine_count) {
        n.parentNode.parentNode.parentNode.removeChild(n.parentNode.parentNode);
        deleted_medicines.push(medicine_count);
    }
</script>