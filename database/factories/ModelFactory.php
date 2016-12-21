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

        $business_types = array('type1','type2','type3','type4','type5');
        $first_name = $faker->firstName;
        $last_name = $faker->lastName;
        $full_name = $first_name . ' ' . $last_name;
        $consultant_ids = App\Consultant::all()->toArray();
        $genders = array('male','female');
        $nationality = array('China','Canada','Britiain','Brazil','Australia','America','Japan','Sweden');
        $business_nature = array('nature1','nature2','nature3');

    return [
        'business_type' => $faker->randomElement($business_types),
        'full_name' => $full_name,
        'first_name' => $first_name,
        'last_name' => $last_name,
        'consultant_id' => $faker->randomElement($consultant_ids)['id'],
        'gender' => $faker->randomElement($genders),
        'nationality' => $faker->randomElement($nationality),
        'id_number' => $faker->userName,
        'passport_number' => 'G' . $faker->randomNumber(8),
        'birth_year' => $faker->year($max = 'now'),
        'birth_month' => $faker->month($max = 'now') ,
        'birth_day' => $faker->dayOfMonth($max = 'now'),
        'mobile_number' => $faker->phoneNumber,
        'email' => $faker->email,
        'home_address' => $faker->address,
        'business_nature' => $faker->randomElement($business_nature),
        'company' => $faker->company,
        'office_phone_number' => $faker->phoneNumber,
        'created_at' => date('Y-m-d H:i:s',time()),
        'updated_at' => date('Y-m-d H:i:s',time()),
    ];
});

//Consultant 員工模型工廠
$factory->define(App\Consultant::class, function (Faker\Generator $faker) {

//        $band_ids = App\Band::all(['id'])->toArray();
        $band_ids = array('1','2','3','4',);
        $manager_ids = array('1','2','3','4',);

    return [
        'name' => $faker->name(),
        'band_id' => $faker->randomElement($band_ids),
        'manager_id' => $faker->randomElement($manager_ids),
        'override_for_manager' => $faker->randomFloat($nbMaxDecimals = 2,$min = 0, $max = 1000),
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
        'slug' => $faker->slug(10),
        'name' => '',
        'rate' => 0,
        'created_at' => date('Y-m-d H:i:s',time()),
        'updated_at' => date('Y-m-d H:i:s',time()),
    ];
});


