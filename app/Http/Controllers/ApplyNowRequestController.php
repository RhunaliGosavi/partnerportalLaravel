<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Excel;
use App\HrLoan;
use App\OtherLoan;
use App\Exports\HRLoanExport;
use App\Exports\OtherLoanExport;

class ApplyNowRequestController extends Controller
{
	public function index() {
		return view('apply_now_request.index');
	}

	public function fetchHrLoans(Request $request) {
		$post = $request->all();
        $list = [];

        $hr_loan_count = HrLoan::count();
        if(array_key_exists('pagination', $post) && is_array($post['pagination']) && array_key_exists('page', $post['pagination']) && array_key_exists('perpage', $post['pagination']) && !empty($post['pagination']['perpage']) ) {
                
            $hr_loans = HrLoan::with('employee')->limit($post['pagination']['perpage'])->offset(($post['pagination']['page'] -1) * $post['pagination']['perpage']);
            
            if(array_key_exists('sort', $post) && array_key_exists('field', $post['sort']) && array_key_exists('field', $post['sort'])) {
                $hr_loans = $hr_loans->orderBy($post['sort']['field'],$post['sort']['sort']);
            }
            $hr_loans = $hr_loans->get()->toArray();
        } else {
            $hr_loans = HrLoan::with('employee')->get()->toArray();
        }

        $list['data'] = $hr_loans;
        $list['meta'] = [
            "page"      => (array_key_exists('page', $post['pagination']))?$post['pagination']['page']:1,
            "pages"     => (array_key_exists('pages', $post['pagination']))?$post['pagination']['pages']:0,
            "perpage"   => (array_key_exists('perpage', $post['pagination'])) ? $post['pagination']['perpage']:50,
            "total"     => $hr_loan_count,
            "sort"      => (array_key_exists('sort', $post)) ? $post['sort']['field']:'',
            "field"     => (array_key_exists('sort', $post)) ? $post['sort']['sort']:'',
        ];

        return json_encode($list);
	}

	public function fetchOtherLoans(Request $request) {
		$post = $request->all();
        $list = [];

        $other_loan_count = OtherLoan::count();
        if(array_key_exists('pagination', $post) && is_array($post['pagination']) && array_key_exists('page', $post['pagination']) && array_key_exists('perpage', $post['pagination']) && !empty($post['pagination']['perpage']) ) {
                
            $other_loans = OtherLoan::with('loan_product')->with('employee')->limit($post['pagination']['perpage'])->offset(($post['pagination']['page'] -1) * $post['pagination']['perpage']);
            
            if(array_key_exists('sort', $post) && array_key_exists('field', $post['sort']) && array_key_exists('field', $post['sort'])) {
                $other_loans = $other_loans->orderBy($post['sort']['field'],$post['sort']['sort']);
            }
            $other_loans = $other_loans->get()->toArray();
        } else {
            $other_loans = OtherLoan::with('loan_product')->with('employee')->get()->toArray();
        }

        $list['data'] = $other_loans;
        $list['meta'] = [
            "page"      => (array_key_exists('page', $post['pagination']))?$post['pagination']['page']:1,
            "pages"     => (array_key_exists('pages', $post['pagination']))?$post['pagination']['pages']:0,
            "perpage"   => (array_key_exists('perpage', $post['pagination'])) ? $post['pagination']['perpage']:50,
            "total"     => $other_loan_count,
            "sort"      => (array_key_exists('sort', $post)) ? $post['sort']['field']:'',
            "field"     => (array_key_exists('sort', $post)) ? $post['sort']['sort']:'',
        ];

        return json_encode($list);
	}

	public function HRexport() {
    	return Excel::download(new HRLoanExport, 'hr_loan.xlsx');
	}

	public function Otherexport() {
    	return Excel::download(new OtherLoanExport, 'other_loan.xlsx');
	}
}