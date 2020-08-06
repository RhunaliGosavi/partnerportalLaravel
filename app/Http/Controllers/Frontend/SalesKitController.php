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
use App\DsaLead;
use App\Employee;
use Auth, Helper, Config;
use App\Helpers\calAreaConversionHelper;
use App\Helpers\calBalanceTransferHelper;
use App\Helpers\calCollectionIncentiveHelper;
use App\Helpers\calConsumerFinanceHelper;
use App\Helpers\calEmiHelper;
use App\Helpers\calLapIncentiveHelper;
use App\Helpers\calLoanAgainstPropertyHelper;
use App\Helpers\calPartPaymentHelper;
use App\Helpers\calRepricingHelper;
use Illuminate\Support\Facades\Mail;
use App\Mail\DsaLeadMail;

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
       // $calPersonalLoanHelper=new calPersonalLoanHelper(180000,9000,24,8,100000);
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
       // $calLoanAgainstProperty=new calLoanAgainstPropertyHelper(12,24,1000000,380000,10000000,5000000);
        $result=$calLoanAgainstProperty->calLoanAgainstPropert();
        return json_encode($result);

    }
    public function getConsumerProductFinance(Request $request){
        $roi=$request->input('interest');
        $loanTenure=$request->input('loan_tenure');
        $loanAmount=$request->input('loan_amount');
        $advancedEMI=$request->input('advance_emi');


        $calConsumerProductFinance=new calConsumerFinanceHelper($roi,$loanTenure,$loanAmount,$advancedEMI);
        //$calConsumerProductFinance=new calConsumerFinanceHelper(10,10,100000,5);
        $result=$calConsumerProductFinance->calculateConsumerFinance();
        return json_encode($result);

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
        //$calPartPayment=new calPartPaymentHelper(8000,18,24,300000,'revised emi');
        $result=$calPartPayment->calculatePartPayment();
        return json_encode($result);

    }

    public function getRepricing(Request $request){
        $type=$request->input('type');
        $existingOutstanding=$request->input('existing_outstanding');
        
        $proposedROI=$request->input('proposed_roi');
        $balanceTenure=$request->input('balance_tenure');
        $existingROI=$request->input('existing_roi');

         //$type: 1.part payment 2.change in emi  3.change in tenure
        $calRepricing=new calRepricingHelper($type,$existingOutstanding,$proposedROI,$balanceTenure,$existingROI);
       // $calRepricing=new calRepricingHelper('part payment',4500000,17,240,12);
        $result=$calRepricing->calculateRepricing();
        return json_encode($result);

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
       // $calBalanceTransfer=new calBalanceTransferHelper(2000000,15000,'existing_tenure_change_in_emi',13,180,17,120);
        $result=$calBalanceTransfer->calculateBalanceTransfer();
        return json_encode($result);

    }
    public function areaConversion(Request $request){
        $metrics=$request->input('metrics');
        $unit=$request->input('unit');

        $areaConversion=new calAreaConversionHelper($metrics,$unit);
        $result=$areaConversion->calculateArea();
        return json_encode($result);

    }
    public function emiCalculator(Request $request){
        $roi=$request->input('roi');
        $loanTenure=$request->input('loan_tenure');
        $loanAmount=$request->input('loan_amount');

        $calemi=new calEmiHelper($roi,$loanTenure,$loanAmount);
       // $calemi=new calEmiHelper(9.50,54,100000);
        $result=$calemi->calculateEMI();
       // dd($result);
       return json_encode($result);

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
        return json_encode($result);

    }
    public function getLapIncentive(Request $request){
        $disbursementAmt=$request->input('disbursementAmt');
        $role=$request->input('role');


        //$role: 1.sales officer 2.portfolio manager 3.area sales manager
        $calemi=new calLapIncentiveHelper($disbursementAmt,$role);
        $result=$calemi->calculateLapIncentive();
        return json_encode($result);

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

    public function addDSALead(Request $request) {
        $rules = [
			'bank_acc_number' => 'required',
			'ifsc_code'   => 'required',
            // 'bank_name'	=> 'required',
			// 'branch_name' => 'required',
			'upi_id' 		=> 'required',
			'name' 			=> 'required',
            'mobile_number' => 'required',
            'dob'           => 'required',
            'email'         => 'required',
            'gender'        => 'required',
            'pan_number'    => 'required',
            'address_type'  => 'required',
            'address_line1' => 'required',
            'address_line2' => 'required',
            'pincode'       => 'required',
            // 'city'          => 'required',
            // 'state'         => 'required',
            'agency_name'   => 'required',
            'gst_number'    => 'required',
            'official_email' => 'required',
            'official_mobile_number' => 'required',
            'address_proof_type' => 'required',
            'address_proof_doc' => 'required',
            'pan_card_doc'  => 'required',
            // 'file1'  => 'required',
            // 'file2'  => 'required',
		];

		$messages = [
			'bank_name.required' => 'Please select bank name',
			'branch_name.required' => 'Please select branch name',
			'bank_name.required' => 'Please select bank name',
        ];
        $request->validate($rules, $messages);
        $user = Auth::user();
        $file1NameToStore = NULL;
        $file2NameToStore = NULL;
        if($request->hasFile('address_proof_doc')){
            $file1NameToStore = $this->upload_file($request->file('address_proof_doc'));
            if($file1NameToStore == false) {
                return redirect()->back()->with('error', 'File format is invalid.');
            }
        }
        if($request->hasFile('pan_card_doc')){
            $file2NameToStore = $this->upload_file($request->file('pan_card_doc'));
            if($file2NameToStore == false) {
                return redirect()->back()->with('error', 'File format is invalid.');
            }
        }
        $documents = [
            'address_proof_doc' => $request->file('address_proof_doc'),
            'pan_card_doc' => $request->file('pan_card_doc')
        ];
        $request->validate($rules, $messages);
        $lead_generated_source = (Employee::find($user->id)) ? Config::get('constant')['user_types']['AFL_EMPLOYEE'] : Config::get('constant')['user_types']['BUSSINESS_PARTNER'];
        $dsaLead = new DsaLead;
        $dsaLead->source_user_id = $user->id;
        $dsaLead->lead_generated_source	 = $lead_generated_source;
        $dsaLead->name = $request->name;
        $dsaLead->dob = date('Y-m-d H:i:s',strtotime($request->dob));
        $dsaLead->gender = $request->gender;
        $dsaLead->pan_number = $request->pan_number;
        $dsaLead->mobile_number = $request->mobile_number;
        $dsaLead->email = $request->email;
        $dsaLead->bank_acc_number = $request->bank_acc_number;
        $dsaLead->ifsc_code = $request->ifsc_code;
        $dsaLead->bank_name = $request->bank_name;
        $dsaLead->branch_name = $request->branch_name;
        $dsaLead->upi_id = $request->upi_id;
        $dsaLead->address_type = $request->address_type;
        $dsaLead->address_line1 = $request->address_line1;
        $dsaLead->address_line2 = $request->address_line2;
        $dsaLead->pincode = $request->pincode;
        $dsaLead->city = $request->city;
        $dsaLead->state = $request->state;
        $dsaLead->agency_name = $request->agency_name;
        $dsaLead->gst_number = $request->gst_number;
        $dsaLead->office_mobile_number = $request->official_mobile_number;
        $dsaLead->office_email = $request->official_email;
        $dsaLead->address_proof_type = $request->address_proof_type;
        $dsaLead->address_proof_doc = $file1NameToStore;
        $dsaLead->pan_card_doc = $file2NameToStore;
        $dsaLead->save();
        Mail::to($dsaLead->email)->send(new DsaLeadMail($dsaLead, $documents));
        Mail::to(Config::get('constant')['email_group_Ids']['DSA_Empanelment'])->send(new DsaLeadMail($dsaLead, $documents));
        return view('frontend.salesKit.DsaLeadGeneration')->with('success', 'Lead added successfully.');
    }

    public function upload_file($file) {
        $extensions = array("pdf","doc","docx","png","jpeg","jpg");
        $result = array($file->getClientOriginalExtension());
        if(in_array($result[0],$extensions)){
            $filenameWithExt = $file->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $file->getClientOriginalExtension();
            $filename = preg_replace('/\s+/', '_',trim($filename));
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            $filesize=$file->getSize();
            $filesize=number_format($filesize / 1048576,2);
            $file->storeAs('public/sales/kit/dsaleadgenerate',$fileNameToStore);
            return $fileNameToStore;
        }else{
            return false;
        }
    }
}
