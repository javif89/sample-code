<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnouncements extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('announcements', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('type');
            $table->text('body');
            $table->boolean('for_sa')->default(true);
            $table->boolean('for_csa')->default(true);
            $table->boolean('to_email')->default(false);
            $table->boolean('sent')->default(false);
            $table->integer('created_by');
            $table->timestamps();
        });

        Schema::create('announcement_user_view', function (Blueprint $table) {
            $table->bigInteger('announcement_id');
            $table->bigInteger('user_id');
            $table->timestamp('created_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('anouncements');
    }
}
