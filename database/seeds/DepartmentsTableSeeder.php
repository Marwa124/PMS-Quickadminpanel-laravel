<?php

use App\Models\User;
use Illuminate\Database\Seeder;
use Modules\HR\Entities\Department;

class DepartmentsTableSeeder extends Seeder
{
    public function run()
    {
        $departments = [
            [
                'id' => '1',
                'department_name' => 'Software & App. Development',
                'email' => 'helpdesk@onetecgroup.com',
                'encryption' => 'ssl',
                'host' => 'mail.exclusivehosting.net',
                'username' => 'helpdesk@onetecgroup.com',
                'password' => 'M29ndkdvN1VEMWpnUGdUQllqTXJndz09',
                'mailbox' => 'INBOX',
                'department_head_id' => User::where('id',25)->first()->id,
            ],
            [
                'id' => '2',
                'department_name' => 'Information Technology',
                'email' => 'support@onetecgroup.com',
                'encryption' => 'ssl',
                'host' => 'mail.exclusivehosting.net',
                'username' => 'support@onetecgroup.com',
                'password' => 'M29ndkdvN1VEMWpnUGdUQllqTXJndz09',
                'mailbox' => 'INBOX',
                 'department_head_id' => User::where('id',6)->first()->id,
            ],
            [
                'id' => '3',
                'department_name' => 'Sales & Marketing',
                'email' => 'sales@onetecgroup.com',
                'encryption' => 'ssl',
                'host' => 'mail.exclusivehosting.net',
                'username' => 'sales@onetecgroup.com',
                'password' => 'M29ndkdvN1VEMWpnUGdUQllqTXJndz09',
                'mailbox' => 'INBOX',
                 'department_head_id' => User::where('id',15)->first()->id,
            ],
            [
                'id' => '4',
                'department_name' => 'Finance',
                'email' => 'finance@onetecgroup.com',
                'encryption' => 'ssl',
                'host' => 'mail.exclusivehosting.net',
                'username' => 'finance@onetecgroup.com',
                'password' => 'M29ndkdvN1VEMWpnUGdUQllqTXJndz09',
                'mailbox' => 'INBOX',
                 'department_head_id' => User::where('id',7)->first()->id,
            ],
            [
                'id' => '5',
                'department_name' => 'Human Resources',
                'email' => 'hr@onetecgroup.com',
                'encryption' => 'ssl',
                'host' => 'mail.exclusivehosting.net',
                'username' => 'hr@onetecgroup.com',
                'password' => 'M29ndkdvN1VEMWpnUGdUQllqTXJndz09',
                'mailbox' => 'INBOX',
                 'department_head_id' => User::where('id',11)->first()->id,
            ],
            [
                'id' => '7',
                'department_name' => 'Board Members',
                'email' => 'ceo@onetecgroup.com',
                'encryption' => 'ssl',
                'host' => 'mail.exclusivehosting.net',
                'username' => 'ceo@onetecgroup.com',
                'password' => 'M29ndkdvN1VEMWpnUGdUQllqTXJndz09',
                'mailbox' => 'INBOX',
                 'department_head_id' => User::where('id',11)->first()->id,
            ],
            [
                'id' => '8',
                'department_name' => 'CEO',
                'email' => 'ceo@onetecgroup.com',
                'encryption' => 'ssl',
                'host' => 'mail.exclusivehosting.net',
                'username' => 'ceo@onetecgroup.com',
                'password' => 'M29ndkdvN1VEMWpnUGdUQllqTXJndz09',
                'mailbox' => 'INBOX',
                 'department_head_id' => User::where('id',11)->first()->id,
            ]
        ];

        Department::insert($departments);
    }
}
