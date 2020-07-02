<?php
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CustomerSchemeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       
        DB::table('customer_schemes')->insert(array(
            array(
              'id'=>1,
              'loan_product_id' => 2,
              'file_path'=>'temp.pdf',
              'created_at'=>now(),
              'updated_at'=>now()
            ),
            array(
                'id'=>2,
                'loan_product_id' => 1,
                'file_path'=>'temp1.pdf',
                'created_at'=>now(),
                'updated_at'=>now()
            ),
            array(
                'id'=>3,
                'loan_product_id' => 3,
                'file_path'=>'temp2.pdf',
                'created_at'=>now(),
                'updated_at'=>now()
            ),
           
        ));
    }
}
