<?php

use Illuminate\Database\Seeder;

class ConsultantTableSeeder extends Seeder
{

    //员工数量
    const CONSULTANT_NUM = 5;

    public function run()
    {
        //Consultant模型工厂填充数据
        $consultants = factory(App\Consultant::class, self::CONSULTANT_NUM)->create();

    }
}
