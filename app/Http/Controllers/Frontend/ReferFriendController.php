<?php

namespace App\Http\Controllers\Frontend;

use App\Exports\ReferFriendExport;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\LoanProduct;
use App\ReferBuddy;
use Auth;
use Mail;
use Maatwebsite\Excel\Excel as BaseExcel;
use Maatwebsite\Excel\Facades\Excel;
use Config;

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
         //$to_mail='rhuna0606@gmail.com';
         $raw= Excel::raw(new ReferFriendExport($refer->id), BaseExcel::XLSX) ;
         $data = array('name'=>"");
         Mail::send('frontend.apply_now_requests.ApplyNowMail', $data, function($message) use($raw,$to_mail,$fileName) {

             $message->to($to_mail, 'Axis Bank')->subject
                ('Refer Your  Friend Lead Details');
             $message->from('axisBnak@gmail.com','Axis Bank');
             $message->attachData($raw, $fileName.'.xlsx');
          });
        /******Rhuna : send mail*****/
		return redirect('refer/friend')->with('success','Refer friend added successfully.');
	}
}
