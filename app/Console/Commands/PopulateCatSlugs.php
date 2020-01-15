<?php

namespace App\Console\Commands;

use App\ProductCategory;
use Illuminate\Console\Command;
use Illuminate\Support\Str;

class PopulateCatSlugs extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'popcatslugs';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Populate the slugs for the product categories';

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
        foreach (ProductCategory::all() as $cat) {
            $this->info("Updating $cat->name");
            $cat->update(['slug' => Str::slug($cat->name, '-')]);
        }
    }
}
