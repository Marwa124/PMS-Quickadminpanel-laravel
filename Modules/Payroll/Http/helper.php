<?php

use Carbon\Carbon;
use Carbon\CarbonPeriod;
use Modules\HR\Entities\Holiday;
use Modules\HR\Entities\LeaveApplication;
use Modules\HR\Entities\LeaveCategory;
use Modules\HR\Entities\Vacation;

/* !!!: From Current month day 24 to pervious month day 25 */
if (!function_exists('dateFormation'))
{
    function dateFormation($date)
    {
        $currentDate = $date.'-24';
        $currentDateCarbonFormat = Carbon::createFromFormat('Y-m-d', $date.'-24'); // Y-m-d
        $lastMonth =  $currentDateCarbonFormat->subMonth()->format('Y-m'); // Previous Month
        $lastMonthCarbonFormat = Carbon::createFromFormat('Y-m-d', $lastMonth.'-25'); // Y-m-d
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
if (!function_exists('')) {
    function dateRange($period, $date)
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
    function getVacationsWithInMonth($date, $user_id)
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

if (!function_exists('checkAvailableLeaves')) {
    // function checkAvailableLeaves($user_id, $date, $start_date = NULL, $end_date = NULL, $leave_category_id = NULL, $return = null, $leave_application_id = null)
    function checkAvailableLeaves($user_id, $date, $leave_category_id)
    {
        // if (!empty($leave_category_id) && !empty($start_date)) {
            $categoryLeave = LeaveCategory::where('id', $leave_category_id)->first();
            $category_leave_quota = $categoryLeave->leave_quota;

            // $token_leave = LeaveApplication::where('leave_category_id', $leave_category_id)->where('user_id', $user_id)->where('application_status', 2)->get();
            $token_leave = LeaveApplication::where('leave_category_id', $leave_category_id)->where('user_id', $user_id)->get();
            $total_token = 0;
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
                // dump(dateRange($period, $date)['countNumber']);
            }
            dd($leaveCounts);
            // $total_token = ;

            $input_ge_days = 0;
            $input_m_days = 0;
            if (!empty($end_date) && $end_date != 'null') {
                $input_month = cal_days_in_month(CAL_GREGORIAN, date('m', strtotime($start_date)), date('Y', strtotime($end_date)));

                $input_datetime1 = new DateTime($start_date);
                $input_datetime2 = new DateTime($end_date);
                $input_difference = $input_datetime1->diff($input_datetime2);
                if ($input_difference->m != 0) {
                    $input_m_days += $input_month;
                } else {
                    $input_m_days = 0;
                }
                $input_ge_days += $input_difference->d + 1;
                $input_total_token = $input_m_days + $input_ge_days;
            } else {
                $input_total_token = 1;
            }
            $taken_with_input = $total_token + $input_total_token;
            $left_leave = $category_leave_quota - $total_token;
            if ($category_leave_quota < $taken_with_input) {
                if ($user_id == $this->session->userdata('user_id')) {
                    $t = 'You ';
                } else {
                    $profile = $this->db->where('user_id', $user_id)->get('tbl_account_details')->row();
                    $t = $profile->fullname;
                }
                return "$t already took  $total_token $total_leave->leave_category You can apply maximum for $left_leave more";

            }
    }
}


if (!function_exists('late_leave_deduction')) {
    function late_leave_deduction($user_id , $date)
    {
    // try{
        $leaveDays = [];
        $leaves = LeaveApplication::where('user_id', $user_id)->get();
        foreach ($leaves as $key => $leave) {
            $period = CarbonPeriod::create($leave->leave_start_date, $leave->leave_start_date);
            $leaveDays[] = dateRange($period, $date)['days'];
            // dump(dateRange($period, $date));
        }
        foreach ($leaveDays as $key => $value) {
            if ($value) {

                $singleLeaveCount = LeaveApplication::where('leave_start_date','<=' , $value[0])->where('leave_end_date', '>=', $value[0])->first();

                // dump($value[0]);
                // dump($singleLeaveCount);
            }
        }
        dd();
        //         $this->db->select('*');
        //          $this->db->from('tbl_leave_application');
        //          $this->db->join('tbl_leave_category', 'tbl_leave_category.leave_category_id = tbl_leave_application.leave_category_id');
        //          $this->db->where("tbl_leave_application.leave_start_date <=",$date);
        //          $this->db->where("tbl_leave_application.leave_end_date >=",$date);
        //          $this->db->where('tbl_leave_application.user_id', $user_id);

        //          $this->db->where('tbl_leave_application.application_status', 2);
        //          $days_value = $this->db->get()->result_array();
        //        }

        //        catch(\Exception $e){
        //          var_dump($e);
        //        }

        //         if($days_value){
        //             $days_value =$days_value[0];
        //            if ($days_value['paid_leave'] == null) {
        //              $data = array(
        //                      'user_id' => $user_id,
        //                      'type' => 'days',
        //                      'days' => $days_value['deducted_amount'],
        //                      'date' => $days_value['leave_start_date'],
        //                      'subtracted' => 'no',
        //                      'reason' => 'exceeded_leaves'
        //              );
        //                $this->db->insert('tbl_deductions', $data);

        //            }else {

        //            /** End leaves ***/

        //            if ($days_value['leave_category'] == 'Leave Early' || $days_value['leave_category'] == 'Client Meeting'||
        //             $days_value['leave_category'] == 'Working From Home' || $days_value['leave_category'] == 'Survey'||
        //            $days_value['leave_category'] == 'Annual Leave' ||  $days_value['leave_category'] == 'Sick Leave' ||  $days_value['leave_category'] == 'Emergency Leave') {
        //              return true;

        //            }
        //            elseif ($days_value['leave_category'] == 'Clock in late') {

        //              $timetable_clockin = '';

        //              $user = $this->payroll_model->check_by(array('user_id' => $user_id), 'tbl_users');

        //              if($user->timetable_id){
        //                $timetable = $this->payroll_model->check_by(array('id' => $user->timetable_id), 'tbl_timetables');
        //                $timetable_clockin   = $timetable->clock_in;
        //              } else{
        //                $timetable_clockin = date("H:i:s",strtotime( '09:00:00'));
        //              }
        //              $leves_hours = $days_value['hours'];
        //                $t = strtotime($days_value['leave_start_date']);
        //                $formated_date = date('Y-m-d',$t);
        //                $hours_leave = date("H:i:s", strtotime($timetable_clockin .'+'. $days_value['hours'] .' hours')); //11:00:00
        //                $this->db->select_min('time');
        //                $this->db->from('tbl_fingerprint_attendances');
        //                $this->db->where('date', $formated_date);
        //                $this->db->where('user_id', $user_id);
        //                $q = $this->db->get()->result();
        //                if ($q[0]->time > $hours_leave) {
        //                  $k = time_difference($hours_leave, $q[0]->time);
        //                  $late_minutes = $this->minutes($k);
        //                  $data = array(
        //                          'user_id' => $user_id,
        //                          'type' => 'minutes',
        //                          'minutes' => $late_minutes,
        //                          'minutes_type' => 'deduction',
        //                          'date' => $days_value['leave_start_date'],
        //                          'subtracted' => 'no',
        //                          'reason' => 'leave'
        //                  );
        //                    $this->db->insert('tbl_deductions', $data);
        //                }
        //              return true;
        //            }
        //          }  // end of exceeded leaves
        // }
    }
}