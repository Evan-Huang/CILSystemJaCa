<?php

use Illuminate\Database\Seeder;

class PlanCategoryTableSeeder extends Seeder
{

    //產品分類數量
    const PLANCATEGORY_NUM = 8;

    public function run()
    {

        //產品分類
        $plancategorys = array('HealthVital Series (Non-HK$ Policy)','HealthVital Series (HK$ Policy)','Supplement or Rider','HealthSelect Series (Non-HK$ Policy)','HealthSelect Series (HK$ Policy)',
            'Supplement or Rider','HealthElite Critical Illness Insurance','Supplement or Rider','Fortune Guard Life Insurance (Non-HK$ Policy)','Fortune Guard Life Insurance (HK$ Policy)',
            'Supplement or Rider','Fortune Protector Life Insurance (Non-HK$ Policy)','Fortune Protector Life Insurance (HK$ Policy)');

        //PlanCategory模型工廠添加PLANCATEGORY_NUM個分類
        for ($i = 0;$i < self::PLANCATEGORY_NUM; $i++) {

            factory(App\PlanCategory::class, 1)->create([
                'name' => $plancategorys[$i],
            ]);
        }

    }
}
