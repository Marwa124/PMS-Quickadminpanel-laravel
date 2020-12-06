<?php

namespace Modules\Payroll\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\Payroll\Entities\SalaryDeduction;
use Modules\Payroll\Entities\SalaryTemplate;

class SalaryDeductionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $salaryDeduction = [
            [
                'name' => 'Income Tax',
                'value' => '1200',
                'salary_template_id' => SalaryTemplate::where('id',1)->first()->id,
            ],
            [
                'name' => 'Income Tax',
                'value' => '800',
                'salary_template_id' => SalaryTemplate::where('id',3)->first()->id,
            ],
            [
                'name' => 'Income Tax',
                'value' => '2000',
                'salary_template_id' => SalaryTemplate::where('id',4)->first()->id,
            ],
            [
                'name' => 'Tax Deduction',
                'value' => '600',
                'salary_template_id' => SalaryTemplate::where('id',5)->first()->id
            ],
            [
                'name' => 'Tax Deduction',
                'value' => '450',
                'salary_template_id' => SalaryTemplate::where('id',6)->first()->id
            ],
            [
                'name' => 'Tax Deduction',
                'value' => '1700',
                'salary_template_id' => SalaryTemplate::where('id',7)->first()->id
            ],
            [
                'name' => 'Tax Deduction',
                'value' => '400',
                'salary_template_id' => SalaryTemplate::where('id',8)->first()->id
            ],
            [
                'name' => 'Tax Deduction',
                'value' => '1000',
                'salary_template_id' => SalaryTemplate::where('id',9)->first()->id
            ],
            [
                'name' => 'Tax Deduction',
                'value' => '400',
                'salary_template_id' => SalaryTemplate::where('id',10)->first()->id
            ],
            [
                'name' => 'Tax Deduction',
                'value' => '500',
                'salary_template_id' => SalaryTemplate::where('id',11)->first()->id
            ],
            [
                'name' => 'Tax Deduction',
                'value' => '650',
                'salary_template_id' => SalaryTemplate::where('id',12)->first()->id
            ],
            [
                'name' => 'Tax Deduction',
                'value' => '900',
                'salary_template_id' => SalaryTemplate::where('id',13)->first()->id
            ],
            [
                'name' => 'Tax Deduction',
                'value' => '500',
                'salary_template_id' => SalaryTemplate::where('id',14)->first()->id
            ],
            [
                'name' => 'Tax Deduction',
                'value' => '650',
                'salary_template_id' => SalaryTemplate::where('id',15)->first()->id
            ],
            [
                'name' => 'Provident Fund',
                'value' => '650',
                'salary_template_id' => SalaryTemplate::where('id',16)->first()->id
            ],
            [
                'name' => 'Tax Deduction',
                'value' => '1100',
                'salary_template_id' => SalaryTemplate::where('id',17)->first()->id
            ],
            [
                'name' => 'Tax Deduction',
                'value' => '600',
                'salary_template_id' => SalaryTemplate::where('id',18)->first()->id
            ],
            [
                'name' => 'Tax Deduction',
                'value' => '500',
                'salary_template_id' => SalaryTemplate::where('id',19)->first()->id
            ],
//            [
//                'name' => 'Tax Deduction',
//                'value' => '500',
//                'salary_template_id' => SalaryTemplate::where('id',20)->first()->id
//            ],
//            [
//                'name' => 'Tax Deduction',
//                'value' => '800',
//                'salary_template_id' => SalaryTemplate::where('id',21)->first()->id
//            ],
            [
                'name' => 'Tax Deduction',
                'value' => '500',
                'salary_template_id' => SalaryTemplate::where('id',22)->first()->id
            ],
            [
                'name' => 'provided_fund',
                'value' => '14',
                'salary_template_id' => SalaryTemplate::where('id',23)->first()->id,
            ],
        ];

        SalaryDeduction::insert($salaryDeduction);
    }
}
