<?php

namespace App\Helpers;
use Adldap\Laravel\Facades\Adldap;

class Helper
{
    public function checkEmployee() {
    	// Construct new Adldap instance.
		$ad = new \Adldap\Adldap();

		// Create a configuration array.
		$config = [  
		  // An array of your LDAP hosts. You can use either
		  // the host name or the IP address of your host.
		  'hosts'    => ['10.9.0.254'],

		  // The base distinguished name of your domain to perform searches upon.
		  'base_dn'  => 'dc=uataxisb,dc=com',

		  // The account to use for querying / modifying LDAP records. This
		  // does not need to be an admin account. This can also
		  // be a full distinguished name of the user account.
		  'username' => 'afl067@uataxisb.com',
		  'password' => 'India@2019',
		];

		// Add a connection provider to Adldap.
		$ad->addProvider($config);

		try {
		    // If a successful connection is made to your server, the provider will be returned.
		    $provider = $ad->connect();

		    // Performing a query.
		    $results = $provider->search()->where('cn', '=', 'Deepak Mehta')->get();

		    // Finding a record.
		    $user = $provider->search()->find('Deepak');

		    // Creating a new LDAP entry. You can pass in attributes into the make methods.
		    $user =  $provider->make()->user([
		        'cn'          => 'John Doe',
		        'title'       => 'Accountant',
		        'description' => 'User Account',
		    ]);

		    // Setting a model's attribute.
		    $user->cn = 'John Doe';

		    // Saving the changes to your LDAP server.
		    if ($user->save()) {
		        // User was saved!
		    }
		} catch (\Adldap\Auth\BindException $e) {

		    // There was an issue binding / connecting to the server.
		}
    }

    public function checkPAN() {

    }

    public function checkBankAccount() {

    }
}