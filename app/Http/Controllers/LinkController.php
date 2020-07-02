<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator,Config, Helper, Excel;
use App\ImportantLink;
use App\Imports\EmployeeImport;

class LinkController extends Controller
{
	public function index() {
		return view('link.index');
	}

	public function fetchLinks(Request $request) {
		$post = $request->all();
        $list = [];

        $link_count = ImportantLink::count();
        if(array_key_exists('pagination', $post) && is_array($post['pagination']) && array_key_exists('page', $post['pagination']) && array_key_exists('perpage', $post['pagination']) && !empty($post['pagination']['perpage']) ) {
                
            $links = ImportantLink::limit($post['pagination']['perpage'])->offset(($post['pagination']['page'] -1) * $post['pagination']['perpage']);
            
            if(array_key_exists('sort', $post) && array_key_exists('field', $post['sort']) && array_key_exists('field', $post['sort'])) {
                $links = $links->orderBy($post['sort']['field'],$post['sort']['sort']);
            }
            $links = $links->get()->toArray();
        } else {
            $links = ImportantLink::get()->toArray();
        }

        $list['data'] = $links;
        $list['meta'] = [
            "page"      => (array_key_exists('page', $post['pagination']))?$post['pagination']['page']:1,
            "pages"     => (array_key_exists('pages', $post['pagination']))?$post['pagination']['pages']:0,
            "perpage"   => (array_key_exists('perpage', $post['pagination'])) ? $post['pagination']['perpage']:50,
            "total"     => $link_count,
            "sort"      => (array_key_exists('sort', $post)) ? $post['sort']['field']:'',
            "field"     => (array_key_exists('sort', $post)) ? $post['sort']['sort']:'',
        ];

        return json_encode($list);
	}

	public function create() {
		return view('link.create');
	}

	public function store(Request $request) {
		$post = $request->all();

        $rules = [
            'portal_name' => 'required',
            'web_link'    => 'required',
        ];

        $request->validate($rules);

        $link = new ImportantLink;
        $link->portal_name = $request->portal_name;
        $link->web_link    = $request->web_link;
        $link->save();

        return redirect('links')->with('success', 'Link created successfully!');
	}

	public function edit(Request $request, $id) {
		$data['link'] = ImportantLink::find($id);

		if($data['link']) {
			return view('link.edit', $data);
		} else {
			return redirect('links')->with('error', 'Link not found!');
		}

	}

	public function update(Request $request, $id) {
		$post = $request->all();

        $rules = [
            'portal_name' => 'required',
            'web_link'    => 'required',
        ];

        $request->validate($rules);

        $link = ImportantLink::find($id);
        $link->portal_name = $request->portal_name;
        $link->web_link    = $request->web_link;
        $link->save();

        return redirect('links')->with('success', 'Link updated successfully!');
	}

	public function delete(Request $request, $id) {
		$link = ImportantLink::find($id);

        if($link) {
            $link->delete();
            
            return redirect('links')->with('success', 'Link deleted successfully!');
        } else {
            return redirect('links')->with('error', 'Link not deleted successfully!');
        }
	}
}