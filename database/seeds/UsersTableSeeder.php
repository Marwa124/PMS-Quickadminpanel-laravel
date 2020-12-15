<?php

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        $users = [
            [
                'name'                 => 'Admin',
                'email'                => 'admin@admin.com',
                'password'             => bcrypt('password'),
                'remember_token'       => null,
            ],
        ];

        User::insert($users);
        $user = User::where('name', 'Admin')->first();
        $user->syncRoles('Admin');
        $user->syncPermissions(Permission::pluck('name')->toArray());

        $usersList = [
            [
                'id' => '2',
                'name' => 'mosayed',
                'email' => 'mohab@onetecgroup.com',
                'password' => bcrypt('password'),
                'banned' => '0',
                'ban_reason' => 'ULL',
            ],
            [
                'id' => '3',
                'name' => 'mayman',
                'email' => 'mayman@onetecgroup.com',
                'password' => bcrypt('password'),
                'banned' => '1',
                'ban_reason' => 'Terminated',
            ],
            [
                'id' => '4',
                'name' => 'abozeid',
                'email' => 'abozeid@onetecgroup.com',
                'password' => bcrypt('password'),
                'banned' => '0',
                'ban_reason' => 'ULL',
            ],
            [
                'id' => '6',
                'name' => 'weltaweel',
                'email' => 'weltaweel@onetecgroup.com',
                'password' => bcrypt('password'),
                'banned' => '1',
                'ban_reason' => 'Resigned',
            ],
            [
                'id' => '7',
                'name' => 'cfo',
                'email' => 'cfo@onetecgroup.com',
                'password' => bcrypt('password'),
                'banned' => '0',
                'ban_reason' => 'ULL',
            ],
            [
                'id' => '8',
                'name' => 'Ismael',
                'email' => 'Ismaeleffat@gmail.com',
                'password' => bcrypt('password'),
                'banned' => '0',
                'ban_reason' => 'NULL',
            ],
            [
                'id' => '9',
                'name' => 'AhmedAyad',
                'email' => 'a.ayad@pcasa',
                'password' => bcrypt('password'),
                'banned' => '0',
                'ban_reason' => 'NULL',
            ],
            [
                'id' => '10',
                'name' => 'Ahmed Emara',
                'email' => 'emara@stallingkott.ae',
                'password' => bcrypt('password'),
                'banned' => '0',
                'ban_reason' => 'ULL',
            ],
            [
                'id' => '11',
                'name' => 'ceo',
                'email' => 'ceo@onetecgroup.com',
                'password' => bcrypt('password'),
                'banned' => '0',
                'ban_reason' => 'ULL',
            ],
            [
                'id' => '13',
                'name' => 'msaleh',
                'email' => 'msaleh@onetecgroup.com',
                'password' => bcrypt('password'),
                'banned' => '0',
                'ban_reason' => 'ULL',
            ],
            [
                'id' => '14',
                'name' => 'sahamid',
                'email' => 'sahamid@onetecgroup.com',
                'password' => bcrypt('password'),
                'banned' => '1',
                'ban_reason' => 'Resigned',
            ],
            [
                'id' => '15',
                'name' => 'aragab',
                'email' => 'aragab@onetecgroup.com',
                'password' => bcrypt('password'),
                'banned' => '1',
                'ban_reason' => 'ULL',
            ],
            [
                'id' => '16',
                'name' => 'redamohamed',
                'email' => 'rmohamed@onetecgroup.com',
                'password' => bcrypt('password'),
                'banned' => '1',
                'ban_reason' => 'Resigned',
            ],
            [
                'id' => '20',
                'name' => 'afawzy',
                'email' => 'afawzy@onetecgroup.com',
                'password' => bcrypt('password'),
                'banned' => '1',
                'ban_reason' => 'He',
            ],
            [
                'id' => '21',
                'name' => 'ghadawagih',
                'email' => 'ghada@onetecgroup.com',
                'password' => bcrypt('password'),
                'banned' => '1',
                'ban_reason' => 'Left',
            ],
            [
                'id' => '22',
                'name' => 'norhan',
                'email' => 'norhan@onetecgroup.com',
                'password' => bcrypt('password'),
                'banned' => '1',
                'ban_reason' => 'Resigned',
            ],
            [
                'id' => '23',
                'name' => 'marwa',
                'email' => 'marwa@onetecgroup.com',
                'password' => bcrypt('password'),
                'banned' => '0',
                'ban_reason' => 'ULL',
            ],
            [
                'id' => '24',
                'name' => 'shrouk',
                'email' => 'shrouk@onetecgroup.com',
                'password' => bcrypt('password'),
                'banned' => '1',
                'ban_reason' => 'Terminated',
            ],
            [
                'id' => '25',
                'name' => 'moaaz',
                'email' => 'moaaz@onetecgroup.com',
                'password' => bcrypt('password'),
                'banned' => '0',
                'ban_reason' => 'ULL',
            ],
            [
                'id' => '27',
                'name' => 'Valuecamps',
                'email' => 'camps@valid.com',
                'password' => bcrypt('password'),
                'banned' => '0',
                'ban_reason' => 'ULL',
            ],
            [
                'id' => '28',
                'name' => 'aaaaa',
                'email' => 'n.gamal@lesaffre',
                'password' => bcrypt('password'),
                'banned' => '1',
                'ban_reason' => '',
            ],
            [
                'id' => '29',
                'name' => 'ahmedradwan98',
                'email' => 'radwan@onetecgroup.com',
                'password' => bcrypt('password'),
                'banned' => '1',
                'ban_reason' => 'Resigned',
            ],
            [
                'id' => '30',
                'name' => 'nana',
                'email' => 'na@na.com',
                'password' => bcrypt('password'),
                'banned' => '0',
                'ban_reason' => 'ULL',
            ],
            [
                'id' => '31',
                'name' => 'hamed',
                'email' => 'hamed@onetecgroup.com',
                'password' => bcrypt('password'),
                'banned' => '0',
                'ban_reason' => 'ULL',
            ],
            [
                'id' => '32',
                'name' => 'ahmedfaruk',
                'email' => 'saidahmedfarouka@gmail.com',
                'password' => bcrypt('password'),
                'banned' => '0',
                'ban_reason' => 'ULL',
            ],
            [
                'id' => '33',
                'name' => 'Mahmoud',
                'email' => 'mahmoudsaidelbokl@gmail.com',
                'password' => bcrypt('password'),
                'banned' => '0',
                'ban_reason' => 'NULL',
            ],
            [
                'id' => '34',
                'name' => 'mostafa',
                'email' => 'm.elgammal@onetecgroup',
                'password' => bcrypt('password'),
                'banned' => '0',
                'ban_reason' => '',
            ],
            [
                'id' => '35',
                'name' => 'shady',
                'email' => 'shady.osama@onetecgroup',
                'password' => bcrypt('password'),
                'banned' => '0',
                'ban_reason' => '',
            ],
            [
                'id' => '36',
                'name' => 'ali',
                'email' => 'ali.emad@onetecgroup',
                'password' => bcrypt('password'),
                'banned' => '0',
                'ban_reason' => '',
            ],
        ];

        User::insert($usersList);

    }
}
