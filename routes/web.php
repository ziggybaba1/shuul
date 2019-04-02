<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    if(\App\Support::first()->front=='1') {
    return view('welcome');    
}else{
    return redirect('/home');
}
    
});
Route::get('/logout', function () {
    \Auth::logout();
    return redirect('/'); 
});
Route::get('/add/class', function () {
    return view('admin.class.addclass');
});
Route::get('/info/classlist', function () {
    return view('admin.class.classlist');
});
Route::get('/class/promote', function () {
    return view('admin.class.classpromotion');
});
Route::get('/add/subject', function () {
    return view('admin.subject.addsubject');
});
Route::get('/type/subject-type', function () {
    return view('admin.subject.subjecttype');
});
Route::get('/subject/list', function () {
    return view('admin.subject.subjectlist');
});
Route::get('/option-subject/assign', function () {
    return view('admin.subject.assignsubject');
});

Route::get('/new/student', function () {
    return view('admin.student.studentcreate');
});
Route::get('/download/message/{id}', function ($id) {
$path= Storage::disk('local')->getDriver()->getAdapter()->applyPathPrefix($id); 
return response()->download($path); 
});
Route::get('/deleten/mailbox/{id}', function ($id) {
$path= \App\Messaging::find($id);
$path->delete();
return redirect('/show/inbox'); 
});
Route::get('/restore/mailbox/{id}', function ($id) {
\App\Messaging::withTrashed()->find($id)->restore();
return redirect('/show/trash'); 
});
Route::get('/admin/open-break/session', function () {
    return view('admin.session.open_break');
});
Route::get('/student/information', function () {
    return view('admin.student.studentinformation');
});
Route::get('/set/timetable', function () {
    return view('admin.timetable.addtimetable');
});
Route::get('/get/plan/status/{id}/{index}', function ($id,$index) {
    $plan=\App\Planlist::where('plan_id',$id)->first();
    if($index==1){return array('percent'=>$plan->percent,'com'=>$plan->commision== null ? 0:$plan->commision ,'date'=>\Carbon\Carbon::now()->addDays($plan->nday)->format('Y-m-d'));}
});
Route::get('/create/teacher', function () {
    return view('admin.teacher.teachercreate');
});
Route::get('/list/teacher', function () {
    return view('admin.teacher.teacher');
});
Route::get('/edit/teacher/info/{id}', function ($id) {
    return view('admin.teacher.edit_teacher',compact('id'));
});
Route::get('/analysis/payment/{id}', function ($id) {
    return view('admin.account.analyse',compact('id'));
});
Route::get('/etest/generate/score/{id}', function ($id) {
    return view('student.record.etest_gen',compact('id'));
});
Route::get('/create/online-test', function () {
    return view('admin.test.createtest');
});
Route::get('/view/partial/yearbook', function () {
     $yearbooks=\App\Yearbook::latest()->paginate(1);
    return view('frontend.list.ybooklist',compact('yearbooks'));
});
Route::get('/show/all-questions', function () {
    return view('admin.test.allquestions');
});
Route::get('/asign/questions', function () {
    return view('admin.test.assignquestion');
});
Route::get('/asign/test/question', function () {
    return view('admin.test.createassign');
});
Route::get('/resend/link/{id}', function ($id) {
$email=\App\Ypayment::find($id)->pay_email;$title='Yearbook Download Link';$token=\App\Ypayment::find($id)->token;
     $data = [
           'title' => 'Yearbook Download Link',
           'message' => url('').'/yearbook/download/'.$token,
                ];  
  try {
    \Mail::send('email.yearbook',["data1"=>$data] , function($messager) use ($email,$title){
$messager->to($email, ''.\App\Provider::first()->name)
        ->subject($title);
   });
    $messagn=\App\Ypayment::find($id);
      $messagn->status='1';
      $messagn->created_at=\Carbon\Carbon::today();
    $messagn->save();
return '1';
     } catch (\Exception $ex) {
      $messagn=\App\Ypayment::find($id);
      $messagn->created_at=\Carbon\Carbon::today();
      $messagn->status='2';
    $messagn->save();
      return '2';
}
});
Route::get('/give/book/payment/{id}', function ($id) {
    return view('admin.store.givebook',compact('id'));
});
Route::get('/add/hostel/bed/{id}', function ($id) {
    return view('admin.dorm.addbed',compact('id'));
});
Route::get('/edit/show/bed/{id}', function ($id) {
    return view('admin.dorm.editbed',compact('id'));
});
Route::get('/asign/show_short', function () {
    return view('admin.test.assign');
});
Route::get('/list/e-test', function () {
    return view('admin.test.eresults');
});
Route::get('/admin/new/notice', function () {
    return view('admin.setting.noticeadd');
});
Route::get('/add/test-grade', function () {
    return view('admin.testgrade.addgrade');
});
Route::get('/add/project-grade', function () {
    return view('admin.project.addgrade');
});
Route::get('/list/project-grade', function () {
    return view('admin.project.listgrade');
});

Route::get('/add/exam-grade', function () {
    return view('admin.examgrade.addgrade');
});
Route::get('/list/test-grade', function () {
    return view('admin.testgrade.listtestgrade');
});
Route::get('/list/exam-grade', function () {
    return view('admin.examgrade.listexamgrade');
});
Route::get('/design/report-sheet', function () {
    return view('admin.result.design');
});
Route::get('/show/batches', function () {
    return view('admin.test.showbatch');
});
Route::get('/staff/etest/branch', function () {
    return view('admin.test.tcreatebatch');
});
Route::get('/admin/class/attendance', function () {
    return view('admin.attendance.take_attendance');
});
Route::get('/admin/attendance/overview', function () {
    return view('admin.attendance.overview');
});
Route::get('/admin/class/result', function () {
    return view('admin.result.class');
});
Route::get('/admin/add/behavioural', function () {
    return view('admin.result.personality');
});
Route::get('/admin/show/behavioural', function () {
    return view('admin.result.behave');
});
Route::get('/admin/start/session', function () {
    return view('admin.session.start');
});
Route::get('/admin/break/session', function () {
    return view('admin.session.break');
});
Route::get('/admin/close/session', function () {
    return view('admin.session.close');
});
Route::get('/yearbook/download/{tok}', function ($tok) {
    if(count(\App\Ypayment::where('token',$tok)->get())>0){
if(\Carbon\Carbon::parse(\App\Ypayment::where('token',$tok)->first()->created_at)->addDay(1)>=\Carbon\Carbon::today()){
     $path= \Storage::disk('local')->getDriver()->getAdapter()->applyPathPrefix(\App\Yearbook::find(\App\Ypayment::where('token',$tok)->first()->item)->file);      
   return response()->download($path); 
}
   else{
    return 'Token Expired';
   }     
    }
   else{
    return 'Token Access not recognised';
   }
});
Route::get('/admin/general/settings.ftm', function () {
    return view('admin.setting.general');
});
Route::get('/admin/departments', function () {
    return view('admin.hrm.department');
});

Route::get('/add/department', function () {
    return view('admin.hrm.adddept');
});
Route::get('/admin/employee', function () {
    return view('admin.hrm.employee');
});

Route::get('/admin/view/calendar', function () {
    return view('admin.event.calendar');
});
Route::get('/admin/event/gallery', function () {
    $id=\Carbon\Carbon::today()->subYear(0)->format('Y');
    $idd=\Carbon\Carbon::today()->subYear(-1)->format('Y');
    $gallerys=\App\Gallery::where('session',$id.'/'.$idd)->simplePaginate(16);
    return view('admin.event.gallery',compact('id','idd','gallerys'));
});
Route::get('/get/gallery/image/{id}', function ($id) {
    $gallerys=\App\Gallery::where('category',$id)->where('status','2')->simplePaginate(10);
    return view('frontend.glist',compact('gallerys'));
});
Route::get('/admin/set/events', function () {
    return view('admin.event.newevent');
});

Route::get('/add/employee', function () {
    return view('admin.hrm.addemployee');
});

Route::get('/add/event/gallery', function () {
    return view('admin.event.addgallery');
});
Route::get('/add/leave', function () {
    return view('admin.hrm.addleave');
});
Route::get('/add/new_event', function () {
    return view('admin.event.addevent');
});
Route::get('/get/amount/{id}', function ($id) {
  return \App\Bookassign::find($id)->price;
});
Route::get('/new/category/event', function () {
    return view('admin.event.category');
});
Route::get('/admin/employee/attendance', function () {
    return view('admin.hrm.attendance');
});
Route::get('/admin/student/fee', function () {
    return view('admin.fee.student');
});
Route::get('/add/etest/branch', function () {
    return view('admin.test.createbatch');
});
Route::get('/admin/graduate/record', function () {
    return view('admin.graduate.record');
});
Route::get('/admin/graduate/year_book', function () {
    return view('admin.graduate.book');
});
Route::get('/add/yearbook/page', function () {
    return view('admin.graduate.addpage');
});
Route::get('/new/thread/page/{id}', function ($id) {
    return view('admin.forum.addthread',compact('id'));
});
Route::get('/new/forum/page', function () {
    return view('admin.forum.addforum');
});
Route::get('/admin/student/award', function () {
    $student=\App\Student::simplePaginate(10);
    return view('admin.award.student',compact('student'));
});
Route::get('/add/student_award', function () {
    return view('admin.award.saward');
});
Route::get('/add/new_graduate', function () {
    return view('admin.graduate.newgrad');
});
Route::get('/admin/school/result/{id}', function ($id) {
    return view('admin.graduate.result',compact('id'));
});
Route::get('/show/announce/resent/{id}', function ($id) {
    return view('admin.message.announce_resend',compact('id'));
});
Route::get('/accept/payment/{id}', function ($id) {
    return view('admin.account.paynow',compact('id'));
});
Route::get('/assign/role/{id}', function ($id) {
    return view('admin.setting.staffrole',compact('id'));
});
Route::get('/generate/invoice/{id}', function ($id) {
    return view('admin.account.geninvoice',compact('id'));
});
Route::get('/edit/borrow/batch/{id}', function ($id) {
    return view('admin.resource.editborrow',compact('id'));
});
Route::get('/edit/pages/{id}', function ($id) {
    return view('admin.setting.editpage',compact('id'));
});
Route::get('/edit/ebook/file/{id}', function ($id) {
    return view('admin.resource.editebook',compact('id'));
});
Route::get('/admin/add/lesson-note/{id}', function ($id) {
    return view('admin.class.editlesson',compact('id'));
});
Route::get('/admin/edit/class/{id}', function ($id) {
    return view('admin.class.editclass',compact('id'));
});
Route::get('/edit/student/profile/{id}', function ($id) {
    return view('admin.student.editstudent',compact('id'));
});

Route::get('/edit/parent/profile/{id}', function ($id) {
    return view('admin.parent.editparent',compact('id'));
});
Route::get('/edit/hostel/info/{id}', function ($id) {
    return view('admin.dorm.edithostel',compact('id'));
});
Route::get('/edit/guardian/profile/{id}', function ($id) {
    return view('admin.parent.editguardian',compact('id'));
});
Route::get('/manage/subscription/course/{id}', function ($id) {
    return view('admin.course.activatesub',compact('id'));
});
Route::get('/edit/behaviour/{id}', function ($id) {
    return view('admin.result.editbehave',compact('id'));
});
Route::get('/admin/generate/certificate/{id}', function ($id) {
    return view('admin.graduate.certificate',compact('id'));
});
Route::get('/manage/course/category/{id}', function ($id) {
    return view('admin.course.subcategory',compact('id'));
});
Route::get('/manage/section/course/{id}', function ($id) {
    return view('admin.course.section',compact('id'));
});
Route::get('/add/employee_award', function () {
    return view('admin.award.eaward');
});
Route::get('/check/mail', function () {
    return view('email.contact');
});
Route::get('/admin/employee/award', function () {
    $employee=\App\Teacher::simplePaginate(10);
    return view('admin.award.employee',compact('employee'));
});
Route::get('/show/award/{id}', function ($id) {
    return view('admin.award.detail',compact('id'));
});
Route::get('/add/expense/type', function () {
    return view('admin.setting.expensetype');
});
Route::get('/manage/enroll/student/{id}', function ($id) {
    return view('admin.course.editenroll',compact('id'));
});
Route::get('/make/staff/payment/{id}', function ($id) {
    return view('admin.account.addpay',compact('id'));
});
Route::get('/admin/show/syllabus/{id}', function ($id) {
    return view('admin.class.editsyllabus',compact('id'));
});
Route::get('/show/staff/payment/{id}', function ($id) {
    return view('admin.account.showpay',compact('id'));
});
Route::get('/view/invoice/payment/{id}', function ($id) {
    return view('admin.account.showinvoice',compact('id'));
});
Route::get('/view/book/payment/{id}', function ($id) {
    return view('admin.account.book_receipt',compact('id'));
});
Route::get('/view/fee/payment/{id}', function ($id) {
    return view('admin.account.fee_receipt',compact('id'));
});
Route::get('/accept/fee/payment/{id}', function ($id) {
    return view('admin.account.fee_pay',compact('id'));
});
Route::get('/verify/fee/payment/{id}', function ($id) {
    return view('admin.account.fee_verify',compact('id'));
});
Route::get('/reset/fee/payment/{id}', function ($id) {
if(count(\App\Feepay::where('pay_id',$id)->where('status','1')->get())>0){
    return '0';
}
elseif(count(\App\Feepay::where('pay_id',$id)->where('status','1')->get())==0){
    \App\Fpayment::find($id)->delete;
    \App\Feepay::where('pay_id',$id)->delete();
    return '1';
    }
});
Route::get('/show/eaward/{id}', function ($id) {
    return view('admin.award.edetail',compact('id'));
});
Route::get('/admin/employer/salary', function () {
    return view('admin.fee.salary');
});
Route::get('/student/show/wepay_iframe', function () {
    return view('student.record.wepay_iframe');
});
Route::get('/addn/event/category', function () {
    return view('admin.event.gcategory');
});
Route::get('/admin/employee/leave', function () {
    return view('admin.hrm.leave');
});
Route::get('/show/compose', function () {
    return view('admin.message.compose');
});
Route::get('/show/inbox', function () {
    return view('admin.message.mail');
});
Route::get('/show/starred', function () {
    return view('admin.message.starred');
});
Route::get('/show/draft', function () {
    return view('admin.message.draft');
});
Route::get('/show/sent', function () {
    return view('admin.message.sent');
});
Route::get('/show/trash', function () {
    return view('admin.message.trash');
});
Route::get('/admin/new/expenses', function () {
    return view('admin.setting.addexpense');
});
Route::get('/edit/department/{id}', function ($id) {
    return view('admin.hrm.editdept',compact('id'));
});
Route::get('/add/bed/hostel/{id}', function ($id) {
    return view('admin.dorm.addroom',compact('id'));
});
Route::get('/admin/download/syllabus/{id}', function ($id) {
    return view('admin.class.downsyllable',compact('id'));
});
Route::get('/manage/lesson/course/{id}', function ($id) {
    return view('admin.course.editlesson',compact('id'));
});
Route::get('/view/active/student/{id}', function ($id) {
    return view('admin.course.activestud',compact('id'));
});
Route::get('/view/complete/student/{id}', function ($id) {
    return view('admin.course.completestud',compact('id'));
});

Route::get('/add/contact/reply/{id}', function ($id) {
    return view('admin.message.reply',compact('id'));
});
Route::get('/student/pickup/{id}', function ($id) {
    return view('admin.parent.studentpick',compact('id'));
});
Route::get('/edit/notice/old/{id}', function ($id) {
    return view('admin.setting.editnotice',compact('id'));
});
Route::get('/admin/print/lesson-note/{id}', function ($id) {
    return view('admin.class.printlesson',compact('id'));
});
Route::get('/edit/batch/{id}', function ($id) {
    return view('admin.test.editbatch',compact('id'));
});
Route::get('/edit/sbatch/{id}', function ($id) {
    return view('admin.test.seditbatch',compact('id'));
});
Route::get('/view/instructor/course/{id}', function ($id) {
    return view('admin.course.board',compact('id'));
});
Route::get('/admin/edit_Subject/{id}', function ($id) {
    return view('admin.subject.editsubject',compact('id'));
});
Route::get('/edit/course/category/{id}', function ($id) {
    return view('admin.course.editcategory',compact('id'));
});
Route::get('/add/fee/class/{id}', function ($id) {
    return view('admin.fee.setfee',compact('id'));
});
Route::get('/edit/subject/type/{id}', function ($id) {
    return view('admin.subject.edittype',compact('id'));
});
Route::get('/edit/slide/gallery/{id}', function ($id) {
    return view('admin.setting.editslide',compact('id'));
});
Route::get('/edit/inventory/file/{id}', function ($id) {
    return view('admin.resource.editinventory',compact('id'));
});
Route::get('/add/salary/class/{id}', function ($id) {
    return view('admin.fee.setsalary',compact('id'));
});
Route::get('/show/event/detail/{id}', function ($id) {
    return view('admin.event.event_detail',compact('id'));
});
Route::get('/edit/announce/message/{id}', function ($id) {
    return view('admin.message.edit_announce',compact('id'));
});
Route::get('/create/event/category/{id}', function ($id) {
    return view('admin.event.addcategory',compact('id'));
});
Route::get('/edit/show/forum/{id}', function ($id) {
    return view('admin.forum.editforum',compact('id'));
});
Route::get('/approve/employee/leave/{id}', function ($id) {
    return view('admin.hrm.approve_leave',compact('id'));
});
Route::get('/edit/front/gallery/{id}', function ($id) {
    return view('admin.front.editslide',compact('id'));
});
Route::get('/mark/course/pending/{id}', function ($id) {
    return view('admin.course.markpending',compact('id'));
});
Route::get('/mark/course/active/{id}', function ($id) {
    return view('admin.course.markactive',compact('id'));
});
Route::get('/get/amount/fee/{id}', function ($id) {
    $fee=\App\Fee::find($id)->price;
    return $fee;
});
Route::get('/show/topic/content/{id}', function (Request $request,$id) {
    $replies=\App\Reply::where('thread_id',$id)->latest()->simplePaginate(40);
    return view('admin.forum.topic_message',compact('id','replies'));
});
Route::get('/editn/about/feature/{id}', function ($id) {
    return view('admin.front.editfeat',compact('id'));
});
Route::get('/forum/active/users/{id}', function ($id) {
    return view('admin.forum.member',compact('id'));
});
Route::get('/edit/feature/home/{id}', function ($id) {
    return view('admin.front.editfeature',compact('id'));
});
Route::get('/edit/real/course/{id}', function ($id) {
    return view('admin.course.editcourse',compact('id'));
});
Route::get('/sort/gallery/{id}/{idd}/{cat}', function ($id,$idd,$cat) {
    if($cat==='all'){
       $gallerys=\App\Gallery::where('session',$id.'/'.$idd)->simplePaginate(16);  
    }
   else{
     $gallerys=\App\Gallery::where('session',$id.'/'.$idd)->where('category',$cat)->simplePaginate(16);
   }
    return view('admin.event.show_gallery',compact('id','idd','gallerys','cat'));
});
Route::get('/ssort/gallery/{id}/{idd}/{cat}', function ($id,$idd,$cat) {
    if($cat==='all'){
       $gallerys=\App\Gallery::where('session',$id.'/'.$idd)->where('status','2')->simplePaginate(16);  
    }
   else{
     $gallerys=\App\Gallery::where('session',$id.'/'.$idd)->where('category',$cat)->where('status','2')->simplePaginate(16);
   }
    return view('student.record.show_gallery',compact('id','idd','gallerys','cat'));
});
Route::get('/take/employee/attendance/{id}', function ($id) {
    return view('admin.hrm.take_attendance',compact('id'));
});
Route::get('/add/image/gallery', function () {
    return view('admin.setting.addabout');
});
Route::get('/edit/employee/{id}', function ($id) {
    return view('admin.hrm.editemployee',compact('id'));
});
Route::get('/allocate/hostel/bed/{id}', function ($id) {
    return view('admin.dorm.allocate_bed',compact('id'));
});
Route::get('/edit/school/account/{id}', function ($id) {
    return view('admin.account.edittitle',compact('id'));
});
Route::get('/edit/event/{id}', function ($id) {
    return view('admin.event.editevent',compact('id'));
});
Route::get('/edit/testimony/home/{id}', function ($id) {
    return view('admin.setting.edittestimony',compact('id'));
});
Route::get('/show/last/report/{id}', function ($id) {
    return view('admin.clinical.show_report',compact('id'));
});
Route::get('/content/inbox/{id}', function ($id) {
    $message=\App\Messaging::find($id);
    $message->status='1';
    $message->save();
    return view('admin.message.show_message',compact('id'));
});
Route::get('/admin/make/payment/{id}', function ($id) {
    return view('student.record.showpay',compact('id'));
});
Route::get('/edit/expense/old/{id}', function ($id) {
    return view('admin.setting.editexpense',compact('id'));
});
Route::get('/add/slide/gallery', function () {
    return view('admin.setting.addslide');
});
Route::get('/admin/add/subject/{id}', function ($id) {
    return view('admin.subject.addsubject',compact('id'));
});
Route::get('/add/student/user/{id}', function ($id) {
    return view('admin.test.stud_mem',compact('id'));
});
Route::get('/add/staff/user/{id}', function ($id) {
    return view('admin.test.staff_mem',compact('id'));
});
Route::get('/accept/bookpayment/{id}', function ($id) {
    return view('admin.account.addbook',compact('id'));
});
Route::get('/list/student/payment/{id}', function ($id) {
    return view('admin.account.listpayment',compact('id'));
});
Route::get('/admin/assign/book/{id}', function ($id) {
    return view('admin.store.addbook',compact('id'));
});
Route::get('/edit/old/thread/{id}', function ($id) {
    return view('admin.forum.editthread',compact('id'));
});
Route::get('/show/test_questions/{id}', function ($id) {
    return view('admin.test.testquiz',compact('id'));
});
Route::get('/show/result/{id}', function ($id) {
    return view('admin.result.showresult',compact('id'));
});

Route::get('/admin/external/result/{id}', function ($id) {
    return view('admin.graduate.external',compact('id'));
});
Route::get('/edit/room/hostel/{id}', function ($id) {
    return view('admin.dorm.editroom',compact('id'));
});
Route::get('/admin/edit/yearbook/{id}', function ($id) {
    return view('admin.graduate.edityearbook',compact('id'));
});
Route::get('/show/additional/{id}/{ide}', function ($id,$ide) {
    if($ide=='1'){
return view('admin.res.personality',compact('id'));
    }
    if($ide=='2'){
return view('admin.res.physical',compact('id'));
    }
     if($ide=='3'){
return view('admin.res.grade',compact('id'));
    }
     if($ide=='4'){
return view('admin.res.comment',compact('id'));
    }
     if($ide=='5'){
return view('admin.res.result',compact('id'));
    }
});

Route::get('/get_student/data/{ide}/{id}', function ($ide,$id) {
    if($ide=='1'){
 return view('parent.data.result',compact('id'));
    }
     if($ide=='2'){
 return view('parent.data.routine',compact('id'));
    }
     if($ide=='3'){
 return view('parent.data.attendance',compact('id'));
    }
     if($ide=='4'){
 return view('parent.data.pickup',compact('id'));
    }
    if($ide=='5'){
 return view('parent.data.award',compact('id'));
    }
    if($ide=='6'){
    if($id!=''){
 return view('parent.data.feepay',compact('id'));
    }
    }
    if($ide=='7'){
 return view('parent.data.bookpay',compact('id'));
    }
    if($ide=='8'){
 return view('parent.data.liborder',compact('id'));
    }
});
Route::get('/get_student/class/{ide}/{id}', function ($ide,$id) {
	if($ide=='1'){
 return view('admin.student.studentinfo',compact('id'));
	}
	if($ide=='2'){
 return view('admin.timetable.showtimetable',compact('id'));
	}
	if($ide=='3'){
 return view('admin.timetable.timetable',compact('id'));
	}
    if($ide=='4'){
 return view('admin.attendance.attendance',compact('id'));
    }
    if($ide=='5'){
 return view('admin.attendance.show_over',compact('id'));
    }
    if($ide=='6'){
 return view('admin.result.allclass',compact('id'));
    }
    if($ide=='7'){
 return view('admin.parent.class',compact('id'));
    }
    if($ide=='8'){
 return view('admin.account.class',compact('id'));
    }
    if($ide=='9'){
 return view('admin.result.tend',compact('id'));
    }
    if($ide=='10'){
 return view('admin.class.classyll',compact('id'));
    }
    if($ide=='11'){
 return view('admin.class.lessonll',compact('id'));
    }
    if($ide=='12'){
 return view('admin.account.bookpay',compact('id'));
    }
});
//Teachers Route
Route::get('/staff/test-grade', function () {
    return view('staff.test.addgrade');
});

Route::get('/show/demo/design', function () {
     $content=\App\Autosave::first();
    $content->status='0';
    $content->save();
    return view('pages.design');
});
Route::post('/ybwepayurl/url', 'YbpaymentController@wepayurl')->name('ybwepay.submit');
Route::post('/ybpaystack/pay', 'YbpaymentController@paystackpay')->name('ybpay.submit');
Route::post('/ybstripe/pay', 'YbpaymentController@stripepay')->name('ybcard.submit');
Route::post('/ybpaypal/pay', 'YbpaymentController@paypalpay')->name('ybpal.submit');
Route::post('/ybwepay/pay', 'YbpaymentController@wepay');


Route::post('/wepayurl/url', 'PaymentController@wepayurl')->name('wepayn.submit');
Route::post('/paystack/pay', 'PaymentController@paystackpay')->name('pay.submit');
Route::post('/stripe/pay', 'PaymentController@stripepay')->name('card.submit');
Route::post('/paypal/pay', 'PaymentController@paypalpay')->name('pal.submit');
Route::post('/wepay/pay', 'PaymentController@wepay');

Route::get('/fpayment/redirect/{idd}', 'FpaymentController@wepay_confirm');
Route::post('/initiate/payment/plan', 'FpaymentController@initiate');
Route::post('/pinitiate/payment/plan/{id}', 'FpaymentController@pinitiate');
Route::post('/fwepayurl/url', 'FpaymentController@wepayurl')->name('fwepay.submit');
Route::post('/fpaystack/pay', 'FpaymentController@paystackpay')->name('fpay.submit');
Route::post('/fstripe/pay', 'FpaymentController@stripepay')->name('fcard.submit');
Route::post('/fpaypal/pay', 'FpaymentController@paypalpay')->name('fpal.submit');
Route::post('/ftransfer/pay', 'FpaymentController@transferpay')->name('ftransfer.submit');
Route::post('/fwepay/pay', 'FpaymentController@wepay');

//Parent Fee Pay Controller
Route::post('/pwepayurl/url', 'PFpaymentController@wepayurl')->name('pfwepay.submit');
Route::post('/pfpaystack/pay', 'PFpaymentController@paystackpay')->name('pfpay.submit');
Route::post('/pfstripe/pay', 'PFpaymentController@stripepay')->name('pfcard.submit');
Route::post('/pfpaypal/pay', 'PFpaymentController@paypalpay')->name('pfpal.submit');
Route::post('/pfwepay/pay', 'PFpaymentController@wepay');
//Parent Book Pay Controller
Route::post('/powepayurl/url', 'PpaymentController@wepayurl')->name('pwepay.submit');
Route::post('/popaystack/pay', 'PpaymentController@paystackpay')->name('ppay.submit');
Route::post('/postripe/pay', 'PpaymentController@stripepay')->name('pcard.submit');
Route::post('/popaypal/pay', 'PpaymentController@paypalpay')->name('ppal.submit');
Route::post('/powepay/pay', 'PpaymentController@wepay');

Route::get('/ppayment/redirect', 'PPaymentController@wepay_confirm');
Route::get('/payment/redirect', 'PaymentController@wepay_confirm');
Route::get('/ybpayment/redirect/{token}/{email}', 'YbpaymentController@wepay_confirm');
Route::get('/payp/test', 'PaymentController@pay_test');
Route::get('/payment/callback', 'PaymentController@handleGatewayCallback');
Route::get('/staff/class-testgrade', function () {
    return view('staff.test.listtestgrade');
});
Route::get('/staff/exam-grade', function () {
    return view('staff.exam.addgrade');
});
Route::get('/staff/class-examgrade', function () {
    return view('staff.exam.examgrade');
});
Route::get('/staff/assignment-grade', function () {
    return view('staff.assignment.addgrade');
});
Route::get('/staff/class-assignmentgrade', function () {
    return view('staff.assignment.assignmentgrade');
});
Route::get('/daily/attendance', function () {
    return view('staff.attendance.daily');
});
Route::get('/overview/attendance', function () {
    return view('staff.attendance.overview');
});
Route::get('/grade/assign', function () {
    return view('staff.assign.subject');
});
Route::get('/add/test/question/{id}', function ($id) {
    return view('admin.test.addquestion',compact('id'));
});
Route::get('/add/feature/{id}', function ($id) {
   $feat=\App\Teacher::find($id);
   $feat->feat='1';
   $feat->save();
   return '0';
});
Route::get('/remove/feature/{id}', function ($id) {
   $feat=\App\Teacher::find($id);
   $feat->feat='0';
   $feat->save();
   return '0';
});
Route::get('/add/forum/user/{id}', function ($id) {
    return view('admin.forum.edituser',compact('id'));
});
Route::get('/view/test/question/{id}', function ($id) {
    return view('admin.test.viewquestion',compact('id'));
});
Route::get('/edit/fee/plan/{id}', function ($id) {
    return view('admin.account.editplan',compact('id'));
});


Auth::routes();
Route::get('jquery-loadmore',['as'=>'jquery-loadmore','uses'=>'FileController@loadMore']);
Route::get('/admin/page.fmp', 'PageController@admin');
Route::get('/student/page.fmp', 'PageController@student');
Route::get('/parent/page.fmp', 'PageController@parent');
Route::get('/course/view/page.fmp', 'PageController@course');
Route::get('/add/batch_questions', 'HomeController@apiquestion');
Route::get('/view/batch_results', 'HomeController@apiresults');
Route::get('/test/about', 'HomeController@category');
Route::get('/run/about', 'HomeController@runcat');

Route::get('/check/class-examgrade', 'HomeController@apiegrade');
Route::get('/check/class-assignmentgrade', 'HomeController@apiagrade');
Route::get('/api/get_student', 'HomeController@apistudent');
Route::get('/api/get_report', 'HomeController@apireport');
Route::get('/api/get_studentn', 'HomeController@apistudentn');
Route::get('/api/get_studentsub', 'HomeController@apistudentsub');
Route::get('/api/make_student', 'HomeController@apistudentmake');

Route::get('/api/get-state-list','HomeController@getStateList');
Route::get('/get/attendance','HomeController@get_attendance');
Route::get('/get/pickup','HomeController@get_pickup');
Route::post('/save/content','HomeController@savechange');


Route::get('/student/{idd}/answer_questions', 'HomeController@take_question');
Route::get('/staff/{idd}/answer_questions', 'HomeController@stake_question');
Route::get('/check/class-grade', 'HomeController@apigrade');
Route::get('/api/get_batch', 'HomeController@apibatch');
Route::get('/download/cfile', 'HomeController@downcert');
Route::get('/download/file', 'HomeController@downresult');
Route::get('/admin/ybook/download', 'HomeController@downybook');
Route::get('/admin/ebook/download', 'HomeController@downebook');
Route::get('/manage/lesson/course', 'HomeController@lessonshow');
Route::get('/view/instructor/course', 'HomeController@instruct');
Route::get('/forum/topic', 'HomeController@show_topic');
Route::get('/sforum/topic', 'HomeController@stud_topic');
Route::get('/pforum/topic', 'HomeController@parent_topic');

Route::get('/view/list/thread', 'HomeController@list_thread');
Route::get('/view/page.fmp', 'FrontpageController@aboutpages');
Route::get('/course/page.fmp', 'FrontpageController@coursepages');
Route::get('/tab/page.fmp', 'FrontpageController@tabpages');
Route::get('/view/yearbook/sales', 'FrontpageController@yearbook');
Route::get('/view/school/gallery', 'FrontpageController@gallery');
Route::get('/view/school/notice', 'FrontpageController@notice');
Route::get('/view/school/event', 'FrontpageController@event');
Route::get('/view/school/teacher', 'FrontpageController@teacher');
Route::get('/view/school/about_us', 'FrontpageController@about');
Route::get('/view/school/admission', 'FrontpageController@admission');
Route::get('/view/school/contact', 'FrontpageController@contact');
Route::post('/send/contact/message', 'FrontpageController@contactus');
Route::post('/add/home/count', 'adminController@count_home');
Route::post('/add/support/setting', 'adminController@support_set');
Route::post('/set/plugin/config', 'adminController@plugin_set');



Route::get('/admin/list/payments', 'HomeController@payment');
Route::post('/add/paystack/setting', 'HomeController@paystack');
Route::post('/add/paypal/setting', 'HomeController@paypal');
Route::post('/add/stripe/setting', 'HomeController@stripe');
Route::post('/add/bulk_sms/setting', 'HomeController@bulk_sms');
Route::post('/add/multi_sms/setting', 'HomeController@multi_sms');
Route::post('/add/nexmo_sms/setting', 'HomeController@nexmo_sms');
Route::post('/practise/do-announce', 'HomeController@announce');
Route::get('/announce/resend/sms/{id}', 'HomeController@reannounce');
Route::get('/send/announce/message/{id}', 'HomeController@send_announce');
Route::post('/practise/edit-announce/{id}', 'HomeController@edit_announce');



Route::get('/admin/list/results', 'HomeController@resulte');
Route::get('/admin/generate/resulted', 'HomeController@generate');
Route::get('/student/checkout/{userid}/{studentid}/{type}', 'HomeController@studentcheck');



Route::get('/home', 'HomeController@index')->name('home');
Route::post('/create/class', 'adminController@create_class');
Route::post('/create/subject-type', 'adminController@subject_type');
Route::post('/create/subject/{id}', 'adminController@subject');
Route::post('/create/student', 'adminController@student_create');
Route::post('/add/new/parent', 'adminController@parent_create');
Route::post('/add/new/guardian', 'adminController@guardian_create');
Route::post('/add/new/ebook', 'adminController@ebook_create');
Route::post('/add/new/book', 'adminController@book_create');
Route::post('/fee/school/plan', 'adminController@fee_plan');

Route::post('/edit/student/{id}', 'adminController@student_edit');
Route::post('/edit/existing/parent/{id}', 'adminController@parent_edit');
Route::post('/edit/existing/guardian/{id}', 'adminController@guardian_edit');
Route::post('/suspend/guardian/{id}', 'adminController@guardian_edit');
Route::post('/receive/book/student/{id}', 'adminController@give_status');
Route::post('/submit/test/answer/{id}', 'adminController@etest_result');
Route::post('/submit/stest/answer/{id}', 'adminController@setest_result');
Route::get('/clockin/test/{id}', 'adminController@clock_test');
Route::get('/sclockin/test/{id}', 'adminController@sclock_test');
Route::post('/submitted/test/scores/{id}', 'adminController@test_gen');
Route::post('/edit/old/hostel/{id}', 'adminController@hostel_edit');
Route::post('/add/new/bed/{id}', 'adminController@bed_add');
Route::post('/edit/new/bed/{id}', 'adminController@bed_edit');
Route::post('/edit/new/room/{id}', 'adminController@edit_room');
Route::post('/add/bed/allocate/{id}', 'adminController@bed_allocate');
Route::post('/send/contact/reply/{id}', 'adminController@contact_reply');
Route::post('/add/fee/plan/{id}', 'adminController@edit_plan');
Route::post('/accept/remain/payment/{id}', 'adminController@remain_pay');
Route::post('/verify/remain/payment/{id}', 'adminController@verify_pay');









Route::post('/create/assign/book/{id}', 'adminController@assign_book');
Route::post('/search/invoice/{id}', 'adminController@search_invoice');
Route::post('/assign/subject', 'adminController@assign_subject');
Route::post('/create_new/teacher', 'adminController@new_teacher');
Route::post('/add/school/create', 'adminController@create_school');
Route::post('/add/school/account', 'adminController@account_school');
Route::post('/create/about/page', 'adminController@add_about');
Route::post('/create/gallery/image', 'adminController@add_frontgallery');
Route::post('/create/feature/image', 'adminController@add_fronture');
Route::post('/add/noticeboard/page', 'adminController@notice_page');
Route::post('/add/course/page', 'adminController@course_page');
Route::post('/add/gallery/page', 'adminController@gallery_page');
Route::post('/add/teacher/page', 'adminController@teacher_page');
Route::post('/add/testimony/page', 'adminController@testimony_page');
Route::post('/add/about/page', 'adminController@about_page');
Route::post('/add/about/feature', 'adminController@about_feature');
Route::post('/create/gallery/category', 'adminController@add_gcategory');
Route::post('/add/future/page', 'adminController@add_future');
Route::post('/create/testimony/request', 'adminController@add_testimony');
Route::post('/add/aboutheader/setting', 'adminController@add_abthead');
Route::post('/add/aboutfooter/setting', 'adminController@add_abtfoot');
Route::post('/add/theme/style', 'adminController@add_theme');
Route::post('/create/new/message', 'adminController@add_message');
Route::post('/add/new/hostel', 'adminController@add_hostel');
Route::post('/add/health/report', 'adminController@add_report');
Route::post('/edit/health/report/{id}', 'adminController@edit_report');








Route::post('/edit/testimony/request/{id}', 'adminController@edit_testimony');
Route::post('/edit/notice/board/{id}', 'adminController@edit_notice');
Route::post('/add/notice/board', 'adminController@add_notice');
Route::post('/add_ext/expense/type', 'adminController@add_expensetype');
Route::post('/add/staff/role/{id}', 'adminController@add_role');
Route::post('/edit/about/page/{id}', 'adminController@edit_about');
Route::post('/add/staff/payment/{id}', 'adminController@staff_pay');
Route::post('/receive/student/payment/{id}', 'adminController@accept_pay');
Route::post('/manage/generate/invoice/{id}', 'adminController@invoice_generate');
Route::post('/edit/create/account/{id}', 'adminController@edit_account');
Route::post('/edit_new/teacher/{id}', 'adminController@edit_teacher');
Route::post('/admin/edit/class/{id}', 'adminController@edit_class');
Route::post('/edit/subject-type/{id}', 'adminController@edit_type');





Route::post('/edit/feature/image/{id}', 'adminController@edit_feat');
Route::post('/edit/gallery/image/{id}', 'adminController@edit_sliden');
Route::post('/add/edit/thread/{id}', 'adminController@edit_thread');
Route::post('/edit/old/syllabus/{id}', 'adminController@edit_syllabus');
Route::post('/edit/old/lesson-note/{id}', 'adminController@edit_lessonnote');
Route::post('/add/new/syllabus/{id}', 'adminController@new_syllabus');
Route::post('/add/new/lesson-note/{id}', 'adminController@new_lesson');

Route::post('/timetable/new/create/{id}', 'adminController@new_timetable');
Route::post('/testhead/new/create', 'adminController@new_testhead');
Route::post('/testquestion/new/{id}', 'adminController@testquestion');
Route::post('/testhead/edit/create/{id}', 'adminController@edit_testhead');

Route::post('/assign/test/create', 'adminController@new_assign');
Route::post('/add/test_grade/create', 'adminController@new_testgrade');
Route::post('/add/exam_grade/create', 'adminController@new_examgrade');
Route::post('/add/assignment_grade/create','adminController@new_assignmentgrade');
Route::post('/add/attendance/create', 'adminController@attendance');
Route::post('/add/employee/attendance/{id}', 'adminController@employee_attendance');
Route::post('/edit/exist/ebook/{id}', 'adminController@edit_ebook');
Route::post('/add/lesson/course/{id}', 'adminController@add_lesson');
Route::post('/edit/lesson/course/{id}', 'adminController@edit_lesson');
Route::post('/edit/batch/user/{id}', 'adminController@batch_user');



Route::post('/add/score/division', 'adminController@adddivision');
Route::post('/create/user/profile', 'adminController@addprofile');
Route::post('/create/student/profile', 'adminController@studentprofile');
Route::post('/add/enrollment/plan', 'adminController@addplan');
Route::post('/enroll/staff/course', 'adminController@enrolstaff');
Route::post('/enroll/student/course', 'adminController@enrolstudent');
Route::post('/change/status/course/{id}', 'adminController@changestatus');
Route::post('/edit/student/enroll/{id}', 'adminController@editenroll');

Route::post('/admin/add/personal', 'adminController@addpersona');
Route::post('/add/behave/edit/{id}', 'adminController@editpersona');
Route::post('/edit/old/forum/{id}', 'adminController@edituser_forum');
Route::post('/edit/new/forum/{id}', 'adminController@edit_forum');
Route::get('/reply/response/create', 'HomeController@response_topic');





Route::post('/admin/new/session', 'adminController@addsession');
Route::post('/add/break/session', 'adminController@breaksession');
Route::post('/add/close/session', 'adminController@endsession');
Route::post('/add/open/break', 'adminController@openbreak');
Route::post('/add/new/expense', 'adminController@expense_add');
Route::post('/add/new/thread', 'adminController@thread_add');
Route::post('/add/new/forum', 'adminController@forum_add');



Route::post('/add/default/login', 'adminController@default_login');


Route::post('/edit/old/expense/{id}', 'adminController@expense_edit');
Route::post('/admin/behave/create/{idd}', 'adminController@addbehave');
Route::post('/admin/physical/create/{idd}', 'adminController@addphysical');
Route::post('/admin/comment/create/{idd}', 'adminController@addcomment');
Route::post('/admin/generate/result/{idd}', 'adminController@generate');
Route::post('/add/department/create', 'adminController@addepartment');
Route::post('/create/leave/request', 'adminController@create_leave');
Route::post('/add/event/create', 'adminController@add_event');
Route::post('/admin/event_category/create', 'adminController@add_category');
Route::post('/add/gallery/create', 'adminController@add_gallery');
Route::post('/settings/school/create', 'adminController@settings');
Route::post('/award/student/create', 'adminController@saward');
Route::post('/award/employee/create', 'adminController@eaward');
Route::post('/create/graduate/student', 'adminController@addgraduate');
Route::post('/add/ybook/create', 'adminController@ybook_create');
Route::post('/issue/student/book', 'adminController@stiss_create');
Route::post('/issue/staff/book', 'adminController@staiss_create');
Route::post('/add/course/category', 'adminController@category_create');
Route::post('/add/new/course', 'adminController@course_create');
Route::post('/add/internal/instructor', 'adminController@add_intstruct');
Route::post('/add/external/instructor', 'adminController@add_extstruct');
Route::post('/create/slide/image', 'adminController@add_slide');
Route::post('/edit/video/section', 'adminController@edit_vidsection');
Route::post('/edit/header/description', 'adminController@edit_headdescribe');
Route::post('/why/choose/school', 'adminController@add_why');
Route::post('/admin/result/configuration', 'adminController@result_config');
Route::post('/admin/result/phrases', 'adminController@result_phrase');



Route::post('/edit/image/slide/{id}', 'adminController@edit_slide');
Route::post('/edit/course/category/{id}', 'adminController@category_edit');
Route::post('/edit/real/course/{id}', 'adminController@course_edit');
Route::post('/accept/book/payment/{id}', 'adminController@bookpayment');




Route::post('/admin/grade/create/{id}', 'adminController@create_grade');
Route::post('/edit/department/create/{id}', 'adminController@editdepartment');
Route::post('/approve/employee/request/{id}', 'adminController@approve_leave');
Route::post('/edit/event/create/{id}', 'adminController@editevent');
Route::post('/add/class/pay/{id}', 'adminController@classpay');
Route::post('/add/employee/pay/{id}', 'adminController@employeepay');
Route::post('/add/external/result/{id}', 'adminController@addexternal');
Route::post('/add/graduate/certificates/{id}', 'adminController@addcertificate');
Route::post('/edit/ybook/create/{id}', 'adminController@editybook');
Route::post('/issue/change/status/{id}', 'adminController@change_status');
Route::post('/add/sub/category/{id}', 'adminController@add_subcategory');
Route::post('/add/section/course/{id}', 'adminController@add_section');
Route::post('/mark/pending/course/{id}', 'adminController@mark_course');
Route::post('/add/new/room/{id}', 'adminController@add_room');

 Route::get('backup/create', 'BackupController@create');
 Route::get('backup/download/{file_name}', 'BackupController@download');
 Route::get('backup/restore/{file_name}', 'BackupController@restore');
Route::get('backup/delete/{file_name}', 'BackupController@delete');

//Delete Directories
Route::get('/delete/borrow/{id}', 'DeleteController@borrow_delete');
Route::get('/delete/subject/{id}', 'DeleteController@subject_delete');
Route::get('/delete/batch/{id}', 'DeleteController@batch_delete');
Route::get('/delete/subject-type/{id}', 'DeleteController@subtype_delete');
Route::get('/delete/inventory/{id}', 'DeleteController@inv_delete');
Route::get('/delete/student/{id}', 'DeleteController@stud_delete');
Route::get('/delete/parent/{id}', 'DeleteController@pat_delete');
Route::get('/delete/guardian/{id}', 'DeleteController@guard_delete');
Route::get('/delete/ebook/{id}', 'DeleteController@ebook_delete');
Route::get('/delete/question/{id}', 'DeleteController@question_delete');
Route::get('/delete/category/{id}', 'DeleteController@category_delete');
Route::get('/delete/lesson/{id}', 'DeleteController@lesson_delete');
Route::get('/delete/course/{id}', 'DeleteController@course_delete');
Route::get('/delete/enroll/{id}', 'DeleteController@enroll_delete');
Route::get('/delete/account/{id}', 'DeleteController@account_delete');
Route::get('/delete/pay/{id}', 'DeleteController@pay_delete');
Route::get('/delete/event/category/{id}', 'DeleteController@eventcat_delete');
Route::get('/delete/gallery/{id}', 'DeleteController@gellery_delete');
Route::get('/delete/slide/{id}', 'DeleteController@slide_delete');
Route::get('/delete/feature/{id}', 'DeleteController@feature_delete');
Route::get('/delete/syllable/{id}', 'DeleteController@syllabus_delete');
Route::get('/delete/lesson-note/{id}', 'DeleteController@lesson_note_delete');
Route::get('/delete/expense/{id}', 'DeleteController@expense_delete');
Route::get('/delete/notice/{id}', 'DeleteController@notice_delete');
Route::get('/delete/thread/{id}', 'DeleteController@thread_delete');
Route::get('/delete/aboutn/feature/{id}', 'DeleteController@abtfeat_delete');
Route::get('/deleten/event/{id}', 'DeleteController@event_delete');
Route::get('/delete/testimony/{id}', 'DeleteController@testimony_delete');
Route::get('/delete/announce/{id}', 'DeleteController@announce_delete');
Route::get('/delete/forum/{id}', 'DeleteController@forum_delete');
Route::get('/delete/reply/{id}', 'DeleteController@reply_delete');
Route::get('/delete/hostel/{id}', 'DeleteController@hostel_delete');
Route::get('/delete/room/{id}', 'DeleteController@room_delete');
Route::get('/delete/bed/{id}', 'DeleteController@bed_delete');
Route::get('/delete/report/{id}', 'DeleteController@report_delete');
Route::get('/reset/test/{id}', 'DeleteController@reset_test');
Route::get('/activate/batch/{id}', 'DeleteController@activate_test');
Route::get('/deactivate/batch/{id}', 'DeleteController@deactivate_test');
Route::get('/suspend/batch/{id}', 'DeleteController@suspend_test');
Route::get('/delete/plan/{id}', 'DeleteController@plan_delete');
































