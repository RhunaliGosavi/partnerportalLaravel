<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DocumentChecklistCategory;
use App\DocumentChecklistProduct;
use App\SalesKitProduct;
use Illuminate\Support\Facades\DB;

class DocumentChecklistProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('salesKit.docChecklist.products.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('salesKit.docChecklist.products.create', [
            'sales_kit_products' => SalesKitProduct::all(),
            'doc_check_categories' => DocumentChecklistCategory::all()
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
            'sales_kit_product' => 'required',
            'doc_check_category' => 'required',
            'content' => 'required'
        ];
        $request->validate($rules);
        $docCheckProduct = new DocumentChecklistProduct;
        $docCheckProduct->sales_kit_product_id = $post['sales_kit_product'];
        $docCheckProduct->document_checklist_category_id = $post['doc_check_category'];
        $docCheckProduct->content_data  = $post['content'];
        $docCheckProduct->save();
        return redirect('docCheckProduct')->with('success', 'Document Checklist Product added successfully!');
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
        $docCheckProduct = DocumentChecklistProduct::find($id);
        return view('salesKit.docChecklist.products.edit', [
            'sales_kit_products' => SalesKitProduct::all(),
            'doc_check_categories' => DocumentChecklistCategory::all(),
            'skProduct' => $docCheckProduct
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
            'sale_kit_product' => 'required',
            'doc_check_category' => 'required',
            'content' => 'required'
        ];
       
        $request->validate($rules);
        $docCheckProduct = DocumentChecklistProduct::find($id);
        $docCheckProduct->sales_kit_product_id = $post['sales_kit_product'];
        $docCheckProduct->document_checklist_category_id = $post['doc_check_category'];
        $docCheckProduct->content_data  = $post['content'];
        $dat=$docCheckProduct->save();
       
         return redirect('docCheckProduct')->with('success', 'Document Checklist Product updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $docCheckProduct = DocumentChecklistProduct::find($id);
        if($docCheckProduct) {
            $docCheckProduct->delete();
            return redirect('docCheckProduct')->with('success', 'Document Checklist Product deleted successfully!');
        } else {
            return redirect('docCheckProduct')->with('error', 'Document Checklist Product not deleted successfully!');
        }
    }

    public function fetchAllProducts(Request $request)
    {
        $post = $request->all();
        $list = [];

        $query = DocumentChecklistProduct::with(['sales_kit_product', 'document_checklist_category']);
        if(isset($post['query']['generalSearch'])) {
            $skProducts = SalesKitProduct::select('id')->where('name', 'LIKE', "%" . $post['query']['generalSearch'] . "%")->get();
            $doccheckCats = DocumentChecklistCategory::select('id')->where('name', 'LIKE', "%" . $post['query']['generalSearch'] . "%")->get();
            $search_ids = [];
            if(count($skProducts) > 0){
                foreach($skProducts as $skProduct){ array_push($search_ids, $skProduct->id); }
                $query = $query->whereIn('sales_kit_product_id', $search_ids);
            }
            if(count($doccheckCats) > 0){
                foreach($doccheckCats as $doccheckCat){ array_push($search_ids, $doccheckCat->id); }
                $query = $query->whereIn('document_checklist_category_id', $search_ids);
            }
            $query = $query->orWhere('name', 'LIKE', "%" . $post['query']['generalSearch'] . "%");
        }
        $docCheckProducts = $query->get();
        $docCheckProducts_count = count($docCheckProducts);
        if(array_key_exists('pagination', $post) && is_array($post['pagination']) && array_key_exists('page', $post['pagination']) && array_key_exists('perpage', $post['pagination']) && !empty($post['pagination']['perpage']) ) {
                
            $docCheckProducts = $query->limit($post['pagination']['perpage'])->offset(($post['pagination']['page'] -1) * $post['pagination']['perpage']);
            if(array_key_exists('sort', $post) && array_key_exists('field', $post['sort']) && array_key_exists('field', $post['sort'])) {
                $docCheckProducts = $docCheckProducts->orderBy($post['sort']['field'],$post['sort']['sort']);
            }
            $docCheckProducts = $docCheckProducts->get()->toArray();
            $list['meta'] = [
                "page"      => (array_key_exists('page', $post['pagination']))?$post['pagination']['page']:1,
                "pages"     => (array_key_exists('pages', $post['pagination']))?$post['pagination']['pages']:0,
                "perpage"   => (array_key_exists('perpage', $post['pagination'])) ? $post['pagination']['perpage']:50,
                "total"     => $docCheckProducts_count,
                "sort"      => (array_key_exists('sort', $post)) ? $post['sort']['field']:'',
                "field"     => (array_key_exists('sort', $post)) ? $post['sort']['sort']:'',
            ];
        } else {
            $docCheckProducts = $docCheckProducts->toArray();
        }
        $list['data'] = $docCheckProducts;

        return json_encode($list);
    }

    // public function checkIfExist($postData)
    // {
    //     $data = DocumentChecklistProduct::where('name', $postData['name'])->get();
    //     if(count($data) > 0){
    //         return true;
    //     } else {
    //         return false;
    //     }
    // }
}
