<?php

namespace App\Imports;

use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Illuminate\Support\Carbon;
use PhpOffice\PhpSpreadsheet\Shared\Date;
use App\CityState;
use Helper;

class CityStateImport implements ToModel, WithChunkReading, WithHeadingRow
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
	            $helper = new Helper;
	            // $pincodeExists = $helper->checkPincodeCode($row['pincode']);
	            
	            // if($pincodeExists) {
	                
                    return new BankBranch([
                        'pincode' => $row['pincode'],
                        'city_name' => $row['city_name'],
                        'state_name' => $row['state_name']
                    ]);
                // }
            }
        }
    }

    public function chunkSize(): int {
        return 1000;
    }
}
