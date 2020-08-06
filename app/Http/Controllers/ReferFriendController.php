<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Excel;
use App\ReferBuddy;
use App\Exports\ReferFriendExport;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Gd\Commands\DestroyCommand;

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

            $refer_friends = ReferBuddy::with('loan_product')->with('employee')->with('relation_with_customer')->limit($post['pagination']['perpage'])->offset(($post['pagination']['page'] -1) * $post['pagination']['perpage']);

            if(array_key_exists('sort', $post) && array_key_exists('field', $post['sort']) && array_key_exists('field', $post['sort'])) {
                //$refer_friends = $refer_friends->orderBy($post['sort']['field'],$post['sort']['sort']);
            }
            $refer_friends = $refer_friends->get()->toArray();
        } else {
            $refer_friends = ReferBuddy::with('loan_product')->with('employee')->with('relation_with_customer')->get()->toArray();
        }
//dd(DB::getQueryLog());
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
    public function showRelationshipWithCustomer(){
        return view('refer_friend.add_relationship_with_customer');
    }
    public function store(Request $request){
        $rules=array(
           'relWithCust'=>'required|alpha'
        );
        $messages = [
            'relWithCust.required' => 'Relationship with customer field is required',
            'relWithCust.alpha' => 'Enter valid data for relationship with customer field ',
        ];
        $request->validate($rules,$messages);
        DB::table('relationship_with_customer')
        ->updateOrInsert(
            ['relationship' => $request->relWithCust],
            ['relationship' => $request->relWithCust]
        );

        return redirect('relationshipWithCustomer')->with('success', 'Relationship added successfully!');


    }
    public function showList(){
        return view('refer_friend.list_of_relationship');
    }
    public function fetchRelationshipWithCustomer(Request $request) {

        $post = $request->all();
        $list = [];

        $rel_count = DB::table('relationship_with_customer')->count();
         $query=DB::table('relationship_with_customer');
        if(isset($post['query']['generalSearch'])) {

            $links =$query->where('relationship', 'LIKE', "%" . $post['query']['generalSearch'] . "%");
            $rel_count=count($links->get()->toArray());
        }


        if(array_key_exists('pagination', $post) && is_array($post['pagination']) && array_key_exists('page', $post['pagination']) && array_key_exists('perpage', $post['pagination']) && !empty($post['pagination']['perpage']) ) {

            $links = $query->limit($post['pagination']['perpage'])->offset(($post['pagination']['page'] -1) * $post['pagination']['perpage']);

            if(array_key_exists('sort', $post) && array_key_exists('field', $post['sort']) && array_key_exists('field', $post['sort'])) {
                $links = $links->orderBy($post['sort']['field'],$post['sort']['sort']);
            }
            $links = $links->get()->toArray();
        } else {
            $links = $query->get()->toArray();
        }

        $list['data'] = $links;
        $list['meta'] = [
            "page"      => (array_key_exists('page', $post['pagination']))?$post['pagination']['page']:1,
            "pages"     => (array_key_exists('pages', $post['pagination']))?$post['pagination']['pages']:0,
            "perpage"   => (array_key_exists('perpage', $post['pagination'])) ? $post['pagination']['perpage']:50,
            "total"     => $rel_count,
            "sort"      => (array_key_exists('sort', $post)) ? $post['sort']['field']:'',
            "field"     => (array_key_exists('sort', $post)) ? $post['sort']['sort']:'',
        ];

        return json_encode($list);
    }
    public function delete($id){

        DB::table('relationship_with_customer')->where('id', $id)->delete();
        return redirect('relationshipWithCustomer')->with('success', 'Record deleted successfully!');

    }
    public function edit(Request $request, $id) {
		$data['relationship'] =  DB::table('relationship_with_customer')->find($id);

		if($data['relationship']) {
			return view('refer_friend.edit_relationship_with_customer', $data);
		} else {
			return redirect('relationshipWithCustomer')->with('error', 'Data not found!');
		}

	}

	public function update(Request $request, $id) {
		$post = $request->all();
        $rules=array(
            'relWithCust'=>'required|alpha'
         );
         $messages = [
             'relWithCust.required' => 'Relationship with customer field is required',
             'relWithCust.alpha' => 'Enter valid data for relationship with customer field ',
         ];

        $request->validate($rules,$messages);


        DB::table('relationship_with_customer')
        ->updateOrInsert(
            ['id' => $id],
            ['relationship' => $request->relWithCust]
        );

        return redirect('relationshipWithCustomer')->with('success', 'Relationship updated successfully!');
	}



}
