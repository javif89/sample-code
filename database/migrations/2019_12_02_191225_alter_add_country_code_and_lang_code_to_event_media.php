<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterAddCountryCodeAndLangCodeToEventMedia extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('event_media', function (Blueprint $table) {
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
        Schema::table('event_media', function (Blueprint $table) {
            $table->dropColumn(['country_code', 'lang_code']);
        });
    }
}
