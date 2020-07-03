<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Excel;
use App\CorporatePresentation;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class CorporatePptController extends Controller
{
	public function index() {
		return view('corporate.index');
	}

	public function fetchcorporatePptList(Request $request) {
		$post = $request->all();
        $list = [];

        $corporate_count = CorporatePresentation::count();
        if(array_key_exists('pagination', $post) && is_array($post['pagination']) && array_key_exists('page', $post['pagination']) && array_key_exists('perpage', $post['pagination']) && !empty($post['pagination']['perpage']) ) {
                
            $corporates = CorporatePresentation::limit($post['pagination']['perpage'])->offset(($post['pagination']['page'] -1) * $post['pagination']['perpage']);
            
            if(array_key_exists('sort', $post) && array_key_exists('field', $post['sort']) && array_key_exists('field', $post['sort'])) {
                $corporates = $corporates->orderBy($post['sort']['field'],$post['sort']['sort']);
            }
            $corporates = $corporates->get()->toArray();
        } else {
            $corporates = CorporatePresentation::get()->toArray();
        }

        $list['data'] = $corporates;
        $list['meta'] = [
            "page"      => (array_key_exists('page', $post['pagination']))?$post['pagination']['page']:1,
            "pages"     => (array_key_exists('pages', $post['pagination']))?$post['pagination']['pages']:0,
            "perpage"   => (array_key_exists('perpage', $post['pagination'])) ? $post['pagination']['perpage']:50,
            "total"     => $corporate_count,
            "sort"      => (array_key_exists('sort', $post)) ? $post['sort']['field']:'',
            "field"     => (array_key_exists('sort', $post)) ? $post['sort']['sort']:'',
        ];

        return json_encode($list);
	}

	public function create() {
		return view('corporate.create');
	}

	public function store(Request $request) {

		$validator = Validator::make($request->all(), ['file' => 'required','title'=>'required']);
        if ($validator->fails()) {

            return redirect()->back()->with('error', 'Please Fill Required data');
        } else {
        
         	if($request->hasFile('file')){

	            $extensions = ["pdf","doc","docx","xlsx","xls","ppt"];
	            $result = [$request->file('file')->getClientOriginalExtension()];

	            if(in_array($result[0],$extensions)){

	                $title = $request->input('title');
	                $filenameWithExt = $request->file('file')->getClientOriginalName();
	                $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
	                $extension = $request->file('file')->getClientOriginalExtension();
	                $filename = preg_replace('/\s+/', '_',trim($filename));
	                $fileNameToStore = $filename.'_'.time().'.'.$extension;
	                $filesize = $request->file('file')->getSize();
	                $filesize = number_format($filesize / 1048576,2);

	                $request->file('file')->storeAs('public/corporate',$fileNameToStore);

	                $process = CorporatePresentation::create(
	                    [
	                    	'file_path' 		=> $fileNameToStore,
	                    	'title' 			=> $title,
	                    	'is_required' 		=> true,
	                    	'file_size_in_mb' 	=> $filesize,
	                    ]
	                 );
	                 if(!$process){
	                    return redirect()->back()->with('error', 'Failed To Update Data'); 
	                 } else {
	                 	return redirect('corporateList')->with('success', 'File uploaded successfully.');
	                 }

	            }else{
	                return redirect()->back()->with('error', 'File format is invalid.');
	            }
	        }
	    }
	}

	public function edit(Request $request, $id) {
		$data['corporate'] = CorporatePresentation::find($id);
       	
       	if($data['corporate']) {
			return view('corporate.edit',$data);
		} else {
			return redirect('links')->with('error', 'Record not found!');
		}
        
	}

	public function update(Request $request, $id) {
		if($request->file('file')) {
            $validator = Validator::make($request->all(), ['file' => 'required','title'=>'required']);
            if ($validator->fails()) {
                return redirect()->back()->with('error', 'Please Fill Required data');
            } else {
                $extensions = ["pdf","doc","docx","xlsx","xls","ppt"];
	            $result = [$request->file('file')->getClientOriginalExtension()];

                if(in_array($result[0],$extensions)){
                    $title=$request->input('title');
                    $filenameWithExt = $request->file('file')->getClientOriginalName();
                    $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                    $extension = $request->file('file')->getClientOriginalExtension();
                    $filename = preg_replace('/\s+/', '_',trim($filename));
                    $fileNameToStore = $filename.'_'.time().'.'.$extension;
                    $filesize = $request->file('file')->getSize();
                    $filesize = number_format($filesize / 1048576,2);
                    $request->file('file')->storeAs('public/corporate',$fileNameToStore);
	            } else {
	                return redirect()->back()->with('error', 'File format is invalid.');
	            }
       		}
        } else {
	        $fileNameToStore = $request->input('file_old');
	        $title = $request->input('title');
	        $filesize = $request->input('file_size_in_mb');
	        
	        if(empty($fileNameToStore) || empty($title)) {
	            return redirect()->back()->with('error', 'Please Fill Required data'); 
	        }

	    }

        $process = CorporatePresentation::where('id', $id)->update(['file_path' =>$fileNameToStore,'title'=>$title,'file_size_in_mb'=>$filesize]);

        if(! $process){
            return redirect()->back()->with('error', 'Failed To Update Data'); 
        }
       
        return redirect('corporateList')->with('success', 'Data Updated successfully.');
	}

	public function delete(Request $request, $id) {
		$corporate = CorporatePresentation::find($id);

        if($corporate) {
            $corporate->delete();
            
            return redirect('corporateList')->with('success', 'Data deleted successfully!');
        } else {
            return redirect('corporateList')->with('error', 'Data not deleted successfully!');
        }
	}

	public function view(Request $request, $id) {
		$corporate = CorporatePresentation::find($id);

        if($corporate) {
            $Url = url('storage/corporate').'/'.$corporate->file_path;
            
            if(file_exists($Url)) {

            	return response()->file($Url);
            }
        } else {
        	return redirect('corporateList')->with('error', 'No data found');
		}
	}
}