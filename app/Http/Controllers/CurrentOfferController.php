<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CurrentOffer;
use Illuminate\Support\Facades\Storage;

class CurrentOfferController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('salesKit.currentOffers.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('salesKit.currentOffers.create');
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
                $request->file('file')->storeAs('public/sales/kit/currentoffer',$fileNameToStore);
                $process = CurrentOffer::create(
                    ['file_path' =>$fileNameToStore]
                );
                if(! $process){
                return redirect()->back()->with('error', 'Failed To Update Data'); 
                }

            }else{
                return redirect()->back()->with('error', 'File format is invalid.');
            }
        }
        return redirect('currentOffer')->with('success', 'Current Offer added successfully!');
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
        $currentOffer = CurrentOffer::find($id);
        return view('salesKit.currentOffers.edit', [
            'currentOffer' => $currentOffer
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
            'file' => 'required'
        ];
        $currentOffer = CurrentOffer::find($id);
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
                Storage::disk('local')->delete('public/sales/kit/currentoffer/'.$currentOffer->file_path);
                $request->file('file')->storeAs('public/sales/kit/currentoffer',$fileNameToStore);
            }else{
                return redirect()->back()->with('error', 'File format is invalid.');
            }
        }
        $fileNameToStore = ($fileNameToStore) ? $fileNameToStore : $currentOffer->file_path;
        $process = $currentOffer->update(
            ['file_path' =>$fileNameToStore]
        );
        if(! $process){
            return redirect()->back()->with('error', 'Failed To Update Data'); 
        }
        return redirect('currentOffer')->with('success', 'Current Offer updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $currentOffer = CurrentOffer::find($id);
        if($currentOffer) {
            Storage::disk('local')->delete('public/sales/kit/currentoffer/'.$currentOffer->file_path);
            $currentOffer->delete();
            return redirect('currentOffer')->with('success', 'Current offer deleted successfully!');
        } else {
            return redirect('currentOffer')->with('error', 'Current offer not deleted successfully!');
        }
    }

    public function fetchAllOffers(Request $request)
    {
        $post = $request->all();
        $list = [];

        $query = CurrentOffer::query();
        if(isset($post['query']['generalSearch'])) {
            $query = $query->orWhere('file_path', 'LIKE', "%" . $post['query']['generalSearch'] . "%");
        }
        $currentOffers = $query->get();
        $currentOffers_count = count($currentOffers);
        if(array_key_exists('pagination', $post) && is_array($post['pagination']) && array_key_exists('page', $post['pagination']) && array_key_exists('perpage', $post['pagination']) && !empty($post['pagination']['perpage']) ) {
                
            $currentOffers = $query->limit($post['pagination']['perpage'])->offset(($post['pagination']['page'] -1) * $post['pagination']['perpage']);
            if(array_key_exists('sort', $post) && array_key_exists('field', $post['sort']) && array_key_exists('field', $post['sort'])) {
                $currentOffers = $currentOffers->orderBy($post['sort']['field'],$post['sort']['sort']);
            }
            $currentOffers = $currentOffers->get()->toArray();
            $list['meta'] = [
                "page"      => (array_key_exists('page', $post['pagination']))?$post['pagination']['page']:1,
                "pages"     => (array_key_exists('pages', $post['pagination']))?$post['pagination']['pages']:0,
                "perpage"   => (array_key_exists('perpage', $post['pagination'])) ? $post['pagination']['perpage']:50,
                "total"     => $currentOffers_count,
                "sort"      => (array_key_exists('sort', $post)) ? $post['sort']['field']:'',
                "field"     => (array_key_exists('sort', $post)) ? $post['sort']['sort']:'',
            ];
        } else {
            $currentOffers = $currentOffers->toArray();
        }
        $list['data'] = $currentOffers;

        return json_encode($list);
    }
}
