<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ImportantLinkSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('important_links')->insertOrIgnore(array(
            array(
              'id'=>1,
              'portal_name' => 'AFL webmail',
              'web_link' => "https://mail.axisbank.com/",
              'created_at'=>now(),
              'updated_at'=>now()
            ),
            array(
                'id'=>2,
                'portal_name' =>'HRMS portal',
                'web_link' => "https://hcm.axisb.com/Adrenalin/Login.aspx",
                'created_at'=>now(),
                'updated_at'=>now()
            ),
            array(
                'id'=>3,
                'portal_name' =>'Darashaw portal',
                'web_link' => "https://ess.tsrdarashaw.com/payroll/ess/login/finaxis",
                'created_at'=>now(),
                'updated_at'=>now()
            ),
            array(
                'id'=>4,
                'portal_name' =>'EBIX LOS portal',
                'web_link' => "https://retaillos.axisfinance.co.in/",
                'created_at'=>now(),
                'updated_at'=>now()
            ),


        ));


    }
}
