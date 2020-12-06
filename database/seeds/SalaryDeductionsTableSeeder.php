<?php

use App\Models\Role;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Modules\Payroll\Entities\SalaryDeduction;

class SalaryDeductionsTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('salary_deductions')->insert(
            ['id' => '1', 'name' => 'Income Tax', 'value' => '1200', 'salary_template_id' => '1'],
            ['id' => '3', 'name' => 'Income Tax', 'value' => '800', 'salary_template_id' => '3'],
            ['id' => '4', 'name' => 'Income Tax', 'value' => '2000', 'salary_template_id' => '4'],
            ['id' => '5', 'name' => 'Tax Deduction', 'value' => '600', 'salary_template_id' => '5'],
            ['id' => '6', 'name' => 'Tax Deduction', 'value' => '450', 'salary_template_id' => '6'],
            ['id' => '7', 'name' => 'Tax Deduction', 'value' => '1700', 'salary_template_id' => '7'],
            ['id' => '8', 'name' => 'Tax Deduction', 'value' => '400', 'salary_template_id' => '8'],
            ['id' => '9', 'name' => 'Tax Deduction', 'value' => '1000', 'salary_template_id' => '9'],
            ['id' => '10','name' =>  'Tax Deduction', 'value' => '400', 'salary_template_id' => '10'],
            ['id' => '11','name' =>  'Tax Deduction', 'value' => '500', 'salary_template_id' => '11'],
            ['id' => '12','name' =>  'Tax Deduction', 'value' => '650', 'salary_template_id' => '12'],
            ['id' => '13','name' =>  'Tax Deduction', 'value' => '900', 'salary_template_id' => '13'],
            ['id' => '14','name' =>  'Tax Deduction', 'value' => '500', 'salary_template_id' => '14'],
            ['id' => '15','name' =>  'Tax Deduction', 'value' => '650', 'salary_template_id' => '15'],
            ['id' => '16','name' =>  'Provident Fund', 'value' => '650', 'salary_template_id' => '16'],
            ['id' => '17','name' =>  'Tax Deduction', 'value' => '1100', 'salary_template_id' => '17'],
            ['id' => '18','name' =>  'Tax Deduction', 'value' => '600', 'salary_template_id' => '18'],
            ['id' => '19','name' =>  'Tax Deduction', 'value' => '500', 'salary_template_id' => '19'],
            ['id' => '20','name' =>  'Tax Deduction', 'value' => '500', 'salary_template_id' => '20'],
            ['id' => '21','name' =>  'Tax Deduction', 'value' => '800', 'salary_template_id' => '21'],
            ['id' => '22','name' =>  'Tax Deduction', 'value' => '500', 'salary_template_id' => '22']
        );
    }
}
