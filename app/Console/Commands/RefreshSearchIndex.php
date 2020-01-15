<?php

namespace App\Console\Commands;

use App\Promotion;
use Illuminate\Console\Command;

class RefreshSearchIndex extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'search:refresh';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Run bulk search import';

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
        $this->call('scout:import', ['model' => \App\ProductContent::class]);
        $this->call('scout:import', ['model' => \App\Product::class]);
        $this->call('scout:import', ['model' => \App\Promotion::class]);
        $this->call('scout:import', ['model' => \App\Event::class]);
        $this->call('scout:import', ['model' => \App\Career::class]);
        $this->call('scout:import', ['model' => \App\Article::class]);
    }
}
