<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator, Helper, Excel;
use App\Imports\CityStateImport;
use App\CityState;

class CityStateController extends Controller
{
    public function index(){
        return view('cityState.index');
    }

    public function import(Request $request) 
    {
        ini_set('memory_limit', -1);
        ini_set('max_execution_time', 30);

        if ($request->method() == 'POST') {
            $requestData = $request->all();
            $validator = Validator::make($requestData, ['import_file' => 'required']);
            if ($validator->fails()) {
                return redirect()->back()->with('error', 'Excel file format invalid.');
            } else {
                if ($request->hasFile('import_file') && $request->file('import_file')->isValid()) {
                    $extensions = array("xls","xlsx","csv");
                    $result = array($request->file('import_file')->getClientOriginalExtension());

                    if(in_array($result[0],$extensions)){
                        $file=$request->file('import_file')->store('import');
                        
                        Excel::import(new CityStateImport, $file);   
                    } else {
                        return redirect()->back()->with('error', 'File format is invalid.');
                    }              
                }
            }
        }
        return redirect('city_state')->with('success', 'Import successfully added to queue.');
    }

    public function destroy(Request $request, $id) 
    {
        $cityState = CityState::find($id);

        if($cityState) {
            $cityState->delete();
            
            return redirect('city_state')->with('success', 'Record deleted successfully!');
        } else {
            return redirect('city_state')->with('error', 'Record not deleted !');
        }
    }

    public function fetchAllRecords(Request $request) {
        $post = $request->all();
        $list = [];

        $query = CityState::query();
        if(isset($post['query']['generalSearch'])) {
            $query = $query->orWhere('pincode', 'LIKE', "%" . $post['query']['generalSearch'] . "%")
                ->orWhere('office_city', 'LIKE', "%" . $post['query']['generalSearch'] . "%")
                ->orWhere('state', 'LIKE', "%" . $post['query']['generalSearch'] . "%")
                ->orWhere('circle', 'LIKE', "%" . $post['query']['generalSearch'] . "%")
                ->orWhere('region', 'LIKE', "%" . $post['query']['generalSearch'] . "%")
                ->orWhere('division', 'LIKE', "%" . $post['query']['generalSearch'] . "%")
                ->orWhere('office_type', 'LIKE', "%" . $post['query']['generalSearch'] . "%")
                ->orWhere('delivery', 'LIKE', "%" . $post['query']['generalSearch'] . "%")
                ->orWhere('district', 'LIKE', "%" . $post['query']['generalSearch'] . "%");
        }
        $city_states = $query->get();
        $city_states_count = count($city_states);
        if(array_key_exists('pagination', $post) && is_array($post['pagination']) && array_key_exists('page', $post['pagination']) && array_key_exists('perpage', $post['pagination']) && !empty($post['pagination']['perpage']) ) {

            $city_states = $query->limit($post['pagination']['perpage'])->offset(($post['pagination']['page'] -1) * $post['pagination']['perpage']);
            if(array_key_exists('sort', $post) && array_key_exists('field', $post['sort']) && array_key_exists('field', $post['sort'])) {
                $city_states = $city_states->orderBy($post['sort']['field'],$post['sort']['sort']);
            }
            $city_states = $city_states->get()->toArray();
            $list['meta'] = [
                "page"      => (array_key_exists('page', $post['pagination']))?$post['pagination']['page']:1,
                "pages"     => (array_key_exists('pages', $post['pagination']))?$post['pagination']['pages']:0,
                "perpage"   => (array_key_exists('perpage', $post['pagination'])) ? $post['pagination']['perpage']:50,
                "total"     => $city_states_count,
                "sort"      => (array_key_exists('sort', $post)) ? $post['sort']['field']:'',
                "field"     => (array_key_exists('sort', $post)) ? $post['sort']['sort']:'',
            ];
        } else {
            $city_states = $city_states->toArray();
        }
        $list['data'] = $city_states;

        return json_encode($list);
    }

    public function getBankListByPincode(Request $request) {
        $rules = [
			'pincode'   => 'required'
        ];
        $request->validate($rules);
        $officeCity = CityState::select('id', 'office_city as city','state')->where('pincode', $request->pincode)->get();
        return $officeCity;
    }
}
