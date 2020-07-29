<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

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
            IncentiveSlabSeeder::class,//production
            CalculatorPoliciesSeeder::class,//production
            LoadProductSeeder::class,
            MarketingVisualCategorySeeder::class,
            MarketingVisualSeeder::class,
            SalesContestSeeder::class,
            CustomerSchemeSeeder::class,
            DsaOnboardingSeeder::class,
            CorporatePresentationSeeder::class,
            SalesKitProductSeeder::class,
            DocumentChecklistCategorySeeder::class,
            DocumentChecklistProductSeeder::class,
            EmployeeSeeder::class,
            ReferFriendSeeder::class,
            HrLoanSeeder::class,
            OtherLoanSeeder::class,
            DsaLeadSeeder::class,
            EmployeeDashboardSeeder::class,
            EmployeeHelpDeskSeeder::class,
            ImportantLinkSeeder::class,
            CurrentOfferSeeder::class,
            CollectionIncentiveSeeder::class//production
            
            
        ]);      
    }
}
