<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function ViewNotification(Request $request){

        if(Auth::user()->role=='admin'){
              $notifycount = auth()->user()->unreadNotifications->count();
        if ($notifycount<10) {
            $notifycount = '0'.$notifycount;
        }
        $notificationdata = DB::table('notifications')->orderBy('id','desc')->paginate(25);
        return view('admin.include.notification',compact('notificationdata','notifycount'))->render();
   
        }else{
            $notifycount = auth()->user()->unreadNotifications->count();
        if ($notifycount<10) {
            $notifycount = '0'.$notifycount;
        }
//        $notificationdata = auth()->user()->notifications()->paginate(25);
//        view('admin.marketing.notification',compact('notificationdata'))->render();
        if($notifycount>0){
            $notificationdata = auth()->user()->unreadNotifications->take(4);
            return view('professional.layouts.notification',compact('notificationdata','notifycount'))->render();
        }
    }
}
}
        
     
