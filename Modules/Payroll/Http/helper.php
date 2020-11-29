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
            if( $point >= $startTime && $point < $endTime )
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

function timeDifferenceInMinutes($start, $end)
{
    $printClockIn  = new Carbon($start);
    $leaveHour    = new Carbon($end);
    // $late_minutes = $printClockIn->diff($leaveHour)->format('%H:%I:%S');
    return $printClockIn->diffInMinutes($leaveHour);
}

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


/* !!!: Get Holidays within This Month */
if (!function_exists('getHolidaysWithInMonth'))
{
    function getHolidaysWithInMonth($date)
    {
        $dateFormat = dateFormation($date);
        $result = Holiday::where('start_date','>=' , $dateFormat['previousDate'])->where('end_date', '<=', $dateFormat['currentDate'])->count();

        return $result;
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
                        if ($userTimeTable) {
                            $timetable_clockIn   = $userTimeTable->in_time;
                        }else{
                            $timetable_clockIn = date("H:i:s",strtotime( '09:00:00'));
                        }
                        $hours_leave = 0;
                        if ($singleLeaveCount->hours) {
                            $hours_leave = date("H:i:s", strtotime($timetable_clockIn .'+'. $singleLeaveCount->hours .' hours'));
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
            if ($user->role()) {
                if ($user->userRole() != 'Board Members') {
                    if($userTimeTable = $user->timeTable()->first()){
                        $timetable_clockIn   = $userTimeTable->in_time;
                        $timetable_clockOut  = $userTimeTable->out_time;
                        $timetable_allowed_late  = $userTimeTable->allow_clock_in_late;
                        $timetable_allowed_leave_early  = $userTimeTable->allow_leave_early;
                        $timetable_deduction = $userTimeTable->deduction_day;
                    } else{
                        $timetable_clockIn = date("H:i:s",strtotime( '09:00:00'));
                        $timetable_clockOut =  date("H:i:s",strtotime('17:00:00'));
                        $timetable_allowed_late =45;
                        $timetable_allowed_leave_early =15;
                        $timetable_deduction =.5;
                    }

                    foreach ($daysInMonth as $key => $day) {
                        if($day <= date('Y-m-d')){
                            if(weekEnds($day) || getHolidays($day) || late_leave_deduction($user->id, $day) )
                            {

                            }else{
                                $fingerClockIn = FingerprintAttendance::where('date', $day)->where('user_id', $user->id)->get()->min('time');
                                $fingerClockOut = FingerprintAttendance::where('date', $day)->where('user_id', $user->id)->get()->max('time');
                                // dump($fingerClockOut);
                                if($fingerClockOut > $timetable_clockOut){
                                    $diff_minutes = timeDifferenceInMinutes($fingerClockOut, $timetable_clockOut);
                                    addToDeductionTable($user->id, $day, 'leave_late', 'minutes', $diff_minutes, 'extra');

                                }
                                if ($fingerClockIn == null && $day <= date('Y-m-d')) {
                                    // if(!(date('l', strtotime($day)) == 'Saturday' || date('l',strtotime($day)) == 'Friday' ) ){
                                    // $data_absent = array(
                                    //     'user_id' => $user->user_id,
                                    //     'date' => $formated_date,
                                    //     'method' => 'deduction method inside  clock_in equals null',
                                    // );
                                    // $this->db->insert('tbl_absent', $data_absent);
                                    // }
                                }
                            }
                        }
                        // dump($day);
                    }
                    // dump($user->id);
                }
            }
        }
        dd();
        // dd($daysInMonth);
    }
}

// $period =$this->period( $this->previous_month($month), $month.'-24');

// foreach($users as $user)
// {
//          $timetable_clockin = '';
//          $timetable_exceeded = '';
//          $timetable_deduction = '';
//          if($user->timetable_id){
//            $timetable = $this->payroll_model->check_by(array('id' => $user->timetable_id), 'tbl_timetables');
//            $timetable_clockin   = $timetable->clock_in;
//            $timetable_clockout  = $timetable->clock_out;
//            $timetable_exceeded  = $timetable->exceeded_amount;
//            $timetable_deduction = $timetable->deduction;
//          } else{
//            $timetable_clockin = date("H:i:s",strtotime( '09:00:00'));
//            $timetable_clockout =  date("H:i:s",strtotime('17:00:00'));
//            $timetable_exceeded =45;
//            $timetable_deduction =.5;
//          }
// foreach ($period as $day){
//   if(date('j', $day) != '31'){
//     $formated_date = date('Y-m-d',strtotime($day));
//     if($formated_date <= date('Y-m-d')){
//     if($this->week_ends($day,$user->user_id) || $this->count_holiday($formated_date,$user) || $this->late_leave_deduction($user->user_id,$formated_date))
//     {

//     }else {
//       $clock_in = $this->attendance_model->clock_in_attendance($formated_date, $user->user_id);
//       $clock_out = $this->attendance_model->clock_out_attendance($formated_date, $user->user_id);
//       if($clock_out > $timetable_clockout  ){
//          $time_difference = time_difference( $timetable->clock_out,$clock_out,);
//         $leave_late_minutes = $this->minutes($time_difference);
//         $data = array(
//                 'user_id' => $user->user_id,
//                 'type' => 'minutes',
//                 'minutes'      => $leave_late_minutes,
//                 'date'         => $formated_date,
//                 'subtracted'   => 'no',
//                 'minutes_type' => 'extra',
//                 'reason'       => 'leave_late'
//         );
//           $this->db->insert('tbl_deductions', $data);
//       }
////////////////////////////////////////////////////////////////////////////////////////////////////////
//      if ($clock_in == null && $formated_date <= date('Y-m-d')) {
//          if(!(date('l',strtotime($day)) == 'Saturday' || date('l',strtotime($day)) == 'Friday' ) ){
//            $data_absent = array(
//              'user_id' => $user->user_id,
//              'date' => $formated_date,
//              'method' => 'deduction method inside  clock_in equals null',
//            );
//            $this->db->insert('tbl_absent', $data_absent);
//          }
//      }
//      elseif ($clock_in > date('H:i:s',  strtotime($timetable_clockin.'+4 hours'))) {
//        $data_absent = array(
//          'user_id' => $user->user_id,
//          'date' => $formated_date,
//          'method' => 'deduction method inside  clock_in greater than date',
//        );
//          $this->db->insert('tbl_absent', $data_absent);
//      }
//      elseif ($clock_in > date("H:i:s",strtotime($timetable_clockin.'+'.$timetable_exceeded .'minutes'))) {
//        $data = array(
//                'user_id' => $user->user_id,
//                'type' => 'days',
//                'days' => $timetable_deduction,
//                'date' => $formated_date,
//                'subtracted' => 'no',
//                'reason' => 'late_days'
//        );
//        $this->db->insert('tbl_deductions', $data);
//      }
//      elseif ($clock_in > $timetable_clockin && $clock_in <= date("H:i:s",strtotime($timetable_clockin.'+'.$timetable_exceeded .'minutes'))) {
//        $time_difference = time_difference($timetable_clockin, $clock_in);
//        $late_minutes = $this->minutes($time_difference);
//        $data = array(
//                'user_id' => $user->user_id,
//                'type' => 'minutes',
//                'minutes' => $late_minutes,
//                'date' => $formated_date,
//                'subtracted' => 'no',
//                'minutes_type' => 'deduction',
//                'reason' => 'late_minutes'
//        );
//          $this->db->insert('tbl_deductions', $data);
//      }
//      elseif ($clock_in < $timetable_clockin) {
//        $time_difference = time_difference($clock_in, $timetable_clockin);
//        $late_minutes = $this->minutes($time_difference);
//        $data = array(
//                'user_id' => $user->user_id,
//                'type' => 'minutes',
//                'minutes' => $late_minutes,
//                'date' => $formated_date,
//                'subtracted' => 'no',
//                'minutes_type' => 'extra',
//                'reason' => 'early'
//        );
//          $this->db->insert('tbl_deductions', $data);
//      }

//     }
// }
//   }
//      }
// }
