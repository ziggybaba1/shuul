  <style type="text/css">
  .modal-dialog {
    max-width: 1000px;
    margin: 30px auto;
}
 </style>
 <div class="row">
                    <div class="col-sm-12">
                         @if (session('message'))
                 <div class="alert alert-info alert-rounded">{{ session('message') }}</div>
                    @endif
                        <div class="card card-body">
                            <h4 class="card-title">{{\App\Course::find($id)->title}} @lang('admin.book') @lang('admin.assign')</h4>
                            <h6 class="card-subtitle">@lang('admin.add') @lang('admin.book')</h6>
                            <div class="pull-right">
                            </div>
    <form action="{{url('')}}/create/assign/book/{{$id}}" method="post" class="form-horizontal m-t-40" class="form">
                                 {{ csrf_field() }}
        <div style="overflow-y: auto;max-height: 300px;">
                    <span id="medicine">
    @foreach(\App\Bookassign::where('class',$id)->get() as $ent)
                         <div class="form-group">
                          <div class="input-group">
                  <input name="name[]" value="{{$ent->name}}" placeholder="@lang('admin.book') @lang('admin.name')" type="text" class="form-control col-md-7 col-xs-12">
                  <input name="price[]" value="{{$ent->price}}" placeholder="@lang('admin.book') @lang('admin.price')" type="text" class="form-control col-md-7 col-xs-12">
                  <select class="form-control" name="avail[]">
                    <option>@lang('admin.available')</option>
                    <option>@lang('admin.not') @lang('admin.available')</option>
                  </select>
                <span class="input-group-btn">
              <button onclick="deletemedicineParentElement(this)"  type="button" class="btn btn-md btn-primary"><i class="fa fa-trash"></i></button>
                </span>
                  <span style="width: 20px;"></span>
                        </div>
                      </div>
          @endforeach
          <div class="form-group">
                          <div class="input-group">
                  <input name="name[]"  placeholder="@lang('admin.book') @lang('admin.name')" type="text" class="form-control col-md-7 col-xs-12">
                  <input name="price[]"  placeholder="@lang('admin.book') @lang('admin.price')" type="text" class="form-control col-md-7 col-xs-12">
                  <select class="form-control" name="avail[]">
                    <option>@lang('admin.available')</option>
                    <option>@lang('admin.not') @lang('admin.available')</option>
                  </select>
                            <span class="input-group-btn">
              <button onclick="add_medicine()"  type="button" class="btn btn-md btn-primary"><i class="fa fa-plus"></i></button>
                                          </span>
                                            <span style="width: 20px;"></span>
                        </div>
                      </div>
                               </span>
                           </div>
                              <span id="medicine_input">
                                <div class="form-group">
                          <div class="input-group">
                  <input name="name[]"  placeholder="@lang('admin.book') @lang('admin.name')" type="text" class="form-control col-md-7 col-xs-12">
                  <input name="price[]"  placeholder="@lang('admin.book') @lang('admin.price')" type="text" class="form-control col-md-7 col-xs-12">
                  <select class="form-control" name="avail[]">
                     <option>@lang('admin.available')</option>
                    <option>@lang('admin.not') @lang('admin.available')</option>
                  </select>
                            <span class="input-group-btn">
              <button onclick="deletemedicineParentElement(this)"  type="button" class="btn btn-md btn-primary"><i class="fa fa-trash"></i></button>
                                          </span>
        <span style="width: 20px;"></span>
                        </div>
                      </div>
                            
                               </span>
                               <hr>
                               <div class="row">
                                <div class="col-md-4"></div>
                                <div class="col-md-4">
                               <div class="form-group">
                            <input type="submit" class="form-control btn btn-primary" value="@lang('admin.submit')">
                                </div>
                              </div>
                              <div class="col-md-4"></div>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>  
                  <script type="text/javascript">
    var medicine_count      = {{count(\App\Bookassign::where('class',$id)->get())}}+1;
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
