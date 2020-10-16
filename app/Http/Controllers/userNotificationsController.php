<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class userNotificationsController extends Controller
{
    public function show(){
        
//        1 step notification view
//        $notifications = Auth()->user()->notifications;
        
//        notificaion read code system-1
        /* $notifications = Auth()->user()->unreadnotifications;
         $notifications->markAsRead();*/
         
//         system -2
        $notifications =tap(auth()->user()->unreadNotifications)->markAsRead();
         
        return view('notifications.show',compact('notifications'));
    }
}
