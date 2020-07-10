<?php

use Illuminate\Database\Seeder;

class DsaLeadSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('dsa_leads')->insert(array(
            array(
            
            'source_user_id'=>1,
            'lead_generated_source'=>1,
            'name'=>'Nitya',
            'pan_number'=>'ABCDE1234S',
            'dob'=>date('Y-m-d',strtotime('6-8-1992')),
            'gender'=>'Female',
            'mobile_number'=>'6478292929',
            'email'=>'Nitya@gmail.com',
            'bank_acc_number'=>'839393876782',
            'ifsc_code'=>'Ic325',
            'bank_name'=>'ICICI',
            'branch_name'=>'Thane',
            'upi_id'=>'478373',
            'address_proof_doc'=>'pan card',
            'address_type'=>'test',
            'address_line1'=>'Thane',
            'address_line2'=>'',
            'pincode'=>'44322',
            'city'=>'Thane',
            'state'=>'Maharashtra',
            'agency_name'=>'tes',
            'gst_number'=>'768',
            'office_mobile_number'=>'923278234782',
            'office_email'=>'office@gmail.com',
            ),
            array(
         'source_user_id'=>2,
            'lead_generated_source'=>2,
            'name'=>'Shesha',
            'pan_number'=>'PRETY1234S',
            'dob'=>date('Y-m-d',strtotime('2-9-1989')),
            'gender'=>'Female',
            'mobile_number'=>'4578292929',
            'email'=>'Shesha@gmail.com',
            'bank_acc_number'=>'78393876782',
            'ifsc_code'=>'Ic325',
            'bank_name'=>'ICICI',
            'branch_name'=>'Thane',
            'upi_id'=>'978373',
            'address_proof_doc'=>'pan card',
            'address_type'=>'test',
            'address_line1'=>'Thane',
            'address_line2'=>'',
            'pincode'=>'44322',
            'city'=>'Thane',
            'state'=>'Maharashtra',
            'agency_name'=>'tes',
            'gst_number'=>'868',
            'office_mobile_number'=>'98278234782',
            'office_email'=>'office_1@gmail.com',
            ),
            array(
             'source_user_id'=>3,
            'lead_generated_source'=>4,
            'name'=>'Shonali',
            'pan_number'=>'UIOKJ1234S',
            'dob'=>date('Y-m-d',strtotime('2-10-1990')),
            'gender'=>'Female',
            'mobile_number'=>'9778292929',
            'email'=>'Shonali@gmail.com',
            'bank_acc_number'=>'679393876782',
            'ifsc_code'=>'Ic325',
            'bank_name'=>'ICICI',
            'branch_name'=>'Thane',
            'upi_id'=>'878373',
            'address_proof_doc'=>'Addhar card',
            'address_type'=>'test',
            'address_line1'=>'Thane',
            'address_line2'=>'',
            'pincode'=>'44322',
            'city'=>'Thane',
            'state'=>'Maharashtra',
            'agency_name'=>'tes',
            'gst_number'=>'768',
            'office_mobile_number'=>'923278234782',
            'office_email'=>'office_2@gmail.com',
            ),
            
            
           
        ));
    }
}
