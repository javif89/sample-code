<?php

namespace App\Console\Commands;

use App\EventMedia;
use App\ProductMedia;
use Illuminate\Console\Command;
use Illuminate\Support\Str;

class ReplaceUrlInMediaPaths extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'media:changepaths {newdomain}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Replace the domain in the paths of event and product media';

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
        $newdomain = $this->argument('newdomain');

        // Change product media paths
        foreach (ProductMedia::all() as $m) {
            // Only change it if it's not the default placeholder path
            if($m->path != '/images/admin/placeholder.png') {
                $parts = parse_url($m->path);
                $domain = $parts['scheme']."://".$parts['host'];

                $old = $m->path;
                $new = Str::replaceFirst($domain, $newdomain, $m->path);
                // Change the path
                $m->update(['path' => $new]);
                $m->refresh();

                $this->info("$old => $new");
            }
        }

        // Change event media paths
        foreach (EventMedia::all() as $m) {
            // Only change it if it's not the default placeholder path
            if ($m->path != '/images/admin/placeholder.png') {
                $parts = parse_url($m->path);
                $domain = $parts['scheme'] . "://" . $parts['host'];

                $old = $m->path;
                $new = Str::replaceFirst($domain, $newdomain, $m->path);
                // Change the path
                $m->update(['path' => $new]);
                $m->refresh();

                $this->info("$old => $new");
            }
        }
    }
}
