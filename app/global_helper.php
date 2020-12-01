<?php

use App\Models\Notification;
use App\Models\User;
use LaravelFCM\Message\OptionsBuilder;
use LaravelFCM\Message\PayloadDataBuilder;
use LaravelFCM\Message\PayloadNotificationBuilder;
// use FCM;




function _PushNotification($title,$msg,$UserObject,$typeThisNotify,$redirectionID)
{
    $ob = [
        'title'        => $title,
        'message'      => $msg,
        'user_id'      => $UserObject->id,
        'notify_type'  => $typeThisNotify,
        'redirect_id'  => $redirectionID,
        'is_send'      => 0
    ];
    $NotificationObject = (new Notification())->create($ob);
    $data = [
            'title'         => $NotificationObject->title, // Return Title
            'body'          => $NotificationObject->message,
            'redirect_type' => $typeThisNotify,
            'redirect_id'   => $redirectionID,
        ];
        notify($data['title'], null, $data, $UserObject);
}


function notify($title = null, $body = null, $json_data, $user)
{
    try {
        $optionBuilder = new OptionsBuilder();
        $optionBuilder->setTimeToLive(60 * 50);

        $notificationBuilder = new PayloadNotificationBuilder($title);
        $notificationBuilder->setBody($body)->setSound('default');
        $optionBuilder->setDelayWhileIdle(true);

        $dataBuilder = new PayloadDataBuilder();
        $dataBuilder->addData($json_data);
        $option = $optionBuilder->build();
        $notificationBuilder->build();
        $data = $dataBuilder->build();
    
            $downstreamResponse = \FCM::sendTo($user->firebase_token,$option,null,$data);
       
        return true;
    } catch (\Exception $exception) {
        return false;
    }
}

function notifyIOS($data, $user_token)
{
    $body = array(
        "to"            => $user_token,
        "priority"      => "high",
        "badge"         => "true",
        "notification"  => array_merge($data->toArray(), ["sound" => 'true'])
    );
    $body = json_encode($body);
    $headers = array('Content-Type:application/json', "Authorization:key=".env('FCM_SERVER_KEY'));
    $ret = FCMCurl($body,$headers);
    return $ret;
}

function FCMCurl($body, $headers)
{
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, "https://fcm.googleapis.com/fcm/send");
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $body);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $server_output = curl_exec($ch);
    curl_close($ch);
    return $server_output;
}
function _fireSMS($number, $msg)
{
    $newEndPoint = "https://smsmisr.com/api/webapi/?username=pMvRospw&password=PumGA9G6gF&mobile=2.$number&sender=EgyptGameST&message=$msg&language=1";
    $client = new \GuzzleHttp\Client();
    try {
        $response = $client->post($newEndPoint);
        $sms = \GuzzleHttp\json_decode($response->getBody());
        return (int)$sms->code;

    } catch (\Exception $e) {
        $e->getMessage();
    }
    return false;
}














//get global user notify
if (!function_exists('globalNotificationId')) {
    function globalNotificationId($user_id){
        $departHead = User::find($user_id)->department()->first() ? User::find($user_id)->department->department_head()->select('department_head_id')->first()->department_head_id : '';
        $userHead   = User::find($departHead);
        // $roleAdmin  = Role::whereIn('title', ['Admin','Board Members'])->pluck('id')->toArray();
        $userAdmin  = User::find($user_id)->hasRole(['Admin','Board Members'])->get();
        // $userAdmin  = User::whereIn('role_id', $roleAdmin)->select('id')->get();

        $arr = [$userHead];
        foreach ($userAdmin as $key => $value) {
            $arr[] = $value->id;
        }
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
