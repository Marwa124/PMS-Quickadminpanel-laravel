<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call([
            SalaryTemplatesTableSeeder::class,
            LeaveCategoriesTableSeeder::class,

            RolesTableSeeder::class,
            PermissionsTableSeeder::class,

            UsersTableSeeder::class,
            AccountDetailsTableSeeder::class,

            DepartmentsTableSeeder::class,
            DesignationsTableSeeder::class,

            PaymentMethodsTableSeeder::class,

        ]);
    }
}
