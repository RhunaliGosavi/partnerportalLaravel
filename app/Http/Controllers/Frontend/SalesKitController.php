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

    public function addDSALead(Request $request) {
        $rules = [
			'bank_acc_number' => 'required',
			'ifsc_code'   => 'required',
            'bank_name'	=> 'required',
			'branch_name' => 'required',
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
            'city'          => 'required',
            'state'         => 'required',
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
            $extensions = array("pdf","doc","docx","png","jpeg","jpg");
            $result = array($request->file('address_proof_doc')->getClientOriginalExtension());
            if(in_array($result[0],$extensions)){
                $filenameWithExt = $request->file('address_proof_doc')->getClientOriginalName();
                $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                $extension = $request->file('address_proof_doc')->getClientOriginalExtension();
                $filename = preg_replace('/\s+/', '_',trim($filename));
                $file1NameToStore = $filename.'_'.time().'.'.$extension;
                $filesize=$request->file('address_proof_doc')->getSize();
                $filesize=number_format($filesize / 1048576,2);
                $request->file('address_proof_doc')->storeAs('public/sales/kit/dsaleadgenerate',$file1NameToStore);
            }else{
                return redirect()->back()->with('error', 'File format is invalid.');
            }
        }
        if($request->hasFile('pan_card_doc')){
            $extensions2 = array("pdf","doc","docx","png","jpeg","jpg");
            $result2 = array($request->file('pan_card_doc')->getClientOriginalExtension());
            if(in_array($result2[0],$extensions2)){
                $filenameWithExt2 = $request->file('pan_card_doc')->getClientOriginalName();
                $filename2 = pathinfo($filenameWithExt2, PATHINFO_FILENAME);
                $extension2 = $request->file('pan_card_doc')->getClientOriginalExtension();
                $filename2 = preg_replace('/\s+/', '_',trim($filename2));
                $file2NameToStore = $filename2.'_'.time().'.'.$extension2;
                $filesize2=$request->file('pan_card_doc')->getSize();
                $filesize2=number_format($filesize2 / 1048576,2);
                $request->file('pan_card_doc')->storeAs('public/sales/kit/dsaleadgenerate',$file2NameToStore);
            }else{
                return redirect()->back()->with('error', 'File format is invalid.');
            }
        }
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
        return redirect('sales/kit/dsaleadgeneration')->with('success','Lead added successfully.');
    }
}
