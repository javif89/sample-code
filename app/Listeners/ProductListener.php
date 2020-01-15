<?php

namespace App\Listeners;

use App\CountryContext;
use App\Events\CsaActionEventInterface;
use App\Events\ProductCountryChanged;
use App\Notifications\CsaActionsNotification;
use App\User;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class ProductListener implements ShouldQueue
{

    use InteractsWithQueue;

    public function handle(CsaActionEventInterface $event)
    {
        $this->sendNotification($event->getMessage(), $event->getUser());
    }

    private function sendNotification($message, $user)
    {
        // notify only if changes were made by not superadmin
        if (!$user->isSuper) {
            $country = $user->country;
            $superadmins = User::superAdmin()->get();
            foreach ($superadmins as $superadmin) {
                $superadmin->notify(new CsaActionsNotification($message, $user, $country));
            }
        }

    }

}