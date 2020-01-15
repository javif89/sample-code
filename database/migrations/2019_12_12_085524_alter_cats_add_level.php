<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterCatsAddLevel extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('product_categories', function (Blueprint $table) {
            $table->integer('level')->default(0);
            $table->string('path');
        });

        $cats = \App\ProductCategory::all();
        foreach ($cats as $cat) {
            $cat->level = $cat->calculateLevel();
            $cat->path = $cat->calculatePath();
            $cat->save();
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
