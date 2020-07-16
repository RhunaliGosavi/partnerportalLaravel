<?php 
	
    namespace App\Helpers;
	class AmortizationHelper
	{
		
        public function getAmortizationTbl($amount,$rate,$emi){
            $rate=$rate/100;
            $monthly=$rate/12;
            $payment=$emi;
            $schedule=array();
          
        
            $newPrincipal=$amount;
        
            $i = 1;
            $schedule['sum_interest']=0;
            $schedule['sum_principal']=0;
            while ($i <= $newPrincipal) {
           
            $newInterest=$monthly*$newPrincipal;
            $reduction=$payment-$newInterest;
            $newPrincipal=$newPrincipal-$reduction;
            //if($reduction>$newPrincipal){$newPrincipal=0;}
            if(0>=$newPrincipal){$newPrincipal=0;}
			if($reduction<0){
				$schedule['month']=0;
			    break;
			 }
			 
              //required last row only 
			   $schedule['month']= $i;
			   $schedule['EMI']= $payment;
			   $schedule['Interest']= $newInterest;
			   $schedule['Principal']= $reduction;
               $schedule['Balance']= $newPrincipal;
               $schedule['sum_interest'] += $newInterest;
               $schedule['sum_principal'] += $reduction;

                $i++;
            }
          return 	$schedule;
        }


	}

	

	?>