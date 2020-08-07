<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use Mail;
use Maatwebsite\Excel\Excel as BaseExcel;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\HRLoanExport;
use App\Exports\OtherLoanExport;
use App\Exports\ReferFriendExport;
use Config;

class dailyMail extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'daily:mail';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send a Daily email to client with lead details';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $productArray=array(Config::get('constant')['APPLY_NOW_MAIL']['hr_loan'], Config::get('constant')['APPLY_NOW_MAIL']['business_loan'],Config::get('constant')['APPLY_NOW_MAIL']['loan_against_property'], Config::get('constant')['APPLY_NOW_MAIL']['loan_against_securities'],Config::get('constant')['APPLY_NOW_MAIL']['consumer_product_finance'],Config::get('constant')['APPLY_NOW_MAIL']['personal_loan']);
        //$productArray=array('rhuna0606@gmail.com','rhuna0606@gmail.com','rhuna0606@gmail.com','rhuna0606@gmail.com','rhuna0606@gmail.com','rhuna0606@gmail.com');
        foreach ($productArray as $key => $value) {
           if($key!=0){
            $raw= Excel::raw(new ReferFriendExport(null,$key), BaseExcel::XLSX) ;
            $subject="Refer Customer Lead Details";
            $this->sendMailToProduct($key,$value,$raw,$subject);
           }
            /*if($key==0){
                $raw=Excel::raw(new HRLoanExport(null,'hrLoan'), BaseExcel::XLSX) ;
                $subject="Apply Now Lead Details";
                $this->sendMailToProduct($key,$value,$raw,$subject);

            }else{

                $raw1= Excel::raw(new OtherLoanExport(null,$key), BaseExcel::XLSX) ;
                $raw2= Excel::raw(new ReferFriendExport(null,$key), BaseExcel::XLSX) ;
                $tyeArray=array($raw1,$raw2);
                foreach ($tyeArray as $key1 => $raw) {
                    $subject=($key1==0)? 'Apply Now Lead Details' : 'Refer Customer Lead Details';
                    $this->sendMailToProduct($key,$value,$raw,$subject);
                }
            }*/



        }

    }
    public function sendMailToProduct($key,$value,$raw,$subject){
        $data = array('name'=>"");
            switch ($key) {
                case '0':
                    $fileName='hr_loan';
                    break;
                case '1':
                    $fileName='business_loan';
                    break;
                case '2':
                    $fileName='loan_against_property';
                    break;
                case '3':
                    $fileName='loan_against_securities';
                    break;
                case '4':
                    $fileName='consumer_product_finance';
                    break;
                case '5':
                    $fileName='personal_loan';
                    break;
            }
            Mail::send('frontend.apply_now_requests.ApplyNowMail', $data, function($message) use($raw,$value,$fileName,$subject) {

                $message->to($value, 'Axis Bank')->subject
                   ($subject);

                $message->attachData($raw, $fileName.'.xlsx');
             });
             return true;
    }
}
