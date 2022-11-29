<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class SendEmailNotification extends Notification
{
    use Queueable;
    private $details;


    public function __construct($details)
    {
        $this->details = $details;
    }

    public function via($notifiable)
    {
        return ['mail'];
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)

                     ->greeting($this->details['name'])
                    ->line($this->details['email'])
                    ->subject($this->details['subject'])
                    ->line($this->details['text']);
    }

    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
