<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ApplicationStatusTracker extends Controller
{
    public function index() {

    	return view('frontend.application_status_tracker.index');
	}

}
