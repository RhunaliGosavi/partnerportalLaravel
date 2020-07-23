<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Helper;

class VerifyDetailsController extends Controller
{
    public function panVerify(Request $request) {
        $rules = [
            'pan_number'    => 'required'
		];
        $request->validate($rules);
        $helper = new Helper;
        $panResponse = $helper->checkPAN($request->pan_number);
        if($panResponse && array_key_exists('statusInfo', $panResponse) && 'SUCCESS' == $panResponse['statusInfo']['status']) {
            $panResponse = $panResponse['statusInfo'];
            return json_encode($panResponse);
        } else {
            $panResponse = [
        		"status" =>"ERROR"
            ];
            return json_encode($panResponse);
        }
    }

    public function bankAccountVerify(Request $request) {
        $rules = [
            'bank_acc_number' => 'required',
			'ifsc_code'   => 'required'
		];
        $request->validate($rules);
        $helper = new Helper;
        $bankResponse = $helper->checkBankAccount($request->bank_acc_number, $request->ifsc_code);
        if($bankResponse && array_key_exists('statusInfo', $bankResponse) && 'SUCCESS' == $bankResponse['statusInfo']['status']) {
            $bankResponse = $bankResponse['statusInfo'];
            return json_encode($bankResponse);
        } else {
            $bankResponse = [
        		"status" =>"ERROR"
            ];
            return json_encode($bankResponse);
        }
    }

    public function gstNumberVerify(Request $request) {
        $rules = [
            'gst_number' => 'required'
		];
        $request->validate($rules);
        $helper = new Helper;
        $gstResponse = $helper->checkGSTNumber($request->gst_number);
        if($gstResponse && array_key_exists('statusInfo', $gstResponse) && 'SUCCESS' == $gstResponse['statusInfo']['status']) {
            $gstResponse = $gstResponse['statusInfo'];
            return json_encode($gstResponse);
        } else {
            $gstResponse = [
        		"status" =>"ERROR"
            ];
            return json_encode($gstResponse);
        }
    }
}
