<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DsaOnboardingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        DB::table('dsa_onboarding')->insert(array(
            array(
              'id'=>1,
              'title' => 'Service Provider Application Form',
              'file_path' => "temp1.pdf",
              'file_size_in_mb'=>9.0,
              'is_required'=>1,
              'created_at'=>now(),
              'updated_at'=>now()
            ),
            array(
                'id'=>2,
                'title' =>'GST Registration Certificate/Non-GST Declaration (as applicable)',
                'file_path' => "temp2.pdf",
                'file_size_in_mb'=>1.0,
                'is_required'=>1,
                'created_at'=>now(),
                'updated_at'=>now()
            ),
            array(
                'id'=>3,
                'title' => 'KYC documents (PAN card & Address proof)',
                'file_path' => "temp3.pdf",
                'file_size_in_mb'=>8.0,
                'is_required'=>1,
                'created_at'=>now(),
                'updated_at'=>now()
            ),
            array(
                'id'=>4,
                'title' => 'MSMED Declaration Form',
                'file_path' => "temp4.pdf",
                'file_size_in_mb'=>6.0,
                'is_required'=>1,
                'created_at'=>now(),
                'updated_at'=>now()
            ),
            array(
                'id'=>5,
                'title' => 'Cancelled Cheque',
                'file_path' => "temp5.pdf",
                'file_size_in_mb'=>9.0,
                'is_required'=>1,
                'created_at'=>now(),
                'updated_at'=>now()
            ),
           
        ));
    }
}
