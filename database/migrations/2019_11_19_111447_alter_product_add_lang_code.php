<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterProductAddLangCode extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('product_contents', function (Blueprint $table) {
            $table->string('lang_code')->default('en')->after('country_code');
        });

        Schema::table('product_media', function (Blueprint $table) {
            $table->string('lang_code')->default('en')->after('country_code');
        });
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
