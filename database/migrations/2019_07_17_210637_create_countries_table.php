<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCountriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('countries', function (Blueprint $table) {
            $table->smallIncrements('id');
            $table->unsignedSmallInteger('region_id')->nullable();
            $table->unsignedSmallInteger('language_id'); //requires a language to know which to pull from content

            $table->foreign('region_id')->references('id')->on('regions');
            $table->foreign('language_id')->references('id')->on('languages');
            $table->string('name')->unique();
            $table->string('code', 6)->unique();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        Schema::dropIfExists('countries', function (Blueprint $table) {
            $table->dropForeign(['region_id']);
            $table->dropForeign(['language_id']);
        });
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
