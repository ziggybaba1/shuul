<div class="row">
                    <div class="col-sm-12">
                        
                        <div class="card card-body">
                            <h4 class="card-title">@lang('admin.external_result')</h4>
                            <h6 class="card-subtitle">{{\App\Graduation::find($id)->name}} @lang('admin.external_result')</h6>
  <button onclick="add_medicine()" class="btn btn-primary btn-sm btn-block" ><i class="fa fa-plus"></i> @lang('admin.add') @lang('admin.external_result')
                                                    </button>
                                     <br>
<form class="" action="{{url('')}}/add/external/result/{{$id}}" enctype="multipart/form-data" method="post">
     {{ csrf_field() }}
                               <span id="medicine">
    @foreach(\App\Book::where('grad_id',$id)->get() as $ent)
                         <div class="form-group">
                        <div class="col-sm-12">
                          <div class="input-group">
                   <input name="title[]" value="{{$ent->title}}" placeholder="@lang('admin.title')" type="text" class="form-control col-md-7 col-xs-12">
                  <input name="file[]" type="file" class="form-control col-md-7 col-xs-12">
                            <span class="input-group-btn">
                        <a href="{{url('')}}/download/file?file={{$ent->id}}" class="btn btn-curve btn-lg btn-info">Download</a>
                                          </span>
                          </div>
                        </div>
                      </div>
          @endforeach
                               </span>
                              <span id="medicine_input">
                                <div class="form-group">
                        <div class="col-sm-12">
                          <div class="input-group">
                  <input name="title[]" placeholder="@lang('admin.title')" type="text" class="form-control col-md-7 col-xs-12">
                  <input name="file[]" required type="file" class="form-control col-md-7 col-xs-12">
                            <span class="input-group-btn">
              <button onclick="deletemedicineParentElement(this)"  type="button" class="btn btn-lg btn-primary"><i class="fa fa-trash"></i></button>
                                          </span>
                          </div>
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
    var medicine_count      = {{count(\App\Book::where('grad_id',$id)->get())}};
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