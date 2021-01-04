<?php

<<<<<<< HEAD
//use App\Models\Role;
=======
use Spatie\Permission\Models\Role;
>>>>>>> d2b35ed4bd682239a3e1123c7480c8e116a40372
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
