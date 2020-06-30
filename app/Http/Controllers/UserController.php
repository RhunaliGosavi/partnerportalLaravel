<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator,Config, Helper;
use App\Employee;

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

        if(array_key_exists('datatable', $post) && is_array($post['datatable']) && array_key_exists('pagination', $post['datatable']) && is_array($post['datatable']['pagination']) && array_key_exists('page', $post['datatable']['pagination']) && array_key_exists('perpage', $post['datatable']['pagination']) && !empty($post['datatable']['pagination']['perpage']) ) {
                
            $employees = Employee::limit($post['datatable']['pagination']['perpage'])->offset(($post['datatable']['pagination']['page'] -1) * $post['datatable']['pagination']['perpage'])->get()->toArray();
        } else {
            $employees = Employee::get()->toArray();
        }

        $list['data'] = $employees;
        $list['meta'] = [
            "page"      => (array_key_exists('datatable', $post) && is_array($post['datatable']) && array_key_exists('page', $post['datatable']['pagination']))?$post['datatable']['pagination']['page']:1,
            "pages"     => (array_key_exists('datatable', $post) && is_array($post['datatable']) && array_key_exists('pages', $post['datatable']['pagination']))?$post['datatable']['pagination']['pages']:0,
            "perpage"   => (array_key_exists('input', $list)) ? $list['input']['datatable']['pagination']['perpage']:50,
            "total"     => $employees_count,
            "sort"      => (array_key_exists('input', $list) && array_key_exists('sort', $list['input']['datatable'])) ? $list['input']['datatable']['sort']['sort'] : '',
            "field"     => (array_key_exists('input', $list) && array_key_exists('sort', $list['input']['datatable'])) ? $list['input']['datatable']['sort']['field'] : '',
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
}
