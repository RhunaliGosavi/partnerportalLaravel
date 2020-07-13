<?php

use Illuminate\Database\Seeder;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       
        DB::table('employees')->insert(array(
            array(
            'employee_id'=>'1',
            'name'=>'Akshat Sawant',
            'email'=>'Akshat@gmail.com',
            'password'=>bcrypt('akshat123'),
            'pan_number'=>'ABCDE1234F',
            'mobile_number'=>'9873552847',
            'otp'=>'',
            'status'=>1,
            ),
            array(
             'employee_id'=>'2',
            'name'=>'Shweta Desai',
            'email'=>'Shweta@gmail.com',
            'password'=>bcrypt('sheta123'),
            'pan_number'=>'PQWE1234F',
            'mobile_number'=>'9867389234',
            'otp'=>'',
            'status'=>1,
            ),
            array(
            'employee_id'=>'3',
            'name'=>'Sonal Sawant',
            'email'=>'Sonal@gmail.com',
            'password'=>bcrypt('sonal123'),
            'pan_number'=>'OPIU1234F',
            'mobile_number'=>'9865234559',
            'otp'=>'',
            'status'=>1,
            ),
            array(
            'employee_id'=>'4',
            'name'=>'Ujjwala Patil',
            'email'=>'Ujjwala@gmail.com',
            'password'=>bcrypt('ujjwala123'),
            'pan_number'=>'LKJH1234F',
            'mobile_number'=>'9876543287',
            'otp'=>'',
            'status'=>1,
            ),
            array(
            'employee_id'=>'5',
            'name'=>'Rekha Naik',
            'email'=>'Rekha@gmail.com',
            'password'=>bcrypt('rekha123'),
            'pan_number'=>'NMJH1234F',
            'mobile_number'=>'9876876874',
            'otp'=>'',
            'status'=>1,
            ),
           
        ));
    }
}
