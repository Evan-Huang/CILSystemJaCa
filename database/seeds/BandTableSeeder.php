<?php

use Illuminate\Database\Seeder;

class BandTableSeeder extends Seeder
{
   //員工等級數量
    const GENERAL_BAND_NUM = 8;


    public function run()
    {
        //GENERAL_BAND_NUM種普通等級
        $ranks = array('Consultant','Senior Consultant','Manager','Senior Manager','Vice President','Senior Vice President','Distrist Director',
            'Channel');

        //GENERAL_BAND_NUM種普通等級名
        $names = array('band 1','band 2','band 3','band 4','band 5','band 6/Channel 1','band 7/Channel 2','band 8/ Channel 3 ');

        //GENERAL_BAND_NUM種普通等級分成比例
        $profit_sharings = array(0.35,0.40,0.45,0.50,0.55,0.60,0.65,0.70);

        //GENERAL_BAND_NUM種普通等級對應金額
        $promotion_income_achievements = array(150000,300000,450000,600000,750000,1000000,1500000,3000000);


        //Band模型工廠填充CHANNEL_BAND_NUM種Channel等級
        for ($i = 0; $i < self::GENERAL_BAND_NUM; $i++) {
            $is_channel = 0;
            if ($i >= 5) {
                $is_channel = 1;
            }
            factory(App\Band::class, 1)->create([
                'rank' => $ranks[$i],
                'name' => $names[$i],
                'profit_sharing' => $profit_sharings[$i],
                'promotion_income_achievement' => $promotion_income_achievements[$i],
                'is_channel' => $is_channel,
            ]);
        }


    }
}
