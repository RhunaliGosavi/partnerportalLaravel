<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class IncentiveSlabSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('incentive_slabs')->insert(array(
            array(
              'value' => 1000000,
              'incentive_payout' => 0.10,
              'min'=>1000000,
              'max'=>2500000,
              'type'=>'sales officer',
              'created_at'=>now(),
              'updated_at'=>now()
            ),
            array(
                'value' =>  2500000,
              'incentive_payout' =>0.15,
              'min'=>2500000,
              'max'=>4000000,
              'type'=>'sales officer',
              'created_at'=>now(),
              'updated_at'=>now()
            ),
            array(
                'value' => 4000000 ,
                'incentive_payout' => 0.20,
                'min'=>4000000,
                'max'=>5500000,
                'type'=>'sales officer',
                'created_at'=>now(),
                'updated_at'=>now()
            ),array(
                'value' =>  5500000,
                'incentive_payout' =>0.25,
                'min'=>5500000,
                'max'=>7000000,
                'type'=>'sales officer',
                'created_at'=>now(),
                'updated_at'=>now()
            ),
            array(
                'value' =>  7000000,
                'incentive_payout' => 0.30,
                'min'=>0,
                'max'=>7100000,
                'type'=>'sales officer',
                'created_at'=>now(),
                'updated_at'=>now()
            ),
            array(
                'value' =>  7500000 ,
                'incentive_payout' =>0.040,
                'min'=>7500000,
                'max'=>12500000,
                'type'=>'portfolio manager',
                'created_at'=>now(),
                'updated_at'=>now()
            ),
            array(
                'value' =>  12500000,
                'incentive_payout' =>0.060,
                'min'=>12500000,
                'max'=>17500000,
                'type'=>'portfolio manager',
                'created_at'=>now(),
                'updated_at'=>now()
            ),
            array(
                'value' =>  17500000 ,
                'incentive_payout' =>0.080,
                'min'=>17500000,
                'max'=>22500000,
                'type'=>'portfolio manager',
                'created_at'=>now(),
                'updated_at'=>now()
            ),
            array(
                'value' =>  22500000 ,
                'incentive_payout' => 0.100,
                'min'=>0,
                'max'=>22600000,
                'type'=>'portfolio manager',
                'created_at'=>now(),
                'updated_at'=>now()
            )
          ));
    }
}
