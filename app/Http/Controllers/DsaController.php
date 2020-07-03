<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Excel;
use App\DsaOnboarding;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class DsaController extends Controller
{
	public function index() {
		return view('dsa.index');
	}

	public function fetchDsaList(Request $request) {
		$post = $request->all();
        $list = [];

        $dsa_count = DsaOnboarding::count();
        if(array_key_exists('pagination', $post) && is_array($post['pagination']) && array_key_exists('page', $post['pagination']) && array_key_exists('perpage', $post['pagination']) && !empty($post['pagination']['perpage']) ) {
                
            $dsas = DsaOnboarding::limit($post['pagination']['perpage'])->offset(($post['pagination']['page'] -1) * $post['pagination']['perpage']);
            
            if(array_key_exists('sort', $post) && array_key_exists('field', $post['sort']) && array_key_exists('field', $post['sort'])) {
                $dsas = $dsas->orderBy($post['sort']['field'],$post['sort']['sort']);
            }
            $dsas = $dsas->get()->toArray();
        } else {
            $dsas = DsaOnboarding::get()->toArray();
        }

        $list['data'] = $dsas;
        $list['meta'] = [
            "page"      => (array_key_exists('page', $post['pagination']))?$post['pagination']['page']:1,
            "pages"     => (array_key_exists('pages', $post['pagination']))?$post['pagination']['pages']:0,
            "perpage"   => (array_key_exists('perpage', $post['pagination'])) ? $post['pagination']['perpage']:50,
            "total"     => $dsa_count,
            "sort"      => (array_key_exists('sort', $post)) ? $post['sort']['field']:'',
            "field"     => (array_key_exists('sort', $post)) ? $post['sort']['sort']:'',
        ];

        return json_encode($list);
	}

	public function create() {
		return view('dsa.create');
	}

	public function store(Request $request) {

		$validator = Validator::make($request->all(), ['file' => 'required','title'=>'required']);
        if ($validator->fails()) {

            return redirect()->back()->with('error', 'Please Fill Required data');
        } else {
        
         	if($request->hasFile('file')){

	            $extensions = ["pdf","doc","docx","xlsx","xls"];
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

	                $request->file('file')->storeAs('public/dsa',$fileNameToStore);

	                $process = DsaOnboarding::create(
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
	                 	return redirect('dsaList')->with('success', 'File uploaded successfully.');
	                 }

	            }else{
	                return redirect()->back()->with('error', 'File format is invalid.');
	            }
	        }
	    }
	}

	public function edit(Request $request, $id) {
		$data['dsa'] = DsaOnboarding::find($id);
       	
       	if($data['dsa']) {
			return view('dsa.edit',$data);
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
                $extensions = ["pdf","doc","docx","xlsx","xls"];
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
                    $request->file('file')->storeAs('public/dsa',$fileNameToStore);
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

        $process = DsaOnboarding::where('id', $id)->update(['file_path' =>$fileNameToStore,'title'=>$title,'file_size_in_mb'=>$filesize]);

        if(! $process){
            return redirect()->back()->with('error', 'Failed To Update Data'); 
        }
       
        return redirect('dsaList')->with('success', 'Data Updated successfully.');
	}

	public function delete(Request $request, $id) {
		$dsa = DsaOnboarding::find($id);

        if($dsa) {
            $dsa->delete();
            
            return redirect('dsaList')->with('success', 'Data deleted successfully!');
        } else {
            return redirect('dsaList')->with('error', 'Data not deleted successfully!');
        }
	}

	public function view(Request $request, $id) {
		$dsa = DsaOnboarding::find($id);

        if($dsa) {
            $Url = url('storage/dsa').'/'.$dsa->file_path;
            
            if(file_exists($Url)) {

            	return response()->file($Url);
            }
        } else {
        	return redirect('dsaList')->with('error', 'No data found');
		}
	}
}