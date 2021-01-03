<?php

use App\Models\PermissionGroup;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;


class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // remove all permissions
        // Permission::query()->delete();
        // PermissionGroup::query()->delete();
        // PermissionGroup::truncate();
        // Permission::truncate();

        $group_permissions = config('acl.group-permissions');
        foreach($group_permissions as $group => $permissions) {
            $groupExists = PermissionGroup::where('name', $group)->first();
            $groupId = $groupExists ? $groupExists->id : PermissionGroup::create(['name' => $group])->id;

            foreach($permissions as $permission) {
                $permissionExists = Permission::where('name', $permission)->where('permission_group_id', $groupId)->first();
                if (!$permissionExists) {
                    Permission::create([
                        'name' => $permission,
                        'permission_group_id' => $groupId
                    ]);
                }
            }
        }
    }
}
