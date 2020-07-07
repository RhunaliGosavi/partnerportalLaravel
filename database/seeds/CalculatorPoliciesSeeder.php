<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CalculatorPoliciesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('calculator_policies')->insert(array(
            array(
              'id' => 1,
              'personal_loan_fori' => 60,
              'personal_loan_roi'=>10,
              'loan_against_property_fori'=>70,
              'loan_against_property_ltv'=>65,
              'created_at'=>now(),
              'updated_at'=>now()
            ),
           
          ));
    }
}
