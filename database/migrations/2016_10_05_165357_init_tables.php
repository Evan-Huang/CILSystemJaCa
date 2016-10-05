<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class InitTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //

        Schema::create('clients', function(Blueprint $table) {
            $table->increments('id');

            $table->string('business_type', 50)->nullable();
            $table->string('full_name', 100)->nullable();
            $table->string('first_name', 50)->nullable();
            $table->string('last_name', 50)->nullable();
            $table->integer('consultant_id')->nullable();
            $table->string('gender', 10)->nullable();
            $table->string('nationality', 100)->nullable();
            $table->string('id_number', 30)->nullable();
            $table->string('passport_number', 30)->nullable();
            $table->string('birth_year', 4)->nullable();
            $table->string('birth_month', 2)->nullable();
            $table->string('birth_day', 2)->nullable();
            $table->string('mobile_number', 20)->nullable();
            $table->string('email', 100)->nullable();
            $table->text('home_address')->nullable();
            $table->text('business_nature')->nullable();
            $table->string('company', 150)->nullable();
            $table->string('office_phone_number', 20)->nullable();
            
            $table->timestamps();
        });

        Schema::create('client_activity_logs', function(Blueprint $table) {
            $table->increments('id');

            $table->integer('client_id');
            $table->datetime('start_date');
            $table->text('event')->nullable();
            $table->text('event_details')->nullable();
            
            $table->timestamps();
        });

        Schema::create('client_payment_due_trackers', function(Blueprint $table) {
            $table->increments('id');

            $table->integer('client_id');
            $table->decimal('premium_amount_usd', 10, 2)->nullable();
            $table->decimal('premium_amount_hkd', 10, 2)->nullable();

            $table->datetime('first_reminder_sent_date')->nullable();
            $table->datetime('second_reminder_sent_date')->nullable();

            $table->string('payment_status', 200)->nullable();

            $table->text('remarks')->nullable();
            
            $table->timestamps();
        });

        Schema::create('bands', function(Blueprint $table) {
            $table->increments('id');

            $table->string('rank', 50);
            $table->string('name', 100);
            $table->float('profit_sharing', 5, 2);
            $table->decimal('promotion_income_achievement', 10, 2)->nullable();
            $table->boolean('is_channel')->default(false);
            
            $table->timestamps();
        });

        Schema::create('splits', function(Blueprint $table) {
            $table->increments('id');

            $table->string('slug', 50);
            $table->string('name', 100);
            $table->float('rate', 5, 2);
            
            $table->timestamps();
        });

        Schema::create('providers', function(Blueprint $table) {
            $table->increments('id');

            $table->string('slug', 50);
            $table->string('name', 100);
            $table->text('description')->nullable();
            $table->integer('process_days')->default(7);
            
            $table->timestamps();
        });

        Schema::create('consultants', function(Blueprint $table) {
            $table->increments('id');

            $table->string('name', 200);
            $table->integer('band_id');

            $table->integer('manager_id'); // from consultants
            $table->integer('manager_band_id');
            $table->float('override_for_manager', 5, 2);
            
            $table->timestamps();
        });

        Schema::create('plan_categories', function(Blueprint $table) {
            $table->increments('id');

            $table->string('name', 200);
            
            $table->timestamps();
        });

        Schema::create('plans', function(Blueprint $table) {
            $table->increments('id');

            $table->integer('plan_category_id');
            $table->integer('provider_id');

            $table->string('name', 200);
            $table->string('code', 50);
            $table->string('term', 20)->nullable();
            $table->text('requirement')->nullable();
            $table->text('description')->nullable();

            $table->float('rate_monthly', 5, 2)->nullable();
            $table->float('rate_yearly', 5, 2)->nullable();

            $table->float('rate_1_basic', 5, 2)->nullable();
            $table->float('rate_1_override', 5, 2)->nullable();
            $table->float('rate_1_bonus', 5, 2)->nullable();

            $table->float('rate_2_basic', 5, 2)->nullable();
            $table->float('rate_2_override', 5, 2)->nullable();
            $table->float('rate_2_bonus', 5, 2)->nullable();

            $table->float('rate_3_basic', 5, 2)->nullable();
            $table->float('rate_3_override', 5, 2)->nullable();
            $table->float('rate_3_bonus', 5, 2)->nullable();

            $table->float('rate_4_basic', 5, 2)->nullable();
            $table->float('rate_4_override', 5, 2)->nullable();
            $table->float('rate_4_bonus', 5, 2)->nullable();

            $table->float('rate_5_basic', 5, 2)->nullable();
            $table->float('rate_5_override', 5, 2)->nullable();
            $table->float('rate_5_bonus', 5, 2)->nullable();

            $table->float('rate_6_basic', 5, 2)->nullable();
            $table->float('rate_6_override', 5, 2)->nullable();
            $table->float('rate_6_bonus', 5, 2)->nullable();

            $table->float('rate_7_basic', 5, 2)->nullable();
            $table->float('rate_7_override', 5, 2)->nullable();
            $table->float('rate_7_bonus', 5, 2)->nullable();

            $table->float('rate_8_basic', 5, 2)->nullable();
            $table->float('rate_8_override', 5, 2)->nullable();
            $table->float('rate_8_bonus', 5, 2)->nullable();

            $table->float('rate_9_basic', 5, 2)->nullable();
            $table->float('rate_9_override', 5, 2)->nullable();
            $table->float('rate_9_bonus', 5, 2)->nullable();

            $table->float('rate_10_basic', 5, 2)->nullable();
            $table->float('rate_10_override', 5, 2)->nullable();
            $table->float('rate_10_bonus', 5, 2)->nullable();

            $table->float('rate_11up_basic', 5, 2)->nullable();
            $table->float('rate_11up_override', 5, 2)->nullable();
            $table->float('rate_11up_bonus', 5, 2)->nullable();

            $table->decimal('annual_premium', 10, 2)->nullable();
            
            $table->timestamps();
        });

        Schema::create('policies', function(Blueprint $table) {

            $table->increments('id');

            $table->integer('client_id');
            $table->string('policy_number', 50)->nullable();

            $table->integer('primary_consultant_id');
            $table->float('primary_consultant_split', 5, 2)->nullable();

            $table->integer('secondary_consultant_id')->nullable();
            $table->float('secondary_consultant_split', 5, 2)->nullable();

            $table->integer('provider_id');
            $table->integer('plan_id');

            $table->datetime('effective_date')->nullable();

            $table->decimal('policy_investment_insured_amount_usd', 10, 2)->nullable();
            $table->decimal('policy_investment_insured_amount_hkd', 10, 2)->nullable();

            $table->string('payment_frequency', 50)->nullable();
            
            $table->datetime('delivered_date')->nullable();
            $table->datetime('cooling_off_expiry_date')->nullable();
            $table->datetime('next_premium_due_date')->nullable();

            $table->datetime('submission_date')->nullable();
            $table->datetime('completion_date')->nullable();

            $table->string('payment_status', 50)->nullable();

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
        //

        Schema::drop('clients');
        Schema::drop('client_activity_logs');
        Schema::drop('client_payment_due_trackers');
        Schema::drop('bands');
        Schema::drop('splits');
        Schema::drop('providers');
        Schema::drop('consultants');
        Schema::drop('plan_categories');
        Schema::drop('plans');
        Schema::drop('policies');

    }
}
