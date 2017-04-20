<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterUsersTableAddInterest extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function($table)
        {
            $table->integer('interest_classification_id')->unsigned();
            $table->foreign('interest_classification_id')->references('id')->on('classifications');
            $table->integer('interest_classification_id_2')->unsigned();
            $table->foreign('interest_classification_id_2')->references('id')->on('classifications');
            $table->integer('interest_classification_id_3')->unsigned();
            $table->foreign('interest_classification_id_3')->references('id')->on('classifications');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function ($table) {
            $table->dropColumn('interest_classification_id');
            $table->dropColumn('interest_classification_id_2');
            $table->dropColumn('interest_classification_id_3');
        });
    }
}
