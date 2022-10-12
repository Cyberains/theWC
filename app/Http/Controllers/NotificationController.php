<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function ViewNotification(Request $request){
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


//
//
//{
//    public function ViewNotification(Request $request){
//    if ($request->ajax()) {
////            $notifycount = auth()->user()->unreadNotifications->count();
//        $notifycount = DB::table('notifications')->where('notifiable_id',auth()->user()->id)->whereNull('read_at')->count();
//        if ($notifycount<10) {
//            $notifycount = '0'.$notifycount;
//        }
////        $notificationdata = auth()->user()->notifications()->paginate(25);
////        view('professional.layouts.notification',compact('notificationdata','notifycount'))->render();
//        if($notifycount>0){
////                $notificationdata = DB::table('notifications')->where('notifiable_id',auth()->user()->id)->whereNull('read_at')->orderBy('id','desc')->limit(4)->get();
//            $notificationdata = auth()->user()->unreadNotifications->take(4);
//            return view('professional.layouts.notification',compact('notificationdata','notifycount'))->render();
//        }
//    }
//}
//}
