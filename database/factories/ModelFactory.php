<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

$factory->define(App\User::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->safeEmail,
        'password' => bcrypt(str_random(10)),
        'remember_token' => str_random(10),
    ];
});


//Provider 供應商模型工廠
$factory->define(App\Provider::class, function (Faker\Generator $faker) {
    return [
        'slug' => '',
        'name' => '',
        'description' => '',
        'process_days' => '' ,
        'created_at' => date('Y-m-d H:i:s',time()),
        'updated_at' => date('Y-m-d H:i:s',time()),
    ];
});

//Client 客戶模型工廠
$factory->define(App\Client::class, function (Faker\Generator $faker) {

    return [
        'business_type' => '',
        'full_name' => '',
        'first_name' => '',
        'last_name' => '',
        'consultant_id' => '',
        'gender' => '',
        'nationality' => '',
        'id_number' => '',
        'passport_number' => '',
        'birth_year' => '',
        'birth_month' => '' ,
        'birth_day' => '',
        'mobile_number' => '',
        'email' => '',
        'home_address' => '',
        'business_nature' => '',
        'company' => '',
        'office_phone_number' => '',
        'created_at' => date('Y-m-d H:i:s',time()),
        'updated_at' => date('Y-m-d H:i:s',time()),
    ];
});

//Consultant 員工模型工廠
$factory->define(App\Consultant::class, function (Faker\Generator $faker) {


    return [
        'name' => '',
        'band_id' => '',
        'manager_id' => '',
        'override_for_manager' => '',
        'created_at' => date('Y-m-d H:i:s',time()),
        'updated_at' => date('Y-m-d H:i:s',time()),

    ];
});

//Plan 產品模型工廠
$factory->define(App\Plan::class, function (Faker\Generator $faker) {

    $rates = array(0.15,0.2);

    return [
        'plan_category_id' => 0,
        'provider_id' => 1,
        'name' => 'null',
        'code' => 'code',
        'term' => '',
        'requirement' => 'requirement',
        'description' => '',
        'rate_monthly' => 0,
        'rate_yearly' => 0,
        'rate_1_basic' => 0,
        'rate_1_override' => 0,
        'rate_1_bonus' => 0,
        'rate_2_basic' => 0,
        'rate_2_override' => 0,
        'rate_2_bonus' => 0,
        'rate_3_basic' => 0,
        'rate_3_override' => 0,
        'rate_3_bonus' => 0,
        'rate_4_basic' => 0,
        'rate_4_override' => 0,
        'rate_4_bonus' => 0,
        'rate_5_basic' => 0,
        'rate_5_override' => 0,
        'rate_5_bonus' => 0,
        'rate_6_basic' => 0,
        'rate_6_override' => 0,
        'rate_6_bonus' => 0,
        'rate_7_basic' => 0,
        'rate_7_override' => 0,
        'rate_7_bonus' => 0,
        'rate_8_basic' => 0,
        'rate_8_override' => 0,
        'rate_8_bonus' => 0,
        'rate_9_basic' => 0.1,
        'rate_9_override' => 0,
        'rate_9_bonus' => 0,
        'rate_10_basic' => 0,
        'rate_10_override' => 0,
        'rate_10_bonus' => 0,
        'rate_11up_basic' => 0,
        'rate_11up_override' => 0,
        'rate_11up_bonus' => 0,
        'annual_premium' => 0,
        'created_at' => date('Y-m-d H:i:s',time()),
        'updated_at' => date('Y-m-d H:i:s',time()),
    ];
});

//PlanCategory 產品類型模型工廠
$factory->define(App\PlanCategory::class, function (Faker\Generator $faker) {

    return [
        'name' => '',
        'created_at' => date('Y-m-d H:i:s',time()),
        'updated_at' => date('Y-m-d H:i:s',time()),
    ];

});

//Band 員工等級模型工廠
$factory->define(App\Band::class, function (Faker\Generator $faker) {

    return [
        'rank' => '',
        'name' => '',
        'profit_sharing' => 0,
        'promotion_income_achievement' => 0,
        'is_channel' => 0,
        'created_at' => date('Y-m-d H:i:s',time()),
        'updated_at' => date('Y-m-d H:i:s',time()),

    ];

});

//Split 公司與員工的分成比例模型工廠
$factory->define(App\Split::class, function (Faker\Generator $faker) {

    return [
        'slug' => 'slug',
        'name' => '',
        'rate' => 0,
        'created_at' => date('Y-m-d H:i:s',time()),
        'updated_at' => date('Y-m-d H:i:s',time()),
    ];
});


