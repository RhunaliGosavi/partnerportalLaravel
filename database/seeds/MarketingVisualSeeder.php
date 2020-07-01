<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MarketingVisualSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        DB::table('marketing_visuals')->insert(array(
            array(
              'id'=>1,
              'loan_product_id' => 2,
              'marketing_visual_category_id' => 1,
               'name'=>'',
              'created_at'=>now(),
              'updated_at'=>now()
            ),
            array(
                'id'=>2,
                'loan_product_id' => 1,
                'marketing_visual_category_id' => 3,
                'name'=>'',
                'created_at'=>now(),
                'updated_at'=>now()
            ),
            array(
                'id'=>3,
                'loan_product_id' => 3,
                'marketing_visual_category_id' => 2,
                'name'=>'',
                'created_at'=>now(),
                'updated_at'=>now()
            ),
           
        ));
    }
}
