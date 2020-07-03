<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MarketingVisualCategory;
use App\LoanProduct;

class MarketingVisualCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('salesKit.visualCategory.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('salesKit.visualCategory.create', [
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
        ];
        $request->validate($rules);
        if($this->checkIfExist($post)) return redirect('visualCategory')->with('error', 'Marketing visual category already exist!');
        $visualCat = new MarketingVisualCategory;
        $visualCat->loan_product_id = $post['loan_product'];
        $visualCat->name = $post['name'];
        $visualCat->save();
        return redirect('visualCategory')->with('success', 'Marketing visual category added successfully!');
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
        $visualCat = MarketingVisualCategory::find($id);
        return view('salesKit.visualCategory.edit', [
            'loan_products' => LoanProduct::all(),
            'visualCat' => $visualCat
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
            'name'      => 'required'
        ];
        $visualCat = MarketingVisualCategory::find($id);
        $visualCat->loan_product_id = $post['loan_product'];
        $visualCat->name = $post['name'];
        $visualCat->save();
        return redirect('visualCategory')->with('success', 'Marketing visual category updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $visualCat = MarketingVisualCategory::find($id);
        if($visualCat) {
            $visualCat->delete();
            return redirect('visualCategory')->with('success', 'Marketing visual category deleted successfully!');
        } else {
            return redirect('visualCategory')->with('error', 'Marketing visual category not deleted successfully!');
        }
    }

    public function fetchAllCategories(Request $request)
    {
        $post = $request->all();
        $list = [];

        $query = MarketingVisualCategory::with('loan_product');
        if(isset($post['query']['generalSearch'])) {
            $lProducts = LoanProduct::select('id')->where('name', 'LIKE', "%" . $post['query']['generalSearch'] . "%")->get();
            if(count($lProducts) > 0){
                $lProduct_Ids = [];
                foreach($lProducts as $lProduct){ array_push($lProduct_Ids, $lProduct->id); }
                $query = $query->whereIn('loan_product_id', $lProduct_Ids);
            }
            $query = $query->orWhere('name', 'LIKE', "%" . $post['query']['generalSearch'] . "%");
        }
        $visualCats = $query->get();
        $visualCats_count = count($visualCats);
        if(array_key_exists('pagination', $post) && is_array($post['pagination']) && array_key_exists('page', $post['pagination']) && array_key_exists('perpage', $post['pagination']) && !empty($post['pagination']['perpage']) ) {
                
            $visualCats = $query->limit($post['pagination']['perpage'])->offset(($post['pagination']['page'] -1) * $post['pagination']['perpage']);
            if(array_key_exists('sort', $post) && array_key_exists('field', $post['sort']) && array_key_exists('field', $post['sort'])) {
                $visualCats = $visualCats->orderBy($post['sort']['field'],$post['sort']['sort']);
            }
            $visualCats = $visualCats->get()->toArray();
            $list['meta'] = [
                "page"      => (array_key_exists('page', $post['pagination']))?$post['pagination']['page']:1,
                "pages"     => (array_key_exists('pages', $post['pagination']))?$post['pagination']['pages']:0,
                "perpage"   => (array_key_exists('perpage', $post['pagination'])) ? $post['pagination']['perpage']:50,
                "total"     => $visualCats_count,
                "sort"      => (array_key_exists('sort', $post)) ? $post['sort']['field']:'',
                "field"     => (array_key_exists('sort', $post)) ? $post['sort']['sort']:'',
            ];
        } else {
            $visualCats = $visualCats->toArray();
        }
        $list['data'] = $visualCats;

        return json_encode($list);
    }

    public function checkIfExist($postData)
    {
        $data = MarketingVisualCategory::where('name', $postData['name'])->get();
        if(count($data) > 0){
            return true;
        } else {
            return false;
        }
    }
}
