<?php

namespace App\Events;

use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Foundation\Events\Dispatchable;

class ProductModified implements CsaActionEventInterface
{
    use Dispatchable, SerializesModels, Queueable;

    /**
     * Create a new event instance.
     *
     * @return void
     */

    public $user;
    public $productName;

    public function __construct($productName, $user)
    {
        $this->user = $user;
        $this->productName = $productName;

    }

    public function getMessage(): string
    {
        return $this->productName . ' was modified ';
    }

    public function getUser(): User
    {
        return $this->user;
    }


}
