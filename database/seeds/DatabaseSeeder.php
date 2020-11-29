<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call([
            DepartmentsTableSeeder::class,
            DesignationsTableSeeder::class,
            SalaryTemplatesTableSeeder::class,

            RolesTableSeeder::class,
            PermissionsTableSeeder::class,

            UsersTableSeeder::class,
            AccountDetailsTableSeeder::class,


            // PermissionRoleTableSeeder::class,
            // CrmStatusTableSeeder::class,
            // TaskStatusTableSeeder::class,
        ]);
    }
}
