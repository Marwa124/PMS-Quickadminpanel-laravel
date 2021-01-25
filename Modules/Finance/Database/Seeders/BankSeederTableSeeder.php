<?php

namespace Modules\Finance\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\HR\Entities\Account;

class BankSeederTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $accounts = [
            [
                'name' => 'NBE',
                'balance' => 10000
            ],
            [
                'name' => 'QNB',
                'balance' => 10000
            ],
            [
                'name' => 'CIB',
                'balance' => 10000
            ]
        ];

        Account::insert($accounts);
    }
}
