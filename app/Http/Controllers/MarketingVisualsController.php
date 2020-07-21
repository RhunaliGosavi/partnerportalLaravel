<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MarketingVisualCategory;
use App\MarketingVisual;
use App\LoanProduct;
use Illuminate\Support\Facades\Storage;

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
            'loan_products' => LoanProduct::all(),
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
            'loan_product' => 'required',
            'visual_category' => 'required',
            'file' => 'required'
        ];
        $request->validate($rules);
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
                $request->file('file')->storeAs('public/sales/kit/marketinginformation/visuals',$fileNameToStore);
                $process = MarketingVisual::create(
                    ['loan_product_id' => $post['loan_product'],'marketing_visual_category_id' => $post['visual_category'],'file_path' =>$fileNameToStore]
                 );
                 if(! $process){
                    return redirect()->back()->with('error', 'Failed To Update Data'); 
                 }

            }else{
                return redirect()->back()->with('error', 'File format is invalid.');
            }
        }
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
            'loan_products' => LoanProduct::all(),
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
            'loan_product' => 'required',
            'visual_category' => 'required',
            'file' => 'required'
        ];
        $marketingVisual = MarketingVisual::find($id);
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
                Storage::disk('local')->delete('public/sales/kit/marketinginformation/visuals/'.$marketingVisual->file_path);
                $request->file('file')->storeAs('public/sales/kit/marketinginformation/visuals',$fileNameToStore);
            }else{
                return redirect()->back()->with('error', 'File format is invalid.');
            }
        }
        $fileNameToStore = ($fileNameToStore) ? $fileNameToStore : $marketingVisual->file_path;
        $process = $marketingVisual->update(
            ['loan_product_id' => $post['loan_product'],'marketing_visual_category_id' => $post['visual_category'],'file_path' =>$fileNameToStore]
        );
        if(! $process){
            return redirect()->back()->with('error', 'Failed To Update Data'); 
        }
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
        $marketingVisual = MarketingVisual::find($id);
        if($marketingVisual) {
            Storage::disk('local')->delete('public/sales/kit/marketinginformation/visuals/'.$marketingVisual->file_path);
            $marketingVisual->delete();
            return redirect('marketingVisuals')->with('success', 'Marketing visual deleted successfully!');
        } else {
            return redirect('marketingVisuals')->with('error', 'Marketing visual not deleted successfully!');
        }
    }

    public function fetchAllVisuals(Request $request)
    {
        $post = $request->all();
        $list = [];

        $query = MarketingVisual::with(['loan_product', 'marketing_visual_category']);
        if(isset($post['query']['generalSearch'])) {
            $lProducts = LoanProduct::select('id')->where('name', 'LIKE', "%" . $post['query']['generalSearch'] . "%")->get();
            $visualcats = MarketingVisualCategory::select('id')->where('name', 'LIKE', "%" . $post['query']['generalSearch'] . "%")->get();
            $search_ids = [];
            if(count($lProducts) > 0){
                foreach($lProducts as $lProduct){ array_push($search_ids, $lProduct->id); }
                $query = $query->whereIn('loan_product_id', $search_ids);
            }
            if(count($visualcats) > 0){
                foreach($visualcats as $visualcat){ array_push($search_ids, $visualcat->id); }
                $query = $query->whereIn('marketing_visual_category_id', $search_ids);
            }
            $query = $query->orWhere('file_path', 'LIKE', "%" . $post['query']['generalSearch'] . "%");
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
