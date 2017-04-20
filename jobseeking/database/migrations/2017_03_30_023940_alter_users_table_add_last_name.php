<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterUsersTableAddLastName extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasColumn('users', 'last_name')) {
            Schema::table('users', function(Blueprint $table)
            {
                $table->string('last_name');
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
        // here you're not dropping the whole table, only removing the newly added columns
        //Schema::table('users', function(Blueprint $table){
        //    $table->dropColumn('last_name');
        //});

    }
}
