<?php

use Illuminate\Database\Seeder;

class RelationshipWithCustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('relationship_with_customer')->insert(array(
            array(
            
                'id'=>1,
                'relationship'=>'Self',
             ),
            array(
            
                'id'=>2,
                'relationship'=>'Friend',
                    
                ),
           
                array(
            
                    'id'=>3,
                   
                    'relationship'=>'Family',
                    'relationship'=>'Existing Customer',
                    
                    
                    ),
           
                    array(
            
                        'id'=>4,
                         'relationship'=>'Existing Customer',
                        
                        
                        ),
           
                        array(
            
                            'id'=>5,
                            'relationship'=>'AFL Employee',
                            
                            ),
                           
            
            
           
        ));

    }
}
