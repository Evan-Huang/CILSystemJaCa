<?php

use Illuminate\Database\Seeder;

class PlanCategoryTableSeeder extends Seeder
{

    //產品分類數量
    const PLANCATEGORY_NUM = 5;

    public function run()
    {

        //五種產品分類
        $plancategorys = array('HealthVital Series (Non-HK$ Policy)','交通','養老','旅行','人身');

        //PlanCategory模型工廠添加PLANCATEGORY_NUM個分類
        for ($i = 0;$i < self::PLANCATEGORY_NUM; $i++) {

            factory(App\PlanCategory::class, 1)->create([
                'name' => $plancategorys[$i],
            ]);
        }

    }
}
