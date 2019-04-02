<div class="row">
                    <div class="col-sm-12">
                        
                        <div class="card card-body">
                            <h4 class="card-title">@lang('admin.add_school_fee')</h4>
                            <h6 class="card-subtitle">{{\App\Course::find($id)->title}} @lang('admin.fee')</h6>
              <ul class="nav nav-tabs" role="tablist">
                                    <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#home" role="tab"><span class="hidden-sm-up"><i class="ti-home"></i></span> <span class="hidden-xs-down">@lang('admin.first_term')</span></a> </li>
                                    <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#profile" role="tab"><span class="hidden-sm-up"><i class="ti-user"></i></span> <span class="hidden-xs-down">@lang('admin.second_term')</span></a> </li>
                                    <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#messages" role="tab"><span class="hidden-sm-up"><i class="ti-email"></i></span> <span class="hidden-xs-down">@lang('admin.third_term')</span></a> </li>
                                     <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#messagen" role="tab"><span class="hidden-sm-up"><i class="ti-email"></i></span> <span class="hidden-xs-down">@lang('admin.fourth_term')</span></a> </li>
                                </ul>
                                <hr>
   <div class="tab-content tabcontent-border">
                                    <div class="tab-pane active" id="home" role="tabpanel">
            
                <hr>
<form class="" action="{{url('')}}/add/class/pay/{{$id}}" enctype="multipart/form-data" method="post">
     {{ csrf_field() }}
                                     <br>
                               <span id="medicine">
    @foreach(\App\Fee::where('class',$id)->where('term','First')->get() as $ent)
                         <div class="form-group">
                          <div class="input-group">
                  <input name="name[]" value="{{$ent->name}}" placeholder="@lang('admin.fee_name')" type="text" class="form-control col-md-7 col-xs-12">
                  <input name="amount[]" value="{{$ent->price}}" placeholder="@lang('admin.fee_amount')" type="number" class="form-control col-md-7 col-xs-12">
                  <select name="option[]" required class="form-control">
                   @if($ent->option==='Compulsory')
                   <option value="Compulsory">@lang('admin.compulsory')</option>
                    <option value="Optional">@lang('admin.optional')</option>
              @elseif($ent->option==='Optional')
               <option value="Optional">@lang('admin.optional')</option>
               <option value="Compulsory">@lang('admin.compulsory')</option>
               @endif
                  </select>
                  <select name="term[]" required class="form-control">
                    <option value="First">@lang('admin.first_term')</option>
                  </select>
                            <span class="input-group-btn">
              <button onclick="deletemedicineParentElement(this)"  type="button" class="btn btn-danger btn-md"><i class="fa fa-trash"></i></button>
                                          </span>
                          </div>
                      </div>
          @endforeach
             <div class="form-group">
                          <div class="input-group">
                  <input name="name[]" placeholder="@lang('admin.fee_name')" type="text" class="form-control col-md-7 col-xs-12">
                  <input name="amount[]" placeholder="@lang('admin.fee_amount')" type="number" class="form-control col-md-7 col-xs-12">
                  <select name="option[]" class="form-control">
                    <option>@lang('admin.compulsory')</option>
                    <option>@lang('admin.optional')</option>
                  </select>
                   <select name="term[]" required class="form-control">
                    <option value="First">@lang('admin.first_term')</option>
                  </select>
                            <span class="input-group-btn">
              <button onclick="add_medicine()"  type="button" class="btn btn-primary btn-md"><i class="fa fa-plus"></i></button>
                                          </span>
                          </div>
                      </div>
                               </span>
                              <span id="medicine_input">
                                <div class="form-group">
                          <div class="input-group">
                  <input name="name[]" placeholder="@lang('admin.fee_name')" type="text" class="form-control col-md-7 col-xs-12">
                  <input name="amount[]" placeholder="@lang('admin.fee_amount')" type="number" class="form-control col-md-7 col-xs-12">
                  <select name="option[]" class="form-control">
                    <option value="Compulsory">@lang('admin.compulsory')</option>
                    <option value="Optional">@lang('admin.optional')</option>
                  </select>
                   <select name="term[]" required class="form-control">
                    <option value="First">@lang('admin.first_term')</option>
                  </select>
                            <span class="input-group-btn">
              <button onclick="deletemedicineParentElement(this)"  type="button" class="btn btn-danger btn-md"><i class="fa fa-trash"></i></button>
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
 <div class="tab-pane  p-20" id="profile" role="tabpanel">
 
                 <hr>
<form class="" action="{{url('')}}/add/class/pay/{{$id}}" enctype="multipart/form-data" method="post">
     {{ csrf_field() }}
                                     <br>
                               <span id="medicine1">
    @foreach(\App\Fee::where('class',$id)->where('term','Second')->get() as $ent)
                         <div class="form-group">
                          <div class="input-group">
                  <input name="name[]" value="{{$ent->name}}" placeholder="@lang('admin.fee_name')" type="text" class="form-control col-md-7 col-xs-12">
                  <input name="amount[]" value="{{$ent->price}}" placeholder="@lang('admin.fee_amount')" type="number" class="form-control col-md-7 col-xs-12">
                  <select name="option[]" required class="form-control">
                    @if($ent->option==='Compulsory')
                   <option value="Compulsory">@lang('admin.compulsory')</option>
                    <option value="Optional">@lang('admin.optional')</option>
              @elseif($ent->option==='Optional')
               <option value="Optional">@lang('admin.optional')</option>
               <option value="Compulsory">@lang('admin.compulsory')</option>
               @endif
                  </select>
                   <select name="term[]" required class="form-control">
                    <option value="Second">@lang('admin.second_term')</option>
                  </select>
                            <span class="input-group-btn">
              <button onclick="deletemedicineParentElement1(this)"  type="button" class="btn btn-danger btn-md"><i class="fa fa-trash"></i></button>
                                          </span>
                          </div>
                      </div>
          @endforeach
            <div class="form-group">
                          <div class="input-group">
                  <input name="name[]" placeholder="@lang('admin.fee_name')" type="text" class="form-control col-md-7 col-xs-12">
                  <input name="amount[]" placeholder="@lang('admin.fee_amount')" type="number" class="form-control col-md-7 col-xs-12">
                  <select name="option[]" class="form-control">
                    <option value="Compulsory">@lang('admin.compulsory')</option>
                    <option value="Optional">@lang('admin.optional')</option>
                  </select>
                   <select name="term[]" required class="form-control">
                    <option value="Second">@lang('admin.second_term')</option>
                  </select>
                            <span class="input-group-btn">
              <button onclick="add_medicine1()"  type="button" class="btn btn-primary btn-md"><i class="fa fa-plus"></i></button>
                                          </span>
                          </div>
                      </div>
                               </span>
                              <span id="medicine_input1">
                                <div class="form-group">
                          <div class="input-group">
                  <input name="name[]" placeholder="@lang('admin.fee_name')" type="text" class="form-control col-md-7 col-xs-12">
                  <input name="amount[]" placeholder="@lang('admin.fee_amount')" type="number" class="form-control col-md-7 col-xs-12">
                  <select name="option[]" class="form-control">
                   <option value="Compulsory">@lang('admin.compulsory')</option>
                    <option value="Optional">@lang('admin.optional')</option>
                  </select>
                   <select name="term[]" required class="form-control">
                    <option value="Second">@lang('admin.second_term')</option>
                  </select>
                            <span class="input-group-btn">
              <button onclick="deletemedicineParentElement1(this)"  type="button" class="btn btn-danger btn-md"><i class="fa fa-trash"></i></button>
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
                                    <div class="tab-pane p-20" id="messages" role="tabpanel">
       
                 <hr>
<form class="" action="{{url('')}}/add/class/pay/{{$id}}" enctype="multipart/form-data" method="post">
     {{ csrf_field() }}
                                     <br>
                               <span id="medicine2">
    @foreach(\App\Fee::where('class',$id)->where('term','Third')->get() as $ent)
                         <div class="form-group">
                          <div class="input-group">
                  <input name="name[]" value="{{$ent->name}}" placeholder="@lang('admin.fee_name')" type="text" class="form-control col-md-7 col-xs-12">
                  <input name="amount[]" value="{{$ent->price}}" placeholder="@lang('admin.fee_amount')" type="number" class="form-control col-md-7 col-xs-12">
                  <select name="option[]" required class="form-control">
                   @if($ent->option==='Compulsory')
                   <option value="Compulsory">@lang('admin.compulsory')</option>
                    <option value="Optional">@lang('admin.optional')</option>
              @elseif($ent->option==='Optional')
               <option value="Optional">@lang('admin.optional')</option>
               <option value="Compulsory">@lang('admin.compulsory')</option>
               @endif
                  </select>
                   <select name="term[]" required class="form-control">
                    <option value="Third">@lang('admin.third_term')</option>
                  </select>
                            <span class="input-group-btn">
              <button onclick="deletemedicineParentElement2(this)"  type="button" class="btn btn-danger btn-md"><i class="fa fa-trash"></i></button>
                                          </span>
                          </div>
                      </div>
          @endforeach
          <div class="form-group">
                          <div class="input-group">
                  <input name="name[]" placeholder="@lang('admin.fee_name')" type="text" class="form-control col-md-7 col-xs-12">
                  <input name="amount[]" placeholder="@lang('admin.fee_amount')" type="number" class="form-control col-md-7 col-xs-12">
                  <select name="option[]" class="form-control">
                    <option value="Compulsory">@lang('admin.compulsory')</option>
                    <option value="Optional">@lang('admin.optional')</option>
                  </select>
                   <select name="term[]" required class="form-control">
                    <option value="Third">@lang('admin.third_term')</option>
                  </select>
                            <span class="input-group-btn">
              <button onclick="add_medicine2()"  type="button" class="btn btn-primary btn-md"><i class="fa fa-plus"></i></button>
                                          </span>
                          </div>
                      </div>
                               </span>
                              <span id="medicine_input2">
                                <div class="form-group">
                          <div class="input-group">
                  <input name="name[]" placeholder="@lang('admin.fee_name')" type="text" class="form-control col-md-7 col-xs-12">
                  <input name="amount[]" placeholder="@lang('admin.fee_amount')" type="number" class="form-control col-md-7 col-xs-12">
                  <select name="option[]" class="form-control">
                    <option value="Compulsory">@lang('admin.compulsory')</option>
                    <option value="Optional">@lang('admin.optional')</option>
                  </select>
                   <select name="term[]" required class="form-control">
                    <option value="Third">@lang('admin.third_term')</option>
                  </select>
                            <span class="input-group-btn">
              <button onclick="deletemedicineParentElement2(this)"  type="button" class="btn btn-danger btn-md"><i class="fa fa-trash"></i></button>
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
                                     <div class="tab-pane p-20" id="messagen" role="tabpanel">
                 <hr>
<form class="" action="{{url('')}}/add/class/pay/{{$id}}" enctype="multipart/form-data" method="post">
     {{ csrf_field() }}
                                     <br>
                               <span id="medicine3">
    @foreach(\App\Fee::where('class',$id)->where('term','Fourth')->get() as $ent)
                         <div class="form-group">
                          <div class="input-group">
                  <input name="name[]" value="{{$ent->name}}" placeholder="@lang('admin.fee_name')" type="text" class="form-control col-md-7 col-xs-12">
                  <input name="amount[]" value="{{$ent->price}}" placeholder="@lang('admin.fee_amount')" type="number" class="form-control col-md-7 col-xs-12">
                  <select name="option[]" required class="form-control">
               @if($ent->option==='Compulsory')
                   <option value="Compulsory">@lang('admin.compulsory')</option>
                    <option value="Optional">@lang('admin.optional')</option>
              @elseif($ent->option==='Optional')
               <option value="Optional">@lang('admin.optional')</option>
               <option value="Compulsory">@lang('admin.compulsory')</option>
               @endif
                  </select>
                   <select name="term[]" required class="form-control">
                    <option value="Fourth">@lang('admin.fourth_term')</option>
                  </select>
                            <span class="input-group-btn">
              <button onclick="deletemedicineParentElement3(this)"  type="button" class="btn btn-danger btn-md"><i class="fa fa-trash"></i></button>
                                          </span>
                          </div>
                      </div>
          @endforeach
          <div class="form-group">
                          <div class="input-group">
                  <input name="name[]" placeholder="@lang('admin.fee_name')" type="text" class="form-control col-md-7 col-xs-12">
                  <input name="amount[]" placeholder="@lang('admin.fee_amount')" type="number" class="form-control col-md-7 col-xs-12">
                  <select name="option[]" class="form-control">
                    <option value="Compulsory">@lang('admin.compulsory')</option>
                    <option value="Optional">@lang('admin.optional')</option>
                  </select>
                   <select name="term[]" required class="form-control">
                    <option value="Fourth">@lang('admin.fourth_term')</option>
                  </select>
                            <span class="input-group-btn">
              <button onclick="add_medicine3()"  type="button" class="btn btn-primary btn-md"><i class="fa fa-plus"></i></button>
                                          </span>
                          </div>
                      </div>
                               </span>
                              <span id="medicine_input3">
                                <div class="form-group">
                          <div class="input-group">
                  <input name="name[]" placeholder="Fee Name" type="text" class="form-control col-md-7 col-xs-12">
                  <input name="amount[]" placeholder="Fee Amount" type="number" class="form-control col-md-7 col-xs-12">
                  <select name="option[]" class="form-control">
                    <option value="Compulsory">@lang('admin.compulsory')</option>
                    <option value="Optional">@lang('admin.optional')</option>
                  </select>
                   <select name="term[]" required class="form-control">
                    <option value="Fourth">@lang('admin.fourth_term')</option>
                  </select>
                            <span class="input-group-btn">
              <button onclick="deletemedicineParentElement3(this)"  type="button" class="btn btn-danger btn-md"><i class="fa fa-trash"></i></button>
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
              </div>
            </div>
            <script type="text/javascript">
    var medicine_count      = {{count(\App\Fee::where('class',$id)->where('term','First')->get())}};
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
 <script type="text/javascript">
    var medicine_count1      = {{count(\App\Fee::where('class',$id)->where('term','Second')->get())}};
    var total_amount1        = 0;
    var deleted_medicines1   = [];
    $('#medicine_input1').hide();
    // CREATING BLANK medicine INPUT
    var blank_medicine1 = '';
    $(document).ready(function () {
        blank_medicine1 = $('#medicine_input1').html();
    });
    function add_medicine1()
    {
        medicine_count1++;
        $("#medicine1").append(blank_medicine1);
        $('#medicine_delete1').attr('id', 'medicine_delete1_' + medicine_count1);
        $('#medicine_delete1_' + medicine_count1).attr('onclick', 'deletemedicineParentElement1(this, ' + medicine_count1 + ')');
    }

    // REMOVING medicine INPUT
    function deletemedicineParentElement1(n, medicine_count1) {
        n.parentNode.parentNode.parentNode.removeChild(n.parentNode.parentNode);
        deleted_medicines1.push(medicine_count1);
    }
</script>
<script type="text/javascript">
    var medicine_count2      = {{count(\App\Fee::where('class',$id)->where('term','Third')->get())}};
    var total_amount2        = 0;
    var deleted_medicines2   = [];
    $('#medicine_input2').hide();
    // CREATING BLANK medicine INPUT
    var blank_medicine2 = '';
    $(document).ready(function () {
        blank_medicine2 = $('#medicine_input2').html();
    });
    function add_medicine2()
    {
        medicine_count2++;
        $("#medicine2").append(blank_medicine2);
        $('#medicine_delete2').attr('id', 'medicine_delete2_' + medicine_count2);
        $('#medicine_delete2_' + medicine_count2).attr('onclick', 'deletemedicineParentElement2(this, ' + medicine_count2 + ')');
    }

    // REMOVING medicine INPUT
    function deletemedicineParentElement2(n, medicine_count1) {
        n.parentNode.parentNode.parentNode.removeChild(n.parentNode.parentNode);
        deleted_medicines2.push(medicine_count2);
    }
</script>
<script type="text/javascript">
    var medicine_count3      = {{count(\App\Fee::where('class',$id)->where('term','Fourth')->get())}};
    var total_amount3        = 0;
    var deleted_medicines3   = [];
    $('#medicine_input3').hide();
    // CREATING BLANK medicine INPUT
    var blank_medicine3 = '';
    $(document).ready(function () {
        blank_medicine3 = $('#medicine_input2').html();
    });
    function add_medicine3()
    {
        medicine_count3++;
        $("#medicine3").append(blank_medicine3);
        $('#medicine_delete3').attr('id', 'medicine_delete3_' + medicine_count3);
        $('#medicine_delete3_' + medicine_count3).attr('onclick', 'deletemedicineParentElement3(this, ' + medicine_count3 + ')');
    }

    // REMOVING medicine INPUT
    function deletemedicineParentElement3(n, medicine_count1) {
        n.parentNode.parentNode.parentNode.removeChild(n.parentNode.parentNode);
        deleted_medicines3.push(medicine_count3);
    }
</script>