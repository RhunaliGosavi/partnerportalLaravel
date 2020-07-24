<?php

namespace App\Imports;

use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Illuminate\Support\Carbon;
use PhpOffice\PhpSpreadsheet\Shared\Date;
use App\BankBranch;
use Helper;

class BankBranchImport implements ToModel, WithChunkReading, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return DsaLead|null
    */
    public function model(array $row)
    {
        if(array_key_exists('ifsc', $row)) {
	        $isIFSCExists = BankBranch::where('ifsc', $row['ifsc'])->first();
	        if(!$isIFSCExists) {
	            // $helper = new Helper;
	            // $ifscExists = $helper->checkIFSCCode($row['ifsc']);
	            
	            // if($ifscExists) {
	                
                    return new BankBranch([
                        'ifsc' => $row['ifsc'],
                        'bank' => $row['bank'],
                        'branch' => $row['branch'],
                        'address' => $row['address'],
                        'contact' => $row['contact'],
                        'city' => $row['city'],
                        'district' => $row['district'],
                        'state' => $row['state']
                    ]);
                // }
            }
        }
    }

    public function chunkSize(): int {
        return 1000;
    }
}
