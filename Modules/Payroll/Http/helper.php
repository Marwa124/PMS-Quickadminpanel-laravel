<?php

use App\Models\User;
use Carbon\Carbon;
use Carbon\CarbonPeriod;
use Modules\HR\Entities\Absence;
use Modules\HR\Entities\FingerprintAttendance;
use Modules\HR\Entities\Holiday;
use Modules\HR\Entities\LeaveApplication;
use Modules\HR\Entities\LeaveCategory;
use Modules\HR\Entities\Vacation;
use Modules\Payroll\Entities\AdvanceSalary;
use Modules\Payroll\Entities\Deduction;

/* !!!: From Current month day 24 to pervious month day 25 */
if (!function_exists('dateFormation'))
{
    function dateFormation($date) //year-month Form
    {
        $currentDate = $date.'-24';
        // $currentDateCarbonFormat = Carbon::createFromFormat('Y-m-d', $date.'-24'); // Y-m-d
        // Carbon::parse($month.'-24')->format('Y-m-d')
        $currentDateCarbonFormat = Carbon::parse($date.'-24'); // Y-m-d

        $lastMonth =  $currentDateCarbonFormat->subMonth()->format('Y-m'); // Previous Month
        // $lastMonthCarbonFormat = Carbon::createFromFormat('Y-m-d', $lastMonth.'-25'); // Y-m-d
        $lastMonthCarbonFormat = Carbon::parse($lastMonth.'-24'); // Y-m-d
        $previousDate = $lastMonth.'-25';

        return [
            'currentDate' => $currentDate,
            'previousDate' => $previousDate,
            'currentDateCarbonFormat' => $currentDateCarbonFormat,
            'lastMonthCarbonFormat' => $lastMonthCarbonFormat,
        ];
    }
}



// Iterate over the period
/* !!!: Check if that date exists in this passed period of time */
if (!function_exists('dateRange')) {
    function dateRange($period, $date) //(array of days(Y-m-d), $month)
    {
        $dayRange = [];
        $countNumber = 0;
        $dateFormat = dateFormation($date);
        /* !!!: If day in vacation is between 24 of this month and pervious month day 25 */
        foreach ($period as $day) {
            // $dayValue = [];

            $startTime = strtotime($dateFormat['previousDate']);
            $endTime = strtotime($dateFormat['currentDate']);
            $point = strtotime($day->format('Y-m-d'));
            if( $point >= $startTime && $point <= $endTime )
            {
                // dump($day->format('Y-m-d'));
                // array_push($dayRange, $day->format('Y-m-d'));
                $dayRange[] = $day->format('Y-m-d');
                $countNumber ++;
            }
        }

        return [
            'countNumber' => $countNumber,
            'days' => $dayRange,
        ];
    }
}

if (!function_exists('timeDifferenceInMinutes')) {
    function timeDifferenceInMinutes($start, $end)
    {
        $printClockIn  = new Carbon($start);
        $leaveHour    = new Carbon($end);
        // $late_minutes = $printClockIn->diff($leaveHour)->format('%H:%I:%S');
        return $printClockIn->diffInMinutes($leaveHour);
    }
}

if (!function_exists('formattedTimeSummation')) {
    function formattedTimeSummation($timeIn, $timeOut, $type = 'minutes')
    {
        if($type != 'minutes'){
            $in = strtotime($timeIn);
            $out = strtotime($timeOut);
            $sum = $in + $out ;
        }else{
            $formateTimeOut = "00:".$timeOut.":00";
            $out = strtotime(date('H:i:s', strtotime($formateTimeOut)));

            $in = strtotime($timeIn);
            $sum = $in + $out ;
        }
        return date("H:i:s", $sum);
    }
}

if (!function_exists('addToDeductionTable')) {
    function addToDeductionTable($user_id, $date, $reason, $type = 'days', $minutes = null, $minutes_type = null, $subtracted = 'no')
    {
        Deduction::create([
            'user_id' => $user_id,
            'type'    => $type,
            'minutes' => $minutes,
            'minutes_type' => $minutes_type,
            'date' => $date,
            'subtracted' => $subtracted,
            'reason' => $reason
        ]);
    }
}


/* !!!: Get Holidays within This Month */
if (!function_exists('getHolidaysWithInMonth'))
{
    function getHolidaysWithInMonth($date) // Takes a month '2020-09'
    {
        $holiday_count = 0;
        $holidays = Holiday::all();

        /* !!!: get each day of the month *////////////////////////////
        $dateFormat = dateFormation($date);
        $period = CarbonPeriod::create($dateFormat['previousDate'], $dateFormat['currentDate']);
        $monthDays = dateRange($period, $date)['days'];
        /* !!!: get each day of the month *////////////////////////////

        foreach ($holidays as $key => $holiday) { // Loop Through holiday days
            $period = CarbonPeriod::create($holiday->start_date, $holiday->end_date);
            $holidayDays = dateRange($period, $date)['days'];
            foreach ($monthDays as $key => $monthDay) { // Loop Through month days
                if(in_array($monthDay, $holidayDays) && !weekEnds($monthDay))
                {
                    $holiday_count += 1;
                }
            }
        }

        return $holiday_count;
    }
}

/* !!!: Vacation Within this month for the requested user */
if (!function_exists('getVacationsWithInMonth'))
{
    function getVacationsWithInMonth($date, $user_id) //month date
    {
        $countVacation = 0;

        $vacations = Vacation::where('user_id', $user_id)->get();
        foreach ($vacations as $key => $vacation) {
            $period = CarbonPeriod::create($vacation->start_date, $vacation->end_date);
            $countVacation = dateRange($period, $date)['countNumber'];
        }
        return $countVacation;
    }
}

// Returns:: Check if user exceeded his leaves no.
// Returns:: Returns total taken leaves and no.of category quota
// Returns:: checkAvailableLeaves(4, '2020-10',2);
if (!function_exists('checkAvailableLeaves')) {
    // function checkAvailableLeaves($user_id, $date, $start_date = NULL, $end_date = NULL, $leave_category_id = NULL, $return = null, $leave_application_id = null)
    function checkAvailableLeaves($user_id, $date, $leave_category_id)
    {
        $categoryLeave = LeaveCategory::where('id', $leave_category_id)->first();
        $category_leave_quota = $categoryLeave->leave_quota;

        // !!!: Accepted Leaves
        $token_leave = LeaveApplication::where('leave_category_id', $leave_category_id)->where('user_id', $user_id)->where('application_status', 'accepted')->get();
        $leaveCounts = 0;
        $leaveDays = [];
        $multiDaysLeaves = [];
        foreach ($token_leave as $taken_leave_value) {
            $period = CarbonPeriod::create($taken_leave_value->leave_start_date, $taken_leave_value->leave_end_date);
            $leaveDays[] = dateRange($period, $date)['days'];
            $leaveCounts += (dateRange($period, $date)['countNumber'] != 0 ) ? dateRange($period, $date)['countNumber'] : 1;
            // !!!: Only return leaves that have multi days
            if (dateRange($period, $date)['countNumber']) {
                $multiDaysLeaves[] = $taken_leave_value->id;
            }
        }
        if ($leaveCounts >= $category_leave_quota) {
            return [
                'token_leaves' => $leaveCounts,
                'category_leave_quota' => $category_leave_quota,
                'msg' => "You already took  $leaveCounts $categoryLeave->name You can apply maximum for $category_leave_quota"
            ];
        }
        return [
            'token_leaves' => $leaveCounts,
            'category_leave_quota' => $category_leave_quota,
        ];
    }
}

// !!!: Check before call this fun. if in deduction table the is a leave with the same id and date to prevent duplications
// Returns:: void fun Check if user leave deducted or clock in late to insert a deduction into deductions table
if (!function_exists('late_leave_deduction')) {
    function late_leave_deduction($user_id , $date)
    {
        $leaveDays = [];
        $leaves = LeaveApplication::where('user_id', $user_id)->where('application_status', 'accepted')->get();

        foreach ($leaves as $key => $leave) {
            $period = CarbonPeriod::create($leave->leave_start_date, $leave->leave_end_date);
            $leaveDays[] = dateRange($period, $date)['days'];
        }
        foreach ($leaveDays as $key => $value) {
            if ($value) {
                $singleLeaveCount = LeaveApplication::where('leave_start_date','<=' , $value[0])->where('leave_end_date', '>=', $value[0])->first();
                $leaveCategory = $singleLeaveCount->leave_category()->first();

                if ($singleLeaveCount->deduct == 'yes') {
                    addToDeductionTable($singleLeaveCount->user_id, $singleLeaveCount->leave_start_date, 'exceeded_leaves');
                }else{
                    // if ($leaveCategory->name == 'Leave Early' || $leaveCategory->name == 'Working From Home' || $leaveCategory->name == 'Annual Leave' ||
                    //     $leaveCategory->name == 'Sick Leave' ||  $leaveCategory->name == 'Emergency Leave') {
                    //      return true;
                    // }else
                    if ($leaveCategory->name == 'Clock in late') {
                        $userTimeTable = User::find($user_id)->timeTable()->first();
                        $timetable_clockIn = $userTimeTable ? $userTimeTable->in_time : '09:00:00';

                        $hours_leave = 0;
                        if ($singleLeaveCount->hours) {
                            $hours_leave = formattedTimeSummation($timetable_clockIn, $singleLeaveCount->hours);
                        }
                        $fingerPrintClockIn = FingerprintAttendance::where('user_id', $user_id)->where('date', $value[0])->get()->min('time');

                        if ($fingerPrintClockIn > $hours_leave) {
                            $late_minutes = timeDifferenceInMinutes($fingerPrintClockIn, $hours_leave);
                            // dd($late_minutes);
                            addToDeductionTable($singleLeaveCount->user_id, $singleLeaveCount->leave_start_date, 'late', 'minutes', $late_minutes, 'deduction');
                        }
                        // dump($hours_leave);
                    }
                }
            }
        }
        // dd();
    }
}


if (!function_exists('deduction')) {
    function deduction($month)
    {
        // dd(Carbon::parse($month.'-24')->format('Y-m-d'));
        // dd(Absence::where('date', '>=', dateFormation($month)['previousDate'])->where('date', '<=', dateFormation($month)['currentDate'])->get());
        Deduction::where('date', '>=', dateFormation($month)['previousDate'])->where('date', '<=', dateFormation($month)['currentDate'])->delete();
        Absence::where('date', '>=', dateFormation($month)['previousDate'])->where('date', '<=', dateFormation($month)['currentDate'])->delete();

        $period = CarbonPeriod::create(dateFormation($month)['previousDate'], dateFormation($month)['currentDate']);
        $daysInMonth = dateRange($period, $month)['days'];

        $activeUsers = User::where('banned', 0)->get();
        foreach ($activeUsers as $key => $user) {

            if (!$user->hasRole('Board Members')) {
                $sum_late_minutes = 0;
                $sum_extra_minutes = 0;

                $userTimeTable = $user->timeTable()->first();

                $timetable_clockIn       = $userTimeTable ? $userTimeTable->in_time : '09:00:00';
                $timetable_clockOut      = $userTimeTable ? $userTimeTable->out_time : '17:00:00';
                $timetable_allowed_late  = $userTimeTable ? $userTimeTable->allow_clock_in_late : 45;
                $timetable_allowed_leave_early  = $userTimeTable ? $userTimeTable->allow_leave_early : 15;
                $timetable_deduction     = $userTimeTable ? $userTimeTable->deduction_day : .5;

                foreach ($daysInMonth as $key => $day) {
                    if($day <= date('Y-m-d')){
                        if(weekEnds($day) || getHolidays($day) || late_leave_deduction($user->id, $day) )
                        {

                        }else{
                            $fingerClockIn = FingerprintAttendance::where('date', $day)->where('user_id', $user->id)->get()->min('time');
                            $fingerClockOut = FingerprintAttendance::where('date', $day)->where('user_id', $user->id)->get()->max('time');
                        //    dump(formattedTimeSummation($timetable_clockIn, $timetable_allowed_late));
                            if($fingerClockOut > $timetable_clockOut){
                                // dump('extra,  '. $fingerClockIn);
                                $diff_minutes = timeDifferenceInMinutes($fingerClockOut, $timetable_clockOut);
                                addToDeductionTable($user->id, $day, 'leave_late', 'minutes', $diff_minutes, 'extra');
                            }
                            if ($fingerClockIn == null && $day <= date('Y-m-d')) {
                                // dump('absent, '. $fingerClockIn);
                                Absence::create([
                                    'user_id' => $user->id,
                                    'date' => $day,
                                ]); // Insert User as Absent for that day
                            }elseif ($fingerClockIn > formattedTimeSummation($timetable_clockIn, '04:00:00', 'timeFormat')) {
                                // dump('absent,  came after 4 hours,   ' . $fingerClockIn);
                                Absence::create([
                                    'user_id' => $user->id,
                                    'date' => $day,
                                ]);
                            // }elseif ($fingerClockIn > date("H:i:s",strtotime($timetable_clockIn.'+'.$timetable_clockIn .'minutes'))) {
                            }elseif ($fingerClockIn > $timetable_clockIn && $fingerClockIn <= formattedTimeSummation($timetable_clockIn, $timetable_allowed_late)) {
                                // dump('late Minutes,  Before time table allowed late , ' . $fingerClockIn);
                                $late_minutes = timeDifferenceInMinutes($timetable_clockIn, $fingerClockIn);
                                $sum_late_minutes += $late_minutes;
                                addToDeductionTable($user->id, $day, 'late_minutes', 'minutes', $late_minutes, 'deduction');
                            }elseif ($fingerClockIn > formattedTimeSummation($timetable_clockIn, $timetable_allowed_late)) {
                                // dump('late days,  after time table allowed late ,  deduct( .5) day, ' . $fingerClockIn);
                                addToDeductionTable($user->id, $day, 'late_days');
                            // }elseif ($fingerClockIn > $timetable_clockIn && $fingerClockIn <= date("H:i:s",strtotime($timetable_clockIn.'+'.$timetable_allowed_late .'minutes'))) {
                            }elseif ($fingerClockIn < $timetable_clockIn) {
                                // dump('early,  before time clockin,  '.$fingerClockIn);
                                $extra_minutes = timeDifferenceInMinutes($timetable_clockIn, $fingerClockIn);
                                $sum_extra_minutes += $extra_minutes;
                                addToDeductionTable($user->id, $day, 'early', 'minutes', $extra_minutes, 'extra');
                            }
                        }
                            /* !!!: End Else today is not a weekend */
                    }
                    /* !!!: End If that day earlier <= than today */
                    // dump($day);
                }
                    /* !!!: End foreach on every day of the month */
                // dump($user->id);
            }
             /* !!!: End if user not an employee like "Board Members" */
        }
        /* !!!: End foreach on every user */
        // dd();
        // dd($daysInMonth);
        return [
            'total_late_minutes' => $sum_late_minutes,
            'total_extra_minutes' => $sum_extra_minutes,
        ];
    }
}


if (!function_exists('deductionDetails')) {
    function deductionDetails($month, $user_id, $dailySalary, $absent_value)
    {
        $fp_late_minus_deduction    = 0;
        $fp_days_deduction          = 0;
        $leave_exceeded_deduction   = 0;
        $leave_late_minus_deduction = 0;
        $extra_minutes              = 0;
        $penalty                    = 0;

        $allDeductions = Deduction::where('user_id', $user_id)->where('date', '>=', dateFormation($month)['previousDate'])
                ->where('date', '<=', dateFormation($month)['currentDate'])->get();

        foreach ($allDeductions as $key => $value) {
            if ($value->reason == 'late_minutes') {
                $fp_late_minus_deduction += $value->minutes;
            }elseif ($value->reason == 'late_days') {
                $fp_days_deduction += $value->days;
            }elseif ($value->reason == 'exceeded_leaves') {
                $leave_exceeded_deduction += $value->days;
            }elseif ($value->reason == 'leave') {
                $leave_late_minus_deduction += $value->minutes;
            }elseif ($value->minutes_type == 'extra') {
                $extra_minutes += $value->minutes;
            }
        }

         // !!!: Check User Advanced Salary (Penalty)
        $check_user_advanced_salary =  AdvanceSalary::where('month', $month)->where('user_id', $user_id)->first();
        if ($check_user_advanced_salary) {
            $penalty = ($check_user_advanced_salary->type == 'Penalty') ?
                round($check_user_advanced_salary->amount * $dailySalary) : 0;
        }

        // $missing_hours = 0;
        $totalLate = $leave_late_minus_deduction + $fp_late_minus_deduction;
        $minutes_deduction = ($totalLate > $extra_minutes) ?
            round(((($totalLate - $extra_minutes) / 60) / 8) * $dailySalary) : 0;
            // ( floor(($totalLate - $extra_minutes) / 60 ) * 0.5  ) : 0;
        // $minutes_deduction =  round($missing_hours * $dailySalary) ?? 0;
        $fp_days_deduction = round($fp_days_deduction * $dailySalary) ?? 0;

        $leave_exceeded_deduction = round($leave_exceeded_deduction * $dailySalary);
        $v_total_deduction = round($minutes_deduction + $fp_days_deduction + $leave_exceeded_deduction + $penalty);

        return [
            'totalDeductions' => $v_total_deduction + $absent_value,
            'lateMinutes'     => $totalLate,
            'extraMinutes'    => $extra_minutes,
            'minutesDeduction'=> $minutes_deduction,
            'fpDaysDeduction' => $fp_days_deduction,
            'leavesDeduction' => $leave_exceeded_deduction,
            'penalty'         => $penalty,
        ];
    }
}


if (!function_exists('totalAmount')) {
    function totalAmount($month, $user_id, $dailySalary, $absent_value)
    {
        // $total_net_salary = 0;
        // $total_gross_salary = 0;
        // $total_base_salary = 0;
        // $total_daily_salary = 0;
        // $total_net_salary = 0;
        // $total_query_attendance = 0;
        // $total_absent = 0;
        // $total_holiday = 0;
        // $total_vacation = 0;
        // $total_all_deduction = 0;
        // $total_leave_days = 0;
        // $total_late_minutes_deduction = 0;
        // $total_extra_minutes = 0;
        // $total_bounes = 0;
        // $total_details  = 0;





        // $total_gross_salary += $gross_salary;
        // $total_base_salary += $gross_salary - $deductions;
        // $total_daily_salary += $net_salary / 30;
        // $total_query_attendance += 0;
        // $total_absent += $total_absence;
        // $total_holiday += $holidays;
        // $total_vacation += $vacations;
        // $total_all_deduction += $deductions +($total_absence * $x );
        // $total_leave_days += $leave_days;
        // $total_late_minutes_deduction += ($late_minutes);
        // $total_extra_minutes +=$extra_minutes;
        // $total_bounes = 665 + 499  ;
        // $total_details  += 0;
        // $total_net_salary += $net_paid;

        // $data[] = $sub_array;
    }
}
