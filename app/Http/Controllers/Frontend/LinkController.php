<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\ImportantLink;

class LinkController extends Controller
{
    public function index() {
    	$data['links'] = ImportantLink::get();
    	
		return view('frontend.links.index', $data);
	}
}
