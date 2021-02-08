<?php

use App\Models\Invoice;
use App\Models\User;
use Modules\ProjectManagement\Entities\Activity;
use Modules\Sales\Entities\Proposal;
use Modules\MaterialsSuppliers\Entities\TaxRate;


//get global user notify
if (!function_exists('globalNotificationId')) {
    function globalNotificationId($user_id)
    {
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
    function resHandel($data = [], $message = 'Success', $code = 200, $headers = [])
    {
        return response(['data' => $data, 'message' => $message, 'code' => $code], $code, $headers);
    }
}
/***********************************************************************************/

if (!function_exists('get_time_spent_result')) {

    function get_time_spent_result($seconds)
    {
        $init = $seconds;
        //dd($seconds);
        $hours = floor($init / 3600);
        $minutes = floor(($init / 60) % 60);
        $seconds = $init % 60;
        return $hours . ':' . $minutes . ':' . $seconds;
        //return "<ul class='timer'><li>" . $hours . "<span>" . lang('hours') . "</span></li>" . "<li class='dots'>" . ":</li><li>" . $minutes . "<span>" . lang('minutes') . "</span></li>" . "<li class='dots'>" . ":</li><li>" . $seconds . "<span>" . lang('seconds') . "</span></li></ul>";
    }
}

if (!function_exists('time_ago')) {

    function time_ago($time_ago)
    {
        if (is_numeric($time_ago) && (int)$time_ago == $time_ago) {
            $time_ago = $time_ago;
        } else {
            $time_ago = strtotime($time_ago);
        }
        $cur_time = time();
        $time_elapsed = $cur_time - $time_ago;
        $seconds = $time_elapsed;
        $minutes = round($time_elapsed / 60);
        $hours = round($time_elapsed / 3600);
        $days = round($time_elapsed / 86400);
        $weeks = round($time_elapsed / 604800);
        $months = round($time_elapsed / 2600640);
        $years = round($time_elapsed / 31207680);
        // Seconds
        if ($seconds <= 60) {
            return trans('cruds.activities.fields.time_ago_just_now');
        } //Minutes
        elseif ($minutes <= 60) {
            if ($minutes == 1) {
                return trans('cruds.activities.fields.time_ago_minute');
            } else {
                return trans('cruds.activities.fields.time_ago_minutes', ['minute' => $minutes]);
            }
        } //Hours
        elseif ($hours <= 24) {
            if ($hours == 1) {
                return trans('cruds.activities.fields.time_ago_hour');
            } else {
                return trans('cruds.activities.fields.time_ago_hours', ['hour' => $hours]);
            }
        } //Days
        elseif ($days <= 7) {
            if ($days == 1) {
                return trans('cruds.activities.fields.time_ago_yesterday');
            } else {
                return trans('cruds.activities.fields.time_ago_days', ['day' => $days]);
            }
        } //Weeks
        elseif ($weeks <= 4.3) {
            if ($weeks == 1) {
                return trans('cruds.activities.fields.time_ago_week');
            } else {
                return trans('cruds.activities.fields.time_ago_weeks', ['week' => $weeks]);
            }
        } //Months
        elseif ($months <= 12) {
            if ($months == 1) {
                return trans('cruds.activities.fields.time_ago_month');
            } else {
                return trans('cruds.activities.fields.time_ago_months', ['month' => $months]);
            }
        } //Years
        else {
            if ($years == 1) {
                return trans('cruds.activities.fields.time_ago_year');
            } else {
                return trans('cruds.activities.fields.time_ago_years', ['year' => $years]);
            }
        }
    }
}

if (!function_exists('setActivity')) {

    function setActivity($module, $module_field_id, $activity, $module_value)
    {
        $activityData = [
            'user_id'           =>  auth()->user()->id,
            'module'            =>  $module,
            'module_field_id'   =>  $module_field_id,
            'activity'          =>  $activity,
            //        'activity_date',
            //        'icon',
            //        'link',
            'value1'            =>  $module_value,
            //        'value2'
        ];

        Activity::create($activityData);
    }
}
if (!function_exists('generate_proposal_number')) {

    function generate_proposal_number()
    {

        $lastrecorder = Proposal::max('id'); //10
        $date = \Carbon\Carbon::now();
        if ($lastrecorder == null) {
            $nextPoNumber = 'PRO-' . $date->isoFormat('D/MMM/Y') . '/' . '0001';
        } else {
            //increase 1 with last invoice number
            $incr = $lastrecorder + 1;
            $nextPoNumber = 'PRO-' . $date->isoFormat('D/MMM/Y') . '/' . '000' . $incr;
        }
        return $nextPoNumber;
    }
}


if (!function_exists('generate_invoice_number')) {

    function generate_invoice_number()
    {

        $lastrecorder = Invoice::max('id');
        $date = \Carbon\Carbon::now();
        if ($lastrecorder == null) {
            $nextPoNumber = 'INV-' . $date->isoFormat('D/MMM/Y') . '/' . '0001';
        } else {
            //increase 1 with last invoice number
            $incr = $lastrecorder + 1;
            $nextPoNumber = 'INV-' . $date->isoFormat('D/MMM/Y') . '/' . '000' . $incr;
        }
        return $nextPoNumber;
    }
}


if (!function_exists('get_taxes')) {

    function get_taxes($id)
    {

        $taxes = TaxRate::findOrFail($id);

        return $taxes;
    }
}




if (!function_exists('settings')) {
    function settings($key, $alt = null)
    {
        $config = Config::where('key', $key)->first();
        return $config ? $config->value : $alt;
    }
}
