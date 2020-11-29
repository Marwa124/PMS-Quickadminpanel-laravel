<?php

use Illuminate\Database\Seeder;
use Modules\Payroll\Entities\SalaryTemplate;

class SalaryTemplatesTableSeeder extends Seeder
{
    public function run()
    {
        $salaryTemplate = [
            [
                'salary_grade' => 'Operations Manager',
                'basic_salary' => '13200',
            ],
            [
                'salary_grade' => 'Senior Back End Developer',
                'basic_salary' => '8800',
            ],
            [
                'salary_grade' => 'IT-Technical-Manager',
                'basic_salary' => '22000',
            ],
            [
                'salary_grade' => 'Site Engineer',
                'basic_salary' => '6600',
            ],
            [
                'salary_grade' => 'Network Technician',
                'basic_salary' => '4950',
            ],
            [
                'salary_grade' => 'Senior Sales Accounts Manager',
                'basic_salary' => '12700',
            ],
            [
                'salary_grade' => 'Electrician',
                'basic_salary' => '4400',
            ],
            [
                'salary_grade' => 'Sales & Admin Coordinator',
                'basic_salary' => '11000',
            ],
            [
                'salary_grade' => 'Telemarketing',
                'basic_salary' => '4400',
            ],
            [
                'salary_grade' => 'Junior Back End Developer',
                'basic_salary' => '5500',
            ],
            [
                'salary_grade' => 'Junior Sales',
                'basic_salary' => '7150',
            ],
            [
                'salary_grade' => 'Senior Android Developer',
                'basic_salary' => '9900',
            ],
            [
                'salary_grade' => 'Junior UI/UX Designer',
                'basic_salary' => '5500',
            ],
            [
                'salary_grade' => 'Back End Developer',
                'basic_salary' => '7150',
            ],
            [
                'salary_grade' => 'Mobile App Developer',
                'basic_salary' => '7150',
            ],
            [
                'salary_grade' => 'Software Team Leader',
                'basic_salary' => '12100',
            ],
            [
                'salary_grade' => 'UI/UX Designer',
                'basic_salary' => '6600',
            ],
            [
                'salary_grade' => 'Junior Front End Developer',
                'basic_salary' => '5500',
            ],
            [
                'salary_grade' => 'Junior Back End Developer',
                'basic_salary' => '5500',
            ],
            [
                'salary_grade' => 'Senior Mobile Developer',
                'basic_salary' => '8800',
            ],
            [
                'salary_grade' => 'Junior Mobile App Developer',
                'basic_salary' => '5500',
            ],
        ];

        SalaryTemplate::insert($salaryTemplate);
    }
}
