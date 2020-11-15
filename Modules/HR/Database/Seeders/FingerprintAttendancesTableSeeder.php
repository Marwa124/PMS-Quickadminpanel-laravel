<?php

namespace Modules\HR\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\HR\Entities\FingerprintAttendance;

class FingerprintAttendancesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $fingerprintAttendance = [
            [
                'user_id'              => 1,
                'date'                 => '2020-08-26',
                'time'                 => '09:45:44',
            ],
            [
                'user_id'              => 1,
                'date'                 => '2020-08-26',
                'time'                 => '17:45:44',
            ],
            [
                'user_id'              => 2,
                'date'                 => '2020-08-26',
                'time'                 => '10:45:44',
            ],
            [
                'user_id'              => 2,
                'date'                 => '2020-08-26',
                'time'                 => '14:45:44',
            ],
            [
                'user_id'              => 3,
                'date'                 => '2020-08-26',
                'time'                 => '08:45:44',
            ],
            [
                'user_id'              => 3,
                'date'                 => '2020-08-26',
                'time'                 => '17:45:44',
            ],
            [
                'user_id'              => 1,
                'date'                 => '2020-08-26',
                'time'                 => '19:45:44',
            ],
            [
                'user_id'              => 1,
                'date'                 => '2020-08-27',
                'time'                 => '09:45:44',
            ],
            [
                'user_id'              => 1,
                'date'                 => '2020-08-27',
                'time'                 => '09:45:44',
            ],
            [
                'user_id'              => 1,
                'date'                 => '2020-08-28',
                'time'                 => '09:45:44',
            ],
            [
                'user_id'              => 1,
                'date'                 => '2020-08-28',
                'time'                 => '09:45:44',
            ],
        ];

        FingerprintAttendance::insert($fingerprintAttendance);
    }
}
