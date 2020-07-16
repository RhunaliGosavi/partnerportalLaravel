<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index(Request $request) {
    	return view('frontend.login.index');
    }

    public function login(Request $request) {
    	$post = $request->all();
    	
    }
}
