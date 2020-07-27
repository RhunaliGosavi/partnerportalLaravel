<?php

namespace App\Helpers;



class calAreaConversionHelper
{
    public function __construct($metrics,$unit)
    {
       $this->metrics=$metrics;
       $this->unit=$unit;
    }
    public function calculateArea()
    {

        $error='';
        $error.=empty($this->metrics) ? 'metrics' :'';
        $error.=empty($this->unit) ? (!empty($error)? ',':'').' Unit' : '';
        $error.=!empty($error) ? ' Can not be empty' : '';
       if(empty($error)){
        switch ($this->metrics) {
            case 'biswa':
              $result=$this->getBiswaConversions();
              break;
            case 'grounds':
              $result=$this->getGroundsConversion();
              break;
            case 'guntha':
              $result=$this->getGunthaConversions();
              break;
            case 'hectares':
              $result=$this->getHectaresConversions();
              break;
            case 'kanal':
               $result=$this->getKanalConversions();
               break;
            case 'square foot':
               $result=$this->getSquareFootConversions();
               break;
            case 'square meter':
               $result=$this->getSquareMetertConversions();
               break;
            case 'square yards':
               $result=$this->getSquareYardsConversions();
               break;
            case 'acres':
                $result=$this->getacresConversions();
                 break;
            case 'ares':
                $result=$this->getaresConversions();
                break;
            case 'bhighas':
                $result=$this->getbhighasConversions();
                break;




          }

            return $result;

        }
        return array('error'=>$error);

    }

    public function getBiswaConversions(){
        $squareFoot=$this->unit*357142.8571;
        $squareMeters=$this->unit * 33179.6571;
        $squareYards=$this->unit*39682.5357;
        $hectares=$this->unit*3.2375;
        $bhighas=$this->unit * 20.4643;
        $acres=$this->unit * 8.1964 ;
        $guntha=$this->unit * 327.9285 ;
        $grounds=$this->unit * 148.7857;
        $biswa=$this->unit * 1.0000 ;
        $kanal=$this->unit * 66.1428;
        $ares=$this->unit * 331.8928;
        return array('square_foot'=>$squareFoot,'square_meter'=>$squareMeters,'square_yards'=>$squareYards,'hectares'=>$hectares,'bhighas'=>$bhighas,'acres'=>$acres,'guntha'=>$guntha,'grounds'=>$grounds,'biswa'=>$biswa,'kanal'=> $kanal,'ares'=>$ares);

  }
    public function getGroundsConversion(){

        $squareFoot=$this->unit*2400.0000  ;
        $squareMeters=$this->unit *223.0029 ;
        $squareYards=$this->unit* 266.7093 ;
        $hectares=$this->unit* 0.0223 ;
        $bhighas=$this->unit * 0.1377 ;
        $acres=$this->unit * 0.0551;
        $guntha=$this->unit *  2.2040;
        $grounds=$this->unit *1.0000 ;
        $biswa=$this->unit *  0.0069 ;
        $kanal=$this->unit * 0.4446 ;
        $ares=$this->unit *  2.2305 ;
        return array('square_foot'=>$squareFoot,'square_meter'=>$squareMeters,'square_yards'=>$squareYards,'hectares'=>$hectares,'bhighas'=>$bhighas,'acres'=>$acres,'guntha'=>$guntha,'grounds'=>$grounds,'biswa'=>$biswa,'kanal'=> $kanal,'ares'=>$ares);

    }
    public function getGunthaConversions(){
        $squareFoot=$this->unit*1089.0000 ;
        $squareMeters=$this->unit *101.1795 ;
        $squareYards=$this->unit* 121.0096 ;
        $hectares=$this->unit* 0.0100 ;
        $bhighas=$this->unit * 0.0624;
        $acres=$this->unit * 0.0250 ;
        $guntha=$this->unit *  1.0000  ;
        $grounds=$this->unit *0.4537 ;
        $biswa=$this->unit *  0.0030  ;
        $kanal=$this->unit * 0.2016  ;
        $ares=$this->unit *  1.0121 ;
        return array('square_foot'=>$squareFoot,'square_meter'=>$squareMeters,'square_yards'=>$squareYards,'hectares'=>$hectares,'bhighas'=>$bhighas,'acres'=>$acres,'guntha'=>$guntha,'grounds'=>$grounds,'biswa'=>$biswa,'kanal'=> $kanal,'ares'=>$ares);


    }
    public function getHectaresConversions(){
        $squareFoot=$this->unit*108695.6521;
        $squareMeters=$this->unit *10098.1565;
        $squareYards=$this->unit* 12077.2935  ;
        $hectares=$this->unit* 1.0000 ;
        $bhighas=$this->unit * 6.1776 ;
        $acres=$this->unit * 2.4946 ;
        $guntha=$this->unit *  99.8410 ;
        $grounds=$this->unit*45.2826 ;
        $biswa=$this->unit *  0.3089  ;
        $kanal=$this->unit * 20.1304 ;
        $ares=$this->unit *  101.0109  ;
        return array('square_foot'=>$squareFoot,'square_meter'=>$squareMeters,'square_yards'=>$squareYards,'hectares'=>$hectares,'bhighas'=>$bhighas,'acres'=>$acres,'guntha'=>$guntha,'grounds'=>$grounds,'biswa'=>$biswa,'kanal'=> $kanal,'ares'=>$ares);


    }
    public function getKanalConversions(){
        $squareFoot=$this->unit*5399.5680 ;
        $squareMeters=$this->unit *501.6363  ;
        $squareYards=$this->unit*559.9519;
        $hectares=$this->unit* 0.0497 ;
        $bhighas=$this->unit *0.3094  ;
        $acres=$this->unit* 4.9578 ;
        $guntha=$this->unit * 99.1592 ;
        $grounds=$this->unit *2.2494  ;
        $biswa=$this->unit *  0.0151 ;
        $kanal=$this->unit *  1.0000 ;
        $ares=$this->unit *  5.0178  ;
        return array('square_foot'=>$squareFoot,'square_meter'=>$squareMeters,'square_yards'=>$squareYards,'hectares'=>$hectares,'bhighas'=>$bhighas,'acres'=>$acres,'guntha'=>$guntha,'grounds'=>$grounds,'biswa'=>$biswa,'kanal'=> $kanal,'ares'=>$ares);



    }
    public function getSquareFootConversions(){

        $squareFoot=$this->unit*1.0000;
        $squareMeters=$this->unit *0.0930  ;
        $squareYards=$this->unit* 0.1110 ;
        $hectares=$this->unit* 0.0000  ;
        $bhighas=$this->unit * 0.0001  ;
        $acres=$this->unit * 0.0000 ;
        $guntha=$this->unit *  0.0009 ;
        $grounds=$this->unit *0.0004 ;
        $biswa=$this->unit *  0.0000 ;
        $kanal=$this->unit *  0.0000 ;
        $ares=$this->unit* 0.0009   ;
        return array('square_foot'=>$squareFoot,'square_meter'=>$squareMeters,'square_yards'=>$squareYards,'hectares'=>$hectares,'bhighas'=>$bhighas,'acres'=>$acres,'guntha'=>$guntha,'grounds'=>$grounds,'biswa'=>$biswa,'kanal'=> $kanal,'ares'=>$ares);


    }
    public function getSquareMetertConversions(){
        $squareFoot=$this->unit*10.7527 ;
        $squareMeters=$this->unit *1.0000  ;
        $squareYards=$this->unit*1.1947 ;
        $hectares=$this->unit* 0.0001 ;
        $bhighas=$this->unit * 0.0006 ;
        $acres=$this->unit *0.0002  ;
        $guntha=$this->unit *  0.0099  ;
        $grounds=$this->unit*0.0045  ;
        $biswa=$this->unit*  0.0000  ;
        $kanal=$this->unit *  0.0001 ;
        $ares=$this->unit *  0.0100  ;
        return array('square_foot'=>$squareFoot,'square_meter'=>$squareMeters,'square_yards'=>$squareYards,'hectares'=>$hectares,'bhighas'=>$bhighas,'acres'=>$acres,'guntha'=>$guntha,'grounds'=>$grounds,'biswa'=>$biswa,'kanal'=> $kanal,'ares'=>$ares);


    }
    public function getSquareYardsConversions(){

        $squareFoot=$this->unit*9.0000  ;
        $squareMeters=$this->unit *0.8370  ;
        $squareYards=$this->unit* 1.0000 ;
        $hectares=$this->unit* 0.0001 ;
        $bhighas=$this->unit * 0.0005   ;
        $acres=$this->unit* 0.0002  ;
        $guntha=$this->unit *  0.0083  ;
        $grounds=$this->unit *0.0038  ;
        $biswa=$this->unit*  0.0000    ;
        $kanal=$this->unit *  0.0001 ;
        $ares=$this->unit* 0.0084  ;
        return array('square_foot'=>$squareFoot,'square_meter'=>$squareMeters,'square_yards'=>$squareYards,'hectares'=>$hectares,'bhighas'=>$bhighas,'acres'=>$acres,'guntha'=>$guntha,'grounds'=>$grounds,'biswa'=>$biswa,'kanal'=> $kanal,'ares'=>$ares);


    }
    public function getacresConversions(){
        $squareFoot=$this->unit*43560.4006;
        $squareMeters=$this->unit *4048.0000;
        $squareYards=$this->unit*4841.4420;
        $hectares=$this->unit* 0.4009;
        $bhighas=$this->unit * 2.4967;
        $acres=$this->unit* 1.0000;
        $guntha=$this->unit * 40.0004;
        $grounds=$this->unit *18.1502;
        $biswa=$this->unit* 0.1220;
        $kanal=$this->unit *  8.0697;
        $ares=$this->unit* 40.4836;
        return array('square_foot'=>$squareFoot,'square_meter'=>$squareMeters,'square_yards'=>$squareYards,'hectares'=>$hectares,'bhighas'=>$bhighas,'acres'=>$acres,'guntha'=>$guntha,'grounds'=>$grounds,'biswa'=>$biswa,'kanal'=> $kanal,'ares'=>$ares);

    }

    public function getaresConversions(){

        $squareFoot=$this->unit*1076.0000;
        $squareMeters=$this->unit *99.9709;
        $squareYards=$this->unit*119.5556;
        $hectares=$this->unit* 0.0098;
        $bhighas=$this->unit * 0.0618;
        $acres=$this->unit* 0.0247;
        $guntha=$this->unit * 0.9881;
        $grounds=$this->unit *0.4483;
        $biswa=$this->unit* 0.0031;
        $kanal=$this->unit *  0.1993;
        $ares=$this->unit* 1.0000;
        return array('square_foot'=>$squareFoot,'square_meter'=>$squareMeters,'square_yards'=>$squareYards,'hectares'=>$hectares,'bhighas'=>$bhighas,'acres'=>$acres,'guntha'=>$guntha,'grounds'=>$grounds,'biswa'=>$biswa,'kanal'=> $kanal,'ares'=>$ares);

    }

    public function getbhighasConversions(){

        $squareFoot=$this->unit*17452.0070;
        $squareMeters=$this->unit *1620.4320;
        $squareYards=$this->unit*1939.1116;
        $hectares=$this->unit* 0.1606;
        $bhighas=$this->unit *1.0000;
        $acres=$this->unit* 0.4005;
        $guntha=$this->unit * 16.0244;
        $grounds=$this->unit *7.2705;
        $biswa=$this->unit* 0.0489;
        $kanal=$this->unit *  3.2321;
        $ares=$this->unit* 16.2181;
        return array('square_foot'=>$squareFoot,'square_meter'=>$squareMeters,'square_yards'=>$squareYards,'hectares'=>$hectares,'bhighas'=>$bhighas,'acres'=>$acres,'guntha'=>$guntha,'grounds'=>$grounds,'biswa'=>$biswa,'kanal'=> $kanal,'ares'=>$ares);

    }


}

?>
