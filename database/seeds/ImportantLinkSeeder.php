<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ImportantLinkSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('important_links')->insertOrIgnore(array(
            array(
              'id'=>1,
              'portal_name' => 'Portal 1',
              'web_link' => "https://www.google.com/",
              'created_at'=>now(),
              'updated_at'=>now()
            ),
            array(
                'id'=>2,
                'portal_name' =>'portal 2',
                'web_link' => "https://www.w3schools.com/",
                'created_at'=>now(),
                'updated_at'=>now()
            ),
            array(
                'id'=>3,
                'portal_name' =>'portal 3',
                'web_link' => "https://www.w3schools.com/",
                'created_at'=>now(),
                'updated_at'=>now()
            ),
            array(
                'id'=>4,
                'portal_name' =>'portal 4',
                'web_link' => "https://www.w3schools.com/",
                'created_at'=>now(),
                'updated_at'=>now()
            ),
            array(
                'id'=>5,
                'portal_name' =>'portal 5',
                'web_link' => "https://www.w3schools.com/",
                'created_at'=>now(),
                'updated_at'=>now()
            ),
           
        ));

 
    }
}
