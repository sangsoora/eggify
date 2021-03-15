<?php

namespace Database\Seeders;

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
        $this->call(UsersTypeTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(ProvidersTypeTableSeeder::class);
        $this->call(RolesTableSeeder::class);
        $this->call(PermissionsTableSeeder::class);
        $this->call(PermissionsRoleTableSeeder::class);
        $this->call(ProvidersCategoryTableSeeder::class);
        $this->call(ProvidersSubCategoryTableSeeder::class);
        $this->call(ProvidersCategorySubCategoryTableSeeder::class);
        $this->call(ProvidersPlanTableSeeder::class);
        $this->call(ProvidersTableSeeder::class);
        $this->call(ProvidersCompanyEmployeesTableSeeder::class);
        $this->call(ProvidersCompanyTableSeeder::class);
        $this->call(BudgetsStatusTableSeeder::class);
        $this->call(BudgetsTableSeeder::class);
        $this->call(BudgetsUsersTableSeeder::class);
        $this->call(OperatorsJobTableSeeder::class);
        $this->call(OperatorsJobTagTableSeeder::class);
        $this->call(OperatorsPositionTableSeeder::class);
        $this->call(OperatorsCompanyTableSeeder::class);
        $this->call(OperatorsCompanyEmployeesTableSeeder::class);
        $this->call(OperatorsTableSeeder::class);
        $this->call(RatingsTableSeeder::class);
        $this->call(RatingsCriteriaTableSeeder::class);
        $this->call(RatingsRatingsCriteriaTableSeeder::class);
        $this->call(RatingsProvidersTableSeeder::class);
        $this->call(CountriesTableSeeder::class);
        $this->call(StatesTableSeeder::class);
        $this->call(CitiesTableSeeder::class);
        $this->call(PostalCodesTableSeeder::class);
    }
}
