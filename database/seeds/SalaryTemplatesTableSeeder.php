<?php

use Illuminate\Database\Seeder;
use Modules\Payroll\Entities\SalaryTemplate;

class SalaryTemplatesTableSeeder extends Seeder
{
    public function run()
    {
        $salaryTemplate = [
            [
                'id'        => '1',
                'salary_grade' => 'Operations Manager',
                'basic_salary' => '13200',
                'designation_id' => '1',
            ],
            [
                'id'        => '3',
                'salary_grade' => 'Senior Back End Developer',
                'basic_salary' => '8800',
                'designation_id' => '8',
            ],
            [
                'id'        => '4',
                'salary_grade' => 'IT-Technical-Manager',
                'basic_salary' => '22000',
                'designation_id' => '9',
            ],
            [
                'id'        => '5',
                'salary_grade' => 'Site Engineer',
                'basic_salary' => '6600',
                'designation_id' => '11',
            ],
            [
                'id'        => '6',
                'salary_grade' => 'Network Technician',
                'basic_salary' => '4950',
                'designation_id' => '13',
            ],
            [
                'id'        => '7',
                'salary_grade' => 'Senior Sales Accounts Manager',
                'basic_salary' => '12700',
                'designation_id' => '15',
            ],
            [
                'id'        => '8',
                'salary_grade' => 'Electrician',
                'basic_salary' => '4400',
                'designation_id' => '16',
            ],
            [
                'id'        => '9',
                'salary_grade' => 'Sales & Admin Coordinator',
                'basic_salary' => '11000',
                'designation_id' => '17',
            ],
            [
                'id'        => '10',
                'salary_grade' => 'Telemarketing',
                'basic_salary' => '4400',
                'designation_id' => '18',
            ],
            [
                'id'        => '11',
                'salary_grade' => 'Junior Back End Developer',
                'basic_salary' => '5500',
                'designation_id' => '19',
            ],
            [
                'id'        => '12',
                'salary_grade' => 'Junior Sales',
                'basic_salary' => '7150',
                'designation_id' => '20',
            ],
            [
                'id'        => '13',
                'salary_grade' => 'Senior Android Developer',
                'basic_salary' => '9900',
                'designation_id' => '21',
            ],
            [
                'id'        => '14',
                'salary_grade' => 'Junior UI/UX Designer',
                'basic_salary' => '5500',
                'designation_id' => '23',
            ],
            [
                'id'        => '15',
                'salary_grade' => 'Back End Developer',
                'basic_salary' => '7150',
                'designation_id' => '24',
            ],
            [
                'id'        => '16',
                'salary_grade' => 'Mobile App Developer',
                'basic_salary' => '7150',
                'designation_id' => '25',
            ],
            [
                'id'        => '17',
                'salary_grade' => 'Software Team Leader',
                'basic_salary' => '12100',
                'designation_id' => '26',
            ],
            [
                'id'        => '18',
                'salary_grade' => 'UI/UX Designer',
                'basic_salary' => '6600',
                'designation_id' => '27',
            ],
            [
                'id'        => '19',
                'salary_grade' => 'Junior Front End Developer',
                'basic_salary' => '5500',
                'designation_id' => '28',
            ],
            [
                'id'        => '20',
                'salary_grade' => 'Junior Back End Developer',
                'basic_salary' => '5500',
                'designation_id' => '29',
            ],
            [
                'id'        => '21',
                'salary_grade' => 'Senior Mobile Developer',
                'basic_salary' => '8800',
                'designation_id' => '30',
            ],
            [
                'id'        => '22',
                'salary_grade' => 'Junior Mobile App Developer',
                'basic_salary' => '5500',
                'designation_id' => '31',
            ],
        ];

        SalaryTemplate::insert($salaryTemplate);
    }
}
