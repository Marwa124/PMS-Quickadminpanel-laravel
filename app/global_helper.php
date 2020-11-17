<?php

use App\Models\Role;
use App\Models\User;

//get global user notify
function globalNotificationId($user_id){
    $departHead = User::find($user_id)->department()->first() ? User::find($user_id)->department->department_head()->select('department_head_id')->first()->department_head_id : '';
    $userHead   = User::find($departHead);
    $roleAdmin  = Role::whereIn('title', ['Admin','Board Members'])->pluck('id')->toArray();
    $userAdmin  = User::whereIn('role_id', $roleAdmin)->select('id')->get();

    $arr = [$userHead];
    foreach ($userAdmin as $key => $value) {
        $arr[] = $value->id;
    }
    return $arr;
    // return [$userHead, $userAdmin];
}