<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MarketingVisualCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('marketing_visual_categories')->insert(array(
            array(
              'id'=>1,
              'loan_product_id' => 2,
              'name' => 'Branding & Marketing Banners',
              'created_at'=>now(),
              'updated_at'=>now()
            ),
            array(
                'id'=>2,
                'loan_product_id' => 1,
                'name' => 'Advertisement Banners',
                'created_at'=>now(),
                'updated_at'=>now()
            ),
            array(
                'id'=>3,
                'loan_product_id' => 3,
                'name' => 'Offer or Scheme Related Banners',
                'created_at'=>now(),
                'updated_at'=>now()
            ),
           
          ));
    }
}
