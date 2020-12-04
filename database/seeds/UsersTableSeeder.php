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
                'name' => 'ceo',
                'email' => 'ceo@onetecgroup.com',
                'password' => '07bb204a9fd084b68bd7da101eecf870d33aad179a0cf0cb719b364c5ec41711e0ef43fdd0cb021ff5cce9a13cf4ddae9257bd3bfe747ded5c56b0b1f3c488ed',
                'banned' => '0',
                'ban_reason' => 'ULL',
            ],
            [
                'id' => '3',
                'name' => 'mosayed',
                'email' => 'mohab@onetecgroup.com',
                'password' => 'ecb6e39918497ceb57ff3edfdf1f58bc1ef07dd4e212a78209d2fa4843e0bc6f410b8d49b0670cad1809d66a00fa0af757a699b628ba2213eafcec9278f27223',
                'banned' => '0',
                'ban_reason' => 'ULL',
            ],
            [
                'id' => '4',
                'name' => 'mayman',
                'email' => 'mayman@onetecgroup.com',
                'password' => '079a988db50abdcaa930822e39a01ca4689c57b2dbd9d9c7c8334ebd21e6b62b8aaa2b5d6429b5c05be4d5310557caa90960638f039c11a752aeb8f2d6baa1d3',
                'banned' => '1',
                'ban_reason' => 'Terminated',
            ],
            [
                'id' => '6',
                'name' => 'abozeid',
                'email' => 'abozeid@onetecgroup.com',
                'password' => '8766dc8f70f542c4de2cf3947ce3911b20cc243b165df2c352e5dac47f0134582cd2eef90c62ab893bf8312bf95294a1a4ea8543aac73336227c732444c1322a',
                'banned' => '0',
                'ban_reason' => 'ULL',
            ],
            [
                'id' => '7',
                'name' => 'weltaweel',
                'email' => 'weltaweel@onetecgroup.com',
                'password' => 'fe803f28e77c485dbc9173f894ccf4130a7dd5efe33ec66557f1f1ea5b55978c52bfc34858e5b229d673c4f0180c9ef26d81947985ac07422173956d0f01f15d',
                'banned' => '1',
                'ban_reason' => 'Resigned',
            ],
            [
                'id' => '8',
                'name' => 'cfo',
                'email' => 'cfo@onetecgroup.com',
                'password' => '34ece4027b7d7ae7c3116ce7a2b83e22bed91b57e9d6361d12b30b17ad54cb054a312b244e0c3a247c5bce2cb76c1a34a9da6c40c0b5ac7766387b5d789c980a',
                'banned' => '0',
                'ban_reason' => 'ULL',
            ],
            [
                'id' => '9',
                'name' => 'Ismael',
                'email' => 'Ismaeleffat@gmail.com',
                'password' => 'f2e5b20bd718d32dfecdc65014791c520b14d9c7f0c4ba80f73ab76d40fd1171d0d10aecc2acdfa66fd0445eb637ad01a2463f31e1b2998951a60631f5f63b80',
                'banned' => '0',
                'ban_reason' => 'NULL',
            ],
            [
                'id' => '10',
                'name' => 'AhmedAyad',
                'email' => 'a.ayad@pcasa',
                'password' => '12de4e7260cc79b69fa463560c0a45ca275ccf1b17eba9874972d1e021c3fbdfd52ce0312abf85926451e5fb2d3b256be58d22b90db23863509ea0bdaa5e19d8',
                'banned' => '0',
                'ban_reason' => 'NULL',
            ],
            [
                'id' => '11',
                'name' => 'Ahmed',
                'email' => 'emara@stallingkott.ae',
                'password' => 'ra',
                'banned' => '0',
                'ban_reason' => 'ULL',
            ],
            [
                'id' => '13',
                'name' => 'msaleh',
                'email' => 'msaleh@onetecgroup.com',
                'password' => '1145474e8c3b64b3cc8f5445afdd0bb51aea08094fea8b5266e8638f3e44c03d667c4e3e223d98fd60f2c841c31feb4135613b6c25cd804d9e18d801f288fd9f',
                'banned' => '0',
                'ban_reason' => 'ULL',
            ],
            [
                'id' => '14',
                'name' => 'sahamid',
                'email' => 'sahamid@onetecgroup.com',
                'password' => '369e23e8d93915dff3466d82e0aef0f700241b0e8806e7ac3dfafd6ac487402f5e4c1f096b444e07d6e8447cd097a0f9df217835f963b77502de424093f2d658',
                'banned' => '1',
                'ban_reason' => 'Resigned',
            ],
            [
                'id' => '15',
                'name' => 'aragab',
                'email' => 'aragab@onetecgroup.com',
                'password' => '03755673e87718f90fc7fa97a76291c2687702f1ca408dd67b6326f854c309dca04404aefd84350c4574f3a3f10ae679db37404ad0f63e2e935fe7557c400a3f',
                'banned' => '1',
                'ban_reason' => 'ULL',
            ],
            [
                'id' => '16',
                'name' => 'redamohamed',
                'email' => 'rmohamed@onetecgroup.com',
                'password' => 'c0a083686f521856b5da8c05705715deabf6da8f115906db792376282e56b6262882192ffb4e6e5d91823c6a7612d1aed9ea1e138fd9c747d308947b254a6f19',
                'banned' => '1',
                'ban_reason' => 'Resigned',
            ],
            [
                'id' => '20',
                'name' => 'afawzy',
                'email' => 'afawzy@onetecgroup.com',
                'password' => '4f47e7ecd6b38ec8b4b596ce2cea0f51b73ac9c5a28bbb22bcfbfd5fb488fafad1a817fa8c26500694036e8918f3ad36fb5b121d851512cce53139837f0e715f',
                'banned' => '1',
                'ban_reason' => 'He',
            ],
            [
                'id' => '21',
                'name' => 'ghadawagih',
                'email' => 'ghada@onetecgroup.com',
                'password' => '13e6ebf2c7192242dadeee96598277d20da468286e41b19bdb3f1bf9737467d009397d60107dc0d70e947af859aa249dfac53e2559ea4b2fd0e187c75731f609',
                'banned' => '1',
                'ban_reason' => 'Left',
            ],
            [
                'id' => '22',
                'name' => 'norhan',
                'email' => 'norhan@onetecgroup.com',
                'password' => '82dd71f43bcdcebbb357e1ca2d3967dc78efb60cfb2ce6a833d5d172648425381e8e9dd2f4f2f8f8a47d7ab1f92d977b4df8aeee78738a8ab213fc1486561787',
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
                'password' => 'bda99d85f09a3f7f19682529ccfd3935280137bdff9d9c77d5b1592c86626eed2a26c295a5af676a4632c709b0e7d909b421c14a2781abc9a9c8c3ad7c68fcb7',
                'banned' => '1',
                'ban_reason' => 'Terminated',
            ],
            [
                'id' => '25',
                'name' => 'moaaz',
                'email' => 'moaaz@onetecgroup.com',
                'password' => '8cefd4a3b7986ba47a438a76a48f03fd6b006710321039e4c12569259be5bb9eb5c7e7d5805889d425df410dd93060d8535051fe8cb2024b867a61f8e148b4cb',
                'banned' => '0',
                'ban_reason' => 'ULL',
            ],
            [
                'id' => '27',
                'name' => 'Valuecamps',
                'email' => 'camps@valid.com',
                'password' => '0bda0a2de7572f1231bbfd02ce76c270a88687f928f62229cbec2421c9725d67bf6d9d66936bcfc2b33b2beadbfebbc4013266a8f7d1bfab42e4cee02b39031a',
                'banned' => '0',
                'ban_reason' => 'ULL',
            ],
            [
                'id' => '28',
                'name' => 'aaaaa',
                'email' => 'n.gamal@lesaffre',
                'password' => '186805ef79f7b0a17d4964912d99faf80142cfdd1f16ef5cc07304d5a23722e125407faea9936e3514e9d343dbad564be224f45feb4eaf08862ac1a838d6519f',
                'banned' => '1',
                'ban_reason' => '',
            ],
            [
                'id' => '29',
                'name' => 'ahmedradwan98',
                'email' => 'radwan@onetecgroup.com',
                'password' => '5b79e8e6933ec02500ba27d9950092331cdcfab2f7a89e9342961b609011c574ce384f7187d4b8c68c0a7db2a921bb11588fbff5bdb8b61e92c0c12b5624f708',
                'banned' => '1',
                'ban_reason' => 'Resigned',
            ],
            [
                'id' => '30',
                'name' => 'nana',
                'email' => 'na@na.com',
                'password' =>'b089e5cfb5448824aa718e529e3f60e75eacafd41697e5b178555777e6f040b33f6d92ffd4c5c49a2d0ec0f02ad2dc777f99b324daa00762fd4f399219a68530',
                'banned' => '0',
                'ban_reason' => 'ULL',
            ],
            [
                'id' => '31',
                'name' => 'hamed',
                'email' => 'hamed@onetecgroup.com',
                'password' => 'ad5855be31488760e8ee74b0575437b869f415372d8e6a680a526c51e57e8d7a104f32e751f41f6b6994634e7230f7084d53024e877a4d213c3144fb5718e8b8',
                'banned' => '0',
                'ban_reason' => 'ULL',
            ],
            [
                'id' => '32',
                'name' => 'ahmedfaruk',
                'email' => 'saidahmedfarouka@gmail.com',
                'password' => '981a60d353dfae8cb2da361b1c34eab934edc9da311148b139caf87808992e4c8e7aca3f05d38286df7e7e85c16aa43efa6bb38cc87cf582b28dbdcaf7ec9b80',
                'banned' => '0',
                'ban_reason' => 'ULL',
            ],
            [
                'id' => '33',
                'name' => 'Mahmoud',
                'email' => 'mahmoudsaidelbokl@gmail.com',
                'password' => '58720ae733596c584f7a07c388f15b62fa4734f5f83b521059fd9a3aa1f6d2f2a7aac7a996fc6c837828921cf08d2fffc5a89e1c575cdc3cea8128da468624ea',
                'banned' => '0',
                'ban_reason' => 'NULL',
            ],
            [
                'id' => '34',
                'name' => 'mostafa',
                'email' => 'm.elgammal@onetecgroup',
                'password' => '41e4f0aab0b82f2798a575dde22659a7d408eed82e1744b388f88f2e7df5e37fbed570640b7bc35d2905471280d740fa59649ad3d7b2457a96d1aa4f75ea7ebb',
                'banned' => '0',
                'ban_reason' => '',
            ],
            [
                'id' => '35',
                'name' => 'shady',
                'email' => 'shady.osama@onetecgroup',
                'password' => '17ada7ce7a6a9f01f0aabbb431321d365b01a3e3474f107562e738afbfe0c13abf9ea7ee61e22c990912fd2bc5ef0e4c657b4c82f132bf8e79f6dacb14d3c466',
                'banned' => '0',
                'ban_reason' => '',
            ],
            [
                'id' => '36',
                'name' => 'ali',
                'email' => 'ali.emad@onetecgroup',
                'password' => '7c083d22bafb64f66aca61f9f4f810e5b6216e01a4c49bb2b537cbc003385e800c81f65097112ae7f21b1b4e8ef3f0d4d23a7a4b7231bf19db9d74dce0f25f81',
                'banned' => '0',
                'ban_reason' => '',
            ],
        ];

        User::insert($usersList);

    }
}
