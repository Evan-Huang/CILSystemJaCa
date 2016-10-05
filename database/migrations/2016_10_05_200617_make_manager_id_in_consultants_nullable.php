<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class MakeManagerIdInConsultantsNullable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //

        Schema::table('consultants', function(Blueprint $table) {
            $table->dropColumn('manager_id');
        });

        Schema::table('consultants', function(Blueprint $table) {
            $table->integer('manager_id')->after('band_id')->nullable();
        });
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //

        Schema::table('consultants', function(Blueprint $table) {
            $table->dropColumn('manager_id');
        });

        Schema::table('consultants', function(Blueprint $table) {
            $table->integer('manager_id')->after('band_id');
        });

    }
}
