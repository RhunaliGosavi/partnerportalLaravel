<?php

namespace App\Helpers;


class calPMTHelper
{
    public function calPmt(  $i, $term,$amt ) {

        $int = $i/1200;
        $int1 = 1+$int;
        $r1 = pow($int1, $term);
        $pmt = $amt*($int*$r1)/($r1-1);
        return $pmt;
    } 
        
}