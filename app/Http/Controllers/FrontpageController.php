<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Alert;
use App\Http\Requests;
use Artisan;
use Log;
use Storage;

class FrontpageController extends Controller
{
    public function yearbook(Request $request){
         $yearbooks=\App\Yearbook::latest()->paginate(8);
         if ($request->ajax()) {
            return view('frontend.list.ybooklist', ['yearbooks' => $yearbooks])->render();  
        }
        return view('frontend.courses',compact('yearbooks'));   
    }
     public function gallery(Request $request){
         $gallerys=\App\Gallery::where('status','2')->latest()->paginate(15);
         if ($request->ajax()) {
            return view('frontend.list.gallerylist', ['gallerys' => $gallerys])->render();  
        }
        return view('frontend.gallery',compact('gallerys'));   
    }
    public function notice(Request $request){
         $notices=\App\Noticeboard::where('status','0')->orWhere('status','6')->latest()->paginate(9);
         if ($request->ajax()) {
            return view('frontend.list.noticelist', ['notices' => $notices])->render();  
        }
        return view('frontend.notification',compact('notices'));   
    }
    public function event(Request $request){
         $events=\App\Event::where('edate','>=',\Carbon\Carbon::today()->format('Y-m-d'))->latest()->paginate(10);
         if ($request->ajax()) {
            return view('frontend.list.eventlist', ['events' => $events])->render();  
        }
        return view('frontend.event',compact('events'));   
    }
    public function teacher(Request $request){
         $teachers=\App\Teacher::where('role','teacher')->where('status','0')->where('feat','1')->latest()->get();
        return view('frontend.teacher',compact('teachers'));   
    }
    public function about(Request $request){
       return view('frontend.about1');     
    }
    public function admission(Request $request){
     return view('frontend.admission');    
    }
    public function contact(Request $request){
     return view('frontend.contact');    
    }
    
     public function coursepages(Request $request){
        $id=$request->req;
        $page=$request->page;
        if($page=='course_code'){
            return view('frontend.courselist',compact('id'));
        }
        if($page=='course_price'){
            return view('frontend.price',compact('id'));
        }
     }
     public function tabpages(Request $request){
        $page=$request->page;
        if($page=='1'){
            return view('admin.res.frontnotice');
        }
        elseif($page=='2'){
            return view('admin.res.frontcourse');
        }
        elseif($page=='3'){
            return view('admin.res.frontgallery');
        }
         elseif($page=='4'){
            return view('admin.res.frontteacher');
        }
         elseif($page=='5'){
            return view('admin.res.frontabout');
        }
         elseif($page=='6'){
            return view('admin.res.frontfuture');
        }
         elseif($page=='7'){
            return view('admin.res.fronttestimony');
        }
         elseif($page=='8'){
            return view('admin.res.frontheader');
        }
         elseif($page=='9'){
            return view('admin.res.frontbody');
        }
         elseif($page=='10'){
            return view('admin.res.frontfooter');
        }
         elseif($page=='11'){
            return view('admin.res.frontsetting');
        }
        elseif($page=='12'){
            return view('admin.res.adm_payment');
        }
        elseif($page=='13'){
            return view('admin.res.adm_sms');
        }
        elseif($page=='14'){
            return view('admin.res.adm_gset');
        }
         elseif($page=='15'){
            return view('admin.res.adm_sset');
        }
         elseif($page=='16'){
            return view('admin.res.count');
        }
         elseif($page=='17'){
            return view('admin.res.support');
        }
         elseif($page=='18'){
            return view('admin.res.plugin');
        }
        elseif($page=='19'){
             $disk = Storage::disk(config('laravel-backup.backup.destination.disks')[0]);
        $files = $disk->files(config('laravel-backup.backup.name'));
        $backups = [];
        // make an array of backup files, with their filesize and creation date
        foreach ($files as $k => $f) {
            // only take the zip files into account
            if (substr($f, -4) == '.zip' && $disk->exists($f)) {
                $backups[] = [
                    'file_path' => $f,
                    'file_name' => str_replace(config('laravel-backup.backup.name') . '/', '', $f),
                    'file_size' => $disk->size($f),
                    'last_modified' => $disk->lastModified($f),
                ];
            }
        }
        // reverse the backups, so the newest one would be on top
        $backups = array_reverse($backups);
            return view('admin.res.backup',compact('backups'));
        }
     }
       public function contactus(Request $request){
        $message=new \App\Contact;
        $message->name=$request->name;
        $message->email=$request->email;
        $message->subject=$request->subject;
         $message->status='0';
        $message->question=$request->message;
        $message->save();
       }
}
