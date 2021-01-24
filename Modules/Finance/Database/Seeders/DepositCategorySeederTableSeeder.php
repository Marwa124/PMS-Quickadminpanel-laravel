<?php

namespace Modules\Finance\Database\Seeders;

use App\Models\DepositCategory;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DepositCategorySeederTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            [
                'name' => 'Deposit Category 1'

            ],
            [
                'name' => 'Deposit Category 2'

            ],
            [
                'name' => 'Deposit Category 3'

            ]
        ];

        DepositCategory::insert($categories);
    }
}
