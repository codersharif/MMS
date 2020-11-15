<?php

namespace App\Mail;

use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactMail extends Mailable {

    use Queueable,
        SerializesModels;

    public $user;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(string $user) {
        $this->user = $user;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build() {
//        system-1
        /* return $this->view('emails.contact-me')
          ->subject('More information About '. $this->topic); */

        // system -2
//         return $this->markdown('emails.contact-me-2')
//                ->subject('More information About '. $this->topic);

        return $this->view('emails.contact-me')
                        ->subject('Your Meal rate satus')
                        ->with([
                            'user_id' => $this->user,
        ]);
    }

}
