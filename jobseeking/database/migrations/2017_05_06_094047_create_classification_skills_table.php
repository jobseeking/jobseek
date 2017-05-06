<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClassificationSkillsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('classification_skills')){
            Schema::create('classification_skills', function (Blueprint $table) {
                $table->increments('id');
                $table->string('name');

                $table->integer('classification_id')->unsigned()->default(1);
                $table->foreign('classification_id')->references('id')->on('classifications');

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
