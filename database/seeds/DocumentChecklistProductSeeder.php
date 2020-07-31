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
              'content_data'=>'PAN Card
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
                'content_data'=>'PAN Card
                <li>Address Proofs (Passport/Driving license/Aadhar card, etc.)</li>
                <li>Identity Proofs (PAN card/Passport/Voter ID, etc.)</li>
                <li>Basis Constitution - Partnership deed, MOA, AOA, Business Registration Certificate, GST certificate, TIN number, etc.</li>
                <li>Applicant & Co-Applicant recent photographs</li>',
                'created_at'=>now(),
                'updated_at'=>now()
              ),
              array(
                'id'=>3,
                // 'sales_kit_product_id' => 2,
                'document_checklist_category_id'=>3,
                'content_data'=>'Application form
                <li>Applicants photograph</li>
                <li>Identity proof </li>
                <li>Address proof</li>
                <li>Signature proof</li>
                <li>Bank account statements for the last 6/12 months.</li><li>If you represent Companies/ Proprietorships/ Partnership firms you will need to submit your IT returns, an audited Balance Sheet and Profit & Loss Account for the previous two years.</li>',
                'created_at'=>now(),
                'updated_at'=>now()
              ),
              array(
                'id'=>4,
                // 'sales_kit_product_id' => 2,
                'document_checklist_category_id'=>4,
                'content_data'=>'Application form
                <li>Applicants photograph</li>
                <li>Address proof (Aadhar card/Driving license/ passport /Utility Bills)</li>
                <li>D proof( Pan card/Voter ID/passport)</li>
                <li>Signature proof</li>
                <li>Bank statement/Passbook/Salary slips of last 3 months*</li>',
                'created_at'=>now(),
                'updated_at'=>now()
              ),
              array(
                'id'=>5,
                // 'sales_kit_product_id' => 2,
                'document_checklist_category_id'=>5,
                'content_data'=>'PAN card
                <li>Identity proof (PAN card/Aadhar card/Driving License/Passport/Voter ID)</li>
                <li>Address proof(Passport/Aadhar card/Driving License/Voter ID)</li>
                <li>3 latest copies of Salary Slip/Bank Stmt. (with salary credit) along with latest Form 16</li>
                <li>Application form</li>
                <li>Applicant photograph</li>',
                'created_at'=>now(),
                'updated_at'=>now()
              ),


        ));
    }
}
