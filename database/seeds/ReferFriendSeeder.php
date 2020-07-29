<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class ReferFriendSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table('refer_buddy')->insert(array(
            array(
             'source_user_id'=>1,
             'name'=>'Akshata Shinde',
             'email'=>'Akshata@gmail.com',
             'mobile_number'=>'9876543567',
             'loan_product_id'=>1,
             'loan_amount'=>100000,
             'prefered_contact_time'=>now(),
            ),
            array(
            'source_user_id'=>2,
             'name'=>'Sushil Shinde',
             'email'=>'Sushil@gmail.com',
             'mobile_number'=>'9874567832',
             'loan_product_id'=>2,
             'loan_amount'=>100000,
             'prefered_contact_time'=>now(),
            ),
            array(
            'source_user_id'=>3,
             'name'=>'Rhuna Desai',
             'email'=>'Rhuna@gmail.com',
             'mobile_number'=>'9873457892',
             'loan_product_id'=>1,
             'loan_amount'=>100000,
             'prefered_contact_time'=>now(),
            ),
            array(
            'source_user_id'=>4,
             'name'=>'Paresh Shinde',
             'email'=>'Paresh@gmail.com',
             'mobile_number'=>'9587457892',
             'loan_product_id'=>2,
             'loan_amount'=>100000,
             'prefered_contact_time'=>now(),
            ),
            
           
        ));
    }
}
