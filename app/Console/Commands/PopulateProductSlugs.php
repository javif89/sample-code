<?php

namespace App\Console\Commands;

use App\Product;
use Illuminate\Console\Command;
use Illuminate\Support\Str;

class PopulateProductSlugs extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'products:populateslugs';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Populate the slug property of each product';

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
        foreach (Product::all() as $p) {
            $p->update(['slug' => Str::slug($p->name, '-')]);
            $p->refresh();
            $this->info("$p->name => $p->slug");
        }
    }
}
