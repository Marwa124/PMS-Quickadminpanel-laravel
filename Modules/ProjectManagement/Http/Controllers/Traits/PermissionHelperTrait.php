<?php
namespace Modules\ProjectManagement\Http\Controllers\Traits;

use App\Models\Permission;

trait PermissionHelperTrait
{
    public function getPermissionID($permissions){
        $permissions_id =[];
        foreach ($permissions as $permission_name){

            $permission = Permission::where('name',$permission_name)->first();
            array_push($permissions_id,$permission->id);
        }
        return $permissions_id;
    }
}
