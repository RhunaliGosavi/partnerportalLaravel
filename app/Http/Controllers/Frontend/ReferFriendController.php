<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\LoanProduct;
use App\ReferBuddy;
use Auth;

class ReferFriendController extends Controller
{
    public function index() {
    	$data['loan_products'] = LoanProduct::get();
    	return view('frontend.refer_friend.index', $data);
	}

	public function store(Request $request) {
		
		$rules = [
			'name' 			=> 'required',
			'mobile_number' => 'required',
			'email' 		=> 'required',
			'loan_product_id' 		=> 'required',
			'loan_amount' 			=> 'required',
			'prefered_contact_time' => 'required',
		];

		$messages = [
			'loan_product_id.required' => 'Please select loan product'
		];
		$request->validate($rules, $messages);

		$refer = new ReferBuddy;
		$refer->name 			= $request->name;
		$refer->mobile_number  	= $request->mobile_number;
		$refer->email 			= $request->email;
		$refer->loan_product_id = $request->loan_product_id;
		$refer->loan_amount 	= $request->loan_amount;
		$refer->prefered_contact_time = date('Y-m-d H:i:s',strtotime($request->prefered_contact_time));
		$refer->source_user_id  = Auth::user()->id;
		$refer->save();

		return redirect('refer_friend')->with('success','Refer friend added successfully.');
	}
}
