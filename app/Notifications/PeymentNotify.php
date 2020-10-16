<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\NexmoMessage;

class PeymentNotify extends Notification {

    use Queueable;

    protected $amount;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($amount) {
        $this->amount = $amount;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable) {
//        return ['mail'];
        return ['mail', 'database', 'nexmo']; //database notification uses with sms send nexmo
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable) {
        return (new MailMessage)
                        ->subject('Payment Receive Information')
                        ->greeting('Whats up!')
                        ->line('One of your invoices has been paid!')
                        ->line('One of your invoices has been paid!')
                        ->action('View Invoice', url('https://laracasts.com'))
                        ->line('Thanks!');
    }

    public function toNexmo($notifiable) {

        return (new NexmoMessage())
                        ->content('Your Laracast payment has been processed');
        
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable) {

        return [
            'amount' => $this->amount
        ];
    }

}
