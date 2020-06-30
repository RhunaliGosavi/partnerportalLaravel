<?php

namespace App\Http\Controllers\EmployeeDashboard;

use App\EmployeeDashboard\EmployeeDashboard;
use App\Http\Controllers\Controller;
use App\Imports\ApplicationDetailsImport;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
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

        if(array_key_exists('pagination', $post) && is_array($post['pagination']) && array_key_exists('page', $post['pagination']) && array_key_exists('perpage', $post['pagination']) && !empty($post['pagination']['perpage']) ) {
                
            $employee_app = EmployeeDashboard::limit($post['pagination']['perpage'])->offset(($post['pagination']['page'] -1) * $post['pagination']['perpage']);
            if(array_key_exists('sort', $post) && array_key_exists('field', $post['sort']) && array_key_exists('field', $post['sort'])) {
                $employee_app = $employee_app->orderBy($post['sort']['field'],$post['sort']['sort']);
            }
            $employee_app = $employee_app->get()->toArray();
        } else {
            $employee_app = EmployeeDashboard::get()->toArray();
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
        $file=$request->file('import_file');

        Excel::import(new ApplicationDetailsImport,$file);
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
