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
            //   'loan_product_id' => 2,
              'marketing_visual_category_id' => 1,
              'content_data'=>'<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Neque, eveniet earum.</p>',
              'created_at'=>now(),
              'updated_at'=>now()
            ),
            array(
                'id'=>2,
                // 'loan_product_id' => 1,
                'marketing_visual_category_id' => 3,
                'content_data'=>'<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Neque, eveniet earum.</p>',
                'created_at'=>now(),
                'updated_at'=>now()
            ),
            array(
                'id'=>3,
                // 'loan_product_id' => 3,
                'marketing_visual_category_id' => 2,
                'content_data'=>'<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Neque, eveniet earum.</p>',
                'created_at'=>now(),
                'updated_at'=>now()
            ),
           
        ));
    }
}
