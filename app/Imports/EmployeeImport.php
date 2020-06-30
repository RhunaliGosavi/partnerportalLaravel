<?php

namespace App\Imports;

use App\Employee;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Helper;

class EmployeeImport implements ToModel, WithChunkReading, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return User|null
     */
    public function model(array $row) {
    	if(array_key_exists('employee_id', $row)) {
	        $isEmployeeExists = Employee::where('employee_id', $row['employee_id'])->first();
	        if(!$isEmployeeExists) {
	            $helper = new Helper;
	            $employeeExists = $helper->checkEmployee($row['employee_id']);

	            if($employeeExists) {
	                $panResponse = $helper->checkPAN($row['pan_number']);

	                if($panResponse && array_key_exists('statusInfo', $panResponse) && 'SUCCESS' == $panResponse['statusInfo']['status']) {
	                    $result = $panResponse['response']['result'];

	                    return new Employee([
	                     'employee_id'     => $row['employee_id'],
	                     'pan_number'    => $row['pan_number'],
	                     'mobile_number' => ltrim($row['mobile_number'],'0'),
	                     'password' => bcrypt('test123'),
	                     'status'   => 1,
	                     'name'     => $result['name']
	                  ]);
	                }
	            }
	        }
	    }       
    }

    public function chunkSize(): int {
        return 1000;
    }
}