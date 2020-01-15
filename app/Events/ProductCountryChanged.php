<?php

namespace App\Events;

use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;

class ProductCountryChanged implements CsaActionEventInterface
{
    use Dispatchable, InteractsWithSockets, SerializesModels, Queueable;

    /**
     * Create a new event instance.
     *
     * @return void
     *
     */

    public $productName;
    public $active;

    public function __construct($productName, $active)
    {
        $this->productName = $productName;
        $this->active = $active;
        $this->user = \Auth::user();
    }

    public function getMessage(): string
    {
        return $this->productName.' was '. ($this->active ? 'enabled' : 'disabled');
    }

    public function getUser(): User
    {
        return $this->user;
    }

}
