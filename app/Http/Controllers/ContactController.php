<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactMail;
use App\Mail\Contact;
use App\User;
use App\milSavings;
use App\milCost;
use App\milCount;
use DB;

class ContactController extends Controller {

    public function show() {

        return view('contact');
    }

    public function send() {

        request()->validate([
            'email' => 'required|email'
        ]);


        //Normal or Basic  Mail System  Part -1
        /* mail::raw('its work',function($message){
          $message->to(request('email'))
          ->subject('helo there');
          }); */


//        Mail System Part-2
//        Mail::to(request('email'))
//                ->send(new ContactMail('controller'));
//        system -3
        Mail::to(request('email'))
                ->send(new Contact());


        return redirect('/contact')->with('message', 'mail send succesfully');
    }

    public function emailSent() {

        $users = User::find(request('user_id'));
       
        Mail::to($users->email)
                ->send(new ContactMail(request('user_id')));

        return redirect('/home')->with('status', 'mail send succesfully');
    }


}
