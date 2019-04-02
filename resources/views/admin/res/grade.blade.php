 <hr>
                                     <h4 class="card-title">{{\App\Resultphrase::first()->grade}}</h4>
                                     <hr>
            <form action="{{url('')}}/admin/grade/create/{{$id}}" method="post">
                                        <div class="row">
                                            <div class="col-md-12">
 
              {{ csrf_field() }}
                    <div class="form-group">
                       <div class="input-group">
                  <select class="form-control col-md-12 col-xs-12" name="session">
                    <option>{{\App\Session::first()->session}}</option>
                    <option>{{\Carbon\Carbon::today()->addYear(0)->format('Y')}}/{{\Carbon\Carbon::today()->addYear(1)->format('Y')}}</option>
        <option>{{\Carbon\Carbon::today()->addYear(-1)->format('Y')}}/{{\Carbon\Carbon::today()->addYear(0)->format('Y')}}</option>
                    </select>
                 <select class="form-control col-md-12 col-xs-12" name="terms">
                   @if(\App\Session::latest()->first()->terms==='First')
                                <option value="First">@lang('admin.first_term')</option>
                    <option value="Second">@lang('admin.second_term')</option>
                    <option value="Third">@lang('admin.third_term')</option>
                     <option value="Fourth">@lang('admin.fourth_term')</option>
                                @elseif(\App\Session::latest()->first()->terms==='Second')
                                 <option value="Second">@lang('admin.second_term')</option>
                    <option value="Third">@lang('admin.third_term')</option>
                     <option value="Fourth">@lang('admin.fourth_term')</option>
                     <option value="First">@lang('admin.first_term')</option>
                                 @elseif(\App\Session::latest()->first()->terms==='Third')
                                <option value="Third">@lang('admin.third_term')</option>
                     <option value="Fourth">@lang('admin.fourth_term')</option>
                     <option value="First">@lang('admin.first_term')</option>
                     <option value="Second">@lang('admin.second_term')</option>
                                 @elseif(\App\Session::latest()->first()->terms==='Fourth')
                               <option value="Fourth">@lang('admin.fourth_term')</option>
                     <option value="First">@lang('admin.first_term')</option>
                     <option value="Second">@lang('admin.second_term')</option>
                     <option value="Third">@lang('admin.third_term')</option>
                             @endif
                   
                    </select>
                          </div> 
                    </div>
                                    <span id="medicine">
    @foreach(\App\Subjectassign::where('student',$id)->where('class',\App\Student::find($id)->class)->where('term',\App\Session::first()->terms)->where('session',\App\Session::first()->session)->get() as $student)
     
        @if($student->sign==\Auth::user()->id||\Auth::user()->role=='admin')
        <div class="form-group card" style="border: 2px solid #6b6b6b;">
       <div class="input-group">
         <span class="input-group-btn">
        <select class="form-control" name="subject[]">
        <option value="{{$student->subject}}">{{\App\Subject::find($student->subject)->title}}</option>
                    </select>
        <input type="number" style="border-color: blue;" value="{{$student->start_grade}}" placeholder="{{\App\Resultphrase::first()->start_term}} {{\App\Resultphrase::first()->cont_asses}} @lang('admin.score')" class="form-control " name="start_grade[]">
         <input type="number" style="border-color: blue;" value="{{$student->test_grade}}" placeholder="{{\App\Resultphrase::first()->mid_term}} {{\App\Resultphrase::first()->cont_asses}} @lang('admin.score')" class="form-control " name="test_grade[]">
          <input type="number" style="border-color: blue;" value="{{$student->project_grade}}" placeholder="{{\App\Resultphrase::first()->project}} {{\App\Resultphrase::first()->cont_asses}} @lang('admin.score')" class="form-control " name="project_grade[]">
           <input type="number" style="border-color: blue;" value="{{$student->exam_grade}}" placeholder="{{\App\Resultphrase::first()->exam}} @lang('admin.score')" class="form-control " name="exam_grade[]">
            <button onclick="deletemedicineParentElement(this)"  type="button" class="btn btn-danger"><i class="fa fa-trash"></i></button>
          </span>
        </div>
         <div class="input-group">
         <span class="input-group-btn">
        <select class="form-control col-md-12 col-xs-12" disabled>
        <option value="{{$student->subject}}">{{\App\Subject::find($student->subject)->title}}</option>
                    </select>
       <input type="number" style="border-color: red;" value="{{$student->start_over}}" placeholder="{{\App\Resultphrase::first()->start_term}} {{\App\Resultphrase::first()->cont_asses}} @lang('admin.total')" class="form-control " name="start_over[]">
                <input type="number" style="border-color: red;" value="{{$student->test_over}}" placeholder="{{\App\Resultphrase::first()->mid_term}} {{\App\Resultphrase::first()->cont_asses}} @lang('admin.total')" class="form-control " name="test_over[]">
                 <input type="number" style="border-color: red;" value="{{$student->project_over}}" placeholder="{{\App\Resultphrase::first()->project}} {{\App\Resultphrase::first()->cont_asses}} @lang('admin.total')" class="form-control " name="project_over[]">
                <input type="number" style="border-color: red;" value="{{$student->exam_over}}" placeholder="{{\App\Resultphrase::first()->exam}} @lang('admin.total')" class="form-control " name="exam_over[]">
                           
 <button onclick="deletemedicineParentElement(this)"  type="button" class="btn btn-danger"><i class="fa fa-trash"></i></button>
                            </span>
        </div>
      </div>
        @elseif($student->sign!=\Auth::user()->id)
         <div class="form-group card" style="border: 2px solid #6b6b6b;">
       <div class="input-group">
         <span class="input-group-btn">
           <select class="form-control col-md-12 col-xs-12" name="subject[]">
        <option value="{{$student->subject}}">{{\App\Subject::find($student->subject)->title}}</option>
                    </select>
         <input type="number" style="border-color: blue;" value="{{$student->start_grade}}" placeholder="{{\App\Resultphrase::first()->start_term}} {{\App\Resultphrase::first()->cont_asses}} @lang('admin.score')" class="form-control col-md-12 col-xs-12 readonly" name="start_grade[]">
          <input type="number" style="border-color: blue;" value="{{$student->test_grade}}" placeholder="{{\App\Resultphrase::first()->mid_term}} {{\App\Resultphrase::first()->cont_asses}} @lang('admin.score')" class="form-control col-md-12 col-xs-12 readonly" name="test_grade[]">
        <input type="number" style="border-color: blue;" value="{{$student->project_grade}}" placeholder="{{\App\Resultphrase::first()->project}} {{\App\Resultphrase::first()->cont_asses}} @lang('admin.score')" class="form-control col-md-12 col-xs-12 readonly" name="project_grade[]">
         <input type="number" style="border-color: blue;" value="{{$student->exam_grade}}" placeholder="{{\App\Resultphrase::first()->exam}} @lang('admin.score')" class="form-control col-md-12 col-xs-12 readonly" name="exam_grade[]">
</span>
</div>
 <div class="input-group">
         <span class="input-group-btn">
           <select class="form-control col-md-12 col-xs-12" disabled>
        <option value="{{$student->subject}}">{{\App\Subject::find($student->subject)->title}}</option>
                    </select>
        <input type="number" style="border-color: red;" value="{{$student->start_over}}" placeholder="{{\App\Resultphrase::first()->start_term}} {{\App\Resultphrase::first()->cont_asses}} @lang('admin.total')" class="form-control col-md-12 col-xs-12 readonly" name="start_over[]">
       <input type="number" style="border-color: red;" value="{{$student->test_over}}" placeholder="{{\App\Resultphrase::first()->mid_term}} {{\App\Resultphrase::first()->cont_asses}} @lang('admin.total')" class="form-control col-md-12 col-xs-12 readonly" name="test_over[]">
      <input type="number" style="border-color: red;" value="{{$student->project_over}}" placeholder="{{\App\Resultphrase::first()->project}} {{\App\Resultphrase::first()->cont_asses}} @lang('admin.total')" class="form-control col-md-12 col-xs-12 readonly" name="project_over[]">
        <input type="number" style="border-color: red;" value="{{$student->exam_over}}" placeholder="{{\App\Resultphrase::first()->exam}} @lang('admin.total')" class="form-control col-md-12 col-xs-12 readonly" name="exam_over[]">
      </span>
    </div>
  </div>
                @endif
               
                        @endforeach
                          <div class="form-group card" style="border: 2px solid #6b6b6b;">
                          <div class="input-group">
         <span class="input-group-btn">
           <select class="form-control" name="subject[]">
                    <option>Select Subject</option>
        @foreach(\App\Subject::where('class',\App\Student::find($id)->class)->get() as $subject)
        <option value="{{$subject->id}}">{{$subject->title}}</option>
        @endforeach
                    </select>
 <input type="number" style="border-color: blue;"  placeholder="{{\App\Resultphrase::first()->start_term}} {{\App\Resultphrase::first()->cont_asses}} @lang('admin.score')" class="form-control col-md-12 col-xs-12" name="start_grade[]">
   <input type="number" style="border-color: blue;"  placeholder="{{\App\Resultphrase::first()->mid_term}} {{\App\Resultphrase::first()->cont_asses}} @lang('admin.score')" class="form-control col-md-12 col-xs-12" name="test_grade[]">
    <input type="number" style="border-color: blue;"  placeholder="{{\App\Resultphrase::first()->project}} {{\App\Resultphrase::first()->cont_asses}} @lang('admin.score')" class="form-control col-md-12 col-xs-12" name="project_grade[]">
     <input type="number" style="border-color: blue;" placeholder="{{\App\Resultphrase::first()->exam}} @lang('admin.score')" class="form-control col-md-12 col-xs-12" name="exam_grade[]">
   </span>
 </div>
  <div class="input-group">
         <span class="input-group-btn">
         <select class="form-control" disabled> <option>Select Subject</option>
 @foreach(\App\Subject::where('class',\App\Student::find($id)->class)->get() as $subject)
        <option value="{{$subject->id}}">{{$subject->title}}</option>
        @endforeach
         </select>
    <input type="number" style="border-color: red;"  placeholder="{{\App\Resultphrase::first()->start_term}} {{\App\Resultphrase::first()->cont_asses}} @lang('admin.total')" class="form-control col-md-12 col-xs-12" name="start_over[]">
    <input type="number" style="border-color: red;"  placeholder="{{\App\Resultphrase::first()->mid_term}} {{\App\Resultphrase::first()->cont_asses}} @lang('admin.total')" class="form-control col-md-12 col-xs-12" name="test_over[]">
    <input type="number" style="border-color: red;" placeholder="{{\App\Resultphrase::first()->project}} {{\App\Resultphrase::first()->cont_asses}} @lang('admin.total')" class="form-control col-md-12 col-xs-12" name="project_over[]">
    <input type="number" style="border-color: red;" placeholder="{{\App\Resultphrase::first()->exam}} @lang('admin.total')" class="form-control col-md-12 col-xs-12" name="exam_over[]">
    <button onclick="add_medicine()"  type="button" class="btn btn-primary"><i class="fa fa-plus"></i></button>
    </span>
  </div>
</div>
                                          </span>

                          <span id="medicine_input">
                                <div class="form-group card" style="border: 2px solid #6b6b6b;">
                          <div class="input-group">
         <span class="input-group-btn">
                    <select class="form-control col-md-12 col-xs-12" name="subject[]">
        @foreach(\App\Subject::where('class',\App\Student::find($id)->class)->get() as $subject)
        <option value="{{$subject->id}}">{{$subject->title}}</option>
        @endforeach
                    </select>
   <input type="number" style="border-color: blue;"  placeholder="{{\App\Resultphrase::first()->start_term}} {{\App\Resultphrase::first()->cont_asses}} @lang('admin.score')" class="form-control col-md-12 col-xs-12" name="start_grade[]">
    <input type="number" style="border-color: blue;"  placeholder="{{\App\Resultphrase::first()->mid_term}} {{\App\Resultphrase::first()->cont_asses}} @lang('admin.score')" class="form-control col-md-12 col-xs-12" name="test_grade[]">
    <input type="number" style="border-color: blue;"  placeholder="{{\App\Resultphrase::first()->project}} {{\App\Resultphrase::first()->cont_asses}} @lang('admin.score')" class="form-control col-md-12 col-xs-12" name="project_grade[]">
    <input type="number" style="border-color: blue;" placeholder="{{\App\Resultphrase::first()->exam}} @lang('admin.score')" class="form-control col-md-12 col-xs-12" name="exam_grade[]">
     <button onclick="deletemedicineParentElement(this)"  type="button" class="btn btn-danger"><i class="fa fa-trash"></i></button>
</span>
</div>
  <div class="input-group">
         <span class="input-group-btn">
 <select class="form-control col-md-12 col-xs-12" disabled>
        @foreach(\App\Subject::where('class',\App\Student::find($id)->class)->get() as $subject)
        <option value="{{$subject->id}}">{{$subject->title}}</option>
        @endforeach
                    </select>
                <input type="number" style="border-color: red;"  placeholder="{{\App\Resultphrase::first()->start_term}} {{\App\Resultphrase::first()->cont_asses}} @lang('admin.total')" class="form-control col-md-12 col-xs-12" name="start_over[]">
                <input type="number" style="border-color: red;"  placeholder="{{\App\Resultphrase::first()->mid_term}} {{\App\Resultphrase::first()->cont_asses}} @lang('admin.total')" class="form-control col-md-12 col-xs-12" name="test_over[]">
                 <input type="number" style="border-color: red;" placeholder="{{\App\Resultphrase::first()->project}} {{\App\Resultphrase::first()->cont_asses}} @lang('admin.total')" class="form-control col-md-12 col-xs-12" name="project_over[]">
                <input type="number" style="border-color: red;" placeholder="{{\App\Resultphrase::first()->exam}} @lang('admin.total')" class="form-control col-md-12 col-xs-12" name="exam_over[]">
              <button onclick="deletemedicineParentElement(this)"  type="button" class="btn btn-danger"><i class="fa fa-trash"></i></button>
                               </span></div>
                             </div>
                           </span>
                       </div>
                                        </div>
                                          <div class="row">
<div class="col-md-4">

</div>
<div class="col-md-4">
   <input type="submit" class="btn btn-sm btn-primary btn-block" value="Sumbmit Grade"> 
</div>
</div>
</form>
<script type="text/javascript">
   setInterval(function(){
 $('.readonly').attr('readonly', true);
}, 500);
    var medicine_count      = {{count(\App\Subjectassign::where('student',$id)->where('class',\App\Student::find($id)->class)->where('term',\App\Session::first()->terms)->where('session',\App\Session::first()->session)->get())}};
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