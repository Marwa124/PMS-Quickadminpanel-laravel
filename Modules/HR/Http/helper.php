<?php

use Carbon\Carbon;
use Vonage\Client;
use Plivo\RestClient;
use App\Models\Config;
use App\Models\Locale;
use Carbon\CarbonPeriod;
use App\Models\EmailTemplate;
use Modules\HR\Entities\Absence;
use Modules\HR\Entities\Holiday;
use Modules\HR\Entities\Vacation;
use Modules\HR\Entities\WorkingDay;
use Vonage\Client\Credentials\Basic;
use Modules\HR\Entities\AccountDetail;
use Twilio\Rest\Client as TwilioClient;
use Modules\HR\Entities\LeaveApplication;
use Modules\HR\Entities\FingerprintAttendance;


if (!function_exists('getAbsentUsers')) {
    function getAbsentUsers($date, $user_id)
    {
        $data_value = FingerprintAttendance::where('date', $date)->where('user_id', $user_id)->first();
        $userAbsent = Absence::where('user_id', $user_id)->where('date', $date)->first();

        if (!$data_value && $date < date('Y-m-d') && !weekEnds($date) && !getVacations($date, $user_id) && !getHolidays($date)) {
            if (!$userAbsent) {
                $result = new Absence();
                $result->date = $date;
                $result->user_id = $user_id;
                $result->timestamps = false;
                $result->save();
            } // Recorded user in db
            return 1;
        } // not having fingerprint
        else {
            return 0;
        }
    }
}

if (!function_exists('getUserLeaves')) {
    function getUserLeaves($date, $user_id)
    {
        $leavesApp = LeaveApplication::where('user_id', $user_id)->where('leave_start_date', '<=', $date)->where('leave_end_date', '>=', $date)->first();
        return ($leavesApp) ? $leavesApp->leave_category()->first()->name : 0;
    }
}

if (!function_exists('getHolidays')) {
    function getHolidays($date)
    {
        $result = Holiday::where('start_date', '<=', $date)->where('end_date', '>=', $date)->first();
        return ($result) ? 1 : 0;
    }
}

if (!function_exists('getVacations')) {
    function getVacations($date, $user_id)
    {
        $result = Vacation::where('user_id', $user_id)->where('start_date', '<=', $date)->where('end_date', '>=', $date)->first();
        return ($result && !getHolidays($date)) ? 1 : 0;
    }
}

if (!function_exists('weekEnds')) {
    function weekEnds($day)
    {
        $dayFormat = date('D', strtotime($day));
        return WorkingDay::where('day', $dayFormat)->where('working_status', 0)->first();
    }
}

if (!function_exists('getDateRange')) {
    function getDateRange($date)
    {
        $currentMonth = date("Y-m-d", strtotime($date . '-24'));
        $carbonDate =  Carbon::createFromFormat('Y-m-d', $currentMonth)->subMonth()->format('Y-m');
        $previousMonth = date("Y-m-d", strtotime($carbonDate . '-25'));
        $period = CarbonPeriod::create($previousMonth, $currentMonth);
        // Iterate over the period
        $val = [];
        foreach ($period as $date) {
            $val[] = $date->format('Y-m-d');
        }
        return $val;
    }
}

if (!function_exists('getArabicDayName')) {
    function getArabicDayName($day)
    {
        $dayName = date('l', strtotime($day));
        switch ($dayName) {
            case 'Saturday':
                return 'السبت';
                break;
            case 'Monday':
                return 'الأثنين';
                break;
            case 'Tuesday':
                return 'الثلاثاء';
                break;
            case 'Wednesday':
                return 'الاربعاء';
                break;
            case 'Thursday':
                return 'الخميس';
                break;
            case 'Friday':
                return 'الجمعة';
                break;
            case 'Sunday':
                return 'الأحد';
                break;
        }
    }
}




if (!function_exists('settings')) {
    function settings($key, $alt = null)
    {
        $config = Config::where('key', $key)->first();
        return $config ? $config->value : $alt;
    }
}


if (!function_exists('flash')) {
    function flash($message = 'No Message Set', $type = 'info')
    {

        return [
            'message' => $message,
            'alert-type' => $type
        ];
    }
}



if (!function_exists('timezones')) {
    function timezones()
    {
        $timezoneIdentifiers = DateTimeZone::listIdentifiers();
        $utcTime = new DateTime('now', new DateTimeZone('UTC'));


        $tempTimezones = array();
        foreach ($timezoneIdentifiers as $timezoneIdentifier) {
            $currentTimezone = new DateTimeZone($timezoneIdentifier);

            $tempTimezones[] = array(
                'offset' => (int)$currentTimezone->getOffset($utcTime),
                'identifier' => $timezoneIdentifier
            );
        }

        // Sort the array by offset,identifier ascending
        usort($tempTimezones, function ($a, $b) {
            return ($a['offset'] == $b['offset']) ? strcmp($a['identifier'], $b['identifier']) : $a['offset'] - $b['offset'];
        });

        $timezoneList = array();
        foreach ($tempTimezones as $tz) {
            $sign = ($tz['offset'] > 0) ? '+' : '-';
            $offset = gmdate('H:i', abs($tz['offset']));
            $timezoneList[$tz['identifier']] = '(UTC ' . $sign . $offset . ') ' .
                $tz['identifier'];
        }

        return $timezoneList;
    }
}



if (!function_exists('get_locale')) {
    function get_locale($user = FALSE)
    {
        $locale = null;
        if (!$user) {
            $locale_config = Config::where('key', 'locale')->first();


            if ($locale_config) {

                $locale = Locale::where('locale', $locale_config->value)->first()->code;
            } else {
                $locale = env('APP_LOCALE');
            }
        } else {

            $locale_user = AccountDetail::where('user_id', $user)->first();

            $loc = null;
            if (empty($locale_user->locale)) {

                $loc = 'en_US';
            } else {
                $loc = $locale_user->locale;
            }


            $locale_for_code = Locale::where('locale', $loc)->first();

            if ($locale_for_code) {

                $locale = $locale_for_code->code;
            } else {
                $locale = env('APP_LOCALE');
            }
        }

        return $locale;
    }
}






if (!function_exists('display_money')) {




    function display_money($value, $currency = false, $decimal = null, $position = null)
    {

        $decimal = $decimal ? $decimal : settings('decimal_separator');

        switch (6) {
            case 1:
                $value = number_format($value, $decimal, '.', ',');
                break;
            case 2:
                $value = number_format($value, $decimal, ',', '.');
                break;
            case 3:
                $value = number_format($value, $decimal, '.', '');
                break;
            case 4:
                $value = number_format($value, $decimal, ',', '');
                break;
            case 5:
                $value = number_format($value, $decimal, ".", "'");
                break;
            case 6:
                $value = number_format($value, $decimal, ".", " ");
                break;
            case 7:
                $value = number_format($value, $decimal, ",", " ");
                break;
            case 8:
                $value = number_format($value, $decimal, "'", " ");
                break;
            default:
                $value = number_format($value, $decimal, '.', ',');
                break;
        }

        $position =  $position ? $position : settings('currency_position');
        switch ($position) {
            case 'left':
                $return = $currency . ' ' . $value;
                break;
            case 'right':
                $return = $value . ' ' . $currency;
                break;
            case false:
                $return = $value;
                break;
            default:
                $return = $currency . ' ' . $value;
                break;
        }

        return $return;
    }
}




if (!function_exists('display_time')) {
    function display_time($time, $format = null)
    {
        $format = $format ? $format : settings('time_format');

        return date($format, $time);
    }
}



if (!function_exists('display_date')) {

    function display_date($date, $format = null)
    {
        $format = $format ? $format : settings('date_format');

        return date($format, $date);
    }
}

// if (!function_exists('is_trigger_message_empty')) {

//     function is_trigger_message_empty($message)
//     {
//         if (trim($message) === '') {
//             return false;
//         }
//         return true;
//     }
// }


// if (!function_exists('get_activate_gateway')) {
//     function get_activate_gateway()
//     {

//         $active = false;
//         foreach (get_gateways() as $id => $gateway) {
//             if (settings($id . '_status') == '1') {
//                 $active = $gateway;
//                 break;
//             }
//         }
//         return $active;
//     }
// }


if (!function_exists('get_available_triggers')) {
    function get_available_triggers()
    {
        $triggers = config('sms.triggers');

        foreach ($triggers as $trigger_id => $triger) {
            $triggers[$trigger_id]['value'] = settings('sms_template_' . strtolower($trigger_id));

            if (!empty($triger['sms_number'])) {
                if (!empty(settings($trigger_id . '_sms_number'))) {
                    $sms_number = settings($trigger_id . '_sms_number');
                } else {
                    $sms_number = '01006143107';
                }
                $triggers[$trigger_id]['sms_number'] = $sms_number;
            }
        }
        return $triggers;
    }
}

if (!function_exists('is_any_trigger_active')) {
    function is_any_trigger_active()
    {

        $active = false;
        foreach (get_available_triggers() as $trigger_id => $trigger_opts) {
            if (is_trigger_message_empty(settings('sms_template_' . $trigger_id))) {
                $active = true;
                break;
            }
        }

        return $active;
    }
}

if (!function_exists('trigger_option_name')) {

    function trigger_option_name($trigger)
    {
        return 'sms_template_' . strtolower($trigger);
    }
}


if (!function_exists('sendMsgByTwilio')) {

    function sendMsgByTwilio($msg, $to = null)
    {
        $account_sid = settings('twilio_account_sid');
        $auth_token  = settings('twilio_token_auth');
        $number      = settings('twilio_phone_number');

        $client = new TwilioClient($account_sid, $auth_token);
        $msg = $client->messages->create(
            '+' . $to,
            ['from' => $number, 'body' => $msg]
        );
    }
}





if (!function_exists('sendMsgByNexmo')) {

    function sendMsgByNexmo($msg, $to = null)
    {
        $account_sid = settings('nexmo_account_sid');
        $auth_token  = settings('nexmo_token_auth');
        $from      = settings('nexmo_phone_number');

        $basic  = new Basic($account_sid, $auth_token);
        $client = new Client($basic);

        $message = $client->message()->send([
            'to'   => $to,
            'from' => $from,
            'text' => $msg
        ]);
    }
}



if (!function_exists('sendMsgByPlivo')) {

    function sendMsgByPlivo($msg, $to = null)
    {
        $account_sid = settings('plivo_account_sid');
        $auth_token  = settings('plivo_token_auth');
        $from      = settings('plivo_phone_number');

        $client = new RestClient($account_sid, $auth_token);


        $message_created = $client->messages->create(
            $from,
            [$to],
            'Hello, world!'
        );
    }
}


if (!function_exists('templates')) {
    function templates($email_group)
    {

        $email_template  = EmailTemplate::where('email_group', $email_group)->first();
        if ($email_template) {
            return $email_template;
        } else {
            return false;
        }
    }
}