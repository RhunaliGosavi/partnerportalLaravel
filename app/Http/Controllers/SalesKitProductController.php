<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SalesKitProduct;
use App\LoanProduct;

class SalesKitProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('salesKit.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('salesKit.create', [
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
        $post = $request->all();
        $rules = [
            'loan_product' => 'required',
            'name'      => 'required',
            'content' => 'required'
        ];
        $request->validate($rules);
        if($this->checkIfExist($post)) return redirect('salesProduct')->with('error', 'Sales Kit Product already exist!');
        $skProduct = new SalesKitProduct;
        $skProduct->loan_product_id = $post['loan_product'];
        $skProduct->name = $post['name'];
        $skProduct->content_data  = $post['content'];
        $skProduct->save();
        return redirect('salesProduct')->with('success', 'Sales Kit Product added successfully!');
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
        $skProduct = SalesKitProduct::find($id);
        return view('salesKit.edit', [
            'loan_products' => LoanProduct::all(),
            'skProduct' => $skProduct
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
            'loan_product' => 'required',
            'name'      => 'required',
            'content' => 'required'
        ];
        $skProduct = SalesKitProduct::find($id);
        // if($this->checkIfExist($post)) return redirect('salesProduct')->with('error', 'Loan Product already exist!');
        $skProduct->loan_product_id = $post['loan_product'];
        $skProduct->name = $post['name'];
        $skProduct->content_data  = $post['content'];
        $skProduct->save();
        return redirect('salesProduct')->with('success', 'Sales Kit Product updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $skProduct = SalesKitProduct::find($id);
        if($skProduct) {
            $skProduct->delete();
            return redirect('salesProduct')->with('success', 'Sales Kit Product deleted successfully!');
        } else {
            return redirect('salesProduct')->with('error', 'Sales Kit Product not deleted successfully!');
        }
    }

    public function fetchAllSalesProducts(Request $request)
    {
        $post = $request->all();
        $list = [];

        $query = SalesKitProduct::with('loan_product');
        if(isset($post['query']['generalSearch'])) {
            $lProducts = LoanProduct::select('id')->where('name', 'LIKE', "%" . $post['query']['generalSearch'] . "%")->get();
            if(count($lProducts) > 0){
                $lProduct_Ids = [];
                foreach($lProducts as $lProduct){ array_push($lProduct_Ids, $lProduct->id); }
                $query = $query->whereIn('loan_product_id', $lProduct_Ids);
            }
            $query = $query->orWhere('name', 'LIKE', "%" . $post['query']['generalSearch'] . "%");
        }
        $skProducts = $query->get();
        $skProducts_count = count($skProducts);
        if(array_key_exists('pagination', $post) && is_array($post['pagination']) && array_key_exists('page', $post['pagination']) && array_key_exists('perpage', $post['pagination']) && !empty($post['pagination']['perpage']) ) {
                
            $skProducts = $query->limit($post['pagination']['perpage'])->offset(($post['pagination']['page'] -1) * $post['pagination']['perpage']);
            if(array_key_exists('sort', $post) && array_key_exists('field', $post['sort']) && array_key_exists('field', $post['sort'])) {
                $skProducts = $skProducts->orderBy($post['sort']['field'],$post['sort']['sort']);
            }
            $skProducts = $skProducts->get()->toArray();
            $list['meta'] = [
                "page"      => (array_key_exists('page', $post['pagination']))?$post['pagination']['page']:1,
                "pages"     => (array_key_exists('pages', $post['pagination']))?$post['pagination']['pages']:0,
                "perpage"   => (array_key_exists('perpage', $post['pagination'])) ? $post['pagination']['perpage']:50,
                "total"     => $skProducts_count,
                "sort"      => (array_key_exists('sort', $post)) ? $post['sort']['field']:'',
                "field"     => (array_key_exists('sort', $post)) ? $post['sort']['sort']:'',
            ];
        } else {
            $skProducts = $skProducts->toArray();
        }
        $list['data'] = $skProducts;

        return json_encode($list);
    }

    public function checkIfExist($postData)
    {
        $data = SalesKitProduct::where('name', $postData['name'])->get();
        if(count($data) > 0){
            return true;
        } else {
            return false;
        }
    }
}
