<?php

use App\Models\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        $users = [
            [
                'id'                   => 1,
                'name'                 => 'Admin',
                'email'                => 'admin@admin.com',
                'password'             => bcrypt('password'),
                'remember_token'       => null,
                'username'             => '',
                'last_ip'              => '',
                'smtp_email_type'      => '',
                'smtp_encryption'      => '',
                'smtp_action'          => '',
                'smtp_host_name'       => '',
                'smtp_user_name'       => '',
                'smtp_port'            => '',
                'smtp_additional_flag' => '',
                'last_postmaster_run'  => '',
                'media_path_slug'      => '',
                'marketing_username'  => '',
                'marketing_type'       => '',
                'sp_username'          => '',
            ],
        ];

        User::insert($users);
    }
}
