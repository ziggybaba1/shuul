@extends('layouts.admin')
@section('content')
 <div class="row page-titles">
     <div class="col-md-6 col-6 align-self-center">
                        <h3 class="text-themecolor">{{\App\Student::find($id)->gname}} {{\App\Student::find($id)->fname}} @lang('admin.detail')</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{url('')}}/admin/page.fmp?page=1">@lang('admin.home')</a></li>
                            <li class="breadcrumb-item"><a href="{{url('')}}/admin/page.fmp?page=13">@lang('admin.detail') Student</a></li>
                            <li class="breadcrumb-item active">{{\App\Student::find($id)->gname}} {{\App\Student::find($id)->fname}}</li>
                        </ol>
                    </div>
                   <div class="col-md-6 col-4 align-self-center">
                        <div class="d-flex m-t-10 justify-content-end">
                              <h5 class="text-themecolor">@lang('admin.current-sess'): {{\App\Session::latest()->first()->session}} </h5><br>
                            <h5 class="text-themecolor"> (
                                @if(\App\Session::latest()->first()->terms==='First')
                                @lang('admin.first_term')
                                @elseif(\App\Session::latest()->first()->terms==='Second')
                                @lang('admin.second_term')
                                 @elseif(\App\Session::latest()->first()->terms==='Third')
                                @lang('admin.third_term')
                                 @elseif(\App\Session::latest()->first()->terms==='Fourth')
                                @lang('admin.fourth_term')
                             @endif
                             )
                         </h5>
                        </div>
                    </div>
    </div>
<div class="row">
                    <!-- Column -->
                    <!-- Column -->
                    <div class="col-lg-12 col-xlg-12 col-md-12">
                         @if (session('message'))
                 <div class="alert alert-info alert-rounded">{{ session('message') }}</div>
                    @endif
                        <div class="card">
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs profile-tab" role="tablist">
                                <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#profile" role="tab">@lang('admin.add') @lang('admin.perform')</a> </li>
                                <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#settings" role="tab">@lang('admin.result') @lang('admin.history') </a></li>
                                 <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#invoice" role="tab">@lang('admin.invoice')/@lang('admin.payment')</a></li>
                            </ul>
                            <!-- Tab panes -->
                            <div class="tab-content">
                                <!--second tab-->
                                <div class="tab-pane active" id="profile" role="tabpanel">

                                    
                                      <div class="row">
                    <div class="col-md-12">
                         <div class="card">
                        <div class="card-body">
                          <div id="showresults"></div> 
                                <h4 class="card-title">{{\App\Student::find($id)->user_id}} {{\App\Student::find($id)->gname}} {{\App\Student::find($id)->fname}}</h4>
                                <h6 class="card-subtitle">{{\App\Session::first()->session}} {{\App\Session::first()->term}} @lang('admin.result') @lang('admin.prepare') <a href="{{url('')}}/admin/page.fmp?page=13">@lang('admin.back_student')</a></h6>
                                  <p>
             <ul class="nav nav-pills m-t-30 m-b-30">
                                    <li class=" nav-item"> <a href="#personality" class="nav-link active" data-toggle="tab" aria-expanded="false">@lang('admin.behave_person')</a> </li>
                                    <li class="nav-item"> <a href="#physical" class="nav-link" data-toggle="tab" aria-expanded="false">@lang('admin.physic_dev')</a> </li>
                                    <li class="nav-item"> <a href="#grade" class="nav-link" data-toggle="tab" aria-expanded="true">@lang('admin.grade')</a> </li>
                                     <li class="nav-item"> <a href="#comment" class="nav-link" data-toggle="tab" aria-expanded="false">@lang('admin.comment')/@lang('admin.status')</a> </li>
                                    <li class="nav-item"> <a href="#gresult" class="nav-link" data-toggle="tab" aria-expanded="true">Generate Result</a> </li>
                                        </p>
         <div class="tab-content br-n pn">
                    <div class="tab-pane active" id="personality">
                        <hr>
                        <h4 class="card-title">{{\App\Resultphrase::first()->personality}}</h4>
                        <hr>
 <div id="showresultshere"> 
        <form class="formsubmit" method="post" action="{{url('')}}/admin/behave/create/{{$id}}">
              {{ csrf_field() }}
                                        <div class="row">
@if(count(\App\Personality::where('student_id',$id)->where('term',\App\Session::latest()->first()->terms)->where('session',\App\Session::latest()->first()->session)->get())>0)
@foreach(\App\Behavioural::where('class_id',\App\Student::find($id)->class)->get() as $behave)
                                            <div class="col-md-6">
                                                <div class="form-group">
                     <label for="firstName1">{{$behave->name}} :</label>
                                <select class="form-control" required id="behave{{$loop->iteration}}" name="behave{{$loop->iteration}}">
@if(json_decode(\App\Personality::where('student_id',$id)->where('term',\App\Session::latest()->first()->terms)->where('session',\App\Session::latest()->first()->session)->first()->data)[$loop->iteration-1]->behave=='5')
<option value="5">Excellent</option>
@elseif(json_decode(\App\Personality::where('student_id',$id)->where('term',\App\Session::latest()->first()->terms)->where('session',\App\Session::latest()->first()->session)->first()->data)[$loop->iteration-1]->behave=='4')
<option value="4">High Degree</option>
@elseif(json_decode(\App\Personality::where('student_id',$id)->where('term',\App\Session::latest()->first()->terms)->where('session',\App\Session::latest()->first()->session)->first()->data)[$loop->iteration-1]->behave=='3')
<option value="3">Acceptance Level</option>
@elseif(json_decode(\App\Personality::where('student_id',$id)->where('term',\App\Session::latest()->first()->terms)->where('session',\App\Session::latest()->first()->session)->first()->data)[$loop->iteration-1]->behave=='2')
<option value="2">Poor Level</option>
@elseif(json_decode(\App\Personality::where('student_id',$id)->where('term',\App\Session::latest()->first()->terms)->where('session',\App\Session::latest()->first()->session)->first()->data)[$loop->iteration-1]->behave=='1')
<option value="1">Insufficient</option>
@endif
               <option value="5">{{\App\Resultphrase::first()->excellent}}</option>
                <option  value="4">{{\App\Resultphrase::first()->high_degree}}</option>
            <option value="3">{{\App\Resultphrase::first()->accept_level}}</option>
                <option value="2">{{\App\Resultphrase::first()->poor_level}}</option>
        <option value="1">{{\App\Resultphrase::first()->indifferent}}</option>
                                </select>
                                            </div>
                                        </div>
                                            @endforeach
@else
@foreach(\App\Behavioural::where('class_id',\App\Student::find($id)->class)->get() as $behave)
                                            <div class="col-md-6">
                                                <div class="form-group">
                     <label for="firstName1">{{$behave->name}} :</label>
                                <select class="form-control" required id="behave{{$loop->iteration}}" name="behave{{$loop->iteration}}">
                                    <option value="">Select one</option>
              <option value="5">{{\App\Resultphrase::first()->excellent}}</option>
                <option  value="4">{{\App\Resultphrase::first()->high_degree}}</option>
            <option value="3">{{\App\Resultphrase::first()->accept_level}}</option>
                <option value="2">{{\App\Resultphrase::first()->poor_level}}</option>
        <option value="1">{{\App\Resultphrase::first()->indifferent}}</option>
                                </select>
                                            </div>
                                        </div>
                                            @endforeach
@endif
                                        </div>
                                <div class="row">
                                      <div class="col-md-6">
                                      </div>
                                     <div class="col-md-6">
                                                <div class="form-group">
                    <input type="submit" value="Add Ratings" class="btn btn-bg btn-primary btn-block" name="">
                                                </div>
                                </div>
                            </div>
            </form>
        </div>
                                    </div>
                                   <div class="tab-pane" id="physical">
                                     <hr>
                        <h4 class="card-title">{{\App\Resultphrase::first()->physical_dev}}</h4>
                        <hr>
<div id="showresultsd">
    <form class="formsubmitted" method="post" action="{{url('')}}/admin/physical/create/{{$id}}">
              {{ csrf_field() }}
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="heightb">{{\App\Resultphrase::first()->height}} ({{\App\Resultphrase::first()->beg_term}})Ft :</label>
@if(count(\App\Physical::where('student_id',$id)->where('term',\App\Session::latest()->first()->terms)->where('session',\App\Session::latest()->first()->session)->get())>0)
<input type="number" class="form-control" value="{{\App\Physical::where('student_id',$id)->where('term',\App\Session::latest()->first()->terms)->where('session',\App\Session::latest()->first()->session)->first()->heightb}}" name="heightb" id="heightb">
@else
<input type="number" class="form-control" name="heightb" id="heightb">
@endif
                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="heighte">{{\App\Resultphrase::first()->height}} ({{\App\Resultphrase::first()->end_term}})Ft :</label>
@if(count(\App\Physical::where('student_id',$id)->where('term',\App\Session::latest()->first()->terms)->where('session',\App\Session::latest()->first()->session)->get())>0)
<input type="number" class="form-control" value="{{\App\Physical::where('student_id',$id)->where('term',\App\Session::latest()->first()->terms)->where('session',\App\Session::latest()->first()->session)->first()->heighte}}" name="heighte" id="heighte">
@else
<input type="number" class="form-control" name="heighte" id="heighte">
@endif
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="weightb">{{\App\Resultphrase::first()->weight}} ({{\App\Resultphrase::first()->beg_term}})Kg :</label>
@if(count(\App\Physical::where('student_id',$id)->where('term',\App\Session::latest()->first()->terms)->where('session',\App\Session::latest()->first()->session)->get())>0)
<input type="number" class="form-control" value="{{\App\Physical::where('student_id',$id)->where('term',\App\Session::latest()->first()->terms)->where('session',\App\Session::latest()->first()->session)->first()->weightb}}" name="weightb" id="weightb">
@else
<input type="number" class="form-control" name="weightb" id="weightb">
@endif
                                            </div>
                                        </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                   <label for="weightb">{{\App\Resultphrase::first()->weight}} ({{\App\Resultphrase::first()->end_term}})Kg :</label>
@if(count(\App\Physical::where('student_id',$id)->where('term',\App\Session::latest()->first()->terms)->where('session',\App\Session::latest()->first()->session)->get())>0)
<input type="number" class="form-control" value="{{\App\Physical::where('student_id',$id)->where('term',\App\Session::latest()->first()->terms)->where('session',\App\Session::latest()->first()->session)->first()->weighte}}" name="weighte" id="weighte">
@else
<input type="number" class="form-control" name="weighte" id="weighte">
@endif
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-12">
                                            <div class="form-group">
                                                    <label for="facilitator">{{\App\Resultphrase::first()->fac_rem}}:</label>
@if(count(\App\Physical::where('student_id',$id)->where('term',\App\Session::latest()->first()->terms)->where('session',\App\Session::latest()->first()->session)->get())>0)
<textarea class="form-control" name="facilitator" id="facilitator">{{\App\Physical::where('student_id',$id)->where('term',\App\Session::latest()->first()->terms)->where('session',\App\Session::latest()->first()->session)->first()->facilitator}}</textarea>
@else
<textarea class="form-control" name="facilitator" id="facilitator"></textarea>
@endif
                                                </div>
                                            </div>
                                        </div>
                                         <div class="row">
                                      <div class="col-md-6">
                                      </div>
                                     <div class="col-md-6">
                                                <div class="form-group">
                    <input type="submit" value="Add Physical Development" class="btn btn-bg btn-primary btn-block" name="">
                                                </div>
                                </div>
                            </div>
                                    </form>
</div>
                                  </div>
                                    <!-- Step 3 -->
                                   
                                  <div class="tab-pane" id="grade">
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
                <option value="{{\App\Session::first()->terms}}">{{\App\Session::first()->terms}} Term</option>
                    <option value="First">First Term</option>
                    <option value="Second">Second Term</option>
                    <option value="Third">Third Term</option>
                     <option value="Fourth">Fourth Term</option>
                    </select>
                          </div> 
                    </div>
                                    <span id="medicine">
    @foreach(\App\Subjectassign::where('student',$id)->where('class',\App\Student::find($id)->class)->where('term',\App\Session::first()->terms)->where('session',\App\Session::first()->session)->get() as $student)
      <div class="form-group">
                      
                          <div class="input-group">
                  <select class="form-control col-md-12 col-xs-12" name="subject[]">
        <option value="{{$student->subject}}">{{\App\Subject::find($student->subject)->title}}</option>
                    </select>
        @if($student->sign==\Auth::user()->id||\Auth::user()->role=='admin')
                <input type="number" style="border-color: blue;" value="{{$student->test_grade}}" placeholder="Test Grade Score" class="form-control col-md-12 col-xs-12" name="test_grade[]">
                <input type="number" style="border-color: red;" value="{{$student->test_over}}" placeholder="Test Grade Total" class="form-control col-md-12 col-xs-12" name="test_over[]">
                <input type="number" style="border-color: blue;" value="{{$student->project_grade}}" placeholder="Project Grade Score" class="form-control col-md-12 col-xs-12" name="project_grade[]">
                 <input type="number" style="border-color: red;" value="{{$student->project_over}}" placeholder="Project Grade Total" class="form-control col-md-12 col-xs-12" name="project_over[]">
                <input type="number" style="border-color: blue;" value="{{$student->exam_grade}}" placeholder="Exam Grade" class="form-control col-md-12 col-xs-12" name="exam_grade[]">
                <input type="number" style="border-color: red;" value="{{$student->exam_over}}" placeholder="Exam Grade Total" class="form-control col-md-12 col-xs-12" name="exam_over[]">
                            <span class="input-group-btn">
              <button onclick="deletemedicineParentElement(this)"  type="button" class="btn btn-danger"><i class="fa fa-trash"></i></button>
                                          </span>
        @elseif($student->sign!=\Auth::user()->id)
        <input type="number" style="border-color: blue;" value="{{$student->test_grade}}" placeholder="Test Grade Score" class="form-control col-md-12 col-xs-12 readonly" name="test_grade[]">
                <input type="number" style="border-color: red;" value="{{$student->test_over}}" placeholder="Test Grade Total" class="form-control col-md-12 col-xs-12 readonly" name="test_over[]">
                <input type="number" style="border-color: blue;" value="{{$student->project_grade}}" placeholder="Project Grade Score" class="form-control col-md-12 col-xs-12 readonly" name="project_grade[]">
                 <input type="number" style="border-color: red;" value="{{$student->project_over}}" placeholder="Project Grade Total" class="form-control col-md-12 col-xs-12 readonly" name="project_over[]">
                <input type="number" style="border-color: blue;" value="{{$student->exam_grade}}" placeholder="Exam Grade" class="form-control col-md-12 col-xs-12 readonly" name="exam_grade[]">
                <input type="number" style="border-color: red;" value="{{$student->exam_over}}" placeholder="Exam Grade Total" class="form-control col-md-12 col-xs-12 readonly" name="exam_over[]">
                @endif
                          </div>
                        </div>             
                        @endforeach
                          <div class="form-group">
                          <div class="input-group">
           <select class="form-control" name="subject[]">
                    <option>Select Subject</option>
        @foreach(\App\Subject::where('class',\App\Student::find($id)->class)->get() as $subject)
        <option value="{{$subject->id}}">{{$subject->title}}</option>
        @endforeach
                    </select>
                               <input type="number" style="border-color: blue;" placeholder="Test Score" class="form-control" name="test_grade[]"><br>
          <input type="number" style="border-color: red;" placeholder="Test Total" class="form-control" name="test_over[]">
    <input type="number" style="border-color: blue;" placeholder="Project Score" class="form-control" name="project_grade[]"><br>
    <input type="number" style="border-color: red;" placeholder="Project Total" class="form-control" name="project_over[]">
    <input type="number" style="border-color: blue;" placeholder="Exam Score" class="form-control" name="exam_grade[]"><br>
    <input type="number" style="border-color: red;" placeholder="Exam Total" class="form-control" name="exam_over[]">
      <span class="input-group-btn">
              <button onclick="add_medicine()"  type="button" class="btn btn-primary"><i class="fa fa-plus"></i></button>
                                          </span>
                          </div>
                        </div>
                         </span>
                          <span id="medicine_input">
                                <div class="form-group">
                          <div class="input-group">
                    <select class="form-control col-md-12 col-xs-12" name="subject[]">
        @foreach(\App\Subject::where('class',\App\Student::find($id)->class)->get() as $subject)
        <option value="{{$subject->id}}">{{$subject->title}}</option>
        @endforeach
                    </select>
    <input type="number"style="border-color: blue;" placeholder="Test Score" class="form-control" name="test_grade[]">
          <input type="number" style="border-color: red;" placeholder="Test Total" class="form-control" name="test_over[]">
    <input type="number" style="border-color: blue;" placeholder="Project Score" class="form-control" name="project_grade[]">
    <input type="number" style="border-color: red;" placeholder="Project Total" class="form-control" name="project_over[]">
    <input type="number"style="border-color: blue;" placeholder="Exam Score" class="form-control" name="exam_grade[]">
    <input type="number" style="border-color: red;" placeholder="Exam Total" class="form-control" name="exam_over[]">
                            <span class="input-group-btn">
              <button onclick="deletemedicineParentElement(this)"  type="button" class="btn btn-danger"><i class="fa fa-trash"></i></button>
                                          </span>
                          </div>
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
                                   </div>
                                 <div class="tab-pane" id="comment">
                                     <hr>
                        <h4 class="card-title">Comment/Status</h4>
                        <hr>
                                        <div class="row">
                                            <div class="col-md-12">
    <div id="showcontent">
    <form class="formsubmittin" method="post" action="{{url('')}}/admin/comment/create/{{$id}}">
              {{ csrf_field() }}
             <div class="row">
               <div  class="col-md-6">
                 <div class="form-group">
                    <label>{{\App\Resultphrase::first()->time_present}}</label>
<input type="number" value="{{count(\App\Attendance::where('student_id',$id)->where('term',\App\Session::latest()->first()->terms)->where('session',\App\Session::latest()->first()->session)->where('status','1')->get())}}" class="form-control" name="present">
                 </div>
             </div> 
              <div  class="col-md-6">
                 <div class="form-group">
                    <label>{{\App\Resultphrase::first()->time_open}}</label>
<input type="number" value="{{count(\App\Attendance::where('student_id',$id)->where('term',\App\Session::latest()->first()->terms)->where('session',\App\Session::latest()->first()->session)->get())}}" class="form-control" name="open">
                 </div>
             </div>  
              <div  class="col-md-6">
                 <div class="form-group">
                    <label>{{\App\Student::find($id)->gname}}'s Promotion Status <small><em>skip if not promotiom term</em></small></label>
   <select class="form-control" required name="promotion">
         <option value=""></option>
         <option value="0">Remain Same Class</option> 
         @foreach(\App\Course::all() as $class)
         <option value="{{$class->id}}">{{$class->title}}</option>
         @endforeach
     </select>
    </div>
</div>
 <div  class="col-md-6">
                 <div class="form-group">
                    <label>{{\App\Resultphrase::first()->term_begin}}</label>
@if(count(\App\Comment::where('term',\App\Session::latest()->first()->terms)->where('session',\App\Session::latest()->first()->session)->where('student_id',$id)->get())>0)
<input type="text" class="form-control" value="{{\App\Comment::where('term',\App\Session::latest()->first()->terms)->where('session',\App\Session::latest()->first()->session)->where('student_id',$id)->latest()->first()->termb}}" name="termb">
@else
<input type="date" name="termb" required class="form-control mdate">
@endif 
                 </div>
             </div>
             <div  class="col-md-6">
                 <div class="form-group">
                    <label>{{\App\Resultphrase::first()->class_fac}}</label>
@if(count(\App\Comment::where('term',\App\Session::latest()->first()->terms)->where('session',\App\Session::latest()->first()->session)->where('student_id',$id)->get())>0)
<textarea class="form-control" name="fcomment" placeholder="Class Facilitator's Comment">{{\App\Comment::where('term',\App\Session::latest()->first()->terms)->where('session',\App\Session::latest()->first()->session)->where('student_id',$id)->latest()->first()->fcomment}}</textarea> 
@else
<textarea class="form-control" name="fcomment" placeholder="Class Facilitator's Comment"></textarea>
@endif

                 </div>
             </div>
            <div  class="col-md-6">
                 <div class="form-group">
            <label>{{\App\Resultphrase::first()->class_fac}} {{\App\Resultphrase::first()->date}} {{\App\Resultphrase::first()->signature}}</label>
@if(count(\App\Comment::where('term',\App\Session::latest()->first()->terms)->where('session',\App\Session::latest()->first()->session)->where('student_id',$id)->get())>0)
<input type="text" readonly name="fdate" value="{{\App\Comment::where('term',\App\Session::latest()->first()->terms)->where('session',\App\Session::latest()->first()->session)->where('student_id',$id)->latest()->first()->fdate}}" class="form-control mdate" > 
@else
        <input type="date" name="fdate" class="form-control mdate" > 
@endif
                 </div>
             </div>
             <div  class="col-md-6">
                 <div class="form-group">
                    <label>{{\App\Resultphrase::first()->head_rem}}</label>
@if(count(\App\Comment::where('term',\App\Session::latest()->first()->terms)->where('session',\App\Session::latest()->first()->session)->where('student_id',$id)->get())>0)
<textarea class="form-control" name="hcomment" placeholder="Class Facilitator's Comment">{{\App\Comment::where('term',\App\Session::latest()->first()->terms)->where('session',\App\Session::latest()->first()->session)->where('student_id',$id)->latest()->first()->hcomment}}</textarea>
@else
<textarea class="form-control" name="hcomment" placeholder="Class Facilitator's Comment"></textarea>
@endif

                 </div>
             </div>
              <div  class="col-md-6">
                 <div class="form-group">
                    <label>{{\App\Resultphrase::first()->head_rem}} {{\App\Resultphrase::first()->date}} {{\App\Resultphrase::first()->signature}}</label>
@if(count(\App\Comment::where('term',\App\Session::latest()->first()->terms)->where('session',\App\Session::latest()->first()->session)->where('student_id',$id)->get())>0)
<input type="text" readonly name="hdate" value="{{\App\Comment::where('term',\App\Session::latest()->first()->terms)->where('session',\App\Session::latest()->first()->session)->where('student_id',$id)->latest()->first()->hdate}}" class="form-control mdate" > 
@else
              <input type="date" name="hdate" class="form-control mdate"> 
@endif
                 </div>
             </div>
         </div>
                                        <div class="row">
                                      <div class="col-md-6">
                                      </div>
                                     <div class="col-md-6">
                                                <div class="form-group">
                    <input type="submit" value="Submit" class="btn btn-bg btn-primary btn-block" name="">
                                                </div>
                                </div>
                            </div>
                                        </form>
                                    </div>
                                        </div>
                                  </div>
                              </div>
                                   
                                  <div class="tab-pane" id="gresult">
                                     <hr>
                        <h4 class="card-title">Generate Result</h4>
                         <h6 class="card-subtitle">Ensure You have added all class member grades before you generate result.</h6>
                        <hr>
<form method="post" action="{{url('')}}/admin/generate/result/{{$id}}" enctype="multipart/form-data" class="form-horizontal form-label-left">
                        {{ csrf_field() }}
                                        <div class="row">
        <!--Start of Result Sheet -->  
                                         <div class="col-12">
                        <div class="card">
                <div class="card-body" id="content-main">
                
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
                <a>
                <small>{{\App\Provider::first()->web}}</small>
            </a>
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
                <small>{{\App\Resultphrase::first()->name}}: {{\App\Student::find($id)->gname}} {{\App\Student::find($id)->fname}}</small>
                &nbsp; &nbsp; &nbsp;
                <small>{{\App\Resultphrase::first()->sex}}: {{\App\Student::find($id)->sex}}&nbsp; &nbsp; &nbsp; {{\App\Resultphrase::first()->age}}:  {{\Carbon\Carbon::parse(\App\Student::find($id)->dob)->age}}</small>&nbsp; &nbsp; &nbsp;
            </p><p style="text-align: left;">
                 <small>{{\App\Resultphrase::first()->term}}: {{\App\Session::latest()->first()->terms}}</small>&nbsp; &nbsp; &nbsp; &nbsp; 
            <small>{{\App\Resultphrase::first()->year}}:  {{\App\Session::latest()->first()->session}}</small>&nbsp; &nbsp; &nbsp; &nbsp;
                <small>{{\App\Resultphrase::first()->class}}:  {{\App\Course::find(\App\Student::find($id)->class)->title}}</small> 
                &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                <small>{{\App\Resultphrase::first()->number_class}}:  {{count(\App\Student::where('class',\App\Student::find($id)->class)->get())}}</small>

            </p>
            <p style="text-align: left;">
@if(count(\App\Comment::where('student_id',$id)->where('term',\App\Session::latest()->first()->terms)->where('session',\App\Session::latest()->first()->session)->get())>0)
                <small>{{\App\Resultphrase::first()->time_open}}:  {{\App\Comment::where('student_id',$id)->where('term',\App\Session::latest()->first()->terms)->where('session',\App\Session::latest()->first()->session)->first()->open}}</small> 
                &nbsp; &nbsp; 
                <small>{{\App\Resultphrase::first()->time_present}}:   {{\App\Comment::where('student_id',$id)->where('term',\App\Session::latest()->first()->terms)->where('session',\App\Session::latest()->first()->session)->first()->present}}</small>&nbsp; &nbsp; &nbsp; &nbsp;
                <small>{{\App\Resultphrase::first()->term_begin}}:  {{\Carbon\Carbon::parse(\App\Comment::where('student_id',$id)->where('term',\App\Session::latest()->first()->terms)->where('session',\App\Session::latest()->first()->session)->first()->termb)->toFormattedDateString()}}</small>
                @else
                <small>{{\App\Resultphrase::first()->time_open}}:  </small>&nbsp; &nbsp; 
                <small>{{\App\Resultphrase::first()->time_present}}:  </small>&nbsp; &nbsp; &nbsp; &nbsp;
                 <small>{{\App\Resultphrase::first()->term_begin}}:  </small>
                 @endif
            </p>
          
    </div>
                    <div class="row">
<div style="width:60%;"><h6>
<table class="table table-bordered">
<tbody>
<tr style="height:50%;">
<td style="text-align: center;font-size:10px;"><br></td>
<td style="text-align: center;font-size:10px;"><small><b>{{\App\Resultphrase::first()->mid_term}}</b></small></td>
<td style="text-align: center;font-size:10px;"><small><b>{{\App\Resultphrase::first()->project}}</b></small></td>
<td style="text-align: center;font-size:10px;"><small><b>{{\App\Resultphrase::first()->exam}}</b></small></td>
<td style="text-align: center;font-size:10px;"><small><b>{{\App\Resultphrase::first()->total_score}}</b></small></td>
<td style="text-align: center;font-size:10px;"><small><b>{{\App\Resultphrase::first()->class_average}}</b></small></td>
<td style="text-align: center;font-size:10px;"><small><b>{{\App\Resultphrase::first()->grade}}</b></small></td>
<td style="text-align: center;font-size:10px;"><small><b>{{\App\Resultphrase::first()->remark}}</b></small></td>
</tr>
<tr>
<td style="text-align: center;font-size:10px;"><small>{{\App\Resultphrase::first()->max_mark}}</small><br></td>
<td style="text-align: center;font-size:10px;"><small>{{\App\Resultconfig::first()->test_percent}}%</small></td>
<td style="text-align: center;font-size:10px;"><small>{{\App\Resultconfig::first()->project_percent}}%</small></td>
<td style="text-align: center;font-size:10px;"><small>{{\App\Resultconfig::first()->exam_percent}}%</small></td>
<td style="text-align: center;font-size:10px;"><small>100%</small></td>
<td></td>
<td></td>
<td></td>
</tr>
 @foreach(\App\Subjectassign::where('student',$id)->where('class',\App\Student::find($id)->class)->where('term',\App\Session::first()->terms)->where('session',\App\Session::first()->session)->get() as $student)
<tr>
<td style="text-align: center;font-size:10px;"><small><b>{{\App\Subject::find($student->subject)->title}}</b></small></td>
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
@if(count(\App\Examgrade::where('student_id',$id)->where('class',\App\Student::find($id)->class)->where('subject',$student->subject)->latest()->get())>0)
<td style="text-align: center;font-size:10px;"><small><b>{{round((\App\Examgrade::where('student_id',$id)->where('class',\App\Student::find($id)->class)->where('subject',$student->subject)->latest()->first()->score*\App\Resultconfig::first()->exam_percent)/\App\Examgrade::where('student_id',$id)->where('class',\App\Student::find($id)->class)->where('subject',$student->subject)->latest()->first()->over)}}</b></small></td>
@else
<td style="text-align: center;font-size:10px;"><small><b></b></small></td>
@endif
@if(count(\App\Examgrade::where('student_id',$id)->where('class',\App\Student::find($id)->class)->where('subject',$student->subject)->latest()->get())>0&&count(\App\Testgrade::where('student_id',$id)->where('class',\App\Student::find($id)->class)->where('subject',$student->subject)->latest()->get())>0&&count(\App\Testgrade::where('student_id',$id)->where('class',\App\Student::find($id)->class)->where('subject',$student->subject)->latest()->get())>0)
<td style="text-align: center;font-size:10px;" class="total"><small><b>{{round((\App\Assignmentgrade::where('student_id',$id)->where('class',\App\Student::find($id)->class)->where('subject',$student->subject)->latest()->first()->score*\App\Resultconfig::first()->project_percent)/\App\Assignmentgrade::where('student_id',$id)->where('class',\App\Student::find($id)->class)->where('subject',$student->subject)->latest()->first()->over+(\App\Testgrade::where('student_id',$id)->where('class',\App\Student::find($id)->class)->where('subject',$student->subject)->latest()->first()->score*\App\Resultconfig::first()->test_percent)/\App\Testgrade::where('student_id',$id)->where('class',\App\Student::find($id)->class)->where('subject',$student->subject)->latest()->first()->over+(\App\Examgrade::where('student_id',$id)->where('class',\App\Student::find($id)->class)->where('subject',$student->subject)->latest()->first()->score*\App\Resultconfig::first()->exam_percent)/\App\Examgrade::where('student_id',$id)->where('class',\App\Student::find($id)->class)->where('subject',$student->subject)->latest()->first()->over)}}</b></small></td>
@else
<td style="text-align: center;font-size:10px;"><small><b></b></small></td>
@endif
@if(count(\App\Examgrade::where('class',\App\Student::find($id)->class)->where('subject',$student->subject)->latest()->get())>0&&count(\App\Testgrade::where('class',\App\Student::find($id)->class)->where('subject',$student->subject)->latest()->get())>0&&count(\App\Testgrade::where('class',\App\Student::find($id)->class)->where('subject',$student->subject)->latest()->get())>0)
<td style="text-align: center;font-size:10px;"><small><b>{{round(((\App\Assignmentgrade::where('class',\App\Student::find($id)->class)->where('term',\App\Session::latest()->first()->terms)->where('subject',$student->subject)->where('session',\App\Session::latest()->first()->session)->sum('score')*\App\Resultconfig::first()->project_percent/\App\Assignmentgrade::where('class',\App\Student::find($id)->class)->where('subject',$student->subject)->where('term',\App\Session::latest()->first()->terms)->where('session',\App\Session::latest()->first()->session)->sum('over'))+(\App\Testgrade::where('class',\App\Student::find($id)->class)->where('subject',$student->subject)->where('term',\App\Session::latest()->first()->terms)->where('session',\App\Session::latest()->first()->session)->sum('score')*\App\Resultconfig::first()->test_percent/\App\Testgrade::where('class',\App\Student::find($id)->class)->where('term',\App\Session::latest()->first()->terms)->where('subject',$student->subject)->where('session',\App\Session::latest()->first()->session)->sum('over'))+(\App\Examgrade::where('class',\App\Student::find($id)->class)->where('subject',$student->subject)->where('term',\App\Session::latest()->first()->terms)->where('session',\App\Session::latest()->first()->session)->sum('score')*\App\Resultconfig::first()->exam_percent/\App\Examgrade::where('class',\App\Student::find($id)->class)->where('subject',$student->subject)->where('term',\App\Session::latest()->first()->terms)->where('session',\App\Session::latest()->first()->session)->sum('over')))/count(\App\Student::where('class',\App\Student::find($id)->class)->get()))}}</b></small></td>
@else
<td style="text-align: center;font-size:10px;"><small><b></b></small></td>
@endif
@if(count(\App\Examgrade::where('student_id',$id)->where('class',\App\Student::find($id)->class)->where('subject',$student->subject)->latest()->get())>0&&count(\App\Testgrade::where('student_id',$id)->where('class',\App\Student::find($id)->class)->where('subject',$student->subject)->latest()->get())>0&&count(\App\Testgrade::where('student_id',$id)->where('class',\App\Student::find($id)->class)->where('subject',$student->subject)->latest()->get())>0)
@if(round((\App\Assignmentgrade::where('student_id',$id)->where('class',\App\Student::find($id)->class)->where('subject',$student->subject)->latest()->first()->score*\App\Resultconfig::first()->project_percent)/\App\Assignmentgrade::where('student_id',$id)->where('class',\App\Student::find($id)->class)->where('subject',$student->subject)->latest()->first()->over+(\App\Testgrade::where('student_id',$id)->where('class',\App\Student::find($id)->class)->where('subject',$student->subject)->latest()->first()->score*\App\Resultconfig::first()->test_percent)/\App\Testgrade::where('student_id',$id)->where('class',\App\Student::find($id)->class)->where('subject',$student->subject)->latest()->first()->over+(\App\Examgrade::where('student_id',$id)->where('class',\App\Student::find($id)->class)->where('subject',$student->subject)->latest()->first()->score*\App\Resultconfig::first()->exam_percent)/\App\Examgrade::where('student_id',$id)->where('class',\App\Student::find($id)->class)->where('subject',$student->subject)->latest()->first()->over)>=\App\Resultconfig::first()->dis_start)
<td style="text-align: center;font-size:10px;"><small><b>{{\App\Resultconfig::first()->dis_att}}</b></small></td>
<td style="text-align: center;font-size:10px;"><small><b>{{\App\Resultconfig::first()->dis_val}}</b></small></td>
@elseif(round((\App\Assignmentgrade::where('student_id',$id)->where('class',\App\Student::find($id)->class)->where('subject',$student->subject)->latest()->first()->score*\App\Resultconfig::first()->project_percent)/\App\Assignmentgrade::where('student_id',$id)->where('class',\App\Student::find($id)->class)->where('subject',$student->subject)->latest()->first()->over+(\App\Testgrade::where('student_id',$id)->where('class',\App\Student::find($id)->class)->where('subject',$student->subject)->latest()->first()->score*\App\Resultconfig::first()->test_percent)/\App\Testgrade::where('student_id',$id)->where('class',\App\Student::find($id)->class)->where('subject',$student->subject)->latest()->first()->over+(\App\Examgrade::where('student_id',$id)->where('class',\App\Student::find($id)->class)->where('subject',$student->subject)->latest()->first()->score*\App\Resultconfig::first()->exam_percent)/\App\Examgrade::where('student_id',$id)->where('class',\App\Student::find($id)->class)->where('subject',$student->subject)->latest()->first()->over)>=\App\Resultconfig::first()->vg_start&&round((\App\Assignmentgrade::where('student_id',$id)->where('class',\App\Student::find($id)->class)->where('subject',$student->subject)->latest()->first()->score*\App\Resultconfig::first()->project_percent)/\App\Assignmentgrade::where('student_id',$id)->where('class',\App\Student::find($id)->class)->where('subject',$student->subject)->latest()->first()->over+(\App\Testgrade::where('student_id',$id)->where('class',\App\Student::find($id)->class)->where('subject',$student->subject)->latest()->first()->score*\App\Resultconfig::first()->test_percent)/\App\Testgrade::where('student_id',$id)->where('class',\App\Student::find($id)->class)->where('subject',$student->subject)->latest()->first()->over+(\App\Examgrade::where('student_id',$id)->where('class',\App\Student::find($id)->class)->where('subject',$student->subject)->latest()->first()->score*\App\Resultconfig::first()->exam_percent)/\App\Examgrade::where('student_id',$id)->where('class',\App\Student::find($id)->class)->where('subject',$student->subject)->latest()->first()->over)<=\App\Resultconfig::first()->vg_end)
<td style="text-align: center;font-size:10px;"><small><b>{{\App\Resultconfig::first()->vg_att}}</b></small></td>
<td style="text-align: center;font-size:10px;"><small><b>{{\App\Resultconfig::first()->vg_val}}</b></small></td>
@elseif(round((\App\Assignmentgrade::where('student_id',$id)->where('class',\App\Student::find($id)->class)->where('subject',$student->subject)->latest()->first()->score*\App\Resultconfig::first()->project_percent)/\App\Assignmentgrade::where('student_id',$id)->where('class',\App\Student::find($id)->class)->where('subject',$student->subject)->latest()->first()->over+(\App\Testgrade::where('student_id',$id)->where('class',\App\Student::find($id)->class)->where('subject',$student->subject)->latest()->first()->score*\App\Resultconfig::first()->test_percent)/\App\Testgrade::where('student_id',$id)->where('class',\App\Student::find($id)->class)->where('subject',$student->subject)->latest()->first()->over+(\App\Examgrade::where('student_id',$id)->where('class',\App\Student::find($id)->class)->where('subject',$student->subject)->latest()->first()->score*\App\Resultconfig::first()->exam_percent)/\App\Examgrade::where('student_id',$id)->where('class',\App\Student::find($id)->class)->where('subject',$student->subject)->latest()->first()->over)>=\App\Resultconfig::first()->good_start&&round((\App\Assignmentgrade::where('student_id',$id)->where('class',\App\Student::find($id)->class)->where('subject',$student->subject)->latest()->first()->score*\App\Resultconfig::first()->project_percent)/\App\Assignmentgrade::where('student_id',$id)->where('class',\App\Student::find($id)->class)->where('subject',$student->subject)->latest()->first()->over+(\App\Testgrade::where('student_id',$id)->where('class',\App\Student::find($id)->class)->where('subject',$student->subject)->latest()->first()->score*\App\Resultconfig::first()->test_percent)/\App\Testgrade::where('student_id',$id)->where('class',\App\Student::find($id)->class)->where('subject',$student->subject)->latest()->first()->over+(\App\Examgrade::where('student_id',$id)->where('class',\App\Student::find($id)->class)->where('subject',$student->subject)->latest()->first()->score*\App\Resultconfig::first()->exam_percent)/\App\Examgrade::where('student_id',$id)->where('class',\App\Student::find($id)->class)->where('subject',$student->subject)->latest()->first()->over)<=\App\Resultconfig::first()->good_end)
<td style="text-align: center;font-size:10px;"><small><b>{{\App\Resultconfig::first()->good_att}}</b></small></td>
<td style="text-align: center;font-size:10px;"><small><b>{{\App\Resultconfig::first()->good_val}}</b></small></td>
@elseif(round((\App\Assignmentgrade::where('student_id',$id)->where('class',\App\Student::find($id)->class)->where('subject',$student->subject)->latest()->first()->score*\App\Resultconfig::first()->project_percent)/\App\Assignmentgrade::where('student_id',$id)->where('class',\App\Student::find($id)->class)->where('subject',$student->subject)->latest()->first()->over+(\App\Testgrade::where('student_id',$id)->where('class',\App\Student::find($id)->class)->where('subject',$student->subject)->latest()->first()->score*\App\Resultconfig::first()->test_percent)/\App\Testgrade::where('student_id',$id)->where('class',\App\Student::find($id)->class)->where('subject',$student->subject)->latest()->first()->over+(\App\Examgrade::where('student_id',$id)->where('class',\App\Student::find($id)->class)->where('subject',$student->subject)->latest()->first()->score*\App\Resultconfig::first()->exam_percent)/\App\Examgrade::where('student_id',$id)->where('class',\App\Student::find($id)->class)->where('subject',$student->subject)->latest()->first()->over)>=\App\Resultconfig::first()->fg_start&&round((\App\Assignmentgrade::where('student_id',$id)->where('class',\App\Student::find($id)->class)->where('subject',$student->subject)->latest()->first()->score*\App\Resultconfig::first()->project_percent)/\App\Assignmentgrade::where('student_id',$id)->where('class',\App\Student::find($id)->class)->where('subject',$student->subject)->latest()->first()->over+(\App\Testgrade::where('student_id',$id)->where('class',\App\Student::find($id)->class)->where('subject',$student->subject)->latest()->first()->score*\App\Resultconfig::first()->test_percent)/\App\Testgrade::where('student_id',$id)->where('class',\App\Student::find($id)->class)->where('subject',$student->subject)->latest()->first()->over+(\App\Examgrade::where('student_id',$id)->where('class',\App\Student::find($id)->class)->where('subject',$student->subject)->latest()->first()->score*\App\Resultconfig::first()->exam_percent)/\App\Examgrade::where('student_id',$id)->where('class',\App\Student::find($id)->class)->where('subject',$student->subject)->latest()->first()->over)<=\App\Resultconfig::first()->fg_end)
<td style="text-align: center;font-size:10px;"><small><b>{{\App\Resultconfig::first()->fg_att}}</b></small></td>
<td style="text-align: center;font-size:10px;"><small><b>{{\App\Resultconfig::first()->fg_val}}</b></small></td>
@elseif(round((\App\Assignmentgrade::where('student_id',$id)->where('class',\App\Student::find($id)->class)->where('subject',$student->subject)->latest()->first()->score*\App\Resultconfig::first()->project_percent)/\App\Assignmentgrade::where('student_id',$id)->where('class',\App\Student::find($id)->class)->where('subject',$student->subject)->latest()->first()->over+(\App\Testgrade::where('student_id',$id)->where('class',\App\Student::find($id)->class)->where('subject',$student->subject)->latest()->first()->score*\App\Resultconfig::first()->test_percent)/\App\Testgrade::where('student_id',$id)->where('class',\App\Student::find($id)->class)->where('subject',$student->subject)->latest()->first()->over+(\App\Examgrade::where('student_id',$id)->where('class',\App\Student::find($id)->class)->where('subject',$student->subject)->latest()->first()->score*\App\Resultconfig::first()->exam_percent)/\App\Examgrade::where('student_id',$id)->where('class',\App\Student::find($id)->class)->where('subject',$student->subject)->latest()->first()->over)>=\App\Resultconfig::first()->av_start&&round((\App\Assignmentgrade::where('student_id',$id)->where('class',\App\Student::find($id)->class)->where('subject',$student->subject)->latest()->first()->score*\App\Resultconfig::first()->project_percent)/\App\Assignmentgrade::where('student_id',$id)->where('class',\App\Student::find($id)->class)->where('subject',$student->subject)->latest()->first()->over+(\App\Testgrade::where('student_id',$id)->where('class',\App\Student::find($id)->class)->where('subject',$student->subject)->latest()->first()->score*\App\Resultconfig::first()->test_percent)/\App\Testgrade::where('student_id',$id)->where('class',\App\Student::find($id)->class)->where('subject',$student->subject)->latest()->first()->over+(\App\Examgrade::where('student_id',$id)->where('class',\App\Student::find($id)->class)->where('subject',$student->subject)->latest()->first()->score*\App\Resultconfig::first()->exam_percent)/\App\Examgrade::where('student_id',$id)->where('class',\App\Student::find($id)->class)->where('subject',$student->subject)->latest()->first()->over)<=\App\Resultconfig::first()->av_end)
<td style="text-align: center;font-size:10px;"><small><b>{{\App\Resultconfig::first()->av_att}}</b></small></td>
<td style="text-align: center;font-size:10px;"><small><b>{{\App\Resultconfig::first()->av_val}}</b></small></td>
@elseif(round((\App\Assignmentgrade::where('student_id',$id)->where('class',\App\Student::find($id)->class)->where('subject',$student->subject)->latest()->first()->score*\App\Resultconfig::first()->project_percent)/\App\Assignmentgrade::where('student_id',$id)->where('class',\App\Student::find($id)->class)->where('subject',$student->subject)->latest()->first()->over+(\App\Testgrade::where('student_id',$id)->where('class',\App\Student::find($id)->class)->where('subject',$student->subject)->latest()->first()->score*\App\Resultconfig::first()->test_percent)/\App\Testgrade::where('student_id',$id)->where('class',\App\Student::find($id)->class)->where('subject',$student->subject)->latest()->first()->over+(\App\Examgrade::where('student_id',$id)->where('class',\App\Student::find($id)->class)->where('subject',$student->subject)->latest()->first()->score*\App\Resultconfig::first()->exam_percent)/\App\Examgrade::where('student_id',$id)->where('class',\App\Student::find($id)->class)->where('subject',$student->subject)->latest()->first()->over)>=\App\Resultconfig::first()->weak_start&&round((\App\Assignmentgrade::where('student_id',$id)->where('class',\App\Student::find($id)->class)->where('subject',$student->subject)->latest()->first()->score*\App\Resultconfig::first()->project_percent)/\App\Assignmentgrade::where('student_id',$id)->where('class',\App\Student::find($id)->class)->where('subject',$student->subject)->latest()->first()->over+(\App\Testgrade::where('student_id',$id)->where('class',\App\Student::find($id)->class)->where('subject',$student->subject)->latest()->first()->score*\App\Resultconfig::first()->test_percent)/\App\Testgrade::where('student_id',$id)->where('class',\App\Student::find($id)->class)->where('subject',$student->subject)->latest()->first()->over+(\App\Examgrade::where('student_id',$id)->where('class',\App\Student::find($id)->class)->where('subject',$student->subject)->latest()->first()->score*\App\Resultconfig::first()->exam_percent)/\App\Examgrade::where('student_id',$id)->where('class',\App\Student::find($id)->class)->where('subject',$student->subject)->latest()->first()->over)<=\App\Resultconfig::first()->weak_end)
<td style="text-align: center;font-size:10px;"><small><b>{{\App\Resultconfig::first()->weak_att}}</b></small></td>
<td style="text-align: center;font-size:10px;"><small><b>{{\App\Resultconfig::first()->weak_val}}</b></small></td>
@elseif(round((\App\Assignmentgrade::where('student_id',$id)->where('class',\App\Student::find($id)->class)->where('subject',$student->subject)->latest()->first()->score*\App\Resultconfig::first()->project_percent)/\App\Assignmentgrade::where('student_id',$id)->where('class',\App\Student::find($id)->class)->where('subject',$student->subject)->latest()->first()->over+(\App\Testgrade::where('student_id',$id)->where('class',\App\Student::find($id)->class)->where('subject',$student->subject)->latest()->first()->score*\App\Resultconfig::first()->test_percent)/\App\Testgrade::where('student_id',$id)->where('class',\App\Student::find($id)->class)->where('subject',$student->subject)->latest()->first()->over+(\App\Examgrade::where('student_id',$id)->where('class',\App\Student::find($id)->class)->where('subject',$student->subject)->latest()->first()->score*\App\Resultconfig::first()->exam_percent)/\App\Examgrade::where('student_id',$id)->where('class',\App\Student::find($id)->class)->where('subject',$student->subject)->latest()->first()->over)<=\App\Resultconfig::first()->vw_end)
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
    <div style="width:10%;"></div>
<div style="width:40%;">
<h6 style="text-align: center; ">
 <p style="text-align: left;"><small>{{\App\Resultphrase::first()->total_score}}:  <b class="total_show"></b></small></p> <br>
<p style="text-align: left;"><small>{{\App\Resultphrase::first()->average_score}}:  <b class="average_show"></b></small></p><br> 
<p style="text-align: left;"><small>{{\App\Resultphrase::first()->grade}}:  <b class="grade_show"></b></small></p><br>
@if(count(\App\Comment::where('student_id',$id)->where('term',\App\Session::latest()->first()->terms)->where('session',\App\Session::latest()->first()->session)->get())>0)
<p style="text-align: left;"><small>{{\App\Resultphrase::first()->promotion}}: 
@if(\App\Comment::where('student_id',$id)->where('term',\App\Session::latest()->first()->terms)->where('session',\App\Session::latest()->first()->session)->first()->promotion!=''&&\App\Comment::where('student_id',$id)->where('term',\App\Session::latest()->first()->terms)->where('session',\App\Session::latest()->first()->session)->first()->promotion!='nill'&&\App\Comment::where('student_id',$id)->where('term',\App\Session::latest()->first()->terms)->where('session',\App\Session::latest()->first()->session)->first()->promotion!='0') 
    {{\App\Course::find(\App\Comment::where('student_id',$id)->where('term',\App\Session::latest()->first()->terms)->where('session',\App\Session::latest()->first()->session)->first()->promotion)->title}}
    @else
    @endif
    <b></b></small></p><br>
@else
<p style="text-align: left;"><small>{{\App\Resultphrase::first()->promotion}}:  <b></b></small></p><br>
@endif
</h6>
</div>
<div style="width:50%;">
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
</div>

</div>

</div>
<div style="width:9%;"></div>
<div style="width:30%;">
    
 <div class="row">
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
    <td style="text-align: center;font-size:10px;"><small><i class="fa fa-check"></i></small></td>
     <td style="text-align: center;font-size:10px;"><small></small></td>
     <td style="text-align: center;font-size:10px;"><small></small></td>
     <td style="text-align: center;font-size:10px;"><small></small></td>
    <td style="text-align: center;font-size:10px;"><small></small></td>
@elseif(json_decode(\App\Personality::where('student_id',$id)->where('term',\App\Session::latest()->first()->terms)->where('session',\App\Session::latest()->first()->session)->first()->data)[$loop->iteration-1]->behave=='4')
     <td style="text-align: center;font-size:10px;"><small></small></td>
     <td style="text-align: center;font-size:10px;"><small><i class="fa fa-check"></i></small></td>
     <td style="text-align: center;font-size:10px;"><small></small></td>
     <td style="text-align: center;font-size:10px;"><small></small></td>
    <td style="text-align: center;font-size:10px;"><small></small></td>
@elseif(json_decode(\App\Personality::where('student_id',$id)->where('term',\App\Session::latest()->first()->terms)->where('session',\App\Session::latest()->first()->session)->first()->data)[$loop->iteration-1]->behave=='3')
    <td style="text-align: center;font-size:10px;"><small></small></td>
    <td style="text-align: center;font-size:10px;"><small></small></td>
    <td style="text-align: center;font-size:10px;"><small><i class="fa fa-check"></i></small></td>
    <td style="text-align: center;font-size:10px;"><small></small></td>
    <td style="text-align: center;font-size:10px;"><small></small></td>
@elseif(json_decode(\App\Personality::where('student_id',$id)->where('term',\App\Session::latest()->first()->terms)->where('session',\App\Session::latest()->first()->session)->first()->data)[$loop->iteration-1]->behave=='2')   
 <td style="text-align: center;font-size:10px;"><small></small></td>
     <td style="text-align: center;font-size:10px;"><small></small></td>
     <td style="text-align: center;font-size:10px;"><small></small></td>
    <td style="text-align: center;font-size:10px;"><small><i class="fa fa-check"></i></small></td>
    <td style="text-align: center;font-size:10px;"><small></small></td>
@elseif(json_decode(\App\Personality::where('student_id',$id)->where('term',\App\Session::latest()->first()->terms)->where('session',\App\Session::latest()->first()->session)->first()->data)[$loop->iteration-1]->behave=='1')
 <td style="text-align: center;font-size:10px;"><small></small></td>
     <td style="text-align: center;font-size:10px;"><small></small></td>
     <td style="text-align: center;font-size:10px;"><small></small></td>
     <td style="text-align: center;font-size:10px;"><small></small></td>
    <td style="text-align: center;font-size:10px;"><small><i class="fa fa-check"></i></small></td>
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
<h6>
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
<div class="row">
  <div style="width:10%;"></div>
<div style="width:60%;">
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
   <input type="submit" class="btn btn-sm btn-primary btn-block" value="Generate Result"> 
</div>
</div>
</form>
                                    </div>
                                </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                                <div class="tab-pane" id="settings" role="tabpanel">
                                    <div class="card-body">
                                   <h4 class="card-title">{{\App\Student::find($id)->gname}}'s Academic History</h4>
                                <h6 class="card-subtitle">Export data to Copy, CSV, Excel, PDF & Print</h6>
                                <div class="table-responsive m-t-40">
                                    <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th>Student ID</th>
                                                <th>Class</th>
                                                <th>Session</th>
                                                <th>Term</th>
                                                <th>View Result</th>
                                               
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>Student ID</th>
                                                 <th>Class</th>
                                                <th>Session</th>
                                                <th>Term</th>
                                                <th>View Result</th>
                                               
                                            </tr>
                                        </tfoot>
                                        <tbody>
                        @foreach(\App\Result::where('student_id',$id)->get() as $result)
                                            <tr>
                                    <td>{{\App\Student::find($id)->user_id}}</td>
                                    <td>{{\App\Course::find($result->class_id)->title}}</td>
                <td>{{$result->session}}</td>
                   <td>{{$result->term}}</td>
                    <td><a onclick="showAjaxModal('{{url('')}}/show/result/{{$result->id}}')" class="btn btn-primary btn-sm btn-block"><i class="fa fa-book"></i>Print Result</a></td>
                                            </tr>
                        @endforeach
                                        </tbody>
                                    </table>
                                </div>      
                                </div>
                            </div>
                            <div class="tab-pane" id="invoice" role="tabpanel">
                                    <div class="card-body">
                                   <h4 class="card-title">{{\App\Student::find($id)->gname}}'s Payment History</h4>
                                <h6 class="card-subtitle">Export data to Copy, CSV, Excel, PDF & Print</h6>
                          <div class="pull-right">
<button data-toggle="modal" data-target=".bs-example-modal-sm" class="btn btn-primary btn-md">Print Invoice</button>        
                          </div>
                                <div class="table-responsive m-t-40">
                                    <table id="example24" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                               <th>#</th>
                                                <th>Student ID</th>
                                                <th>Student</th>
                                                <th>Invoice ID</th>
                                                <th>Session</th>
                                                <th>Term</th>
                                                <th>Date Payment Made</th>
                                                 <th>Print Receipt</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                              <th>#</th>
                                                <th>Student ID</th>
                                                <th>Student</th>
                                                <th>Invoice ID</th>
                                                <th>Session</th>
                                                <th>Term</th>
                                                <th>Date Payment Made</th>
                                                <th>Print Receipt</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
      @foreach(\App\Payment::where('student_id',$id)->get() as $payment)
                                            <tr>
                                              <td>{{$loop->iteration}}</td>
                                    <td>{{\App\Student::find($id)->user_id}}</td>
                                    <td>{{\App\Student::find($id)->gname}} {{\App\Student::find($id)->fname}}</td>
                <td>{{$result->receipt_id}}</td>
                   <td>{{$result->session}}</td>
                   <td>{{$result->term}}</td>
                   <td>{{\Carbon\Carbon::parse($result->created_at)->toFormattedDateString()}}</td>
                    <td><a onclick="showAjaxModal('{{url('')}}/view/invoice/payment/{{$id}}')" class="btn btn-primary btn-sm btn-block"><i class="fa fa-book"></i>Print Receipt</a></td>
                                            </tr>
                        @endforeach
                                        </tbody>
                                    </table>
                                </div>      
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                </div>
                 <div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title" id="myLargeModalLabel">{{\App\Provider::first()->name}}</h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                            </div>
                                      <div class="modal-body">
                  <div class="row">
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-body">
<h4 class="card-title">Print Invoice</h4>
                <h6 class="card-subtitle"></h6>
    <form action="{{url('')}}/search/invoice/{{$id}}" method="post" enctype="multipart/form-data" class="formsubmitinv">
         {{ csrf_field() }}
         <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                              <label>Select Class</label>
                   <select style="width: 100%;" class="form-control select2" name="class">
                    @foreach(\App\Course::all() as $course)
                     <option value="{{$course->id}}">{{$course->title}}</option>
                     @endforeach
                   </select>
                            </div>
                            </div>
                             <div class="col-md-8">
                            <div class="form-group">
                              <label>Select Term</label>
                      <div class="input-group">
                     <select class="form-control" name="term">
                       <option value="First">First Term</option>
                      <option value="Second">Second Term</option>
                       <option value="Third">Third Term</option>
                       <option value="Fourth">Fourth Term</option>
                     </select>
                       <input type="submit" class="form-control btn btn-primary" value="Submit">
                    </div>
                            </div>
                            </div> 
                    </div>                 
                                  </form>
                                  <div id="showinvoice"></div>
                        </div>
                    </div>
                </div>
            </div>
                          </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-danger waves-effect text-left" data-dismiss="modal">Close</button>
                                            </div>
                                        </div>
                                        <!-- /.modal-content -->
                                    </div>
                                    <!-- /.modal-dialog -->
                                </div>
    <script src="{{url('')}}/assets/plugins/jquery/jquery.min.js"></script>
           <script type="text/javascript">
             $(document).ready(function() {
                  $('.mdate').bootstrapMaterialDatePicker({
        weekStart: 0,
        time: false
    });
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
function show(){
    $("#descr").val($(".inline-editor").html());
  }
  setInterval(function(){
show();
 $('.readonly').attr('readonly', true);
}, 500);
             });

           </script> 
  <script type="text/javascript">
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
                @endsection