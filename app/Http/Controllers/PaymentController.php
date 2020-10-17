<?php
/*
  |App version 1.0
  |@author shariful islam khan
  
 */

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Notifications\PeymentNotify;
use Illuminate\Support\Facades\Notification;
use Nexmo\Laravel\Facade\Nexmo;
use App\Events\peymentPurches;

class PaymentController extends Controller {

    public function show() {
        return view('payment.index');
    }

    public function store() {
        
       //  send sms use nexmo

//        Nexmo::message()->send([
//            'to' => '8801537498966',
//            'from' => '16105552344',
//            'text' => 'i love u jaki'
//        ]);

//        system -1
//        Notification::send(request()->user(),new PeymentNotify());
//        system -2
        request()->user()->notify(new PeymentNotify(900));
        //database notification
//        Notification::send(request()->user(),new PeymentNotify(900));

        return redirect('payment');
    }
    
    
    public function eventAction(){
        
       peymentPurches::dispatch('toy');
//       return redirect('payment'); 
    }

}
