<?php

namespace App\Console\Commands;

use App\Announcement;
use App\Product;
use App\User;
use Illuminate\Console\Command;
use Mail;

class SendAnnouncements extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'send:announcements';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send announcements to SAs and CSAs';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $items = Announcement::unsentEmails()->get();
        if ($items->count()) {
            $sas = User::superAdmin()->get();
            $cas = User::countryAdmin()->get();

            $itemsForSa = $items->filter(function ($item) {
                return $item->for_sa;
            });

            $itemsForCSa = $items->filter(function ($item) {
                return $item->for_csa;
            });


            if ($itemsForSa->count()) {
                foreach ($sas as $sa) {
                    Mail::to($sa->email)->send(new \App\Mail\AnnouncementNotification($itemsForSa));
                }
            }

            if ($itemsForCSa->count()) {
                foreach ($cas as $ca) {
                    Mail::to($ca->email)->send(new \App\Mail\AnnouncementNotification($itemsForCSa));
                }
            }
        }

    }
}
