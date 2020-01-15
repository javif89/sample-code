<?php

namespace App\Notifications;

use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class CsaActionsNotification extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     *
     */

    public $message = '';
    public $author;
    public $country;

    public function __construct($message, User $author, $country)
    {
        $this->message = $message;
        $this->author = $author;
        $this->country = $country;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->subject('CSA action: '.$this->message.' in '. $this->country->name)
                        ->line('The following action has been made  by CSA')
                            ->line($this->message)
                                ->line('Country:'. $this->country->name)
                                    ->line('CSA name:'. $this->author->name.' ('. $this->author->email.')');

    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
