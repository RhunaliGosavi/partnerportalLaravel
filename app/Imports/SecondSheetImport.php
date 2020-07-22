<?php
namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use App\EmployeeDashboard;
use Illuminate\Support\Carbon;
use Maatwebsite\Excel\Concerns\WithStartRow;
use PhpOffice\PhpSpreadsheet\Shared\Date;
use Illuminate\Support\Facades\DB;

class SecondSheetImport implements ToCollection,WithStartRow
{
    public function collection(Collection $rows)
    {
        ini_set('memory_limit', -1);
        ini_set('max_execution_time', 0);

        foreach ($rows as $row)
        {
         if(!empty($row[1])){

            $output = preg_replace('!\s+!', ' ',$row[6]);
            $application_status=trim($output);

            $res=EmployeeDashboard::updateOrCreate(['employee_id'=>$row[2],'application_number'=>$row[3]],[

                'employee_name'=>$row[1],
                'employee_id'=>$row[2],
                'application_number'=>$row[3],
                'customer_name'=>$row[4],
                'product_type'=>$row[5],
                'application_status'=>$application_status,
                'applied_amount'=>(double)$row[7],
                'sanctioned_amount'=>(double)$row[8],
                'disbursed_amount'=>(double)$row[9],
                'application_login_date'=>Carbon::parse(Date::excelToDateTimeObject($row[10])),
                'sanctioned_date'=>Carbon::parse(Date::excelToDateTimeObject($row[11])),
                'declined_date'=>Carbon::parse(Date::excelToDateTimeObject($row[12])),
                'disbursement_date'=>Carbon::parse(Date::excelToDateTimeObject($row[13])),
                'sales_officer_name'=>$row[14],
                'sales_supervisors_name'=>$row[15],
                'sourcing_location'=>$row[16],
                'sourcing_agency'=>$row[17],
                'updated_at'=>now(),
             ]);

            // if ($res->wasRecentlyCreated) {
                $new_str = str_replace(' ', '', $row[6]);//in case csv have (Partially  Disbursed) column with multiple spaces
                 if(trim($new_str)=='PartiallyDisbursed'){
                    $id = $res->id;
                    $setData=['application_tbl_id' => $id,'application_status'=>$row[6],'disbursed_amount'=>(double)$row[9],'disbursement_date'=>Carbon::parse(Date::excelToDateTimeObject($row[13])),'updated_at'=>now(), 'created_at'=>now()];
                    $res= DB::table('application_disburse_details')->updateOrInsert(['employee_id'=>$row[2],'application_number'=>$row[3],'application_tbl_id'=>$id,'disbursement_date'=>Carbon::parse(Date::excelToDateTimeObject($row[13]))],$setData);
                   // DB::table('application_disburse_details')->insert($setData);
                 }
             //}
            }
        }
    }
//To avoid header
    public function startRow(): int
    {
        return 2;
    }
}
