<?php

use Illuminate\Database\Seeder;

class EmployeeHelpDeskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('employee_helpdesk')->insertOrIgnore(array(
            array(
              'id'=>1,
              'name' => 'rutu',
              'file_path' => "temp1.pdf",
              'file_size_in_mb'=>9.0,
              'created_at'=>now(),
              'updated_at'=>now()
            ),
            array(
                'id'=>2,
                'name' =>'rashmi',
                'file_path' => "temp2.pdf",
                'file_size_in_mb'=>1.0,
                'created_at'=>now(),
                'updated_at'=>now()
            ),
            array(
                'id'=>3,
                'name' => 'Shreya',
                'file_path' => "temp3.pdf",
                'file_size_in_mb'=>8.0,
                'created_at'=>now(),
                'updated_at'=>now()
            ),
            array(
                'id'=>4,
                'name' => 'Rhuna',
                'file_path' => "temp4.pdf",
                'file_size_in_mb'=>6.0,
                'created_at'=>now(),
                'updated_at'=>now()
            ),
            array(
                'id'=>5,
                'name' => 'yash',
                'file_path' => "temp5.pdf",
                'file_size_in_mb'=>9.0,
                'created_at'=>now(),
                'updated_at'=>now()
            ),
           
        ));

    }
}
