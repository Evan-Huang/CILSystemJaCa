<?php

use Illuminate\Database\Seeder;

class PlanCategoryTableSeeder extends Seeder
{


    public function run()
    {

        //產品分類
        $axaplancategorys = array('HealthVital Series (Non-HK$ Policy)','HealthVital Series (HK$ Policy)','Supplement or Rider','HealthSelect Series (Non-HK$ Policy)','HealthSelect Series (HK$ Policy)',
            'Supplement or Rider','HealthElite Critical Illness Insurance','Supplement or Rider','Fortune Guard Life Insurance (Non-HK$ Policy)','Fortune Guard Life Insurance (HK$ Policy)',
            'Supplement or Rider','Fortune Protector Life Insurance (Non-HK$ Policy)','Fortune Protector Life Insurance (HK$ Policy)');

        $aceplancategorys = array('ACE Golden Touch Saver Plan II, Ulife Plan II','ACE Gold Wealth Insurance Plan (USD)','Custom Whole Life (HKD) (CWL) - Protection',
            'Custom Whole Life (HKD) (CWL) - Saving','Custom Whole Life (USD) (CWL) - Protection','Custom Whole Life (USD) (CWL) - Saving','Forever Diamond Plan (USD)',
            'Forever Diamond Plan (HKD)','Super Care Critical Illness Protector','ACE Treasure Life Insurance Plan','');

        $prudentialplancategorys = array('PRUmyhealth Crisis multi-care (Non-HK$ Policy)','PRUmyhealth Crisis multi-care (HK$ Policy)','Supplement or Rider','PRUmyhealth Crisis Lifelong Care
','Evergreen Growth Saver');

        $aiaplancategorys = array('Bonus Power Plan','Prime Care Pro','Prime Care Pro2/Protect Elevator/Protect Elevator Plus','Proactive Insurance Plan','Super Good Health Medical',
            'Executive Life / Executive Care','Smart Care Pro');


        for ($i = 0;$i < 13; $i++) {

            factory(App\PlanCategory::class, 1)->create([
                'name' => $axaplancategorys[$i],
            ]);
        }



        for ($i = 0;$i < 5; $i++) {

            factory(App\PlanCategory::class, 1)->create([
                'name' => $prudentialplancategorys[$i],
            ]);
        }

        for ($i = 0;$i < 7; $i++) {

            factory(App\PlanCategory::class, 1)->create([
                'name' => $aiaplancategorys[$i],
            ]);
        }

        factory(App\PlanCategory::class, 1)->create([
            'name' => 'International Term Assurance (ITA)',
        ]);

        factory(App\PlanCategory::class, 1)->create([
            'name' => 'FPI',
        ]);



    }
}
