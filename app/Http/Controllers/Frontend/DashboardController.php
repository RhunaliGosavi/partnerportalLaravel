<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index(Request $request) {
       return view('frontend.dashboard.index');
    }
    public function getEmployeeAppDetails(Request $request){
        $startDate=$request->input('start_date');
        $enddate=$request->input('end_date');
        $to_month=$request->input('to_month');
        $to_year=$request->input('to_year');
        $lastDay=date("d", mktime(0, 0, 0, $to_month+1,0,$to_year));
        $lastMonth=date("M", mktime(0, 0, 0, $to_month+1,0,$to_year));
        
        $date='as on '.$lastMonth.' '.$lastDay .','.$to_year;
        if($to_month==date('m') && $to_year==date('Y')){
            $date='as on '.date('M').' '.date('d').','.date('Y');
        }
      
         DB::enableQueryLog();
        $query=DB::table('employee_application_details')
        ->select(
            'employee_id as id',
        
            DB::raw("SUM( ( CASE WHEN application_login_date>= '$startDate' AND application_login_date <= '$enddate' THEN  1  ELSE 0  END ) ) AS total_logins"),
            DB::raw("SUM( ( CASE WHEN disbursement_date >= '$startDate' AND disbursement_date <= '$enddate' THEN  application_status = 'Disbursed'  ELSE 0  END ) ) AS disbursed_cases"),
            DB::raw("SUM( ( CASE WHEN declined_date >= '$startDate' AND declined_date <= '$enddate' THEN  application_status = 'Declined' ELSE 0  END ) ) AS declined_cases"),
            DB::raw("SUM( ( CASE WHEN sanctioned_date >= '$startDate' AND sanctioned_date <= '$enddate' THEN  application_status = 'Sanctioned' ELSE 0  END ) ) AS sanctioned_cases")
        
        );
        $query->where('employee_id',Auth::user()->id);
        $query->groupBy('employee_id');
        $employee_app=$query->get();
        $employee_app->first();
        $employee_app->toArray();
        $data['data']=$employee_app;
        $data['as_on_date']=$date;
        $data['query']= $to_year;
        return json_encode( $data);
        
    }


   
}
