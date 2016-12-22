<?php

use Illuminate\Database\Seeder;

class ConsultantTableSeeder extends Seeder
{

    //员工数量
    const CONSULTANT_NUM = 5;

    public function run()
    {

        $names = array('GN','GL','HH','AW','EL');
        $band_ids = array(2,6,6,6,1);
        $manager_ids = array(2,2,3,3,3);
        $override_for_managers = array(0.2,0,0,0.05,0.25);

        //Consultant模型工厂填充数据
        for ($i = 0; $i < self::CONSULTANT_NUM; $i++) {

            $consultants = factory(App\Consultant::class)->create([
                'name' => $names[$i],
                'band_id' => $band_ids[$i],
                'manager_id' => $manager_ids[$i],
                'override_for_manager' => $override_for_managers[$i],
            ]);
        }



    }
}
