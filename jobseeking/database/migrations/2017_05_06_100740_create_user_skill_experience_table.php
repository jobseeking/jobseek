<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserSkillExperienceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('user_skill_experience')){
            Schema::create('user_skill_experience', function (Blueprint $table) {
                $table->increments('id');
               
                $table->integer('user_id')->unsigned();
                $table->foreign('user_id')->references('id')->on('users');

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
