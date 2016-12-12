<?php

use Illuminate\Database\Seeder;

class ProvidersTableSeeder extends Seeder
{

    //供应商数量
    const PROVIDER_NUM = 6;

    public function run()
    {
        //Provider模型工厂填充PROVIDER_NUM個供應商
        factory(App\Provider::class, self::PROVIDER_NUM)->create();

    }
}
