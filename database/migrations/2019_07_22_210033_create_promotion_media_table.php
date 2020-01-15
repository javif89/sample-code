<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePromotionMediaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('promotion_media', function (Blueprint $table) {
            $table->increments('id');
            $table->uuid('promotion_id');
            $table->unsignedInteger('media_type_id');

            $table->foreign('promotion_id')->references('id')->on('promotions');
            $table->foreign('media_type_id')->references('id')->on('media_types');
            $table->string('path');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('promotion_media');
    }
}
