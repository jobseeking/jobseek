<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJobSkillExperienceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('job_skill_experiences')){
            Schema::create('job_skill_experiences', function (Blueprint $table) {
                $table->increments('id');
               
                $table->integer('job_id')->unsigned();
                $table->foreign('job_id')->references('id')->on('jobs');

                $table->integer('skill_id')->unsigned();
                $table->foreign('skill_id')->references('id')->on('classification_skills');

                $table->integer('experience_years')->unsigned()->default(0);

                $table->timestamps();
            });
        }
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
