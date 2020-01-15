<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AdminInvitation extends Model
{
    protected $guarded = ['id'];

    public function markUsed()
    {
        $this->update([
            'used' => 1
        ]);
    }

    public function getInviteLink()
    {
        $appUrl = env("APP_URL");
        $code = $this->code;

        return route('admin-invite', ['inviteCode' => $code]);
    }
}
