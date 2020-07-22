<?php

namespace App\Http\Controllers\Frontend;

use App\EmployeeDashboard;
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
    public function totalLogins(){
        return view('frontend.dashboard.totalLogins');
    }
    public function sanctionCasesDetails(){
        return view('frontend.dashboard.sanctionedCasesDetails');
    }
    public function declinedCasesDetails(){
        return view('frontend.dashboard.DeclinedCasesDetails');
    }
    public function disbursedDetails(){
        return view('frontend.dashboard.disbursedCasesDetails');
    }


    public function getAppDetails(Request $request){

        $startDate=$request->input('start_date');
        $enddate=$request->input('end_date');
        $search_val=$request->input('search_val');
        $type=$request->input('type');

       DB::enableQueryLog();
       $result=EmployeeDashboard::select("employee_application_details.*", DB::raw("DATE_FORMAT(employee_application_details.sanctioned_date, '%d/%m/%Y') as sanctioned_date , DATE_FORMAT(employee_application_details.disbursement_date, '%d/%m/%Y') as disbursement_date,DATE_FORMAT(employee_application_details.application_login_date, '%d/%m/%Y') as application_login_date"));
       if($type=="sanctioned"){
            $result->where('sanctioned_date','>=',$startDate)
                ->where('sanctioned_date','<=',$enddate)
                ->where('application_status','=', 'Sanctioned');
       }
       if($type=="login"){
             $result->where('application_login_date','>=',$startDate)
                     ->where('application_login_date','<=',$enddate);
       }
       if($type=='decline'){
              $result->where('declined_date','>=',$startDate)
                    ->where('declined_date','<=',$enddate)
                    ->where('application_status','=', 'Declined');

       }
       if($type=='disbursed'){
               $result->leftJoin('application_disburse_details', 'employee_application_details.id', '=', 'application_disburse_details.application_tbl_id')
                    ->select("employee_application_details.*", DB::raw("DATE_FORMAT(application_disburse_details.disbursement_date, '%d/%m/%Y') as disbursement_date_partial,DATE_FORMAT(employee_application_details.sanctioned_date, '%d/%m/%Y') as sanctioned_date , DATE_FORMAT(employee_application_details.disbursement_date, '%d/%m/%Y') as disbursement_date,DATE_FORMAT(employee_application_details.application_login_date, '%d/%m/%Y') as application_login_date,application_disburse_details.disbursed_amount as disbursed_amount_partial"))
                    ->where('employee_application_details.disbursement_date','>=',$startDate)
                    ->where('employee_application_details.disbursement_date','<=',$enddate)
                    ->where(function($q) {
                        $q->where('employee_application_details.application_status','=', 'Disbursed')
                          ->orWhere('employee_application_details.application_status','=', 'Partially Disbursed');
                    });

        }

       if(!empty($search_val)){
            $result->where(function($r) use($search_val) {
                $r->Where('employee_application_details.application_status', 'like', '%' .$search_val. '%')
                ->orWhere('employee_application_details.customer_name', 'like', '%' .$search_val. '%')
                ->orWhere('employee_application_details.sales_officer_name', 'like', '%' .$search_val. '%')
                ->orWhere('employee_application_details.sales_supervisors_name', 'like', '%' .$search_val. '%')
                ->orWhere('employee_application_details.product_type', 'like', '%' .$search_val. '%');;
            });


        }
        $result->where('employee_application_details.employee_id',Auth::user()->id);

        $result=$result->get()->toArray();
   //dd(DB::getQueryLog());
        return json_encode($result);


    }



}
