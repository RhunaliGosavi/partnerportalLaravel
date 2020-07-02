<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator,Config, Helper, Excel;
use App\Employee;
use App\Imports\EmployeeImport;

class UserController extends Controller
{
    
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('users.index');
    }

    public function create() {
        return view('users.create');
    }

    public function store(Request $request) {
        $post = $request->all();

        $rules = [
            'user_type'      => 'required',
        ];

        if($request->has('user_type') && Config::get('constant')['user_types']['AFL_EMPLOYEE'] == $request->user_type) { 
            $rules['employee_id']    = 'required';
            $rules['pan_number']     = 'required';
            $rules['mobile_number']  = 'required|numeric|regex:/(^[1-9][0-9]*$)/';
        }

        $request->validate($rules);

        $helper = new Helper;
        $employeeExists = $helper->checkEmployee();

        if($employeeExists) {
            $panResponse = $helper->checkPAN();

            if($panResponse && array_key_exists('statusInfo', $panResponse) && 'SUCCESS' == $panResponse['statusInfo']['status']) {
                $result = $panResponse['response']['result'];

                $employee = new Employee;

                $employee->employee_id = $post['employee_id'];
                $employee->pan_number  = $post['pan_number'];
                $employee->mobile_number = $post['mobile_number'];
                $employee->name          = $result['name'];
                $employee->password      = bcrypt('test123');
                $employee->status        = 1;
                $employee->save();

                return redirect('users')->with('success', 'Employee created successfully!');
            }
        } else {
            return redirect('users')->with('error', 'Employee not created successfully!');
        }
    }

    public function fetchAFLEmployees(Request $request) {
        $post = $request->all();
        $list = [];

        $employees_count = Employee::count();

        if(array_key_exists('pagination', $post) && is_array($post['pagination']) && array_key_exists('page', $post['pagination']) && array_key_exists('perpage', $post['pagination']) && !empty($post['pagination']['perpage']) ) {
                
            $employees = Employee::limit($post['pagination']['perpage'])->offset(($post['pagination']['page'] -1) * $post['pagination']['perpage']);
            
            if(array_key_exists('sort', $post) && array_key_exists('field', $post['sort']) && array_key_exists('field', $post['sort'])) {
                $employees = $employees->orderBy($post['sort']['field'],$post['sort']['sort']);
            }
            $employees = $employees->get()->toArray();
        } else {
            $employees = Employee::get()->toArray();
        }

        $list['data'] = $employees;
        $list['meta'] = [
            "page"      => (array_key_exists('page', $post['pagination']))?$post['pagination']['page']:1,
            "pages"     => (array_key_exists('pages', $post['pagination']))?$post['pagination']['pages']:0,
            "perpage"   => (array_key_exists('perpage', $post['pagination'])) ? $post['pagination']['perpage']:50,
            "total"     => $employees_count,
            "sort"      => (array_key_exists('sort', $post)) ? $post['sort']['field']:'',
            "field"     => (array_key_exists('sort', $post)) ? $post['sort']['sort']:'',
        ];

        return json_encode($list);
    }

    public function updateEmployeeStatus(Request $request, $id) {
        $employee = Employee::find($id);

        if($employee) {
            if($employee->status == 1) {
                $employee->status = 0;
            } else {
                $employee->status = 1;
            }
            $employee->save();
            
            echo json_encode(['result' => true]);
        } else {
            echo json_encode(['result' => false]);
        }

        exit;
    }

    public function delete(Request $request, $id) {
        $employee = Employee::find($id);

        if($employee) {
            $employee->delete();
            
            return redirect('users')->with('success', 'Employee deleted successfully!');
        } else {
            return redirect('users')->with('error', 'Employee not deleted successfully!');
        }
    }

    public function importEmployees(Request $request) {
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
                        
                        Excel::import(new EmployeeImport, $file);   
                    } else {
                        return redirect()->back()->with('error', 'File format is invalid.');
                    }              
                }
            }
        }
        return redirect('users')->with('success', 'Excel file imported successfully.');
    }
}
