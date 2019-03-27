<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSummariesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('summaries', function (Blueprint $table) {
            $table->increments('id');
            $table->string('contact_info_1')->nullable();
            $table->string('contact_info_2')->nullable();
            $table->string('contact_info_3')->nullable();
            $table->string('contact_info_comment')->nullable();
            $table->string('education_1')->nullable();
            $table->string('education_2')->nullable();
            $table->string('education_3')->nullable();
            $table->string('education_comment')->nullable();
            $table->string('experience_1')->nullable();
            $table->string('experience_2')->nullable();
            $table->string('experience_3')->nullable();
            $table->string('experience_comment')->nullable();
            $table->string('involvement_1')->nullable();
            $table->string('involvement_2')->nullable();
            $table->string('involvement_3')->nullable();
            $table->string('involvement_comment')->nullable();
            $table->string('visual_1')->nullable();
            $table->string('visual_2')->nullable();
            $table->string('visual_3')->nullable();
            $table->string('visual_comment')->nullable();
            $table->string('organization_1')->nullable();
            $table->string('organization_2')->nullable();
            $table->string('organization_3')->nullable();
            $table->string('organization_comment')->nullable();
            $table->string('grammar_1')->nullable();
            $table->string('grammar_2')->nullable();
            $table->string('grammar_3')->nullable();
            $table->string('grammar_comment')->nullable();
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
        Schema::dropIfExists('summaries');
    }
}
