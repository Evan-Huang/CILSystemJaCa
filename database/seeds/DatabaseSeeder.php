<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        //调用填充器填充数据
         $this->call(ProvidersTableSeeder::class);
         $this->call(PlanCategoryTableSeeder::class);
         $this->call(PlanTableSeeder::class);
         $this->call(SplitTableSeeder::class);
         $this->call(BandTableSeeder::class);
         $this->call(ConsultantTableSeeder::class);
         $this->call(ClientTableSeeder::class);


        Model::reguard();
    }
}
