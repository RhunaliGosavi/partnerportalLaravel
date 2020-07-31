<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

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
            'hub_name'=>'thane',
            'company_name'=>'squad',
            'work_location'=>'Thane',
            'state'=>'maharashtra',
            'department'=>'IT',
            'designation'=>'dev',
            'job_role'=>'manager',
            'product'=>'test',
            'middle_name'=>'Shreyas',
            'last_name'=>'sawant',
            'reporting_manager_name'=>'yash',
            'manager_employee_id'=>'23447',
            'status'=>1,
            ),
            /*array(
             'employee_id'=>'2',
            'name'=>'Shweta Desai',
            'email'=>'Shweta@gmail.com',
            'password'=>bcrypt('sheta123'),
            'pan_number'=>'PQWE1234F',
            'mobile_number'=>'9867389234',
            'otp'=>'',
            'hub_name'=>'Mumbai',
            'company_name'=>'neo',
            'work_location'=>'kalyan',
            'state'=>'maharashtra',
            'department'=>'java',
            'designation'=>'dev',
            'job_role'=>'manager',
            'product'=>'test1',
            'middle_name'=>'abhijit',
            'last_name'=>'desai',
            'reporting_manager_name'=>'ashwin',
            'manager_employee_id'=>'89675',
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
            'hub_name'=>'boriwali',
            'company_name'=>'bajaj',
            'work_location'=>'mulund',
            'state'=>'maharashtra',
            'department'=>'IT',
            'designation'=>'dev',
            'job_role'=>'manager',
            'product'=>'test3',
            'middle_name'=>'shravan',
            'last_name'=>'sawant',
            'reporting_manager_name'=>'chaitali',
            'manager_employee_id'=>'38767',
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
            'hub_name'=>'PQA',
            'company_name'=>'cap',
            'work_location'=>'Thane',
            'state'=>'maharashtra',
            'department'=>'IT',
            'designation'=>'dev',
            'job_role'=>'tester',
            'product'=>'test4',
            'middle_name'=>'ajay',
            'last_name'=>'patil',
            'reporting_manager_name'=>'sush',
            'manager_employee_id'=>'4353534',
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
            'hub_name'=>'mum',
            'company_name'=>'mahindra',
            'work_location'=>'Thane',
            'state'=>'maharashtra',
            'department'=>'IT',
            'designation'=>'dev',
            'job_role'=>'manager',
            'product'=>'ASD',
            'middle_name'=>'sushil',
            'last_name'=>'Naik',
            'reporting_manager_name'=>'mina',
            'manager_employee_id'=>'8978',
            'status'=>1,
            ),*/

        ));
    }
}
