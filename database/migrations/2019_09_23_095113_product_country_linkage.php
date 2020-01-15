<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ProductCountryLinkage extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('product_contents', function (Blueprint $table) {
            $table->string('country_code')->default('US')->after('text');
        });

        Schema::table('product_media', function (Blueprint $table) {
            $table->string('country_code')->default('US')->after('path');
        });


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('product_contents', function (Blueprint $table) {
            $table->dropColumn('country_code');
        });

        Schema::table('product_media', function (Blueprint $table) {
            $table->dropColumn('country_code');
        });

    }
}
