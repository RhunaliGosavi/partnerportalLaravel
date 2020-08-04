<?php

namespace App\Http\Controllers\Frontend;

use App\Exports\HRLoanExport;
use App\Exports\OtherLoanExport;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\LoanProduct;
use App\HrLoan;
use App\OtherLoan;
use Auth;
use Mail;
use Maatwebsite\Excel\Excel as BaseExcel;
use Maatwebsite\Excel\Facades\Excel;
use Config;



class ApplyNowRequestController extends Controller
{
    public function index() {
    	$data['loan_products'] = LoanProduct::get();
    	return view('frontend.apply_now_requests.index', $data);
	}

	public function store(Request $request) {



		$rules = [
			'loan_type'		=> 'required',
			'employee_id'   => 'required',
			'name' 			=> 'required',
			'mobile_number' => 'required',
			// 'loan_product_id' 		=> 'required',
			'loan_amount' 			=> 'required',
			'prefered_contact_time' => 'required',
		];

		$messages = [
			'loan_product_id.required' => 'Please select loan product'
		];
		$request->validate($rules, $messages);
		if(1 == $request->loan_type) {
			$loan = new HrLoan;
            $loan->designation  = $request->designation;
            /******Rhuna : send mail*****/
            $to_mail= Config::get('constant')['APPLY_NOW_MAIL']['hr_loan'];
            $fileName='hr_loan';
            /******Rhuna : send mail*****/
		} else {
			$loan = new OtherLoan;
            $loan->loan_product_id  = $request->loan_product_id;
            /******Rhuna : send mail*****/
            switch ($request->loan_product_id) {
                case '1':
                    $to_mail= Config::get('constant')['APPLY_NOW_MAIL']['business_loan'];
                    $fileName='business_loan';
                    break;
                case '2':
                    $to_mail= Config::get('constant')['APPLY_NOW_MAIL']['loan_against_property'];
                    $fileName='loan_against_property';
                    break;
                case '3':
                    $to_mail= Config::get('constant')['APPLY_NOW_MAIL']['loan_against_securities'];
                    $fileName='loan_against_securities';
                    break;
                case '4':
                    $to_mail= Config::get('constant')['APPLY_NOW_MAIL']['consumer_product_finance'];
                    $fileName='consumer_product_finance';
                    break;
                case '5':
                    $to_mail= Config::get('constant')['APPLY_NOW_MAIL']['personal_loan'];
                    $fileName='personal_loan';
                    break;


            }
           /******Rhuna : send mail*****/
        }

		$loan->employee_id      = Auth::user()->employee_id;
		$loan->name 			= $request->name;
		$loan->mobile_number  	= $request->mobile_number;
		$loan->loan_amount 	    = $request->loan_amount;
		$loan->prefered_contact_time = date('Y-m-d H:i:s',strtotime($request->prefered_contact_time));
		$loan->source_user_id  = Auth::user()->id;
        $loan->save();
        /******Rhuna : send mail*****/
         //$to_mail='rhuna0606@gmail.com';
        $raw=(1 == $request->loan_type) ? Excel::raw(new HRLoanExport($loan->id), BaseExcel::XLSX) : Excel::raw(new OtherLoanExport($loan->id), BaseExcel::XLSX);
        $data = array('name'=>"");
        Mail::send('frontend.apply_now_requests.ApplyNowMail', $data, function($message) use($raw,$to_mail,$fileName) {

            $message->to($to_mail, 'Axis Bank')->subject
               ('Apply Now Lead Details');
            $message->from('axisBnak@gmail.com','Axis Bank');
            $message->attachData($raw, $fileName.'.xlsx');
         });
       /******Rhuna : send mail*****/
		return redirect('apply/now')->with('success','Request added successfully.');
	}
}
