<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
       
        $this->call([
            UserTableSeeder::class,
            LoadProductSeeder::class,
            MarketingVisualCategorySeeder::class,
            MarketingVisualSeeder::class,
            SalesContestSeeder::class,
            CustomerSchemeSeeder::class,
            DsaOnboardingSeeder::class,
            CorporatePresentationSeeder::class,
            
        ]);      
    }
}
