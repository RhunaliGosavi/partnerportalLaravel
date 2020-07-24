<?php

namespace App\Helpers;
use Adldap\Laravel\Facades\Adldap;
use Illuminate\Support\Facades\Storage;
use Image;

class Helper
{
    public function checkEmployee($employee_id) {
    	return true;
		$ad = new \Adldap\Adldap();

		$config = [  
		  'hosts'    => [env('LDAP_HOSTS')],
		  'base_dn'  => env('LDAP_BASE_DN'),
		  'username' => env('LDAP_USERNAME'),
		  'password' => env('LDAP_PASSWORD'),
		];

		$ad->addProvider($config);

		try {
		    $provider = $ad->connect();

		    // Performing a query.
		    $results = $provider->search()->where('sAMAccountName', '=', $employee_id)->get();

		    if($results) {
		    	return true;
		    } else {
		    	return false;
		    }
		} catch (\Adldap\Auth\BindException $e) {
			return false;
		}
    }

    public function checkPAN($pan_number) {
    	$ch = curl_init();

    	$header = [
    		'serviceCode' => 'IN0024KARPCA',
    		'callerIdentification' => 'PORTAL',
    		'authorizationKey' => 'UmEdeSnOtFNcOrMGz',
    		'trackingId' => uniqid(),
    		'referenceId' => uniqid(),
    	];

    	$post = [
    		"request" => [
	    		"consent" => "<<Y/N>>",
	    		'pan' => $pan_number
	    	]
    	];

		// curl_setopt($ch, CURLOPT_URL,env('BASE_PAN_URL'));
		// curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
		// curl_setopt($ch, CURLOPT_POST, true);
		// curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($post));

		// // Receive server response ...
		// curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

		// $response = curl_exec($ch);
		// $error    = curl_error($ch);
		// $errno    = curl_errno($ch);

		// if (is_resource($ch)) {
		// 	curl_close($ch);
		// }

		// if (0 !== $errno) {
		// 	throw new \RuntimeException($error, $errno);
		// }
        $testResponse = json_encode([
        	"statusInfo" => [
        		"status" =>"SUCCESS",
	            "statusCode" => "0000",
	            "statusText" => "Text",
        	],
        	"response" => [
        		"status-code" => 101,
		        "request_id" => "73cdbde2-80f7-11e7-8f0c-e7e769f70bd1",
		        "result" => [
		        "name" => "OMKAR MILIND SHIRHATTI"
		    	]
        	]
        ]);

        $response = json_decode($testResponse, true );
		

		return $response;		
    }

    public function checkBankAccount($bank_acc_number, $ifsc_code) {
		$ch = curl_init();

    	$header = [
    		'serviceCode' => 'IN0024KARBAV',
    		'callerIdentification' => 'INDUS',
    		'authorizationKey' => 'AD9E01A5DC7BEE2C2B828D208182A611',
    		'trackingId' => uniqid(),  //rand(1111111111,9999999999)
    	];

		$post = [
			"request" => [
				"consent" => "Y",
				"ifsc" => $ifsc_code,
				"accountNumber" => $bank_acc_number
			]
		];

		// curl_setopt($ch, CURLOPT_URL,env('BASE_BANK_URL'));
		// curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
		// curl_setopt($ch, CURLOPT_POST, true);
		// curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($post));

		// // Receive server response ...
		// curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

		// $response = curl_exec($ch);
		// $error    = curl_error($ch);
		// $errno    = curl_errno($ch);

		// if (is_resource($ch)) {
		// 	curl_close($ch);
		// }

		// if (0 !== $errno) {
		// 	throw new \RuntimeException($error, $errno);
		// }
        $testResponse = json_encode([
        	"statusInfo" => [
        		"status" =>"SUCCESS",
	            "statusCode" => "0000",
	            "statusText" => "Text",
        	],
        	"response" => [
        		"status-code" => 101,
		        "request_id" => "1e5a875e-e590-11e7-a842-373db1bff361",
		        "result" => [
					"bankTxnStatus" => true,
					"accountNumber" => "32XXXXXXXXX",
					"ifsc" => "SBINXXXXX",
					"accountName" => "Mr MD ZAFAR EQUBAL",
					"bankResponse" => "Transaction Successful"
		    	]
        	]
        ]);

        $response = json_decode($testResponse, true );
		

		return $response;
	}

	public function checkGSTNumber($gst_number) {
		$ch = curl_init();

    	$header = [
    		'serviceCode' => 'IN0159KARGST',
    		'callerIdentification' => 'INDUS',
    		'authorizationKey' => 'AD9E01A5DC7BEE2C2B828D208182A611',
    		'trackingId' => uniqid(),  //rand(1111111111,9999999999)
    	];

		$post = [
			"request" => [
				"gstin" => "27AAACR5055K1Z7"
			]
		];

		// curl_setopt($ch, CURLOPT_URL,env('BASE_GST_URL'));
		// curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
		// curl_setopt($ch, CURLOPT_POST, true);
		// curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($post));

		// // Receive server response ...
		// curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

		// $response = curl_exec($ch);
		// $error    = curl_error($ch);
		// $errno    = curl_errno($ch);

		// if (is_resource($ch)) {
		// 	curl_close($ch);
		// }

		// if (0 !== $errno) {
		// 	throw new \RuntimeException($error, $errno);
		// }
        $testResponse = json_encode([
        	"statusInfo" => [
        		"status" =>"SUCCESS",
	            "statusCode" => "0000",
	            "statusText" => "Text",
        	],
        	"response" => [
        		"statusCode" => 101,
		        "requestId" => "c77c8741-208f-11e9-9fb6-f954fdad8f0c",
		        "result" => [
					"mbr" => [],
					"canFlag" => "NA",
					"pradr" => [],
					"tradeNam" => "RELIANCE INDUSTRIES LIMITED",
					"sts" => "Active",
					"gstin" => "27AAACR5055K1Z7",
					"lgnm" => "RELIANCE INDUSTRIES LIMITED",
		    	]
        	]
        ]);

        $response = json_decode($testResponse, true );
		

		return $response;
	}
	
	public function upload_image($images, $path, $type)
    {
		// if($type === 'update') 
        // {
        //     $files = Storage::allFiles('public/'.$path);
        //     Storage::delete($files);
        // }
        foreach($images as $img){
            $src = $img->getAttribute('src');
            if(preg_match('/data:image/', $src)){ 
                preg_match('/data:image\/(?<mime>.*?)\;/', $src, $groups);
                $mimetype = $groups['mime'];  
                $filename = uniqid().'_'.time().'.'.$mimetype;
                $filepath = $path."/".$filename;
                $image = Image::make($src)
                    // ->resize(300, 200)
                    ->encode($mimetype, 100);
                Storage::put('public/'.$filepath, $image->__toString());
                $url = Storage::url($filepath);
                $new_src = asset($url);
                $img->removeAttribute('src');
                $img->setAttribute('src', $new_src);
            }
        }
        return $images;
    }
}