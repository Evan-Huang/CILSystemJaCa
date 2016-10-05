<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RemoveManagerBandIdFromConsultants extends Migration
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
            $table->dropColumn('manager_band_id');
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
            $table->integer('manager_band_id')->after('manager_id');
        });

    }
}
