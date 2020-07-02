<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SalesKitProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sales_kit_products')->insert(array(
            array(
              'id'=>1,
              'loan_product_id' => 1,
              'name' => 'Product Policy',
              'content_data'=>'<b>Features</b>:</br>
               <p>Collateral free loans- Develop and create capital for your business without worrying about the type of collateral and its value.
               Faster TAT, ensuring your financial needs of the business is addressed within a well stipulated time.
               Loan Tenure- Avail loans up to 48 months
               Rate of Interest- Business Loans can be availed at a lucrative rate of interest at 18%</p></br>
               <b>Benefits:</b></br>
               <p>Flexible loan tenure to make your repayment easy and burden free
               End use of business loan is to meet your short term business goals
               Hassle free documentation to avail limits
               Fair practise of interest rates as compared to that in the market.</p>',
              'created_at'=>now(),
              'updated_at'=>now()
            ),
            array(
                'id'=>2,
                'loan_product_id' => 1,
                'name' => 'Customer Journey',
                'content_data'=>'<b>Customer on-boarding:</b> Dedicated Relationship Manager assigned to collect application form and KYC documents
                 </br> <b>Credit underwriting:</b> Credit underwriting team to initiate Bureau, Field investigation, Personal Discussion, Fraud check and other verification checks.
                <br><b>Credit Underwriting:</b> Approval sanctioning note to be prepared basis reports and Personal Discussion conducted.
                </br><b>Sanctioning:</b> Acceptance of the sanctioning terms & conditions
                </br><b>Disbursement:</b> Disbursement of loan
                </br><b>Collection:</b> Collection through NACH/monthly repayment',
                'created_at'=>now(),
                'updated_at'=>now()
            ),
            array(
                'id'=>3,
                'loan_product_id' => 1,
                'name' => 'Product FAQ',
                'content_data'=>'<b>What is a Business Loan?</b></br>
                <p>A business loan is an unsecured form of credit extended to the self-employed MSME segment. It is designed to cover various expenditures in a
                business. Borrowers need not mortgage any asset to avail funds.</p>
                </br><b>Who are eligible for a Business Loan?</b>
                <p>Business Loan can be availed by SME’s, Professionals such as Doctors/Charted Accountants/Architects, etc.., Manufacturers and Traders.</p></br>
                <b>What is the minimum and maximum loan amount which can be availed by Applicant?</b>
                </br><p>Axis Finance, offers Business Loan with a minimum amount of Rs.1 lakh up to Rs. 50 Lakh.</p>
                </br><b>What are the loan tenure options?</b>
                <p>Business Loan can be availed anywhere between 36months to 48 months, however 60 months for Doctors.</p>',
                'created_at'=>now(),
                'updated_at'=>now()
            ),
            array(
                'id'=>4,
                'loan_product_id' => 1,
                'name' => 'Current Offers',
                'content_data'=>'Download Current Offers Here',
                'created_at'=>now(),
                'updated_at'=>now()
            ),
            array(
                'id'=>5,
                'loan_product_id' => 1,
                'name' => 'Document Checklist',
                'content_data'=>'',
                'created_at'=>now(),
                'updated_at'=>now()
            ),
           
        ));
    }
}
