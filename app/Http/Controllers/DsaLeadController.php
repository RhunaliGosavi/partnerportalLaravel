<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator,Config, Helper, Excel;
use App\Imports\DsaLeadImport;
use App\DsaLead;
use App\Employee;

class DsaLeadController extends Controller
{
    public function index(){
        return view('dsa.leads.index');
    }

    public function fetchAllLeads(Request $request){
        $post = $request->all();
        $list = [];

        $query = DsaLead::with('employee');
        if(isset($post['query']['generalSearch'])) {
            $employees = Employee::select('id')->orWhere('name', 'LIKE', "%" . $post['query']['generalSearch'] . "%")->orWhere('employee_id', 'LIKE', "%" . $post['query']['generalSearch'] . "%")->get();
            if(count($employees) > 0){
                $search_Ids = [];
                foreach($employees as $employee){ array_push($employee_Ids, $employee->id); }
                $query = $query->whereIn('source_user_id', $search_Ids);
            }
            $query = $query->orWhere('name', 'LIKE', "%" . $post['query']['generalSearch'] . "%")
                ->orWhere('pan_number', 'LIKE', "%" . $post['query']['generalSearch'] . "%")
                ->orWhere('dob', 'LIKE', "%" . $post['query']['generalSearch'] . "%")
                ->orWhere('gender', 'LIKE', "%" . $post['query']['generalSearch'] . "%")
                ->orWhere('bank_name', 'LIKE', "%" . $post['query']['generalSearch'] . "%")
                ->orWhere('branch_name', 'LIKE', "%" . $post['query']['generalSearch'] . "%")
                ->orWhere('city', 'LIKE', "%" . $post['query']['generalSearch'] . "%")
                ->orWhere('state', 'LIKE', "%" . $post['query']['generalSearch'] . "%")
                ->orWhere('agency_name', 'LIKE', "%" . $post['query']['generalSearch'] . "%");
        }
        $dsaLeads = $query->get();
        $dsaLeads_count = count($dsaLeads);
        if(array_key_exists('pagination', $post) && is_array($post['pagination']) && array_key_exists('page', $post['pagination']) && array_key_exists('perpage', $post['pagination']) && !empty($post['pagination']['perpage']) ) {

            $dsaLeads = $query->limit($post['pagination']['perpage'])->offset(($post['pagination']['page'] -1) * $post['pagination']['perpage']);
            if(array_key_exists('sort', $post) && array_key_exists('field', $post['sort']) && array_key_exists('field', $post['sort'])) {
                $dsaLeads = $dsaLeads->orderBy($post['sort']['field'],$post['sort']['sort']);
            }
            $dsaLeads = $dsaLeads->get()->toArray();
            $list['meta'] = [
                "page"      => (array_key_exists('page', $post['pagination']))?$post['pagination']['page']:1,
                "pages"     => (array_key_exists('pages', $post['pagination']))?$post['pagination']['pages']:0,
                "perpage"   => (array_key_exists('perpage', $post['pagination'])) ? $post['pagination']['perpage']:50,
                "total"     => $dsaLeads_count,
                "sort"      => (array_key_exists('sort', $post)) ? $post['sort']['field']:'',
                "field"     => (array_key_exists('sort', $post)) ? $post['sort']['sort']:'',
            ];
        } else {
            $dsaLeads = $dsaLeads->toArray();
        }
        $list['data'] = $dsaLeads;

        return json_encode($list);
    }

    public function import(Request $request) 
    {
        ini_set('memory_limit', -1);
        ini_set('max_execution_time', 0);

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
                        
                        Excel::import(new DsaLeadImport, $file);   
                    } else {
                        return redirect()->back()->with('error', 'File format is invalid.');
                    }              
                }
            }
        }
        return redirect('dsaLead')->with('success', 'Excel file imported successfully.');
    }

    public function destroy(Request $request, $id) 
    {
        $employee = DsaLead::find($id);

        if($employee) {
            $employee->delete();
            
            return redirect('dsaLead')->with('success', 'DSA Lead record deleted successfully!');
        } else {
            return redirect('dsaLead')->with('error', 'DSA Lead record not deleted !');
        }
    }
}
