<?php

namespace App\Helpers;

use Illuminate\Support\Facades\DB;

class calLapIncentiveHelper
{
    //$role: 1.sales officer 2.portfolio manager 3.area sales manager
    public function __construct($disbursementAmt,$role)
    {
     
        $this->disbursementAmt=$disbursementAmt;
        $this->role=$role;
    
    }
    
    public function calculateLapIncentive() 
    {
      
        $error='';
        $error.=empty($this->disbursementAmt) ? 'Disbursement Amount' :'';
        $error.=empty($this->role) ? (!empty($error)? ',':'').' Role' : '';
        $error.=!empty($error) ? ' Can not be empty' : '';
       if(empty($error)){
        
            $incentive = DB::table('incentive_slabs')->select("incentive_payout")
            ->whereRaw("CASE WHEN min = 1000000 and type='sales officer' THEN $this->disbursementAmt >= min and $this->disbursementAmt <=max WHEN min = 7500000 and type='portfolio manager' THEN $this->disbursementAmt >= min and $this->disbursementAmt <=max WHEN min = 90000000 and type='area sales manager' THEN $this->disbursementAmt >= min and $this->disbursementAmt <=max WHEN max = 0 THEN $this->disbursementAmt> min when max !=0 and min!=0 then $this->disbursementAmt> min and $this->disbursementAmt <=max END and type='$this->role'")
            ->get();
           
            if(empty($incentive->toArray())){
                return array('Incentive_eligible'=>0,'Incentive_amount'=>0);
            }
            $incentivePayout=number_format($incentive[0]->incentive_payout,2);
            $incentiveAmt=($this->disbursementAmt*($incentivePayout))/100;
            return array('Incentive_eligible'=>$incentive[0]->incentive_payout,'Incentive_amount'=>$incentiveAmt);
        
        }
        return array('error'=>$error);
      
    } 

   
        
}

?>