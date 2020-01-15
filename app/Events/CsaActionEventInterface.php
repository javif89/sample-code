<?php

namespace App\Events;


use App\User;

interface CsaActionEventInterface
{


    public function getMessage(): string;

    public function getUser(): User;
}