<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class DocumentChecklistProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('document_checklist_products')->insert(array(
            array(
              'id'=>1,
              'sales_kit_product_id' => 1,
              'document_checklist_category_id'=>1,
              'content_data'=>'• PAN Card <br>
                • Address Proofs (Passport/Driving license/Aadhar card, etc.)<br>
                • Identity Proofs (PAN card/Passport/Voter ID, etc.)<br>
                • Basis Constitution - Partnership deed, MOA, AOA, Business Registration Certificate, GST certificate, TIN number, etc.<br>
                • Applicant & Co-Applicant recent photographs',
              'created_at'=>now(),
              'updated_at'=>now()
            ),
            array(
                'id'=>2,
                'sales_kit_product_id' => 2,
                'document_checklist_category_id'=>2,
                'content_data'=>'• PAN Card 2 <br>
                  • Address Proofs (Passport/Driving license/Aadhar card, etc.) 2 <br>
                  • Identity Proofs (PAN card/Passport/Voter ID, etc.) 2 <br>
                  • Basis Constitution - Partnership deed, MOA, AOA, Business Registration Certificate, GST certificate, TIN number, etc.2 <br>
                  • Applicant & Co-Applicant recent photograph 2',
                'created_at'=>now(),
                'updated_at'=>now()
              ),
            
        ));
    }
}
