<?php

namespace App\Helpers;

use Illuminate\Support\Facades\DB;

class calLapIncentiveHelper
{
    //$role: 1.sales officer 2.portfolio manager
    public function calculateLapIncentive($disbursementAmt,$role) 
    {
       
        $error='';
        $error.=empty($disbursementAmt) ? 'Disbursement Amount' :'';
        $error.=empty($role) ? (!empty($error)? ',':'').' Role' : '';
        $error.=!empty($error) ? ' Can not be empty' : '';
       if(empty($error)){
           
            $incentive = DB::table('incentive_slabs')->select("incentive_payout")
            ->whereRaw("CASE WHEN min = 1000000 and type='sales officer' THEN $disbursementAmt >= min and $disbursementAmt <=max WHEN min = 7500000 and type='portfolio manager' THEN $disbursementAmt >= min and $disbursementAmt <=max WHEN max = 0 THEN $disbursementAmt> min when max !=0 and min!=0 then $disbursementAmt> min and $disbursementAmt <=max END and type='$role'")
            ->get();
            $incentivePayout=number_format($incentive[0]->incentive_payout,2);
            $incentiveAmt=($disbursementAmt*($incentivePayout))/100;
            return array('Incentive_eligible'=>$incentive[0]->incentive_payout,'Incentive_amount'=>$incentiveAmt);

        }
        return array('error'=>$error);
      
    } 

   
        
}

?>