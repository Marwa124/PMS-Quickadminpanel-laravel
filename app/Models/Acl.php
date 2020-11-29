<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class Acl extends Model
{

    static public function createRole($data)
    {
        // create a role
        $role = Role::create(['name' => $data->name]);
        // attach all the permission to role
        $role->syncPermissions($data->permissions);
    }

    static public function updateRole($role, $data)
    {
        // create a role
        $role->update(['name' => $data->name]);
        // attach all the permission to role
        $role->syncPermissions($data->permissions);
    }

    static public function listRole()
    {
        $roles = Role::with('permissions')->get()->toArray();
        $roles_with_only_permissions_name = [];
        foreach ($roles as $role) {
            $role['permissions'] = collect($role['permissions'])->pluck('name')->toArray();
            $roles_with_only_permissions_name[] = $role;
        }
        return $roles_with_only_permissions_name;
    }
}
