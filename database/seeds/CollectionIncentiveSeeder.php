<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CollectionIncentiveSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    
        DB::table('collection_incentive')->insert(array(
            array(
              'min_resolution' => 0,
              'max_resolution'=>65,
              'min_rollback'=>00,
              'max_rollback'=>00,
              'bkt1'=>6,
              'bkt2'=>0,
              'bkt3'=>0,
              'bkt4'=>0,
              'type'=>'bkt1'
             
            ), array(
                'min_resolution' => 65,
                'max_resolution'=>70,
                'min_rollback'=>00,
                'max_rollback'=>00,
                'bkt1'=>6.50,
                'bkt2'=>0,
                'bkt3'=>0,
                'bkt4'=>0,
                'type'=>'bkt1'
              ),
              array(
                'min_resolution' => 70,
                'max_resolution'=>75,
                'min_rollback'=>00,
                'max_rollback'=>00,
                'bkt1'=>7,
                'bkt2'=>0,
                'bkt3'=>0,
                'bkt4'=>0,
                'type'=>'bkt1'
              ),
              array(
                'min_resolution' => 75,
                'max_resolution'=>80,
                'min_rollback'=>00,
                'max_rollback'=>00,
                'bkt1'=>7.50,
                'bkt2'=>0,
                'bkt3'=>0,
                'bkt4'=>0,
                'type'=>'bkt1'
              ),
              array(
                'min_resolution' => 80,
                'max_resolution'=>85,
                'min_rollback'=>00,
                'max_rollback'=>00,
                'bkt1'=>8,
                'bkt2'=>0,
                'bkt3'=>0,
                'bkt4'=>0,
                'type'=>'bkt1'
              ),
              array(
                'min_resolution' => 85,
                'max_resolution'=>0,
                'min_rollback'=>00,
                'max_rollback'=>00,
                'bkt1'=>8.50,
                'bkt2'=>0,
                'bkt3'=>0,
                'bkt4'=>0,
                'type'=>'bkt1'
              ),
              array(
                'min_resolution' => 0,
                'max_resolution'=>69.99,
                'min_rollback'=>00,
                'max_rollback'=>10,
                'bkt1'=>0,
                'bkt2'=>2,
                'bkt3'=>4,
                'bkt4'=>0,
                'type'=>'bkt2_bkt3'
              ),
              array(
                'min_resolution' => 70,
                'max_resolution'=>74.99,
                'min_rollback'=>00,
                'max_rollback'=>10,
                'bkt1'=>0,
                'bkt2'=>3,
                'bkt3'=>5,
                'bkt4'=>0,
                'type'=>'bkt2_bkt3'
              ),
              array(
                'min_resolution' => 75,
                'max_resolution'=>79.99,
                'min_rollback'=>00,
                'max_rollback'=>10,
                'bkt1'=>0,
                'bkt2'=>4,
                'bkt3'=>7,
                'bkt4'=>0,
                'type'=>'bkt2_bkt3'
              ),
              array(
                'min_resolution' => 80,
                'max_resolution'=>84.99,
                'min_rollback'=>00,
                'max_rollback'=>10,
                'bkt1'=>0,
                'bkt2'=>6,
                'bkt3'=>8,
                'bkt4'=>0,
                'type'=>'bkt2_bkt3'
              ),
              array(
                'min_resolution' => 85,
                'max_resolution'=>89.99,
                'min_rollback'=>00,
                'max_rollback'=>10,
                'bkt1'=>0,
                'bkt2'=>7,
                'bkt3'=>9,
                'bkt4'=>0,
                'type'=>'bkt2_bkt3'
              ),
              array(
                'min_resolution' => 90,
                'max_resolution'=>94.99,
                'min_rollback'=>00,
                'max_rollback'=>10,
                'bkt1'=>0,
                'bkt2'=>8,
                'bkt3'=>11,
                'bkt4'=>0,
                'type'=>'bkt2_bkt3'
              ),
              array(
                'min_resolution' => 95,
                'max_resolution'=>00,
                'min_rollback'=>00,
                'max_rollback'=>10,
                'bkt1'=>0,
                'bkt2'=>9,
                'bkt3'=>13,
                'bkt4'=>0,
                'type'=>'bkt2_bkt3'
              ), array(
                'min_resolution' => 0,
                'max_resolution'=>69.99,
                'min_rollback'=>10,
                'max_rollback'=>15,
                'bkt1'=>0,
                'bkt2'=>2,
                'bkt3'=>4,
                'bkt4'=>0,
                'type'=>'bkt2_bkt3'
              ),
              array(
                'min_resolution' => 70,
                'max_resolution'=>74.99,
                'min_rollback'=>10,
                'max_rollback'=>15,
                'bkt1'=>0,
                'bkt2'=>4,
                'bkt3'=>6,
                'bkt4'=>0,
                'type'=>'bkt2_bkt3'
                
              ),
              array(
                'min_resolution' => 75,
                'max_resolution'=>79.99,
                'min_rollback'=>10,
                'max_rollback'=>15,
                'bkt1'=>0,
                'bkt2'=>5,
                'bkt3'=>8,
                'bkt4'=>0,
                'type'=>'bkt2_bkt3'
              ),
              array(
                'min_resolution' => 80,
                'max_resolution'=>84.99,
                'min_rollback'=>10,
                'max_rollback'=>15,
                'bkt1'=>0,
                'bkt2'=>7,
                'bkt3'=>9,
                'bkt4'=>0,
                'type'=>'bkt2_bkt3'
              ),
              array(
                'min_resolution' => 85,
                'max_resolution'=>89.99,
                'min_rollback'=>10,
                'max_rollback'=>15,
                'bkt1'=>0,
                'bkt2'=>8,
                'bkt3'=>10,
                'bkt4'=>0,
                'type'=>'bkt2_bkt3'
              ),
              array(
                'min_resolution' => 90,
                'max_resolution'=>94.99,
                'min_rollback'=>10,
                'max_rollback'=>15,
                'bkt1'=>0,
                'bkt2'=>9,
                'bkt3'=>12,
                'bkt4'=>0,
                'type'=>'bkt2_bkt3'
              ),
              array(
                'min_resolution' => 95,
                'max_resolution'=>00,
                'min_rollback'=>10,
                'max_rollback'=>15,
                'bkt1'=>0,
                'bkt2'=>10,
                'bkt3'=>14,
                'bkt4'=>0,
                'type'=>'bkt2_bkt3'
              ), array(
                'min_resolution' => 0,
                'max_resolution'=>69.99,
                'min_rollback'=>15,
                'max_rollback'=>20,
                'bkt1'=>0,
                'bkt2'=>2,
                'bkt3'=>4,
                'bkt4'=>0,
                'type'=>'bkt2_bkt3'
              ),
              array(
                'min_resolution' => 70,
                'max_resolution'=>74.99,
                'min_rollback'=>15,
                'max_rollback'=>20,
                'bkt1'=>0,
                'bkt2'=>5,
                'bkt3'=>7,
                'bkt4'=>0,
                'type'=>'bkt2_bkt3'
              ),
              array(
                'min_resolution' => 75,
                'max_resolution'=>79.99,
                'min_rollback'=>15,
                'max_rollback'=>20,
                'bkt1'=>0,
                'bkt2'=>6,
                'bkt3'=>9,
                'bkt4'=>0,
                'type'=>'bkt2_bkt3'
              ),
              array(
                'min_resolution' => 80,
                'max_resolution'=>84.99,
                'min_rollback'=>15,
                'max_rollback'=>20,
                'bkt1'=>0,
                'bkt2'=>8,
                'bkt3'=>10,
                'bkt4'=>0,
                'type'=>'bkt2_bkt3'
              ),
              array(
                'min_resolution' => 85,
                'max_resolution'=>89.99,
                'min_rollback'=>15,
                'max_rollback'=>20,
                'bkt1'=>0,
                'bkt2'=>9,
                'bkt3'=>11,
                'bkt4'=>0,
                'type'=>'bkt2_bkt3'
            ),
              array(
                'min_resolution' => 90,
                'max_resolution'=>94.99,
                'min_rollback'=>15,
                'max_rollback'=>20,
                'bkt1'=>0,
                'bkt2'=>10,
                'bkt3'=>13,
                'bkt4'=>0,
                'type'=>'bkt2_bkt3'
              ),
              array(
                'min_resolution' => 95,
                'max_resolution'=>00,
                'min_rollback'=>15,
                'max_rollback'=>20,
                'bkt1'=>0,
                'bkt2'=>11,
                'bkt3'=>15,
                'bkt4'=>0,
                'type'=>'bkt2_bkt3'
              ),  array(
                'min_resolution' => 0,
                'max_resolution'=>69.99,
                'min_rollback'=>20,
                'max_rollback'=>25,
                'bkt1'=>0,
                'bkt2'=>2,
                'bkt3'=>4,
                'bkt4'=>0,
                'type'=>'bkt2_bkt3'
              ),
              array(
                'min_resolution' => 70,
                'max_resolution'=>74.99,
                'min_rollback'=>20,
                'max_rollback'=>25,
                'bkt1'=>0,
                'bkt2'=>6,
                'bkt3'=>8,
                'bkt4'=>0,
                'type'=>'bkt2_bkt3'
              ),
              array(
                'min_resolution' => 75,
                'max_resolution'=>79.99,
                'min_rollback'=>20,
                'max_rollback'=>25,
                'bkt1'=>0,
                'bkt2'=>7,
                'bkt3'=>10,
                'bkt4'=>0,
                'type'=>'bkt2_bkt3'
              ),
              array(
                'min_resolution' => 80,
                'max_resolution'=>84.99,
                'min_rollback'=>20,
                'max_rollback'=>25,
                'bkt1'=>0,
                'bkt2'=>9,
                'bkt3'=>11,
                'bkt4'=>0,
                'type'=>'bkt2_bkt3'
              ),
              array(
                'min_resolution' => 85,
                'max_resolution'=>89.99,
                'min_rollback'=>20,
                'max_rollback'=>25,
                'bkt1'=>0,
                'bkt2'=>10,
                'bkt3'=>12,
                'bkt4'=>0,
                'type'=>'bkt2_bkt3'
              ),
              array(
                'min_resolution' => 90,
                'max_resolution'=>94.99,
                'min_rollback'=>20,
                'max_rollback'=>25,
                'bkt1'=>0,
                'bkt2'=>11,
                'bkt3'=>14,
                'bkt4'=>0,
                'type'=>'bkt2_bkt3'
              ),
              array(
                'min_resolution' => 95,
                'max_resolution'=>00,
                'min_rollback'=>20,
                'max_rollback'=>25,
                'bkt1'=>0,
                'bkt2'=>12,
                'bkt3'=>16,
                'bkt4'=>0,
                'type'=>'bkt2_bkt3'
              ),  array(
                'min_resolution' => 0,
                'max_resolution'=>69.99,
                'min_rollback'=>25,
                'max_rollback'=>0,
                'bkt1'=>0,
                'bkt2'=>2,
                'bkt3'=>4,
                'bkt4'=>0,
                'type'=>'bkt2_bkt3'
              ),
              array(
                'min_resolution' => 70,
                'max_resolution'=>74.99,
                'min_rollback'=>25,
                'max_rollback'=>0,
                'bkt1'=>0,
                'bkt2'=>7,
                'bkt3'=>9,
                'bkt4'=>0,
                'type'=>'bkt2_bkt3'
              ),
              array(
                'min_resolution' => 75,
                'max_resolution'=>79.99,
                'min_rollback'=>25,
                'max_rollback'=>0,
                'bkt1'=>0,
                'bkt2'=>8,
                'bkt3'=>11,
                'bkt4'=>0,
                'type'=>'bkt2_bkt3'
              ),
              array(
                'min_resolution' => 80,
                'max_resolution'=>84.99,
                'min_rollback'=>25,
                'max_rollback'=>0,
                'bkt1'=>0,
                'bkt2'=>10,
                'bkt3'=>12,
                'bkt4'=>0,
                'type'=>'bkt2_bkt3'
              ),
              array(
                'min_resolution' => 85,
                'max_resolution'=>89.99,
                'min_rollback'=>25,
                'max_rollback'=>0,
                'bkt1'=>0,
                'bkt2'=>11,
                'bkt3'=>13,
                'bkt4'=>0,
                'type'=>'bkt2_bkt3'
              ),
              array(
                'min_resolution' => 90,
                'max_resolution'=>94.99,
                'min_rollback'=>25,
                'max_rollback'=>0,
                'bkt1'=>0,
                'bkt2'=>12,
                'bkt3'=>15,
                'bkt4'=>0,
                'type'=>'bkt2_bkt3'
              ),
              array(
                'min_resolution' => 95,
                'max_resolution'=>00,
                'min_rollback'=>25,
                'max_rollback'=>0,
                'bkt1'=>0,
                'bkt2'=>13,
                'bkt3'=>17,
                'bkt4'=>0,
                'type'=>'bkt2_bkt3'
              ),  array(
                'min_resolution' => 0,
                'max_resolution'=>40,
                'min_rollback'=>0,
                'max_rollback'=>5,
                'bkt1'=>0,
                'bkt2'=>0,
                'bkt3'=>0,
                'bkt4'=>5,
                'type'=>'bkt4'
              ),

              array(
                'min_resolution' => 40,
                'max_resolution'=>49.99,
                'min_rollback'=>0,
                'max_rollback'=>5,
                'bkt1'=>0,
                'bkt2'=>0,
                'bkt3'=>0,
                'bkt4'=>8,
                'type'=>'bkt4'
              ),
              array(
                'min_resolution' => 50,
                'max_resolution'=>59.99,
                'min_rollback'=>0,
                'max_rollback'=>5,
                'bkt1'=>0,
                'bkt2'=>0,
                'bkt3'=>0,
                'bkt4'=>9,
                'type'=>'bkt4'
              ),
              array(
                'min_resolution' => 60,
                'max_resolution'=>69.99,
                'min_rollback'=>0,
                'max_rollback'=>5,
                'bkt1'=>0,
                'bkt2'=>0,
                'bkt3'=>0,
                'bkt4'=>10,
                'type'=>'bkt4'
              ),
              array(
                'min_resolution' => 70,
                'max_resolution'=>79.99,
                'min_rollback'=>0,
                'max_rollback'=>5,
                'bkt1'=>0,
                'bkt2'=>0,
                'bkt3'=>0,
                'bkt4'=>11,
                'type'=>'bkt4'
              ),
              array(
                'min_resolution' => 80,
                'max_resolution'=>89.99,
                'min_rollback'=>0,
                'max_rollback'=>5,
                'bkt1'=>0,
                'bkt2'=>0,
                'bkt3'=>0,
                'bkt4'=>12,
                'type'=>'bkt4'
              ),
              array(
                'min_resolution' => 90,
                'max_resolution'=>00,
                'min_rollback'=>0,
                'max_rollback'=>5,
                'bkt1'=>0,
                'bkt2'=>0,
                'bkt3'=>0,
                'bkt4'=>13,
                'type'=>'bkt4'
              ),   array(
                'min_resolution' => 0,
                'max_resolution'=>40,
                'min_rollback'=>5,
                'max_rollback'=>10,
                'bkt1'=>0,
                'bkt2'=>0,
                'bkt3'=>0,
                'bkt4'=>5,
                'type'=>'bkt4'
              ),

              array(
                'min_resolution' => 40,
                'max_resolution'=>49.99,
                'min_rollback'=>5,
                'max_rollback'=>10,
                'bkt1'=>0,
                'bkt2'=>0,
                'bkt3'=>0,
                'bkt4'=>9,
                'type'=>'bkt4'
              ),
              array(
                'min_resolution' => 50,
                'max_resolution'=>59.99,
                'min_rollback'=>5,
                'max_rollback'=>10,
                'bkt1'=>0,
                'bkt2'=>0,
                'bkt3'=>0,
                'bkt4'=>10,
                'type'=>'bkt4'
              ),
              array(
                'min_resolution' => 60,
                'max_resolution'=>69.99,
                'min_rollback'=>5,
                'max_rollback'=>10,
                'bkt1'=>0,
                'bkt2'=>0,
                'bkt3'=>0,
                'bkt4'=>11,
                'type'=>'bkt4'
              ),
              array(
                'min_resolution' => 70,
                'max_resolution'=>79.99,
                'min_rollback'=>5,
                'max_rollback'=>10,
                'bkt1'=>0,
                'bkt2'=>0,
                'bkt3'=>0,
                'bkt4'=>12,
                'type'=>'bkt4'
              ),
              array(
                'min_resolution' => 80,
                'max_resolution'=>89.99,
                'min_rollback'=>5,
                'max_rollback'=>10,
                'bkt1'=>0,
                'bkt2'=>0,
                'bkt3'=>0,
                'bkt4'=>13,
                'type'=>'bkt4'
              ),
              array(
                'min_resolution' => 90,
                'max_resolution'=>00,
                'min_rollback'=>5,
                'max_rollback'=>10,
                'bkt1'=>0,
                'bkt2'=>0,
                'bkt3'=>0,
                'bkt4'=>14,
                'type'=>'bkt4'
              ),  array(
                'min_resolution' => 0,
                'max_resolution'=>40,
                'min_rollback'=>10,
                'max_rollback'=>15,
                'bkt1'=>0,
                'bkt2'=>0,
                'bkt3'=>0,
                'bkt4'=>5,
                'type'=>'bkt4'
              ),

              array(
                'min_resolution' => 40,
                'max_resolution'=>49.99,
                'min_rollback'=>10,
                'max_rollback'=>15,
                'bkt1'=>0,
                'bkt2'=>0,
                'bkt3'=>0,
                'bkt4'=>10,
                'type'=>'bkt4'
              ),
              array(
                'min_resolution' => 50,
                'max_resolution'=>59.99,
                'min_rollback'=>10,
                'max_rollback'=>15,
                'bkt1'=>0,
                'bkt2'=>0,
                'bkt3'=>0,
                'bkt4'=>11,
                'type'=>'bkt4'
              ),
              array(
                'min_resolution' => 60,
                'max_resolution'=>69.99,
                'min_rollback'=>10,
                'max_rollback'=>15,
                'bkt1'=>0,
                'bkt2'=>0,
                'bkt3'=>0,
                'bkt4'=>12,
                'type'=>'bkt4'
              ),
              array(
                'min_resolution' => 70,
                'max_resolution'=>79.99,
                'min_rollback'=>10,
                'max_rollback'=>15,
                'bkt1'=>0,
                'bkt2'=>0,
                'bkt3'=>0,
                'bkt4'=>13,
                'type'=>'bkt4'
              ),
              array(
                'min_resolution' => 80,
                'max_resolution'=>89.99,
                'min_rollback'=>10,
                'max_rollback'=>15,
                'bkt1'=>0,
                'bkt2'=>0,
                'bkt3'=>0,
                'bkt4'=>14,
                'type'=>'bkt4'
              ),
              array(
                'min_resolution' => 90,
                'max_resolution'=>00,
                'min_rollback'=>10,
                'max_rollback'=>15,
                'bkt1'=>0,
                'bkt2'=>0,
                'bkt3'=>0,
                'bkt4'=>15,
                'type'=>'bkt4'
              ), array(
                'min_resolution' => 0,
                'max_resolution'=>40,
                'min_rollback'=>15,
                'max_rollback'=>20,
                'bkt1'=>0,
                'bkt2'=>0,
                'bkt3'=>0,
                'bkt4'=>5,
                'type'=>'bkt4'
              ),

              array(
                'min_resolution' => 40,
                'max_resolution'=>49.99,
                'min_rollback'=>15,
                'max_rollback'=>20,
                'bkt1'=>0,
                'bkt2'=>0,
                'bkt3'=>0,
                'bkt4'=>11,
                'type'=>'bkt4'
              ),
              array(
                'min_resolution' => 50,
                'max_resolution'=>59.99,
                'min_rollback'=>15,
                'max_rollback'=>20,
                'bkt1'=>0,
                'bkt2'=>0,
                'bkt3'=>0,
                'bkt4'=>12,
                'type'=>'bkt4'
              ),
              array(
                'min_resolution' => 60,
                'max_resolution'=>69.99,
                'min_rollback'=>15,
                'max_rollback'=>20,
                'bkt1'=>0,
                'bkt2'=>0,
                'bkt3'=>0,
                'bkt4'=>13,
                'type'=>'bkt4'
              ),
              array(
                'min_resolution' => 70,
                'max_resolution'=>79.99,
                'min_rollback'=>15,
                'max_rollback'=>20,
                'bkt1'=>0,
                'bkt2'=>0,
                'bkt3'=>0,
                'bkt4'=>14,
                'type'=>'bkt4'
              ),
              array(
                'min_resolution' => 80,
                'max_resolution'=>89.99,
                'min_rollback'=>15,
                'max_rollback'=>20,
                'bkt1'=>0,
                'bkt2'=>0,
                'bkt3'=>0,
                'bkt4'=>15,
                'type'=>'bkt4'
              ),
              array(
                'min_resolution' => 90,
                'max_resolution'=>00,
                'min_rollback'=>15,
                'max_rollback'=>20,
                'bkt1'=>0,
                'bkt2'=>0,
                'bkt3'=>0,
                'bkt4'=>16,
                'type'=>'bkt4'
              ), array(
                'min_resolution' => 0,
                'max_resolution'=>40,
                'min_rollback'=>20,
                'max_rollback'=>0,
                'bkt1'=>0,
                'bkt2'=>0,
                'bkt3'=>0,
                'bkt4'=>5,
                'type'=>'bkt4'
              ),

              array(
                'min_resolution' => 40,
                'max_resolution'=>49.99,
                'min_rollback'=>20,
                'max_rollback'=>0,
                'bkt1'=>0,
                'bkt2'=>0,
                'bkt3'=>0,
                'bkt4'=>12,
                'type'=>'bkt4'
              ),
              array(
                'min_resolution' => 50,
                'max_resolution'=>59.99,
                'min_rollback'=>20,
                'max_rollback'=>0,
                'bkt1'=>0,
                'bkt2'=>0,
                'bkt3'=>0,
                'bkt4'=>13,
                'type'=>'bkt4'
              ),
              array(
                'min_resolution' => 60,
                'max_resolution'=>69.99,
                'min_rollback'=>20,
                'max_rollback'=>0,
                'bkt1'=>0,
                'bkt2'=>0,
                'bkt3'=>0,
                'bkt4'=>14,
                'type'=>'bkt4'
              ),
              array(
                'min_resolution' => 70,
                'max_resolution'=>79.99,
                'min_rollback'=>20,
                'max_rollback'=>0,
                'bkt1'=>0,
                'bkt2'=>0,
                'bkt3'=>0,
                'bkt4'=>15,
                'type'=>'bkt4'
              ),
              array(
                'min_resolution' => 80,
                'max_resolution'=>89.99,
                'min_rollback'=>20,
                'max_rollback'=>0,
                'bkt1'=>0,
                'bkt2'=>0,
                'bkt3'=>0,
                'bkt4'=>16,
                'type'=>'bkt4'
              ),
              array(
                'min_resolution' => 90,
                'max_resolution'=>00,
                'min_rollback'=>20,
                'max_rollback'=>0,
                'bkt1'=>0,
                'bkt2'=>0,
                'bkt3'=>0,
                'bkt4'=>17,
                'type'=>'bkt4'
              ),

      
          ));
    }
}
