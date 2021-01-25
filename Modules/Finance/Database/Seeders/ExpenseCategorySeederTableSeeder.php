<?php

namespace Modules\Finance\Database\Seeders;

use App\Models\ExpenseCategory;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class ExpenseCategorySeederTableSeeder extends Seeder
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
                'name' => 'Expense Category 1'

            ],
            [
                'name' => 'Expense Category 2'

            ],
            [
                'name' => 'Expense Category 3'

            ]
        ];

        ExpenseCategory::insert($categories);
    }
}
