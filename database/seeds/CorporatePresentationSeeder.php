<?php

use App\CorporatePresentation;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CorporatePresentationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
     
        DB::table('corporate_presentations')->insert(array(
            array(
                'id'=>1,
                'title' => 'Corporate Service Provider Application Form',
                'file_path' => "temp1.pdf",
                'file_size_in_mb'=>10.9,
                'is_required'=>1,
                'created_at'=>now(),
                'updated_at'=>now()
            ),
            array(
                  'id'=>2,
                  'title' =>'Corporate GST Registration Certificate/Non-GST Declaration (as applicable)',
                  'file_path' => "temp2.pdf",
                  'file_size_in_mb'=>11.0,
                  'is_required'=>1,
                  'created_at'=>now(),
                  'updated_at'=>now()
            ),
              array(
                  'id'=>3,
                  'title' => 'Corporate KYC documents (PAN card & Address proof)',
                  'file_path' => "temp3.pdf",
                  'file_size_in_mb'=>10.0,
                  'is_required'=>1,
                  'created_at'=>now(),
                  'updated_at'=>now()
              ),
              array(
                  'id'=>4,
                  'title' => 'Corporate MSMED Declaration Form',
                  'file_path' => "temp4.pdf",
                  'file_size_in_mb'=>8.0,
                  'is_required'=>1,
                  'created_at'=>now(),
                  'updated_at'=>now()
              ),
              array(
                  'id'=>5,
                  'title' => 'Corporate Cancelled Cheque',
                  'file_path' => "temp5.pdf",
                  'file_size_in_mb'=>9.0,
                  'is_required'=>1,
                  'created_at'=>now(),
                  'updated_at'=>now()
              ),
           
        ));
    }
}
