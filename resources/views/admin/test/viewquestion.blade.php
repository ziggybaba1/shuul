 <div class="row">
     <div class="col-12">
     	<div class="card">
          <div class="card-body">
     (1)	{!!\App\Question::find($id)->title!!}<br><br>
    <div class="checkbox">
   <input value="A" name="item[]" type="radio" id="checkbox1">
    <label for="checkbox1">{!!\App\Option::where('batch_id',\App\Question::find($id)->id)->latest()->first()->option1!!}</label><br>
     <input value="B" name="item[]" type="radio" id="checkbox2">
   <label for="checkbox2">{!!\App\Option::where('batch_id',\App\Question::find($id)->id)->latest()->first()->option2!!}</label><br>
  <input value="C" name="item[]" type="radio" id="checkbox3">
   <label for="checkbox3">{!!\App\Option::where('batch_id',\App\Question::find($id)->id)->latest()->first()->option3!!}</label><br>
  <input value="D" name="item[]" type="radio" id="checkbox4">
   <label for="checkbox4">{!!\App\Option::where('batch_id',\App\Question::find($id)->id)->latest()->first()->option4!!}</label><br>
</div>
     </div>
 </div>
     </div>
 </div>