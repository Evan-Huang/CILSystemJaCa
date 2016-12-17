<?php

use Illuminate\Database\Seeder;

class BandTableSeeder extends Seeder
{
   //員工普通等級數量
    const GENERAL_BAND_NUM = 5;

    //員工Channel等級數量
    const CHANNEL_BAND_NUM = 3;

    public function run()
    {
        //GENERAL_BAND_NUM種普通等級
        $ranks = array('LEVEL_1','LEVEL_2','LEVEL_3','LEVEL_4','LEVEL_5',);

        //GENERAL_BAND_NUM種普通等級名
        $names = array('青銅','白銀','黃金','白金','磚石');

        //GENERAL_BAND_NUM種普通等級分成比例
        $profit_sharings = array(0.1,0.15,0.2,0.25,0.3);

        //GENERAL_BAND_NUM種普通等級對應金額
        $promotion_income_achievements = array(10000,50000,100000,250000,500000);

        //CHANNEL_BAND_NUM種Channel等級
        $channel_ranks = array('LEVEL_6','LEVEL_7','LEVEL_8');

        //CHANNEL_BAND_NUM種Channel等級名
        $channel_names = array('王者','榮耀王者','最強王者');

        //CHANNEL_BAND_NUM種Channel等級分成比例
        $channel_profit_sharings = array(0.35,0.4,0.5);

        //CHANNEL_BAND_NUM種Channel等級對應金額
        $channel_promotion_income_achievements = array(800000,1000000,2000000);

        //Band模型工廠填充CHANNEL_BAND_NUM種Channel等級
        for ($i = 0; $i < self::GENERAL_BAND_NUM; $i++) {

            factory(App\Band::class, 1)->create([
                'rank' => $ranks[$i],
                'name' => $names[$i],
                'profit_sharing' => $profit_sharings[$i],
                'promotion_income_achievement' => $promotion_income_achievements[$i],
                'is_channel' => 0,
            ]);
        }

        //Band模型工廠填充GENERAL_BAND_NUM種Channel等級
        for ($i = 0; $i < self::CHANNEL_BAND_NUM; $i++) {

            factory(App\Band::class, 1)->create([
                'rank' => $channel_ranks[$i],
                'name' => $channel_names[$i],
                'profit_sharing' => $channel_profit_sharings[$i],
                'promotion_income_achievement' => $channel_promotion_income_achievements[$i],
                'is_channel' => 1,
            ]);
        }

    }
}
