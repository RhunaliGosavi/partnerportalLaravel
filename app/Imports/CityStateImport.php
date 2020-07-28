<?php

namespace App\Imports;

use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Carbon;
use PhpOffice\PhpSpreadsheet\Shared\Date;
use App\CityState;
use Helper;

class CityStateImport implements ToModel, WithChunkReading, WithHeadingRow, ShouldQueue
{
    /**
    * @param array $row
    *
    * @return DsaLead|null
    */
    public function model(array $row)
    {
        if(array_key_exists('pincode', $row)) {
	        $isPincodeExists = CityState::where('pincode', $row['pincode'])->first();
	        if(!$isPincodeExists) {
	            // $helper = new Helper;
	            // $pincodeExists = $helper->checkPincodeCode($row['pincode']);
	            
	            // if($pincodeExists) {
	                
                    return new CityState([
                        'pincode' => $row['pincode'],
                        'office_city' => $row['office_name'],
                        'state' => $row['state_name'],
                        'circle' => $row['circle_name'],
                        'region' => $row['region_name'],
                        'division' => $row['division_name'],
                        'office_type' => $row['office_type'],
                        'delivery' => $row['delivery'],
                        'district' => $row['district']
                    ]);
                // }
            }
        }
    }

    public function chunkSize(): int {
        return 1000;
    }
}
