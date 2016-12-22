<?php

use Illuminate\Database\Seeder;

class ProvidersTableSeeder extends Seeder
{

    //供应商数量
    const PROVIDER_NUM = 6;

    public function run()
    {
        //虛擬數據
        $slug = 'slug';

        $names = array('AXA','ACE','Prudential','AIA','Zurich','FPI');

        $descriptions = array('AXA Provider','ACE Provider','Prudential Provider','AIA Provider','Zurich Provider','FPI Provider',);
        //虛擬數據
        $process_days = array(100,120,150,100,120,150,);

        //Provider模型工厂填充PROVIDER_NUM個供應商
        for ($i = 0; $i < self::PROVIDER_NUM; $i++) {

            factory(App\Provider::class)->create([

                'slug' => $slug,
                'name' => $names[$i],
                'description' => $descriptions[$i],
                'process_days' => $process_days[$i],
            ]);
        }


    }
}
