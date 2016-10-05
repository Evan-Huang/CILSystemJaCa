<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RenameColumnForPolicies extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //

        Schema::table('policies', function(Blueprint $table) {
            $table->dropColumn('policy_investment_insured_amount_usd');
            $table->dropColumn('policy_investment_insured_amount_hkd');
        });

        Schema::table('policies', function(Blueprint $table) {
            $table->decimal('investment_insured_amount_usd', 10, 2)->nullable()->after('effective_date');
            $table->decimal('investment_insured_amount_hkd', 10, 2)->nullable()->after('investment_insured_amount_usd');
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

        Schema::table('policies', function(Blueprint $table) {
            $table->dropColumn('investment_insured_amount_usd');
            $table->dropColumn('investment_insured_amount_hkd');
        });

        Schema::table('policies', function(Blueprint $table) {
            $table->decimal('policy_investment_insured_amount_usd', 10, 2)->nullable()->after('effective_date');
            $table->decimal('policy_investment_insured_amount_hkd', 10, 2)->nullable()->after('policy_investment_insured_amount_usd');
        });

    }
}
