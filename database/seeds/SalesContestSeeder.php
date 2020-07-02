<?php

use App\SalesContest;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SalesContestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       
        DB::table('sales_contests')->insert(array(
            array(
              'id'=>1,
              'loan_product_id' => 2,
              'content_data' => "Short Description: Lorem ipsum onsectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam",
              'file_path'=>'temp.pdf',
              'created_at'=>now(),
              'updated_at'=>now()
            ),
            array(
                'id'=>2,
                'loan_product_id' => 1,
                'content_data' => "<b>Short Description 2</b>: Lorem ipsum onsectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam",
                'file_path'=>'temp1.pdf',
                'created_at'=>now(),
                'updated_at'=>now()
            ),
            array(
                'id'=>3,
                'loan_product_id' => 3,
                'content_data' => "<b>Short Description 3</b>: Lorem ipsum onsectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam",
                'file_path'=>'temp2.pdf',
                'created_at'=>now(),
                'updated_at'=>now()
            ),
           
        ));
    }
}
