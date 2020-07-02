<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator,Config, Helper, Excel;
use App\DocumentChecklistCategory;

class DocumentChecklistController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('salesKit.docChecklist.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('salesKit.docChecklist.create');
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
            'name'      => 'required'
        ];
        $request->validate($rules);
        if($this->checkIfExist($post)) return redirect('docCheckCategory')->with('error', 'Document checklist category already exist!');
        $dCheckCat = new DocumentChecklistCategory;
        $dCheckCat->name = $post['name'];
        $dCheckCat->save();
        return redirect('docCheckCategory')->with('success', 'Document checklist category added successfully!');
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
        $dCheckCat = DocumentChecklistCategory::find($id);
        return view('salesKit.docChecklist.edit', compact('dCheckCat'));
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
            'name'      => 'required'
        ];
        $dCheckCat = DocumentChecklistCategory::find($id);
        // if($this->checkIfExist($post)) return redirect('salesProduct')->with('error', 'Loan Product already exist!');
        $dCheckCat->name = $post['name'];
        $dCheckCat->save();
        return redirect('docCheckCategory')->with('success', 'Document checklist category updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $dCheckCat = DocumentChecklistCategory::find($id);
        if($dCheckCat) {
            $dCheckCat->delete();
            return redirect('docCheckCategory')->with('success', 'Document checklist category deleted successfully!');
        } else {
            return redirect('docCheckCategory')->with('error', 'Document checklist category not deleted successfully!');
        }
    }

    public function fetchAllCategories(Request $request)
    {
        $post = $request->all();
        $list = [];

        $query = DocumentChecklistCategory::query();
        if(isset($post['query']['generalSearch'])) {
            $query = $query->where('name', 'LIKE', "%" . $post['query']['generalSearch'] . "%");
        }
        $docCheckCat = $query->get();
        $docCheckCat_count = count($docCheckCat);
        if(array_key_exists('pagination', $post) && is_array($post['pagination']) && array_key_exists('page', $post['pagination']) && array_key_exists('perpage', $post['pagination']) && !empty($post['pagination']['perpage']) ) {
                
            $docCheckCat = $query->limit($post['pagination']['perpage'])->offset(($post['pagination']['page'] -1) * $post['pagination']['perpage']);
            if(array_key_exists('sort', $post) && array_key_exists('field', $post['sort']) && array_key_exists('field', $post['sort'])) {
                $docCheckCat = $docCheckCat->orderBy($post['sort']['field'],$post['sort']['sort']);
            }
            $docCheckCat = $docCheckCat->get()->toArray();
            $list['meta'] = [
                "page"      => (array_key_exists('page', $post['pagination']))?$post['pagination']['page']:1,
                "pages"     => (array_key_exists('pages', $post['pagination']))?$post['pagination']['pages']:0,
                "perpage"   => (array_key_exists('perpage', $post['pagination'])) ? $post['pagination']['perpage']:50,
                "total"     => $docCheckCat_count,
                "sort"      => (array_key_exists('sort', $post)) ? $post['sort']['field']:'',
                "field"     => (array_key_exists('sort', $post)) ? $post['sort']['sort']:'',
            ];
        } else {
            $docCheckCat = DocumentChecklistCategory::get()->toArray();
        }

        $list['data'] = $docCheckCat;

        return json_encode($list);
    }

    public function checkIfExist($postData)
    {
        $data = DocumentChecklistCategory::where('name', $postData['name'])->get();
        if(count($data) > 0){
            return true;
        } else {
            return false;
        }
    }
}
