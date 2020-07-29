<?php

use Illuminate\Database\Seeder;

class CurrentOfferSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('current_offers')->insertOrIgnore(array(
            array(
              'id'=>1,
              'file_path' => 'test.png',
              'created_at'=>now(),
              'updated_at'=>now()
            ),
            array(
                'id'=>2,
                'file_path' => 'test1.png',
                'created_at'=>now(),
                'updated_at'=>now()
            ),
            array(
                'id'=>3,
                'file_path' => 'test2.png',
                'created_at'=>now(),
                'updated_at'=>now()
            ),
            array(
                'id'=>4,
                'file_path' => 'test3.png',
                'created_at'=>now(),
                'updated_at'=>now()
            ),
            array(
                'id'=>5,
                'file_path' => 'test4.png',
                'created_at'=>now(),
                'updated_at'=>now()
            ),
           
        ));

    }
}
