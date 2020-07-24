<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\LoanProduct;
use App\SalesKitProduct;
use App\DocumentChecklistCategory;
use App\DocumentChecklistProduct;
use App\DsaOnboarding;
use App\SalesContest;
use App\CustomerScheme;
use App\Helpers\calPersonalLoanHelper;
use App\CurrentOffer;
use App\MarketingVisualCategory;
use App\CorporatePresentation;
use App\Helpers\calAreaConversionHelper;
use App\Helpers\calBalanceTransferHelper;
use App\Helpers\calCollectionIncentiveHelper;
use App\Helpers\calConsumerFinanceHelper;
use App\Helpers\calEmiHelper;
use App\Helpers\calLapIncentiveHelper;
use App\Helpers\calLoanAgainstPropertyHelper;
use App\Helpers\calPartPaymentHelper;
use App\Helpers\calRepricingHelper;

class SalesKitController extends Controller
{
    public function index(Request $request) {
    	return view('frontend.salesKit.index', [
            'loan_products' => LoanProduct::all()
        ]);
    }

    public function fetchKitProducts(Request $request, $slug) {
        $loan_product = LoanProduct::where('slug', $slug)->first();
        return view('frontend.salesKit.products', [
            'products' => SalesKitProduct::with('loan_product')->where('loan_product_id', $loan_product->id)->get(),
            'loan_products' => $loan_product,
            'current_offers' => CurrentOffer::all(),
            'doc_check_categories' => DocumentChecklistCategory::all()
        ]);
    }

    public function fetchDocChecklistProduct(Request $request) {
        $checklistProducts = DocumentChecklistProduct::with(['document_checklist_category'])
            ->where('document_checklist_category_id', $request->id)->get();
        return ($checklistProducts);
    }
    public function DSAOnboarding(){

        return view('frontend.salesKit.DsaOnboarding', [
            'dsa_onboarding' => DsaOnboarding::all()
        ]);
    }

    public function DSALeadGeneration(Request $request) {
        return view('frontend.salesKit.DsaLeadGeneration');
    }

    public function fetchMarketingInformation(Request $request) {
        return view('frontend.salesKit.marketingInfo', [
            'loan_products' => LoanProduct::all(),
            'team_contests' => SalesContest::all(),
            'customer_schemes' => CustomerScheme::all(),
            'visual_categories' => MarketingVisualCategory::with('marketing_visual_category')->get()
        ]);
    }

    public function fetchTeamContests(Request $request) {
        $teamContests = SalesContest::where('loan_product_id', $request->id)->get();
        return ($teamContests);
    }

    public function fetchCustomerSchemes(Request $request) {
        $customerSchemes = CustomerScheme::where('loan_product_id', $request->id)->get();
        return ($customerSchemes);
    }

    public function fetchMarketingVisuals(Request $request) {
        $visuals = MarketingVisualCategory::with('marketing_visual_category')->where('loan_product_id', $request->id)->get();
        return ($visuals);
    }
    /******* eligibility calculators******/
    public function onScreenCalculator(){
        return view('frontend.salesKit.onScreenCalculator');

    }
    public function getPersonalLoan(Request $request){
        $monthlyIncome=$request->input('montly_income');
        $obligation=$request->input('Obligation');
        $loanTenure=$request->input('loan_tenure');
        $expectedROI=$request->input('rate_of_interest');
        $expectedLoanAmount=$request->input('expected_loan_amount');

        $calPersonalLoanHelper=new calPersonalLoanHelper($monthlyIncome,$obligation,$loanTenure,$expectedROI,$expectedLoanAmount);
        //$calPersonalLoanHelper=new calPersonalLoanHelper(180000,9000,24,8,100000);
        $result=$calPersonalLoanHelper->calculatePersonalLoan();
        return json_encode($result);

    }
    public function getLoanAgainstProperty(Request $request){
        $roi=$request->input('rate_of_interest');
        $loanTenure=$request->input('loan_tenure');
        $monthlyIncome=$request->input('montly_income');
        $monthlyObligation=$request->input('Obligation');
        $expectedLoanAmount=$request->input('expected_loan_amount');
        $propertyValue=$request->input('propery_value');

        $calLoanAgainstProperty=new calLoanAgainstPropertyHelper($roi,$loanTenure,$monthlyIncome,$monthlyObligation,$expectedLoanAmount,$propertyValue);
       // $calLoanAgainstProperty=new calLoanAgainstPropertyHelper(10,24,1000000,380000,10000000,5000000);
        $result=$calLoanAgainstProperty->calLoanAgainstPropert();
        return json_encode($result);

    }
    public function getConsumerProductFinance(Request $request){
        $roi=$request->input('interest');
        $loanTenure=$request->input('loan_tenure');
        $loanAmount=$request->input('loan_amount');
        $advancedEMI=$request->input('advance_emi');


        $calConsumerProductFinance=new calConsumerFinanceHelper($roi,$loanTenure,$loanAmount,$advancedEMI);
        $result=$calConsumerProductFinance->calculateConsumerFinance();
        dd($result);

    }
    /******common calculators******/
    public function getPartPayment(Request $request){
        $partPayment=$request->input('part_payment');
        $existingroi=$request->input('existing_roi');
        $existingTenure=$request->input('loan_tenure');
        $existingOutstanding=$request->input('outstanding');
        $type=$request->input('type');

         //$type: 1.existing emi 2.revised emi
        $calPartPayment=new calPartPaymentHelper($partPayment,$existingroi,$existingTenure,$existingOutstanding,$type);
        $result=$calPartPayment->calculatePartPayment();
        dd($result);

    }

    public function getRepricing(Request $request){
        $type=$request->input('type');
        $existingOutstanding=$request->input('existing_outstanding');
        $existingEMI=$request->input('existing_emi');
        $proposedROI=$request->input('proposed_roi');
        $balanceTenure=$request->input('balance_tenure');
        $existingROI=$request->input('existing_roi');

         //$type: 1.part payment 2.change in emi  3.change in tenure
        $calRepricing=new calRepricingHelper($type,$existingOutstanding,$existingEMI,$proposedROI,$balanceTenure,$existingROI);
        $result=$calRepricing->calculateRepricing();
        dd($result);

    }
    public function balanceTransfer(Request $request){
        $existingOutstanding=$request->input('existing_outstanding');
        $costOnBtRequest=$request->input('cost_of_bt_request');
        $preferenceType=$request->input('choose_your_preference');
        $existingRoi=$request->input('existing_roi');
        $proposedTenure=$request->input('choose_your_tenure');
        $proposedRoi=$request->input('proposed_roi');
        $balaceTenure=$request->input('balance_tenure');

         //preference:1.existing_emi_change_in_tenure 2.flexi_loan_tenure 3.existing_tenure_change_in_emi
        //proposedTenure:"Choose your Tenor

        $calBalanceTransfer=new calBalanceTransferHelper($existingOutstanding,$costOnBtRequest,$preferenceType,$existingRoi,$proposedTenure,$proposedRoi,$balaceTenure);
        $result=$calBalanceTransfer->calculateBalanceTransfer();
        dd($result);

    }
    public function areaConversion(Request $request){
        $metrics=$request->input('metrics');
        $unit=$request->input('unit');

        $areaConversion=new calAreaConversionHelper($metrics,$unit);
        $result=$areaConversion->calculateArea();
        dd($result);

    }
    public function emiCalculator(Request $request){
        $roi=$request->input('roi');
        $loanTenure=$request->input('loan_tenure');
        $loanAmount=$request->input('loan_amount');
        //$policyFOIR,$policyROI,$expectedROI in percentage
        $calemi=new calEmiHelper($roi,$loanTenure,$loanAmount);
        $result=$calemi->calculateEMI();
        dd($result);

    }
    /******Incentive calculator******** */

    public function getCollectionIncentive(Request $request){
        $type=$request->input('type');
        $emiCollect=$request->input('emiCollect');
        $noOfCases=$request->input('noOfCases');
        $bucketTYpe=$request->input('bucketTYpe');
        $rollback=$request->input('rollback');
        $posOd=$request->input('posOd');
        $posForOdCollected=$request->input('posForOdCollected');
        //$type: preference,pick up
        //$bucketTYpe: 1.bkt1,bkt2,bkt3,bkt4
        $calemi=new calCollectionIncentiveHelper($type,$emiCollect,$noOfCases,$bucketTYpe,$rollback,$posOd,$posForOdCollected);
        $result=$calemi->calculateCollectionIncentive();
        dd($result);

    }
    public function getLapIncentive(Request $request){
        $disbursementAmt=$request->input('disbursementAmt');
        $role=$request->input('role');


        //$role: 1.sales officer 2.portfolio manager 3.area sales manager
        $calemi=new calLapIncentiveHelper($disbursementAmt,$role);
        $result=$calemi->calculateLapIncentive();
        dd($result);

    }
    public function getSelectedview(Request $request){
        $type=$request->input('type');
       switch ($type) {
            case 'personal_loan':
               $view=view('frontend.salesKit.eligibilityCalculators.personalLoanCalculator');
               break;
            case 'loan_against_property':
                $view=view('frontend.salesKit.eligibilityCalculators.loanAgainstPropertyCalculator');
                break;
            case 'consumer_product_finance':
                $view=view('frontend.salesKit.eligibilityCalculators.consumerProductFinaceCalculator');
                break;
            case 'part_payment':
                $view=view('frontend.salesKit.commonCalculators.partPaymentCalculator');
                break;
            case 'repricing':
                $view=view('frontend.salesKit.commonCalculators.repricingCalculator');
                break;
            case 'balance_transfer':
                $view=view('frontend.salesKit.commonCalculators.balanceTransferCalculator');
                break;
            case 'area_conversion':
                $view=view('frontend.salesKit.commonCalculators.areaConversionCalculator');
                break;
            case 'emi':
                $view=view('frontend.salesKit.commonCalculators.emiCalculator');
                break;
            case 'collection_incentive':
                $view=view('frontend.salesKit.incentivecalculator.collectionIncentiveCalculator');
                break;
            case 'lap_incentive':
                $view=view('frontend.salesKit.incentivecalculator.lapIncentCalculator');
                break;




       }
       return $view;

    }
    public function corporatepresentation() {
        $data['corporatepresentations'] = CorporatePresentation::get();

        return view('frontend.salesKit.CorporatePresentation', $data);
    }
}
