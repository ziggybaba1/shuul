 <style type="text/css">
   .form-control[readonly] {
    background-color: #2f3d4a;
    opacity: 1;
}

 </style>
 <div class="row">
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-body">

<h4 class="card-title">{{\App\Student::find($id)->gname}} {{\App\Student::find($id)->fname}} @lang('admin.invoice')</h4>
                <h6 class="card-subtitle"></h6>
    <form action="{{url('')}}/receive/student/payment/{{$id}}" method="post" enctype="multipart/form-data" class="">
         {{ csrf_field() }}
         <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                              <label>@lang('admin.invoice_id')</label>
                             <input readonly value="{{\Keygen1::numeric(7)->generate()}}" type="text" class="form-control" name="token">
                            </div>
                            </div>
                            <div class="col-md-4">
                             <div class="form-group">
                              <label>@lang('admin.session')</label>
                             <input readonly value="{{\App\Invoice::where('class_id',\App\Student::find($id)->class)->latest()->first()->session}}" type="text" class="form-control" name="session">
                            </div>
                        </div> 
                        <div class="col-md-4">
                             <div class="form-group">
                              <label>@lang('admin.term')</label>
                              <select class="form-control" name="term">
                               
                   @if(\App\Session::latest()->first()->terms==='First')
                        <option value="First">@lang('admin.first_term')</option>
                                @elseif(\App\Session::latest()->first()->terms==='Second')
                               <option value="Second">@lang('admin.second_term')</option>
                                 @elseif(\App\Session::latest()->first()->terms==='Third')
                           <option value="Third">@lang('admin.third_term')</option>
                                 @elseif(\App\Session::latest()->first()->terms==='Fourth')
                                 <option value="Fourth">@lang('admin.fourth_term')</option>
                             @endif

                              </select>
                            
                            </div>
                        </div>  
                    </div>
            <div class="row">
                        <div class="col-md-12">
           <div class="table-responsive m-t-40">
        <table id="example23" class="display nowrap table  table-bordered" cellspacing="0" width="100%">
                                       <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>@lang('admin.fee_name')</th>
                                 <th>@lang('admin.amount') ({{\App\Currency::find(\App\Setting::first()->currency)->symbol}})</th>
                                                <th>@lang('admin.option')</th>
                                                <th>@lang('admin.remove')</th>
                                            </tr>
                                        </thead>
                                    <tbody>
@foreach(\App\Fee::where('class',\App\Student::find($id)->class)->where('term',\App\Session::first()->terms)->get() as $ent)
                        <tr>
                    <span id="medicine">
                    	 <div class="form-group">
                    	<td>{{$loop->iteration}}</td>
                    	<td>
                  <input  value="{{$ent->name}}" readonly placeholder="@lang('admin.fee_name')" type="text" class="form-control col-md-7 col-xs-12">
                  <input name="name[]" style="display: none;" value="{{$ent->id}}" readonly placeholder="@lang('admin.fee_name')" type="text" class="form-control col-md-7 col-xs-12">
                </td>
                  <td>
                 	@if($ent->option=='Compulsory')
                  <input name="amount[]" value="{{$ent->price}}" readonly placeholder="@lang('admin.fee_amount')" type="number" class="form-control col-md-7 col-xs-12 price">
                  @else
                   <input name="amount[]" value="{{$ent->price}}" oninput="resetval()" placeholder="@lang('admin.fee_amount')" type="number" class="form-control col-md-7 col-xs-12 price">
                   @endif
              </td>
                  <td>
                   <input name="option[]" value="{{$ent->option}}" readonly placeholder="" type="text" class="form-control col-md-7 col-xs-12">
               </td>
               <td>
               	@if($ent->option!='Compulsory')
              <button onclick="deletemedicineParentElement(this)"  type="button" class="btn btn-primary"><i class="fa fa-trash"></i></button>
             @endif
                                      </td>
                                  </div>
                                  </span>
                         </tr>
          @endforeach
      </tbody>
       <tfoot>
            <tr>
            	<td></td>
            	<td>Total</td>
            	<td><input name="pamount"  readonly type="text" class="form-control col-md-7 col-xs-12 totalla"></td>
            	<td><input name="total" style="display: none;"  readonly type="text" class="form-control col-md-7 col-xs-12 totalld"><input type="number" style="display: none;" value="{{count(\App\Fpayment::where('student_id',$id)->where('session',\App\Session::first()->session)->where('term',\App\Session::first()->terms)->get())+1}}" name="index"></td>
            	<td></td>
            </tr>
  </table>
                            </div>
                       </div>
                            </div>
                            <div class="row">
                              <div class="col-md-6">
                                 <div class="form-group">
                                  <label>Discount %</label>
                                  <input type="number" value="0" oninput="resetval()" id="discount" class="form-control" placeholder="Discount %" name="discount">
                                 </div>
                              </div>
                               <div class="col-md-6">
                             <div class="form-group">
                              <label>@lang('admin.select') @lang('admin.payment') @lang('admin.plan') *</label>
                              <select required class="form-control" id="planstat" name="plan">
                                <option value="">@lang('admin.select') @lang('admin.plan')</option>
                               @foreach(\App\Plan::where('delete','0')->get() as $plan)
                             <option value="{{$plan->id}}">{{$plan->name}}</option>
                             @endforeach
                              </select>
                            </div>
                          </div>
                        </div>
                            <div class="row">
                              <div class="container">
                                 <p>@lang('admin.total') @lang('admin.fee'): <b id="payamount"></b></p>
                                  <p>@lang('admin.add_per_fee'): <b id="paycomision"></b></p>
                                 <p>@lang('admin.next') @lang('admin.payment'): <b id="paynext"></b></p>
                                  <p style="color: blue;">@lang('admin.exp_amt_pay'): {{\App\Currency::find(\App\Setting::first()->currency)->symbol}}<b id="paytotal"></b></p>
                              </div>
                     
                            </div>
                            <hr>
                                     <div class="row">
                                        <div class="col-md-4">
                                           <input type="submit" class="form-control btn btn-primary btn-block text-white" value="@lang('admin.make_pay')">
                                        </div>
                                    <div class="col-md-4">
                     
                                     </div>
                                        <div class="col-md-4">
                                          
                                        </div>
                                    </div>
                                  </form>
                                
                        </div>
                    </div>
                </div>
            </div>
            <script type="text/javascript">
         function calculate(){
         	var sum=0;
    $(".price").each(function(){
     var value=$(this).val();
     if(!isNaN(value)&&value.length !=0){
        sum+=parseFloat(value);
     }   
    });
    $(".totalla").val(sum);
         }
         $("#planstat").change(function(){
   var index=$(this).val();
   var discount=$(".totalla").val();
   if($('#discount').val()){
 discount=$('.totalla').val()-(($(".totalla").val()*$('#discount').val())/100);
   }
   getplan(index,'1', function(location){
   // this is where you get the return value
 $('#payamount').text('{{\App\Currency::find(\App\Setting::first()->currency)->symbol}}'+Math.ceil(discount).toLocaleString());
 $('#paynext').text(location['date']);
  $('#paycomision').text('{{\App\Currency::find(\App\Setting::first()->currency)->symbol}}'+Math.ceil(parseInt((discount*location['com'])/100)).toLocaleString());
  $('#paytotal').text(Math.ceil(parseInt(discount*(location['percent']/100))+parseInt((discount*location['com'])/100)).toLocaleString());
  $(".totalld").val(Math.ceil(parseInt(discount*(location['percent']/100))+parseInt((discount*location['com'])/100)));
});
  });

         function getplan(id,index,valuen){
      $.get('{{url('')}}/get/plan/status/'+id+'/'+index, function(datab) {
          valuen(datab);
            });  
         }

     $(document).ready(function() {
       setInterval(function(){
calculate();
   }, 1000);      	
});
     function resetval(){
       $('#planstat option').prop('selected', function() {
         $('#payamount').text('');
 $('#paynext').text('');
  $('#paycomision').text('');
  $('#paytotal').text('');
  $(".totalld").val('');
        return this.defaultSelected;
    });
     }
      var medicine_count      = {{count(\App\Fee::where('class',\App\Student::find($id)->class)->get())}};
    var total_amount        = 0;
    var deleted_medicines   = [];
      // REMOVING medicine INPUT
    function deletemedicineParentElement(n, medicine_count) {
        n.parentNode.parentNode.parentNode.removeChild(n.parentNode.parentNode);
        deleted_medicines.push(medicine_count);
         $('#planstat option').prop('selected', function() {
         $('#paynext').text('');
  $('#paycomision').text('');
  $('#paytotal').text('');
  $(".totalld").val('');
        return this.defaultSelected;
    });
    }
            </script>