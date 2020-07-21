<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\LoanProduct;
use App\CustomerScheme;
use Illuminate\Support\Facades\Storage;

class CustomerSchemeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('salesKit.customerSchemes.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('salesKit.customerSchemes.create', [
            'loan_products' => LoanProduct::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        ini_set('memory_limit', -1);
        ini_set('max_execution_time', 0);
        $post = $request->all();
        $rules = [
            'loan_product' => 'required',
            'file'      => 'required',
        ];
        $request->validate($rules);
        // if($this->checkIfExist($post)) return redirect('customerScheme')->with('error', 'Sales team contest already exist!');
        if($request->hasFile('file')){
            $extensions = array("pdf","doc","docx","xlsx","xls","ppt");
            $result = array($request->file('file')->getClientOriginalExtension());
            if(in_array($result[0],$extensions)){
                $title=$request->input('title');
                $filenameWithExt = $request->file('file')->getClientOriginalName();
                $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                $extension = $request->file('file')->getClientOriginalExtension();
                $filename = preg_replace('/\s+/', '_',trim($filename));
                $fileNameToStore = $filename.'_'.time().'.'.$extension;
                $request->file('file')->storeAs('public/sales/kit/marketinginformation/customerscheme',$fileNameToStore);
                $process = CustomerScheme::create(
                    ['loan_product_id' => $post['loan_product'],'file_path' =>$fileNameToStore]
                );
                if(! $process){
                return redirect()->back()->with('error', 'Failed To Update Data'); 
                }

            }else{
                return redirect()->back()->with('error', 'File format is invalid.');
            }
        }
        return redirect('customerScheme')->with('success', 'Customer Scheme added successfully!');
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
        $custScheme = CustomerScheme::find($id);
        return view('salesKit.customerSchemes.edit', [
            'loan_products' => LoanProduct::all(),
            'custScheme' => $custScheme
        ]);
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
            'loan_product' => 'required'
        ];
        $custScheme = CustomerScheme::find($id);
        // if($this->checkIfExist($post)) return redirect('salesProduct')->with('error', 'Loan Product already exist!');
        $fileNameToStore = NULL;
        if($request->hasFile('file')){
            $extensions = array("pdf","doc","docx","xlsx","xls","ppt");
            $result = array($request->file('file')->getClientOriginalExtension());
            if(in_array($result[0],$extensions)){
                $title=$request->input('title');
                $filenameWithExt = $request->file('file')->getClientOriginalName();
                $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                $extension = $request->file('file')->getClientOriginalExtension();
                $filename = preg_replace('/\s+/', '_',trim($filename));
                $fileNameToStore = $filename.'_'.time().'.'.$extension;
                $filesize=$request->file('file')->getSize();
                $filesize=number_format($filesize / 1048576,2);
                Storage::disk('local')->delete('public/sales/kit/marketinginformation/customerscheme/'.$custScheme->file_path);
                $request->file('file')->storeAs('public/sales/kit/marketinginformation/customerscheme',$fileNameToStore);
            }else{
                return redirect()->back()->with('error', 'File format is invalid.');
            }
        }
        $fileNameToStore = ($fileNameToStore) ? $fileNameToStore : $custScheme->file_path;
        $process = $custScheme->update(
            ['loan_product_id' => $post['loan_product'],'file_path' =>$fileNameToStore]
        );
        if(! $process){
        return redirect()->back()->with('error', 'Failed To Update Data'); 
        }
        return redirect('customerScheme')->with('success', 'Sales Team Contest updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $custScheme = CustomerScheme::find($id);
        if($custScheme) {
            Storage::disk('local')->delete('public/sales/kit/marketinginformation/customerscheme/'.$custScheme->file_path);
            $custScheme->delete();
            return redirect('customerScheme')->with('success', 'Sales Team Contest deleted successfully!');
        } else {
            return redirect('customerScheme')->with('error', 'Sales Team Contest not deleted successfully!');
        }
    }

    public function fetchAllSchemes(Request $request)
    {
        $post = $request->all();
        $list = [];

        $query = CustomerScheme::with('loan_product');
        if(isset($post['query']['generalSearch'])) {
            $lProducts = LoanProduct::select('id')->where('name', 'LIKE', "%" . $post['query']['generalSearch'] . "%")->get();
            if(count($lProducts) > 0){
                $lProduct_Ids = [];
                foreach($lProducts as $lProduct){ array_push($lProduct_Ids, $lProduct->id); }
                $query = $query->whereIn('loan_product_id', $lProduct_Ids);
            }
            $query = $query->orWhere('file_path', 'LIKE', "%" . $post['query']['generalSearch'] . "%");
        }
        $custSchemes = $query->get();
        $custSchemes_count = count($custSchemes);
        if(array_key_exists('pagination', $post) && is_array($post['pagination']) && array_key_exists('page', $post['pagination']) && array_key_exists('perpage', $post['pagination']) && !empty($post['pagination']['perpage']) ) {
                
            $custSchemes = $query->limit($post['pagination']['perpage'])->offset(($post['pagination']['page'] -1) * $post['pagination']['perpage']);
            if(array_key_exists('sort', $post) && array_key_exists('field', $post['sort']) && array_key_exists('field', $post['sort'])) {
                $custSchemes = $custSchemes->orderBy($post['sort']['field'],$post['sort']['sort']);
            }
            $custSchemes = $custSchemes->get()->toArray();
            $list['meta'] = [
                "page"      => (array_key_exists('page', $post['pagination']))?$post['pagination']['page']:1,
                "pages"     => (array_key_exists('pages', $post['pagination']))?$post['pagination']['pages']:0,
                "perpage"   => (array_key_exists('perpage', $post['pagination'])) ? $post['pagination']['perpage']:50,
                "total"     => $custSchemes_count,
                "sort"      => (array_key_exists('sort', $post)) ? $post['sort']['field']:'',
                "field"     => (array_key_exists('sort', $post)) ? $post['sort']['sort']:'',
            ];
        } else {
            $custSchemes = $custSchemes->toArray();
        }
        $list['data'] = $custSchemes;

        return json_encode($list);
    }
}
