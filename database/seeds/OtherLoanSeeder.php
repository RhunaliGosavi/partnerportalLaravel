<?php

use Illuminate\Database\Seeder;

class OtherLoanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table('other_loans')->insert(array(
            array(
            
            'source_user_id'=>1,
            'lead_generated_source'=>'1',
            'employee_id'=>1,
            'name'=>'Ajinkya',
            'mobile_number'=>'9878456732',
            'loan_amount'=>100000,
            'loan_product_id'=>1,
            'prefered_contact_time'=>now(),
            ),
            array(
            'source_user_id'=>2,
            'lead_generated_source'=>'2',
            'employee_id'=>2,
            'name'=>'Priya',
            'mobile_number'=>'9876898789',
            'loan_amount'=>100000,
            'loan_product_id'=>2,
            'prefered_contact_time'=>now(),
            ),
            array(
            'source_user_id'=>3,
            'lead_generated_source'=>'3',
            'employee_id'=>3,
            'name'=>'shivani',
            'mobile_number'=>'9478367282',
            'loan_amount'=>100000,
            'loan_product_id'=>3,
            'prefered_contact_time'=>now(),
            ),
            array(
            'source_user_id'=>4,
            'lead_generated_source'=>'1',
            'employee_id'=>4,
            'name'=>'Jana',
            'mobile_number'=>'9847849494',
            'loan_amount'=>100000,
            'loan_product_id'=>4,
            'prefered_contact_time'=>now(),
            ),
            
           
        ));
    }
}
