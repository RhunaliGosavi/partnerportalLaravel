<?php

namespace App\Http\Controllers\EmployeeDashboard;


use App\EmployeeDashboard\EmployeeDashboard;
use App\Http\Controllers\Controller;
use App\Imports\ApplicationDetailsImport;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Facades\Excel;

class EmployeeDashboardController extends Controller
{
    public function get_employee_application_list(){
        return view('EmployeeDashboard.employeeApplicationList');
        
    }

    public function fetch_employee_app_data(Request $request){
        $post = $request->all();
        $list = [];

        $employees_app_count =EmployeeDashboard::count();
     
        $employee_app =EmployeeDashboard::query();
        if(isset($post['query']['generalSearch'])) {
          
            $employee_app = $employee_app->where('employee_name', 'LIKE', "%" . $post['query']['generalSearch'] . "%")
            ->orWhere('application_number', 'LIKE', "%" . $post['query']['generalSearch'] . "%")
            ->orWhere('employee_id', 'LIKE', "%" . $post['query']['generalSearch'] . "%")
            ->orWhere('product_type', 'LIKE', "%" . $post['query']['generalSearch'] . "%")
            ->orWhere('application_status', 'LIKE', "%" . $post['query']['generalSearch'] . "%");
            $employees_app_count=count($employee_app->get()->toArray());
        }

        if(array_key_exists('pagination', $post) && is_array($post['pagination']) && array_key_exists('page', $post['pagination']) && array_key_exists('perpage', $post['pagination']) && !empty($post['pagination']['perpage']) ) {
                
            $employee_app = $employee_app->limit($post['pagination']['perpage'])->offset(($post['pagination']['page'] -1) * $post['pagination']['perpage']);
            if(array_key_exists('sort', $post) && array_key_exists('field', $post['sort']) && array_key_exists('field', $post['sort'])) {
                $employee_app = $employee_app->orderBy($post['sort']['field'],$post['sort']['sort']);
            }
        
           $employee_app = $employee_app->get()->toArray();
          
        } else {
            $employee_app = $employee_app->get()->toArray();
        }
      

        $list['data'] = $employee_app;
        $list['meta'] = [
            "page"      => (array_key_exists('page', $post['pagination']))?$post['pagination']['page']:1,
            "pages"     => (array_key_exists('pages', $post['pagination']))?$post['pagination']['pages']:0,
            "perpage"   => (array_key_exists('perpage', $post['pagination'])) ? $post['pagination']['perpage']:50,
            "total"     => $employees_app_count,
            "sort"      => (array_key_exists('sort', $post)) ? $post['sort']['field']:'',
            "field"     => (array_key_exists('sort', $post)) ? $post['sort']['sort']:'',
        ];

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
                return redirect()->back()->with('error', 'Please Select File');
            }else{

                if ($request->hasFile('import_file') && $request->file('import_file')->isValid()) {
                    $extensions = array("xls","xlsx");
                    $result = array($request->file('import_file')->getClientOriginalExtension());

                    if(in_array($result[0],$extensions)){
                        $file=$request->file('import_file');
                         Excel::import(new ApplicationDetailsImport,$file);  
                    } else {
                        return redirect()->back()->with('error', 'File format is invalid.');
                    }              
                }
              
            }
        }
        return redirect('employee-dashboard')->with('success', 'Excel file imported successfully.');
    }

    public function delete(Request $request, $id) {
        $employee = EmployeeDashboard::find($id);

        if($employee) {
            $employee->delete();
            
            return redirect('employee-dashboard')->with('success', 'Employee Application record deleted successfully!');
        } else {
            return redirect('employee-dashboard')->with('error', 'Employee Application record not deleted !');
        }
    }

}
