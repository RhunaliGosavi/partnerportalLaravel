<?php

namespace App\Helpers;
use Adldap\Laravel\Facades\Adldap;

class Helper
{
    public function checkEmployee() {
    	$search = Adldap::search()->where('sAMAccountName', '=', 'AFL067')->get();
    	return $search;
    }

    public function checkPAN() {

    }

    public function checkBankAccount() {

    }
}