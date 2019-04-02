<div class="card-body">
                                <h4 class="card-title">{{\App\Student::find($id)->gname}} {{\App\Student::find($id)->fname}} Assigned Text Book List</h4>
                                <h6 class="card-subtitle"></h6>
      <form action="{{url('')}}/accept/book/payment/{{$id}}"  method="post" class="form-horizontal m-t-40 formpay" class="form">
                                 {{ csrf_field() }}
        <div style="overflow-y: auto;max-height: 300px;">

                    <span id="medicine">
    @foreach(\App\Bookassign::where('class',\App\Student::find($id)->class)->get() as $ent)
                         <div class="form-group">
                          <div class="input-group">
                  <input name="name[]" value="{{$ent->name}}" placeholder="Book Name" type="text" class="form-control col-md-7 col-xs-12">
            <input name="price[]" value="{{\App\Currency::find(\App\Setting::first()->currency)->symbol}}{{$ent->price}}" placeholder="Book Price" type="text" class="form-control col-md-7 col-xs-12">
             <input name="avail[]" value="{{$ent->avail}}" readonly type="text" class="form-control col-md-7 col-xs-12">
                <span class="input-group-btn">
            <div  class="checkbox">
          @if(count(\App\Payitem::where('item_id',$ent->id)->where('student_id',$id)->where('status','0')->get())>0)

                <input type="checkbox" name="reqid[]" checked class="form-control id-check" id="checkbox{{$loop->iteration}}"  value="{{$ent->id}}">
                <label for="checkbox{{$loop->iteration}}"></label>
                <input name="check_price[]" value="{{$ent->price}}" placeholder="Book Price" disabled type="hidden" class="form-control col-md-7 col-xs-12 myinput">
                 <input type="hidden" style="display: none;" name="payid" value="">
                
       @elseif(count(\App\Payitem::where('item_id',$ent->id)->where('student_id',$id)->where('status','1')->get())>0)
          <input type="checkbox" readonly  disabled name="reqid[]" class="form-control id-check" id="checkbox{{$loop->iteration}}"  value="{{$ent->id}}">
                <label style="display: none;" for="checkbox{{$loop->iteration}}"><i class="fa fa-check"></i>Paid</label>
                 <h4><i class="fa fa-check"></i>Paid</h4>
                <input name="check_price[]" readonly disabled value="{{$ent->price}}" placeholder="Book Price" disabled type="hidden" class="form-control col-md-7 col-xs-12 myinput">
                  <input type="hidden" style="display: none;" name="payid" value="">
          @elseif(count(\App\Payitem::where('item_id',$ent->id)->where('student_id',$id)->where('status','1')->get())==0)
           <input type="checkbox" name="reqid[]" checked class="form-control id-check" id="checkbox{{$loop->iteration}}"  value="{{$ent->id}}">
                <label for="checkbox{{$loop->iteration}}"></label>
                <input name="check_price[]" value="{{$ent->price}}" placeholder="Book Price" disabled type="hidden" class="form-control col-md-7 col-xs-12 myinput">
                 <input type="hidden" style="display: none;" name="payid" value="">
          @endif
                </div>
                </span>
                  <span style="width: 20px;"></span>
                        </div>
                      </div>
          @endforeach
                               </span>
                           </div>
                             <div class="row">
                                <div class="col-md-2"></div>
                                <div class="col-md-4">
                               <div class="form-group">
                        <label>Total Amount {{\App\Currency::find(\App\Setting::first()->currency)->symbol}}</label>
                            <input type="number" name="amount" class="form-control totalla" >
                                </div>
                              </div>
                             
                              <div class="col-md-2"></div>
                            </div>
                               
                            <hr>
                               <div class="row">
                                <div class="col-md-4"></div>
                                <div class="col-md-4">
                               <div class="form-group">
                            <input type="submit" id="submit_val" class="form-control btn btn-primary" value="Accept Payment">

                                </div>
                              </div>
                            
                            </div>
                            </form>
                            </div>
                            <script type="text/javascript">
  $(document).ready(function() {
      setInterval(function(){
  recalculate();
  }, 1000);       
});

function recalculate(){
    var sum = 0;
    $("input[type=checkbox]:checked").each(function(){
     var value= $(this).closest('div').find('.myinput').val();
     if(!isNaN(value)&&value.length !=0){
        sum+=parseFloat(value);
     }   
    });
    
  $(".totalla").val(sum);
}
</script>