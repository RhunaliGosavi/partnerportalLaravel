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
use App\MarketingVisualCategory;
use App\CorporatePresentation;

class SalesKitController extends Controller
{
    public function index(Request $request) {
    	return view('frontend.salesKit.index', [
            'loan_products' => LoanProduct::all()
        ]);
    }

    public function fetchKitProducts(Request $request, $id) {
        return view('frontend.salesKit.products', [
            'products' => SalesKitProduct::with('loan_product')->where('loan_product_id', $id)->get(),
            'loan_products' => LoanProduct::find($id),
            'doc_check_categories' => DocumentChecklistCategory::all()
        ]);
    }

    public function fetchDocChecklistProduct(Request $request) {
        $checklistProducts = DocumentChecklistProduct::with(['sales_kit_product', 'document_checklist_category'])
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
    public function onScreenCalculator(){
        return view('frontend.salesKit.onScreenCalculator');

    }
    public function getPersonalLoan(Request $request){
        $monthlyIncome=$request->input('montly_income');
        $obligation=$request->input('Obligation');
        $loanTenure=$request->input('loan_tenure');
        $expectedROI=$request->input('rate_of_interest');

        $calPersonalLoanHelper=new calPersonalLoanHelper($monthlyIncome,$obligation,$loanTenure,$expectedROI);
        $result=$calPersonalLoanHelper->calculatePersonalLoan();
        dd($result);

    }

    public function getSelectedview(Request $request){
        $type=$request->input('type');
       switch ($type) {
            case 'personal_loan':
               $view=view('frontend.salesKit.personalLoanCalculator');
               break;
            case 'loan_against_property':
                $view=view('frontend.salesKit.loanAgainstProperty');
                break;
            case 'consumer_product_finance':
                $view=view('frontend.salesKit.consumerProductFinace');
                break;



       }
       return $view;

    }
    public function corporatepresentation() {
        $data['corporatepresentations'] = CorporatePresentation::get();

        return view('frontend.salesKit.CorporatePresentation', $data);
    }
}
