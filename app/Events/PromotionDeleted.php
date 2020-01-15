<?php

namespace App\Events;

use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Foundation\Events\Dispatchable;

class PromotionDeleted implements CsaActionEventInterface
{
    use Dispatchable, SerializesModels, Queueable;

    /**
     * Create a new event instance.
     *
     * @return void
     */

    public $user;
    public $promotionName;

    public function __construct($promotionName, $user)
    {
        $this->user = $user;
        $this->promotionName = $promotionName;

    }

    public function getMessage(): string
    {
        return 'Promotion "'. $this->promotionName. '" was deleted ';
    }

    public function getUser(): User
    {
        return $this->user;
    }


}
