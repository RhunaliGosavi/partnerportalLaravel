<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\LoanProduct;
use App\HrLoan;
use App\OtherLoan;
use Auth;

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
			'loan_product_id' 		=> 'required',
			'loan_amount' 			=> 'required',
			'prefered_contact_time' => 'required',
		];

		$messages = [
			'loan_product_id.required' => 'Please select loan product'
		];
		$request->validate($rules, $messages);
		if(1 == $request->loan_type) {
			$loan = new HrLoan;
		} else {
			$loan = new OtherLoan;
			$loan->loan_product_id  = $request->loan_product_id;
		}
		$loan->employee_id      = $request->employee_id;
		$loan->name 			= $request->name;
		$loan->mobile_number  	= $request->mobile_number;
		$loan->loan_amount 	    = $request->loan_amount;
		$loan->prefered_contact_time = date('Y-m-d H:i:s',strtotime($request->prefered_contact_time));
		$loan->source_user_id  = Auth::user()->id;
		$loan->save();

		return redirect('apply_now')->with('success','Request added successfully.');
	}
}
