<?php

use Illuminate\Database\Seeder;

class SplitTableSeeder extends Seeder
{

    //Split公司與員工的分成比例種類數量
    const SPLIT_NUM = 2;

    public function run()
    {
        //普通分成比例
        factory(App\Split::class, 1)->create([
            'name' => '普通比例1',
            'rate' => 0.1,
        ]);

        //Channel分成比例
        factory(App\Split::class, 1)->create([
            'name' => 'Channel比例1',
            'rate' => 0.4,
        ]);
    }
}
