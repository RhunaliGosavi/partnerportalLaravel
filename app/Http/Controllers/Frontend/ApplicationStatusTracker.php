<?php

namespace App\Http\Controllers\Frontend;

use App\Helpers\ApplicationStatusTrackerHelper;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ApplicationStatusTracker extends Controller
{
    public function index() {

    	return view('frontend.application_status_tracker.index');
	}

	public function getAppStatus(Request $request){
	
		$rules = [
			'appId'		=> 'required_without:appName ',
			'appName'   => 'required_without:appId|alpha ',
			'datepicker' => 'required',
			'MobNum' => 'required',
			
		];

		$messages = [
			'datepicker.required' => 'Please select date of birth',
			'MobNum.required' => 'Please select mobile number',
			'appId.required_without' => 'The application id  is required when applican\'t name is not present.',
			'appName.required_without' => ' The applican\'t name  is required when application id is not present.',
			'appName.alpha' => ' Enter valid  applican\'t name  .',
		];
		$request->validate($rules, $messages);
       
		$appId=$request->input('appId');
		$appName=$request->input('appName');
		$dob=$request->input('datepicker');
		$MobNum=$request->input('MobNum');

		$appStatus=new ApplicationStatusTrackerHelper();
		$response=$appStatus->getApplicationStatus($appId,$appName,$dob,$MobNum);
	
		return json_encode($response);
		

	}

}
