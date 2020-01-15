<?php

namespace App\Mail;

use App\Announcement;
use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Collection;

class AnnouncementNotification extends Mailable
{
    use Queueable, SerializesModels;

    public $announcements;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Collection $announcements)
    {
        $this->announcements = $announcements;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('We\'ve made an update!')->markdown('emails.announcement', ['announcements'=>$this->announcements]);
    }
}
