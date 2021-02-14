<?php

use Carbon\Carbon;
use App\Models\Config;
use App\Models\Locale;
use Carbon\CarbonPeriod;
use Modules\HR\Entities\Absence;
use Modules\HR\Entities\Holiday;
use Modules\HR\Entities\Vacation;
use Modules\HR\Entities\WorkingDay;
use Modules\HR\Entities\AccountDetail;
use Modules\HR\Entities\LeaveApplication;
use Modules\HR\Entities\FingerprintAttendance;

if (!function_exists('getAbsentUsers')) {
    function getAbsentUsers($date, $user_id)
    {
        $data_value = FingerprintAttendance::where('date', $date)->where('user_id', $user_id)->first();
        $userAbsent = Absence::where('user_id', $user_id)->where('date', $date)->first();

        if (!$data_value && $date < date('Y-m-d') && !weekEnds($date) && !getVacations($date, $user_id) && !getHolidays($date)) {
            if (!$userAbsent) {
                // dd('ppppmmm');
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
