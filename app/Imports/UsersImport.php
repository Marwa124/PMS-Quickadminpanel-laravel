<?php

namespace App\Imports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\ToModel;

class UsersImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        // dd($row);
        return new User([
            'id' => $row[0],
            'name' => $row[1],
            'password' => $row[2],
            'email' => $row[3],
            'role_id' => $row[4],
            'activated' => $row[5],
            'banned' => $row[6],
            'ban_reason' => $row[7],
            'last_ip' => $row[12],
            'last_login' => $row[13],
            'online_time' => $row[16],
            'smtp_email_type' => $row[19],
            'smtp_encryption' => $row[20],
            'smtp_action' => $row[21],
            'smtp_host_name' => $row[22],
            'smtp_user_name' => $row[23],
            'smtp_password' => $row[24],
            'smtp_port' => $row[25],
            'smtp_additional_flag' => $row[26],
            'last_postmaster_run' => $row[27],
            'media_path_slug' => $row[28],
            'marketing_username' => $row[29],
            'marketing_password' => $row[30],
            'marketing_type' => $row[31],
            'sp_username' => $row[32],
            'sp_password' => $row[33],
            'vacation_balance' => $row[34],
            'vacation_counterdown' => $row[35],
            'date_of_join' => $row[36],
            'date_of_insurance' => $row[37],
            'vacation_verified' => $row[38],
        ]);
    }
}
