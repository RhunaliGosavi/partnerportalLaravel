<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator, Helper, Excel;
use App\Imports\BankBranchImport;
use App\BankBranch;

class BankBranchController extends Controller
{
    public function index(){
        return view('bankBranch.index');   
    }

    public function import(Request $request) 
    {
        ini_set('memory_limit', -1);
        ini_set('max_execution_time', 0);
        // ini_set('max_input_time', 60);

        if ($request->method() == 'POST') {
            $requestData = $request->all();
            $validator = Validator::make($requestData, ['import_file' => 'required']);
            if ($validator->fails()) {
                return redirect()->back()->with('error', 'Excel file format invalid.');
            } else {
                if ($request->hasFile('import_file') && $request->file('import_file')->isValid()) {
                    $extensions = array("xls","xlsx");
                    $result = array($request->file('import_file')->getClientOriginalExtension());
                    if(in_array($result[0],$extensions)){
                        $file=$request->file('import_file');
                        Excel::import(new BankBranchImport, $file);   
                    } else {
                        return redirect()->back()->with('error', 'File format is invalid.');
                    }              
                }
            }
        }
        return redirect('banks')->with('success', 'Excel file imported successfully.');
    }

    public function destroy(Request $request, $id) 
    {
        $bankBranch = BankBranch::find($id);

        if($bankBranch) {
            $bankBranch->delete();
            
            return redirect('banks')->with('success', 'Record deleted successfully!');
        } else {
            return redirect('banks')->with('error', 'Record not deleted !');
        }
    }

    public function fetchAllRecords(Request $request) {
        $post = $request->all();
        $list = [];

        $query = BankBranch::query();
        if(isset($post['query']['generalSearch'])) {
            $query = $query->orWhere('ifsc', 'LIKE', "%" . $post['query']['generalSearch'] . "%")
                ->orWhere('bank', 'LIKE', "%" . $post['query']['generalSearch'] . "%")
                ->orWhere('branch', 'LIKE', "%" . $post['query']['generalSearch'] . "%")
                ->orWhere('address', 'LIKE', "%" . $post['query']['generalSearch'] . "%")
                ->orWhere('contact', 'LIKE', "%" . $post['query']['generalSearch'] . "%")
                ->orWhere('city', 'LIKE', "%" . $post['query']['generalSearch'] . "%")
                ->orWhere('district', 'LIKE', "%" . $post['query']['generalSearch'] . "%")
                ->orWhere('state', 'LIKE', "%" . $post['query']['generalSearch'] . "%");
        }
        $bank_branches = $query->get();
        $bank_branches_count = count($bank_branches);
        if(array_key_exists('pagination', $post) && is_array($post['pagination']) && array_key_exists('page', $post['pagination']) && array_key_exists('perpage', $post['pagination']) && !empty($post['pagination']['perpage']) ) {

            $bank_branches = $query->limit($post['pagination']['perpage'])->offset(($post['pagination']['page'] -1) * $post['pagination']['perpage']);
            if(array_key_exists('sort', $post) && array_key_exists('field', $post['sort']) && array_key_exists('field', $post['sort'])) {
                $bank_branches = $bank_branches->orderBy($post['sort']['field'],$post['sort']['sort']);
            }
            $bank_branches = $bank_branches->get()->toArray();
            $list['meta'] = [
                "page"      => (array_key_exists('page', $post['pagination']))?$post['pagination']['page']:1,
                "pages"     => (array_key_exists('pages', $post['pagination']))?$post['pagination']['pages']:0,
                "perpage"   => (array_key_exists('perpage', $post['pagination'])) ? $post['pagination']['perpage']:50,
                "total"     => $bank_branches_count,
                "sort"      => (array_key_exists('sort', $post)) ? $post['sort']['field']:'',
                "field"     => (array_key_exists('sort', $post)) ? $post['sort']['sort']:'',
            ];
        } else {
            $bank_branches = $bank_branches->toArray();
        }
        $list['data'] = $bank_branches;

        return json_encode($list);
    }

    public function getBankListByIfsc(Request $request) {
        $rules = [
			'ifsc_code'   => 'required'
        ];
        $request->validate($rules);
        $banks = BankBranch::select('id', 'bank','branch')->where('ifsc', $request->ifsc_code)->get();
        return $banks;
    }
}
