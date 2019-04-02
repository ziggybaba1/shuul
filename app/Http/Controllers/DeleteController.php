<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DeleteController extends Controller
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
    public function borrow_delete($id)
    {
    	\App\Borrow::find($id)->delete();
		return '0';
    }
   
    public function  reset_test($id)
    {
     if(\Auth::user()->role!=='demo'&&\App\Role::where('staff_id',\Auth::user()->id)->first()->reset=='1'){
      \App\Clockin::find($id)->delete();
    return '0';
  }else{return '1';}
    }
   
    public function activate_test($id)
    {
   if(\Auth::user()->role!=='demo'&&\App\Role::where('staff_id',\Auth::user()->id)->first()->batch_act=='1'){
     $batch=\App\Batch::find($id);
     $batch->status='1';
     $batch->save();
    return '0';
  }else{return '1';}
    }
    public function deactivate_test($id)
    {
   if(\Auth::user()->role!=='demo'&&\App\Role::where('staff_id',\Auth::user()->id)->first()->batch_act=='1'){
     $batch=\App\Batch::find($id);
     $batch->status='0';
     $batch->save();
    return '0';
      }else{return '1';}
    }
    public function suspend_test($id)
    {
 if(\Auth::user()->role!=='demo'&&\App\Role::where('staff_id',\Auth::user()->id)->first()->batch_act=='1'){
     $batch=\App\Batch::find($id);
     $batch->status='2';
     $batch->save();
    return '0';
     }else{return '1';}
    }
    public function subject_delete($id)
    {
    if(count(\App\Teachsub::where('subject_id',$id)->get())>0||count(\App\Subjectassign::where('subject',$id)->get())>0){
   return '1';
		}
		else{
  if(\Auth::user()->role==='admin'){
   \App\Subject::find($id)->delete();
    return '0'; 
  }
	else{ return '1';}
		}
    }
    public function batch_delete($id)
    {
   if(count(\App\Question::where('batch_id',$id)->get())>0){
   return '1';
	}
	else{
    if(\Auth::user()->role==='admin'){
	\App\Batch::find($id)->delete();
	return '0';
}else{return '1';}
	}
    }
    public function subtype_delete($id)
    {
  	if(count(\App\Subject::where('type',$id)->get())>0){
   return '1';
			}
			else{
          if(\Auth::user()->role==='admin'){
		\App\Subjecttype::find($id)->delete();
		return '0';}else{return '1';}
			}
    	}
   public function inv_delete($id)
    {
    if(\Auth::user()->role==='admin'){
  	\App\Inventory::find($id)->delete();
	return '0';
}else{return '1';}
    }
    public function stud_delete($id)
    {
  	if(count(\App\Result::where('student_id',$id)->get())>0){
   return '1';
		}
		else{
    if(\Auth::user()->role==='admin'){
		\App\Student::find($id)->delete();
		return '0';
  }else{return '1';}
		}
    }
    public function pat_delete($id)
    { 
        if(\Auth::user()->role==='admin'){
  \App\User::find(\App\Parenting::find($id)->user_id)->delete(); 	
\App\Parenting::find($id)->delete();
\App\Relation::where('parent_id',$id)->delete();

return '0';
}else{return '1';}
    }
     public function guard_delete($id)
    {
  	if(count(\App\Related::where('guardian_id',$id)->get())>0){
   return '1';
}
else{
  if(\Auth::user()->role==='admin'){
\App\Guardian::find($id)->delete();
return '0';}else{return '1';}
}
}
public function course_delete($id)
    {
    if(count(\App\Lesson::where('course_id',$id)->get())>0){
   return '1';
}
else{
\App\Course::find($id)->delete();
return '0';
}
    }
     public function ebook_delete($id)
    {
        if(\Auth::user()->role==='admin'){
  \App\Ebook::find($id)->delete();
return '0';
}else{return '1';}
    }
    public function question_delete($id)
    {
        if(\Auth::user()->role==='admin'){
 \App\Question::find($id)->delete();
return '0';
}else{return '1';}
    }
  public function category_delete($id)
    {
        if(\Auth::user()->role==='admin'){
 \App\Category::find($id)->delete();
return '0';
}else{return '1';}
    }
  public function lesson_delete($id)
    {
    if(\Auth::user()->role==='admin'){
  \App\Lesson::find($id)->delete();
    return '0';
  }else{return '1';}
    }
    public function enroll_delete($id)
    {
  \App\Enroll::find($id)->delete();
    return '0';
    }
    public function account_delete($id)
    {
        if(\Auth::user()->role==='admin'){
  \App\Account::find($id)->delete();
    return '0';
  }else{return '1';}
    }
    public function pay_delete($id)
    {
    if(\Auth::user()->role==='admin'){
  \App\Pay::find($id)->delete();
    return '0';
  }else{return '1';}
    }
    public function eventcat_delete($id)
    {
        if(\Auth::user()->role==='admin'){
  \App\Procedure::find($id)->delete();
    return '0';
  }else{return '1';}
    }
    public function gellery_delete($id)
    {
      if(\Auth::user()->role==='admin'){
  \App\Gallery::find($id)->delete();
    return '0';
  }else{return '1';}
    }
    public function slide_delete($id)
    {
  \App\Frontgallery::find($id)->delete();
    return '0';
    }
    public function feature_delete($id)
    {
  \App\Frontabout::find($id)->delete();
    return '0';
    }
    public function syllabus_delete($id)
    {
        if(\Auth::user()->role==='admin'){
  \App\Syllabus::find($id)->delete();
    return '0';
  }else{return '1';}
    }
    public function lesson_note_delete($id)
    {
        if(\Auth::user()->role==='admin'){
  \App\Lessonote::find($id)->delete();
    return '0';
  }else{return '1';}
    }
     public function expense_delete($id)
    {
        if(\Auth::user()->role==='admin'){
  \App\Expense::find($id)->delete();
    return '0';
  }else{return '1';}
    }
    public function notice_delete($id)
    {
        if(\Auth::user()->role==='admin'){
  \App\Noticeboard::find($id)->delete();
    return '0';
  }else{return '1';}
    }
    public function thread_delete($id)
    {
    if(\Auth::user()->role==='admin'){
  \App\Thread::find($id)->delete();
    return '0';
  }else{return '1';}
    }
    public function abtfeat_delete($id)
    {
  \App\Frontlist::find($id)->delete();
    return '0';
    }
   public function event_delete($id)
    {
        if(\Auth::user()->role==='admin'){
  \App\Event::find($id)->delete();
    return '0';
  }else{return '1';}
    }
    public function testimony_delete($id)
    {
  \App\Testimonial::find($id)->delete();
    return '0';
    }
    public function announce_delete($id)
    {
        if(\Auth::user()->role==='admin'){
  \App\Announce::find($id)->delete();
}
    return view('admin.message.announce_show');
    }
    public function forum_delete($id)
    {
        if(\Auth::user()->role==='admin'){
  \App\Forum::find($id)->delete();
    return '0';
  }else{return '1';}
    }
    public function reply_delete($id)
    {
        if(\Auth::user()->role==='admin'){
  \App\Reply::find($id)->delete();
    return '0';
  }else{return '1';}
    }
     public function hostel_delete($id)
    {
        if(\Auth::user()->role==='admin'){
    \App\Bed::where('dorm_id',$id)->delete();
  \App\Room::where('dorm_id',$id)->delete();
  \App\Dormitory::find($id)->delete();
    return '0';
  }else{return '1';}
    }
     public function room_delete($id)
    {
        if(\Auth::user()->role==='admin'){
    \App\Bed::where('room_id',$id)->delete();
  \App\Room::find($id)->delete();
    return '0';
  }else{return '1';}
    }
     public function report_delete($id)
    {
  if(\Auth::user()->role==='admin'){
  \App\Report::find($id)->delete();
    return '0';
  }else{return '1';}
    }
     public function bed_delete($id)
    {
        if(\Auth::user()->role==='admin'){
  \App\Bed::find($id)->delete();
    return '0';
  }else{return '1';}
    }
    public function plan_delete($id)
    {
        if(\Auth::user()->role==='admin'){
  $plan=\App\Plan::find($id);
  $plan->delete='1';
  $plan->save();
    return '0';
  }else{
    return '1';
    }
  }
    
}
