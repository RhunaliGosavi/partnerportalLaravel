<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DocumentChecklistCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('document_checklist_categories')->insert(array(
            array(
              'id'=>1,
              'name' => 'Type 1',
              'created_at'=>now(),
              'updated_at'=>now()
            ),
            array(
                'id'=>2,
                'name' => 'type 2',
                'created_at'=>now(),
                'updated_at'=>now()
            ),
            array(
                'id'=>3,
                'name' => 'type 3',
                'created_at'=>now(),
                'updated_at'=>now()
            ),
            array(
                'id'=>4,
                'name' => 'type 4',
                'created_at'=>now(),
                'updated_at'=>now()
            ),
            array(
                'id'=>5,
                'name' => 'type 5',
                'created_at'=>now(),
                'updated_at'=>now()
            ),


        ));
    }
}
