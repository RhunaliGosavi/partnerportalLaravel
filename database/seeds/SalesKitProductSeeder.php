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
              'content_data'=>' <div class="row">
              <div class="col-md-4 vmiddle-pic">
                <img src="/assets_frontend/images/product-policy-pic.png" class="img-fluid">
              </div>
              <div class="col-md-8 fnb-content">
                <h3>Features:</h3>
                <ul>
                  <li><b>Collateral free loans</b>- Develop and create capital for your business without worrying about
                    the type of collateral and its value</li>
                  <li><b>Faster TAT</b>, ensuring your financial needs of the business is addressed within a well stipulated
                    time</li>
                  <li><b>Loan Tenure</b>- Avail loans up to 48 months</li>
                  <li><b>Rate of Interest</b>- Business Loans can be availed at a lucrative rate of interest at 18%</li>
                </ul>
                <h3>Benefits:</h3>
                <ul>
                  <li><b>Flexible loan tenure</b> to make your repayment easy and burden free</li>
                  <li><b>End use of business loan </b>is to meet your short term business goals</li>
                  <li>Hassle free <b>documentation</b> to avail limits</li>
                  <li>Fair practise of <b>interest rates</b> as compared to that in the market</li>
                </ul>
              </div>
            </div>',
              'created_at'=>now(),
              'updated_at'=>now()
            ),
            array(
                'id'=>2,
                'loan_product_id' => 1,
                'name' => 'Customer Journey',
                'content_data'=>' <div class="row">
                <div class="col-md-4 vmiddle-pic">
                  <img src="/assets_frontend/images/customer-journey-pic.png" class="img-fluid">
                </div>
                <div class="col-md-8 journey-content">
                  <div class="row">
                    <div class="col-md-4 col">
                      <div class="journey-box">
                        <div class="head"><h3>1. Customer on-boarding</h3></div>
                        <div class="content"><p>Dedicated Relationship Manager assigned to collect application form and KYC documents</p></div>
                      </div>
                    </div>
                    <div class="col-md-4 col">
                      <div class="journey-box">
                        <div class="head"><h3>2. Credit underwriting</h3></div>
                        <div class="content"><p>Credit underwriting team to initiate Bureau, Field investigation, Personal Discussion, Fraud check and other verification checks.</p></div>
                      </div>
                    </div>
                    <div class="col-md-4 col">
                      <div class="journey-box">
                        <div class="head"><h3>3. Credit underwriting</h3></div>
                        <div class="content"><p>Approval sanctioning note to be prepared basis reports and Personal Discussion conducted.</p></div>
                      </div>
                    </div>
                    <div class="col-md-4 col">
                      <div class="journey-box">
                        <div class="head"><h3>4. Sanctioning</h3></div>
                        <div class="content"><p>Acceptance of the sanctioning terms & conditions</p></div>
                      </div>
                    </div>
                    <div class="col-md-4 col">
                      <div class="journey-box">
                        <div class="head"><h3>5. Disbursement</h3></div>
                        <div class="content"><p>Disbursement of loan</p></div>
                      </div>
                    </div>
                    <div class="col-md-4 col">
                      <div class="journey-box">
                        <div class="head"><h3>6. Collection</h3></div>
                        <div class="content"><p>Collection through NACH/monthly repayment</p></div>
                      </div>
                    </div>

                  </div>
                </div>
              </div>',
                'created_at'=>now(),
                'updated_at'=>now()
            ),
            array(
                'id'=>3,
                'loan_product_id' => 1,
                'name' => 'Product FAQ',
                'content_data'=>'<div class="accordion-sec">
                <div class="set">
                  <a href="javascript:void(0)" class="active" >What is a Business Loan?</a>
                  <div class="content" style="display: block;">
                    <p>A business loan is an unsecured form of credit extended to the self-employed MSME segment. It is designed to cover various expenditures in a business. Borrowers need not mortgage any asset to avail funds.</p>
                  </div>
                </div>
                <div class="set">
                  <a href="javascript:void(0)">Who are eligible for a Business Loan?</a>
                  <div class="content">
                    <p>usiness Loan can be availed by SME’s, Professionals such as Doctors/Charted Accountants/Architects, etc.., Manufacturers and Traders. </p>
                  </div>
                </div>
                <div class="set">
                  <a href="javascript:void(0)">What is the minimum and maximum loan amount which can be availed by Applicant?</a>
                  <div class="content">
                    <p>Axis Finance, offers Business Loan with a minimum amount of Rs.1 lakh up to Rs. 50 Lakh.</p>
                  </div>
                </div>
                <div class="set">
                  <a href="javascript:void(0)">What are the loan tenure options?</a>
                  <div class="content">
                    <p> Business Loan can be availed anywhere between 36months to 48 months, however 60 months for Doctors.</p>
                  </div>
                </div>
                <div class="set">
                  <a href="javascript:void(0)">What types of securities are acceptable?</a>
                  <div class="content">
                    <p>Business Loans are purely collateral free loans. However if the Applicant is seeking for a loan beyond Rs.30 Lakhs Axis Finance accepts the following liquid collaterals:</p></br>
                    • Mutual Funds<br>
                    • Bonds<br>
                    • Life Insurance & ULIP<br>
                    • Fixed Deposits receipt<br>
                    • National Savings Certificate<br>
                    • Kissan Vikas Patra (KVP)<br>

                  </div>
                </div>
                  <div class="set">
                  <a href="javascript:void(0)">What are the purposes of a Business Loan?</a>
                  <div class="content">
                    <p> The purpose of a Business Loan is to : Avail for working capital purposes, meeting short term cash flow requirements, investments into plant and machinery etc.</p>
                  </div>
                </div>
               <div class="set">
                  <a href="javascript:void(0)">Is Pre-closure of Business Loan allowed?</a>
                  <div class="content">
                    <p> Yes, you are allowed to pre-close your business loans fee of 3% of your loan amount.</p>
                  </div>
                </div>
                <div class="set">
                  <a href="javascript:void(0)">How can I know if am eligible for a Business Loan?</a>
                  <div class="content">
                    <p>Please click here to evaluate your eligibility.</p>
                  </div>
              </div>
                 <div class="set">
                  <a href="javascript:void(0)">How do I evaluate my EMI?</a>
                  <div class="content">
                    <p>To check what will be your EMI, please click here</p>
                  </div>
                  </div>
                   <div class="set">
                  <a href="javascript:void(0)">What are the means of repaying my EMI’s?</a>
                  <div class="content">
                    <p>You can repay your EMI’s through NACH. The repayment can be made once a month towards your loan.</p>
                  </div>
</div></div>



  ',
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

            array(
                'id'=>6,
                'loan_product_id' => 2,
                'name' => 'Product Policy',
                'content_data'=>'<div class="row">
                <div class="col-md-4 vmiddle-pic">
                  <img src="/assets_frontend/images/product-policy-pic.png" class="img-fluid">
                </div>
                <div class="col-md-8 fnb-content">
                  <h3>Features:</h3>
                  <ul>
                    <li><b>Flexible collateral</b>- Collateral security in the form of commercial/ residential/ special properties and also residential plots. </li>
                    <li><b>Loan tenure</b> – Flexible loan tenor up to 15 years</li>
                    <li><b>Loan amount</b>- Ranges between Rs. 1,00,000 to Rs.5,00,00,000</li>
                    <li><b>Attractive ROI</b>-  Avail LAP at an attractive ROI</li>
                    <li><b>Repayment</b> – You can repay your monthly instalments from any bank account via NACH</li>
                    <li><b>Assessment of loan</b>- Various types of assessment is carried out to cover all types of business</li>
                  </ul>
                  <h3>Benefits:</h3>
                  <ul>
                    <li><b>Purpose of loan</b> – LAP can be availed for multiple purposes such as; Debt refinancing, Balance transfer, Long term working capital, etc. </li>
                    <li><b>Flexible EMI’s</b> – Avail loan at a higher loan tenor by repaying lower equated monthly instalment.</li>
                    <li><b>Collateral for convenience</b>- Clubbing of various types of collateral to derive at a higher loan amount</li>
                    <li><b>Quicker and efficient TAT</b>- Avail loans at a faster TAT</li>
                    <li><b>Minimal documentation</b>- Basic documentation to be collected for loan eligibility</li>
                  </ul>
                </div>
              </div>',
                'created_at'=>now(),
                'updated_at'=>now()
              ),
              array(
                  'id'=>7,
                  'loan_product_id' => 2,
                  'name' => 'Customer Journey',
                  'content_data'=>'<div class="row">
                  <div class="col-md-4 vmiddle-pic">
                    <img src="/assets_frontend/images/customer-journey-pic.png" class="img-fluid">
                  </div>
                  <div class="col-md-8 journey-content">
                    <div class="row">
                      <div class="col-md-4 col">
                        <div class="journey-box">
                          <div class="head"><h3>1. Customer on-boarding</h3></div>
                          <div class="content"><p>Dedicated SO assigned to collect application form + KYC documents + Property documents</p></div>
                        </div>
                      </div>
                      <div class="col-md-4 col">
                        <div class="journey-box">
                          <div class="head"><h3>2. Credit underwriting</h3></div>
                          <div class="content"><p>Credit underwriting team to initiate Bureau, Legal & Technical valuation. FI, PD, FCU and other verification checks. </p></div>
                        </div>
                      </div>
                      <div class="col-md-4 col">
                        <div class="journey-box">
                          <div class="head"><h3>3. Credit underwriting</h3></div>
                          <div class="content"><p>Approval sanctioning note to be prepared basis reports and PD conducted.</p></div>
                        </div>
                      </div>
                      <div class="col-md-4 col">
                        <div class="journey-box">
                          <div class="head"><h3>4. Sanctioning</h3></div>
                          <div class="content"><p>Acceptance of the sanctioning terms & conditions</p></div>
                        </div>
                      </div>
                      <div class="col-md-4 col">
                        <div class="journey-box">
                          <div class="head"><h3>5. Disbursement</h3></div>
                          <div class="content"><p>Disbursement of loan</p></div>
                        </div>
                      </div>
                      <div class="col-md-4 col">
                        <div class="journey-box">
                          <div class="head"><h3>6. Collection</h3></div>
                          <div class="content"><p>Collection through NACH/monthly repayment</p></div>
                        </div>
                      </div>

                    </div>
                  </div>
                </div>',
                  'created_at'=>now(),
                  'updated_at'=>now()
              ),
              array(
                  'id'=>8,
                  'loan_product_id' => 2,
                  'name' => 'Product FAQ',
                  'content_data'=>'<div class="accordion-sec">
                  <div class="set">
                    <a href="javascript:void(0)" class="active" >How do I calculate my eligibility?</a>
                    <div class="content" style="display: block;">
                      <p>To check your eligibility, please click here.</p>
                    </div>
                  </div>
                  <div class="set">
                  <a href="javascript:void(0)">What are the documents require to avail of the Loan Against Property? </a>
                  <div class="content">
                            <p>The following are the list of documents which will be required by Applicant & Co-Applicant:</p>
                    <table  class="table table-bordered table-custome-style">
                      <tr>
                        <th>Particulars</th>
                        <th>Salaried</th>
                        <th>Self Employed</th>

                      </tr>
                      <tr>
                        <th>Photo Identity Proof</th>
                        <td colspan="2">36</td>
                       </tr>

                      <tr>
                        <th>Address Proof</th>
                        <td colspan="2">Passport, driving licence, voters’ ID card, PAN card, Aadhaar letter issued by UIDAI and Job Card issued by NREGA signed by a State Government official.</td></tr>
                               <tr>
                        <th>Business Proof</th>
                        <td>NA</td>
                                <td>Shop Act License, GST Certificate, MOA/AOA, Partnership/HUF Deed etc.</td>
                       </tr>
                                <tr>
                        <th>Income Proof</th>
                        <td>    • Latest 3 month salary slip or Salary Certificate from employer.<br>
                                 • Last 2 years Form 16 Or ITR copy
                                </td>
                                <td>    • Last 2 years certified financials along with audit report.<br>
                    • GST Return last 1 year if applicable.<br>
                    • ITR copy along computation income, P&L & Balance Sheet with all schedules of accounts.<br>
                               </td>
                       </tr>
                                <tr>
                        <th>Bank Statement</th>
                        <td >Last 6 months bank statement where salary is credited</td>
                                <td >Last 12 months bank statement where business income credited</td>
                       </tr>
                               <tr>
                        <th>Existing Loan Details</th>
                        <td colspan="2">All loans repayment track which are running currently along with Bank Statement from where EMI is debited. ( Last 12 Months )</td>

                       </tr>
                               <tr>
                        <th>Property documents</th>
                        <td colspan="2">Approved Plan Copy, CC, OC, Title Certificate, Previous chain of agreement copy.</td>

                       </tr>

                    </table><br>
                            <p>*** Self-attestation require on all documents as per AFL policy.</p>
                  </div>
                </div>
                  <div class="set">
                    <a href="javascript:void(0)">What is the best way to apply for loan against property from Axis Finance Ltd?</a>
                    <div class="content">
                      <p>You can apply for loan in the following ways:</p><br>
              • Simply fill up the your details on our website www.axisfinance.in for us to get in touch with you.<br>
              • Visit your nearest branch.<br>
              • Call one of our customer help numbers provided on the website.<br>
              • Our existing customer may also get in touch with their Relationship/Portfolio Manager.<br>

                    </div>
                  </div>
                  <div class="set">
                    <a href="javascript:void(0)">What Property can be offered as Collateral/Security for Loan Against Property?</a>
                    <div class="content">
                      <p>You can provide self-occupied or lease/rented following property:</p><br>
                      • Residential Flat / Row House / Independent House or Bungalow <br>
              • Commercial Shop/ Office <br>
              • Industrial Property<br>
              • Special/Alternate Property such as school, Warehouse, Nursing Homes, Hospital, Banquet Halls, Hotel & Resorts, Cinema Hall/ Theatre etc. <br>
                    </div>
                  </div>

                  <div class="set">
                    <a href="javascript:void(0)">For what purpose I can opt Loan Against Property?</a>
                    <div class="content">
                              • Business <br>
                  • Debt Consolidation<br>
                  • Balance Transfer / Takeover of existing loans<br>
                  • Marriage<br>
                  • Child Education <br>
                  • Purchase / Improvement of Property<br>
                  • Medical Treatment<br>
                    </div>
                  </div>

                 <div class="set">
                    <a href="javascript:void(0)">What is the maximum loan I can get against my property?</a>
                    <div class="content">
                             <p>You can get a Loan against Property up to a maximum of 65% of market value of your property<br>
                             **Condition Apply.</p>
                    </div>
                  </div>
                  <div class="set">
                    <a href="javascript:void(0)">What is the minimum & maximum loan tenure for Loan against Property?</a>
                    <div class="content">
                             <p>Loan tenure range from 12 months up to 180 months subject to fulfilment of our AFL internal policy and credit criteria on regarding age of borrowers at loan maturity. </p>
                    </div>
                  </div>

                 <div class="set">
                    <a href="javascript:void(0)">What is the minimum & maximum loan amount for Loan against Property?</a>
                    <div class="content">
                             <p>At AFL, The minimum loan amount is INR 5.00 Lakhs & maximum loan amount can go up to INR 500.00 Lakhs depending upon on your repayment capacity, internal policy norms and are subject to change from time to time.</p>
                    </div>
                  </div>
                  <div class="set">
                    <a href="javascript:void(0)">I do not have documented financials but I do have the repayment capacity, will I get a loan? </a>
                    <div class="content">
                             <p>We have various options available under which we can offer you loans i.e. income based and surrogate income based loans. We have the understanding of your business and can determine your loan eligibility accordingly. </p>
                    </div>
                  </div>
                  <div class="set">
                    <a href="javascript:void(0)">Do I need a Co-borrower/Guarantor for Loan Against Property?</a>
                    <div class="content">
                              • All property owners to be co-borrower.<br>
                  • For sole property owner/applicant – One adult family member to be co-applicant.<br>
                  • Partners and Promoters, Directors will be taken as co-applicant in case of Partnership Firm and Pvt Ltd Co. respectively.<br>
                  • Applying jointly with a co-applicant/Guarantor, the loan amount can also be increased as per requirement. <br>
                    </div>
                  </div>

                  <div class="set">
                    <a href="javascript:void(0)">What is EMI & Pre-EMI?</a>
                    <div class="content">
                              <p>Your loan is repaid through Equated Monthly Instalments (EMI) which includes Principal and Interest component. EMI commences from the subsequent month of loan disbursal while Pre EMI is the simple interest, payable each month till the time your loan is fully disbursed.</p>
                    </div>
                  </div>
                 <div class="set">
                    <a href="javascript:void(0)">How Can I pay EMI?</a>
                    <div class="content">
                              <p>EMI payments towards your loan account can be made through the following repayment instructions:</p><br>
                               • National Automated Clearing House (NACH)

                    </div>
                  </div>
                  <div class="set">
                    <a href="javascript:void(0)">Whether income of the family is considered for arriving at loan Amount?</a>
                    <div class="content">
                              <p>In the case of salaried individuals/businessmen/self-employed persons, the income of the family may be taken into account, subject to documentary evidence, for the purpose of computing the eligible amount of loan.</p>


                    </div>
                  </div>
                 <div class="set">
                    <a href="javascript:void(0)">If I opt for a balance transfer, am I eligible for a higher amount?</a>
                    <div class="content">
                              <p>Yes, if you meet the criteria defined as per Axis Finance then you may receive a higher loan amount as compared to your existing loan facility. </p>


                    </div>
                  </div>
                    <div class="set">
                    <a href="javascript:void(0)">Can I prepay my loan?</a>
                    <div class="content">
                              <p>Yes, you can make your prepayment in either part or full. Please refer Schedule of Charges for charges on prepayment</p>


                    </div>
                    </div>
                  <div class="set">
                    <a href="javascript:void(0)">Does the property have to be insured?</a>
                    <div class="content">
                              <p>Yes, you will have to ensure that your property is duly and properly insured for fire and earthquake. </p>


                    </div>
                  </div>
                 <div class="set">
                    <a href="javascript:void(0)">Does the life insurance is mandatory?</a>
                    <div class="content">
                              <p>Axis Finance would prefer to insure the life of the borrower for his/her security so that the loan is adequately covered for any misfortune at the borrower’s end. Loan obligation gets cleared hassle free in case of life insurance coverage is in place. </p>


                    </div>
                  </div>



                  </div>


  ',
                  'created_at'=>now(),
                  'updated_at'=>now()
              ),
              array(
                  'id'=>9,
                  'loan_product_id' => 2,
                  'name' => 'Current Offers',
                  'content_data'=>'Download Current Offers Here',
                  'created_at'=>now(),
                  'updated_at'=>now()
              ),
              array(
                  'id'=>10,
                  'loan_product_id' => 2,
                  'name' => 'Document Checklist',
                  'content_data'=>'',
                  'created_at'=>now(),
                  'updated_at'=>now()
              ),


              array(
                'id'=>11,
                'loan_product_id' => 3,
                'name' => 'Product Policy',
                'content_data'=>'              <div class="row">
                <div class="col-md-4 vmiddle-pic">
                  <img src="/assets_frontend/images/product-policy-pic.png" class="img-fluid">
                </div>
                <div class="col-md-8 fnb-content">
                  <h3>Features:</h3>
                  <ul>
                    <li><b>TAT</b>-Instant loan processing</li>
                    <li>Zero Prepayment / Foreclosure charges</li>
                    <li><b>Offerings</b>-Wide range of securities</li>
                    <li>Flexible / Customised loan options</li>
                    <li>Easy and Hassle free tranche on platform</li>
                    <li><b>Rate of interest</b>-Attractive interest rates</li>
                  </ul>
                  <h3>Benefits:</h3>
                  <ul>
                    <li>Nil charges on loan prepayment/foreclosure</li>
                    <li><b>Loan amount</b> range - ₹ 10,000 -  ₹ 5 crores</li>
                    <li><b>Securities</b> - Mutual funds – Debt/FMPs, Bonds, Life Insurance Policy, ULIP, National savings Certificate, Kisan Viaks Patra, Sovereign Gold Bonds</li>
                    <li><b>Loan options</b> - Term loan, Dropdown Overdraft, Overdraft</li>
                    <li>Pay interest only for utilized loan amount​​​​​​​</li>
                  </ul>
                </div>
              </div>',
                'created_at'=>now(),
                'updated_at'=>now()
              ),
              array(
                  'id'=>12,
                  'loan_product_id' => 3,
                  'name' => 'Customer Journey',
                  'content_data'=>'<div class="row">
                  <div class="col-md-4 vmiddle-pic">
                    <img src="/assets_frontend/images/customer-journey-pic.png" class="img-fluid">
                  </div>
                  <div class="col-md-8 journey-content">
                    <div class="row">
                      <div class="col-md-4 col">
                        <div class="journey-box">
                          <div class="head"><h3>1. Customer on-boarding</h3></div>
                          <div class="content"><p>A dedicated Relationship Manager will collect required KYC and application form.</p></div>
                        </div>
                      </div>
                      <div class="col-md-4 col">
                        <div class="journey-box">
                          <div class="head"><h3>2. Credit underwriting</h3></div>
                          <div class="content"><p>Verification of KYC and credit assessment to be carried out</p></div>
                        </div>
                      </div>
                      <div class="col-md-4 col">
                        <div class="journey-box">
                          <div class="head"><h3>3. Credit underwriting</h3></div>
                          <div class="content"><p>Issuance of Sanction letter and acceptance of Sanctioning terms & conditions by the customer.</p></div>
                        </div>
                      </div>
                      <div class="col-md-4 col">
                        <div class="journey-box">
                          <div class="head"><h3>4. Post Sanction</h3></div>
                          <div class="content"><p>Security creation</p></div>
                        </div>
                      </div>
                      <div class="col-md-4 col">
                        <div class="journey-box">
                          <div class="head"><h3>5. Disbursement</h3></div>
                          <div class="content"><p>Disbursement of loan</p></div>
                        </div>
                      </div>


                    </div>
                  </div>
                </div>',
                  'created_at'=>now(),
                  'updated_at'=>now()
              ),
              array(
                  'id'=>13,
                  'loan_product_id' => 3,
                  'name' => 'Product FAQ',
                  'content_data'=>'<div class="accordion-sec">
                  <div class="set">
                    <a href="javascript:void(0)" class="active" >What is Loan against Securities?</a>
                    <div class="content" style="display: block;">
                      <p>Loan against Securities is loan against marketable securities in which customer pledges his investment in favour of lender and borrow fund to meet his financial and personal requirement without selling his investment.</p>
                    </div>
                  </div>

                  <div class="set">
                    <a href="javascript:void(0)">What is purpose of Loan against Securities?</a>
                    <div class="content">
                      <p>To fulfil personal needs, meet contingencies, subscribing to primary issues (Bonds),. It is the ideal way to get liquidity without liquidating them.</p><br>

                    </div>
                  </div>

                  <div class="set">
                    <a href="javascript:void(0)">What are the features of Loan against Securities?</a>
                    <div class="content">
                            • TAT-Instant loan processing<br>
			    • Zero Prepayment / Foreclosure charges<br>
			    • Offerings-Wide range of securities<br>
			    • Flexible / Customised loan options<br>
			    • Easy and Hassle free tranche on platform<br>
			    • Attractive interest rates<br>
                    </div>
                  </div>

                 <div class="set">
                    <a href="javascript:void(0)">What are the various types of Loans against Securities?</a>
                    <div class="content">
                             <p>Broadly, there are multiple loans under this category:</p><br>

				1. Loan Against Bonds<br>
				2. Loan Against Mutual Funds (Debt)<br>
				3. Loan Against Life Insurance Policies / ULIP<br>
				4. Loan Against FMPs<br>
				5. Loan Against National Savings Certificate<br>
				6. Loan Against Kisan Vikas Patra<br>
				7. Loan Against Sovereign Bonds<br>

                    </div>
                  </div>
                  <div class="set">
                    <a href="javascript:void(0)">What is the type of Loan against Securities Axis Finance offers?</a>
                    <div class="content">
                             <p>Axis Finance offers Loan against Securities for term loan & Demand Overdraft Loan. In a term loan, a customer borrows for a certain period like 1-7 years and can repay the loan amount at the time of completion of the loan tenure or in specified intervals. In a Demand Overdraft Loan, a customer can request for repayment as well as disbursement up to his eligibility amount at any time during the loan tenor of 1 year.</p>
                    </div>
                  </div>

                 <div class="set">
                    <a href="javascript:void(0)">Can I foreclose my Loan Against Securities a/c?</a>
                    <div class="content">
                             <p>Yes! You can foreclose your loan anytime you want after payment of interest and the principal loan amount. There are no foreclosure charges of loan repayment by source of own funds.</p>
                    </div>
                  </div>
                  <div class="set">
                    <a href="javascript:void(0)">Can I make part payments on my Loan Against Securities? </a>
                    <div class="content">
                             <p>Yes, Part-Prepayment facility is available. With this, you can part prepay during the tenor of loan. </p>
                    </div>
                  </div>
                  <div class="set">
                    <a href="javascript:void(0)">What are the minimum and maximum loan amounts in Loan Against Securities? </a>
                    <div class="content">
                             <p>You can choose to borrow any loan amount ranging from Rs. 10,000 to Rs. 5 crore and as per relevant product. </p>
                    </div>
                  </div>
                  <div class="set">
                    <a href="javascript:void(0)">How do I apply for a Loan Against Securities? </a>
                    <div class="content">
                             <p>You can apply through our online application facility or by connecting to our call centre executive on customer contact number.</p>
                    </div>
                  </div>
                 <div class="set">
                    <a href="javascript:void(0)">What are the benefits or advantages of taking a Loan Against Shares from Axis Finance? </a>
                    <div class="content">
                            • Nil charges on loan prepayment/foreclosure<br>
			    • Loan amount range - ₹ 10,000 -  ₹ 5 crores<br>
			    • Securities - Mutual funds – Debt/FMPs, Bonds, Life Insurance Policy, ULIP, National savings Certificate, Kisan Viaks Patra, Sovereign Gold Bonds<br>
			    • Loan options - Term loan, Dropdown Overdraft, Overdraft<br>
			Pay interest only for utilized loan amount<br>
                    </div>
                  </div>
                 <div class="set">
                    <a href="javascript:void(0)">When will I get my Loan Against Shares?</a>
                    <div class="content">
                           <p>For all online applications, approvals gets instantly on accurate completion.</p>
                    </div>
                  </div>
                 <div class="set">
                    <a href="javascript:void(0)">How do I repay the loan?</a>
                    <div class="content">
                           <p>You can repay the loan at any point of time during the loan tenor by repaying the due interest and principal loan amount through RTGS / NEFT / Cheque/Customer Portal.</p>
                    </div>
                  </div>
                   <div class="set">
                    <a href="javascript:void(0)">How do I apply online for an instant Loan against Securities?</a>
                    <div class="content">
                           <p>To apply, click here </p>
                    </div>
                  </div>
                  <div class="set">
                    <a href="javascript:void(0)">On what criteria will the loan be sanctioned to me?</a>
                    <div class="content">
                           <p>All loans are sanctioned on the basis of internal policies of Axis Finance Ltd. </p>
                    </div>
                  </div>
                 <div class="set">
                    <a href="javascript:void(0)">When will I get the loan if I apply online?</a>
                    <div class="content">
                           <p>Once your loan application approved, your loan will be disbursed post securities pledged.</p>
                    </div>
                  </div>
                 <div class="set">
                    <a href="javascript:void(0)">How can I check the status of the loan for which I have applied online?</a>
                    <div class="content">
                           <p>To check on your application status, you can check on AFL website / client portal option of Track Application or call our Customer Care number.</p>
                    </div>
                  </div>
                  <div class="set">
                    <a href="javascript:void(0)">How secure is the information provided by me?</a>
                    <div class="content">
                           <p>Provided information will be kept confidential and in secured system.</p>
                    </div>
                  </div>
                  <div class="set">
                    <a href="javascript:void(0)">What is a Application fee for online application?</a>
                    <div class="content">
                           <p>A Application fee is a charge required to be paid for the processing your application form online.</p>
                    </div>
                  </div>
                  <div class="set">
                    <a href="javascript:void(0)">What if I don’t pay the Application fees online?</a>
                    <div class="content">
                           <p>In case you choose not to pay the Application fee, you will lose the benefit of an instant online approvals.</p>
                    </div>
                  </div>
                  <div class="set">
                    <a href="javascript:void(0)">Is online fees paid to AFL is refundable?</a>
                    <div class="content">
                           <p>In case the loan is sanctioned, but the disbursement has not been availed by you within 30 days of sanction, we shall refund the Application fee already paid by you in full. In the event of your loan rejection, we shall refund the Application fee paid by you in full.</p>
                    </div>
                  </div>
                 <div class="set">
                    <a href="javascript:void(0)">How can I pay the Application fee?</a>
                    <div class="content">
                           <p>You can pay Application fee online though net banking/Credit Card/Debit Card</p>
                    </div>
                  </div>
                <div class="set">
                    <a href="javascript:void(0)">Is it safe to use my debit card on this site?</a>
                    <div class="content">
                           <p>All transactions on our website are safe and the transactions done are secure.</p>
                    </div>
                  </div>
                  <div class="set">
                    <a href="javascript:void(0)">How do I cancel a transaction or get a refund?</a>
                    <div class="content">
                           <p>In case of any discrepancies we will refund the money, provided that the reasons are valid. Read the ‘Terms and Conditions\' for more details.</p>
                    </div>
                  </div>
                  <div class="set">
                    <a href="javascript:void(0)">If a customer does not have Demat a/c with Axis, can he still avail a Loan Against Bonds/Mutual Funds(Debt) from Axis Finance?</a>
                    <div class="content">
                           <p>Yes. You can pledge shares held with any Depository Participant in NSDL or CDSL</p>
                    </div>
                  </div>
                   <div class="set">
                    <a href="javascript:void(0)">What is the Loan to Value & Margin?</a>
                    <div class="content">
                           <p>You can get Loans up to 90% of the value of Pledged Securities. T&C apply.</p>
                    </div>
                  </div>
                  <div class="set">
                    <a href="javascript:void(0)">How much interest does a customer need to pay?</a>
                    <div class="content">
                           <p>Interest is calculated on a daily basis on daily outstanding amount which needs to be repaid on a monthly basis.</p>
                    </div>
                  </div>
                  <div class="set">
                    <a href="javascript:void(0)">Can a customer pledge all the Securities of his portfolio?</a>
                    <div class="content">
                           <p>Axis Finance has its own approved securities list.</p>
                    </div>
                  </div>
                 <div class="set">
                    <a href="javascript:void(0)">Can a customer pledge securities held in the name of his spouse, children or parents?</a>
                    <div class="content">
                           <p>Yes. He can avail a loan on these Securities. He is required to take all of them as co-borrower / Security Provider.</p>
                    </div>
                  </div>
                  <div class="set">
                    <a href="javascript:void(0)">What are the pledge charges?</a>
                    <div class="content">
                           <p>Pledge charges vary from DP to DP. However, the common charge is 0.04% of the pledge amount.</p>
                    </div>
                  </div>
                 <div class="set">
                    <a href="javascript:void(0)">How can a customer get to know his loan eligibility amount?</a>
                    <div class="content">
                           <p>Loan eligibility calculated by considering the client’s profile, valuation of pledgeable securities & existing obligations if any.  Our website available loan calculator can help to know the eligibility amount.</p>
                    </div>
                  </div>
                  <div class="set">
                    <a href="javascript:void(0)">How can a customer repay the loan amount?</a>
                    <div class="content">
                           <p>A customer can repay the loan amount in part or full by drawing a cheque in favour of Axis Finance or through RTGS/NEFT at any point of time during the loan tenure. Customer can also repay the loan from Customer Portal.</p>
                    </div>
                  </div>
                  <div class="set">
                    <a href="javascript:void(0)">Can customer release pledged securities partly?</a>
                    <div class="content">
                           <p>Yes. A customer can request through client portal/operation team to release the same after repaying the loan amount to the effect that the margin is maintained as per requirement. </p>
                    </div>
                  </div>
                 <div class="set">
                    <a href="javascript:void(0)">What are the repayment charges?</a>
                    <div class="content">
                           <p>Axis Finance does not levy any repayment charges if payment made from own sources. </p>
                    </div>
                  </div>
                 <div class="set">
                    <a href="javascript:void(0)">How can a customer release his pledged securities?</a>
                    <div class="content">
                           <p>A customer can initiate a release request through his DP after repaying the loan amount and interest to Axis Finance.</p>
                    </div>
                  </div>
                   <div class="set">
                    <a href="javascript:void(0)">Are Axis Finance provide loan against life insurance policy?</a>
                    <div class="content">
                           <p>Yes, Axis Finance offers loan against life insurance policy from LIC or other reputed private insurers is one of the securities you can use as a collateral to take a loan.</p>
                    </div>
                  </div>
                  <div class="set">
                    <a href="javascript:void(0)">Can I get a loan against any policy?</a>
                    <div class="content">
                           <p>You can get a loan against a list of approved insurance  issuers. These include unit-linked plans, endowment plans, whole life plans and income plans from many insurers. However, a term insurance policy may not entitle you to a loan.</p>
                    </div>
                  </div>
                   <div class="set">
                    <a href="javascript:void(0)">How much loan can I get against my insurance policy?</a>
                    <div class="content">
                           <p>You can get a loan against insurance policy up to 90% of the surrender value of the policy you pledge.</p>
                    </div>
                  </div>
                  <div class="set">
                    <a href="javascript:void(0)">What do I need to do to get a loan against LIC policy?</a>
                    <div class="content">
                           <p>Visit the nearest Axis Finance and submit a filled-up Loan against Security application form, the original policy document with request letter for policy surrender value, KYC and Banking statements.. AFL will inform you about details like loan eligibility, tenure and interest.</p>
                    </div>
                  </div>


                  </div>





  ',
                  'created_at'=>now(),
                  'updated_at'=>now()
              ),
              array(
                  'id'=>14,
                  'loan_product_id' => 3,
                  'name' => 'Current Offers',
                  'content_data'=>'Download Current Offers Here',
                  'created_at'=>now(),
                  'updated_at'=>now()
              ),
              array(
                  'id'=>15,
                  'loan_product_id' => 3,
                  'name' => 'Document Checklist',
                  'content_data'=>'',
                  'created_at'=>now(),
                  'updated_at'=>now()
              ),
              array(
                'id'=>16,
                'loan_product_id' => 4,
                'name' => 'Product Policy',
                'content_data'=>'<div class="row">
                <div class="col-md-4 vmiddle-pic">
                  <img src="/assets_frontend/images/product-policy-pic.png" class="img-fluid">
                </div>
                <div class="col-md-8 fnb-content">
                  <h3>Features:</h3>
                  <ul>
                    <li><b>Easy and quick loan processing</b>- Minimal documentation required to process a consumer finance loan. The purpose of a consumer finance loan could be to purchase washing machine, air conditioner, mobile phones, etc. </li>
                    <li><b>Shorter and flexible loan tenor</b>- Loan tenor could range anywhere between 3 months to 36 months depending on the schemes applicable by retailer/brand. Repay loans in monthly instalments for the product of your own choice.</li>
                    <li><b>Loan amount</b> – Ranges between Rs.5,000 to Rs.5,00,000</li>
                    <li><b>EMI card</b>- Avail a virtual EMI card which can be used across various retailers to purchase digital/non-digital products at any given point of time. </li>

                  </ul>
                  <h3>Benefits:</h3>
                  <ul>
                    <li><b>No extra cost EMI</b> – You can avail a consumer finance loan at a no extra cost EMI at no extra cost.</li>
                    <li><b>Low Cost EMI </b>– Customer Interest Bearing EMI with Longer Tenures</li>
                    <li><b>Instant loan approval</b>- Walk up to any of the retail stores to check your eligible loan amount and then you can proceed to purchase products of your own choice. </li>
                    <li><b>Minimal documentation</b> – Submit minimal documentation to avail a consumer finance loan. </li>
                    <li><b>Wide varieties of schemes</b>- Our brand affiliates have irresistible offers and schemes exclusively for you to choose from.</li>
                  </ul>
                </div>
              </div>',
                'created_at'=>now(),
                'updated_at'=>now()
              ),
              array(
                  'id'=>17,
                  'loan_product_id' => 4,
                  'name' => 'Customer Journey',
                  'content_data'=>'<div class="row">
                  <div class="col-md-4 vmiddle-pic">
                    <img src="/assets_frontend/images/customer-journey-pic.png" class="img-fluid">
                  </div>
                  <div class="col-md-8 journey-content">
                    <div class="row">
                      <div class="col-md-4 col">
                        <div class="journey-box">
                          <div class="head"><h3>1. Customer on-boarding</h3></div>
                          <div class="content"><p>SO performs a quick DDE of a customer at a CPF retail store and collects and uploads relevant documents</p></div>
                        </div>
                      </div>
                      <div class="col-md-4 col">
                        <div class="journey-box">
                          <div class="head"><h3>2. Credit underwriting</h3></div>
                          <div class="content"><p>Underwriting is performed by an automated/manual underwriting</p></div>
                        </div>
                      </div>
                      <div class="col-md-4 col">
                        <div class="journey-box">
                          <div class="head"><h3>3. Sanction</h3></div>
                          <div class="content"><p>Acceptance of sanctioned terms and conditions by customer</p></div>
                        </div>
                      </div>
                      <div class="col-md-4 col">
                        <div class="journey-box">
                          <div class="head"><h3>4. Disbursement</h3></div>
                          <div class="content"><p>Disbursement of loan</p></div>
                        </div>
                      </div>

                    </div>
                  </div>
                </div>',
                  'created_at'=>now(),
                  'updated_at'=>now()
              ),
              array(
                  'id'=>18,
                  'loan_product_id' => 4,
                  'name' => 'Product FAQ',
                  'content_data'=>'<div class="accordion-sec">
                  <div class="set">
                    <a href="javascript:void(0)" class="active" >What is the eligibility criteria?</a>
                    <div class="content" style="display: block;">
                      <p>To be eligible for a Consumer Finance loan, minimum age of 18 years and maximum of 60 yrs is applicable.</p>
                    </div>
                  </div>
                  <div class="set">
                  <a href="javascript:void(0)">What is the loan amount</a>
                  <div class="content">
                    <table  class="table table-bordered table-custome-style">
                      <tr>
                        <th>&nbsp;</th>
                        <th>Digital Products</th>
                        <th>Non-Digital Products</th>
                        <th>Lifestyle Products: Furniture</th>
                        <th>Lifestyle Products: Non-Furniture</th>
                        <th>Invoice Financing</th>
                      </tr>
                      <tr>
                        <th>Maximum</th>
                        <td>Rs.5,000</td>
                        <td>Rs.5,000</td>
                        <td>Rs.10,000</td>
                        <td>Rs.2,000</td>
                        <td>Rs.2,000</td>
                      </tr>
                      <tr>
                        <th>Minimum</th>
                        <td>Rs.2,00,000</td>
                        <td>Rs.5,00,000</td>
                        <td>Rs.10,00,00</td>
                        <td>Rs.2,00,000</td>
                        <td>Rs.10,00,000</td>
                      </tr>
                      <tr>
                        <th>Approximate average ticket size</th>
                        <td>Rs.16,000</td>
                        <td>Rs.25,000</td>
                        <td>Rs.35,000</td>
                        <td>Rs.13,000</td>
                        <td>Rs.25,000</td>
                      </tr>
                    </table>
                  </div>
                </div>
                <div class="set">
                <a href="javascript:void(0)">What is the loan tenor? </a>
                <div class="content">
                  <table  class="table table-bordered table-custome-style">
                    <tr>
                      <th>&nbsp;</th>
                      <th>Digital Products</th>
                      <th>Non-Digital Products</th>
                      <th>Lifestyle Products: Furniture</th>
                      <th>Lifestyle Products: Non-Furniture</th>
                      <th>Invoice Financing</th>
                    </tr>
                    <tr>
                      <th>Maximum</th>
                      <td>36</td>
                      <td>36</td>
                      <td>36</td>
                      <td>36</td>
                      <td>36</td>
                    </tr>

                    <tr>
                      <th>Appropriate average loan amount</th>
                      <td>9</td>
                      <td>12</td>
                      <td>18</td>
                      <td>6</td>
                      <td>6</td>
                    </tr>
                  </table>
                </div>
              </div>
                  <div class="set">
                    <a href="javascript:void(0)">What is a low cost/no cost EMI?</a>
                    <div class="content">
                      <p> Low cost/No cost EMI helps you to convert the price of your product into interest free EMI’s. For Instance, if your product price is Rs.50,000 on a ‘No Cost EMI’ for a tenor of 10 months, then you will pay Rs.5,000 only across next 10 months.</p>
                    </div>
                  </div>
                  <div class="set">
                    <a href="javascript:void(0)">What are the documents to be submitted to process loan?</a>
                    <div class="content">
                          • ID Proof:
                  - PAN card
                  - Aadhar card
                  - Voter ID
                  - Driving License
                  - Passport
              • Address Proof:
                  - Aadhar Card
                  - Voter ID
                  - Driving License
                  - Passport
                  - Utility bills (Rental agreement, electricity, Landline, mobile bill, credit card bills, LPG/PNG bills, and landline) shall be accepted as a proof of residence wherever applicable.
              • Income proof
                  - Salary Slips of last 3 months
                  - Bank statement of last 12 months
                  - ITR
                  - GST returns

                    </div>
                  </div>
                    <div class="set">
                    <a href="javascript:void(0)">Where can I review my EMI’s for the loan?</a>
                    <div class="content">
                      <p> You EMI’s can be viewed from Schedule of Charges available at our website. Kindly, enter your login credentials to access SOC.</p>
                    </div>
                  </div>
                 <div class="set">
                    <a href="javascript:void(0)">Is there any restriction on the number of products that I can select? </a>
                    <div class="content">
                      <p> No, there are no restriction on the number of products that can be financed however, we request you to not opt in for more than 2 similar products during the loan period.</p>
                    </div>
                  </div>
                  <div class="set">
                    <a href="javascript:void(0)">I want to make an EMI payment before due date, how can I do so?</a>
                    <div class="content">
                      <p>Login to our Axis Finance LTD website to initiate early/late payment. The option “Payment” is available on website home page. To login please keep your Loan account details ready. </p>
                    </div>
                </div>
                   <div class="set">
                    <a href="javascript:void(0)">How do I raise a request for No Objection Certificate (NOC)?</a>
                    <div class="content">
                      <p>NOC letter is issued to your registered personal email ID only once the loan has been completed. You can also check with your designated relationship manager to raise a request and for mailing of the copy or you can reach out to our customer support portal and raise the request. The NOC copy shall be emailed to your registered mailing address. </p>
                    </div>
                    </div>
               </div>



  ',
                  'created_at'=>now(),
                  'updated_at'=>now()
              ),
              array(
                  'id'=>19,
                  'loan_product_id' => 4,
                  'name' => 'Current Offers',
                  'content_data'=>'Download Current Offers Here',
                  'created_at'=>now(),
                  'updated_at'=>now()
              ),
              array(
                  'id'=>20,
                  'loan_product_id' => 4,
                  'name' => 'Document Checklist',
                  'content_data'=>'',
                  'created_at'=>now(),
                  'updated_at'=>now()
              ),

              array(
                'id'=>21,
                'loan_product_id' => 5,
                'name' => 'Product Policy',
                'content_data'=>'<div class="row">
                <div class="col-md-4 vmiddle-pic">
                  <img src="/assets_frontend/images/product-policy-pic.png" class="img-fluid">
                </div>
                <div class="col-md-8 fnb-content">
                  <h3>Features:</h3>
                  <ul>
                    <li><b>Short term loans</b>- As a customer you have the choice to opt in for a tenor of your own preference. Maximum period is 5 years, higher the loan tenor lower is EMI.  </li>
                    <li><b>Unsecured loan</b> – No collateral needs to be arranged to avail a Personal Loan</li>
                    <li><b>Documentation</b>- Get funds instantly into your Savings account by submitting minimal documentation</li>
                    <li><b>Multi-purpose loan</b> – Loan which can meet your expectations and aspirations. </li>

                  </ul>
                  <h3>Benefits:</h3>
                  <ul>
                    <li><b>Interest rates</b>- Best rates as compared in the market. Interest rates are fixed across the entire loan tenor.</li>
                    <li><b>TAT</b>- Faster and quicker TAT as compared to other loans</li>
                    <li><b>Purpose of Loan</b>- End use of loan is not monitored and can be used for any purposes. </li>
                    <li><b>Tax Benefits</b> up to Rs.2 Lacs under section 24B for the interest part in the FY; if personal loan is utilized for construction, renovation of house or making down payment for the house.</li>

                  </ul>
                </div>
              </div>',
                'created_at'=>now(),
                'updated_at'=>now()
              ),
              array(
                  'id'=>22,
                  'loan_product_id' => 5,
                  'name' => 'Customer Journey',
                  'content_data'=>'<div class="row">
                  <div class="col-md-4 vmiddle-pic">
                    <img src="/assets_frontend/images/customer-journey-pic.png" class="img-fluid">
                  </div>
                  <div class="col-md-8 journey-content">
                    <div class="row">
                      <div class="col-md-4 col">
                        <div class="journey-box">
                          <div class="head"><h3>1. Customer on-boarding</h3></div>
                          <div class="content"><p>Submits KYC (PAN card & Address proof) and demographic and income details </p></div>
                        </div>
                      </div>
                      <div class="col-md-4 col">
                        <div class="journey-box">
                          <div class="head"><h3>2. Credit underwriting</h3></div>
                          <div class="content"><p>Based on Customer Details Loan approval shall happen </p></div>
                        </div>
                      </div>
                      <div class="col-md-4 col">
                        <div class="journey-box">
                          <div class="head"><h3>3.Loan Sanction</h3></div>
                          <div class="content"><p>Based on Approval, Loan disbursement shall happen within a TAT of 48 hours</p></div>
                        </div>
                      </div>


                    </div>
                  </div>
                </div>',
                  'created_at'=>now(),
                  'updated_at'=>now()
              ),
              array(
                  'id'=>23,
                  'loan_product_id' => 5,
                  'name' => 'Product FAQ',
                  'content_data'=>'<div class="accordion-sec">
                  <div class="set">
                    <a href="javascript:void(0)" class="active" >What is an EMI?</a>
                    <div class="content" style="display: block;">
                      <p>Equated monthly instalments (EMI) comprises of Principal and Interest; which gives you an ease to repay back your loan in a smaller and convenient amount.</p>
                    </div>
                  </div>
                  <div class="set">
                    <a href="javascript:void(0)">How do I find my loan eligibility for Personal Loan?</a>
                    <div class="content">
                      <p>You can look at our Personal Loan eligibility calculator to evaluate your eligibility. For further more details please reach out to us at www.AxisFinance.com </p>
                    </div>
                  </div>
                  <div class="set">
                    <a href="javascript:void(0)">What is the minimum and maximum loan tenor to avail Personal Loan?</a>
                    <div class="content">
                      <p>Personal loan can be availed for a minimum duration of 12 months to a maximum of 60 months.</p>
                    </div>
                  </div>
                  <div class="set">
                    <a href="javascript:void(0)">What is the minimum and maximum loan amount to be availed?</a>
                    <div class="content">
                      <p> You can avail personal loan starting at Rs.15,000 and it can go up to Rs.15,00,000 depending on various eligibility criteria.</p>
                    </div>
                  </div>
                   <div class="set">
                    <a href="javascript:void(0)">What are the documents to be submitted for Personal Loan?</a>
                    <div class="content">
                      <p> To apply for Personal Loan with Axis Finance, please keep the following documents in place:</p><br>
			    • PAN Card <br>
			    • Identity proof (PAN card/Aadhar card/Driving License/Passport/Voter ID)<br>
			    • Address proof(Passport/Aadhar card/Driving License/Voter ID)<br>
			    • 3 latest copies of Salary Slip/Bank Stmt. (with salary credit) along with latest Form 16<br>

                    </div>
                  </div>
                 <div class="set">
                    <a href="javascript:void(0)">How do I repay my EMI’s?</a>
                    <div class="content">
                      <p> You can repay EMI’s through NACH facility towards your Savings Bank account.</p>
                    </div>
                  </div>
                  <div class="set">
                    <a href="javascript:void(0)">Can I foreclose/Part-pay towards my loan without baring any charges?</a>
                    <div class="content">
                      <p> No, there are foreclosure and part-payment charges applicable. To find out more about the charges please, click here (Schedule of Charges)</p>
                    </div>
                  </div>
                  <div class="set">
                    <a href="javascript:void(0)">Do I have to provide a security against Personal Loan availed?</a>
                    <div class="content">
                      <p>Personal Loans are collateral free (No security) loans.</p>
                    </div>
                  </div>
                 <div class="set">
                    <a href="javascript:void(0)">How do I receive the disbursed amount?</a>
                    <div class="content">
                      <p>Your approved loan amount will be automatically disbursed to your Savings account.</p>
                    </div>
                  </div>
                 <div class="set">
                    <a href="javascript:void(0)">What likely will be my EMI date?</a>
                    <div class="content">
                      <p>The repayment schedule for your Personal Loan availed will highlight the EMI date and the EMI amount which you would have to repay time to time every month.</p>
                    </div>
                  </div>
                 <div class="set">
                    <a href="javascript:void(0)">What happens if a customer misses the payment on due date?</a>
                    <div class="content">
                      <p>The customer needs to pay the EMI on the due date. Non-payment of EMI would impact, but will not be limited to:</p><br>
			    • Credit rating (reporting to Credit Information Companies (CICs))<br>
			    • The Bank may initiate recovery proceedings to recover the dues apart from the late payment charges<br>
			    • Penalty charges to be levied<br>

                    </div>
                  </div>
                  <div class="set">
                    <a href="javascript:void(0)">If I make a partial payment towards my Personal Loan will my EMI amount change?</a>
                    <div class="content">
                      <p>Yes, you can partially repay up to a maximum of 25% of the original loan disbursed amount per year. Partial prepayment can be initiated only after 12months of loan disbursal date (after 12 months of loan disbursal date for Balance Transfer cases); Any payment would attract prepayment charge on the amount prepaid or as per terms detailed in your Personal Loan agreement. Please (click here), for charges details.</p>
                    </div>
                  </div>
                  <div class="set">
                    <a href="javascript:void(0)">Are there any tax benefits that I can avail on my Personal Loan?</a>
                    <div class="content">
                      <p>No, there are no tax benefits with Personal Loan however if the loan is utilized towards Housing renovation and refurbishing; you may be eligible for income tax deduction under section 24 only for the interest and not principal.
</p>
                    </div>
                  </div>


              </div>',
                  'created_at'=>now(),
                  'updated_at'=>now()
              ),
              array(
                  'id'=>24,
                  'loan_product_id' => 5,
                  'name' => 'Current Offers',
                  'content_data'=>'Download Current Offers Here',
                  'created_at'=>now(),
                  'updated_at'=>now()
              ),
              array(
                  'id'=>25,
                  'loan_product_id' => 5,
                  'name' => 'Document Checklist',
                  'content_data'=>'',
                  'created_at'=>now(),
                  'updated_at'=>now()
              ),


        ));
    }
}
