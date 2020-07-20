<?php

namespace App\Http\Controllers;

use App\EmployeeHelpdesk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class EmployeeHelpDeskController extends Controller
{
    public function index(){

        return view('employeeHelpdesk/employeeHelpdeskList');
    }

    public function create(){

        return view('employeeHelpdesk/createEmpHelpDesk');
    }
    public function store(Request $request){
        ini_set('memory_limit', -1);
        ini_set('max_execution_time', 0);
        $rules = [
            'file' => 'required|mimes:pdf',
            'title'    => 'required',
        ];

        $request->validate($rules);
        if($request->hasFile('file')){

           
            $title=$request->input('title');
            $filenameWithExt = $request->file('file')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('file')->getClientOriginalExtension();
            $filename = preg_replace('/\s+/', '_',trim($filename));
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            $filesize=$request->file('file')->getSize();
            $filesize=number_format($filesize / 1048576,2);
            $request->file('file')->storeAs('public/employee/helpdesk/upload',$fileNameToStore);
            $process = EmployeeHelpdesk::create(
                ['file_path' =>$fileNameToStore,'name'=>$title,'file_size_in_mb'=>$filesize]
                );
                if(! $process){
                return redirect()->back()->with('error', 'Failed To Update Data'); 
                }
        }
    return redirect('employee-helpdesk')->with('success', 'Data added successfully.');
     
    }

    public function fetchHelpDeskData(Request $request){

        $post = $request->all();
        $list = [];

        $help_desk_count = EmployeeHelpdesk::count();

        if(array_key_exists('pagination', $post) && is_array($post['pagination']) && array_key_exists('page', $post['pagination']) && array_key_exists('perpage', $post['pagination']) && !empty($post['pagination']['perpage']) ) {
                
            $helpDesk = EmployeeHelpdesk::limit($post['pagination']['perpage'])->offset(($post['pagination']['page'] -1) * $post['pagination']['perpage']);
            if(array_key_exists('sort', $post) && array_key_exists('field', $post['sort']) && array_key_exists('field', $post['sort'])) {
                $helpDesk = $helpDesk->orderBy($post['sort']['field'],$post['sort']['sort']);
            }
            $helpDesk = $helpDesk->get()->toArray();
        } else {
            $helpDesk = EmployeeHelpdesk::get()->toArray();
        }

        $list['data'] = $helpDesk;
        $list['meta'] = [
            "page"      => (array_key_exists('page', $post['pagination']))?$post['pagination']['page']:1,
            "pages"     => (array_key_exists('pages', $post['pagination']))?$post['pagination']['pages']:0,
            "perpage"   => (array_key_exists('perpage', $post['pagination'])) ? $post['pagination']['perpage']:50,
            "total"     => $help_desk_count,
            "sort"      => (array_key_exists('sort', $post)) ? $post['sort']['field']:'',
            "field"     => (array_key_exists('sort', $post)) ? $post['sort']['sort']:'',
        ];

        return json_encode($list);
    }

    
    public function delete(Request $request, $id) {
        $empHelpDesk = EmployeeHelpdesk::find($id);

        if($empHelpDesk) {
            $empHelpDesk->delete();
            
            return redirect('employee-helpdesk')->with('success', 'Data deleted successfully!');
        } else {
            return redirect('employee-helpdesk')->with('error', 'Data not deleted successfully!');
        }
    }

    public function edit($id) {
        $data=EmployeeHelpdesk::find($id);
       
        return view('employeeHelpdesk/editEmployeeHelpDesk',['data'=>$data]);
    }
    
    public function update(Request $request) {
        ini_set('memory_limit', -1);
        ini_set('max_execution_time', 0);
     
       if($request->file('file')){
              
            $rules = [
                'file' => 'required|mimes:pdf',
                'title'    => 'required',
            ];

            $request->validate($rules);
            $title=$request->input('title');
            $filenameWithExt = $request->file('file')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('file')->getClientOriginalExtension();
            $filename = preg_replace('/\s+/', '_',trim($filename));
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            $filesize=$request->file('file')->getSize();
            $filesize=number_format($filesize / 1048576,2);
            $request->file('file')->storeAs('public/employee/helpdesk/upload',$fileNameToStore);
        
       }else{
            $fileNameToStore=$request->input('file_old');
            $title=$request->input('title');
            $filesize=$request->input('file_size_in_mb');
            
            if(empty($fileNameToStore) || empty($title))
            {
                return redirect()->back()->with('error', 'Please Fill Required data'); 
            }

       }

       $process = EmployeeHelpdesk::where('id', $request->input('id'))
       ->update(['file_path' =>$fileNameToStore,'name'=>$title,'file_size_in_mb'=>$filesize]);

        if(! $process){
            return redirect()->back()->with('error', 'Failed To Update Data'); 
        }
       
        return redirect('employee-helpdesk')->with('success', 'Data Updated successfully.');
    }



}
