<?php

use Illuminate\Database\Seeder;

class ClientTableSeeder extends Seeder
{

    //客户数量
    const CLIENT_NUM = 5;

    public function run()
    {
        //Client模型工厂填充数据
        $clients = factory(App\Client::class, self::CLIENT_NUM)->create();
    }
}
