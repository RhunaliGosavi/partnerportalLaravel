<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator,Config, Helper, Excel, DB, Image;
use Illuminate\Support\Facades\Storage;
use App\LoanProduct;

class LoanProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('loanProduct.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('loanProduct.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $post = $request->all();
        $rules = [
            'name'      => 'required',
            'icon'      => 'required',
            'description' => 'required'
        ];
        $request->validate($rules);
        if($this->checkIfExist($post)) return redirect('salesProduct')->with('error', 'Loan Product already exist!');
        $content = $request->input('description');
        $dom = new \DOMDocument();
        $dom->loadHtml($content, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);    
        $images = $dom->getElementsByTagName('img');
        $statement = DB::select("show table status like 'loan_products'");
        $id = $statement[0]->Auto_increment;
        $helper = new Helper;
        $images = $helper->upload_image($images, "loanproducts/".$id, 'store');
        if($request->hasFile('icon')){
            $extensions = array("png","jpeg","jpg");
            $result = array($request->file('icon')->getClientOriginalExtension());
            if(in_array($result[0],$extensions)){
                $title=$request->input('title');
                $filenameWithExt = $request->file('icon')->getClientOriginalName();
                $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                $extension = $request->file('icon')->getClientOriginalExtension();
                $filename = preg_replace('/\s+/', '_',trim($filename));
                $fileNameToStore = $filename.'_'.time().'.'.$extension;
                $filesize=$request->file('icon')->getSize();
                $filesize=number_format($filesize / 1048576,2);
                $request->file('icon')->storeAs('public/loanproduct',$fileNameToStore);
                $process = LoanProduct::create(
                    ['name' => $post['name'],'icon' =>$fileNameToStore,'description'=>$dom->saveHTML()]
                 );
                 if(! $process){
                    return redirect()->back()->with('error', 'Failed To Update Data'); 
                 }

            }else{
                return redirect()->back()->with('error', 'File format is invalid.');
            }
        }
        return redirect('loanProduct')->with('success', 'Loan Product added successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $lProduct = LoanProduct::find($id);
        return view('loanProduct.edit', compact('lProduct'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $post = $request->all();
        $rules = [
            'name'      => 'required',
            'icon'      => 'required',
            'description' => 'required'
        ];
        $request->validate($rules);
        $lProduct = LoanProduct::find($id);
        // if($this->checkIfExist($post)) return redirect('salesProduct')->with('error', 'Loan Product already exist!');
        $content = $request->input('description');
        $dom = new \DOMDocument();
        $dom->loadHtml($content, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);    
        $images = $dom->getElementsByTagName('img');
        $helper = new Helper;
        $images = $helper->upload_image($images, "loan/products/".$lProduct->id, 'update');
        $fileNameToStore = NULL;
        if($request->hasFile('icon')){
            $extensions = array("png","jpeg","jpg");
            $result = array($request->file('icon')->getClientOriginalExtension());
            if(in_array($result[0],$extensions)){
                $title=$request->input('title');
                $filenameWithExt = $request->file('icon')->getClientOriginalName();
                $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                $extension = $request->file('icon')->getClientOriginalExtension();
                $filename = preg_replace('/\s+/', '_',trim($filename));
                $fileNameToStore = $filename.'_'.time().'.'.$extension;
                $filesize=$request->file('icon')->getSize();
                $filesize=number_format($filesize / 1048576,2);
                if($lProduct->icon !== NULL) Storage::disk('local')->delete('public/loanproduct'.$lProduct->icon);
                $request->file('icon')->storeAs('public/loanproduct',$fileNameToStore);
            }else{
                return redirect()->back()->with('error', 'File format is invalid.');
            }
        }
        $fileNameToStore = ($fileNameToStore) ? $fileNameToStore : $lProduct->icon;
        $process = $lProduct->update(
            ['name' => $post['name'],'icon' =>$fileNameToStore,'content_data'=>$dom->saveHTML()]
        );
        if(! $process){
            return redirect()->back()->with('error', 'Failed To Update Data'); 
        }
        return redirect('loanProduct')->with('success', 'Loan Product updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $lProduct = LoanProduct::find($id);
        if($lProduct) {
            Storage::disk('local')->delete('public/loanproduct/'.$lProduct->icon);
            $directory = "loanproducts/".$lProduct->id;
            $files = Storage::allFiles('public/'.$directory);
            Storage::delete($files);
            $lProduct->delete();
            return redirect('loanProduct')->with('success', 'Loan Product deleted successfully!');
        } else {
            return redirect('loanProduct')->with('error', 'Loan Product not deleted successfully!');
        }
    }

    public function fetchAllLoanProducts(Request $request)
    {
        $post = $request->all();
        $list = [];

        $query = LoanProduct::query();
        if(isset($post['query']['generalSearch'])) {
            $query = $query->orWhere('name', 'LIKE', "%" . $post['query']['generalSearch'] . "%")->orWhere('icon', 'LIKE', "%" . $post['query']['generalSearch'] . "%");
        }
        $lProducts = $query->get();
        $lProducts_count = count($lProducts);
        if(array_key_exists('pagination', $post) && is_array($post['pagination']) && array_key_exists('page', $post['pagination']) && array_key_exists('perpage', $post['pagination']) && !empty($post['pagination']['perpage']) ) {
                
            $lProducts = $query->limit($post['pagination']['perpage'])->offset(($post['pagination']['page'] -1) * $post['pagination']['perpage']);
            if(array_key_exists('sort', $post) && array_key_exists('field', $post['sort']) && array_key_exists('field', $post['sort'])) {
                $lProducts = $lProducts->orderBy($post['sort']['field'],$post['sort']['sort']);
            }
            $lProducts = $lProducts->get()->toArray();
            $list['meta'] = [
                "page"      => (array_key_exists('page', $post['pagination']))?$post['pagination']['page']:1,
                "pages"     => (array_key_exists('pages', $post['pagination']))?$post['pagination']['pages']:0,
                "perpage"   => (array_key_exists('perpage', $post['pagination'])) ? $post['pagination']['perpage']:50,
                "total"     => $lProducts_count,
                "sort"      => (array_key_exists('sort', $post)) ? $post['sort']['field']:'',
                "field"     => (array_key_exists('sort', $post)) ? $post['sort']['sort']:'',
            ];
        } else {
            $lProducts = LoanProduct::get()->toArray();
        }

        $list['data'] = $lProducts;

        return json_encode($list);
    }

    public function checkIfExist($postData)
    {
        $data = LoanProduct::where('name', $postData['name'])->get();
        if(count($data) > 0){
            return true;
        } else {
            return false;
        }
    }
}
