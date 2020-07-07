<?php

namespace App\Helpers;



class calAreaConversionHelper
{
    
    public function calculateArea($metrics,$unit) 
    {
       
        $error='';
        $error.=empty($metrics) ? 'metrics' :'';
        $error.=empty($unit) ? (!empty($error)? ',':'').' Unit' : '';
        $error.=!empty($error) ? ' Can not be empty' : '';
       if(empty($error)){
        switch ($metrics) {
            case 'biswa':
              $result=$this->getBiswaConversions($unit);
              break;
            case 'grounds':
              $result=$this->getGroundsConversion($unit); 
              break;
            case 'guntha':
              $result=$this->getGunthaConversions($unit);
              break;
            case 'hectares':
              $result=$this->getHectaresConversions($unit);
              break;
            case 'kanal':
               $result=$this->getKanalConversions($unit);
               break; 
            case 'square foot':
               $result=$this->getSquareFootConversions($unit);
               break;  
            case 'square meter':
               $result=$this->getSquareMetertConversions($unit);
               break;
            case 'square yards':
               $result=$this->getSquareYardsConversions($unit);
               break;
          }
          
            return $result;

        }
        return array('error'=>$error);
      
    } 

    public function getBiswaConversions($unit){
        $squareFoot=$unit*357142.8571;
        $squareMeters=$unit * 33179.6571;
        $squareYards=$unit*39682.5357;
        $hectares=$unit*3.2375;
        $bhighas=$unit * 20.4643;
        $acres=$unit * 8.1964 ;
        $guntha=$unit * 327.9285 ;
        $grounds=$unit * 148.7857;
        $biswa=$unit * 1.0000 ;
        $kanal=$unit * 66.1428;
        $ares=$unit * 331.8928;
        return array('square_foot'=>$squareFoot,'square_meter'=>$squareMeters,'square_yards'=>$squareYards,'hectares'=>$hectares,'bhighas'=>$bhighas,'acres'=>$acres,'guntha'=>$guntha,'grounds'=>$grounds,'biswa'=>$biswa,' kanal'=> $kanal,'ares'=>$ares);

  }
    public function getGroundsConversion($unit){

        $squareFoot=$unit*2400.0000  ;
        $squareMeters=$unit *223.0029 ;
        $squareYards=$unit* 266.7093 ;
        $hectares=$unit* 0.0223 ;
        $bhighas=$unit * 0.1377 ;
        $acres=$unit * 0.0551;
        $guntha=$unit *  2.2040;
        $grounds=$unit *1.0000 ;
        $biswa=$unit *  0.0069 ;
        $kanal=$unit * 0.4446 ;
        $ares=$unit *  2.2305 ;
        return array('square_foot'=>$squareFoot,'square_meter'=>$squareMeters,'square_yards'=>$squareYards,'hectares'=>$hectares,'bhighas'=>$bhighas,'acres'=>$acres,'guntha'=>$guntha,'grounds'=>$grounds,'biswa'=>$biswa,' kanal'=> $kanal,'ares'=>$ares);

    }
    public function getGunthaConversions($unit){
        $squareFoot=$unit*1089.0000 ;
        $squareMeters=$unit *101.1795 ;
        $squareYards=$unit* 121.0096 ;
        $hectares=$unit* 0.0100 ;
        $bhighas=$unit * 0.0624;
        $acres=$unit * 0.0250 ;
        $guntha=$unit *  1.0000  ;
        $grounds=$unit *0.4537 ;
        $biswa=$unit *  0.0030  ;
        $kanal=$unit * 0.2016  ;
        $ares=$unit *  1.0121 ;
        return array('square_foot'=>$squareFoot,'square_meter'=>$squareMeters,'square_yards'=>$squareYards,'hectares'=>$hectares,'bhighas'=>$bhighas,'acres'=>$acres,'guntha'=>$guntha,'grounds'=>$grounds,'biswa'=>$biswa,' kanal'=> $kanal,'ares'=>$ares);


    }
    public function getHectaresConversions($unit){
        $squareFoot=$unit*108695.6521;
        $squareMeters=$unit *10098.1565;
        $squareYards=$unit* 12077.2935  ;
        $hectares=$unit* 1.0000 ;
        $bhighas=$unit * 6.1776 ;
        $acres=$unit * 2.4946 ;
        $guntha=$unit *  99.8410 ;
        $grounds=$unit *45.2826 ;
        $biswa=$unit *  0.3089  ;
        $kanal=$unit * 20.1304 ;
        $ares=$unit *  101.0109  ;
        return array('square_foot'=>$squareFoot,'square_meter'=>$squareMeters,'square_yards'=>$squareYards,'hectares'=>$hectares,'bhighas'=>$bhighas,'acres'=>$acres,'guntha'=>$guntha,'grounds'=>$grounds,'biswa'=>$biswa,' kanal'=> $kanal,'ares'=>$ares);


    }
    public function getKanalConversions($unit){
        $squareFoot=$unit*5399.5680 ;
        $squareMeters=$unit *501.6363  ;
        $squareYards=$unit*559.9519;
        $hectares=$unit* 0.0497 ;
        $bhighas=$unit *0.3094  ;
        $acres=$unit * 4.9578 ;
        $guntha=$unit * 99.1592 ;
        $grounds=$unit *2.2494  ;
        $biswa=$unit *  0.0151 ;
        $kanal=$unit *  1.0000 ;
        $ares=$unit *  5.0178  ;
        return array('square_foot'=>$squareFoot,'square_meter'=>$squareMeters,'square_yards'=>$squareYards,'hectares'=>$hectares,'bhighas'=>$bhighas,'acres'=>$acres,'guntha'=>$guntha,'grounds'=>$grounds,'biswa'=>$biswa,' kanal'=> $kanal,'ares'=>$ares);



    }
    public function getSquareFootConversions($unit){

        $squareFoot=$unit*1.0000;
        $squareMeters=$unit *0.0930  ;
        $squareYards=$unit* 0.1110 ;
        $hectares=$unit* 0.0000  ;
        $bhighas=$unit * 0.0001  ;
        $acres=$unit * 0.0000 ;
        $guntha=$unit *  0.0009 ;
        $grounds=$unit *0.0004 ;
        $biswa=$unit *  0.0000 ;
        $kanal=$unit *  0.0000 ;
        $ares=$unit * 0.0009   ;
        return array('square_foot'=>$squareFoot,'square_meter'=>$squareMeters,'square_yards'=>$squareYards,'hectares'=>$hectares,'bhighas'=>$bhighas,'acres'=>$acres,'guntha'=>$guntha,'grounds'=>$grounds,'biswa'=>$biswa,' kanal'=> $kanal,'ares'=>$ares);


    }
    public function getSquareMetertConversions($unit){
        $squareFoot=$unit*10.7527 ;
        $squareMeters=$unit *1.0000  ;
        $squareYards=$unit*1.1947 ;
        $hectares=$unit* 0.0001 ;
        $bhighas=$unit * 0.0006 ;
        $acres=$unit *0.0002  ;
        $guntha=$unit *  0.0099  ;
        $grounds=$unit *0.0045  ;
        $biswa=$unit *  0.0000  ;
        $kanal=$unit *  0.0001 ;
        $ares=$unit *  0.0100  ;
        return array('square_foot'=>$squareFoot,'square_meter'=>$squareMeters,'square_yards'=>$squareYards,'hectares'=>$hectares,'bhighas'=>$bhighas,'acres'=>$acres,'guntha'=>$guntha,'grounds'=>$grounds,'biswa'=>$biswa,' kanal'=> $kanal,'ares'=>$ares);
        

    }
    public function getSquareYardsConversions($unit){

        $squareFoot=$unit*9.0000  ;
        $squareMeters=$unit *0.8370  ;
        $squareYards=$unit* 1.0000 ;
        $hectares=$unit* 0.0001 ;
        $bhighas=$unit * 0.0005   ;
        $acres=$unit * 0.0002  ;
        $guntha=$unit *  0.0083  ;
        $grounds=$unit *0.0038  ;
        $biswa=$unit *  0.0000    ;
        $kanal=$unit *  0.0001 ;
        $ares=$unit * 0.0084  ;
        return array('square_foot'=>$squareFoot,'square_meter'=>$squareMeters,'square_yards'=>$squareYards,'hectares'=>$hectares,'bhighas'=>$bhighas,'acres'=>$acres,'guntha'=>$guntha,'grounds'=>$grounds,'biswa'=>$biswa,' kanal'=> $kanal,'ares'=>$ares);


    }

   
        
}

?>