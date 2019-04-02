<div class="row">
                    <div class="col-sm-12">
                        
                        <div class="card card-body">
                            <h4 class="card-title">@lang('admin.add_allowance')</h4>
                            <h6 class="card-subtitle">{{\App\Teacher::find($id)->gname}} {{\App\Teacher::find($id)->fname}} @lang('admin.add_allowance')</h6>
  <button onclick="add_medicine()" class="btn btn-primary btn-sm btn-block" ><i class="fa fa-plus"></i>@lang('admin.add_allowance')
                                                    </button>
<form class="" action="{{url('')}}/add/employee/pay/{{$id}}" enctype="multipart/form-data" method="post">
     {{ csrf_field() }}
                                     <br>
                               <span id="medicine">
    @foreach(\App\Salary::where('user_id',$id)->get() as $ent)
                         <div class="form-group">
                        <div class="col-sm-12">
                          <div class="input-group">
                  <input name="name[]" value="{{$ent->name}}" placeholder="Allowance Name" type="text" class="form-control col-md-7 col-xs-12">
                  <input name="amount[]" value="{{$ent->price}}" placeholder="Allowance Amount" type="number" class="form-control col-md-7 col-xs-12">
                            <span class="input-group-btn">
              <button onclick="deletemedicineParentElement(this)"  type="button" class="btn btn-primary"><i class="fa fa-trash"></i></button>
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
                  <input name="name[]" placeholder="@lang('admin.allowance_name')" type="text" class="form-control col-md-7 col-xs-12">
                  <input name="amount[]" placeholder="@lang('admin.allowance_amount')" type="number" class="form-control col-md-7 col-xs-12">
                            <span class="input-group-btn">
              <button onclick="deletemedicineParentElement(this)"  type="button" class="btn btn-primary"><i class="fa fa-trash"></i></button>
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
    var medicine_count      = {{count(\App\Salary::where('user_id',$id)->get())}};
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