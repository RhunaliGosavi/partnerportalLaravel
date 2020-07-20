<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\EmployeeHelpdesk;

class EmployeeHelpDeskController extends Controller
{
    public function index() {
    	$data['helpdesks'] = EmployeeHelpdesk::get();

    	return view('frontend.employee_helpdesk.index', $data);
    }

    public function search(Request $request) {
    	$str = '';
    	if('' !== $request->term) {
    		$helpdesks = EmployeeHelpdesk::where('name','like','%'.$request->term.'%')->get();

    		if($helpdesks) {
    			foreach($helpdesks as $desk) {
    				$str .= '<tr><td>'.$desk->name.'</td><td>'.$desk->file_size_in_mb.'</td><td><a href="'.url("/storage/employee/helpdesk/upload/").'/'.$desk->file_path.'" target="_blank">View</a></td><td><a href="'.url("/storage/employee/helpdesk/upload/").'/'.$desk->file_path.'" download="'.$desk->file_path.'"><img src="'.url("/assets_frontend/images/down-arrow.png").'" alt="download" class="img-fluid"/></a></td></tr>';
    			}
    		}
    	} else {
    		$helpdesks = EmployeeHelpdesk::get();

    		if($helpdesks) {
    			foreach($helpdesks as $desk) {
    				$str .= '<tr><td>'.$desk->name.'</td><td>'.$desk->file_size_in_mb.'</td><td><a href="'.url("/storage/employee/helpdesk/upload/").'/'.$desk->file_path.'" target="_blank">View</a></td><td><a href="'.url("/storage/employee/helpdesk/upload/").'/'.$desk->file_path.'" download="'.$desk->file_path.'"><img src="'.url("/assets_frontend/images/down-arrow.png").'" alt="download" class="img-fluid"/></a></td></tr>';
    			}
    		}
    	}

    	echo $str;
    }
}
