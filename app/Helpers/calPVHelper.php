<?php
namespace App\Helpers;

class calPVHelper
{

    function getPV( $interest_rate, $number_of_months,$amount)
        {
            $R=$interest_rate/1200;
            $m=1;
            $Z = 1 / (1 + ($R/$m));
            return ($amount * $Z * (1 - pow($Z,$number_of_months)))/(1 - $Z);
            
        }


    }

?>