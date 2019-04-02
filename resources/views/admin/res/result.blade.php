<hr>
                        <h4 class="card-title">@lang('admin.generate') @lang('admin.result')</h4>
                         <h6 class="card-subtitle">@lang('admin.generate_not')</h6>
                        <hr>
<form method="post" action="{{url('')}}/admin/generate/result/{{$id}}" enctype="multipart/form-data" class="form-horizontal form-label-left">
                        {{ csrf_field() }}
                                        <div class="row">
        <!--Start of Result Sheet -->  
                                         <div class="col-12">
                        <div class="card">
                <div class="card-body" id="">
                
                        <div class="inline-editor">
                         <div class="row"> 
                <div style="width:20%;">
                    <img width="100px" src="{{url('')}}/uploads/avatars/{{\App\Provider::first()->logo}}">
                </div>
                 <div style="width:80%;">
                    <h6 style="text-align: center; ">
                        <b>
                            <font face="Arial Black">{{\App\Provider::first()->name}}<br></font>
                        </b>
                <small>{{\App\Provider::first()->address}}<br>
                </small>
                <small>{{\App\Provider::first()->phone1}}, {{\App\Provider::first()->phone2}}<br>
                </small>
                @if(\App\Resultsetting::first()->web=='1')
                <a>
                <small>{{\App\Provider::first()->web}}</small>
            </a>
            @endif
            <p style="text-align: center; "></p>
            <p style="text-align: center; ">
                <b>{{\App\Resultphrase::first()->result_sheet}}</b>
            </p>
        </h6>
    </div>
  </div>
<br>

 <div class="row"> 
     <div style="width:5%;"></div>
            <p style="text-align: left;">
               <small>{{\App\Resultphrase::first()->name}}: <b>{{\App\Student::find($id)->gname}} {{\App\Student::find($id)->fname}}</b></small>
                &nbsp; &nbsp; &nbsp;
                  <small>{{\App\Resultphrase::first()->adm_no}}:<b> {{\App\Student::find($id)->user_id}}</b></small>&nbsp; &nbsp; &nbsp; &nbsp; 
                    <small>{{\App\Resultphrase::first()->sex}}: <b>{{\App\Student::find($id)->sex}}</b>&nbsp; &nbsp; &nbsp; {{\App\Resultphrase::first()->age}}:  <b>{{\Carbon\Carbon::parse(\App\Student::find($id)->dob)->age}}</b></small>&nbsp; &nbsp; &nbsp;
                 <small>{{\App\Resultphrase::first()->year}}: <b>{{\App\Session::latest()->first()->session}}</b></small>&nbsp; &nbsp; &nbsp; &nbsp; 
            <small>{{\App\Resultphrase::first()->term}}:  <b>{{\App\Session::latest()->first()->terms}}</b></small>&nbsp; &nbsp; &nbsp; &nbsp;
                <small>{{\App\Resultphrase::first()->class}}:  <b>{{\App\Course::find(\App\Student::find($id)->class)->title}}</b></small> 
               &nbsp; &nbsp; &nbsp; &nbsp;
               @if(count(\App\Comment::where('student_id',$id)->where('term',\App\Session::latest()->first()->terms)->where('session',\App\Session::latest()->first()->session)->get())>0)
                <small>{{\App\Resultphrase::first()->term_begin}}:  <b>{{\Carbon\Carbon::parse(\App\Comment::where('student_id',$id)->where('term',\App\Session::latest()->first()->terms)->where('session',\App\Session::latest()->first()->session)->first()->termb)->toFormattedDateString()}}</b></small>
                 &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                 @else
                 <small>{{\App\Resultphrase::first()->term_begin}}:&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</small>
                 @endif
                <small>{{\App\Resultphrase::first()->number_class}}:  <b>{{count(\App\Student::where('class',\App\Student::find($id)->class)->get())}}</b></small>

            </p>
          
          
    </div>
    @if(\App\Resultsetting::first()->sattend=='1')
    <h6>
<table class="table table-bordered">
<tbody>
     <tr>
        <td style="text-align: center;font-size:10px;" colspan="4">{{\App\Resultphrase::first()->attend}}</td>
    </tr>
    <tr>
       <td style="text-align: center;font-size:10px;"><small></small></td>
        <td style="text-align: center;font-size:10px;"><small>{{\App\Resultphrase::first()->school}}</small></td>
         <td  style="text-align: center;font-size:10px;"><small>{{\App\Resultphrase::first()->sport}}</small></td>
           <td style="text-align: center;font-size:10px;"><small>{{\App\Resultphrase::first()->other}}</small></td>
    </tr>
    @if(count(\App\Comment::where('student_id',$id)->where('term',\App\Session::latest()->first()->terms)->where('session',\App\Session::latest()->first()->session)->get())>0)
     <tr>
      <td style="text-align: center;font-size:10px;"><small><b>{{\App\Resultphrase::first()->time_open}}</b></small></td>
        <td style="text-align: center;font-size:10px;"><small>{{\App\Comment::where('student_id',$id)->where('term',\App\Session::latest()->first()->terms)->where('session',\App\Session::latest()->first()->session)->first()->school_open}}</small></td> 
        <td style="text-align: center;font-size:10px;"><small>{{\App\Comment::where('student_id',$id)->where('term',\App\Session::latest()->first()->terms)->where('session',\App\Session::latest()->first()->session)->first()->sport_open}}</small></td>
        <td style="text-align: center;font-size:10px;"><small>{{\App\Comment::where('student_id',$id)->where('term',\App\Session::latest()->first()->terms)->where('session',\App\Session::latest()->first()->session)->first()->other_open}}</small></td>
    </tr>
     <tr>
      <td style="text-align: center;font-size:10px;"><small><b>{{\App\Resultphrase::first()->time_present}}</b></small></td>
        <td style="text-align: center;font-size:10px;"><small>{{\App\Comment::where('student_id',$id)->where('term',\App\Session::latest()->first()->terms)->where('session',\App\Session::latest()->first()->session)->first()->school_present}}</small></td> 
        <td style="text-align: center;font-size:10px;"><small>{{\App\Comment::where('student_id',$id)->where('term',\App\Session::latest()->first()->terms)->where('session',\App\Session::latest()->first()->session)->first()->sport_present}}</small></td>
        <td style="text-align: center;font-size:10px;"><small>{{\App\Comment::where('student_id',$id)->where('term',\App\Session::latest()->first()->terms)->where('session',\App\Session::latest()->first()->session)->first()->other_present}}</small></td>
    </tr>
     <tr>
      <td style="text-align: center;font-size:10px;"><small><b>{{\App\Resultphrase::first()->time_punctual}}</b></small></td>
        <td style="text-align: center;font-size:10px;"><small>{{\App\Comment::where('student_id',$id)->where('term',\App\Session::latest()->first()->terms)->where('session',\App\Session::latest()->first()->session)->first()->school_punctual}}</small></td> 
        <td style="text-align: center;font-size:10px;"><small>{{\App\Comment::where('student_id',$id)->where('term',\App\Session::latest()->first()->terms)->where('session',\App\Session::latest()->first()->session)->first()->sport_punctual}}</small></td>
        <td style="text-align: center;font-size:10px;"><small>{{\App\Comment::where('student_id',$id)->where('term',\App\Session::latest()->first()->terms)->where('session',\App\Session::latest()->first()->session)->first()->other_punctual}}</small></td>
    </tr>
     <tr>
      <td style="text-align: center;font-size:10px;"><small><b>{{\App\Resultphrase::first()->time_late}}</b></small></td>
        <td style="text-align: center;font-size:10px;"><small>{{\App\Comment::where('student_id',$id)->where('term',\App\Session::latest()->first()->terms)->where('session',\App\Session::latest()->first()->session)->first()->school_late}}</small></td> 
        <td style="text-align: center;font-size:10px;"><small>{{\App\Comment::where('student_id',$id)->where('term',\App\Session::latest()->first()->terms)->where('session',\App\Session::latest()->first()->session)->first()->sport_late}}</small></td>
        <td style="text-align: center;font-size:10px;"><small>{{\App\Comment::where('student_id',$id)->where('term',\App\Session::latest()->first()->terms)->where('session',\App\Session::latest()->first()->session)->first()->other_late}}</small></td>
    </tr>
     <tr>
      <td style="text-align: center;font-size:10px;"><small><b>{{\App\Resultphrase::first()->time_absent}}</b></small></td>
        <td style="text-align: center;font-size:10px;"><small>{{\App\Comment::where('student_id',$id)->where('term',\App\Session::latest()->first()->terms)->where('session',\App\Session::latest()->first()->session)->first()->school_absent}}</small></td> 
        <td style="text-align: center;font-size:10px;"><small>{{\App\Comment::where('student_id',$id)->where('term',\App\Session::latest()->first()->terms)->where('session',\App\Session::latest()->first()->session)->first()->sport_absent}}</small></td>
        <td style="text-align: center;font-size:10px;"><small>{{\App\Comment::where('student_id',$id)->where('term',\App\Session::latest()->first()->terms)->where('session',\App\Session::latest()->first()->session)->first()->other_absent}}</small></td>
    </tr>
   @else
   <tr>
      <td style="text-align: center;font-size:10px;"><small><b>{{\App\Resultphrase::first()->time_open}}</b></small></td>
        <td style="text-align: center;font-size:10px;"><small></small></td> 
        <td style="text-align: center;font-size:10px;"><small></small></td>
        <td style="text-align: center;font-size:10px;"><small></small></td>
    </tr>
     <tr>
      <td style="text-align: center;font-size:10px;"><small><b>{{\App\Resultphrase::first()->time_present}}</b></small></td>
        <td style="text-align: center;font-size:10px;"><small></small></td> 
        <td style="text-align: center;font-size:10px;"><small></small></td>
        <td style="text-align: center;font-size:10px;"><small></small></td>
    </tr>
     <tr>
      <td style="text-align: center;font-size:10px;"><small><b>{{\App\Resultphrase::first()->time_punctual}}</b></small></td>
        <td style="text-align: center;font-size:10px;"><small></small></td> 
        <td style="text-align: center;font-size:10px;"><small></small></td>
        <td style="text-align: center;font-size:10px;"><small></small></td>
    </tr>
     <tr>
      <td style="text-align: center;font-size:10px;"><small><b>{{\App\Resultphrase::first()->time_late}}</b></small></td>
        <td style="text-align: center;font-size:10px;"><small></small></td> 
        <td style="text-align: center;font-size:10px;"><small></small></td>
        <td style="text-align: center;font-size:10px;"><small></small></td>
    </tr>
     <tr>
      <td style="text-align: center;font-size:10px;"><small>{{\App\Resultphrase::first()->time_absent}}</small></td>
        <td style="text-align: center;font-size:10px;"><small></small></td> 
        <td style="text-align: center;font-size:10px;"><small></small></td>
        <td style="text-align: center;font-size:10px;"><small></small></td>
    </tr>@endif
</tbody>
</table>
</h6>
@endif
                    <div class="row">
<div style="width:60%;"><h6>
<table class="table table-bordered">
<tbody>
<tr style="height:50%;">
<td style="text-align: center;font-size:10px;"><br></td>
<td style="text-align: center;font-size:10px;"><small><b>{{\App\Resultphrase::first()->start_term}} {{\App\Resultphrase::first()->cont_asses}}</b></small></td>
<td style="text-align: center;font-size:10px;"><small><b>{{\App\Resultphrase::first()->mid_term}} {{\App\Resultphrase::first()->cont_asses}}</b></small></td>
<td style="text-align: center;font-size:10px;"><small><b>{{\App\Resultphrase::first()->project}} {{\App\Resultphrase::first()->cont_asses}}</b></small></td>
<td style="text-align: center;font-size:10px;"><small><b>{{\App\Resultphrase::first()->total_score}}</b></small></td>
<td style="text-align: center;font-size:10px;"><small><b>{{\App\Resultphrase::first()->exam}}</b></small></td>
<td style="text-align: center;font-size:10px;"><small><b>{{\App\Resultphrase::first()->total_score}}</b></small></td>
<td style="text-align: center;font-size:10px;"><small><b>{{\App\Resultphrase::first()->class_average}}</b></small></td>
<td style="text-align: center;font-size:10px;"><small><b>{{\App\Resultphrase::first()->grade}}</b></small></td>
<td style="text-align: center;font-size:10px;"><small><b>{{\App\Resultphrase::first()->remark}}</b></small></td>
</tr>
<tr>
<td style="text-align: center;font-size:10px;"><small>{{\App\Resultphrase::first()->max_mark}}</small><br></td>
<td style="text-align: center;font-size:10px;"><small>{{\App\Resultconfig::first()->start_percent}}%</small></td>
<td style="text-align: center;font-size:10px;"><small>{{\App\Resultconfig::first()->test_percent}}%</small></td>
<td style="text-align: center;font-size:10px;"><small>{{\App\Resultconfig::first()->project_percent}}%</small></td>
<td style="text-align: center;font-size:10px;"><small></small></td>
<td style="text-align: center;font-size:10px;"><small>{{\App\Resultconfig::first()->exam_percent}}%</small></td>
<td style="text-align: center;font-size:10px;"><small>100%</small></td>
<td></td>
<td></td>
<td></td>
</tr>
 @foreach(\App\Subjectassign::where('student',$id)->where('class',\App\Student::find($id)->class)->where('term',\App\Session::first()->terms)->where('session',\App\Session::first()->session)->get() as $student)
<tr>
<td style="text-align: center;font-size:10px;"><small><b>{{\App\Subject::find($student->subject)->title}}</b></small></td>
@if(count(\App\Firstgrade::where('student_id',$id)->where('class',\App\Student::find($id)->class)->where('subject',$student->subject)->latest()->get())>0)
<td style="text-align: center;font-size:10px;"><small><b>{{round((\App\Firstgrade::where('student_id',$id)->where('class',\App\Student::find($id)->class)->where('subject',$student->subject)->latest()->first()->score*\App\Resultconfig::first()->test_percent)/\App\Firstgrade::where('student_id',$id)->where('class',\App\Student::find($id)->class)->where('subject',$student->subject)->latest()->first()->over)}}</b></small></td>
@else
<td style="text-align: center;font-size:10px;"><small><b></b></small></td>
@endif
@if(count(\App\Testgrade::where('student_id',$id)->where('class',\App\Student::find($id)->class)->where('subject',$student->subject)->latest()->get())>0)
<td style="text-align: center;font-size:10px;"><small><b>{{round((\App\Testgrade::where('student_id',$id)->where('class',\App\Student::find($id)->class)->where('subject',$student->subject)->latest()->first()->score*\App\Resultconfig::first()->test_percent)/\App\Testgrade::where('student_id',$id)->where('class',\App\Student::find($id)->class)->where('subject',$student->subject)->latest()->first()->over)}}</b></small></td>
@else
<td style="text-align: center;font-size:10px;"><small><b></b></small></td>
@endif
@if(count(\App\Assignmentgrade::where('student_id',$id)->where('class',\App\Student::find($id)->class)->where('subject',$student->subject)->latest()->get())>0)
<td style="text-align: center;font-size:10px;"><small><b>{{round((\App\Assignmentgrade::where('student_id',$id)->where('class',\App\Student::find($id)->class)->where('subject',$student->subject)->latest()->first()->score*\App\Resultconfig::first()->project_percent)/\App\Assignmentgrade::where('student_id',$id)->where('class',\App\Student::find($id)->class)->where('subject',$student->subject)->latest()->first()->over)}}</b></small></td>
@else
<td style="text-align: center;font-size:10px;"><small><b></b></small></td>
@endif
@if(count(\App\Assignmentgrade::where('student_id',$id)->where('class',\App\Student::find($id)->class)->where('subject',$student->subject)->latest()->get())>0||\App\Testgrade::where('student_id',$id)->where('class',\App\Student::find($id)->class)->where('subject',$student->subject)->latest()->get()>0||\App\Firstgrade::where('student_id',$id)->where('class',\App\Student::find($id)->class)->where('subject',$student->subject)->latest()->get()>0)
<td style="text-align: center;font-size:10px;"><small><b>{{round((\App\Assignmentgrade::where('student_id',$id)->where('class',\App\Student::find($id)->class)->where('subject',$student->subject)->latest()->first()->score*\App\Resultconfig::first()->project_percent)/\App\Assignmentgrade::where('student_id',$id)->where('class',\App\Student::find($id)->class)->where('subject',$student->subject)->latest()->first()->over)+round((\App\Testgrade::where('student_id',$id)->where('class',\App\Student::find($id)->class)->where('subject',$student->subject)->latest()->first()->score*\App\Resultconfig::first()->project_percent)/\App\Testgrade::where('student_id',$id)->where('class',\App\Student::find($id)->class)->where('subject',$student->subject)->latest()->first()->over)+round((\App\Firstgrade::where('student_id',$id)->where('class',\App\Student::find($id)->class)->where('subject',$student->subject)->latest()->first()->score*\App\Resultconfig::first()->project_percent)/\App\Firstgrade::where('student_id',$id)->where('class',\App\Student::find($id)->class)->where('subject',$student->subject)->latest()->first()->over)}}</b></small></td>
@else
<td style="text-align: center;font-size:10px;"><small><b></b></small></td>
@endif
@if(count(\App\Examgrade::where('student_id',$id)->where('class',\App\Student::find($id)->class)->where('subject',$student->subject)->latest()->get())>0)
<td style="text-align: center;font-size:10px;"><small><b>{{round((\App\Examgrade::where('student_id',$id)->where('class',\App\Student::find($id)->class)->where('subject',$student->subject)->latest()->first()->score*\App\Resultconfig::first()->exam_percent)/\App\Examgrade::where('student_id',$id)->where('class',\App\Student::find($id)->class)->where('subject',$student->subject)->latest()->first()->over)}}</b></small></td>
@else
<td style="text-align: center;font-size:10px;"><small><b></b></small></td>
@endif
@if(count(\App\Examgrade::where('student_id',$id)->where('class',\App\Student::find($id)->class)->where('subject',$student->subject)->latest()->get())>0&&count(\App\Testgrade::where('student_id',$id)->where('class',\App\Student::find($id)->class)->where('subject',$student->subject)->latest()->get())>0&&count(\App\Testgrade::where('student_id',$id)->where('class',\App\Student::find($id)->class)->where('subject',$student->subject)->latest()->get())>0)
<td style="text-align: center;font-size:10px;" class="total"><small><b>{{round((\App\Firstgrade::where('student_id',$id)->where('class',\App\Student::find($id)->class)->where('subject',$student->subject)->latest()->first()->score*\App\Resultconfig::first()->project_percent)/\App\Firstgrade::where('student_id',$id)->where('class',\App\Student::find($id)->class)->where('subject',$student->subject)->latest()->first()->over+(\App\Assignmentgrade::where('student_id',$id)->where('class',\App\Student::find($id)->class)->where('subject',$student->subject)->latest()->first()->score*\App\Resultconfig::first()->project_percent)/\App\Assignmentgrade::where('student_id',$id)->where('class',\App\Student::find($id)->class)->where('subject',$student->subject)->latest()->first()->over+(\App\Testgrade::where('student_id',$id)->where('class',\App\Student::find($id)->class)->where('subject',$student->subject)->latest()->first()->score*\App\Resultconfig::first()->test_percent)/\App\Testgrade::where('student_id',$id)->where('class',\App\Student::find($id)->class)->where('subject',$student->subject)->latest()->first()->over+(\App\Examgrade::where('student_id',$id)->where('class',\App\Student::find($id)->class)->where('subject',$student->subject)->latest()->first()->score*\App\Resultconfig::first()->exam_percent)/\App\Examgrade::where('student_id',$id)->where('class',\App\Student::find($id)->class)->where('subject',$student->subject)->latest()->first()->over)}}</b></small></td>
@else
<td style="text-align: center;font-size:10px;"><small><b></b></small></td>
@endif
@if(count(\App\Firstgrade::where('class',\App\Student::find($id)->class)->where('subject',$student->subject)->latest()->get())>0&&count(\App\Examgrade::where('class',\App\Student::find($id)->class)->where('subject',$student->subject)->latest()->get())>0&&count(\App\Testgrade::where('class',\App\Student::find($id)->class)->where('subject',$student->subject)->latest()->get())>0&&count(\App\Testgrade::where('class',\App\Student::find($id)->class)->where('subject',$student->subject)->latest()->get())>0)
<td style="text-align: center;font-size:10px;"><small><b>{{round(((\App\Firstgrade::where('class',\App\Student::find($id)->class)->where('term',\App\Session::latest()->first()->terms)->where('subject',$student->subject)->where('session',\App\Session::latest()->first()->session)->sum('score')*\App\Resultconfig::first()->project_percent/\App\Firstgrade::where('class',\App\Student::find($id)->class)->where('subject',$student->subject)->where('term',\App\Session::latest()->first()->terms)->where('session',\App\Session::latest()->first()->session)->sum('over'))+(\App\Assignmentgrade::where('class',\App\Student::find($id)->class)->where('term',\App\Session::latest()->first()->terms)->where('subject',$student->subject)->where('session',\App\Session::latest()->first()->session)->sum('score')*\App\Resultconfig::first()->project_percent/\App\Assignmentgrade::where('class',\App\Student::find($id)->class)->where('subject',$student->subject)->where('term',\App\Session::latest()->first()->terms)->where('session',\App\Session::latest()->first()->session)->sum('over'))+(\App\Testgrade::where('class',\App\Student::find($id)->class)->where('subject',$student->subject)->where('term',\App\Session::latest()->first()->terms)->where('session',\App\Session::latest()->first()->session)->sum('score')*\App\Resultconfig::first()->test_percent/\App\Testgrade::where('class',\App\Student::find($id)->class)->where('term',\App\Session::latest()->first()->terms)->where('subject',$student->subject)->where('session',\App\Session::latest()->first()->session)->sum('over'))+(\App\Examgrade::where('class',\App\Student::find($id)->class)->where('subject',$student->subject)->where('term',\App\Session::latest()->first()->terms)->where('session',\App\Session::latest()->first()->session)->sum('score')*\App\Resultconfig::first()->exam_percent/\App\Examgrade::where('class',\App\Student::find($id)->class)->where('subject',$student->subject)->where('term',\App\Session::latest()->first()->terms)->where('session',\App\Session::latest()->first()->session)->sum('over')))/count(\App\Student::where('class',\App\Student::find($id)->class)->get()))}}</b></small></td>
@else
<td style="text-align: center;font-size:10px;"><small><b></b></small></td>
@endif
@if(count(\App\Firstgrade::where('student_id',$id)->where('class',\App\Student::find($id)->class)->where('subject',$student->subject)->latest()->get())&&count(\App\Examgrade::where('student_id',$id)->where('class',\App\Student::find($id)->class)->where('subject',$student->subject)->latest()->get())>0&&count(\App\Testgrade::where('student_id',$id)->where('class',\App\Student::find($id)->class)->where('subject',$student->subject)->latest()->get())>0&&count(\App\Testgrade::where('student_id',$id)->where('class',\App\Student::find($id)->class)->where('subject',$student->subject)->latest()->get())>0)
@if(round((\App\Firstgrade::where('student_id',$id)->where('class',\App\Student::find($id)->class)->where('subject',$student->subject)->latest()->first()->score*\App\Resultconfig::first()->project_percent)/\App\Firstgrade::where('student_id',$id)->where('class',\App\Student::find($id)->class)->where('subject',$student->subject)->latest()->first()->over+(\App\Assignmentgrade::where('student_id',$id)->where('class',\App\Student::find($id)->class)->where('subject',$student->subject)->latest()->first()->score*\App\Resultconfig::first()->project_percent)/\App\Assignmentgrade::where('student_id',$id)->where('class',\App\Student::find($id)->class)->where('subject',$student->subject)->latest()->first()->over+(\App\Testgrade::where('student_id',$id)->where('class',\App\Student::find($id)->class)->where('subject',$student->subject)->latest()->first()->score*\App\Resultconfig::first()->test_percent)/\App\Testgrade::where('student_id',$id)->where('class',\App\Student::find($id)->class)->where('subject',$student->subject)->latest()->first()->over+(\App\Examgrade::where('student_id',$id)->where('class',\App\Student::find($id)->class)->where('subject',$student->subject)->latest()->first()->score*\App\Resultconfig::first()->exam_percent)/\App\Examgrade::where('student_id',$id)->where('class',\App\Student::find($id)->class)->where('subject',$student->subject)->latest()->first()->over)>=\App\Resultconfig::first()->dis_start)
<td style="text-align: center;font-size:10px;"><small><b>{{\App\Resultconfig::first()->dis_att}}</b></small></td>
<td style="text-align: center;font-size:10px;"><small><b>{{\App\Resultconfig::first()->dis_val}}</b></small></td>
@elseif(round((\App\Firstgrade::where('student_id',$id)->where('class',\App\Student::find($id)->class)->where('subject',$student->subject)->latest()->first()->score*\App\Resultconfig::first()->project_percent)/\App\Firstgrade::where('student_id',$id)->where('class',\App\Student::find($id)->class)->where('subject',$student->subject)->latest()->first()->over+(\App\Assignmentgrade::where('student_id',$id)->where('class',\App\Student::find($id)->class)->where('subject',$student->subject)->latest()->first()->score*\App\Resultconfig::first()->project_percent)/\App\Assignmentgrade::where('student_id',$id)->where('class',\App\Student::find($id)->class)->where('subject',$student->subject)->latest()->first()->over+(\App\Testgrade::where('student_id',$id)->where('class',\App\Student::find($id)->class)->where('subject',$student->subject)->latest()->first()->score*\App\Resultconfig::first()->test_percent)/\App\Testgrade::where('student_id',$id)->where('class',\App\Student::find($id)->class)->where('subject',$student->subject)->latest()->first()->over+(\App\Examgrade::where('student_id',$id)->where('class',\App\Student::find($id)->class)->where('subject',$student->subject)->latest()->first()->score*\App\Resultconfig::first()->exam_percent)/\App\Examgrade::where('student_id',$id)->where('class',\App\Student::find($id)->class)->where('subject',$student->subject)->latest()->first()->over)>=\App\Resultconfig::first()->vg_start&&round((\App\Assignmentgrade::where('student_id',$id)->where('class',\App\Student::find($id)->class)->where('subject',$student->subject)->latest()->first()->score*\App\Resultconfig::first()->project_percent)/\App\Assignmentgrade::where('student_id',$id)->where('class',\App\Student::find($id)->class)->where('subject',$student->subject)->latest()->first()->over+(\App\Testgrade::where('student_id',$id)->where('class',\App\Student::find($id)->class)->where('subject',$student->subject)->latest()->first()->score*\App\Resultconfig::first()->test_percent)/\App\Testgrade::where('student_id',$id)->where('class',\App\Student::find($id)->class)->where('subject',$student->subject)->latest()->first()->over+(\App\Examgrade::where('student_id',$id)->where('class',\App\Student::find($id)->class)->where('subject',$student->subject)->latest()->first()->score*\App\Resultconfig::first()->exam_percent)/\App\Examgrade::where('student_id',$id)->where('class',\App\Student::find($id)->class)->where('subject',$student->subject)->latest()->first()->over)<=\App\Resultconfig::first()->vg_end)
<td style="text-align: center;font-size:10px;"><small><b>{{\App\Resultconfig::first()->vg_att}}</b></small></td>
<td style="text-align: center;font-size:10px;"><small><b>{{\App\Resultconfig::first()->vg_val}}</b></small></td>
@elseif(round((\App\Firstgrade::where('student_id',$id)->where('class',\App\Student::find($id)->class)->where('subject',$student->subject)->latest()->first()->score*\App\Resultconfig::first()->project_percent)/\App\Firstgrade::where('student_id',$id)->where('class',\App\Student::find($id)->class)->where('subject',$student->subject)->latest()->first()->over+(\App\Assignmentgrade::where('student_id',$id)->where('class',\App\Student::find($id)->class)->where('subject',$student->subject)->latest()->first()->score*\App\Resultconfig::first()->project_percent)/\App\Assignmentgrade::where('student_id',$id)->where('class',\App\Student::find($id)->class)->where('subject',$student->subject)->latest()->first()->over+(\App\Testgrade::where('student_id',$id)->where('class',\App\Student::find($id)->class)->where('subject',$student->subject)->latest()->first()->score*\App\Resultconfig::first()->test_percent)/\App\Testgrade::where('student_id',$id)->where('class',\App\Student::find($id)->class)->where('subject',$student->subject)->latest()->first()->over+(\App\Examgrade::where('student_id',$id)->where('class',\App\Student::find($id)->class)->where('subject',$student->subject)->latest()->first()->score*\App\Resultconfig::first()->exam_percent)/\App\Examgrade::where('student_id',$id)->where('class',\App\Student::find($id)->class)->where('subject',$student->subject)->latest()->first()->over)>=\App\Resultconfig::first()->good_start&&round((\App\Assignmentgrade::where('student_id',$id)->where('class',\App\Student::find($id)->class)->where('subject',$student->subject)->latest()->first()->score*\App\Resultconfig::first()->project_percent)/\App\Assignmentgrade::where('student_id',$id)->where('class',\App\Student::find($id)->class)->where('subject',$student->subject)->latest()->first()->over+(\App\Testgrade::where('student_id',$id)->where('class',\App\Student::find($id)->class)->where('subject',$student->subject)->latest()->first()->score*\App\Resultconfig::first()->test_percent)/\App\Testgrade::where('student_id',$id)->where('class',\App\Student::find($id)->class)->where('subject',$student->subject)->latest()->first()->over+(\App\Examgrade::where('student_id',$id)->where('class',\App\Student::find($id)->class)->where('subject',$student->subject)->latest()->first()->score*\App\Resultconfig::first()->exam_percent)/\App\Examgrade::where('student_id',$id)->where('class',\App\Student::find($id)->class)->where('subject',$student->subject)->latest()->first()->over)<=\App\Resultconfig::first()->good_end)
<td style="text-align: center;font-size:10px;"><small><b>{{\App\Resultconfig::first()->good_att}}</b></small></td>
<td style="text-align: center;font-size:10px;"><small><b>{{\App\Resultconfig::first()->good_val}}</b></small></td>
@elseif(round((\App\Firstgrade::where('student_id',$id)->where('class',\App\Student::find($id)->class)->where('subject',$student->subject)->latest()->first()->score*\App\Resultconfig::first()->project_percent)/\App\Firstgrade::where('student_id',$id)->where('class',\App\Student::find($id)->class)->where('subject',$student->subject)->latest()->first()->over+(\App\Assignmentgrade::where('student_id',$id)->where('class',\App\Student::find($id)->class)->where('subject',$student->subject)->latest()->first()->score*\App\Resultconfig::first()->project_percent)/\App\Assignmentgrade::where('student_id',$id)->where('class',\App\Student::find($id)->class)->where('subject',$student->subject)->latest()->first()->over+(\App\Testgrade::where('student_id',$id)->where('class',\App\Student::find($id)->class)->where('subject',$student->subject)->latest()->first()->score*\App\Resultconfig::first()->test_percent)/\App\Testgrade::where('student_id',$id)->where('class',\App\Student::find($id)->class)->where('subject',$student->subject)->latest()->first()->over+(\App\Examgrade::where('student_id',$id)->where('class',\App\Student::find($id)->class)->where('subject',$student->subject)->latest()->first()->score*\App\Resultconfig::first()->exam_percent)/\App\Examgrade::where('student_id',$id)->where('class',\App\Student::find($id)->class)->where('subject',$student->subject)->latest()->first()->over)>=\App\Resultconfig::first()->fg_start&&round((\App\Assignmentgrade::where('student_id',$id)->where('class',\App\Student::find($id)->class)->where('subject',$student->subject)->latest()->first()->score*\App\Resultconfig::first()->project_percent)/\App\Assignmentgrade::where('student_id',$id)->where('class',\App\Student::find($id)->class)->where('subject',$student->subject)->latest()->first()->over+(\App\Testgrade::where('student_id',$id)->where('class',\App\Student::find($id)->class)->where('subject',$student->subject)->latest()->first()->score*\App\Resultconfig::first()->test_percent)/\App\Testgrade::where('student_id',$id)->where('class',\App\Student::find($id)->class)->where('subject',$student->subject)->latest()->first()->over+(\App\Examgrade::where('student_id',$id)->where('class',\App\Student::find($id)->class)->where('subject',$student->subject)->latest()->first()->score*\App\Resultconfig::first()->exam_percent)/\App\Examgrade::where('student_id',$id)->where('class',\App\Student::find($id)->class)->where('subject',$student->subject)->latest()->first()->over)<=\App\Resultconfig::first()->fg_end)
<td style="text-align: center;font-size:10px;"><small><b>{{\App\Resultconfig::first()->fg_att}}</b></small></td>
<td style="text-align: center;font-size:10px;"><small><b>{{\App\Resultconfig::first()->fg_val}}</b></small></td>
@elseif(round((\App\Firstgrade::where('student_id',$id)->where('class',\App\Student::find($id)->class)->where('subject',$student->subject)->latest()->first()->score*\App\Resultconfig::first()->project_percent)/\App\Firstgrade::where('student_id',$id)->where('class',\App\Student::find($id)->class)->where('subject',$student->subject)->latest()->first()->over+(\App\Assignmentgrade::where('student_id',$id)->where('class',\App\Student::find($id)->class)->where('subject',$student->subject)->latest()->first()->score*\App\Resultconfig::first()->project_percent)/\App\Assignmentgrade::where('student_id',$id)->where('class',\App\Student::find($id)->class)->where('subject',$student->subject)->latest()->first()->over+(\App\Testgrade::where('student_id',$id)->where('class',\App\Student::find($id)->class)->where('subject',$student->subject)->latest()->first()->score*\App\Resultconfig::first()->test_percent)/\App\Testgrade::where('student_id',$id)->where('class',\App\Student::find($id)->class)->where('subject',$student->subject)->latest()->first()->over+(\App\Examgrade::where('student_id',$id)->where('class',\App\Student::find($id)->class)->where('subject',$student->subject)->latest()->first()->score*\App\Resultconfig::first()->exam_percent)/\App\Examgrade::where('student_id',$id)->where('class',\App\Student::find($id)->class)->where('subject',$student->subject)->latest()->first()->over)>=\App\Resultconfig::first()->av_start&&round((\App\Assignmentgrade::where('student_id',$id)->where('class',\App\Student::find($id)->class)->where('subject',$student->subject)->latest()->first()->score*\App\Resultconfig::first()->project_percent)/\App\Assignmentgrade::where('student_id',$id)->where('class',\App\Student::find($id)->class)->where('subject',$student->subject)->latest()->first()->over+(\App\Testgrade::where('student_id',$id)->where('class',\App\Student::find($id)->class)->where('subject',$student->subject)->latest()->first()->score*\App\Resultconfig::first()->test_percent)/\App\Testgrade::where('student_id',$id)->where('class',\App\Student::find($id)->class)->where('subject',$student->subject)->latest()->first()->over+(\App\Examgrade::where('student_id',$id)->where('class',\App\Student::find($id)->class)->where('subject',$student->subject)->latest()->first()->score*\App\Resultconfig::first()->exam_percent)/\App\Examgrade::where('student_id',$id)->where('class',\App\Student::find($id)->class)->where('subject',$student->subject)->latest()->first()->over)<=\App\Resultconfig::first()->av_end)
<td style="text-align: center;font-size:10px;"><small><b>{{\App\Resultconfig::first()->av_att}}</b></small></td>
<td style="text-align: center;font-size:10px;"><small><b>{{\App\Resultconfig::first()->av_val}}</b></small></td>
@elseif(round((\App\Firstgrade::where('student_id',$id)->where('class',\App\Student::find($id)->class)->where('subject',$student->subject)->latest()->first()->score*\App\Resultconfig::first()->project_percent)/\App\Firstgrade::where('student_id',$id)->where('class',\App\Student::find($id)->class)->where('subject',$student->subject)->latest()->first()->over+(\App\Assignmentgrade::where('student_id',$id)->where('class',\App\Student::find($id)->class)->where('subject',$student->subject)->latest()->first()->score*\App\Resultconfig::first()->project_percent)/\App\Assignmentgrade::where('student_id',$id)->where('class',\App\Student::find($id)->class)->where('subject',$student->subject)->latest()->first()->over+(\App\Testgrade::where('student_id',$id)->where('class',\App\Student::find($id)->class)->where('subject',$student->subject)->latest()->first()->score*\App\Resultconfig::first()->test_percent)/\App\Testgrade::where('student_id',$id)->where('class',\App\Student::find($id)->class)->where('subject',$student->subject)->latest()->first()->over+(\App\Examgrade::where('student_id',$id)->where('class',\App\Student::find($id)->class)->where('subject',$student->subject)->latest()->first()->score*\App\Resultconfig::first()->exam_percent)/\App\Examgrade::where('student_id',$id)->where('class',\App\Student::find($id)->class)->where('subject',$student->subject)->latest()->first()->over)>=\App\Resultconfig::first()->weak_start&&round((\App\Assignmentgrade::where('student_id',$id)->where('class',\App\Student::find($id)->class)->where('subject',$student->subject)->latest()->first()->score*\App\Resultconfig::first()->project_percent)/\App\Assignmentgrade::where('student_id',$id)->where('class',\App\Student::find($id)->class)->where('subject',$student->subject)->latest()->first()->over+(\App\Testgrade::where('student_id',$id)->where('class',\App\Student::find($id)->class)->where('subject',$student->subject)->latest()->first()->score*\App\Resultconfig::first()->test_percent)/\App\Testgrade::where('student_id',$id)->where('class',\App\Student::find($id)->class)->where('subject',$student->subject)->latest()->first()->over+(\App\Examgrade::where('student_id',$id)->where('class',\App\Student::find($id)->class)->where('subject',$student->subject)->latest()->first()->score*\App\Resultconfig::first()->exam_percent)/\App\Examgrade::where('student_id',$id)->where('class',\App\Student::find($id)->class)->where('subject',$student->subject)->latest()->first()->over)<=\App\Resultconfig::first()->weak_end)
<td style="text-align: center;font-size:10px;"><small><b>{{\App\Resultconfig::first()->weak_att}}</b></small></td>
<td style="text-align: center;font-size:10px;"><small><b>{{\App\Resultconfig::first()->weak_val}}</b></small></td>
@elseif(round((\App\Firstgrade::where('student_id',$id)->where('class',\App\Student::find($id)->class)->where('subject',$student->subject)->latest()->first()->score*\App\Resultconfig::first()->project_percent)/\App\Firstgrade::where('student_id',$id)->where('class',\App\Student::find($id)->class)->where('subject',$student->subject)->latest()->first()->over+(\App\Assignmentgrade::where('student_id',$id)->where('class',\App\Student::find($id)->class)->where('subject',$student->subject)->latest()->first()->score*\App\Resultconfig::first()->project_percent)/\App\Assignmentgrade::where('student_id',$id)->where('class',\App\Student::find($id)->class)->where('subject',$student->subject)->latest()->first()->over+(\App\Testgrade::where('student_id',$id)->where('class',\App\Student::find($id)->class)->where('subject',$student->subject)->latest()->first()->score*\App\Resultconfig::first()->test_percent)/\App\Testgrade::where('student_id',$id)->where('class',\App\Student::find($id)->class)->where('subject',$student->subject)->latest()->first()->over+(\App\Examgrade::where('student_id',$id)->where('class',\App\Student::find($id)->class)->where('subject',$student->subject)->latest()->first()->score*\App\Resultconfig::first()->exam_percent)/\App\Examgrade::where('student_id',$id)->where('class',\App\Student::find($id)->class)->where('subject',$student->subject)->latest()->first()->over)<=\App\Resultconfig::first()->vw_end)
<td style="text-align: center;font-size:10px;"><small><b>{{\App\Resultconfig::first()->vw_att}}</b></small></td>
<td style="text-align: center;font-size:10px;"><small><b>{{\App\Resultconfig::first()->vw_val}}</b></small></td>
@else
<td style="text-align: center;font-size:10px;"><small><b></b></small></td>
<td style="text-align: center;font-size:10px;"><small><b></b></small></td>
@endif
@else
<td style="text-align: center;font-size:10px;"><small><b></b></small></td>
<td style="text-align: center;font-size:10px;"><small><b></b></small></td>
@endif
</tr>
@endforeach
</tbody>
</table>
</h6>
<div class="row">
    <div style="width:4%;"></div>
<div style="width:30%;">
    <table class="table table-bordered">
<tbody>
    <tr>
        <td>{{\App\Resultphrase::first()->total_score}}</td>
        <td>{{\App\Resultphrase::first()->average_score}}</td>
        <td>{{\App\Resultphrase::first()->grade}}</td>
        <td>{{\App\Resultphrase::first()->promotion}}</td>
        <td>{{\App\Resultphrase::first()->position}}</td>
    </tr>
    <tr>
        <td> <b class="total_show"></b></td>
        <td> <b class="average_show"></b></td>
        <td> <b class="grade_show"></b></td>
        <td> <b>
    @if(count(\App\Comment::where('student_id',$id)->where('term',\App\Session::latest()->first()->terms)->where('session',\App\Session::latest()->first()->session)->get())>0)
        @if(\App\Comment::where('student_id',$id)->where('term',\App\Session::latest()->first()->terms)->where('session',\App\Session::latest()->first()->session)->first()->promotion!=''&&\App\Comment::where('student_id',$id)->where('term',\App\Session::latest()->first()->terms)->where('session',\App\Session::latest()->first()->session)->first()->promotion!='nill'&&\App\Comment::where('student_id',$id)->where('term',\App\Session::latest()->first()->terms)->where('session',\App\Session::latest()->first()->session)->first()->promotion!='0') 
    {{\App\Course::find(\App\Comment::where('student_id',$id)->where('term',\App\Session::latest()->first()->terms)->where('session',\App\Session::latest()->first()->session)->first()->promotion)->title}}
    @else
    @endif
    @endif
        </b></td>
        <td><b>
    @if(\App\Resultsetting::first()->position=='1')

    @endif
        </b></td>
    </tr>
</tbody>
</table>

</div>
<div style="width:25%;"></div>
<div style="width:40%;">
    <div class="row">
 
</div>
</div>
</div>
 @if(count(\App\Comment::where('term',\App\Session::latest()->first()->terms)->where('session',\App\Session::latest()->first()->session)->where('student_id',$id)->get())>0)
<small>{{\App\Resultphrase::first()->class_fac}}:  <b>{{\App\Comment::where('term',\App\Session::latest()->first()->terms)->where('session',\App\Session::latest()->first()->session)->where('student_id',$id)->latest()->first()->fcomment}}</b></small><br>
<small>{{\App\Resultphrase::first()->signature}}:.....................</small><br>
 <small>{{\App\Resultphrase::first()->date}}: <b>{{\Carbon\Carbon::parse(\App\Comment::where('term',\App\Session::latest()->first()->terms)->where('session',\App\Session::latest()->first()->session)->where('student_id',$id)->latest()->first()->fdate)->toFormattedDateString()}}</b></small><br>
 @else
 <small>{{\App\Resultphrase::first()->class_fac}}:.......................</small>
 <small>.....................................................,</small><br>
 <small>{{\App\Resultphrase::first()->signature}}:.....................</small><br>
 <small>{{\App\Resultphrase::first()->date}}:.....................</small><br>
 @endif
 <hr>
@if(count(\App\Comment::where('term',\App\Session::latest()->first()->terms)->where('session',\App\Session::latest()->first()->session)->where('student_id',$id)->get())>0)
<small>{{\App\Resultphrase::first()->head_rem}}:  <b>{{\App\Comment::where('term',\App\Session::latest()->first()->terms)->where('session',\App\Session::latest()->first()->session)->where('student_id',$id)->latest()->first()->hcomment}}</b></small><br>
<small>{{\App\Resultphrase::first()->signature}}:.....................</small><br>
 <small>{{\App\Resultphrase::first()->date}}: <b>{{\Carbon\Carbon::parse(\App\Comment::where('term',\App\Session::latest()->first()->terms)->where('session',\App\Session::latest()->first()->session)->where('student_id',$id)->latest()->first()->hdate)->toFormattedDateString()}}</b></small><br>
 @else
 <small>{{\App\Resultphrase::first()->head_rem}}:.......................</small>
 <small>.....................................................,</small><br>
 <small>{{\App\Resultphrase::first()->signature}}:.....................</small><br>
 <small>{{\App\Resultphrase::first()->date}}:.....................</small><br>
 @endif
</div>
<div style="width:9%;"></div>
<div style="width:30%;">
    
 <div class="row">
@if(\App\Resultsetting::first()->personal=='1')
        <h6>
<table class="table table-bordered">
<tbody>
     <tr>
<td colspan="6" style="text-align: center;font-size:10px;"><small>{{\App\Resultphrase::first()->personality}}</small></td>
    </tr>
    <tr>
        <td style="text-align: center;font-size:10px;"><small>{{\App\Resultphrase::first()->rate}}</small></td>
        <td style="text-align: center;font-size:10px;"><small>5</small></td>
        <td style="text-align: center;font-size:10px;"><small>4</small></td>
        <td style="text-align: center;font-size:10px;"><small>3</small></td>
        <td style="text-align: center;font-size:10px;"><small>2</small></td>
        <td style="text-align: center;font-size:10px;"><small>1</small></td>
    </tr>
@if(count(\App\Personality::where('student_id',$id)->where('term',\App\Session::latest()->first()->terms)->where('session',\App\Session::latest()->first()->session)->get())>0)
@foreach(\App\Behavioural::where('class_id',\App\Student::find($id)->class)->get() as $behave)
    <tr>
        <td style="text-align: center;font-size:10px;"><small>{{$behave->name}}</small></td>
@if(json_decode(\App\Personality::where('student_id',$id)->where('term',\App\Session::latest()->first()->terms)->where('session',\App\Session::latest()->first()->session)->first()->data)[$loop->iteration-1]->behave=='5')
    <td style="text-align: center;font-size:10px;"><small><i class="fa fa-check">O</i></small></td>
     <td style="text-align: center;font-size:10px;"><small></small></td>
     <td style="text-align: center;font-size:10px;"><small></small></td>
     <td style="text-align: center;font-size:10px;"><small></small></td>
    <td style="text-align: center;font-size:10px;"><small></small></td>
@elseif(json_decode(\App\Personality::where('student_id',$id)->where('term',\App\Session::latest()->first()->terms)->where('session',\App\Session::latest()->first()->session)->first()->data)[$loop->iteration-1]->behave=='4')
     <td style="text-align: center;font-size:10px;"><small></small></td>
     <td style="text-align: center;font-size:10px;"><small><i class="fa fa-check">O</i></small></td>
     <td style="text-align: center;font-size:10px;"><small></small></td>
     <td style="text-align: center;font-size:10px;"><small></small></td>
    <td style="text-align: center;font-size:10px;"><small></small></td>
@elseif(json_decode(\App\Personality::where('student_id',$id)->where('term',\App\Session::latest()->first()->terms)->where('session',\App\Session::latest()->first()->session)->first()->data)[$loop->iteration-1]->behave=='3')
    <td style="text-align: center;font-size:10px;"><small></small></td>
    <td style="text-align: center;font-size:10px;"><small></small></td>
    <td style="text-align: center;font-size:10px;"><small><i class="fa fa-check">O</i></small></td>
    <td style="text-align: center;font-size:10px;"><small></small></td>
    <td style="text-align: center;font-size:10px;"><small></small></td>
@elseif(json_decode(\App\Personality::where('student_id',$id)->where('term',\App\Session::latest()->first()->terms)->where('session',\App\Session::latest()->first()->session)->first()->data)[$loop->iteration-1]->behave=='2')   
 <td style="text-align: center;font-size:10px;"><small></small></td>
     <td style="text-align: center;font-size:10px;"><small></small></td>
     <td style="text-align: center;font-size:10px;"><small></small></td>
    <td style="text-align: center;font-size:10px;"><small><i class="fa fa-check">O</i></small></td>
    <td style="text-align: center;font-size:10px;"><small></small></td>
@elseif(json_decode(\App\Personality::where('student_id',$id)->where('term',\App\Session::latest()->first()->terms)->where('session',\App\Session::latest()->first()->session)->first()->data)[$loop->iteration-1]->behave=='1')
 <td style="text-align: center;font-size:10px;"><small></small></td>
     <td style="text-align: center;font-size:10px;"><small></small></td>
     <td style="text-align: center;font-size:10px;"><small></small></td>
     <td style="text-align: center;font-size:10px;"><small></small></td>
    <td style="text-align: center;font-size:10px;"><small><i class="fa fa-check">O</i></small></td>
@endif
    </tr>
   @endforeach
@else
@foreach(\App\Behavioural::where('class_id',\App\Student::find($id)->class)->get() as $behave)
<td style="text-align: center;font-size:10px;"><small>{{$behave->name}}</small></td>
<td style="text-align: center;font-size:10px;"><small></small></td>
<td style="text-align: center;font-size:10px;"><small></small></td>
<td style="text-align: center;font-size:10px;"><small></small></td>
<td style="text-align: center;font-size:10px;"><small></small></td>
<td style="text-align: center;font-size:10px;"><small></small></td>
@endforeach
@endif
</tbody>
</table>
</h6>
<h6>
<table class="table table-bordered">
<tbody>
     <tr>
        <td style="text-align: center;font-size:10px;" colspan="4">{{\App\Resultphrase::first()->key_rating}}</td>
    </tr>
    <tr>
        <td style="text-align: center;font-size:10px;"><small>5-{{\App\Resultphrase::first()->excellent}}</small></td>
         <td  style="text-align: center;font-size:10px;"><small>4-{{\App\Resultphrase::first()->high_degree}}</small></td>
           <td style="text-align: center;font-size:10px;" colspan="1"><small>3-{{\App\Resultphrase::first()->accept_level}}</small></td>
    </tr>
     <tr>
      <td style="text-align: center;font-size:10px;"><small>2-{{\App\Resultphrase::first()->poor_level}}</small></td>
        <td style="text-align: center;font-size:10px;" colspan="1"><small>1-{{\App\Resultphrase::first()->indifferent}}</small></td> 
        <td style="text-align: center;font-size:10px;"></td> 
    </tr>
   
</tbody>
</table>
</h6>
@endif
<h6>
    @if(\App\Resultsetting::first()->physical=='1')
<table class="table table-bordered">
<tbody>
     <tr>
<td style="text-align: center;font-size:10px;" colspan="4"><small>{{\App\Resultphrase::first()->physical_dev}}</small></td>
    </tr>
    <tr>
<td style="text-align: center;font-size:10px;" colspan="2"><small>{{\App\Resultphrase::first()->height}} (Ft)</small></td>
<td style="text-align: center;font-size:10px;" colspan="2"><small>{{\App\Resultphrase::first()->weight}} (Kg)</small></td>
    </tr>
    <tr>
<td style="text-align: center;font-size:10px;"><small>{{\App\Resultphrase::first()->beg_term}}</small></td>
<td style="text-align: center;font-size:10px;"><small>{{\App\Resultphrase::first()->end_term}}</small></td>
<td style="text-align: center;font-size:10px;"><small>{{\App\Resultphrase::first()->beg_term}}</small></td>
<td style="text-align: center;font-size:10px;"><small>{{\App\Resultphrase::first()->end_term}}</small></td>
    </tr>
@if(count(\App\Physical::where('student_id',$id)->where('term',\App\Session::latest()->first()->terms)->where('session',\App\Session::latest()->first()->session)->get())>0)
    <tr>
<td style="text-align: center;font-size:10px;">{{\App\Physical::where('student_id',$id)->where('term',\App\Session::latest()->first()->terms)->where('session',\App\Session::latest()->first()->session)->first()->heightb}}</td>
<td style="text-align: center;font-size:10px;">{{\App\Physical::where('student_id',$id)->where('term',\App\Session::latest()->first()->terms)->where('session',\App\Session::latest()->first()->session)->first()->heighte}}</td>
<td style="text-align: center;font-size:10px;">{{\App\Physical::where('student_id',$id)->where('term',\App\Session::latest()->first()->terms)->where('session',\App\Session::latest()->first()->session)->first()->weightb}}</td>
<td style="text-align: center;font-size:10px;">{{\App\Physical::where('student_id',$id)->where('term',\App\Session::latest()->first()->terms)->where('session',\App\Session::latest()->first()->session)->first()->weighte}}</td>
    </tr>
    <tr>
<td style="text-align: center;font-size:10px;">{{\App\Resultphrase::first()->fac_rem}}</td>
<td colspan="3" style="text-align: center;font-size:10px;">{{\App\Physical::where('student_id',$id)->where('term',\App\Session::latest()->first()->terms)->where('session',\App\Session::latest()->first()->session)->first()->facilitator}}</td>
    </tr>
    @else
     <tr>
<td style="text-align: center;font-size:10px;"></td>
<td style="text-align: center;font-size:10px;"></td>
<td style="text-align: center;font-size:10px;"></td>
<td style="text-align: center;font-size:10px;"></td>
    </tr>
    <tr>
<td style="text-align: center;font-size:10px;">{{\App\Resultphrase::first()->fac_rem}}</td>
<td colspan="3" style="text-align: center;font-size:10px;"></td>
    </tr>
   @endif 
</tbody>
</table>
@endif
<div class="row">
  <div style="width:10%;"></div>
<div style="width:60%;">

</div> 
</div>
</h6>
</div>
<div class="row">
       
</div>
</div>
</div>
<div class="row">
 
</div> 
<br>  
<div class="row">


</div>
<p><br></p>
</div>

</div>  
</div>
</div>
<!--End of Result Sheet -->  
                                        </div>
                                        <div class="row">
<div class="col-md-4">
<textarea name="body" style="display: none;" id="descr" class="form-control"></textarea>
</div>
<div class="col-md-4">
   <input type="submit" class="btn btn-sm btn-primary btn-block" value="@lang('admin.generate') @lang('admin.result')"> 
</div>
</div>
</form>
<script type="text/javascript">
             $(document).ready(function() {
     var sum=0;
    $(".total").each(function(){
     var value=$(this).text();
     if(!isNaN(value)&&value.length !=0){
        sum+=parseFloat(value);
     }   
    });
    $(".total_show").text(sum);
     var average=sum/{{count(\App\Subjectassign::where('student',$id)->where('class',\App\Student::find($id)->class)->where('term',\App\Session::first()->terms)->where('session',\App\Session::first()->session)->get())}};
    $(".average_show").text(Math.round(average));
if(average>={{\App\Resultconfig::first()->dis_end}}){
    $(".grade_show").text('{{\App\Resultconfig::first()->dis_att}} {{\App\Resultconfig::first()->dis_val}}'); 
}
if(average<={{\App\Resultconfig::first()->vg_end}}&&average>={{\App\Resultconfig::first()->vg_start}}){
    $(".grade_show").text('{{\App\Resultconfig::first()->vg_att}} {{\App\Resultconfig::first()->vg_val}}'); 
}
if(average<={{\App\Resultconfig::first()->good_end}}&&average>={{\App\Resultconfig::first()->good_start}}){
    $(".grade_show").text('{{\App\Resultconfig::first()->good_att}} {{\App\Resultconfig::first()->good_val}}'); 
}
if(average<={{\App\Resultconfig::first()->fg_end}}&&average>={{\App\Resultconfig::first()->fg_start}}){
    $(".grade_show").text('{{\App\Resultconfig::first()->fg_att}} {{\App\Resultconfig::first()->fg_val}}'); 
}
if(average<={{\App\Resultconfig::first()->av_end}}&&average>={{\App\Resultconfig::first()->av_start}}){
    $(".grade_show").text('{{\App\Resultconfig::first()->av_att}} {{\App\Resultconfig::first()->av_val}}'); 
}
if(average<={{\App\Resultconfig::first()->weak_end}}&&average>={{\App\Resultconfig::first()->weak_end}}){
    $(".grade_show").text('{{\App\Resultconfig::first()->weak_att}} {{\App\Resultconfig::first()->weak_val}}'); 
}
if(average<{{\App\Resultconfig::first()->vw_end}}){
    $(".grade_show").text('{{\App\Resultconfig::first()->vw_att}} {{\App\Resultconfig::first()->vw_val}}'); 
}
$('.inline-editor').summernote({
            airMode: true
        });
function show(){
    $("#descr").val($(".inline-editor").html());
  }
  setInterval(function(){
show()
}, 500);
             });

           </script> 