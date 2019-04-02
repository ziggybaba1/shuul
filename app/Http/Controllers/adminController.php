<?php

namespace App\Http\Controllers;
use Lang;
use Illuminate\Http\Request;
use \App\Course;
use \App\Subjecttype;
use \App\Subject;
use Illuminate\Support\Facades\Hash;
use \App\Student;
use \App\User;
use \App\Subjectassign;
use \App\Teacher;
use \App\Timetable;
use \App\Batch;
use \App\Question;
use \App\Option;
use Image;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\File;


class adminController extends Controller
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
   public function create_class(Request $request)
   {
   	$class=new Course;
   	$class->title=$request->name;
   	$class->capacity=$request->capacity;
   	$class->code=$request->code;
  if(\Auth::user()->role!=='demo'&&\App\Role::where('staff_id',\Auth::user()->id)->first()->class=='1'){
      $class->save();
    return back()->with(['message' => "".__('admin.succ_update')]);
  }
   else{
    return back()->with(['message' => "".__('admin.no_permission')]);
    }
   }
   public function fee_plan(Request $request)
   {
    if(\Auth::user()->role!=='demo'&&\App\Role::where('staff_id',\Auth::user()->id)->first()->invoice=='1'){
    $class=new \App\Plan;
    $class->name=$request->name;
    $class->number=$request->number;
    $class->message=$request->message;
    $class->sms=$request->sms;
    $class->email=$request->email;
    $class->delete='0';
    $class->save();
     $input=$request->all();
     if($request->number==1){
for($i=1; $i <= $input['number']; $i++){
    if(empty($input['percent'][$i])) continue;
        $data1 = [
         'plan_id'=>$class->id,
        'percent'=>$input['percent'][$i],
        'commision'=>$input['cpercent'][$i],
        'index'=>$i,
        'nday'=>$input['days'][$i],
            ];
         $dataSet1[] = $data1;
      }
     }
     else{
      for($i=0; $i <= $input['number']; $i++){
    if(empty($input['percent'][$i])) continue;
        $data1 = [
         'plan_id'=>$class->id,
        'percent'=>$input['percent'][$i],
        'commision'=>$input['cpercent'][$i],
        'index'=>$i,
        'nday'=>$input['days'][$i],
            ];
         $dataSet1[] = $data1;
      }
     }
      
      foreach ($dataSet1 as $key ) {
        \DB::table('planlists')->insert($key);
      }
    return back()->with(['message' => "".__('admin.succ_create')]);
  }else{return back()->with(['message' => "".__('admin.no_permission')]);}
   }
   public function edit_plan(Request $request,$id)
   {
     if(\Auth::user()->role!=='demo'&&\App\Role::where('staff_id',\Auth::user()->id)->first()->invoice=='1'){
    $class=\App\Plan::find($id);
    $class->name=$request->name;
    $class->number=$request->number;
     $class->message=$request->message;
    $class->sms=$request->sms;
    $class->email=$request->email;
    $class->save();
     $input=$request->all();
     if($request->number==1){
for($i=1; $i <= $input['number']; $i++){
    if(empty($input['percent'][$i])) continue;
        $data1 = [
         'plan_id'=>$class->id,
        'percent'=>$input['percent'][$i],
        'index'=>$i,
        'commision'=>$input['cpercent'][$i],
        'nday'=>$input['days'][$i],
            ];
         $dataSet1[] = $data1;
      }
     }
     else{
      for($i=0; $i <= $input['number']; $i++){
    if(empty($input['percent'][$i])) continue;
        $data1 = [
         'plan_id'=>$class->id,
        'percent'=>$input['percent'][$i],
        'index'=>$i,
        'commision'=>$input['cpercent'][$i],
        'nday'=>$input['days'][$i],
            ];
         $dataSet1[] = $data1;
      }
     }
     if(count(\App\Planlist::where('plan_id',$id)->get())>0){
      \App\Planlist::where('plan_id',$id)->delete();
     }
      foreach ($dataSet1 as $key ) {
        \DB::table('planlists')->insert($key);
      } 
     return back()->with(['message' => "".__('admin.succ_update')]);
}else{return back()->with(['message' => "".__('admin.no_permission')]);
}
   }
   
   public function count_home(Request $request)
   {
    if(\Auth::user()->role!=='demo'&&\App\Role::where('staff_id',\Auth::user()->id)->first()->front=='1'){
    $class=\App\Fronthome::first();
    $class->count_stud=$request->count_stud;
    $class->cert_teach=$request->cert_teach;
    $class->uni_pass=$request->uni_pass;
    $class->parent_sat=$request->parent_sat;
    $class->save();
     return back()->with(['message' => "".__('admin.succ_create')]);
}else {return back()->with(['message' => "".__('admin.no_permission')]);}
   }
   public function support_set(Request $request)
   {
      if(\Auth::user()->role!=='demo'&&\App\Role::where('staff_id',\Auth::user()->id)->first()->ginfo=='1'){
    $class=\App\Support::first();
    $class->url=$request->tawk_url;
    $class->status=$request->tawk_status;
    $class->save();
    return back()->with(['message' => "".__('admin.succ_update')]);}
    else{return back()->with(['message' => "".__('admin.no_permission')]);}
   }
   
   public function plugin_set(Request $request)
   {
 if(\Auth::user()->role!=='demo'&&\App\Role::where('staff_id',\Auth::user()->id)->first()->ginfo=='1'){
    $class=\App\Support::first();
    $class->res=$request->res;$class->syl=$request->syl;$class->less=$request->less;$class->etest=$request->etest;
    $class->att=$request->att;$class->awa=$request->awa;$class->pick=$request->pick;$class->dorm=$request->dorm;
    $class->clin=$request->clin;$class->lib=$request->lib;$class->book=$request->book;$class->event=$request->event;
    $class->gall=$request->gall;$class->hrm=$request->hrm;$class->ybook=$request->ybook;$class->ann=$request->ann;
    $class->forum=$request->forum;$class->front=$request->front;$class->opay=$request->opay;
    $class->save();
   return back()->with(['message' => "".__('admin.succ_update')]);}
     else{return back()->with(['message' => "".__('admin.no_permission')]);}
   }
   public function add_hostel(Request $request)
   {
 if(\Auth::user()->role!=='demo'&&\App\Role::where('staff_id',\Auth::user()->id)->first()->hostel=='1'){
    $class=new \App\Dormitory;
    $class->name=$request->name;
    $class->capacity=$request->capacity;
    $class->code=$request->code;
    $class->address=$request->address;
    $class->blocks=$request->block;
    $class->save();
      return back()->with(['message' => "".__('admin.succ_create')]);}
       else{return back()->with(['message' => "".__('admin.no_permission')]);}
   }
   public function bed_add(Request $request,$id)
   {
  if(\Auth::user()->role!=='demo'&&\App\Role::where('staff_id',\Auth::user()->id)->first()->hostel=='1'){
    $class=new \App\Bed;
    $class->dorm_id=\App\Room::find($id)->dorm_id;
    $class->room_id=$id;
    $class->name=$request->name;
    $class->capacity=$request->capacity;
    $class->code=$request->code;
    $class->number=$request->number;
    $class->save();
   return back()->with(['message' => "".__('admin.succ_create')]);}
       else{return back()->with(['message' => "".__('admin.no_permission')]);}
   }
   public function bed_edit(Request $request,$id)
   {
   if(\Auth::user()->role!=='demo'&&\App\Role::where('staff_id',\Auth::user()->id)->first()->hostel=='1'){
    $class=\App\Bed::find($id);
    $class->name=$request->name;
    $class->capacity=$request->capacity;
    $class->code=$request->code;
    $class->number=$request->number;
    $class->save();
    return back()->with(['message' => "".__('admin.succ_create')]);}
       else{return back()->with(['message' => "".__('admin.no_permission')]);}
   }
   public function bookpayment(Request $request,$id)
   {
    if(\Auth::user()->role!=='demo'&&\App\Role::where('staff_id',\Auth::user()->id)->first()->pay=='1'){
    $message=new \App\Payment;
        $message->student_id=$id;
         $message->class=\App\Student::find($id)->class;
        $message->amount=$request->amount;
        $message->type='7';
        $message->status='1';
        $message->receipt_id=\Keygen1::numeric(7)->generate();
         $message->method='Direct Pay';
         $message->sign=\Auth::user()->name;
         $message->session=\App\Session::latest()->first()->session;
         $message->term=\App\Session::latest()->first()->terms;
        $message->save();
        $input=$request->all();
      for($i=0; $i <= count($input['reqid']); $i++){
    if(empty($input['reqid'][$i])) continue;
        $data1 = [
         'pay_id'=>$message->id,
        'item_id'=>$input['reqid'][$i],
        'type'=>'7',
        'status'=>'1',
         'amount'=>\App\Bookassign::where('id',$input['reqid'][$i])->first()->price,
         'session'=>\App\Session::latest()->first()->session,
        'term'=>\App\Session::latest()->first()->terms,
        'student_id'=>$id,
        'class'=>\App\Student::find($id)->class,
            ];
         $dataSet1[] = $data1;
      }
      foreach ($dataSet1 as $key ) {
        \DB::table('payitems')->insert($key);
      }
   return back()->with(['message' => "".__('admin.payn_succ')]);}
   }
   public function hostel_edit(Request $request,$id)
   {
if(\Auth::user()->role!=='demo'&&\App\Role::where('staff_id',\Auth::user()->id)->first()->hostel=='1'){
    $class=\App\Dormitory::find($id);
    $class->name=$request->name;
    $class->capacity=$request->capacity;
    $class->code=$request->code;
    $class->address=$request->address;
    $class->blocks=$request->block;
    $class->save();
   return back()->with(['message' => "".__('admin.succ_update')]);}
       else{return back()->with(['message' => "".__('admin.no_permission')]);}
   }
   public function add_room(Request $request,$id)
   {
if(\Auth::user()->role!=='demo'&&\App\Role::where('staff_id',\Auth::user()->id)->first()->hostel=='1'){
    $class=new \App\Room;
    $class->name=$request->name;
    $class->capacity=$request->capacity;
    $class->code=$request->code;
    $class->number=$request->number;
    $class->dorm_id=$id;
    $class->save();
 return back()->with(['message' => "".__('admin.succ_create')]);}
       else{return back()->with(['message' => "".__('admin.no_permission')]);}
   }
    public function edit_room(Request $request,$id)
   {
    if(\Auth::user()->role!=='demo'&&\App\Role::where('staff_id',\Auth::user()->id)->first()->hostel=='1'){
    $class=\App\Room::find($id);
    $class->name=$request->name;
    $class->capacity=$request->capacity;
    $class->code=$request->code;
    $class->number=$request->number;
    $class->save();
    return back()->with(['message' => "".__('admin.succ_update')]);}
       else{return back()->with(['message' => "".__('admin.no_permission')]);}
   }
   public function bed_allocate(Request $request,$id)
   {
 if(\Auth::user()->role!=='demo'&&\App\Role::where('staff_id',\Auth::user()->id)->first()->bed=='1'){
  if(count(\App\Allocate::where('bed_id',$id)->get())==0){
   $class=New \App\Allocate; 
  }
   elseif(count(\App\Allocate::where('bed_id',$id)->get())>0){
     $class=\App\Allocate::where('bed_id',$id)->first(); 
   }
    $class->bed_id=$id;
    $class->dorm_id=\App\Bed::find($id)->dorm_id;
    $class->room_id=\App\Bed::find($id)->room_id;
    $class->user_id=$request->student;
    $class->status='1';
    $class->date=$request->date;
    $class->save();
    return back()->with(['message' => __('admin.bed').''.\App\Bed::find($id)->name.' '.\App\Bed::find($id)->number.' '.__('admin.alloc_succ')]);}
       else{return back()->with(['message' => "".__('admin.no_permission')]);}
   }
   public function add_theme(Request $request)
   {
  if(\Auth::user()->role!=='demo'&&\App\Role::where('staff_id',\Auth::user()->id)->first()->front=='1'){
    $class=\App\Fronttheme::first();
    $class->theme=$request->theme;
    $class->css=$request->css;
    $class->save();
    return back()->with(['message' => "".__('admin.succ_update')]);}
       else{return back()->with(['message' => "".__('admin.no_permission')]);}
   }
   public function add_report(Request $request)
   {
     if(\Auth::user()->role!=='demo'&&\App\Role::where('staff_id',\Auth::user()->id)->first()->report=='1'){
    $class=new \App\Report;
    $class->student_id=$request->student;
    $class->class=$request->class;
    $class->report=$request->report;
    $class->date=$request->date;
    $class->time=$request->time;
    $class->sign_name=\Auth::user()->name;
    $class->sign_id=\Auth::user()->id;
    $class->save();
    return back()->with(['message' => "".__('admin.succ_create')]);}
       else{return back()->with(['message' => "".__('admin.no_permission')]);}
   }
   public function edit_report(Request $request,$id)
   {
   if(\Auth::user()->role!=='demo'&&\App\Role::where('staff_id',\Auth::user()->id)->first()->report=='1'){
    $class=\App\Report::find($id);
    $class->student_id=$request->student;
    $class->class=$request->class;
    $class->report=$request->report;
    $class->date=$request->date;
    $class->time=$request->time;
    $class->sign_name=\Auth::user()->name;
    $class->sign_id=\Auth::user()->id;
    $class->save();
    return back()->with(['message' => "".__('admin.succ_update')]);}
       else{return back()->with(['message' => "".__('admin.no_permission')]);}
   }
   public function test_gen(Request $request,$id)
   {
     $amountw=0;
     $amountl=0;
     $total=0;
     $i=0;
  $input=$request->all();
  foreach(\App\Question::where('batch_id',\App\Esubmit::find($id)->batch_id)->get() as $test){
    $i++;
    if($test->correct==json_decode(\App\Esubmit::where('batch_id',\App\Esubmit::find($id)->batch_id)->first()->result)[$i-1]->result){
       $amountw+=\App\Batch::find($test->batch_id)->mark;
    }
     if($test->correct!=json_decode(\App\Esubmit::where('batch_id',\App\Esubmit::find($id)->batch_id)->first()->result)[$i-1]->result){
       $amountl+=\App\Batch::find($test->batch_id)->mark;
    }
  }
   $total=($amountw/($amountl+$amountw))*100;
     $class=\App\Esubmit::find($id);
    $class->score=\round($total);
    $class->save();
    return view('student.record.show_result');
}
  
   public function clock_test($id)
   {
    if(count(\App\Clockin::where('student_id',\App\Student::where('data_id',\Auth::user()->id)->first()->id)->where('batch_id',$id)->get())>0)
    {
    return view('student.record.test_clock');
    }
    elseif(count(\App\Clockin::where('student_id',\App\Student::where('data_id',\Auth::user()->id)->first()->id)->where('batch_id',$id)->get())==0)
    {
    $class=new \App\Clockin;
    $class->batch_id=$id;
    $class->type=\App\Batch::find($id)->type;
    $class->student_id=\App\Student::where('data_id',\Auth::user()->id)->first()->id;
    $class->status='1';
    $class->save();
    return '0';
    }
   }
    public function sclock_test($id)
   {
    if(count(\App\Clockin::where('student_id',\App\Teacher::where('user_table',\Auth::user()->id)->first()->id)->where('batch_id',$id)->get())>0)
    {
    return view('admin.cbt.test_clock');
    }
    elseif(count(\App\Clockin::where('student_id',\App\Teacher::where('user_table',\Auth::user()->id)->first()->id)->where('batch_id',$id)->get())==0)
    {
    $class=new \App\Clockin;
    $class->batch_id=$id;
    $class->type=\App\Batch::find($id)->type;
    $class->student_id=\App\Teacher::where('user_table',\Auth::user()->id)->first()->id;
    $class->status='1';
    $class->save();
    return '0';
    }
   }
   public function assign_book(Request $request,$id)
   {
     if(\Auth::user()->role!=='demo'&&\App\Role::where('staff_id',\Auth::user()->id)->first()->order=='1'){
      $input=$request->all();
      for($i=0; $i <= count($input['name']); $i++){
    if(empty($input['name'][$i])) continue;
        $data1 = [
         'class'=>$id,
        'name'=>$input['name'][$i],
        'price'=>$input['price'][$i],
        'avail'=>$input['avail'][$i],
            ];
         $dataSet1[] = $data1;
      }
       if(count(\App\Bookassign::where('class',$id)->get())>0){
        \App\Bookassign::where('class',$id)->delete();
      }
      foreach ($dataSet1 as $key ) {
        \DB::table('bookassigns')->insert($key);
      }
    return back()->with(['message' => "".__('admin.succ_create')]);
  }
   else{
    return back()->with(['message' => "".__('admin.no_permission')]);
    }

   }
   public function give_status(Request $request,$id)
   {
 if(\Auth::user()->role!=='demo'&&\App\Role::where('staff_id',\Auth::user()->id)->first()->requestn=='1'){
      $input=$request->all();
      for($i=0; $i <= count($input['item']); $i++){
    if(empty($input['item'][$i])) continue;
\App\Payitem::where('id',$input['item'][$i])->update(['give_status'=>'1','sign'=>\Auth::user()->name,]);
      }
    return back()->with(['message' => "".__('admin.succ_update')]);
  }
   else{
    return back()->with(['message' => "".__('admin.no_permission')]);
    }
   }
   public function etest_result(Request $request,$idd)
   {
    $data2 = [];
    $input=$request->all();
    $i=0;
    $id=$idd;
foreach (\App\Question::where('batch_id',$id)->get() as $question)
{
  if(empty($input[''.\App\Option::where('batch_id',$question->id)->first()->key])) continue;
    $i++;
    $data2[] = [
        'result' => $input[''.\App\Option::where('batch_id',$question->id)->first()->key],
    ];
}
if(count(\App\Esubmit::where('batch_id',$id)->where('student_id',\App\Student::where('data_id',\Auth::user()->id)->first()->id)->get())>0){
  return view('student.record.test_error',compact('id'));
}
elseif(count(\App\Esubmit::where('batch_id',$id)->where('student_id',\App\Student::where('data_id',\Auth::user()->id)->first()->id)->get())==0){
  $person=new \App\Esubmit;
      $person->student_id=\App\Student::where('data_id',\Auth::user()->id)->first()->id;
      $person->result=\json_encode($data2);
      $person->batch_id=$id;
     $person->save();
      return view('student.record.test_thank',compact('id'));
}
     
   }
   public function setest_result(Request $request,$idd)
   {
    $data2 = [];
    $input=$request->all();
    $i=0;
    $id=$idd;
foreach (\App\Question::where('batch_id',$id)->get() as $question)
{
  if(empty($input[''.\App\Option::where('batch_id',$question->id)->first()->key])) continue;
    $i++;
    $data2[] = [
        'result' => $input[''.\App\Option::where('batch_id',$question->id)->first()->key],
    ];
}
if(count(\App\Esubmit::where('batch_id',$id)->where('student_id',\App\Teacher::where('user_table',\Auth::user()->id)->first()->id)->get())>0){
  return view('student.record.test_error',compact('id'));
}
elseif(count(\App\Esubmit::where('batch_id',$id)->where('student_id',\App\Teacher::where('user_table',\Auth::user()->id)->first()->id)->get())==0){
  $person=new \App\Esubmit;
      $person->student_id=\App\Teacher::where('user_table',\Auth::user()->id)->first()->id;
      $person->result=\json_encode($data2);
      $person->batch_id=$id;
     $person->save();
      return view('student.record.test_thank',compact('id'));
}
     
   }
    public function add_abthead(Request $request)
   {
 if(\Auth::user()->role!=='demo'&&\App\Role::where('staff_id',\Auth::user()->id)->first()->front=='1'){
    $class=\App\Frontheader::first();
    $class->home=$request->home;
    $class->notice=$request->notice;
    $class->event=$request->event;
    $class->teacher=$request->teacher;
    $class->course=$request->course;
    $class->gallery=$request->gallery;
    $class->about=$request->about;
    $class->future=$request->future;
     $class->notice_id=$request->notice_id;
    $class->event_id=$request->event_id;
    $class->teacher_id=$request->teacher_id;
    $class->course_id=$request->course_id;
    $class->gallery_id=$request->gallery_id;
    $class->future_id=$request->future_id;
    $class->save();
    return back()->with(['message' => "".__('admin.succ_update')]);
  }
   else{
    return back()->with(['message' => "".__('admin.no_permission')]);
    }
   }
    public function add_abtfoot(Request $request)
   {
    if(\Auth::user()->role!=='demo'&&\App\Role::where('staff_id',\Auth::user()->id)->first()->front=='1'){
    $class=\App\Frontfooter::first();
    $class->req_title=$request->req_title;
    $class->req_sub=$request->req_sub;
    $class->con_address=$request->con_address;
    $class->con_email=$request->con_email;
    $class->con_phone=$request->con_phone;
    $class->social=$request->social;
    $class->newsletter=$request->newsletter;
     $class->forum=$request->forum;
    $class->contact=$request->contact;
    $class->newsletter_btn=$request->newsletter_btn;
    $class->social_head=$request->social_head;
    $class->news_head=$request->news_head;
     $class->social_fb=$request->social_fb;
    $class->social_twt=$request->social_twt;
    $class->social_ln=$request->social_ln;
    $class->social_gg=$request->social_gg;
    $class->copyright=$request->copyright;
    $class->social_pin=$request->social_pin;
    $class->social_gram=$request->social_gram;
    $class->social_id=$request->social_id;
    $class->contact_id=$request->contact_id;
    $class->forum_id=$request->forum_id;
    $class->newsletter_id=$request->newsletter_id;
    $class->request_id=$request->request_id;
    $class->save();
    return back()->with(['message' => "".__('admin.succ_create')]);
  }
   else{
    return back()->with(['message' => "".__('admin.no_permission')]);
    }
   }
   public function add_notice(Request $request)
   {
  if(\Auth::user()->role!=='demo'&&\App\Role::where('staff_id',\Auth::user()->id)->first()->front=='1'){
    $class=new \App\Noticeboard;
    $class->title=$request->title;
    $class->description=$request->describe;
    $class->sdate=$request->sdate;
    $class->edate=$request->edate;
    $class->status=$request->status;
    $class->sign=\Auth::user()->name;
     $picture1 = $request->file('file');
        if($picture1 != ""){
      $filename1 = time() . '.' . $picture1->getClientOriginalExtension();
        Image::make($picture1)->resize(300, 300)->save(public_path('/uploads/notice/' . $filename1) );
      $class->image= $filename1;
    }
    $class->save();
    return back()->with(['message' => "".__('admin.succ_create')]);
  }
   else{
    return back()->with(['message' => "".__('admin.no_permission')]);
    }
   }
   public function thread_add(Request $request)
   {
    if(\Auth::user()->role!=='demo'&&\App\Role::where('staff_id',\Auth::user()->id)->first()->topic=='1'){
    $class=new \App\Thread;
    $class->title=$request->title;
    $class->body=$request->content;
    $class->name=\Auth::user()->name;
    $class->user_id=\Auth::user()->id;
    $class->status=$request->status;
    $class->save();
    return back()->with(['message' => "".__('admin.succ_create')]);
  }
   else{
    return back()->with(['message' => "".__('admin.no_permission')]);
    }
   }
   public function contact_reply(Request $request,$id)
   {
   if(\Auth::user()->role!=='demo'&&\App\Role::where('staff_id',\Auth::user()->id)->first()->contact=='1'){ 
    $class=\App\Contact::find($id);
    $class->answer=$request->message;
    $class->title=$request->title;
     $class->status='0';
     $class->sign=\Auth::user()->name;
    $class->save();
    if(count(\App\Department::where('id',\App\Teacher::where('user_table',\Auth::user()->id)->first()->dept)->get())>0){
    $data = [
           'title' => $request->title,
           'message' => $request->message,
            'cname' => $class->name,
             'uname' => \Auth::user()->name,
              'img' => \App\Teacher::where('user_table',\Auth::user()->id)->first()->image,
            'dept' => \App\Department::findOrFail(\App\Teacher::where('user_table',\Auth::user()->id)->first()->dept)->name,

];   
    }
   elseif(count(\App\Department::where('id',\App\Teacher::where('user_table',\Auth::user()->id)->first()->dept)->get())==0){
     $data = [
           'title' => $request->title,
           'message' => $request->message,
            'cname' => $class->name,
             'uname' => \Auth::user()->name,
              'img' => \App\Teacher::where('user_table',\Auth::user()->id)->first()->image,
            'dept' => 'School Administrator',

];  
   }
$email=$class->email;$title=$request->title;
  try {
    \Mail::send('email.contact',["data1"=>$data] , function($message) use ($email,$title){
$message->to($email, ''.\App\Provider::first()->name)
        ->subject($title);
   });
      $class->status='1';
    $class->save();
 return back()->with(['message' => "".__('admin.message_sent')]);     } catch (\Exception $ex) {
     $class->status='2';
    $class->save();
 return back()->with(['message' => "".__('admin.message_failed')]);   }
   }
   else{
    return back()->with(['message' => "".__('admin.no_permission')]);
    }

 }
   public function forum_add(Request $request)
   {
 if(\Auth::user()->role!=='demo'&&\App\Role::where('staff_id',\Auth::user()->id)->first()->forum=='1'){
    $class=new \App\Forum;
    $class->title=$request->forum_title;
    $class->description=$request->description;
    $class->name=\Auth::user()->name;
    $class->sign=\Auth::user()->id;
    $class->save();
     $input=$request->all();
     if($request->staff!='all'){
      foreach(\App\Teacher::where('status','0')->get() as $teacher){
        $member=new \App\Member;$member->forum_id=$class->id;$member->user_id=$teacher->user_table;
        $member->type='staff';$member->save();}}
     if($request->staff=='all'){
      for($i=0; $i <= count($input['staff']); $i++){
    if(empty($input['staff'][$i])) continue;
$data1 = ['forum_id'=>$class->id,'user_id'=>$input['staff'][$i],'type'=>'staff'];
$dataSet1[] = $data1;
      }
      foreach ($dataSet1 as $staffer ) {
        \DB::table('members')->insert($staffer);
      }
     }
     if($request->student!='all'){
      foreach(\App\Student::where('status','0')->get() as $student){
        $member=new \App\Member;$member->forum_id=$class->id;$member->user_id=$student->data_id;
        $member->type='student';$member->save();}}
     if($request->student=='all'){
      for($i=0; $i <= count($input['student']); $i++){
    if(empty($input['student'][$i])) continue;
$data2 = ['forum_id'=>$class->id,'user_id'=>$input['student'][$i],'type'=>'student'];
$dataSet2[] = $data2;
      }
      foreach ($dataSet2 as $studenter ) {
        \DB::table('members')->insert($studenter);
      }
     } 
     if($request->parent!='all'){
      foreach(\App\Parenting::where('status','0')->get() as $parent){
        $member=new \App\Member;$member->forum_id=$class->id;$member->user_id=$parent->user_id;
        $member->type='parent';$member->save();}}
     if($request->student=='all'){
      for($i=0; $i <= count($input['parent']); $i++){
    if(empty($input['parent'][$i])) continue;
$data3 = ['forum_id'=>$class->id,'user_id'=>$input['parent'][$i],'type'=>'parent'];
$dataSet3[] = $data3;
      }
      foreach ($dataSet3 as $parenter ) {
        \DB::table('members')->insert($parenter);
      }
     } 
   return back()->with(['message' => "".__('admin.succ_create')]);
  } else{
    return back()->with(['message' => "".__('admin.no_permission')]);
    }
   }
  
    public function edituser_forum(Request $request,$id)
   {
     if(\Auth::user()->role!=='demo'&&\App\Role::where('staff_id',\Auth::user()->id)->first()->forum=='1'){
     $input=$request->all();
  if(count( \App\Member::where('forum_id',$id)->get())>0){
  \App\Member::where('forum_id',$id)->delete();  
  }
     for($i=0; $i <= count($input['staff']); $i++){
    if(empty($input['staff'][$i])) continue;
$data1 = ['forum_id'=>$id,'user_id'=>$input['staff'][$i],'type'=>'staff'];
$dataSet1[] = $data1;
      }
      foreach ($dataSet1 as $staffer ) {
        \DB::table('members')->insert($staffer);
      }
     for($i=0; $i <= count($input['student']); $i++){
    if(empty($input['student'][$i])) continue;
$data2 = ['forum_id'=>$id,'user_id'=>$input['student'][$i],'type'=>'student'];
$dataSet2[] = $data2;
      }
      foreach ($dataSet2 as $studenter ) {
        \DB::table('members')->insert($studenter);
      }
    for($i=0; $i <= count($input['parent']); $i++){
    if(empty($input['parent'][$i])) continue;
$data3 = ['forum_id'=>$id,'user_id'=>$input['parent'][$i],'type'=>'parent'];
$dataSet3[] = $data3;
      }
      foreach ($dataSet3 as $parenter ) {
        \DB::table('members')->insert($parenter);
      }
    return back()->with(['message' => "".__('admin.succ_update')]);
  } else{
    return back()->with(['message' => "".__('admin.no_permission')]);
    }
   }
   public function edit_forum(Request $request,$id)
   {
    if(\Auth::user()->role!=='demo'&&\App\Role::where('staff_id',\Auth::user()->id)->first()->forum=='1'){
    $class=\App\Forum::find($id);
    $class->title=$request->forum_title;
    $class->description=$request->description;
    $class->name=\Auth::user()->name;
    $class->sign=\Auth::user()->id;
    $class->save();
     return back()->with(['message' => "".__('admin.succ_create')]);
  } else{
    return back()->with(['message' => "".__('admin.no_permission')]);
    }
  }
   public function edit_thread(Request $request,$id)
   {
     if(\Auth::user()->role!=='demo'&&\App\Role::where('staff_id',\Auth::user()->id)->first()->topic=='1'){
    $class=\App\Thread::find($id);
    $class->title=$request->title;
    $class->body=$request->content;
    $class->status=$request->status;
    $class->save();
     return back()->with(['message' => "".__('admin.succ_update')]);
  } else{
    return back()->with(['message' => "".__('admin.no_permission')]);
    }
   }
   public function notice_page(Request $request)
   {
   if(\Auth::user()->role!=='demo'&&\App\Role::where('staff_id',\Auth::user()->id)->first()->front=='1'){
    $class=\App\Fronthome::first();
    $class->notice_title=$request->title;
    $class->notice_description=$request->description;
    $class->save();
    return back()->with(['message' => "".__('admin.succ_create')]);
  } else{
    return back()->with(['message' => "".__('admin.no_permission')]);
    }
   }
    public function course_page(Request $request)
   {
   if(\Auth::user()->role!=='demo'&&\App\Role::where('staff_id',\Auth::user()->id)->first()->front=='1'){
    $class=\App\Fronthome::first();
    $class->course_title=$request->title;
    $class->course_description=$request->description;
    $class->save();
    return back()->with(['message' => "".__('admin.succ_create')]);
  } else{
    return back()->with(['message' => "".__('admin.no_permission')]);
    }
   }
    public function gallery_page(Request $request)
   {
 if(\Auth::user()->role!=='demo'&&\App\Role::where('staff_id',\Auth::user()->id)->first()->front=='1'){
    $class=\App\Fronthome::first();
    $class->gallery_title=$request->title;
    $class->gallery_description=$request->description;
    $class->save();
   return back()->with(['message' => "".__('admin.succ_update')]);
  } else{
    return back()->with(['message' => "".__('admin.no_permission')]);
    }
   }
    public function teacher_page(Request $request)
   {
     if(\Auth::user()->role!=='demo'&&\App\Role::where('staff_id',\Auth::user()->id)->first()->front=='1'){

    $class=\App\Fronthome::first();
    $class->teacher_title=$request->title;
    $class->teacher_description=$request->description;
    $class->save();
    return back()->with(['message' => "".__('admin.succ_update')]);
  } else{
    return back()->with(['message' => "".__('admin.no_permission')]);
    }
   }
   public function testimony_page(Request $request)
   {
 if(\Auth::user()->role!=='demo'&&\App\Role::where('staff_id',\Auth::user()->id)->first()->front=='1'){
    $class=\App\Fronthome::first();
    $class->test_title=$request->test_title;
    $class->test_description=$request->test_description;
    $class->save();
      return back()->with(['message' => "".__('admin.succ_update')]);
  } else{
    return back()->with(['message' => "".__('admin.no_permission')]);
    }
   }
   public function edit_notice(Request $request,$id)
   {
   if(\Auth::user()->role!=='demo'&&\App\Role::where('staff_id',\Auth::user()->id)->first()->notice=='1'){
    $class=\App\Noticeboard::find($id);
    $class->title=$request->title;
    $class->description=$request->describe;
    $class->sdate=$request->sdate;
    $class->edate=$request->edate;
    $class->status=$request->status;
     $picture1 = $request->file('file');
        if($picture1 != ""){
      $filename1 = time() . '.' . $picture1->getClientOriginalExtension();
        Image::make($picture1)->resize(300, 300)->save(public_path('/uploads/notice/' . $filename1) );
      $class->image= $filename1;
    }
    $class->save();
     return back()->with(['message' => "".__('admin.succ_update')]);
  } else{
    return back()->with(['message' => "".__('admin.no_permission')]);
    }
   }

   public function search_invoice(Request $request,$id)
   {
   $term=$request->term;
   $class=$request->class;
    return view('admin.result.invoice',compact('term','class','id'));
   }
    public function account_school(Request $request)
   {
 if(\Auth::user()->role!=='demo'&&\App\Role::where('staff_id',\Auth::user()->id)->first()->title=='1'){
    $class=new \App\Account;
    $class->name=$request->name;
    $class->number=$request->number;
    $class->bank=$request->bank;
    $class->status=$request->status;
    $class->code=$request->code;
    $class->save();
    return back()->with(['message' => "".__('admin.succ_create')]);
  } else{
    return back()->with(['message' => "".__('admin.no_permission')]);
    }
   }
   public function new_syllabus(Request $request,$id)
   {
  if(\Auth::user()->role!=='demo'&&\App\Role::where('staff_id',\Auth::user()->id)->first()->syllabus=='1'){
    $class=new \App\Syllabus;
    $class->class_id=$id;
    $class->term=$request->term;
    $class->session=$request->session;
    $class->content=$request->detail;
    $class->subject=$request->subject;
    $class->sign=\Auth::user()->name;
    $class->save();
    return back()->with(['message' => "".__('admin.succ_create')]);
  } else{
    return back()->with(['message' => "".__('admin.no_permission')]);
    }
   }
   public function new_lesson(Request $request,$id)
   {
 if(\Auth::user()->role!=='demo'&&\App\Role::where('staff_id',\Auth::user()->id)->first()->lesson=='1'){
    $class=new \App\Lessonote;
    $class->class_id=$id;
    $class->term=$request->term;
    $class->session=$request->session;
    $class->content=$request->detail;
    $class->subject=$request->subject;
    $class->topic=$request->topic;
    $class->sign=\Auth::user()->name;
    $class->save();
    return back()->with(['message' => "".__('admin.succ_create')]);
  } else{
    return back()->with(['message' => "".__('admin.no_permission')]);
    }
   }
   
   public function add_expensetype(Request $request)
   {
     if(\Auth::user()->role!=='demo'&&\App\Role::where('staff_id',\Auth::user()->id)->first()->expense=='1'){
    $input=$request->all();
      for($i=0; $i <= count($input['title']); $i++){
    if(empty($input['title'][$i])) continue;
        $data1 = [
         'sign'=>\Auth::user()->name,
        'title'=>$input['title'][$i],
            ];
         $dataSet1[] = $data1;
         if(count(\App\Expensetype::where('title',$input['title'][$i])->get())>0){
        \App\Expensetype::where('title',$input['title'][$i])->delete();
      }
      }
      foreach ($dataSet1 as $key ) {
        \DB::table('expensetypes')->insert($key);
      }
    return back()->with(['message' => "".__('admin.succ_create')]);
  } else{
    return back()->with(['message' => "".__('admin.no_permission')]);
    }
   }
   public function edit_syllabus(Request $request,$id)
   {
    if(\Auth::user()->role!=='demo'&&\App\Role::where('staff_id',\Auth::user()->id)->first()->syllabus=='1'){
    $class=\App\Syllabus::find($id);
    $class->content=$request->detail;
    $class->sign=\Auth::user()->name;
    $class->save();
    return back()->with(['message' => "".__('admin.succ_update')]);
  } else{
    return back()->with(['message' => "".__('admin.no_permission')]);
    }
   }
   public function expense_add(Request $request)
   {
if(\Auth::user()->role!=='demo'&&\App\Role::where('staff_id',\Auth::user()->id)->first()->expense=='1'){
    $class=new \App\Expense;
    $class->name=$request->name;
    $class->invoice=$request->number;
    $class->date=$request->date;
    $class->session=\App\Session::latest()->first()->session;
    $class->term=\App\Session::latest()->first()->terms;
    $class->amount=$request->amount;
     $class->type=$request->type;
    $class->description=$request->describe;
    $File=$request->file('file');
      if($File != ''){
      $extension = $File->getClientOriginalExtension();
      \Storage::disk('local')->put($File->getFilename().'.'.$extension,File::get($File));
       $class->mime=$File->getClientMimeType();
     $class->file=$File->getFilename().'.'.$extension;
    }
    $class->sign=\Auth::user()->name;
    $class->save();
   return back()->with(['message' => "".__('admin.succ_create')]);
  } else{
    return back()->with(['message' => "".__('admin.no_permission')]);
    }
   }
   public function add_message(Request $request)
   {
    $class=new \App\Messaging;
    $class->send_id=\Auth::user()->id;
    $class->receive_id=$request->receive_id;
    $class->message_title=$request->title;
    $class->content=$request->content;
     $class->status='0';
    $class->type=\Auth::user()->role;
     $class->save();
    foreach ($request->file as  $File) {
      $filow=new \App\Messfile;
      if($File != ''){
      $extension = $File->getClientOriginalExtension();
      \Storage::disk('local')->put($File->getFilename().'.'.$extension,File::get($File));
      $filow->mess_id=$class->id;
       $filow->mime=$File->getClientMimeType();
     $filow->file=$File->getFilename().'.'.$extension;
    }
    $filow->save();
  } 
  return redirect('/show/inbox');
   }
   public function expense_edit(Request $request,$id)
   {
    if(\Auth::user()->role!=='demo'&&\App\Role::where('staff_id',\Auth::user()->id)->first()->expense=='1'){
    $class=\App\Expense::find($id);
    $class->name=$request->name;
    $class->invoice=$request->number;
    $class->date=$request->date;
    $class->amount=$request->amount;
     $class->type=$request->type;
    $class->description=$request->describe;
    $File=$request->file('file');
      if($File != ''){
      $extension = $File->getClientOriginalExtension();
      \Storage::disk('local')->put($File->getFilename().'.'.$extension,File::get($File));
       $class->mime=$File->getClientMimeType();
     $class->file=$File->getFilename().'.'.$extension;
    }
    $class->sign=\Auth::user()->name;
    $class->save();
   return back()->with(['message' => "".__('admin.succ_update')]);
  } else{
    return back()->with(['message' => "".__('admin.no_permission')]);
    }
   }
   public function edit_lessonnote(Request $request,$id)
   {
    if(\Auth::user()->role!=='demo'&&\App\Role::where('staff_id',\Auth::user()->id)->first()->lesson=='1'){
    $class=\App\Lessonote::find($id);
    $class->content=$request->detail;
    $class->topic=$request->topic;
    $class->sign=\Auth::user()->name;
    $class->save();
    return back()->with(['message' => "".__('admin.succ_update')]);
  } else{
    return back()->with(['message' => "".__('admin.no_permission')]);
    }
   }
   public function edit_account(Request $request,$id)
   {
     if(\Auth::user()->role!=='demo'&&\App\Role::where('staff_id',\Auth::user()->id)->first()->title=='1'){
    $class=\App\Account::find($id);
    $class->name=$request->name;
    $class->number=$request->number;
    $class->bank=$request->bank;
    $class->status=$request->status;
    $class->code=$request->code;
    $class->save();
    return back()->with(['message' => "".__('admin.succ_update')]);
  } else{
    return back()->with(['message' => "".__('admin.no_permission')]);
    }
   }
   public function add_role(Request $request,$id)
   {
   if(\Auth::user()->role!=='demo'&&\App\Role::where('staff_id',\Auth::user()->id)->first()->role=='1'){
    if(count(\App\Role::where('staff_id',\App\Teacher::find($id)->user_table)->get())>0){
     $class=\App\Role::where('staff_id',\App\Teacher::find($id)->user_table)->first();  
    }
   elseif(count(\App\Role::where('staff_id',\App\Teacher::find($id)->user_table)->get())==0){
    $class=new \App\Role;
    }
    $class->staff_id=\App\Teacher::find($id)->user_table;
    $class->class=$request->class;$class->behave=$request->behave;$class->result_gen=$request->result_gen;
    $class->result_setting=$request->result_setting;$class->syllabus=$request->syllabus;$class->lesson=$request->lesson;
    $class->del_syle=$request->del_syle;$class->batch=$request->batch;$class->question=$request->question;
    $class->result_col=$request->result_col;$class->reset=$request->reset;$class->batch_act=$request->batch_act;
    $class->del_cbt=$request->del_cbt;$class->student=$request->student;$class->timetable=$request->timetable;
     $class->grad=$request->grad;$class->ybook=$request->ybook;$class->saward=$request->saward;
    $class->sattend=$request->sattend;$class->del_stud=$request->del_stud;$class->pickup=$request->pickup;
    $class->parent=$request->parent;$class->del_source=$request->del_source;$class->hostel=$request->hostel;
    $class->bed=$request->bed;$class->report=$request->report;$class->del_board=$request->del_board;
    $class->category=$request->category;$class->inventory=$request->inventory;
    $class->expense=$request->expense;$class->title=$request->title;$class->invoice=$request->invoice;
    $class->pay=$request->pay;$class->payroll=$request->payroll;
    $class->del_inv=$request->del_inv;$class->dept=$request->dept;$class->staff=$request->staff;
    $class->stattend=$request->stattend;$class->leave=$request->leave;$class->staward=$request->staward;

    $class->request=$request->requestn;$class->book=$request->book;$class->order=$request->order;

     $class->announce=$request->announce;$class->forum=$request->forum;$class->topic=$request->topic;
    $class->contact=$request->contact;$class->front=$request->front;$class->event=$request->event;
    $class->gallery=$request->gallery;$class->notice=$request->notice;$class->calendar=$request->calendar;
    $class->role=$request->role;$class->sfee=$request->sfee;$class->stsalary=$request->stsalary;
    $class->ginfo=$request->ginfo;$class->backup=$request->backup;
    $class->save();
   return back()->with(['message' => "".__('admin.succ_update')]);
  } else{
    return back()->with(['message' => "".__('admin.no_permission')]);
    }
   }
    public function invoice_generate(Request $request,$id)
   {
  if(count(\App\Invoice::where('session',$request->session)->where('term',$request->term)->get())>0){
    $class=\App\Invoice::where('session',$request->session)->where('term',$request->term)->first(); 
  }
  elseif(count(\App\Invoice::where('session',$request->session)->where('term',$request->term)->get())==0){
    $class=new \App\Invoice;
  }
    $class->token=$request->token;
    $class->class_id=$id;
    $class->session=$request->session;
    $class->term=$request->term;
    $class->inv_date=$request->inv_date;
    $class->due_date=$request->due_date;
    $class->save();
    return back()->with(['message' => 'Invoice Generated for '.\App\Course::find($id)->title.' Successfully']);
   }
   public function edit_class(Request $request,$id)
   {
    if(\Auth::user()->role!=='demo'&&\App\Role::where('staff_id',\Auth::user()->id)->first()->class=='1'){
    $class=Course::find($id);
    $class->title=$request->name;
    $class->capacity=$request->capacity;
    $class->code=$request->code;
    $class->save();
   return back()->with(['message' => "".__('admin.succ_update')]);
  } else{
    return back()->with(['message' => "".__('admin.no_permission')]);
    }
   }
    public function subject_type(Request $request)
   {
    if(\Auth::user()->role!=='demo'&&\App\Role::where('staff_id',\Auth::user()->id)->first()->class=='1'){
   	$class=new Subjecttype;
   	$class->title=$request->title;
   	$class->code=$request->code;
   	$class->description=$request->description;
   	$class->option=$request->option;
   	$class->save();
    return back()->with(['message' => "".__('admin.succ_update')]);
  } else{
    return back()->with(['message' => "".__('admin.no_permission')]);
    }
   }
    public function addprofile(Request $request)
   {
    $user=User::find(\Auth::user()->id);
    $user->email=$request->name;
    if($request->password!=''){
    $user->password=bcrypt($request->password);
    }
    $user->save();
    $class=\App\Teacher::where('user_table',\Auth::user()->id)->first();
    $class->username=$request->name;
     $class->google=$request->google;
     $class->twitter=$request->twitter;
     $class->facebook=$request->facebook;
     $class->instagram=$request->instagram;
    $class->password=$request->password;
    $picture = $request->file('image');
        if($picture != ""){
      $filename = time() . '.' . $picture->getClientOriginalExtension();
        Image::make($picture)->resize(1000, 850)->save(public_path('/uploads/avatars/' . $filename) );
      $class->image= $filename;
    }
    $class->save();
    if(count(\App\Profile::where('user_table',\Auth::user()->id)->get())>0){
     $profile=\App\Profile::where('user_table',\Auth::user()->id)->first(); 
    }
    elseif(count(\App\Profile::where('user_table',\Auth::user()->id)->get())==0){
    $profile=new \App\Profile;
  }
    $profile->style=$request->style;
    $profile->user_table=\Auth::user()->id;
    $profile->save();
    return back()->with(['message' => "".__('admin.succ_update')]);
   }
   public function studentprofile(Request $request)
   {
    $user=User::find(\Auth::user()->id);
    $user->email=$request->name;
    if($request->password!=''){
    $user->password=bcrypt($request->password);
    }
    $user->save();
  if(\Auth::user()->role=='student'){
     $class=\App\Student::where('data_id',\Auth::user()->id)->first();
    $class->username=$request->name;
    $class->password=$request->password;
    $picture = $request->file('image');
        if($picture != ""){
      $filename = time() . '.' . $picture->getClientOriginalExtension();
        Image::make($picture)->resize(1000, 850)->save(public_path('/uploads/avatars/' . $filename) );
      $class->image= $filename;
    }
    $class->save();
  }
   if(\Auth::user()->role=='parent'){
     $class=\App\Parenting::where('user_id',\Auth::user()->id)->first();
    $class->email=$request->name;
    $class->password=$request->password;
    $picture = $request->file('image');
        if($picture != ""){
      $filename = time() . '.' . $picture->getClientOriginalExtension();
        Image::make($picture)->resize(1000, 850)->save(public_path('/uploads/avatars/' . $filename) );
      $class->image= $filename;
    }
    $class->save();
   }
    if(count(\App\Profile::where('user_table',\Auth::user()->id)->get())>0){
     $profile=\App\Profile::where('user_table',\Auth::user()->id)->first(); 
    }
    elseif(count(\App\Profile::where('user_table',\Auth::user()->id)->get())==0){
    $profile=new \App\Profile;
  }
    $profile->style=$request->style;
    $profile->user_table=\Auth::user()->id;
    $profile->save();
    return back()->with(['message' => "".__('admin.succ_update')]);
   }
   public function category_create(Request $request)
   {
    $class=new \App\Category;
    $class->title=$request->title;
    $class->sign=\Auth::user()->name;
    $class->save();
    return view('admin.course.show_category');
   }
   public function adddivision(Request $request)
   {
  if(\Auth::user()->role!=='demo'&&\App\Role::where('staff_id',\Auth::user()->id)->first()->result_setting=='1'){
    $class=\App\Resultsetting::first();
    $class->sattend=$request->sattend;
    $class->division=$request->division;
    $class->personal=$request->personal;
   $class->physical=$request->physical;
   $class->position=$request->position;
    $class->web=$request->web;
    $class->save();
     return back()->with(['message' => "".__('admin.succ_update')]);
  } else{
    return back()->with(['message' => "".__('admin.no_permission')]);
    }
   }
   public function category_edit(Request $request,$id)
   {

    $class=\App\Category::find($id);
    $class->title=$request->title;
    $class->sign=\Auth::user()->name;
    $class->save();
    return back()->with(['message' => 'Category edited Successfully']);
   }
   public function change_status(Request $request,$id)
   {
    if(\Auth::user()->role!=='demo'&&\App\Role::where('staff_id',\Auth::user()->id)->first()->requestn=='1'){
    $class=\App\Borrow::find($id);
    $class->book=$request->book;
    $class->idate=$request->idate;
    $class->rdate=$request->rdate;
    $class->status=$request->status;
    $class->save();
   return back()->with(['message' => "".__('admin.succ_update')]);
  } else{
    return back()->with(['message' => "".__('admin.no_permission')]);
    }
   }

   public function add_about(Request $request)
   {
     if(\Auth::user()->role!=='demo'&&\App\Role::where('staff_id',\Auth::user()->id)->first()->front=='1'){
    $class=new \App\Frontabout;
    $class->title=$request->title;
    $class->status=$request->status;
    $class->content=$request->content;
    $class->category=$request->category;
    $class->save();
    return back()->with(['message' => "".__('admin.succ_create')]);
  } else{
    return back()->with(['message' => "".__('admin.no_permission')]);
    }
   }
   public function edit_about(Request $request,$id)
   {
     if(\Auth::user()->role!=='demo'&&\App\Role::where('staff_id',\Auth::user()->id)->first()->front=='1'){
    $class=\App\Frontabout::find($id);
    $class->title=$request->title;
    $class->status=$request->status;
    $class->content=$request->content;
    $class->category=$request->category;
    $class->save();
     return back()->with(['message' => "".__('admin.succ_update')]);
  } else{
    return back()->with(['message' => "".__('admin.no_permission')]);
    }
   }
   public function edit_vidsection(Request $request)
   {
     if(\Auth::user()->role!=='demo'&&\App\Role::where('staff_id',\Auth::user()->id)->first()->front=='1'){
    $class=\App\Frontpage::first();
    $class->title=$request->title;
    $class->videourl=$request->videourl;
    $class->back_color=$request->back_color;
    $class->student_num=$request->student_num;
    $class->teacher_num=$request->teacher_num;
    $class->pass_num=$request->pass_num;
    $class->satisfact_num=$request->satisfact_num;
    $picture1 = $request->file('thumbnail');
        if($picture1 != ""){
      $filename1 = time() . '.' . $picture1->getClientOriginalExtension();
        Image::make($picture1)->resize(1000, 820)->save(public_path('/uploads/frontend/' . $filename1) );
      $class->thumbnail= $filename1;
    }
    $picture2 = $request->file('highlight');
        if($picture2 != ""){
      $filename2 = time() . '.' . $picture2->getClientOriginalExtension();
        Image::make($picture2)->resize(1900, 1200)->save(public_path('/uploads/frontend/' . $filename2) );
      $class->highlight= $filename2;
    }
    $picture3 = $request->file('testimonial');
        if($picture3 != ""){
      $filename3 = time() . '.' . $picture3->getClientOriginalExtension();
        Image::make($picture3)->resize(1900, 1200)->save(public_path('/uploads/frontend/' . $filename3) );
      $class->testimonial= $filename3;
    }
    $class->save();
     return back()->with(['message' => "".__('admin.succ_create')]);
  } else{
    return back()->with(['message' => "".__('admin.no_permission')]);
    }
   }
   public function about_page(Request $request)
   {
    if(\Auth::user()->role!=='demo'&&\App\Role::where('staff_id',\Auth::user()->id)->first()->front=='1'){
    $class=\App\Frontcategory::first();
    $picture1 = $request->file('file');
    $picture2 = $request->file('image');
        if($picture1 != ""){
      $filename1 = time() . '.' . $picture1->getClientOriginalExtension();
        $img =Image::make($picture1)->resize(242,268)->save(public_path('/uploads/frontend/' . $filename1) );
      $class->head_image= $filename1;
    }
    if($picture2 != ""){
      $filename2 = time() . '.' . $picture2->getClientOriginalExtension();
        $img =Image::make($picture2)->resize(770,326)->save(public_path('/uploads/frontend/' . $filename2) );
      $class->image= $filename2;
    }
    $class->head_tag=$request->title;
    $class->body_title=$request->body_title;
    $class->body_describe=$request->body_describe;
    $class->head_describe=$request->description;
    $class->save();
      return back()->with(['message' => "".__('admin.succ_update')]);
  } else{
    return back()->with(['message' => "".__('admin.no_permission')]);
    }
   }
    public function about_feature(Request $request)
   {
    if(\Auth::user()->role!=='demo'&&\App\Role::where('staff_id',\Auth::user()->id)->first()->front=='1'){
    $class=new \App\Frontlist;
    $class->title=$request->title;
    $class->status=$request->status;
    $class->description=$request->description;
    $class->save();
      return back()->with(['message' => "".__('admin.succ_update')]);
  } else{
    return back()->with(['message' => "".__('admin.no_permission')]);
    }
   }
   public function add_frontgallery(Request $request)
   {
     if(\Auth::user()->role!=='demo'&&\App\Role::where('staff_id',\Auth::user()->id)->first()->front=='1'){
    $class=new \App\Frontgallery;
    $picture1 = $request->file('file');
        if($picture1 != ""){
      $filename1 = time() . '.' . $picture1->getClientOriginalExtension();
        $img =Image::make($picture1)->resize(1920,600)->save(public_path('/uploads/frontend/' . $filename1) );
      $class->image= $filename1;
      $class->size=$img->filesize();
    }
    $class->title=$request->title;
    $class->status=$request->status;
    $class->description=$request->description;
    $class->save();
      return back()->with(['message' => "".__('admin.succ_update')]);
  } else{
    return back()->with(['message' => "".__('admin.no_permission')]);
    }
   }
    public function edit_sliden(Request $request,$id)
   {
 if(\Auth::user()->role!=='demo'&&\App\Role::where('staff_id',\Auth::user()->id)->first()->front=='1'){
    $class=\App\Frontgallery::find($id);
    $picture1 = $request->file('file');
        if($picture1 != ""){
      $filename1 = time() . '.' . $picture1->getClientOriginalExtension();
        $img =Image::make($picture1)->resize(1920,600)->save(public_path('/uploads/frontend/' . $filename1) );
      $class->image= $filename1;
      $class->size=$img->filesize();
    }
    $class->title=$request->title;
    $class->status=$request->status;
    $class->description=$request->description;
    $class->save();
     return back()->with(['message' => "".__('admin.succ_create')]);
  } else{
    return back()->with(['message' => "".__('admin.no_permission')]);
    }
   }
    public function add_fronture(Request $request)
   {
    if(\Auth::user()->role!=='demo'&&\App\Role::where('staff_id',\Auth::user()->id)->first()->front=='1'){
    $class=new \App\Frontpage;
    $picture1 = $request->file('file');
        if($picture1 != ""){
      $filename1 = time() . '.' . $picture1->getClientOriginalExtension();
        $img =Image::make($picture1)->resize(242,268)->save(public_path('/uploads/frontend/' . $filename1) );
      $class->image= $filename1;
      $class->size=$img->filesize();
    }
    $class->title=$request->title;
     $class->status=$request->status;
    $class->description=$request->description;
    $class->save();
     return back()->with(['message' => "".__('admin.succ_create')]);
  } else{
    return back()->with(['message' => "".__('admin.no_permission')]);
    }
   }
   public function edit_feat(Request $request,$id)
   {
    if(\Auth::user()->role!=='demo'&&\App\Role::where('staff_id',\Auth::user()->id)->first()->front=='1'){
    $class=\App\Frontpage::find($id);
    $picture1 = $request->file('file');
        if($picture1 != ""){
      $filename1 = time() . '.' . $picture1->getClientOriginalExtension();
        $img =Image::make($picture1)->resize(242,268)->save(public_path('/uploads/frontend/' . $filename1) );
      $class->image= $filename1;
      $class->size=$img->filesize();
    }
    $class->title=$request->title;
     $class->status=$request->status;
    $class->description=$request->description;
    $class->save();
     return back()->with(['message' => "".__('admin.succ_update')]);
  } else{
    return back()->with(['message' => "".__('admin.no_permission')]);
    }
   }
   public function edit_headdescribe(Request $request)
   {
     if(\Auth::user()->role!=='demo'&&\App\Role::where('staff_id',\Auth::user()->id)->first()->front=='1'){
    $class=\App\Frontpage::first();
    $class->course_description=$request->course_description;
    $class->teacher_description=$request->teacher_description;
    $class->alumni_description=$request->alumni_description;
    $class->why_description=$request->why_description;
    $class->save();
    return back()->with(['message' => "".__('admin.succ_update')]);
  } else{
    return back()->with(['message' => "".__('admin.no_permission')]);
    }
   }
    public function add_slide(Request $request)
   {
     if(\Auth::user()->role!=='demo'&&\App\Role::where('staff_id',\Auth::user()->id)->first()->front=='1'){
    $class=\App\Frontcategory::first();
    $class->dom2=$request->dom2;
    $class->dom3=$request->dom3;
    $class->dom4=$request->dom4;
    $class->dom5=$request->dom5;
    $class->dom6=$request->dom6;
    $class->dom7=$request->dom7;
    $class->save();
     return back()->with(['message' => "".__('admin.succ_update')]);
  } else{
    return back()->with(['message' => "".__('admin.no_permission')]);
    }
  }
   public function edit_slide(Request $request,$id)
   {
     if(\Auth::user()->role!=='demo'&&\App\Role::where('staff_id',\Auth::user()->id)->first()->front=='1'){
    $class=\App\Frontgallery::find($id);
    $class->description=$request->description;
    $class->status=$request->status;
     $picture = $request->file('file');
        if($picture != ""){
      $filename = time() . '.' . $picture->getClientOriginalExtension();
        Image::make($picture)->resize(1900, 1200)->save(public_path('/uploads/frontend/' . $filename) );
      $class->image= $filename;
    }
    $class->save();
      return back()->with(['message' => "".__('admin.succ_update')]);
  } else{
    return back()->with(['message' => "".__('admin.no_permission')]);
    }
  }
   public function course_create(Request $request)
   {
    $class=new \App\Work;
    $class->title=$request->title;
    $class->status='0';
    $class->description=$request->description;
    $class->level=$request->level;
    $class->lang=$request->lang;
    $class->detail=$request->detail;
    $class->price=$request->price;
    $class->days=$request->days;
    $class->rprice=$request->rprice;
    $class->idn=\Auth::user()->id;
    $class->instructor=\Auth::user()->name;
    $class->category=$request->category;
    $class->subcategory=$request->subcategory;
     $picture = $request->file('file');
        if($picture != ""){
      $filename = time() . '.' . $picture->getClientOriginalExtension();
        Image::make($picture)->resize(600, 600)->save(public_path('/uploads/thumbnail/' . $filename) );
      $class->file= $filename;
    }
    $class->save();
     $input=$request->all();
      for($i=0; $i <= count($input['result']); $i++){
    if(empty($input['result'][$i])) continue;
        $data1 = [
         'course_id'=>$class->id,
        'title'=>$input['result'][$i],
            ];
         $dataSet1[] = $data1;
      }
      foreach ($dataSet1 as $key ) {
        \DB::table('outcomes')->insert($key);
      }
      for($i=0; $i <= count($input['require']); $i++){
    if(empty($input['require'][$i])) continue;
        $data2 = [
         'course_id'=>$class->id,
        'title'=>$input['require'][$i],
            ];
         $dataSet2[] = $data2;
      }
      foreach ($dataSet2 as $key2 ) {
        \DB::table('requires')->insert($key2);
      }
    return back()->with(['message' => 'New Course has been created Successfully']);
   }
   public function add_gcategory(Request $request)
   {
     if(\Auth::user()->role!=='demo'&&\App\Role::where('staff_id',\Auth::user()->id)->first()->gallery=='1'){
     $input=$request->all();
      for($i=0; $i <= count($input['title']); $i++){
    if(empty($input['title'][$i])) continue;
        $data1 = [
        'title'=>$input['title'][$i],
            ];
         $dataSet1[] = $data1;
          if(count(\App\Gcategory::all())>0){
        \App\Gcategory::where('title',$input['title'][$i])->delete();
      }
      }
     
      foreach ($dataSet1 as $key ) {
        \DB::table('gcategories')->insert($key);
      }
      return back()->with(['message' => "".__('admin.succ_create')]);
  } else{
    return back()->with(['message' => "".__('admin.no_permission')]);
    }

   }
   public function course_edit(Request $request,$id)
   {
    $class=\App\Work::find($id);
    $class->title=$request->title;
    $class->description=$request->description;
    $class->level=$request->level;
    $class->lang=$request->lang;
    $class->detail=$request->detail;
     $class->price=$request->price;
    $class->days=$request->days;
    $class->rprice=$request->rprice;
    $class->category=$request->category;
    $class->subcategory=$request->subcategory;
     $picture = $request->file('file');
        if($picture != ""){
      $filename = time() . '.' . $picture->getClientOriginalExtension();
        Image::make($picture)->resize(600, 600)->save(public_path('/uploads/thumbnail/' . $filename) );
      $class->file= $filename;
    }
    $class->save();
     $input=$request->all();
      for($i=0; $i <= count($input['result']); $i++){
    if(empty($input['result'][$i])) continue;
        $data1 = [
         'course_id'=>$class->id,
        'title'=>$input['result'][$i],
            ];
         $dataSet1[] = $data1;
      }
      if(count(\App\Outcome::where('course_id',$id)->get())>0){
       \App\Outcome::where('course_id',$id)->delete(); 
      }
      foreach ($dataSet1 as $key ) {
        \DB::table('outcomes')->insert($key);
      }
      for($i=0; $i <= count($input['require']); $i++){
    if(empty($input['require'][$i])) continue;
        $data2 = [
         'course_id'=>$class->id,
        'title'=>$input['require'][$i],
            ];
         $dataSet2[] = $data2;
      }
      if(count(\DB::table('requires')->where('course_id',$id)->get())>0){
      \DB::table('requires')->where('course_id',$id)->delete(); 
      }
      foreach ($dataSet2 as $key2 ) {
        \DB::table('requires')->insert($key2);
      }
    return back()->with(['message' => 'Course has been edited Successfully']);
   }
   public function staiss_create(Request $request)
   {
     if(\Auth::user()->role!=='demo'&&\App\Role::where('staff_id',\Auth::user()->id)->first()->requestn=='1'){
    $class=new \App\Borrow;
    $class->collector=$request->staff;
    $class->book=$request->book;
    $class->idate=$request->idate;
    $class->rdate=$request->rdate;
    $class->status='Not Returned';
    $class->dom1='staff';
    $class->sign=\Auth::user()->name;
    $class->save();
    return back()->with(['message' => "".__('admin.succ_update')]);
  } else{
    return back()->with(['message' => "".__('admin.no_permission')]);
    }

   }
    public function edit_type(Request $request,$id)
   {
     if(\Auth::user()->role!=='demo'&&\App\Role::where('staff_id',\Auth::user()->id)->first()->class=='1'){
    $class=Subjecttype::find($id);
    $class->title=$request->title;
    $class->code=$request->code;
    $class->description=$request->description;
    $class->option=$request->option;
    $class->save();
     return back()->with(['message' => "".__('admin.succ_update')]);
  } else{
    return back()->with(['message' => "".__('admin.no_permission')]);
    }
   }
   public function default_login(Request $request)
   {
    $class=\App\Provider::first();
    $class->username=$request->username;
    $class->password=$request->password;
    $class->save();
    return back()->with(['message' => 'Default Login Detail created Successfully']);
   }
   public function mark_course(Request $request,$id)
   {
    $class=\App\Work::find($id);
    $class->status=$request->status;
    $class->save();
    if($request->status=='0')
    {
 return back()->with(['message' => 'Course '.\App\Work::find($id)->title.' has been Suspended']);
    }
    elseif($request->status=='1')
    {
     return back()->with(['message' => 'Course '.\App\Work::find($id)->title.' has been Activated']);  
    }
   }
   public function book_create(Request $request)
   {
     if(\Auth::user()->role!=='demo'&&\App\Role::where('staff_id',\Auth::user()->id)->first()->inventory=='1'){
    $class=new \App\Inventory;
    $class->title=$request->title;
    $class->author=$request->author;
    $class->edition=$request->edition;
    $class->total=$request->total;
    $class->category=$request->category;
    $class->class=$request->class;
    $class->save();
    return back()->with(['message' => "".__('admin.succ_create')]);
  } else{
    return back()->with(['message' => "".__('admin.no_permission')]);
    }
   }
   public function result_config(Request $request)
   {
     if(\Auth::user()->role!=='demo'&&\App\Role::where('staff_id',\Auth::user()->id)->first()->result_setting=='1'){
    $class=\App\Resultconfig::first();
    $class->dis_val=$request->dis_val;
    $class->dis_att=$request->dis_att;
    $class->dis_start=$request->dis_start;
    $class->dis_end=$request->dis_end;
    $class->vg_val=$request->vg_val;
    $class->vg_att=$request->vg_att;
    $class->vg_start=$request->vg_start;
    $class->vg_end=$request->vg_end;
    $class->good_val=$request->good_val;
    $class->good_att=$request->good_att;
    $class->good_start=$request->good_start;
    $class->good_end=$request->good_end;
    $class->fg_val=$request->fg_val;
    $class->fg_att=$request->fg_att;
    $class->fg_start=$request->fg_start;
    $class->fg_end=$request->fg_end;
    $class->av_val=$request->av_val;
    $class->av_att=$request->av_att;
    $class->av_start=$request->av_start;
    $class->av_end=$request->av_end;
    $class->weak_val=$request->weak_val;
    $class->weak_att=$request->weak_att;
    $class->weak_start=$request->weak_start;
    $class->weak_end=$request->weak_end;
    $class->vw_val=$request->vw_val;
    $class->vw_att=$request->vw_att;
    $class->vw_start=$request->vw_start;
    $class->vw_end=$request->vw_end;
    $class->start_percent=$request->start_percent;
    $class->test_percent=$request->test_percent;
    $class->project_percent=$request->project_percent;
    $class->exam_percent=$request->exam_percent;
    $class->save();
    return back()->with(['message' => "".__('admin.succ_update')]);
  } else{
    return back()->with(['message' => "".__('admin.no_permission')]);
    }
   }
   public function result_phrase(Request $request)
   {
  if(\Auth::user()->role!=='demo'&&\App\Role::where('staff_id',\Auth::user()->id)->first()->result_setting=='1'){
    $class=\App\Resultphrase::first();
    $class->result_sheet=$request->result_sheet;
    $class->name=$request->name;
    $class->sex=$request->sex;
    $class->term=$request->term;
    $class->year=$request->year;
    $class->class=$request->class;
    $class->number_class=$request->number_class;
    $class->max_mark=$request->max_mark;
    $class->mid_term=$request->mid_term;
    $class->project=$request->project;
    $class->exam=$request->exam;
    $class->total_score=$request->total_score;
    $class->class_average=$request->class_average;
    $class->grade=$request->grade;
    $class->remark=$request->remark;
    $class->excellent=$request->excellent;
    $class->high_degree=$request->high_degree;
    $class->accept_level=$request->accept_level;
    $class->poor_level=$request->poor_level;
    $class->indifferent=$request->indifferent;
    $class->key_rating=$request->key_rating;
    $class->physical_dev=$request->physical_dev;
    $class->height=$request->height;
    $class->weight=$request->weight;
    $class->beg_term=$request->beg_term;
    $class->end_term=$request->end_term;
    $class->fac_rem=$request->fac_rem;
    $class->head_rem=$request->head_rem;
     $class->signature=$request->signature;
    $class->date=$request->date;
    $class->class_fac=$request->class_fac;
    $class->average_score=$request->average_score;
    $class->promotion=$request->promotion;
     $class->age=$request->age;
     $class->rate=$request->rate;
    $class->time_open=$request->time_open;
    $class->time_present=$request->time_present;
    $class->term_begin=$request->term_begin;
     $class->adm_no=$request->adm_no;
     $class->time_punctual=$request->time_punctual;
    $class->time_late=$request->time_late;
    $class->time_absent=$request->time_absent;
    $class->cont_asses=$request->cont_asses;
    $class->attend=$request->attend;
     $class->school=$request->school;
     $class->sport=$request->sport;
    $class->other=$request->other;
    $class->position=$request->position;
    $class->retain=$request->retain;
    $class->start_term=$request->start_term;
    $class->save();
    return back()->with(['message' => "".__('admin.succ_update')]);
  } else{
    return back()->with(['message' => "".__('admin.no_permission')]);
    }
   }
   public function ebook_create(Request $request)
   {
    if(\Auth::user()->role!=='demo'&&\App\Role::where('staff_id',\Auth::user()->id)->first()->inventory=='1'){
    $class=new \App\Ebook;
    $class->name=$request->name;
    $class->description=$request->description;
    $class->author=$request->author;
    $class->price=$request->price;
    $class->subject=$request->subject;
    $class->class=$request->class;
    $File=$request->file('file');
      if($File != ''){
      $extension = $File->getClientOriginalExtension();
      \Storage::disk('local')->put($File->getFilename().'.'.$extension,File::get($File));
       $class->mime=$File->getClientMimeType();
     $class->file=$File->getFilename().'.'.$extension;
    }
    $class->save();
    return back()->with(['message' => "".__('admin.succ_create')]);
  } else{
    return back()->with(['message' => "".__('admin.no_permission')]);
    }
   }
    public function edit_ebook(Request $request,$id)
   {
     if(\Auth::user()->role!=='demo'&&\App\Role::where('staff_id',\Auth::user()->id)->first()->inventory=='1'){
    $class=\App\Ebook::find($id);
    $class->name=$request->name;
    $class->description=$request->description;
    $class->author=$request->author;
    $class->price=$request->price;
    $class->subject=$request->subject;
    $class->class=$request->class;
    $File=$request->file('file');
      if($File != ''){
      $extension = $File->getClientOriginalExtension();
      \Storage::disk('local')->put($File->getFilename().'.'.$extension,File::get($File));
       $class->mime=$File->getClientMimeType();
     $class->file=$File->getFilename().'.'.$extension;
    }
    $class->save();
    return back()->with(['message' => "".__('admin.succ_update')]);
  } else{
    return back()->with(['message' => "".__('admin.no_permission')]);
    }
   }
   public function subject(Request $request,$id)
   {
     if(\Auth::user()->role!=='demo'&&\App\Role::where('staff_id',\Auth::user()->id)->first()->class=='1'){
     $input=$request->all();
      for($i=0; $i <= count($input['title']); $i++){
    if(empty($input['title'][$i])) continue;
        $data1 = [
         'class'=>$id,
        'title'=>$input['title'][$i],
        'code'=>$input['code'][$i],
            ];
         $dataSet1[] = $data1;
      }
      if(count(\App\Subject::where('class',$id)->get())>0)
      {
\App\Subject::where('class',$id)->delete();
      }
      foreach ($dataSet1 as $key ) {
        \DB::table('subjects')->insert($key);
      }
    return back()->with(['message' => "".__('admin.succ_create')]);
  } else{
    return back()->with(['message' => "".__('admin.no_permission')]);
    }
   }
   public function staff_pay(Request $request,$id)
   {
   if(\Auth::user()->role!=='demo'&&\App\Role::where('staff_id',\Auth::user()->id)->first()->payroll=='1'){
    $class=new \App\Pay;
    $class->staff_id=$id;
    $class->receipt_id=\Carbon\Carbon::now()->format('dYi').\mt_rand(00, 99);;
    $class->amount=\App\Salary::where('user_id',$id)->sum('price')-$request->deduct;
    $class->deduct=$request->deduct;
    $class->reason=$request->reason;
    $class->sign=\Auth::user()->name;
    $class->date=$request->date;
    $class->save();
    return back()->with(['message' => "".__('admin.succ_create')]);
  } else{
    return back()->with(['message' => "".__('admin.no_permission')]);
    }
   }
   public function add_intstruct(Request $request)
   {
    $class=new \App\Instructor;
    $class->user_id=\App\Teacher::find($request->staff)->user_table;
    $class->name=\App\Teacher::find($request->staff)->gname.' '.\App\Teacher::find($request->staff)->fname;
    $class->type='internal';
    $class->save();
    return back()->with(['message' => 'Internal Instructor created Successfully']);
   }
   public function add_extstruct(Request $request)
   {
    $user=new User;
    $user->name=$request->name;
    $user->email=$request->username;
    $user->password=\bcrypt($request->password);
    $user->save();
    $class=new \App\Instructor;
    $class->user_id=$user->id;
    $class->name=$request->name;
    $class->email=$request->email;
    $class->type='external';
    $class->save();
    return back()->with(['message' => 'External Instructor created Successfully']);
   }
   public function changestatus(Request $request,$id)
   {
    $class=\App\Enroll::find($id);
    $class->plan=$request->plan;
    $class->date=$request->date;
    $class->status=$request->status;
    $class->save();
    $enroll=\App\Subscription::where('enroll_id',$id)->first();
    if($request->status=='1'){
     $enroll->status='1';
    $enroll->save();
    return back()->with(['message' => 'Student Enrollment Status is Active']);  
    }
    elseif($request->status=='2'){
     $enroll->status='0';
    $enroll->save();
    return back()->with(['message' => 'Student Enrollment Status is Suspended']);  
    }
    elseif($request->status=='0'){
     $enroll->status='0';
    $enroll->save();
    return back()->with(['message' => 'Student Enrollment Status is Pending']);  
    }
   
   }
   public function addplan(Request $request)
   {
    $class=new \App\Plan;
    $class->token=$request->token;
    $class->name=$request->name;
    $class->duration=$request->duration;
    $class->description=$request->description;
    $class->price=$request->price;
    $class->save();
    return back()->with(['message' => 'Enrollment Plan created Successfully']);
   }
   public function enrolstaff(Request $request)
   {
    $class=new \App\Enroll;
    $class->user_id=$request->staff;
    $class->name=\App\Student::find($request->staff)->gname.' '.\App\Student::find($request->staff)->fname;
    $class->plan=$request->plan;
    $class->status=$request->status;
    $class->type='internal';
     $class->save();
     $input=$request->all();
      for($i=0; $i <= count($input['course']); $i++){
    if(empty($input['course'][$i])) continue;
        $data1 = [
         'enroll_id'=>$class->id,
        'course_id'=>$input['course'][$i],
        'status'=>'0',
            ];
         $dataSet1[] = $data1;
      }
      foreach ($dataSet1 as $key ) {
        \DB::table('subscriptions')->insert($key);
      }
    return back()->with(['message' => 'Internal Student has been Enrolled Successfully']);
   }
    public function accept_pay(Request $request,$id)
   {
if(\Auth::user()->role!=='demo'&&\App\Role::where('staff_id',\Auth::user()->id)->first()->pay=='1'){
    $class=new \App\Fpayment;
    $class->student_id=$id;
    $class->class=\App\Student::find($id)->class;
    $class->session=$request->session;
    $class->term=$request->term;
    $class->plan=$request->plan;
    $class->pamount=$request->pamount;
    $class->discount=$request->discount;
     $class->save();
  for($h=0;$h<\App\Plan::find($request->plan)->number;$h++){
    if($h==0){
     $pay=new \App\Feepay;
     $pay->pay_id=$class->id;
    $pay->receipt_id=$request->token;
    $pay->sign=\Auth::user()->name;
     $pay->amount=$request->total;
     $pay->index=$h;
        $pay->status='1';
     $pay->method='Direct Pay';
     $pay->type='7';
     $pay->save();
    }
    else{
    $pay=new \App\Feepay;
     $pay->pay_id=$class->id;
    $pay->receipt_id=\Keygen1::numeric(7)->generate();
    $pay->sign='';
    if($request->discount==0){
$pay->amount=$request->pamount*(\App\Planlist::where('plan_id',$request->plan)->where('index',$h)->first()->percent/100);
    }
    else{
$pay->amount=$request->pamount*($request->discount/100)*(\App\Planlist::where('plan_id',$request->plan)->where('index',$h)->first()->percent/100);
    }
  $pay->index=$h;
       $pay->status='0';
     $pay->method='';
     $pay->type='';
     $pay->save();  
    }
    }
   
     $input=$request->all();
      for($i=0; $i <= count($input['amount']); $i++){
    if(empty($input['amount'][$i])) continue;
        $data1 = [
         'pay_id'=>$class->id,
         'student_id'=>$id,
        'item_id'=>$input['name'][$i],
        'amount'=>$input['amount'][$i],
        'type'=>'7',
        'status'=>'1',
            ];
         $dataSet1[] = $data1;
      }
      foreach ($dataSet1 as $key ) {
        \DB::table('fpayitems')->insert($key);
      }
    return back()->with(['message' => ''.\App\Student::find($id)->gname.' '.\App\Student::find($id)->fname.', '.__('admin.payn_succ')]);
  } else{
    return back()->with(['message' => "".__('admin.no_permission')]);
    }

   }
   public function remain_pay(Request $request,$id){
    if(\Auth::user()->role!=='demo'&&\App\Role::where('staff_id',\Auth::user()->id)->first()->pay=='1'){
    $pay=\App\Feepay::find($id);
    $pay->sign=\Auth::user()->name;
     $pay->amount=$request->amount;
     $pay->status='1';
     $pay->method='Direct Pay';
     $pay->type='7';
     $pay->save();
     return back()->with(['message' => "".__('admin.payn_succ')]);
  } else{
    return back()->with(['message' => "".__('admin.no_permission')]);
    }
   }
   public function  verify_pay(Request $request,$id){
     if(\Auth::user()->role!=='demo'&&\App\Role::where('staff_id',\Auth::user()->id)->first()->pay=='1'){
    $pay=\App\Feepay::find($id);
     $pay->status=$request->status;
     $pay->save();
      return back()->with(['message' => "".__('admin.succ_update')]);
  } else{
    return back()->with(['message' => "".__('admin.no_permission')]);
    }
   }
   public function editenroll(Request $request,$id)
   {
    $class=\App\Enroll::find($id);
    $class->name=\App\Student::find($request->staff)->gname.' '.\App\Student::find($request->staff)->fname;
    $class->plan=$request->plan;
     $class->save();
     $input=$request->all();
      for($i=0; $i <= count($input['course']); $i++){
    if(empty($input['course'][$i])) continue;
        $data1 = [
         'enroll_id'=>$id,
        'course_id'=>$input['course'][$i],
            ];
         $dataSet1[] = $data1;
      }
    if(count(\App\Subscription::where('enroll_id',$id)->get())>0){
      \App\Subscription::where('enroll_id',$id)->delete();
    }
      foreach ($dataSet1 as $key ) {
        \DB::table('subscriptions')->insert($key);
      }
    return back()->with(['message' => 'Student has been Enrollment edited Successfully']);
   }
   public function enrolstudent(Request $request)
   {
    $user=new User;
    $user->name=$request->name;
    $user->email=$request->username;
    $user->password=\bcrypt($request->password);
    $user->save();
    $class=new \App\Enroll;
    $class->user_id=$user->id;
     $class->name=$request->name;
    $class->email=$request->email;
    $class->plan=$request->plan;
    $class->status=$request->status;
    $class->type='external';
     $class->save();
     $input=$request->all();
      for($i=0; $i <= count($input['course']); $i++){
    if(empty($input['course'][$i])) continue;
        $data1 = [
         'enroll_id'=>$class->id,
        'course_id'=>$input['course'][$i],
         'status'=>'0',
            ];
         $dataSet1[] = $data1;
      }
      foreach ($dataSet1 as $key ) {
        \DB::table('subscriptions')->insert($key);
      }
    return back()->with(['message' => 'Staff has been Enrolled Successfully']);
   }
   public function add_lesson(Request $request,$id)
   {
    $class=new \App\Lesson;
    $class->course_id=$id;
    $class->title=$request->title;
    $class->duration=$request->duration;
    $class->section=$request->section;
    $class->project=$request->project;
    $class->index=$request->index;
    $class->status=$request->status;
    $class->video=$request->video;
    $class->provider=$request->provider;
     $picture = $request->file('file');
        if($picture != ""){
      $filename = time() . '.' . $picture->getClientOriginalExtension();
        Image::make($picture)->resize(600, 600)->save(public_path('/uploads/thumbnail/' . $filename) );
      $class->image= $filename;
    }
    $class->save();
    return back()->with(['message' => 'Lesson created Successfully']);
   }
   public function edit_lesson(Request $request,$id)
   {
    $class=\App\Lesson::find($id);
    $class->title=$request->title;
    $class->duration=$request->duration;
    $class->section=$request->section;
    $class->video=$request->video;
     $class->project=$request->project;
    $class->index=$request->index;
    $class->status=$request->status;
    $class->provider=$request->provider;
     $picture = $request->file('file');
        if($picture != ""){
      $filename = time() . '.' . $picture->getClientOriginalExtension();
        Image::make($picture)->resize(600, 600)->save(public_path('/uploads/thumbnail/' . $filename) );
      $class->image= $filename;
    }
    $class->save();
    return back()->with(['message' => 'Lesson edited Successfully']);
   }
   public function add_gallery(Request $request)
   {
   if(\Auth::user()->role!=='demo'&&\App\Role::where('staff_id',\Auth::user()->id)->first()->gallery=='1'){
    $class=new \App\Gallery;
    $class->session=$request->session;
    $class->caption=$request->caption;
    $class->status=$request->status;
    $class->category=$request->category;
    $picture = $request->file('file');
        if($picture != ""){
      $filename = time() . '.' . $picture->getClientOriginalExtension();
        Image::make($picture)->resize(890, 563)->save(public_path('/uploads/gallery/' . $filename) );
      $class->image= $filename;
    }
    $class->save();
   return back()->with(['message' => "".__('admin.succ_create')]);
  } else{
    return back()->with(['message' => "".__('admin.no_permission')]);
    }
   }
   public function add_testimony(Request $request)
   {
   if(\Auth::user()->role!=='demo'&&\App\Role::where('staff_id',\Auth::user()->id)->first()->front=='1'){
    $class=new \App\Testimonial;
    $class->name=$request->name;
    $class->grad=$request->grad;
    $class->job=$request->job;
    $class->content=$request->description;
    $class->status=$request->status;
    $picture = $request->file('file');
        if($picture != ""){
      $filename = time() . '.' . $picture->getClientOriginalExtension();
        Image::make($picture)->resize(242, 268)->save(public_path('/uploads/frontend/' . $filename) );
      $class->image= $filename;
    }
    $class->save();
    return back()->with(['message' => "".__('admin.succ_create')]);
  } else{
    return back()->with(['message' => "".__('admin.no_permission')]);
    }
   }
   public function edit_testimony(Request $request,$id)
   {
  if(\Auth::user()->role!=='demo'&&\App\Role::where('staff_id',\Auth::user()->id)->first()->front=='1'){
    $class=\App\Testimonial::find($id);
    $class->name=$request->name;
    $class->grad=$request->grad;
    $class->job=$request->job;
    $class->content=$request->description;
    $class->status=$request->status;
    $picture = $request->file('file');
        if($picture != ""){
      $filename = time() . '.' . $picture->getClientOriginalExtension();
        Image::make($picture)->resize(242, 268)->save(public_path('/uploads/frontend/' . $filename) );
      $class->image= $filename;
    }
    $class->save();
    return back()->with(['message' => "".__('admin.succ_update')]);
  } else{
    return back()->with(['message' => "".__('admin.no_permission')]);
    }
   }
   public function add_future(Request $request)
   {
  if(\Auth::user()->role!=='demo'&&\App\Role::where('staff_id',\Auth::user()->id)->first()->front=='1'){
    $class=\App\Fronthome::first();
    $class->feature_btn_text=$request->feature_button_text;
    $class->feature_body_title=$request->feature_body_title;
    $class->feature_body_content=$request->feature_body_content;
    $class->feature_print_info=$request->feature_print_info;
    $picture = $request->file('image');
        if($picture != ""){
      $filename = time() . '.' . $picture->getClientOriginalExtension();
        Image::make($picture)->resize(770, 326)->save(public_path('/uploads/frontend/' . $filename) );
      $class->feature_back= $filename;
    }
    $class->save();
   return back()->with(['message' => "".__('admin.succ_update')]);
  } else{
    return back()->with(['message' => "".__('admin.no_permission')]);
    }
   }
    public function student_create(Request $request)
   {
   if(\Auth::user()->role!=='demo'&&\App\Role::where('staff_id',\Auth::user()->id)->first()->student=='1'){
   	$token=\Carbon\Carbon::now()->format('Ydi').\mt_rand(00, 99);
    if(count(\App\User::where('email',$token)->get())==0){
    $user=new User;
    $user->name=$request->gname.' '.$request->fname;
    $user->email=$token;
    $user->password=bcrypt('123456');
    $user->role='student';
    $user->save();
   	$class=new Student;
    $class->data_id=$user->id;
 	$class->user_id=$token;
   	$class->gname=$request->gname;
   	$class->mname=$request->mname;
   	$class->fname=$request->fname;
   	$class->faname=$request->faname;
   	$class->maname=$request->maname;
   	$class->dom1=$request->mobile;
   	$class->dob=$request->dob;
   	$class->sex=$request->sex;
   	$class->praddress=$request->praddress;
   	$class->peaddress=$request->peaddress;
   	$class->username=$token;
   	$class->password='123456';
   	$class->group=$request->group;
   	$class->poccupation=$request->foccupation;
   	$class->moccupation=$request->moccupation;
   	$class->class=$request->class;
   	$picture = $request->file('image');
        if($picture != ""){
      $filename = time() . '.' . $picture->getClientOriginalExtension();
        Image::make($picture)->resize(300, 300)->save(public_path('/uploads/avatars/' . $filename) );
      $class->image= $filename;
    }
   	$class->save();
   return back()->with(['message' => "".__('admin.succ_create')]);
   }
   if(count(\App\User::where('email',$token)->get())>0){
     return back()->with(['error' => "".__('admin.rec_error')]);
   }
    } else{
    return back()->with(['error' => "".__('admin.no_permission')]);
    }
   }
   public function student_edit(Request $request,$id)
   {
     if(\Auth::user()->role!=='demo'&&\App\Role::where('staff_id',\Auth::user()->id)->first()->student=='1'){
    $token=\Carbon\Carbon::now()->format('Ydi').\mt_rand(00, 99);
    $class=Student::find($id);
  $class->user_id=$class->user_id;
    $class->gname=$request->gname;
    $class->mname=$request->mname;
    $class->fname=$request->fname;
    $class->faname=$request->faname;
    $class->maname=$request->maname;
    $class->dom1=$request->mobile;
    $class->dob=$request->dob;
    $class->sex=$request->sex;
    $class->praddress=$request->praddress;
    $class->peaddress=$request->peaddress;
    $class->group=$request->group;
    $class->poccupation=$request->foccupation;
    $class->moccupation=$request->moccupation;
    $class->class=$request->class;
    $picture = $request->file('image');
        if($picture != ""){
      $filename = time() . '.' . $picture->getClientOriginalExtension();
        Image::make($picture)->resize(300, 300)->save(public_path('/uploads/avatars/' . $filename) );
      $class->image= $filename;
    }
    $class->save();
    return back()->with(['message' => "".__('admin.succ_update')]);
  } else{
    return back()->with(['message' => "".__('admin.no_permission')]);
    }
   }
   public function parent_create(Request $request)
   {
     if(\Auth::user()->role!=='demo'&&\App\Role::where('staff_id',\Auth::user()->id)->first()->parent=='1'){
    $token=\Carbon\Carbon::now()->format('Ydi').\mt_rand(00, 99);
    if(count(\App\User::where('email',$request->email)->get())==0){
       $user=new User;
    $user->email=$request->email;
    $user->name=$request->name;
    $user->password=\bcrypt($request->password);
    $user->role='parent';
    $user->save();
    $class=new \App\Parenting;
  $class->user_id=$user->id;
    $class->name=$request->name;
    $class->email=$request->email;
    $class->password=$request->password;
    $class->status='0';
    $class->phone=$request->phone;
    $class->address=$request->address;
    $class->work=$request->work;
    $picture = $request->file('file');
    if($picture != ""){
    $filename = time() . '.' . $picture->getClientOriginalExtension();
        Image::make($picture)->resize(300, 300)->save(public_path('/uploads/avatars/' . $filename) );
      $class->image= $filename;
    }
    $class->save();
     $input=$request->all();
      for($i=0; $i <= count($input['student']); $i++){
    if(empty($input['student'][$i])) continue;
        $data1 = [
         'parent_id'=>$class->id,
        'student_id'=>$input['student'][$i],
        'status'=>'0',
            ];
         $dataSet1[] = $data1;
      }
      foreach ($dataSet1 as $key ) {
        \DB::table('relations')->insert($key);
      }
       return back()->with(['message' => "".__('admin.succ_create')]);

    }
   if(count(\App\User::where('email',$request->email)->get())>0){
     return back()->with(['error' => "".__('admin.mai_exi')]);
 
   }
    } else{
    return back()->with(['message' => "".__('admin.no_permission')]);
    }

   }
    public function parent_edit(Request $request,$id)
   {
   if(\Auth::user()->role!=='demo'&&\App\Role::where('staff_id',\Auth::user()->id)->first()->parent=='1'){
    $token=\Carbon\Carbon::now()->format('Ydi').\mt_rand(00, 99);
    if(count(\App\User::where('email',$request->email)->get())>0){
    return back()->with(['error' => "".__('admin.mai_exi')]);
   }
  if(count(\App\User::where('email',$request->email)->get())==0){
    $user=User::find(\App\Parenting::find($id)->user_id);
    $user->email=$request->email;
    $user->name=$request->name;
    $user->password=\bcrypt($request->password);
    $user->role='parent';
    $user->save();
    $class=\App\Parenting::find($id);
  $class->user_id=$user->id;
    $class->name=$request->name;
    $class->email=$request->email;
    $class->password=$request->password;
    $class->phone=$request->phone;
    $class->address=$request->address;
    $class->work=$request->work;
    $picture = $request->file('file');
    if($picture != ""){
    $filename = time() . '.' . $picture->getClientOriginalExtension();
        Image::make($picture)->resize(300, 300)->save(public_path('/uploads/avatars/' . $filename) );
      $class->image= $filename;
    }
    $class->save();
     $input=$request->all();
      for($i=0; $i <= count($input['student']); $i++){
    if(empty($input['student'][$i])) continue;
        $data1 = [
         'parent_id'=>$class->id,
        'student_id'=>$input['student'][$i],
            ];
         $dataSet1[] = $data1;
      }
if(count(\App\Relation::where('parent_id',$id)->get())>0){
  \App\Relation::where('parent_id',$id)->delete();
}
      foreach ($dataSet1 as $key ) {
        \DB::table('relations')->insert($key);
      }
    return back()->with(['message' => "".__('admin.succ_update')]);
  }
   } else{
    return back()->with(['message' => "".__('admin.no_permission')]);
    }
   }
   public function guardian_create(Request $request)
   {
  if(\Auth::user()->role!=='demo'&&\App\Role::where('staff_id',\Auth::user()->id)->first()->parent=='1'){
    $token=\Carbon\Carbon::now()->format('Ydi').\mt_rand(00, 99);
     if(count(\App\User::where('email',$request->email)->get())>0){
    return back()->with(['error' => "".__('admin.mai_exi')]);
   }
     if(count(\App\User::where('email',$request->email)->get())==0){
    $user=new User;
    $user->email=$request->email;
    $user->name=$request->name;
    $user->password=\bcrypt($request->password);
    $user->role='guardian';
    $user->save();
    $class=new \App\Parenting;
  $class->user_id=$user->id;
    $class->name=$request->name;
    $class->email=$request->email;
    $class->password=$request->password;
    $class->status='1';
    $class->phone=$request->phone;
    $class->address=$request->address;
    $class->work=$request->work;
    $picture = $request->file('file');
    if($picture != ""){
    $filename = time() . '.' . $picture->getClientOriginalExtension();
        Image::make($picture)->resize(300, 300)->save(public_path('/uploads/avatars/' . $filename) );
      $class->image= $filename;
    }
    $class->save();
     $input=$request->all();
      for($i=0; $i <= count($input['student']); $i++){
    if(empty($input['student'][$i])) continue;
        $data1 = [
         'guardian_id'=>$class->id,
        'student_id'=>$input['student'][$i],
         'status'=>'1',
            ];
         $dataSet1[] = $data1;
      }
      foreach ($dataSet1 as $key ) {
        \DB::table('relateds')->insert($key);
      }
    return back()->with(['message' => "".__('admin.succ_create')]);
  }
   } else{
    return back()->with(['message' => "".__('admin.no_permission')]);
    }
   }
   public function guardian_edit(Request $request,$id)
   {
    if(\Auth::user()->role!=='demo'&&\App\Role::where('staff_id',\Auth::user()->id)->first()->parent=='1'){
    $token=\Carbon\Carbon::now()->format('Ydi').\mt_rand(00, 99);
     if(count(\App\User::where('email',$request->email)->get())>0){
    return back()->with(['error' => 'Error in creating Record, Email Exist!!!!']);
   }
     if(count(\App\User::where('email',$request->email)->get())==0){
    $user=User::find(\App\Guardian::find($id)->user_id);
    $user->email=$request->email;
    $user->name=$request->name;
    $user->password=\bcrypt($request->password);
    $user->role='guardian';
    $user->save();
    $class=\App\Parenting::find($id);
  $class->user_id=$user->id;
    $class->name=$request->name;
    $class->email=$request->email;
    $class->password=$request->password;
    $class->phone=$request->phone;
    $class->address=$request->address;
    $class->work=$request->work;
    $picture = $request->file('file');
    if($picture != ""){
    $filename = time() . '.' . $picture->getClientOriginalExtension();
        Image::make($picture)->resize(300, 300)->save(public_path('/uploads/avatars/' . $filename) );
      $class->image= $filename;
    }
    $class->save();
     $input=$request->all();
      for($i=0; $i <= count($input['student']); $i++){
    if(empty($input['student'][$i])) continue;
        $data1 = [
         'guardian_id'=>$class->id,
        'student_id'=>$input['student'][$i],
            ];
         $dataSet1[] = $data1;
      }
if(count(\App\Related::where('guardian_id',$id)->get())>0){
  \App\Related::where('guardian_id',$id)->delete();
}
      foreach ($dataSet1 as $key ) {
        \DB::table('relateds')->insert($key);
      }
   return back()->with(['message' => "".__('admin.succ_update')]);
  }
   } else{
    return back()->with(['message' => "".__('admin.no_permission')]);
    }
   }
    public function saward(Request $request)
   {
    if(\Auth::user()->role!=='demo'&&\App\Role::where('staff_id',\Auth::user()->id)->first()->saward=='1'){
    $class=new \App\Award;
    $class->user_id=$request->user_id;
    $class->fullname=\App\Student::find($request->user_id)->gname.' '.\App\Student::find($request->user_id)->fname;
    $class->name=$request->title;
    $class->status='0';
    $class->description=$request->description;
    $class->date=$request->date;
     $File=$request->file('file');
      if($File != ''){
      $extension = $File->getClientOriginalExtension();
      \Storage::disk('local')->put($File->getFilename().'.'.$extension,File::get($File));
       $class->mime=$File->getClientMimeType();
     $class->file=$File->getFilename().'.'.$extension;
    }
    $class->save();
   return back()->with(['message' => "".__('admin.succ_create')]);
  } else{
    return back()->with(['message' => "".__('admin.no_permission')]);
    }
   }
   public function eaward(Request $request)
   {
   if(\Auth::user()->role!=='demo'&&\App\Role::where('staff_id',\Auth::user()->id)->first()->staward=='1'){
    $class=new \App\Award;
    $class->user_id=$request->user_id;
    $class->fullname=\App\Teacher::find($request->user_id)->gname.' '.\App\Teacher::find($request->user_id)->fname;
    $class->name=$request->title;
    $class->status='1';
    $class->description=$request->description;
    $class->date=$request->date;
     $File=$request->file('file');
      if($File != ''){
      $extension = $File->getClientOriginalExtension();
      \Storage::disk('local')->put($File->getFilename().'.'.$extension,File::get($File));
       $class->mime=$File->getClientMimeType();
     $class->file=$File->getFilename().'.'.$extension;
    }
    $class->save();
    return back()->with(['message' => "".__('admin.succ_create')]);
  } else{
    return back()->with(['message' => "".__('admin.no_permission')]);
    }
   }
   public function new_teacher(Request $request)
   {
 if(\Auth::user()->role!=='demo'&&\App\Role::where('staff_id',\Auth::user()->id)->first()->staff=='1'){
   	$user=new User;
   	$user->name=$request->gname.' '.$request->mname.' '.$request->fname;
   $user->email=$request->email;
     $user->role=$request->role; 
   	$user->password=Hash::make(\App\Provider::first()->password);
    if(count(\App\User::where('email',$request->email)->get())>0)
    {
       return back()->with(['message' => "".__('admin.error_save')]);
    }
        $user->save();
    $role=new \App\Role;
    $role->staff_id=$user->id;
    $role->save();
   	$token=\Carbon\Carbon::now()->format('Ydi').\mt_rand(00, 99);
   	$class=new Teacher;
   	$class->user_table=$user->id;
 	$class->user_id=$request->token;
   	$class->gname=$request->gname;
   	$class->mname=$request->mname;
   	$class->fname=$request->fname;
   	$class->dept=$request->dept;
   	$class->type=$request->type;
   	$class->dom1=$request->mobile;
    $class->role=$request->role;
    $class->status='0';
   	$class->dob=$request->dob;
   	$class->sex=$request->sex;
   	$class->praddress=$request->praddress;
   	$class->peaddress=$request->peaddress;
    $class->email=$request->email;  
   	$class->password=\App\Provider::first()->password;
   	$class->work=$request->work;
   	$class->assign=$request->assign;
     $class->subassign=$request->subassign;
   	$class->position=$request->position;
   	$picture = $request->file('image');
        if($picture != ""){
      $filename = time() . '.' . $picture->getClientOriginalExtension();
        Image::make($picture)->resize(300, 300)->save(public_path('/uploads/avatars/' . $filename) );
      $class->image= $filename;
    }
        $class->save();
   return back()->with(['message' => "".__('admin.succ_create')]);
  } else{
    return back()->with(['message' => "".__('admin.no_permission')]);
    }
   }
   public function edit_teacher(Request $request,$id)
   {
  if(\Auth::user()->role!=='demo'&&\App\Role::where('staff_id',\Auth::user()->id)->first()->staff=='1'){ 
      $user=User::find(Teacher::find($id)->user_table);
      $user->role=$request->role;
      $user->save();
      $class=Teacher::find($id);
        $class->user_table=$user->id;
  $class->user_id=$request->token;
    $class->gname=$request->gname;
    $class->mname=$request->mname;
    $class->fname=$request->fname;
    $class->dept=$request->dept;
    $class->type=$request->type;
    $class->dom1=$request->mobile;
    $class->role=$request->role;
    $class->dob=$request->dob;
    $class->sex=$request->sex;
    $class->praddress=$request->praddress;
    $class->peaddress=$request->peaddress;
      $class->work=$request->work;
      $class->assign=$request->assign;
      $class->subassign=$request->subassign;
      $class->position=$request->position;
      $picture = $request->file('image');
        if($picture != ""){
      $filename = time() . '.' . $picture->getClientOriginalExtension();
        Image::make($picture)->resize(300, 300)->save(public_path('/uploads/avatars/' . $filename) );
      $class->image= $filename;
    }
    $input=$request->all();
      $class->save();
      for($i=0; $i <= count($input['subassign']); $i++){
    if(empty($input['subassign'][$i])) continue;
    
        $data1 = [
         'dom5'=>$user->id,
        'teach_id'=>$class->id,
        'subject_id'=> $input['subassign'][$i],
            ];
        
         $dataSet1[] = $data1;
      }
   if(count(\App\Teachsub::where('teach_id',$id)->get())>0){
      \App\Teachsub::where('teach_id',$id)->delete();
   }
      foreach ($dataSet1 as $key ) {

        \DB::table('teachsubs')->insert($key);
      }
      return back()->with(['message' => "".__('admin.succ_update')]);
  } else{
    return back()->with(['message' => "".__('admin.no_permission')]);
    }
   }
   public function assign_subject(Request $request)
   {
if(count(\App\Subjectassign::where('class',$request->class)->where('subject',$request->subject)->where('dom1',$request->term)->get())<1)
    {
   	if($request->student=='all')
   	{
   	$student= Student::where('class',$request->class)->get();
   	foreach($student as $stud){
   	$class=new Subjectassign;
   	$class->class=$request->class;
   	$class->student=$stud->id;
   	$class->subject=$request->subject;
   	$class->dom1=$request->term;
   	$class->save();
   }
   	return back()->with(['message' => 'Subject assigned to all Students in '.\App\Course::find($request->class)->title.' Successfully']);
   	}

   	else{
$class=new Subjectassign;
   	$class->class=$request->class;
   	$class->student=$request->student;
   	$class->subject=$request->subject;
   	$class->dom1=$request->term;
   	$class->save();
   		return back()->with(['message' => 'Subject assigned to '.$request->student.' Successfully']);
   	}
   }
     else{
    return back()->with(['error' => 'Subject has been  assigned to respective Class Already']);
    }
   }
   public function new_timetable(Request $request,$id)
   {
     if(\Auth::user()->role!=='demo'&&\App\Role::where('staff_id',\Auth::user()->id)->first()->timetable=='1'){
   	$class=new Timetable;
   	$class->subject=$request->subject;
   	$class->week=$request->week;
   	$class->teacher=$request->teacher;
   	$class->from=$request->from;
   	$class->class=$id;
   	$class->to=$request->to;
   	$class->number=$request->number;
   	$class->save();
   	return redirect('/get_student/class/2/'.$id);
     } else{
    return __('admin.no_permission');
    }
   }
   public function new_testhead(Request $request)
   {
  if(\Auth::user()->role!=='demo'&&\App\Role::where('staff_id',\Auth::user()->id)->first()->batch=='1'){
    $input=$request->all();
   	$class=new Batch;
   	$class->subject=$request->subject;
    $class->type=$request->type;
   	$class->duration=$request->duration;
    if($request->type=='1'){
      $class->class=$request->class; 
    }
    $class->mark=$request->mark;
    $class->use=$request->use;
   	$class->batch=$request->batch;
   	$class->date=$request->date;
   	$class->instruction=$request->instruction;
   	$class->save();
 if($request->type=='1'){
    if ($request->student==="all") {
      foreach(\App\Student::where('class',$request->class)->get() as $student)
{
  $subclass=new \App\Assign;
  $subclass->batch_id=$class->id;
  $subclass->token=\Keygen1::numeric(7)->generate();
  $subclass->class=$request->class;
  $subclass->student_id=$student->id;
  $subclass->type=$request->type;
  $subclass->subject=$request->subject;
  $subclass->save();
}
   }
   elseif($request->student!=="all"){
   for($i=0; $i <= count($input['student']); $i++){
    if(empty($input['student'][$i])) continue;
    
        $data1 = [
        'batch_id'=>$class->id,
        'student_id'=> $input['student'][$i],
        'token'=>\Keygen1::numeric(7)->generate(),
        'subject'=> $request->subject,
         'type'=> $request->type,
        'class'=> $request->class,
            ];
        
         $dataSet1[] = $data1;
      }
      foreach ($dataSet1 as $key ) {
        \DB::table('assigns')->insert($key);
      } 
   }
 }
 elseif($request->type=='2'){
for($i=0; $i <= count($input['staff']); $i++){
    if(empty($input['staff'][$i])) continue;
    
        $data1 = [
        'batch_id'=>$class->id,
        'student_id'=> $input['staff'][$i],
        'token'=>\Keygen1::numeric(7)->generate(),
        'subject'=> $request->subject,
        'type'=> $request->type,
            ];
        
         $dataSet1[] = $data1;
      }
      foreach ($dataSet1 as $key ) {
        \DB::table('assigns')->insert($key);
      } 
 }
   return back()->with(['message' => "".__('admin.succ_create')]);
  } else{
    return back()->with(['message' => "".__('admin.no_permission')]);
    }
   }
   public function edit_testhead(Request $request,$id)
   {
    if(\Auth::user()->role!=='demo'&&\App\Role::where('staff_id',\Auth::user()->id)->first()->batch=='1'){
    $input=$request->all();
    $class=Batch::find($id);
    $class->subject=$request->subject;
    $class->type=$request->type;
    $class->duration=$request->duration;
    if($request->type=='1'){
      $class->class=$request->class; 
    }
    $class->mark=$request->mark;
    $class->use=$request->use;
    $class->batch=$request->batch;
    $class->date=$request->date;
    $class->instruction=$request->instruction;
    $class->save();
 if($request->type=='1'){
    if ($request->student==="all") {
  foreach(\App\Student::where('class',$request->class)->get() as $student)
{
  $subclass=new \App\Assign;
  $subclass->batch_id=$class->id;
  $subclass->token=\Keygen1::numeric(7)->generate();
  $subclass->class=$request->class;
  $subclass->student_id=$student->id;
  $subclass->type=$request->type;
  $subclass->subject=$request->subject;
  $subclass->save();
}
   }
   elseif($request->student!=="all"){
    if(count(\App\Assign::where('batch_id',$id)->get())>0){
      \App\Assign::where('batch_id',$id)->delete();
    }
   for($i=0; $i <= count($input['student']); $i++){
    if(empty($input['student'][$i])) continue;
    
        $data1 = [
        'batch_id'=>$id,
        'student_id'=> $input['student'][$i],
        'token'=>\Keygen1::numeric(7)->generate(),
        'subject'=> $request->subject,
         'type'=> $request->type,
        'class'=> $request->class,
            ];
        
         $dataSet1[] = $data1;
      }
      foreach ($dataSet1 as $key ) {
        \DB::table('assigns')->insert($key);
      } 
   }
 }
 elseif($request->type=='2'){
   if(count(\App\Assign::where('batch_id',$id)->get())>0){
      \App\Assign::where('batch_id',$id)->delete();
    }
for($i=0; $i <= count($input['staff']); $i++){
    if(empty($input['staff'][$i])) continue;
    
        $data1 = [
        'batch_id'=>$class->id,
        'student_id'=> $input['staff'][$i],
        'token'=>\Keygen1::numeric(7)->generate(),
        'subject'=> $request->subject,
        'type'=> $request->type,
            ];
        
         $dataSet1[] = $data1;
      }
      foreach ($dataSet1 as $key ) {
        \DB::table('assigns')->insert($key);
      } 
 }
   return back()->with(['message' => "".__('admin.succ_update')]);
  } else{
    return back()->with(['message' => "".__('admin.no_permission')]);
    }
   }
   public function batch_user(Request $request,$id){
     if(\Auth::user()->role!=='demo'&&\App\Role::where('staff_id',\Auth::user()->id)->first()->batch=='1'){
    $input=$request->all();
    if(count(\App\Assign::where('batch_id',$id)->get())>0){
      \App\Assign::where('batch_id',$id)->delete();
    }
    if($request->type=='1'){
     for($i=0; $i <= count($input['staff']); $i++){
    if(empty($input['staff'][$i])) continue;
    
        $data1 = [
        'batch_id'=>$id,
        'student_id'=> $input['staff'][$i],
        'token'=>\Keygen1::numeric(7)->generate(),
        'subject'=> \App\Batch::find($id)->subject,
         'type'=> $request->type,
        'class'=> \App\Batch::find($id)->class,
            ];
        
         $dataSet1[] = $data1;
      }
      foreach ($dataSet1 as $key ) {
        \DB::table('assigns')->insert($key);
      }  
        return back()->with(['message' => "".__('admin.succ_create')]);
    }
    elseif($request->type=='2'){
for($i=0; $i <= count($input['staff']); $i++){
    if(empty($input['staff'][$i])) continue;
    
        $data1 = [
        'batch_id'=>$id,
        'student_id'=> $input['staff'][$i],
        'token'=>\Keygen1::numeric(7)->generate(),
        'subject'=> \App\Batch::find($id)->subject,
        'type'=> $request->type,
            ];
        
         $dataSet1[] = $data1;
      }
      foreach ($dataSet1 as $key ) {
        \DB::table('assigns')->insert($key);
      } 
     return back()->with(['message' => "".__('admin.succ_create')]);
  } 
    }
else{
    return back()->with(['message' => "".__('admin.no_permission')]);
    }
   }
   public function testquestion(Request $request,$id)
   {
if(\Auth::user()->role!=='demo'&&\App\Role::where('staff_id',\Auth::user()->id)->first()->question=='1'){
   	$class=new Question;
   	$class->batch_id=$id;
   	$class->title=$request->question;
   	$class->correct=$request->correct;
   	$class->dom1=$request->type;
   	$class->instruction=$request->summary;
   	$class->save();
   	$option=new Option;
   	$option->batch_id=$class->id;
   	$option->option1=$request->opta;
   	$option->option2=$request->optb;
   	$option->option3=$request->optc;
   	$option->option4=$request->optd;
    $option->key=\Keygen1::alphanum(5)->generate();;
   	$option->save();
   	return redirect('/show/test_questions/'.$id);
     }
else{
    return "".__('admin.no_permission');
    }
   }
   public function new_assign(Request $request)
   {
  if(\Auth::user()->role!=='demo'&&\App\Role::where('staff_id',\Auth::user()->id)->first()->question=='1'){
   	$input=$request->all();
   	$class=new \App\Assign;
   	$class->subject=$request->subject;
   	$class->class=$request->class;
   	$class->batch_id=$request->batch;
   	$class->save();
   if($request->type=='specific'){
   	for($i=0; $i <= count($input['student']); $i++){
    if(empty($input['student'][$i])) continue;
    
        $data1 = [
        'assign_id'=>$class->id,
        'student_id'=> $input['student'][$i],
        'subject'=> $request->subject,
            ];
        
         $dataSet1[] = $data1;
      }
      foreach ($dataSet1 as $key ) {
        \DB::table('subassigns')->insert($key);
      }
   }
   elseif ($request->type=='all') {
   	foreach(\App\Student::where('class',$request->class)->get() as $student)
{
	$subclass=new \App\Subassign;
	$subclass->assign_id=$class->id;
	$subclass->student_id=$student->id;
	$subclass->subject=$request->subject;
	$subclass->save();
}
   }
   	return redirect('/asign/show_short');
    }
else{
    return "".__('admin.no_permission');
    }
   }
   public function add_section(Request $request,$id)
   {
    $input=$request->all();
     for($i=0; $i <= count($input['title']); $i++){
    if(empty($input['title'][$i])) continue;
      $data1 = [
        'course_id'=>$id,
        'title'=> $input['title'][$i],
            ];
        
         $dataSet1[] = $data1;
    }
    if(count(\App\Section::where('course_id',$id)->get())>0)
    {
      \App\Section::where('course_id',$id)->delete();
    }
     foreach ($dataSet1 as $key ) {
        \DB::table('sections')->insert($key);
      }
       return back()->with(['message' => ''.\App\Work::find($id)->title.' Section Created Successfully']);
   }
    public function new_testgrade(Request $request)
   {
   	$class=new \App\Testgrade;
   	$class->subject=$request->subject;
   	$class->class=$request->class;
   	$class->student_id=$request->student;
   	 $class->term=\App\Session::latest()->first()->terms;
      $class->session=\App\Session::latest()->first()->session;
   	$class->score=$request->score;
   	$class->over=$request->over;
      $class->dom5=\Auth::user()->name;
      if(count(\App\Testgrade::where('term',\App\Session::latest()->first()->terms)->where('session',\App\Session::latest()->first()->session)->where('student_id',$request->student)->where('subject',$request->subject)->get())>0){
  \App\Testgrade::where('term',\App\Session::latest()->first()->terms)->where('session',\App\Session::latest()->first()->session)->where('student_id',$request->student)->where('subject',$request->subject)->delete();
}
   	$class->save();
   	return back()->with(['message' => 'Test Grade Added Successfully']);
   }
   public function new_examgrade(Request $request)
   {
   	$class=new \App\Examgrade;
   	$class->subject=$request->subject;
   	$class->class=$request->class;
   	$class->student_id=$request->student;
    $class->term=\App\Session::latest()->first()->terms;
      $class->session=\App\Session::latest()->first()->session;
   	$class->score=$request->score;
   	$class->over=$request->over;
      $class->dom5=\Auth::user()->name;
      if(count(\App\Examgrade::where('term',\App\Session::latest()->first()->terms)->where('session',\App\Session::latest()->first()->session)->where('student_id',$request->student)->where('subject',$request->subject)->get())>0){
  \App\Examgrade::where('term',\App\Session::latest()->first()->terms)->where('session',\App\Session::latest()->first()->session)->where('student_id',$request->student)->where('subject',$request->subject)->delete();
}
   	$class->save();
   	return back()->with(['message' => 'Exam Grade Added Successfully']);
   }
   public function new_assignmentgrade(Request $request)
   {
      $class=new \App\Assignmentgrade;
      $class->subject=$request->subject;
      $class->class=$request->class;
      $class->student_id=$request->student;
      $class->term=\App\Session::latest()->first()->terms;
      $class->session=\App\Session::latest()->first()->session;
      $class->score=$request->score;
      $class->over=$request->over;
      $class->dom5=\Auth::user()->name;
      if(count(\App\Assignmentgrade::where('term',\App\Session::latest()->first()->terms)->where('session',\App\Session::latest()->first()->session)->where('student_id',$request->student)->where('subject',$request->subject)->get())>0){
  \App\Assignmentgrade::where('term',\App\Session::latest()->first()->terms)->where('session',\App\Session::latest()->first()->session)->where('student_id',$request->student)->where('subject',$request->subject)->delete();
}
      $class->save();
      return back()->with(['message' => 'Project Grade Added Successfully']);
   }
    public function addsession(Request $request)
   {
 if(\Auth::user()->role==='admin'){
      $class=\App\Session::first();
      $class->open_date=$request->open_date;
      $class->close_date=$request->close_date;
      $class->terms=$request->term;
      $class->session=$request->session;
      $class->status='0';
      $class->sign=\Auth::user()->name;
      $class->save();
      if($request->term=='First'){
        foreach(\App\Student::where('status','0')->get() as $student){
          $change=\App\Student::find($student->id);
          if($change->promote!=null||$change->promote!=''){
           $change->class=$change->promote; 
          }
          $change->save();
        }
      }
     return back()->with(['message' => "".__('admin.succ_update')]);
  } else{
    return back()->with(['message' => "".__('admin.no_permission')]);
    }
   }
   public function breaksession(Request $request)
   {
     if(\Auth::user()->role==='admin'){
      $class=\App\Session::first();
      $class->brk_open=$request->open_date;
      $class->brk_close=$request->close_date;
      $class->status='2';
      $class->sign=\Auth::user()->name;
      $class->save();
      return back()->with(['message' => "".__('admin.succ_update')]);
  } else{
    return back()->with(['message' => "".__('admin.no_permission')]);
    }
   }
   public function endsession(Request $request)
   {
     if(\Auth::user()->role==='admin'){
      $class=\App\Session::first();
      $class->close_open=$request->open_date;
      $class->close_close=$request->close_date;
      $class->status='1';
      $class->sign=\Auth::user()->name;
      $class->save();
      return back()->with(['message' => "".__('admin.succ_update')]);
  } else{
    return back()->with(['message' => "".__('admin.no_permission')]);
    }
   }
   public function openbreak(Request $request)
   {
     if(\Auth::user()->role==='admin'){
      $class=\App\Session::first();
      $class->status='0';
      $class->sign=\Auth::user()->name;
      $class->save();
     return back()->with(['message' => "".__('admin.succ_update')]);
  } else{
    return back()->with(['message' => "".__('admin.no_permission')]);
    }
   }
    public function create_leave(Request $request)
   {

      $class=new \App\Leave;
      $class->user_id=$request->staff;
      $class->date=$request->sdate;
      $class->rdate=$request->edate;
      $class->reason=$request->reason;
      $class->session=$request->session;
      $class->term=$request->term;
      $class->status='0';
      $class->save();
      return back()->with(['message' => 'Application for leave request was Successfull']);
   }
    public function settings(Request $request)
   {
     if(\Auth::user()->role!=='demo'&&\App\Role::where('staff_id',\Auth::user()->id)->first()->ginfo=='1'){
      $class=\App\Setting::first();
      $class->country=$request->country;
      $class->state=$request->state;
      $class->language=$request->language;
      $class->paypal=$request->paypal;
      $class->status=$request->status;
      $class->paystack=$request->paystack;
      $class->stripe=$request->stripe;
      $class->wepay=$request->wepay;
      $class->sms=$request->sms;
      $class->currency=$request->currency;
      $class->zone=$request->zone;
      $class->convert=$request->convert;
      $class->save();
      \App::setLocale(\App\Language::find($request->language)->sortname);
       return back()->with(['message' => "".__('admin.succ_create')]);
  } else{
    return back()->with(['message' => "".__('admin.no_permission')]);
    }
   }
    public function approve_leave(Request $request,$id)
   {
     if(\Auth::user()->role!=='demo'&&\App\Role::where('staff_id',\Auth::user()->id)->first()->ginfo=='1'){
      $class=\App\Leave::find($id);
      $class->date=$request->sdate;
      $class->rdate=$request->edate;
      $class->reason=$request->reason;
      if($request->status=='1'){
    $class->status='1';
     $class->save();
     return back()->with(['message' => "".__('admin.app_accept')]);
      }
    else{
     $class->status='2'; 
      $class->save();
       return back()->with(['message' => "".__('admin.app_reject')]);
    }
     } else{
    return back()->with(['message' => "".__('admin.no_permission')]);
    }
   }
   public function addepartment(Request $request)
   {
   if(\Auth::user()->role!=='demo'&&\App\Role::where('staff_id',\Auth::user()->id)->first()->dept=='1'){
      $class=new \App\Department;
      $class->name=$request->name;
      $class->description=$request->description;
      $class->type=$request->type;
      $class->save();
      return back()->with(['message' => "".__('admin.succ_create')]);
  } else{
    return back()->with(['message' => "".__('admin.no_permission')]);
    }
   }
   public function add_event(Request $request)
   {
 if(\Auth::user()->role!=='demo'&&\App\Role::where('staff_id',\Auth::user()->id)->first()->event=='1'){
      $class=new \App\Event;
      $class->title=$request->title;
      $class->description=$request->description;
      $class->sdate=$request->sdate;
      $class->edate=$request->edate;
      $class->venue=$request->venue;
      $class->color=$request->color;
      $class->stime=$request->stime;
      $class->etime=$request->etime;
      $picture = $request->file('file');
        if($picture != ""){
      $filename = time() . '.' . $picture->getClientOriginalExtension();
        Image::make($picture)->resize(300, 300)->save(public_path('/uploads/avatars/' . $filename) );
      $class->image= $filename;
    }
      $class->save();
      return back()->with(['message' => "".__('admin.succ_create')]);
  } else{
    return back()->with(['message' => "".__('admin.no_permission')]);
    }
   }
   
    public function editevent(Request $request,$id)
   {
     if(\Auth::user()->role!=='demo'&&\App\Role::where('staff_id',\Auth::user()->id)->first()->event=='1'){
      $class=\App\Event::find($id);
      $class->title=$request->title;
      $class->description=$request->description;
      $class->sdate=$request->sdate;
      $class->edate=$request->edate;
       $class->venue=$request->venue;
      $class->stime=$request->stime;
      $class->etime=$request->etime;
      $picture = $request->file('file');
        if($picture != ""){
      $filename = time() . '.' . $picture->getClientOriginalExtension();
        Image::make($picture)->resize(300, 300)->save(public_path('/uploads/avatars/' . $filename) );
      $class->image= $filename;
    }
      $class->save();
     return back()->with(['message' => "".__('admin.succ_update')]);
  } else{
    return back()->with(['message' => "".__('admin.no_permission')]);
    }
   }
   public function ybook_create(Request $request)
   {
     if(\Auth::user()->role!=='demo'&&\App\Role::where('staff_id',\Auth::user()->id)->first()->ybook=='1'){
      $class=new \App\Yearbook;
      $class->title=$request->title;
      $class->description=$request->description;
      $class->number=$request->number;
      $class->price=$request->price;
      $class->type=$request->type;
      $class->session=$request->session;
      $picture = $request->file('cover');
        if($picture != ""){
      $filename = time() . '.' . $picture->getClientOriginalExtension();
        Image::make($picture)->resize(100, 100)->save(public_path('/uploads/yearbook/' . $filename) );
      $class->cover= $filename;
    }
     $File=$request->file('file');
      if($File != ''){
      $extension = $File->getClientOriginalExtension();
      \Storage::disk('local')->put($File->getFilename().'.'.$extension,File::get($File));
       $class->mime=$File->getClientMimeType();
     $class->file=$File->getFilename().'.'.$extension;
    }
      $class->save();
     return back()->with(['message' => "".__('admin.succ_create')]);
  } else{
    return back()->with(['message' => "".__('admin.no_permission')]);
    }
   }
   public function editybook(Request $request,$id)
   {
   if(\Auth::user()->role!=='demo'&&\App\Role::where('staff_id',\Auth::user()->id)->first()->ybook=='1'){
      $class=\App\Yearbook::find($id);
      $class->title=$request->title;
      $class->description=$request->description;
      $class->number=$request->number;
      $class->price=$request->price;
      $class->type=$request->type;
      $class->session=$request->session;
      $picture = $request->file('cover');
        if($picture != ""){
      $filename = time() . '.' . $picture->getClientOriginalExtension();
        Image::make($picture)->resize(100, 100)->save(public_path('/uploads/yearbook/' . $filename) );
      $class->cover= $filename;
    }
     $File=$request->file('file');
      if($File != ''){
      $extension = $File->getClientOriginalExtension();
      \Storage::disk('local')->put($File->getFilename().'.'.$extension,File::get($File));
       $class->mime=$File->getClientMimeType();
     $class->file=$File->getFilename().'.'.$extension;
    }
      $class->save();
      return back()->with(['message' => "".__('admin.succ_update')]);
  } else{
    return back()->with(['message' => "".__('admin.no_permission')]);
    }
   }
   public function editdepartment(Request $request,$id)
   {
   if(\Auth::user()->role!=='demo'&&\App\Role::where('staff_id',\Auth::user()->id)->first()->dept=='1'){
      $class=\App\Department::find($id);
      $class->name=$request->name;
      $class->description=$request->description;
      $class->type=$request->type;
      $class->save();
      return back()->with(['message' => "".__('admin.succ_update')]);
  } else{
    return back()->with(['message' => "".__('admin.no_permission')]);
    }
   }
   public function add_category(Request $request)
   {
   if(\Auth::user()->role!=='demo'&&\App\Role::where('staff_id',\Auth::user()->id)->first()->event=='1'){
      $class=new \App\Procedure;
      $class->name=$request->name;
      $class->description=$request->description;
      $class->color=$request->color;
      $class->save();
      return back()->with(['message' => "".__('admin.succ_create')]);
  } else{
    return back()->with(['message' => "".__('admin.no_permission')]);
    }
   }
   public function create_school(Request $request)
   {
     if(\Auth::user()->role==='admin'){
      $class=\App\Provider::first();
      $class->name=$request->name;
      $class->sms_name=$request->sms_name;
      $class->address=$request->address;
      $class->phone1=$request->mobile1;
      $class->phone2=$request->mobile2;
      $class->web=$request->web;
      $class->result_type=$request->result_type;
      $class->email=$request->email;
      $picture = $request->file('logo');
      $picture1 = $request->file('back');
        if($picture != ""){
      $filename = time() . '.' . $picture->getClientOriginalExtension();
        Image::make($picture)->resize(300, 300)->save(public_path('/uploads/avatars/' . $filename) );
      $class->logo= $filename;
    }
     if($picture1 != ""){
      $filename1 = time() . '.' . $picture1->getClientOriginalExtension();
        Image::make($picture1)->resize(1200, 1000)->save(public_path('/uploads/avatars/' . $filename1) );
      $class->back= $filename1;
    }
      $class->save();
       return back()->with(['message' => "".__('admin.succ_update')]);
  } else{
    return back()->with(['message' => "".__('admin.no_permission')]);
    }
   }
   public function generate(Request $request,$idd)
   {
if(\Auth::user()->role!=='demo'&&\App\Role::where('staff_id',\Auth::user()->id)->first()->result_col=='1'){
     if(count(\App\Result::where('term',\App\Session::latest()->first()->terms)->where('session',\App\Session::latest()->first()->session)->where('student_id',$idd)->get())>0){
      $class=\App\Result::where('term',\App\Session::latest()->first()->terms)->where('session',\App\Session::latest()->first()->session)->where('student_id',$idd)->first();
    }else{
        $class=new \App\Result;
    }
      $class->student_id=$idd;
      $class->data=$request->body;
     $class->class_id=\App\Student::find($idd)->class;
      $class->term=\App\Session::latest()->first()->terms;
      $class->session=\App\Session::latest()->first()->session;
      $class->status='0';
      $class->save();
      return back()->with(['message' => "".__('admin.succ_gene')]);
  } else{
    return back()->with(['message' => "".__('admin.no_permission')]);
    }
   }

   public function addbehave(Request $request,$idd)
   {
    if(\Auth::user()->role!=='demo'&&\App\Role::where('staff_id',\Auth::user()->id)->first()->result_col=='1'){
    $data2 = [];
    $input=$request->all();
    $i=0;
    $id=$idd;
foreach (\App\Behavioural::where('class_id',\App\Student::find($idd)->class)->get() as $behave)
{
    $i++;
    $data2[] = [
        'behave' => $input['behave'.$i],
    ];
}
if(count(\App\Personality::where('term',\App\Session::latest()->first()->terms)->where('session',\App\Session::latest()->first()->session)->where('student_id',$idd)->get())>0){
  \App\Personality::where('term',\App\Session::latest()->first()->terms)->where('session',\App\Session::latest()->first()->session)->where('student_id',$idd)->delete();
}

      $person=new \App\Personality;
      $person->student_id=$idd;
      $person->data=\json_encode($data2);
      $person->class_id=\App\Student::find($idd)->class;
      $person->term=\App\Session::latest()->first()->terms;
      $person->session=\App\Session::latest()->first()->session;
      $person->status='0';
      $person->sign=\Auth::user()->name;
     $person->save();
      return view('admin.result.show_gen',compact('id'));
       } else{
    return "".__('admin.no_permission');
    }
   }
    public function addphysical(Request $request,$idd)
   {
if(\Auth::user()->role!=='demo'&&\App\Role::where('staff_id',\Auth::user()->id)->first()->result_col=='1'){
      $id=$idd;
      $person=new \App\Physical;
      $person->student_id=$idd;
      $person->heightb=$request->heightb;
      $person->heighte=$request->heighte;
      $person->weightb=$request->weightb;
      $person->weighte=$request->weighte;
      $person->facilitator=$request->facilitator;
      $person->class_id=\App\Student::find($idd)->class;
      $person->term=\App\Session::latest()->first()->terms;
      $person->session=\App\Session::latest()->first()->session;
      $person->status='0';
      $person->sign=\Auth::user()->name;
      if(count(\App\Physical::where('term',\App\Session::latest()->first()->terms)->where('session',\App\Session::latest()->first()->session)->where('student_id',$idd)->get())>0){
  \App\Physical::where('term',\App\Session::latest()->first()->terms)->where('session',\App\Session::latest()->first()->session)->where('student_id',$idd)->delete();
}
      $person->save();
      return view('admin.result.show_phy',compact('id'));
       } else{
    return "".__('admin.no_permission');
    }
   }
   public function addcomment(Request $request,$idd)
   {
    if(\Auth::user()->role!=='demo'&&\App\Role::where('staff_id',\Auth::user()->id)->first()->result_col=='1'){
      $id=$idd;
      if(count(\App\Comment::where('term',\App\Session::latest()->first()->terms)->where('session',\App\Session::latest()->first()->session)->where('student_id',$idd)->get())>0){
         $person=\App\Comment::where('term',\App\Session::latest()->first()->terms)->where('session',\App\Session::latest()->first()->session)->where('student_id',$idd)->first();
      }
      else{
      $person=new \App\Comment;  
      }
      
      $person->student_id=$idd;
      $person->fcomment=$request->fcomment;
      $person->open=$request->open;
      $person->present=$request->present;
      $person->school_open=$request->school_open;
      $person->sport_open=$request->sport_open;
      $person->other_open=$request->other_open;
      $person->school_present=$request->school_present;
      $person->sport_present=$request->sport_present;
      $person->other_present=$request->other_present;
       $person->school_punctual=$request->school_punctual;
      $person->sport_punctual=$request->sport_punctual;
      $person->other_punctual=$request->other_punctual;
      $person->school_late=$request->school_late;
      $person->sport_late=$request->sport_late;
      $person->other_late=$request->other_late;
      $person->school_absent=$request->school_absent;
      $person->sport_absent=$request->sport_absent;
      $person->other_absent=$request->other_absent;
      $person->promotion=$request->promotion;
      $person->fdate=$request->fdate;
      $person->hcomment=$request->hcomment;
      $person->hdate=$request->hdate;
      $person->promotion=$request->promotion;
      $person->termb=$request->termb;
      $person->class_id=\App\Student::find($idd)->class;
      $person->term=\App\Session::latest()->first()->terms;
      $person->session=\App\Session::latest()->first()->session;
      $person->status='0';
      $person->sign=\Auth::user()->name;
      
      $person->save();
      return view('admin.result.show_comment',compact('id'));
       } else{
    return "".__('admin.no_permission');
    }
   }

    public function attendance(Request $request)
   {
    if(\Auth::user()->role!=='demo'&&\App\Role::where('staff_id',\Auth::user()->id)->first()->sattend=='1'){
      $class=new \App\Attendance;
      $class->class=$request->class;
      $class->student_id=$request->student;
      $class->term=$request->term;
      $class->type=$request->type;
      $class->response=$request->response;
      $class->session=$request->session;
      $class->date=$request->date;
      $class->status=$request->status;
      $class->reason=$request->reason;
      $class->sign=\Auth::user()->name;
   if(count(\App\Attendance::where('student_id',$request->student)->where('date',\Carbon\Carbon::today()->format('Y-m-d'))->where('type','1')->get())>0)
      {
       return back()->with(['error' => ''.\App\Student::find($request->student)->gname.' '.\App\Student::find($request->student)->fname.' '.__('admin.school_attend')]); 
      }
      elseif(count(\App\Attendance::where('student_id',$request->student)->where('date',\Carbon\Carbon::today()->format('Y-m-d'))->where('type','2')->get())>0)
      {
       return back()->with(['error' => ''.\App\Student::find($request->student)->gname.' '.\App\Student::find($request->student)->fname.' '.__('admin.spor_attend')]); 
      }
      elseif(count(\App\Attendance::where('student_id',$request->student)->where('date',\Carbon\Carbon::today()->format('Y-m-d'))->where('type','3')->get())>0)
      {
       return back()->with(['error' => ''.\App\Student::find($request->student)->gname.' '.\App\Student::find($request->student)->fname.' '.__('admin.othe_attend')]); 
      }
else{
 $class->save();
      return back()->with(['message' => ''.\App\Student::find($request->student)->gname.' '.\App\Student::find($request->student)->fname.' '.__('admin.att_ten')]);
}
 } else{
    return back()->with(['message' => "".__('admin.no_permission')]);
    }
   }
   public function employee_attendance(Request $request,$id)
   {
if(\Auth::user()->role!=='demo'&&\App\Role::where('staff_id',\Auth::user()->id)->first()->stattend=='1'){
      $class=new \App\Employee;
      $class->user_id=$id;
      $class->term=$request->term;
      $class->session=$request->session;
      $class->date=$request->date;
      $class->status=$request->status;
      $class->reason=$request->reason;
      $class->sign=\Auth::user()->name;
   if(count(\App\Employee::where('user_id',$id)->where('date',\Carbon\Carbon::today()->format('Y-m-d'))->get())>0)
      {
       return back()->with(['error' => ''.\App\Teacher::find($id)->gname.' '.\App\Teacher::find($id)->fname.' '.__('admin.school_attend')]); 
      }
else{
 $class->save();
      return back()->with(['message' => ''.\App\Teacher::find($id)->gname.' '.\App\Teacher::find($id)->fname.' '.__('admin.school_attend')]);
}
 } else{
    return back()->with(['message' => "".__('admin.no_permission')]);
    }
   }
   public function addpersona(Request $request)
   {
if(\Auth::user()->role!=='demo'&&\App\Role::where('staff_id',\Auth::user()->id)->first()->behave=='1'){
    $input=$request->all();
     for($i=0; $i <= count($input['class']); $i++){
    if(empty($input['class'][$i])) continue;
        $data1 = [
        'name'=>$input['behave'],
        'class_id'=> $input['class'][$i],
            ];
         $dataSet1[] = $data1;
      }
      foreach ($dataSet1 as $key ) {
        \DB::table('behaviourals')->insert($key);
      }
       return view('admin.result.behave'); 
       } else{
    return back()->with(['message' => "".__('admin.no_permission')]);
    }
   }
   public function editpersona(Request $request,$id)
   {
    if(\Auth::user()->role!=='demo'&&\App\Role::where('staff_id',\Auth::user()->id)->first()->behave=='1'){
    $input=$request->all();
     for($i=0; $i <= count($input['name']); $i++){
    if(empty($input['name'][$i])) continue;
        $data1 = [
        'name'=>$input['name'][$i],
        'class_id'=> $id,
            ];
         $dataSet1[] = $data1;
      }
  if(count(\App\Behavioural::where('class_id',$id)->get())>0){
    \App\Behavioural::where('class_id',$id)->delete();
  }
      foreach ($dataSet1 as $key ) {
        \DB::table('behaviourals')->insert($key);
      }
       return back()->with(['message' => "".__('admin.succ_update')]);
  } else{
    return back()->with(['message' => "".__('admin.no_permission')]);
    }
   }
   public function classpay(Request $request,$id)
   {
  if(\Auth::user()->role!=='demo'&&\App\Role::where('staff_id',\Auth::user()->id)->first()->sfee=='1'){
    $input=$request->all();
     for($i=0; $i <= count($input['name']); $i++){
    if(empty($input['name'][$i])) continue;
        $data1 = [
        'class'=>$id,
        'term'=> $input['term'][$i],
        'name'=> $input['name'][$i],
        'price'=> $input['amount'][$i],
        'option'=> $input['option'][$i],
            ];
         $dataSet1[] = $data1;
         if(count(\App\Fee::where('class',$id)->where('term',$input['term'][$i])->get())>0)
      {
        \App\Fee::where('class',$id)->where('term',$input['term'][$i])->delete();
      }
      }
      foreach ($dataSet1 as $key ) {
        \DB::table('fees')->insert($key);
      }
      return back()->with(['message' => "".__('admin.succ_create')]);
  } else{
    return back()->with(['message' => "".__('admin.no_permission')]);
    }
   }
   public function employeepay(Request $request,$id)
   {
  if(\Auth::user()->role!=='demo'&&\App\Role::where('staff_id',\Auth::user()->id)->first()->stsalary=='1'){
    $input=$request->all();
     for($i=0; $i <= count($input['name']); $i++){
    if(empty($input['name'][$i])) continue;
        $data1 = [
        'user_id'=>$id,
        'name'=> $input['name'][$i],
        'price'=> $input['amount'][$i],
            ];
         $dataSet1[] = $data1;
         if(count(\App\Salary::where('user_id',$id)->get())>0)
      {
       \App\Salary::where('user_id',$id)->delete();
      }
      }
      foreach ($dataSet1 as $key ) {
        \DB::table('salaries')->insert($key);
      }
       return back()->with(['message' => "".__('admin.succ_create')]);
  } else{
    return back()->with(['message' => "".__('admin.no_permission')]);
    }
   }
   public function add_subcategory(Request $request,$id)
   {
    $input=$request->all();
     for($i=0; $i <= count($input['title']); $i++){
    if(empty($input['title'][$i])) continue;
        $data1 = [
        'cat_id'=>$id,
        'title'=> $input['title'][$i],
            ];
         $dataSet1[] = $data1;
         if(count(\App\Subcategory::where('cat_id',$id)->get())>0)
      {
       \App\Subcategory::where('cat_id',$id)->delete();
      }
      }
      foreach ($dataSet1 as $key ) {
        \DB::table('subcategories')->insert($key);
      }
       return back()->with(['message' => 'Sub Categories has been added to '.\App\Category::find($id)->title.' Category Successfully']);
   }
   public function addgraduate(Request $request)
   {
   if(\Auth::user()->role!=='demo'&&\App\Role::where('staff_id',\Auth::user()->id)->first()->grad=='1'){
    $input=$request->all();
     for($i=0; $i <= count($input['student']); $i++){
    if(empty($input['student'][$i])) continue;
    $change=\App\Student::find($input['student'][$i]);
    $change->status='1';
    $change->save();
        $data1 = [
        'user_id'=>$input['student'][$i],
        'name'=> \App\Student::find($input['student'][$i])->gname.' '.\App\Student::find($input['student'][$i])->fname,
        'date'=> $input['date'],
            ];
         $dataSet1[] = $data1;
         if(count(\App\Graduation::where('user_id',$input['student'][$i])->get())>0)
      {
       \App\Graduation::where('user_id',$input['student'][$i])->delete();
      }
      }
      foreach ($dataSet1 as $key ) {
        \DB::table('graduations')->insert($key);
      }
       return back()->with(['message' => "".__('admin.succ_create')]);
  } else{
    return back()->with(['message' => "".__('admin.no_permission')]);
    }
   }
   public function addexternal(Request $request,$id)
   {
    $input=$request->all();
     for($i=0; $i <= count($input['title']); $i++){
    if(empty($input['file'][$i])) continue;
    $change=new \App\Book;
     $File=$request->file('file');
      if($File != ''){
    foreach($File as $filo){
     $extension = $filo->getClientOriginalExtension();
      \Storage::disk('local')->put($filo->getFilename().'.'.$extension,File::get($filo));
       $change->mime=$filo->getClientMimeType();
     $change->file=$filo->getFilename().'.'.$extension; 
    }  
    }
    $change->title=$input['title'][$i];
    $change->grad_id=$id;
    $change->user_id=\App\Graduation::find($id)->user_id;
     if(count(\App\Book::where('grad_id',$id)->get())>0)
      {
       \App\Book::where('grad_id',$input['title'][$i])->delete();
      }
    $change->save(); 
      }
       return back()->with(['message' => ''.\App\Student::find(\App\Graduation::find($id)->user_id)->gname.' External Result(s) Saved Successfully']);
   }
    public function addcertificate(Request $request,$id)
   {
   if(\Auth::user()->role!=='demo'&&\App\Role::where('staff_id',\Auth::user()->id)->first()->grad=='1'){
    $input=$request->all();
     for($i=0; $i <= count($input['title']); $i++){
    if(empty($input['file'][$i])) continue;
    $change=new \App\Certificate;
     $File=$request->file('file');
      if($File != ''){
    foreach($File as $filo){
     $extension = $filo->getClientOriginalExtension();
      \Storage::disk('local')->put($filo->getFilename().'.'.$extension,File::get($filo));
       $change->mime=$filo->getClientMimeType();
     $change->file=$filo->getFilename().'.'.$extension; 
    }  
    }
    $change->title=$input['title'][$i];
    $change->grad_id=$id;
    $change->user_id=\App\Graduation::find($id)->user_id;
     if(count(\App\Certificate::where('grad_id',$id)->get())>0)
      {
       \App\Certificate::where('grad_id',$input['title'][$i])->delete();
      }
    $change->save(); 
      }
       return back()->with(['message' => "".__('admin.succ_create')]);
  } else{
    return back()->with(['message' => "".__('admin.no_permission')]);
    }
   }
   public function add_why(Request $request)
   {
if(\Auth::user()->role!=='demo'&&\App\Role::where('staff_id',\Auth::user()->id)->first()->front=='1'){
    $input=$request->all();
     for($i=0; $i <= count($input['name']); $i++){
    if(empty($input['name'][$i])) continue;
        $data1 = [
        'name'=>$input['name'][$i],
        'description'=> $input['description'][$i],
            ];
         $dataSet1[] = $data1;
         if(count(\App\Frontlist::all())>0)
      {
       \App\Frontlist::where('status',null)->delete();
      }
      }
      foreach ($dataSet1 as $key ) {
        \DB::table('frontlists')->insert($key);
      }
      return back()->with(['message' => "".__('admin.succ_create')]);
  } else{
    return back()->with(['message' => "".__('admin.no_permission')]);
    }
   }
    public function create_grade(Request $request,$id)
   {
    $input=$request->all();
     for($i=0; $i <= count($input['test_grade']); $i++){
    if(empty($input['test_grade'][$i])||empty($input['project_grade'][$i])||empty($input['exam_grade'][$i])) continue;
        $data1 = [
        'subject'=>$input['subject'][$i],
        'test_grade'=> $input['test_grade'][$i],
         'start_grade'=> $input['start_grade'][$i],
        'project_grade'=> $input['project_grade'][$i],
       'exam_grade'=> $input['exam_grade'][$i],
       'start_over'=> $input['start_over'][$i],
       'test_over'=> $input['test_over'][$i],
        'project_over'=> $input['project_over'][$i],
       'exam_over'=> $input['exam_over'][$i],
        'student'=> $id,
        'class'=> \App\Student::find($id)->class,
        'session'=> $input['session'],
        'term'=> $input['terms'],
        'sign'=> \Auth::user()->id,
            ];
         $dataSet1[] = $data1;  
      }
       if(count(\App\Subjectassign::where('student',$id)->where('class',\App\Student::find($id)->class)->where('term',$request->terms)->where('session',$request->session)->get())>0)
      {
       \App\Subjectassign::where('student',$id)->where('class',\App\Student::find($id)->class)->where('term',$request->terms)->where('session',$request->session)->delete();
      }
      foreach ($dataSet1 as $key ) {
        \DB::table('subjectassigns')->insert($key);
      }
      for($i=0; $i <= count($input['test_grade']); $i++){
    if(empty($input['test_grade'][$i])) continue;
        $data2 = [
        'subject'=>$input['subject'][$i],
        'score'=> $input['test_grade'][$i],
        'over'=> $input['test_over'][$i],
        'student_id'=> $id,
        'class'=> \App\Student::find($id)->class,
        'session'=> $input['session'],
        'term'=> $input['terms'],
          'dom5'=> \Auth::user()->name,
            ];
         $dataSet2[] = $data2;
      }
       if(count(\App\Testgrade::where('student_id',$id)->where('class',\App\Student::find($id)->class)->where('term',$request->terms)->where('session',$request->session)->get())>0)
      {
       \App\Testgrade::where('student_id',$id)->where('class',\App\Student::find($id)->class)->where('term',$request->terms)->where('session',$request->session)->delete();
      }
      foreach ($dataSet2 as $key2 ) {
        \DB::table('testgrades')->insert($key2);
      }
       for($i=0; $i <= count($input['project_grade']); $i++){
    if(empty($input['project_grade'][$i])) continue;
        $data3 = [
        'subject'=>$input['subject'][$i],
        'score'=> $input['project_grade'][$i],
        'over'=> $input['project_over'][$i],
        'student_id'=> $id,
        'class'=> \App\Student::find($id)->class,
        'session'=> $input['session'],
        'term'=> $input['terms'],
        'dom5'=> \Auth::user()->name,
            ];
         $dataSet3[] = $data3;
      }
       if(count(\App\Assignmentgrade::where('student_id',$id)->where('class',\App\Student::find($id)->class)->where('term',$request->terms)->where('session',$request->session)->get())>0)
      {
       \App\Assignmentgrade::where('student_id',$id)->where('class',\App\Student::find($id)->class)->where('term',$request->terms)->where('session',$request->session)->delete();
      }
      foreach ($dataSet3 as $key3 ) {
        \DB::table('assignmentgrades')->insert($key3);
      }
      for($e=0; $e <= count($input['start_grade']); $e++){
    if(empty($input['start_grade'][$e])) continue;
        $data6 = [
        'subject'=>$input['subject'][$e],
        'score'=> $input['start_grade'][$e],
        'over'=> $input['start_over'][$e],
        'student_id'=> $id,
        'class'=> \App\Student::find($id)->class,
        'session'=> $input['session'],
        'term'=> $input['terms'],
        'dom5'=> \Auth::user()->name,
            ];
         $dataSet6[] = $data6;
      }
       if(count(\App\Firstgrade::where('student_id',$id)->where('class',\App\Student::find($id)->class)->where('term',$request->terms)->where('session',$request->session)->get())>0)
      {
       \App\Firstgrade::where('student_id',$id)->where('class',\App\Student::find($id)->class)->where('term',$request->terms)->where('session',$request->session)->delete();
      }
      foreach ($dataSet6 as $key6 ) {
        \DB::table('firstgrades')->insert($key6);
      }
    for($e=0; $e <= count($input['exam_grade']); $e++){
    if(empty($input['exam_grade'][$e])) continue;
        $data4 = [
        'subject'=>$input['subject'][$e],
        'score'=> $input['exam_grade'][$e],
        'over'=> $input['exam_over'][$e],
        'student_id'=> $id,
        'class'=> \App\Student::find($id)->class,
        'session'=> $input['session'],
        'term'=> $input['terms'],
        'dom5'=> \Auth::user()->name,
            ];
         $dataSet4[] = $data4;
      }
       if(count(\App\Examgrade::where('student_id',$id)->where('class',\App\Student::find($id)->class)->where('term',$request->terms)->where('session',$request->session)->get())>0)
      {
       \App\Examgrade::where('student_id',$id)->where('class',\App\Student::find($id)->class)->where('term',$request->terms)->where('session',$request->session)->delete();
      }
      foreach ($dataSet4 as $key4 ) {
        \DB::table('examgrades')->insert($key4);
      }
       return back()->with(['message' => __('admin.grad_ad').' '.\App\Student::find($id)->user_id]);
   }
}
