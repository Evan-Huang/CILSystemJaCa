<?php

use Illuminate\Database\Seeder;

class ClientTableSeeder extends Seeder
{

    //客户数量
    const CLIENT_NUM = 3;

    public function run()
    {
        $business_types = array('New Business','New Business','Transfer In');
        $full_names = array('A','H','I');
        $consultant_ids = array(1,2,3);
        $genders = array('F','F','m');
        $nationality = array('Chinese','Hong Kong','Hong Kong');
        $birth_month = array('10','9','8');

        //Client模型工厂填充数据
        for ($i = 0; $i < self::CLIENT_NUM; $i++) {

            $clients = factory(App\Client::class)->create([

                'business_type' => $business_types[$i],
                'full_name' => $full_names[$i],
                'first_name' => '',
                'last_name' => '',
                'consultant_id' => $consultant_ids[$i],
                'gender' => $genders[$i],
                'nationality' => $nationality[$i],
                'id_number' => '',
                'passport_number' => '',
                'birth_year' => '',
                'birth_month' => $birth_month[$i] ,
                'birth_day' => '',
                'mobile_number' => '',
                'email' => '',
                'home_address' => '',
                'business_nature' => '',
                'company' => '',
                'office_phone_number' => '',
            ]);
        }

    }
}
