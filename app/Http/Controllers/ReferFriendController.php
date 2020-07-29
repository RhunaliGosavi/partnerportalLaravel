<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Excel;
use App\ReferBuddy;
use App\Exports\ReferFriendExport;

class ReferFriendController extends Controller
{
	public function index() {
		return view('refer_friend.index');
	}

	public function referFriendRequests(Request $request) {
		$post = $request->all();
        $list = [];
      
        $refer_friend_count = ReferBuddy::count();

        if(array_key_exists('pagination', $post) && is_array($post['pagination']) && array_key_exists('page', $post['pagination']) && array_key_exists('perpage', $post['pagination']) && !empty($post['pagination']['perpage']) ) {
                
            $refer_friends = ReferBuddy::with('loan_product')->with('employee')->limit($post['pagination']['perpage'])->offset(($post['pagination']['page'] -1) * $post['pagination']['perpage']);
            
            if(array_key_exists('sort', $post) && array_key_exists('field', $post['sort']) && array_key_exists('field', $post['sort'])) {
                $refer_friends = $refer_friends->orderBy($post['sort']['field'],$post['sort']['sort']);
            }
            $refer_friends = $refer_friends->get()->toArray();
        } else {
            $refer_friends = ReferBuddy::with('loan_product')->with('employee')->get()->toArray();
        }

        $list['data'] = $refer_friends;
        $list['meta'] = [
            "page"      => (array_key_exists('page', $post['pagination']))?$post['pagination']['page']:1,
            "pages"     => (array_key_exists('pages', $post['pagination']))?$post['pagination']['pages']:0,
            "perpage"   => (array_key_exists('perpage', $post['pagination'])) ? $post['pagination']['perpage']:50,
            "total"     => $refer_friend_count,
            "sort"      => (array_key_exists('sort', $post)) ? $post['sort']['field']:'',
            "field"     => (array_key_exists('sort', $post)) ? $post['sort']['sort']:'',
        ];

        return json_encode($list);
	}

	public function export() {
    	return Excel::download(new ReferFriendExport, 'refer_friend.xlsx');
	}
}