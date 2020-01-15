<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterAddCountryCodeAndLangCodeToEventContents extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('event_contents', function (Blueprint $table) {
            $table->string('country_code')->default('US');
            $table->string('lang_code')->default('en');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('event_contents', function (Blueprint $table) {
            $table->dropColumn(['country_code', 'lang_code']);
        });
    }
}
