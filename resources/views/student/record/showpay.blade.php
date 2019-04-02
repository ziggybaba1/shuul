 <div class="row">
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-body">
@if(count(\App\Invoice::where('class_id',\App\Student::find($id)->class)->get())>0)
<h4 class="card-title">{{\App\Student::find($id)->gname}} {{\App\Student::find($id)->fname}} Invoice: 
  {{\App\Invoice::where('class_id',\App\Student::find($id)->class)->latest()->first()->token}} Payment</h4>
                <h6 class="card-subtitle"></h6>
    <form action="{{url('')}}/receive/student/payment/{{$id}}" method="post" enctype="multipart/form-data" class="">
         {{ csrf_field() }}
         <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                              <label>Invoice ID</label>
                             <input value="{{\App\Invoice::where('class_id',\App\Student::find($id)->class)->latest()->first()->token}}" type="text" class="form-control" name="token">
                            </div>
                            </div>
                            <div class="col-md-4">
                             <div class="form-group">
                              <label>Session</label>
                             <input value="{{\App\Invoice::where('class_id',\App\Student::find($id)->class)->latest()->first()->session}}" type="text" class="form-control" name="session">
                            </div>
                        </div> 
                        <div class="col-md-4">
                             <div class="form-group">
                              <label>Term</label>
                             <input value="{{\App\Invoice::where('class_id',\App\Student::find($id)->class)->latest()->first()->term}}" type="text" class="form-control" name="term">
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
                                                <th>Fee Name</th>
                                 <th>Amount ({{\App\Currency::find(\App\Setting::first()->currency)->symbol}})</th>
                                                <th>Option</th>
                                                <th>Remove</th>
                                            </tr>
                                        </thead>
                                    <tbody>
@foreach(\App\Fee::where('class',\App\Student::find($id)->class)->where('term',\App\Invoice::where('class_id',\App\Student::find($id)->class)->latest()->first()->term)->get() as $ent)
                        <tr>
                    <span id="medicine">
                    	 <div class="form-group">
                    	<td>{{$loop->iteration}}</td>
                    	<td>
                  <input name="name[]" value="{{$ent->name}}" readonly placeholder="Fee Name" type="text" class="form-control col-md-7 col-xs-12"></td>
                  <td>
                 	@if($ent->option=='Compulsory')
                  <input name="amount[]" value="{{$ent->price}}" readonly placeholder="Fee Amount" type="number" class="form-control col-md-7 col-xs-12 price">
                  @else
                   <input name="amount[]" value="{{$ent->price}}" placeholder="Fee Amount" type="number" class="form-control col-md-7 col-xs-12 price">
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
            	<td><input name="total" readonly type="text" class="form-control col-md-7 col-xs-12 totalla"></td>
            	<td></td>
            	<td></td>
            </tr>
  </table>
                            </div>
                       </div>
                            </div>
                                     <div class="row">
                                        <div class="col-md-2"></div>
                                    <div class="col-md-8">
                      <input type="submit" class="form-control btn btn-primary btn-block" value="Accept Payment">
                                     </div>
                                        <div class="col-md-2"></div>
                                    </div>
                                  </form>
                                  @else
                                  <h4 class="card-title">Invoice have not been generated for Class {{\App\Course::find(\App\Student::find($id)->class)->title}}, Contact Admin or Account Department for clarification.</h4>
                                  @endif
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
     $(document).ready(function() {
       setInterval(function(){
calculate();
   }, 1000);      	
});
      var medicine_count      = {{count(\App\Fee::where('class',\App\Student::find($id)->class)->get())}};
    var total_amount        = 0;
    var deleted_medicines   = [];
      // REMOVING medicine INPUT
    function deletemedicineParentElement(n, medicine_count) {
        n.parentNode.parentNode.parentNode.removeChild(n.parentNode.parentNode);
        deleted_medicines.push(medicine_count);
    }
            </script>