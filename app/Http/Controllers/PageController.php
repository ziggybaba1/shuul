<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
	 /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
   public function admin(Request $request)
   {if($request->page==1){if(\Auth::user()->role=='admin'||\Auth::user()->role=='teacher'||\Auth::user()->role=='hrm'||\Auth::user()->role=='account'||\Auth::user()->role=='library'||\Auth::user()->role=='medical'||\Auth::user()->role=='staff'){
   return view('admin.dashboard');}elseif(\Auth::user()->role=='teacher'){
   return view('staff.dashboard');}
   elseif(\Auth::user()->role=='student'){
   return view('student.dashboard');}
   elseif(\Auth::user()->role=='parent'){
   return view('parent.dashboard');}}
if(\Auth::user()->role=='admin'||\Auth::user()->role=='teacher'||\Auth::user()->role=='teacher'||\Auth::user()->role=='hrm'||\Auth::user()->role=='account'||\Auth::user()->role=='library'||\Auth::user()->role=='medical'||\Auth::user()->role=='staff'){
  if($request->page==2){return view('admin.class.addclass');}
  elseif($request->page==3){return view('admin.class.classlist');}
 elseif($request->page==4){return view('admin.class.classpromotion');}
 elseif($request->page==5){return view('admin.subject.subjecttype');}
  elseif($request->page==6){return view('admin.subject.subjectlist');}
 elseif($request->page==7){return view('admin.subject.assignsubject');}
 elseif($request->page==8){return view('admin.timetable.addtimetable');}
 elseif($request->page==9){return view('admin.project.listgrade');}
 elseif($request->page==10){return view('admin.testgrade.listtestgrade');}
 elseif($request->page==11){return view('admin.examgrade.listexamgrade');}
 elseif($request->page==12){
if(\App\Support::first()->res=='1'){
  return view('admin.result.personality');}else{redirect('/home');}
}
 elseif($request->page==13){return view('admin.result.class');}
 elseif($request->page==14){
  if(\App\Support::first()->etest=='1'){
  return view('admin.test.createtest');}else{redirect('/home');}
}
 elseif($request->page==15){
 if(\App\Support::first()->etest=='1'){
  return view('admin.test.eresults');}else{redirect('/home');}
}
 elseif($request->page==16){return view('admin.student.studentcreate');}
 elseif($request->page==17){return view('admin.student.studentinformation');}
 elseif($request->page==18){
if(\App\Support::first()->att=='1'){
  return view('admin.attendance.take_attendance');}else{redirect('/home');}
}
 elseif($request->page==19){
if(\App\Support::first()->att=='1'){
  return view('admin.attendance.overview');}else{redirect('/home');}
}
 elseif($request->page==20){return view('admin.graduate.record');}
 elseif($request->page==21){return view('admin.graduate.book');}
 elseif($request->page==22){return view('admin.parent.parent');}
 elseif($request->page==23){return view('admin.parent.guardian');}
 elseif($request->page==24){
if(\App\Support::first()->pick=='1'){
  return view('admin.parent.pickup');}else{redirect('/home');}
}
 elseif($request->page==25){$student=\App\Student::simplePaginate(10);
    return view('admin.award.student',compact('student'));}
    elseif($request->page==26){
if(\App\Support::first()->lib=='1'){
      return view('admin.resource.ebook');}else{redirect('/home');}
    }
elseif($request->page==27){
if(\App\Support::first()->lib=='1'){
  return view('admin.resource.inventory');}else{redirect('/home');}
}
elseif($request->page==28){return view('admin.course.category');}
elseif($request->page==29){return view('admin.course.course');}
elseif($request->page==30){return view('admin.course.enroll');}
elseif($request->page==32){return view('admin.course.plan');}
elseif($request->page==31){return view('admin.course.instructor');}
elseif($request->page==33){return view('admin.hrm.department');}
elseif($request->page==34){return view('admin.hrm.employee');}
elseif($request->page==35){
if(\App\Support::first()->att=='1'){
  return view('admin.hrm.attendance');}else{redirect('/home');}
}
elseif($request->page==36){
if(\App\Support::first()->hrm=='1'){
  return view('admin.hrm.leave');}else{redirect('/home');}
}
elseif($request->page==37){ $employee=\App\Teacher::simplePaginate(10); return view('admin.award.employee',compact('employee'));}
elseif($request->page==38){return view('admin.account.title');}
elseif($request->page==39){return view('admin.account.generate');}
elseif($request->page==40){return view('admin.account.studpay');}
elseif($request->page==41){return view('admin.account.staffpay');}
elseif($request->page==42){
if(\App\Support::first()->event=='1'){
  return view('admin.event.newevent');}else{redirect('/home');}
}
elseif($request->page==43){
if(\App\Support::first()->hrm=='1'){
  return view('admin.event.calendar');}else{redirect('/home');}
}
elseif($request->page==45){ $id=\Carbon\Carbon::today()->subYear(0)->format('Y');
    $idd=\Carbon\Carbon::today()->subYear(-1)->format('Y');
    $gallerys=\App\Gallery::where('session',$id.'/'.$idd)->simplePaginate(16);
    return view('admin.event.gallery',compact('id','idd','gallerys'));}
    elseif($request->page==59){
if(\App\Support::first()->front=='1'){
      return view('admin.setting.frontend');}else{redirect('/home');}
    }
    elseif($request->page==46){ if(\App\Provider::first()->result_type=='0'){return view('admin.result.settings');}elseif(\App\Provider::first()->result_type=='1'){return view('admin.result.settings1');}}
    elseif($request->page==47){
if(\App\Support::first()->att=='1'){
      return view('admin.attendance.viewover');}else{redirect('/home');}
    }
    elseif($request->page==48){return view('admin.parent.overview');}
    elseif($request->page==49){return view('admin.resource.category');}
    elseif($request->page==50){return view('admin.setting.role');}
    elseif($request->page==51){return view('admin.fee.student');}
    elseif($request->page==52){return view('admin.fee.salary');}
    elseif($request->page==53){return view('admin.setting.general');}
    elseif($request->page==54){return view('admin.setting.profile');}
    elseif($request->page==55){
if(\App\Support::first()->syl=='1'){
      return view('admin.class.syllabus');}else{redirect('/home');}
    }
    elseif($request->page==56){
if(\App\Support::first()->less=='1'){
      return view('admin.class.lessonnote');}else{redirect('/home');}
    }
    elseif($request->page==57){return view('admin.setting.expense');}
    elseif($request->page==58){return view('admin.setting.notice');}
    elseif($request->page==62){
if(\App\Support::first()->forum=='1'){
      return view('admin.forum.thread');}else{redirect('/home');}
    }
    elseif($request->page==63){
if(\App\Support::first()->forum=='1'){
      return view('admin.forum.replies');}else{redirect('/home');}
    }
    elseif($request->page==64){
if(\App\Support::first()->book=='1'){
      return view('admin.store.sbook');}else{redirect('/home');}
    }
    elseif($request->page==65){
if(\App\Support::first()->book=='1'){
      return view('admin.store.paybook');}else{redirect('/home');}
    }
    elseif($request->page==66){return view('admin.message.inbox');}
    elseif($request->page==67){
if(\App\Support::first()->ann=='1'){
      return view('admin.message.announcement');}else{redirect('/home');}
    }
    elseif($request->page==69){return view('admin.message.contact');}
    elseif($request->page==70){
if(\App\Support::first()->forum=='1'){
      return view('admin.forum.forum');}else{redirect('/home');}
    }
    elseif($request->page==71){
if(\App\Support::first()->dorm=='1'){
      return view('admin.dorm.hostel');}else{redirect('/home');}
    }
    elseif($request->page==72){
if(\App\Support::first()->dorm=='1'){
      return view('admin.dorm.room');}else{redirect('/home');}
    }
    elseif($request->page==73){
if(\App\Support::first()->dorm=='1'){
      return view('admin.dorm.bed');}else{redirect('/home');}
    }
    elseif($request->page==74){
if(\App\Support::first()->clin=='1'){
      return view('admin.clinical.report');}else{redirect('/home');}
    }
    elseif($request->page==75){
if(\App\Support::first()->dorm=='1'){
      return view('admin.clinical.report_history');}else{redirect('/home');}
    }
    elseif($request->page==76){
if(\App\Support::first()->etest=='1'){
      return view('admin.cbt.etest');}else{redirect('/home');}
    }
    elseif($request->page==77){
if(\App\Support::first()->etest=='1'){
      return view('admin.cbt.test_history');}else{redirect('/home');}
    }
    elseif($request->page==78){
if(\App\Support::first()->etest=='1'){
      return view('admin.cbt.reset');}else{redirect('/home');}
    }
     elseif($request->page==79){
if(\App\Support::first()->book=='1'){
      return view('admin.account.bookpayment');}else{redirect('/home');}
    }
     elseif($request->page==80){
if(\App\Support::first()->ybook=='1'){
      return view('admin.account.ybpay');}else{redirect('/home');}
    }
    elseif($request->page==81){return view('admin.account.plan');}
     }
   else{
    return redirect('/home');
   }
   }
   public function student(Request $request)
   {
if(\Auth::user()->role=='student'){
if($request->page==2){
  if(\App\Support::first()->res=='1'){
  return view('student.result.result');}else{return redirect('/home');}
}
elseif($request->page==3){return view('student.result.routine');}
elseif($request->page==4){
  if(\App\Support::first()->syl=='1'){
  return view('student.result.syllabus');}else{return redirect('/home');}
}
elseif($request->page==5){
  if(\App\Support::first()->less=='1'){
  return view('student.result.lessonnote');}else{return redirect('/home');}
}
elseif($request->page==6){
  if(\App\Support::first()->att=='1'){
  return view('student.record.attendance');}else{return redirect('/home');}
}
elseif($request->page==7){
  if(\App\Support::first()->pick=='1'){
  return view('student.record.pickup');}else{return redirect('/home');}
}
elseif($request->page==8){
  if(\App\Support::first()->awa=='1'){
  return view('student.record.award');}else{return redirect('/home');}
}
elseif($request->page==9){
if(\App\Support::first()->lib=='1'){
  return view('student.record.orderlib');}else{return redirect('/home');}
}
elseif($request->page==10){
if(\App\Support::first()->book=='1'){
  return view('student.record.bookstore');}else{return redirect('/home');}
}
elseif($request->page==11){return view('student.record.invoice');}
elseif($request->page==12){
if(\App\Support::first()->book=='1'){
  return view('student.record.bookpay');}else{return redirect('/home');}
}
elseif($request->page==17){return view('student.record.notice');}
elseif($request->page==16){
  if(\App\Support::first()->event=='1'){
  return view('student.record.event');}else{return redirect('/home');}
}
elseif($request->page==18){return view('student.record.profile');}
elseif($request->page==15){
if(\App\Support::first()->forum=='1'){
  return view('student.record.forum');}else{return redirect('/home');}
}
elseif($request->page==13){return view('student.record.course');}
elseif($request->page==14){return view('student.record.ucourse');}
elseif($request->page==19){
if(\App\Support::first()->etest=='1'){
  return view('student.record.etest');}else{return redirect('/home');}
}
elseif($request->page==20){
if(\App\Support::first()->etest=='1'){
  return view('student.record.etest_history');}
}
elseif($request->page==21){return view('student.record.inbox');}
elseif($request->page==22){
   $id=\Carbon\Carbon::today()->subYear(0)->format('Y');
    $idd=\Carbon\Carbon::today()->subYear(-1)->format('Y');
    $gallerys=\App\Gallery::where('session',$id.'/'.$idd)->where('status','2')->simplePaginate(16);
    if(\App\Support::first()->gall=='1'){
  return view('student.record.gallery',compact('id','idd','gallerys'));}else{return redirect('/home');}
}
   }
   else{
    return redirect('/home');
   }
 }
    public function parent(Request $request)
   {
  if(\Auth::user()->role=='parent'){
if($request->page==1){return view('parent.dashboard');}
elseif($request->page==2){
if(\App\Support::first()->res=='1'){
  return view('parent.result.result');
}else{return redirect('/home');}
}
elseif($request->page==3){return view('parent.result.routine');}
elseif($request->page==6){
  if(\App\Support::first()->att=='1'){
  return view('parent.record.attendance');}else{return redirect('/home');}
}
elseif($request->page==7){
  if(\App\Support::first()->pick=='1'){
  return view('parent.record.pickup');}else{return redirect('/home');}
}
elseif($request->page==8){
if(\App\Support::first()->awa=='1'){
  return view('parent.record.award');}else{return redirect('/home');}
}
elseif($request->page==9){return view('parent.record.liborder');}
elseif($request->page==11){return view('parent.record.feepay');}
elseif($request->page==12){return view('parent.record.bookpay');}
elseif($request->page==16){
  if(\App\Support::first()->event=='1'){
  return view('parent.record.event');}else{return redirect('/home');}
}
elseif($request->page==17){
if(\App\Support::first()->forum=='1'){
  return view('parent.record.forum');}else{return redirect('/home');}
}
elseif($request->page==18){return view('parent.record.profile');}
elseif($request->page==19){return view('parent.record.inbox');}
elseif($request->page==20){
    $id=\Carbon\Carbon::today()->subYear(0)->format('Y');
    $idd=\Carbon\Carbon::today()->subYear(-1)->format('Y');
    $gallerys=\App\Gallery::where('session',$id.'/'.$idd)->where('status','2')->simplePaginate(16);
    if(\App\Support::first()->gall=='1'){
  return view('parent.record.gallery',compact('id','idd','gallerys'));}else{return redirect('/home');}
}
 }
   else{
    return redirect('/home');
   }
  }
   public function course(Request $request)
   {
    $id=$request->page;
    return view('student.record.show_course',compact('id'));
   }
}
