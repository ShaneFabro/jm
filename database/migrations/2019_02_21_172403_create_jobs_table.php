<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jobs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('company');
            $table->string('website')->nullable();
            $table->integer('is_open')->default(1);
            $table->string('job_title');
            $table->text('job_description');
            $table->text('job_qualification');
            $table->text('job_requirement');
            $table->text('contact_person');
            $table->integer('course_id')->index()->unsigned()->nullable();
            $table->integer('photo_id')->index()->unsigned()->nullable();
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
        Schema::dropIfExists('jobs');
    }
}
