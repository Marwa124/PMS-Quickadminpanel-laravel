<?php

use App\Models\Role;
use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    public function run()
    {
        $roles = [
            [
                'name' => 'Admin',
            ],
            [
                'name' => 'Super Admin',
            ],
            [
                'name' => 'User',
            ],
            [
                'name' => 'Board Members',
            ],
        ];

        Role::insert($roles);
    }
}
