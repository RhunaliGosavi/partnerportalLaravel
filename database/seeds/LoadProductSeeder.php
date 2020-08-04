<?php

use App\LoanProduct;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class LoadProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('loan_products')->insert(array(
                array(
                  'id'=>1,
                  'name' => 'Business Loan',
                  'slug' => Str::slug('Business Loan'),
                  // 'icon' => 'product-pic1.png',
                  'description' => 'Looking to get ahead in your career with your own business? Now Chartered Accountants, Engineers or Doctors can apply for business loan online. Axis Bank offers collateral-free EMI based Business Loans for professionals who are looking to grow their practice. If you are a doctor or medical practitioner you can avail of a business loan to purchase medical equipment or renovate your clinic premises. With a Business Loan for Engineers, you can take your business to greater heights and with a Business Loan for Chartered Accountants you can start your own practice. Take a look at the many features and beenfits of this business loan below.',
                  'created_at'=>now(),
                  'updated_at'=>now()
                ),
                array(
                  'id'=>2,
                  'name' => 'Loan Against Property',
                  'slug' => Str::slug('Loan Against Property'),
                  // 'icon' => 'product-pic2.png',
                  'description' => 'If you’re looking for funding and have a commercial or residential property which you can offer as collateral, then Axis Bank’s Loan against Property is just what you need. Axis Bank offers easy and hassle-free Loan against Property for a loan amount starting from Rs. 5 Lakhs. You can avail loan against residential or commercial properties at attractive rates of interest and earn eDGE Loyalty Reward points',
                  'created_at'=>now(),
                  'updated_at'=>now()
                ),
                array(
                    'id'=>3,
                    'name' => 'Loan Against Securities',
                    'slug' => Str::slug('Loan Against Securities'),
                    // 'icon' => 'product-pic3.png',
                    'description' => 'Do you have an urgent need for cash? Enjoy the flexibility of liquidity along with access to cash without selling off your securities, with Axis Bank’s Loan Against Securities. Get high-value loans upto 85% of the value of your securities at attractive interest rates and avail of overdraft facilities against your shares and mutual funds, bonds and life insurance policies. Before you apply for Loan Against Securities with Axis Bank, make sure to read the features and benefits listed below.',
                    'created_at'=>now(),
                    'updated_at'=>now()
                ),
                array(
                    'id'=>4,
                    'name' => 'Consumer Product Finance',
                    'slug' => Str::slug('Consumer Product Finance'),
                    // 'icon' => 'product-pic3.png',
                    'description' => 'Consumer product finance',
                    'created_at'=>now(),
                    'updated_at'=>now()
                ),
                array(
                    'id'=>5,
                    'name' => 'Personal Loan',
                    'slug' => Str::slug('Personal Loan'),
                    // 'icon' => 'product-pic3.png',
                    'description' => 'Consumer product finance',
                    'created_at'=>now(),
                    'updated_at'=>now()
                ),
                array(
                    'id'=>6,
                    'name' => 'Unapproved sourcing',
                    'slug' => Str::slug('Unapproved sourcing'),
                    // 'icon' => 'product-pic3.png',
                    'description' => 'Unapproved sourcing',
                    'created_at'=>now(),
                    'updated_at'=>now()
                ),

              ));

    }
}
