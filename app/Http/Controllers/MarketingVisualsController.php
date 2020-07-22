<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MarketingVisualCategory;
use App\MarketingVisual;
use App\LoanProduct;
use Illuminate\Support\Facades\Storage;
use DB, Helper;

class MarketingVisualsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('salesKit.visualCategory.visuals.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('salesKit.visualCategory.visuals.create', [
            // 'loan_products' => LoanProduct::all(),
            'visual_categories' => MarketingVisualCategory::all()
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
            // 'loan_product' => 'required',
            'visual_category' => 'required',
            'content' => 'required'
            // 'file' => 'required'
        ];
        $request->validate($rules);
        $content = $request->input('content');
        $dom = new \DOMDocument();
        $dom->loadHtml($content, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);    
        $images = $dom->getElementsByTagName('img');
        $statement = DB::select("show table status like 'sales_kit_products'");
        $id = $statement[0]->Auto_increment;
        $helper = new Helper;
        $images = $helper->upload_image($images, "sales/kit/marketinginformation/visuals/".$id, 'store');
        $visuals = new MarketingVisual;
        $visuals->marketing_visual_category_id = $post['visual_category'];
        $visuals->content_data  = $dom->saveHTML();
        $visuals->save();
        return redirect('marketingVisuals')->with('success', 'Marketing visual added successfully!');
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
        $marketingVisual = MarketingVisual::find($id);
        return view('salesKit.visualCategory.visuals.edit', [
            // 'loan_products' => LoanProduct::all(),
            'visual_categories' => MarketingVisualCategory::all(),
            'marketingVisual' => $marketingVisual
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
            // 'loan_product' => 'required',
            'visual_category' => 'required',
            // 'file' => 'required',
            'content' => 'required'
        ];
        $visual = MarketingVisual::find($id);
        $content = $request->input('content');
        $dom = new \DOMDocument();
        $dom->loadHtml($content, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);    
        $images = $dom->getElementsByTagName('img');
        $helper = new Helper;
        $images = $helper->upload_image($images, "sales/kit/marketinginformation/visuals/".$visual->id, 'update');
        $visual->marketing_visual_category_id = $post['visual_category'];
        $visual->content_data  = $dom->saveHTML();
        $visual->save();
        return redirect('marketingVisuals')->with('success', 'Marketing visual updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $visual = MarketingVisual::find($id);
        if($visual) {
            $directory = "sales/kit/marketinginformation/visuals/".$visual->id;
            $files = Storage::allFiles('public/'.$directory);
            Storage::delete($files);
            $visual->delete();
            return redirect('marketingVisuals')->with('success', 'Marketing visual deleted successfully!');
        } else {
            return redirect('marketingVisuals')->with('error', 'Marketing visual not deleted successfully!');
        }
    }

    public function fetchAllVisuals(Request $request)
    {
        $post = $request->all();
        $list = [];

        $query = MarketingVisual::with(['marketing_visual_category']);
        if(isset($post['query']['generalSearch'])) {
            // $lProducts = LoanProduct::select('id')->where('name', 'LIKE', "%" . $post['query']['generalSearch'] . "%")->get();
            $visualcats = MarketingVisualCategory::select('id')->where('name', 'LIKE', "%" . $post['query']['generalSearch'] . "%")->get();
            $search_ids = [];
            // if(count($lProducts) > 0){
            //     foreach($lProducts as $lProduct){ array_push($search_ids, $lProduct->id); }
            //     $query = $query->whereIn('loan_product_id', $search_ids);
            // }
            if(count($visualcats) > 0){
                foreach($visualcats as $visualcat){ array_push($search_ids, $visualcat->id); }
                $query = $query->whereIn('marketing_visual_category_id', $search_ids);
            }
            $query = $query->orWhere('content_data', 'LIKE', "%" . $post['query']['generalSearch'] . "%");
        }
        $marketingVisuals = $query->get();
        $marketingVisuals_count = count($marketingVisuals);
        if(array_key_exists('pagination', $post) && is_array($post['pagination']) && array_key_exists('page', $post['pagination']) && array_key_exists('perpage', $post['pagination']) && !empty($post['pagination']['perpage']) ) {
                
            $marketingVisuals = $query->limit($post['pagination']['perpage'])->offset(($post['pagination']['page'] -1) * $post['pagination']['perpage']);
            if(array_key_exists('sort', $post) && array_key_exists('field', $post['sort']) && array_key_exists('field', $post['sort'])) {
                $marketingVisuals = $marketingVisuals->orderBy($post['sort']['field'],$post['sort']['sort']);
            }
            $marketingVisuals = $marketingVisuals->get()->toArray();
            $list['meta'] = [
                "page"      => (array_key_exists('page', $post['pagination']))?$post['pagination']['page']:1,
                "pages"     => (array_key_exists('pages', $post['pagination']))?$post['pagination']['pages']:0,
                "perpage"   => (array_key_exists('perpage', $post['pagination'])) ? $post['pagination']['perpage']:50,
                "total"     => $marketingVisuals_count,
                "sort"      => (array_key_exists('sort', $post)) ? $post['sort']['field']:'',
                "field"     => (array_key_exists('sort', $post)) ? $post['sort']['sort']:'',
            ];
        } else {
            $marketingVisuals = $marketingVisuals->toArray();
        }
        $list['data'] = $marketingVisuals;

        return json_encode($list);
    }
}
