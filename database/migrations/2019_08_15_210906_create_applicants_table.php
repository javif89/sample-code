<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateApplicantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('applicants', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->uuid('career_id');
            $table->unsignedSmallInteger('education_level_id');

            $table->foreign('education_level_id')->references('id')->on('education_levels');
            $table->string('fname');
            $table->string('lname');
            $table->string('email');
            $table->string('phone');
            $table->string('resume');
            $table->string('linkedIn')->nullable();
            $table->string('website')->nullable();
            $table->string('reference');
            $table->string('graduation_year')->nullable();
            $table->string('college')->nullable();
            $table->string('compensation');
            $table->boolean('relocation');
            $table->boolean('authorized');
            $table->boolean('convicted');
            $table->text('convicted_reason')->nullable();
            $table->softDeletes();

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
        Schema::dropIfExists('applicants');
    }
}
