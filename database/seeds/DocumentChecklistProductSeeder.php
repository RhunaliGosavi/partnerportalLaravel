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
              // 'sales_kit_product_id' => 1,
              'document_checklist_category_id'=>1,
              'content_data'=>'<li>PAN Card</li>
              <li>Address Proofs (Passport/Driving license/Aadhar card, etc.)</li>
              <li>Identity Proofs (PAN card/Passport/Voter ID, etc.)</li>
              <li>Basis Constitution - Partnership deed, MOA, AOA, Business Registration Certificate, GST certificate, TIN number, etc.</li>
              <li>Applicant & Co-Applicant recent photographs</li>',
              'created_at'=>now(),
              'updated_at'=>now()
            ),
            array(
                'id'=>2,
                // 'sales_kit_product_id' => 2,
                'document_checklist_category_id'=>2,
                'content_data'=>'<li>PAN Card</li>
                <li>Address Proofs (Passport/Driving license/Aadhar card, etc.)</li>
                <li>Identity Proofs (PAN card/Passport/Voter ID, etc.)</li>
                <li>Basis Constitution - Partnership deed, MOA, AOA, Business Registration Certificate, GST certificate, TIN number, etc.</li>
                <li>Applicant & Co-Applicant recent photographs</li>',
                'created_at'=>now(),
                'updated_at'=>now()
              ),
            
        ));
    }
}
