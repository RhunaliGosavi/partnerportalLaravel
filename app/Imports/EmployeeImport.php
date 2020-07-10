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
	                
                    return new Employee([
						'employee_id'     => $row['employee_id'],
						'mobile_number' => ltrim($row['mobile_number'],'0'),
						'password' => bcrypt('test123'),
						'status'   => ($row['status'] == 'Active') ? 1: 0,
						'name'     => $row['first_name'],
						'middle_name' => $row['middle_name'],
						'last_name' => $row['last_name'],
						'email'    => $row['official_email_id'],
						'hub_name' => $row['hub_name'],
						'company_name' => $row['company_name'],
						'work_location' => $row['work_location'],
						'state' => $row['state'],
						'department' => $row['department'],
						'designation' => $row['designation'],
						'job_role' => $row['job_role'],
						'product' => $row['product'],
						'reporting_manager_name' => $row['reporting_manager_name'],
						'manager_employee_id' => $row['manager_employee_id'],
                  ]);
                
	            }
	        }
	    }       
    }

    public function chunkSize(): int {
        return 1000;
    }
}