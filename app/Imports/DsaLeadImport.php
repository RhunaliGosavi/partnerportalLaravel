<?php

namespace App\Imports;

use App\DsaLead;
use App\Employee;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Illuminate\Support\Carbon;
use PhpOffice\PhpSpreadsheet\Shared\Date;
use Helper, Config;

class DsaLeadImport implements ToModel, WithChunkReading, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return DsaLead|null
    */
    public function model(array $row)
    {
        $isEmployeeExists = Employee::where('employee_id', $row['employee_id'])->first();
        if($isEmployeeExists) {
            $isLeadExists = DsaLead::where('pan_number', $row['applicants_pan'])->first();
            if(!$isLeadExists) {
                $helper = new Helper;
                $panResponse = $helper->checkPAN($row['applicants_pan']);
                if($panResponse && array_key_exists('statusInfo', $panResponse) && 'SUCCESS' == $panResponse['statusInfo']['status']) {
                    $result = $panResponse['response']['result'];
                    return new DsaLead([
                        'source_user_id' => $isEmployeeExists->id, 
                        'lead_generated_source' => Config::get('constant')['user_types']['AFL_EMPLOYEE'], 
                        'name' => $result['name'], 
                        'pan_number' => $row['applicants_pan'], 
                        'dob' => Carbon::parse(Date::excelToDateTimeObject($row['dob'])), 
                        'gender' => $row['gender'],
                        'mobile_number' => ltrim($row['mobile_number'],'0'), 
                        'email' => $row['email_id'], 
                        'bank_acc_number' => $row['bank_account_number'], 
                        'ifsc_code' => $row['ifsc_code'], 
                        'bank_name' => $row['bank_name'],
                        'branch_name' => $row['branch_name'], 
                        'upi_id' => $row['upi_id'], 
                        'address_proof_doc' => NULL, 
                        'address_type' => $row['address_type'], 
                        'address_line1' => $row['address_line_1'],
                        'address_line2' => $row['address_line_2'], 
                        'pincode' => $row['pincode'], 
                        'city' => $row['city'], 
                        'state' => $row['state'], 
                        'agency_name' => $row['agency_name'], 
                        'gst_number' => $row['gst_number'],
                        'office_mobile_number' => ltrim($row['official_mobile_number'],'0'), 
                        'office_email' => $row['official_email_id']
                    ]);
                }
            }
        }
    }

    public function chunkSize(): int {
        return 1000;
    }
}
