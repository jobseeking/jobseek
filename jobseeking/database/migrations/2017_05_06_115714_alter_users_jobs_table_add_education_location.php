<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterUsersJobsTableAddEducationLocation extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        
        if (!Schema::hasColumn('users', 'location_id')) {
            Schema::table('users', function(Blueprint $table)
            {
                $table->integer('location_id')->unsigned()->default(1);
                $table->foreign('location_id')->references('id')->on('locations');
            });
        }

        if (!Schema::hasColumn('users', 'education_id')) {
            Schema::table('users', function(Blueprint $table)
            {
                $table->integer('education_id')->unsigned()->default(1);
                $table->foreign('education_id')->references('id')->on('education');
            });
        }


        if (!Schema::hasColumn('jobs', 'education_id')) {
            Schema::table('jobs', function(Blueprint $table)
            {
                $table->integer('education_id')->unsigned()->default(1);
                $table->foreign('education_id')->references('id')->on('education');
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
