<?php

namespace App\Helpers;

class ApplicationStatusTrackerHelper
{
    public function getApplicationStatus($applicationNo,$applicationName,$dob,$mobile){

        $ch = curl_init();
        $baseURL = env('BASE_URL', '');
        $serviceCode = env('SERVICE_CODE', '');
        $callerIdentification = env('CALLER_INDENTIFICATION', '');
        $authorizationKey = env('AUTHORIZATION_KEY', '');
        $trackingID = env('TRACKING_ID', uniqid());
        $referenceID = env('REFERENCE_ID', uniqid());


    	$header = [
            'Content-Type'=> 'application/json',
    		'serviceCode' => $serviceCode,
    		'callerIdentification' => $callerIdentification,
    		'authorizationKey' => $authorizationKey,
    		'trackingId' =>$trackingID,
    		'referenceId' =>  $referenceID,
        ];
        $date=date_create($dob);
        $dob= date_format($date,"d-m-y");

    	$post = [
    		"request" => [
	    		"APPLICATION_NO" => $applicationNo,
                'APPLICANT_NAME' => $applicationName,
                'DOB'=> $dob,
                'MOBILE'=>$mobile
	    	]
    	];


		curl_setopt($ch, CURLOPT_URL,$baseURL.'/V1/AFL/IN0147/StatusApi');
		 curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
		 curl_setopt($ch, CURLOPT_POST, true);
		 curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($post));//http_build_query($post)
         // Receive server response ...
		 curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
      	 $response = curl_exec($ch);
         $error    = curl_error($ch);
         $errno    = curl_errno($ch);
         if (is_resource($ch)) {
             curl_close($ch);
        }
       if (0 !== $errno) {
          throw new \RuntimeException($error, $errno);
        }


      /*  $response = json_encode([
        	"statusInfo" => [
        		"status" =>"SUCCESS",
	            "statusCode" => "0000",
	            "statusText" => "Successful Response received",
        	],
        	"response" => [
                "APPLICANT_NAME" => "AHA",
                "DOB"=>"19-10-19",
                "MOBILE"=>"9067543212",

		        "APPLICATION_DETAILS" => [
		            [
                        "STATUS"=> "DISBURSED",
                        "PRODUCT"=>"AH",
                        "APPLICATION_NO"=>"AHA00001233"
                    ] ,
                    [
                        "STATUS"=> "PARTIALLY DISBURSED",
                        "PRODUCT"=>"AP",
                        "APPLICATION_NO"=>"AHA00001230"
                    ]
		    	]
        	]
        ]);*/

       /*$response = json_encode([
        	"statusInfo" => [
                "status"=> "FAIL",
                "statusCode"=>"9000",
                "statusText"=> "Record Not Found"
              ],
        	"response" => [

        	]
        ]);*/


        $response = json_decode($response, true );
        $msg=$this->checkStatus($response['statusInfo']['statusCode']);
        if($response['statusInfo']['statusCode']!='0000'){
           $response['response']=$msg;
        }

		return $response;
    }

    public function checkStatus($status){
       switch ($status) {
            case '0000':
               $msg="Data fetched Successfully";
               break;
            case '1000':
                $msg="Authentication Failed";
            break;
            case '2000':
                $msg="Invalid Details";
                break;
            case '4000':
                $msg="Service is unavailable ,Please try after some time";
                break;

            case '5000':
                $msg="Service is unavailable ,Please try after some time";
                break;
            case '6000':
                $msg="Service is unavailable ,Please try after some time";
                break;
            case '8000':
                $msg="Service is unavailable ,Please try after some time";
                break;
            case '9000':
                $msg="Something went wrong , Please try after some time";
                break;

       }

       return $msg;

    }

}
