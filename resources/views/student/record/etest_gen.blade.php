  <div id="showresultshere">
    <div class="row">
    <div class="col-md-12">
                        <div class="card">
                             <div class="card-body">
  <h4>{{\App\User::find(\App\Student::find(\App\Esubmit::find($id)->student_id)->data_id)->name}} with ID:{{\App\Teacher::find(\App\Esubmit::find($id)->student_id)->user_id}},
@if(\App\Batch::find(\App\Esubmit::find($id)->batch_id)->type=='1')
   {{\App\Subject::find(\App\Batch::find(\App\Esubmit::find($id)->batch_id)->subject)->title}}
@elseif(\App\Batch::find(\App\Esubmit::find($id)->batch_id)->type=='2')
{{\App\Batch::find(\App\Esubmit::find($id)->batch_id)->subject}}
@endif
    Result</h4>
                             </div>
                         </div>
                     </div>
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                 
      <h3 class="card-title"><b>Subject: @if(\App\Batch::find(\App\Esubmit::find($id)->batch_id)->type=='1')
   {{\App\Subject::find(\App\Batch::find(\App\Esubmit::find($id)->batch_id)->subject)->title}}
@elseif(\App\Batch::find(\App\Esubmit::find($id)->batch_id)->type=='2')
{{\App\Batch::find(\App\Esubmit::find($id)->batch_id)->subject}}
@endif</b></h3>
                                <h6 class="card-subtitle"></h6>
@if(\Auth::user()->role!='student')
<form class="formsubmit" id="formsubmit" action="{{url('')}}/submitted/test/scores/{{$id}}" method="post">
     {{ csrf_field() }}                             
     @endif 
@foreach(\App\Question::where('batch_id',\App\Esubmit::find($id)->batch_id)->get() as $test)
<div style="background-color: green;color: white;"><b>({{$loop->iteration}})</b></div>
                   <label> {!!$test->title!!}</label><br><br>
    <div class="checkbox">
@if(json_decode(\App\Esubmit::where('batch_id',\App\Esubmit::find($id)->batch_id)->first()->result)[$loop->iteration-1]->result=='A')
@if($test->correct==json_decode(\App\Esubmit::where('batch_id',\App\Esubmit::find($id)->batch_id)->first()->result)[$loop->iteration-1]->result)
   <input value="A" readonly checked name="{{\App\Option::where('batch_id',$test->id)->first()->key}}" type="radio" id="checkbox{{\App\Option::where('batch_id',$test->id)->first()->id}}i{{$loop->iteration+0}}">
    <label for="">{!!\App\Option::where('batch_id',$test->id)->latest()->first()->option1!!} </label><i style="color: green;" class="fa fa-check fa-2x"></i><br>
    <input value="B" readonly name="{{\App\Option::where('batch_id',$test->id)->first()->key}}" type="radio" id="checkbox{{\App\Option::where('batch_id',$test->id)->first()->id}}j{{$loop->iteration+1}}">
   <label for="">{!!\App\Option::where('batch_id',$test->id)->latest()->first()->option2!!}</label><br>
  <input value="C" readonly name="{{\App\Option::where('batch_id',$test->id)->first()->key}}" type="radio" id="checkbox{{\App\Option::where('batch_id',$test->id)->first()->id}}k{{$loop->iteration+2}}">
   <label for="">{!!\App\Option::where('batch_id',$test->id)->latest()->first()->option3!!}</label><br>
  <input value="D" readonly name="{{\App\Option::where('batch_id',$test->id)->first()->key}}" type="radio" id="checkbox{{\App\Option::where('batch_id',$test->id)->first()->id}}l{{$loop->iteration+3}}">
   <label for="">{!!\App\Option::where('batch_id',$test->id)->latest()->first()->option4!!}</label><br>
@elseif($test->correct!=json_decode(\App\Esubmit::where('batch_id',\App\Esubmit::find($id)->batch_id)->first()->result)[$loop->iteration-1]->result)
<input value="A" readonly checked name="{{\App\Option::where('batch_id',$test->id)->first()->key}}" type="radio" id="checkbox{{\App\Option::where('batch_id',$test->id)->first()->id}}i{{$loop->iteration+0}}">
    <label for="">{!!\App\Option::where('batch_id',$test->id)->latest()->first()->option1!!} </label><i style="color: red;" class="fa fa-times fa-2x"></i><br>
    <input value="B" readonly name="{{\App\Option::where('batch_id',$test->id)->first()->key}}" type="radio" id="checkbox{{\App\Option::where('batch_id',$test->id)->first()->id}}j{{$loop->iteration+1}}">
   <label for="">{!!\App\Option::where('batch_id',$test->id)->latest()->first()->option2!!}</label><br>
  <input value="C" readonly name="{{\App\Option::where('batch_id',$test->id)->first()->key}}" type="radio" id="checkbox{{\App\Option::where('batch_id',$test->id)->first()->id}}k{{$loop->iteration+2}}">
   <label for="">{!!\App\Option::where('batch_id',$test->id)->latest()->first()->option3!!}</label><br>
  <input value="D" readonly name="{{\App\Option::where('batch_id',$test->id)->first()->key}}" type="radio" id="checkbox{{\App\Option::where('batch_id',$test->id)->first()->id}}l{{$loop->iteration+3}}">
   <label for="">{!!\App\Option::where('batch_id',$test->id)->latest()->first()->option4!!}</label><br>
@endif
@elseif(json_decode(\App\Esubmit::where('batch_id',\App\Esubmit::find($id)->batch_id)->first()->result)[$loop->iteration-1]->result=='B')
@if($test->correct==json_decode(\App\Esubmit::where('batch_id',\App\Esubmit::find($id)->batch_id)->first()->result)[$loop->iteration-1]->result)
 <input value="A" readonly checked name="{{\App\Option::where('batch_id',$test->id)->first()->key}}" type="radio" id="checkbox{{\App\Option::where('batch_id',$test->id)->first()->id}}i{{$loop->iteration+0}}">
    <label for="">{!!\App\Option::where('batch_id',$test->id)->latest()->first()->option1!!}</label><br>
     <input value="B" readonly checked name="{{\App\Option::where('batch_id',$test->id)->first()->key}}" type="radio" id="checkbox{{\App\Option::where('batch_id',$test->id)->first()->id}}j{{$loop->iteration+1}}">
   <label for="">{!!\App\Option::where('batch_id',$test->id)->latest()->first()->option2!!} </label><i style="color: green;" class="fa fa-check fa-2x"></i><br>
  <input value="C" readonly name="{{\App\Option::where('batch_id',$test->id)->first()->key}}" type="radio" id="checkbox{{\App\Option::where('batch_id',$test->id)->first()->id}}k{{$loop->iteration+2}}">
   <label for="">{!!\App\Option::where('batch_id',$test->id)->latest()->first()->option3!!}</label><br>
  <input value="D" readonly name="{{\App\Option::where('batch_id',$test->id)->first()->key}}" type="radio" id="checkbox{{\App\Option::where('batch_id',$test->id)->first()->id}}l{{$loop->iteration+3}}">
   <label for="">{!!\App\Option::where('batch_id',$test->id)->latest()->first()->option4!!}</label><br>
  @elseif($test->correct!=json_decode(\App\Esubmit::where('batch_id',\App\Esubmit::find($id)->batch_id)->first()->result)[$loop->iteration-1]->result)
<input value="A" readonly checked name="{{\App\Option::where('batch_id',$test->id)->first()->key}}" type="radio" id="checkbox{{\App\Option::where('batch_id',$test->id)->first()->id}}i{{$loop->iteration+0}}">
    <label for="">{!!\App\Option::where('batch_id',$test->id)->latest()->first()->option1!!}</label><br>
     <input value="B" readonly checked name="{{\App\Option::where('batch_id',$test->id)->first()->key}}" type="radio" id="checkbox{{\App\Option::where('batch_id',$test->id)->first()->id}}j{{$loop->iteration+1}}">
   <label for="">{!!\App\Option::where('batch_id',$test->id)->latest()->first()->option2!!} </label><i style="color: red;" class="fa fa-times fa-2x"></i><br>
  <input value="C" readonly name="{{\App\Option::where('batch_id',$test->id)->first()->key}}" type="radio" id="checkbox{{\App\Option::where('batch_id',$test->id)->first()->id}}k{{$loop->iteration+2}}">
   <label for="">{!!\App\Option::where('batch_id',$test->id)->latest()->first()->option3!!}</label><br>
  <input value="D" readonly name="{{\App\Option::where('batch_id',$test->id)->first()->key}}" type="radio" id="checkbox{{\App\Option::where('batch_id',$test->id)->first()->id}}l{{$loop->iteration+3}}">
   <label for="">{!!\App\Option::where('batch_id',$test->id)->latest()->first()->option4!!}</label><br>
  @endif
   @elseif(json_decode(\App\Esubmit::where('batch_id',\App\Esubmit::find($id)->batch_id)->first()->result)[$loop->iteration-1]->result=='C')
   @if($test->correct==json_decode(\App\Esubmit::where('batch_id',\App\Esubmit::find($id)->batch_id)->first()->result)[$loop->iteration-1]->result)
   <input value="A" readonly checked name="{{\App\Option::where('batch_id',$test->id)->first()->key}}" type="radio" id="checkbox{{\App\Option::where('batch_id',$test->id)->first()->id}}i{{$loop->iteration+0}}">
    <label for="">{!!\App\Option::where('batch_id',$test->id)->latest()->first()->option1!!}</label><br>
     <input value="B" readonly name="{{\App\Option::where('batch_id',$test->id)->first()->key}}" type="radio" id="checkbox{{\App\Option::where('batch_id',$test->id)->first()->id}}j{{$loop->iteration+1}}">
   <label for="">{!!\App\Option::where('batch_id',$test->id)->latest()->first()->option2!!}</label><br>
  <input value="C" readonly checked name="{{\App\Option::where('batch_id',$test->id)->first()->key}}" type="radio" id="checkbox{{\App\Option::where('batch_id',$test->id)->first()->id}}k{{$loop->iteration+2}}">
   <label for="">{!!\App\Option::where('batch_id',$test->id)->latest()->first()->option3!!} </label><i style="color: green;" class="fa fa-check fa-2x"></i><br>
  <input value="D" readonly name="{{\App\Option::where('batch_id',$test->id)->first()->key}}" type="radio" id="checkbox{{\App\Option::where('batch_id',$test->id)->first()->id}}l{{$loop->iteration+3}}">
   <label for="">{!!\App\Option::where('batch_id',$test->id)->latest()->first()->option4!!}</label><br>
  @elseif($test->correct!=json_decode(\App\Esubmit::where('batch_id',\App\Esubmit::find($id)->batch_id)->first()->result)[$loop->iteration-1]->result)
 <input value="A" readonly checked name="{{\App\Option::where('batch_id',$test->id)->first()->key}}" type="radio" id="checkbox{{\App\Option::where('batch_id',$test->id)->first()->id}}i{{$loop->iteration+0}}">
    <label for="">{!!\App\Option::where('batch_id',$test->id)->latest()->first()->option1!!}</label><br>
     <input value="B" readonly name="{{\App\Option::where('batch_id',$test->id)->first()->key}}" type="radio" id="checkbox{{\App\Option::where('batch_id',$test->id)->first()->id}}j{{$loop->iteration+1}}">
   <label for="">{!!\App\Option::where('batch_id',$test->id)->latest()->first()->option2!!}</label><br>
  <input value="C" readonly checked name="{{\App\Option::where('batch_id',$test->id)->first()->key}}" type="radio" id="checkbox{{\App\Option::where('batch_id',$test->id)->first()->id}}k{{$loop->iteration+2}}">
   <label for="">{!!\App\Option::where('batch_id',$test->id)->latest()->first()->option3!!} </label><i style="color: red;" class="fa fa-times fa-2x"></i><br>
  <input value="D" readonly name="{{\App\Option::where('batch_id',$test->id)->first()->key}}" type="radio" id="checkbox{{\App\Option::where('batch_id',$test->id)->first()->id}}l{{$loop->iteration+3}}">
   <label for="">{!!\App\Option::where('batch_id',$test->id)->latest()->first()->option4!!}</label><br>
  @endif
     @elseif(json_decode(\App\Esubmit::where('batch_id',\App\Esubmit::find($id)->batch_id)->first()->result)[$loop->iteration-1]->result=='D')
     @if($test->correct==json_decode(\App\Esubmit::where('batch_id',\App\Esubmit::find($id)->batch_id)->first()->result)[$loop->iteration-1]->result)
   <input value="A" readonly checked name="{{\App\Option::where('batch_id',$test->id)->first()->key}}" type="radio" id="checkbox{{\App\Option::where('batch_id',$test->id)->first()->id}}i{{$loop->iteration+0}}">
    <label for="">{!!\App\Option::where('batch_id',$test->id)->latest()->first()->option1!!}</label><br>
     <input value="B" readonly name="{{\App\Option::where('batch_id',$test->id)->first()->key}}" type="radio" id="checkbox{{\App\Option::where('batch_id',$test->id)->first()->id}}j{{$loop->iteration+1}}">
   <label for="">{!!\App\Option::where('batch_id',$test->id)->latest()->first()->option2!!}</label><br>
  <input value="C" readonly name="{{\App\Option::where('batch_id',$test->id)->first()->key}}" type="radio" id="checkbox{{\App\Option::where('batch_id',$test->id)->first()->id}}k{{$loop->iteration+2}}">
   <label for="">{!!\App\Option::where('batch_id',$test->id)->latest()->first()->option3!!}</label><br>
  <input value="D" readonly checked name="{{\App\Option::where('batch_id',$test->id)->first()->key}}" type="radio" id="checkbox{{\App\Option::where('batch_id',$test->id)->first()->id}}l{{$loop->iteration+3}}">
   <label for="">{!!\App\Option::where('batch_id',$test->id)->latest()->first()->option4!!} </label><i style="color: green;" class="fa fa-check fa-2x"></i><br>
     @elseif($test->correct!=json_decode(\App\Esubmit::where('batch_id',\App\Esubmit::find($id)->batch_id)->first()->result)[$loop->iteration-1]->result)
 <input value="A" readonly checked name="{{\App\Option::where('batch_id',$test->id)->first()->key}}" type="radio" id="checkbox{{\App\Option::where('batch_id',$test->id)->first()->id}}i{{$loop->iteration+0}}">
    <label for="">{!!\App\Option::where('batch_id',$test->id)->latest()->first()->option1!!}</label><br>
     <input value="B" readonly name="{{\App\Option::where('batch_id',$test->id)->first()->key}}" type="radio" id="checkbox{{\App\Option::where('batch_id',$test->id)->first()->id}}j{{$loop->iteration+1}}">
   <label for="">{!!\App\Option::where('batch_id',$test->id)->latest()->first()->option2!!}</label><br>
  <input value="C" readonly name="{{\App\Option::where('batch_id',$test->id)->first()->key}}" type="radio" id="checkbox{{\App\Option::where('batch_id',$test->id)->first()->id}}k{{$loop->iteration+2}}">
   <label for="">{!!\App\Option::where('batch_id',$test->id)->latest()->first()->option3!!}</label><br>
  <input value="D" readonly checked name="{{\App\Option::where('batch_id',$test->id)->first()->key}}" type="radio" id="checkbox{{\App\Option::where('batch_id',$test->id)->first()->id}}l{{$loop->iteration+3}}">
   <label for="">{!!\App\Option::where('batch_id',$test->id)->latest()->first()->option4!!} </label><i style="color: red;" class="fa fa-times fa-2x"></i><br>
     @endif
   @endif
</div>
@endforeach
@if(\Auth::user()->role!='student')
<div class="row">
                            <div class="col-md-3"></div>
             <div class="col-sm-6"> 
                 <div class="form-group">
                <input type="submit" required class="form-control btn btn-primary" value="@lang('admin.generate') @lang('admin.result')">
                    </div>  
                </div>
                 <div class="col-md-3"></div>
                        </div>

</form>
@endif
                </div>
            </div>
        </div>
    </div>
  </div>
  <script type="text/javascript">
    $(".formsubmit").submit(function(e) {
  var formDatan = new FormData(this);
  
    $form = $(this);
  $.ajax({
            url     : $form.attr('action'),
            type    : 'POST',
            data    : formDatan,
    success: function (data) {
        swal("@lang('admin.saved_info')", "@lang('admin.continue-button')", "success");
        jQuery('#showresultshere').html(data);
       
      },
      error:function(data){
         alert(data);
      },
       cache: false,
        contentType: false,
        processData: false
 });
   e.preventDefault();
});
</script>