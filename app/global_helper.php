<?php

use App\Models\User;

//get global user notify
if (!function_exists('globalNotificationId')) {
    function globalNotificationId($user_id){
        $departHead = User::find($user_id)->department()->first() ?
            // User::find($user_id)->department->department_head()->select('department_head_id')->first()->department_head_id : '';
            User::find($user_id)->accountDetail->designation->department->department_head()->first()->department_head_id : '';

        $userHead   = User::find($departHead);

        $arr = $departHead ? [$departHead->id] : [];

        foreach (User::all() as $key => $user) {
            if ($user->hasAnyRole(['Admin', 'Board Members'])) {
                $arr[]  = $user->id;
            }
        }
        // dd($arr);
        return $arr;
        // return [$userHead, $userAdmin];
    }
}

// get responseHandel
if (!function_exists('resHandel')) {
    function resHandel($data = [], $message = 'Success', $code = 200, $headers = []) {
        return response(['data' => $data, 'message' => $message, 'code' => $code], $code, $headers);
    }
}
/***********************************************************************************/
