<?php 
	/**
	 * AMORTIZATION CALCULATOR
	 * @author PRANEETH NIDARSHAN
	 * @version V1.0
	 */
    namespace App\Helpers;
	class AmortizationHelper
	{
		private $loan_amount;
		private $term_years;
		private $interest;
		private $terms;
		private $period;
		private $currency = "XXX";
		private $principal;
		private $balance;
		private $term_pay;

		public function __construct($data)
		{
			if($this->validate($data)) {

				
				$this->loan_amount 	= (float) $data['loan_amount'];
				$this->term_years 	= (int) $data['term_years'];
				$this->interest 	= (float) $data['interest'];
				$this->terms 		= (int) $data['terms'];
				
				$this->terms = ($this->terms == 0) ? 1 : $this->terms;

				$this->period = $this->terms * $this->term_years;
				$this->interest = ($this->interest/100) / $this->terms;

				$results = array(
					'inputs' => $data,
					'summary' => $this->getSummary(),
					'schedule' => $this->getSchedule(),
					);

				$this->getJSON($results);
			}
		}

		private function validate($data) {
			$data_format = array(
				'loan_amount' 	=> 0,
				'term_years' 	=> 0,
				'interest' 		=> 0,
				'terms' 		=> 0
				);

			$validate_data = array_diff_key($data_format,$data);
			
			if(empty($validate_data)) {
				return true;
			}else{
				echo "<div style='background-color:#ccc;padding:0.5em;'>";
				echo '<p style="color:red;margin:0.5em 0em;font-weight:bold;background-color:#fff;padding:0.2em;">Missing Values</p>';
				foreach ($validate_data as $key => $value) {
					echo ":: Value <b>$key</b> is missing.<br>";
				}
				echo "</div>";
				return false;
			}
		}

		private function calculate()
		{
			$deno = 1 - 1 / pow((1+ $this->interest),$this->period);

			$this->term_pay = ($this->loan_amount * $this->interest) / $deno;
			$interest = $this->loan_amount * $this->interest;

			$this->principal = $this->term_pay - $interest;
			$this->balance = $this->loan_amount - $this->principal;

			return array (
				'payment' 	=> $this->term_pay,
				'interest' 	=> $interest,
				'principal' => $this->principal,
				'balance' 	=> $this->balance
				);
		}

		public function getSummary()
		{
			$this->calculate();
			$total_pay = $this->term_pay *  $this->period;
			$total_interest = $total_pay - $this->loan_amount;

			return array (
				'total_pay' => $total_pay,
				'total_interest' => $total_interest,
				);
		}

		public function getSchedule ()
		{
			$schedule = array();
			
			while  ($this->balance >= 0) { 
				array_push($schedule, $this->calculate());
				$this->loan_amount = $this->balance;
				$this->period--;
			}

			return $schedule;

		}

		private function getJSON($data)
		{
			header('Content-Type: application/json');
			echo json_encode($data);
        }
        public function getAmortizationTbl(){
            $amount=92000;
            $numpay=24;
            $rate=18;
         
            $rate=$rate/100;
            $monthly=$rate/12;
            $payment=(($amount*$monthly)/(1-pow((1+$monthly),-$numpay)));
            $total=$payment*$numpay;
            $interest=$total-$amount;
        
            $output = "";
            $detail = "";
        
            $output .= "<table align='center' style='width:90%;margin:10px'> \
                    <tr><td>Loan amount:</td><td align='right'>$".$amount."</td></tr><tr><td>Num payments:</td> \
                    <td align='right'>".$numpay."</td></tr><tr><td>Annual Rate:</td><td align='right'>".$rate."</td></tr> \
                    <tr><td>Monthly Rate:</td><td align='right'>".$monthly."</td></tr><tr><td>Monthly Payment:</td> \
                    <td align='right'>$".$payment."</td></tr><tr><td>Total Paid:</td><td align='right'>$".$total."</td></tr> \
                    <tr><td>Total Interest:</td><td align='right'>$".$interest."</td></tr></table>";
        
            $detail .= "<table border='0' align='center' cellpadding='5' cellspacing='0' width='97%' style='font-family:courier;font-size:12px'> \
                    <tr><td align='center' valign='bottom' bgcolor='white'><b>Pmt</b></td><td align='right' valign='bottom' bgcolor='white'><b>Amount</b></td> \
                    <td align='right' valign='bottom' bgcolor='white'><b>Interest</b></td><td align='right' valign='bottom' bgcolor='white'><b>Principal</b></td> \
                    <td align='right' valign='bottom' bgcolor='white'><b>Balance</b></td></tr><tr><td align='center' bgcolor='white'>0</td> \
                    <td align='center' bgcolor='white'>&nbsp;</td><td align='center' bgcolor='white'>&nbsp;</td><td align='center' bgcolor='white'>&nbsp;</td> \
                    <td align='right' bgcolor='white'>".$amount."</td></tr>";
        
            $newPrincipal=$amount;
        
            $i = 1;
            while ($i <= $numpay) {
           
                $newInterest=$monthly*$newPrincipal;
            $reduction=$payment-$newInterest;
            $newPrincipal=$newPrincipal-$reduction;
            if($reduction>$newPrincipal){$newPrincipal=0;}
         
                
                $detail .= "<tr><td align='center'>".$i."</td><td align='right' bgcolor='white'>".$payment."</td> \
                        <td align='right' bgcolor='white'>".$newInterest."</td> \
                        <td align='right' bgcolor='white'>".$reduction."</td> \
                <td align='right' bgcolor='white'>".$newPrincipal."</td></tr>";
         
        
                $i++;
            }
        
            $detail .= "</table>";
        
            return 	$detail;
        }
	}

	

	?>