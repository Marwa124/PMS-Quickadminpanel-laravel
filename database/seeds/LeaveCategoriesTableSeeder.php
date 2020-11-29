<?php

use Illuminate\Database\Seeder;
use Modules\HR\Entities\LeaveCategory;

class LeaveCategoriesTableSeeder extends Seeder
{
    public function run()
    {
        $roles = [
            [
                'name' => 'Emergency Leave',
                'leave_quota' => '7',
                'deducted_amount' => '0',
                'annual_monthly' => '0',
            ],
            [
                'name' => 'Annual Leave',
                'leave_quota' => '21',
                'deducted_amount' => '0',
                'annual_monthly' => '0',
            ],
            [
                'name' => 'Sick Leave',
                'leave_quota' => '3',
                'deducted_amount' => '0',
                'annual_monthly' => '0',
            ],
            [
                'name' => 'Haj Leave',
                'leave_quota' => '20',
                'deducted_amount' => '0',
                'annual_monthly' => '0',
            ],
            [
                'name' => 'Umrah Leave',
                'leave_quota' => '10',
                'deducted_amount' => '0',
                'annual_monthly' => '0',
            ],
            [
                'name' => 'Maternity Leave',
                'leave_quota' => '45',
                'deducted_amount' => '0',
                'annual_monthly' => '0',
            ],
            [
                'name' => 'Marriage Leave',
                'leave_quota' => '15',
                'deducted_amount' => '0',
                'annual_monthly' => '0',
            ],
            [
                'name' => 'Working From Home',
                'leave_quota' => '2',
                'deducted_amount' => '0',
                'annual_monthly' => '0',
            ],
            [
                'name' => 'Leave Early',
                'leave_quota' => '2',
                'deducted_amount' => '0',
                'annual_monthly' => '0',
            ],
            [
                'name' => 'Clock in',
                'leave_quota' => '0',
                'deducted_amount' => '0.5',
                'annual_monthly' => '0',
            ],
            [
                'name' => 'Client Meeting',
                'leave_quota' => '15',
                'deducted_amount' => '0',
                'annual_monthly' => '0',
            ],
            [
                'name' => 'Survey',
                'leave_quota' => '30',
                'deducted_amount' => '0',
                'annual_monthly' => '0',
            ],
        ];

        LeaveCategory::insert($roles);
    }
}
