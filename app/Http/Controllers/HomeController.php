<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
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

    public function apistudent(Request $request)
    {
       $states = \DB::table("students")
                    ->where("class",$request->class)
                    ->get();
        return response()->json($states);
    }
    public function apistudentn(Request $request)
    {
        $states = \DB::table("students")
                    ->where("class",$request->class)
                    ->get();
        $subject=\DB::table("subjects")
                    ->where("class",$request->class)
                    ->get();
        return response()->json(['class'=>$states,'subject'=>$subject]);
    }
    public function apireport(Request $request)
    {
        $states = \DB::table("reports")
                    ->where("student_id",$request->student)
                    ->latest()
                    ->first();
        return response()->json(['report'=>$states]);
    }
    public function getStateList(Request $request)
    {
        $states = \DB::table("states")
                    ->where("country_id",$request->country_id)
                    ->get();
        return response()->json($states);
    }
    public function apistudentsub(Request $request)
    {
        $states = \DB::table("subjectassigns")
                    ->where("student",$request->student)
                    ->where("class",$request->class)
                    ->get();
        foreach ($states as $key) {
          $subject=\App\Subject::where('id',$key->subject)->get();
        }
        return response()->json($subject);
    }
    public function apistudentmake(Request $request)
    {
       
          $subject=\App\Subject::where('class',$request->class)->get();
        return response()->json($subject);
    }
public function apibatch(Request $request)
    {
        $states = \DB::table("batches")
                    ->where("subject",$request->batch)
                    ->get();
        return response()->json($states);
    }

    public function index()
    {
        if(\Auth::user()->role=='admin'||\Auth::user()->role=='hrm'||\Auth::user()->role=='account'||\Auth::user()->role=='library'||\Auth::user()->role=='medical'||\Auth::user()->role=='staff'||\Auth::user()->role=='teacher'){
           return view('admin.dashboard');  
        }
        elseif(\Auth::user()->role=='student'){
          return view('student.dashboard'); 
        }
        elseif(\Auth::user()->role=='parent'){
          return view('parent.dashboard'); 
        }
    }
   
   public function take_question(Request $request,$idd)
    {
          $id=$request->quiz;
          return view('student.record.take_test',compact('id')); 
      
    }
    public function stake_question(Request $request,$idd)
    {
          $id=$request->quiz;
          return view('admin.cbt.take_test',compact('id')); 
      
    }
    public function list_thread(Request $request)
    {
          $id=$request->forum;
          return view('admin.forum.thread_list',compact('id')); 
      
    }
    public function get_attendance(Request $request)
    {
      if($request->student!='all'){
      if(count(\App\Attendance::where('student_id',$request->student)->where('date',$request->date)->get())>0){
        if(\App\Attendance::where('student_id',$request->student)->where('date',$request->date)->first()->status=='1'){
          return '1';
        }
        elseif(\App\Attendance::where('student_id',$request->student)->where('date',$request->date)->first()->status=='0'){
          return '0';
        }
      }
      elseif(count(\App\Attendance::where('student_id',$request->student)->where('date',$request->date)->get())==0){
        return '2';
      }  
    }
    elseif($request->student=='all'){
      return '3';
    }
      
    }
    public function get_pickup(Request $request)
    {
      if($request->student!='all'){
      if(count(\App\Pickup::where('student_id',$request->student)->where('date',$request->date)->get())>0){
      $user=\App\Parenting::find(\App\Pickup::where('student_id',$request->student)->where('date',$request->date)->first()->user_id)->name;
      $type=\App\Pickup::where('student_id',$request->student)->where('date',$request->date)->first()->type;
      $time=\App\Pickup::where('student_id',$request->student)->where('date',$request->date)->first()->category;
      return response()->json(['user'=>$user,'typo'=>$type,'time'=>$time,'status'=>'1']);
      }
      elseif(count(\App\Pickup::where('student_id',$request->student)->where('date',$request->date)->get())==0){
     return response()->json(['status'=>'2']);
      }  
    }
    elseif($request->student=='all'){
   return response()->json(['status'=>'3']);
    }
      
    }
     public function apiquestion(Request $request)
    {
            $id=$request->quiz;
          return view('admin.test.showtest',compact('id')); 
    }
    public function downcert(Request $request)
    {
           $path= \Storage::disk('local')->getDriver()->getAdapter()->applyPathPrefix(\App\Certificate::find($request->file)->file); 
  return response()->download($path);
    }
     public function downresult(Request $request)
    {
           $path= \Storage::disk('local')->getDriver()->getAdapter()->applyPathPrefix(\App\Book::find($request->file)->file); 
  return response()->download($path);
    }
     public function downybook(Request $request)
    {
           $path= \Storage::disk('local')->getDriver()->getAdapter()->applyPathPrefix(\App\Yearbook::find($request->book)->file); 
  return response()->download($path);
    }
    public function downebook(Request $request)
    {
           $path= \Storage::disk('local')->getDriver()->getAdapter()->applyPathPrefix(\App\Ebook::find($request->book)->file); 
  return response()->download($path);
    }
    public function apiresults(Request $request)
    {
            $id=$request->result;
          return view('admin.test.showresult',compact('id')); 
    }
    public function apigrade(Request $request)
    {
            $id=$request->class;
        if(\Auth::user()->role=='admin')
            {
          return view('admin.testgrade.grade',compact('id')); 
            }
        elseif(\Auth::user()->role=='teacher')
            {
          return view('staff.test.grade',compact('id'));       
            }
    }
     public function apiegrade(Request $request)
    {
            $id=$request->class;
             if(\Auth::user()->role=='admin')
            {
          return view('admin.examgrade.grade',compact('id')); 
            }
             elseif(\Auth::user()->role=='teacher')
            {
          return view('staff.exam.grade',compact('id'));       
            }
    }
    public function lessonshow(Request $request)
    {
      $id=$request->course;
          return view('admin.course.lesson',compact('id')); 
    }
    public function savechange(Request $request)
    {
      $id=$request->text;
      $content=\App\Autosave::first();
      $content->content=$request->text;
      $content->status='1';
      $content->save();
      return $id;
    }
     public function instruct(Request $request)
    {
      $id=$request->instructor;
          return view('admin.course.board',compact('id')); 
    }
    public function generate(Request $request)
    {
            $id=$request->student;
      if(\App\Provider::first()->result_type=='0'){
          return view('admin.result.generate',compact('id')); 
        }
        elseif(\App\Provider::first()->result_type=='1'){
           return view('admin.result.generate2',compact('id')); 
        }
          
    }
    public function resulte(Request $request)
    {
            $id=$request->student;
          return view('admin.res.resultlist',compact('id')); 
    }
     public function payment(Request $request)
    {
            $id=$request->student;
          return view('admin.res.invoice',compact('id')); 
    }
    public function apiagrade(Request $request)
    {
            $id=$request->class;
             if(\Auth::user()->role=='admin')
            {
          return view('staff.assignment.grade',compact('id')); 
            }
             elseif(\Auth::user()->role=='teacher')
            {
          return view('staff.assignment.grade',compact('id'));       
            }
    }
    public function studentcheck($userid,$studentid,$type)
    {
      $check=new \App\Pickup;
      $check->student_id=$studentid;
      $check->user_id=$userid;
      $check->type=$type;
      $check->date=\Carbon\Carbon::today()->format('Y-m-d');
      $check->category=\Carbon\Carbon::now()->format('H:i a');
      $check->save();
      return '0';
    }
    public function category(Request $request)
    {
      $id=$request->cid;
if($id=='1'){return view('test.about');}
elseif($id=='2'){return view('test.course');}
elseif($id=='3'){return view('test.teacher');}
    }
    public function runcat(Request $request)
    {
      $idd=$request->cid;
      $id=$request->hos;
if($idd=='1'){return view('run.about',compact('id'));}
elseif($idd=='2'){return view('run.course');}
elseif($idd=='3'){return view('test.teacher');}
    }
    public function paystack(Request $request){
      $paystack=\App\Gateway::first();
      $paystack->lpublic_key=$request->lpublic_key;
      $paystack->lsecret_key=$request->lsecret_key;
      $paystack->tpublic_key=$request->tpublic_key;
      $paystack->tsecret_key=$request->tsecret_key;
      $paystack->pay_url=$request->pay_url;
      $paystack->mer_email=$request->mer_email;
      $paystack->save();
      return back()->with(['message' => "".__('admin.succ_update')]);
    }
    public function paypal(Request $request){
      $paystack=\App\Gateway::first();
      $paystack->susername=$request->susername;
      $paystack->spassword=$request->spassword;
      $paystack->ssecret=$request->ssecret;
      $paystack->scert=$request->scert;
     $paystack->lusername=$request->lusername;
      $paystack->lpassword=$request->lpassword;
      $paystack->lsecret=$request->lsecret;
      $paystack->lcert=$request->lcert;
      $paystack->save();
      return back()->with(['message' => "".__('admin.succ_update')]);
    }
     public function stripe(Request $request){
      $paystack=\App\Gateway::first();
      $paystack->stripe_key=$request->stripe_key;
      $paystack->stripe_sec=$request->stripe_sec;
      $paystack->save();
      return back()->with(['message' => "".__('admin.succ_update')]);
    }
    public function bulk_sms(Request $request){
      $paystack=\App\Gateway::first();
      $paystack->bulk_user=$request->bulk_user;
      $paystack->bulk_pass=$request->bulk_pass;
      $paystack->save();
      return back()->with(['message' => "".__('admin.succ_update')]);
    }
    public function multi_sms(Request $request){
      $paystack=\App\Gateway::first();
      $paystack->multi_user=$request->multi_user;
      $paystack->multi_pass=$request->multi_pass;
      $paystack->save();
      return back()->with(['message' => "".__('admin.succ_update')]);
    }
    public function show_topic(Request $request){
    $id=$request->topic;
    $topic=\App\Reply::where('thread_id',$id)->latest()->simplePaginate(15);
      return view('admin.forum.topic_show',compact('id','topic'));
    }
    public function stud_topic(Request $request){
    $id=$request->topic;
    $topic=\App\Reply::where('thread_id',$id)->latest()->simplePaginate(15);
      return view('student.record.topic_show',compact('id','topic'));
    }
    public function parent_topic(Request $request){
    $id=$request->topic;
    $topic=\App\Reply::where('thread_id',$id)->latest()->simplePaginate(15);
      return view('parent.record.topic_show',compact('id','topic'));
    }
    public function nexmo_sms(Request $request){
      $paystack=\App\Gateway::first();
      $paystack->nexmo_key=$request->nexmo_key;
      $paystack->nexmo_sec=$request->nexmo_sec;
      $paystack->save();
      return back()->with(['message' => "".__('admin.succ_update')]);
    } 
    public function response_topic(Request $request){
    $id=$request->topic; $message=$request->text;
    $response=new \App\Reply;
    $response->user_id=\Auth::user()->id;
    $response->body=$message;
    $response->thread_id=$id;
    $response->status='0';
    $response->save();
    if(count(\App\Response::where('user_id',\Auth::user()->id)->where('thread_id',$id)->get())==0){
    $record=new \App\Response;
    $record->user_id=\Auth::user()->id;
    $record->thread_id=$id;
    $record->save();
    }
      return view('admin.forum.topic_message',compact('id'));
    }
     public function announce(Request $request){
      $announce=new \App\Announce;
      $announce->ref=$request->ref;
      $announce->subject=$request->subject;
      $announce->message=$request->message;
      $announce->email_not=$request->email;
     $announce->sms_not=$request->sms;
      $announce->save();
       $input=$request->all();
        for($i=0; $i <= count($input['student']); $i++){
    if(empty($input['student'][$i])) continue;
foreach(\App\Relation::where('student_id',$input['student'][$i])->get() as $parent){
if(count(\App\Announcelist::where('parent_id',$parent->id)->where('announce_id',$announce->id)->get())==0){
  $annlist=new \App\Announcelist;
  $annlist->announce_id=$announce->id;
  $annlist->student=$input['student'][$i];
  $annlist->parent_id=$parent->parent_id;
  $annlist->status='-1';
  $annlist->save();
        }
    }
  }
  
return back()->with(['message' => "".__('admin.succ_create')]);
    }
    public function edit_announce(Request $request,$id){
      $announce=\App\Announce::find($id);
      $announce->ref=$request->ref;
      $announce->subject=$request->subject;
      $announce->message=$request->message;
      $announce->email_not=$request->email;
     $announce->sms_not=$request->sms;
      $announce->save();
       $input=$request->all();
  if(count(\App\Announcelist::where('announce_id',$id)->get())>0){
  \App\Announcelist::where('announce_id',$id)->delete(); 
       }
  for($i=0; $i <= count($input['parent']); $i++){
    if(empty($input['parent'][$i])) continue;
  $annlist=new \App\Announcelist;
  $annlist->announce_id=$announce->id;
  $annlist->parent_id=$input['parent'][$i];
  $annlist->status='-1';
  $annlist->save();
        }
return back()->with(['message' => "".__('admin.succ_update')]);
    }
public function send_announce($id){
$smsapi=new SmsController;
  $resp=-1;
  $announcer=\App\Announce::find($id);
  $announcer->status='1';
  $announcer->save();
      $message = \urlencode(\App\Announce::find($id)->message); 
$sender= \urlencode(\App\Provider::first()->sms_name); 
if($announcer->sms_not=='1'){
if(\App\Setting::first()->sms=='Multitexter'){
foreach(\App\Announcelist::where('announce_id',$id)->get() as $parented){
 $resp=$smsapi->multi_message($sender,\App\Parenting::find($parented->parent_id)->phone, $message);
 $periodlist=\App\Announcelist::where('announce_id',$id)->first();
 $periodlist->status=$resp;
 $periodlist->type='Multitexter'; 
 $periodlist->save();
}
}
elseif(\App\Setting::first()->sms=='Bulksms'){
  $username = \App\Gateway::first()->bulk_user;
$password = \App\Gateway::first()->bulk_pass;
foreach(\App\Announcelist::where('announce_id',$id)->get() as $parented){
$resp=$smsapi->bulk_message($sender,\App\Parenting::find($parented->parent_id)->phone, $message);
$periodlist=\App\Announcelist::where('announce_id',$id)->first();
if($smsapi->before('|', $resp)!=''){
 $periodlist->status= $smsapi->before('|', $resp); 
}
 elseif($smsapi->before('|', $resp)==''){
$periodlist->status='-1';
 }
 $periodlist->type='Bulksms'; 
 $periodlist->save();
}
  }
elseif(\App\Setting::first()->sms=='Nexmo'){
foreach(\App\Announcelist::where('announce_id',$id)->get() as $parented){
$resp=$smsapi->nexmo_message($sender,\App\Parenting::find($parented->parent_id)->phone,\App\Announce::find($id)->message);
$periodlist=\App\Announcelist::where('announce_id',$id)->first();
$json =json_decode($resp,true);
if($json['messages'][0]['status']!=''){
$periodlist->status=$json['messages'][0]['status'];  
$periodlist->type='Nexmo';  
}
elseif($json['messages'][0]['status']==''){
  $periodlist->status='-1';
  $periodlist->type='Nexmo'; 
}
 $periodlist->save();
}
}
}
if($announcer->email_not=='1'){
  foreach(\App\Announcelist::where('announce_id',$id)->get() as $dual){
    $offerte=$dual->parent_id;
    $class=new \App\Messaging;
    $class->send_id=\Auth::user()->id;
    $class->receive_id=\App\Parenting::find($dual->parent_id)->user_id;
    $class->message_title=\App\Announce::find($id)->subject;
    $class->content=\App\Announce::find($id)->message;
     $class->status='0';
    $class->type=\Auth::user()->role;
     $class->save();
    try {
  \Mail::raw(\App\Announce::find($id)->message, function($messagen) use ($offerte,$id)
{
    $messagen->from(\App\Provider::first()->email,\App\Provider::first()->name);

    $messagen->to(\App\Parenting::find($offerte)->email)->subject(\App\Announce::find($id)->subject);
});
  $periodlist=\App\Announcelist::where('announce_id',$id)->first();
  $periodlist->mail_stat='1';
  $periodlist->save();
  } catch (\Exception $ex) {
      // Debug via $ex->getMessage();
    $periodlist->mail_stat='0';
  $periodlist->save();
}
  }
  }
return '0';
}  
public function reannounce($id){
$smsapi=new SmsController;
  $resp=\App\Announcelist::find($id)->resp;
  $announcer=\App\Announce::find(\App\Announcelist::find($id)->announce_id);
      $message = \urlencode($announcer->message); 
$sender= \urlencode(\App\Provider::first()->sms_name); 
if($announcer->sms_not=='1'){
if(\App\Setting::first()->sms=='Multitexter'){
 $resp=$smsapi->multi_message($sender,\App\Parenting::find(\App\Announcelist::find($id)->parent_id)->phone, $message);
 $periodlist=\App\Announcelist::find($id);
 $periodlist->status=$resp;
 $periodlist->type='Multitexter'; 
 $periodlist->save();
$smsapi->before('|', $resp);
}
elseif(\App\Setting::first()->sms=='Bulksms'){
  $username = \App\Gateway::first()->bulk_user;
$password = \App\Gateway::first()->bulk_pass;
$resp=$smsapi->bulk_message($sender,\App\Parenting::find(\App\Announcelist::find($id)->parent_id)->phone, $message);
$periodlist=\App\Announcelist::find($id);
 $periodlist->status= $smsapi->before('|', $resp);
 $periodlist->type='Bulksms'; 
 $periodlist->save();
 return $resp;
  }
elseif(\App\Setting::first()->sms=='Nexmo'){
$resp=$smsapi->nexmo_message($sender,\App\Parenting::find(\App\Announcelist::find($id)->parent_id)->phone,\App\Announce::find(\App\Announcelist::find($id)->message));
$periodlist=\App\Announcelist::find($id);
$json =json_decode($resp,true);
if($json['messages'][0]['status']!=''){
$periodlist->status=$json['messages'][0]['status'];  
$periodlist->type='Nexmo';
$periodlist->save();
 return $json['messages'][0]['status'];  
}
elseif($json['messages'][0]['status']==''){
  $periodlist->status='-1';
  $periodlist->type='Nexmo'; 
  $periodlist->save();
 return '-1';
}

}
}

}
}
