<?php

//use App\Models\Role;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

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
