<?php

namespace App\Helpers;
use Adldap\Laravel\Facades\Adldap;

class Helper
{
    public function checkEmployee() {
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

    public function checkPAN() {
    	$ch = curl_init();

    	$header = [
    		'serviceCode' => 'IN0024KARPCA',
    		'callerIdentification' => 'PORTAL',
    		'authorizationKey' => 'UmEdeSnOtFNcOrMGz',
    		'trackingId' => uniqid(),
    		'referenceId' => uniqid(),
    		// "request" => [
	    	// 	"consent" => "<<Y/N>>",
	    	// 	'pan' => 'AXEPR2738K'
	    	// ]

    	];

    	$post = [
    		"request" => [
	    		"consent" => "<<Y/N>>",
	    		'pan' => 'AXEPR2738K'
	    	]
    	];

		curl_setopt($ch, CURLOPT_URL,"http://".env('BASE_PAN_URL')."/V1/Karza/IN0027/PanCardAuthentication");
		curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
		curl_setopt($ch, CURLOPT_POST, true);
		curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($post));

		// Receive server response ...
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

		$response = curl_exec($ch);
        $error    = curl_error($ch);
        $errno    = curl_errno($ch);

        if (is_resource($ch)) {
            curl_close($ch);
        }

        // if (0 !== $errno) {
        //     throw new \RuntimeException($error, $errno);
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

    public function checkBankAccount() {

    }
}