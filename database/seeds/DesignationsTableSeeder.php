<?php

use Illuminate\Database\Seeder;
use Modules\HR\Entities\Designation;

class DesignationsTableSeeder extends Seeder
{
    public function run()
    {
        $designations = [
            [
                'designation_name' => 'Operations Manager',
                'department_id' => '1',
            ],
            [
                'designation_name' => 'IT & Network Manager',
                'department_id' => '2',
            ],
            [
                'designation_name' => 'Coordinator',
                'department_id' => '3',
            ],
            [
                'designation_name' => 'Accountant',
                'department_id' => '4',
            ],
            [
                'designation_name' => 'System Administration',
                'department_id' => '1',
            ],
            [
                'designation_name' => 'IT Technical Support',
                'department_id' => '2',
            ],
            [
                'designation_name' => 'Marketing',
                'department_id' => '3',
            ],
            [
                'designation_name' => 'CFO',
                'department_id' => '7',
            ],
            [
                'designation_name' => 'Recruitment',
                'department_id' => '5',
            ],
            [
                'designation_name' => 'Training & Development',
                'department_id' => '5',
            ],
            [
                'designation_name' => 'Help Desk',
                'department_id' => '1',
            ],
            [
                'designation_name' => 'Technical Support',
                'department_id' => '1',
            ],
            [
                'designation_name' => 'CEO',
                'department_id' => '7',
            ],
            [
                'designation_name' => 'Senior Back End Developer',
                'department_id' => '1',
            ],
            [
                'designation_name' => 'Senior Android Developer',
                'department_id' => '1',
            ],
            [
                'designation_name' => 'Site Engineer',
                'department_id' => '2',
            ],
            [
                'designation_name' => 'Technician',
                'department_id' => '2',
            ],
            [
                'designation_name' => 'Electrician',
                'department_id' => '2',
            ],
            [
                'designation_name' => 'Sales Account Manager',
                'department_id' => '3',
            ],
            [
                'designation_name' => 'Senior Sales Account Manager',
                'department_id' => '3',
            ],
            [
                'designation_name' => 'Product UX/ UI',
                'department_id' => '1',
            ],
            [
                'designation_name' => 'QA Web & Mobile',
                'department_id' => '1',
            ],
            [
                'designation_name' => 'Telesales',
                'department_id' => '3',
            ],
            [
                'designation_name' => 'Junior Back End Developer',
                'department_id' => '1',
            ],
            [
                'designation_name' => 'Junior Sales',
                'department_id' => '3',
            ],
            [
                'designation_name' => 'Back End Developer',
                'department_id' => '1',
            ],
            [
                'designation_name' => 'Mobile App Developer',
                'department_id' => '1',
            ],
            [
                'designation_name' => 'Software Team Leader',
                'department_id' => '1',
            ],
            [
                'designation_name' => 'Junior Front-End Developer',
                'department_id' => '1',
            ],
            [
                'designation_name' => 'CEO',
                'department_id' => '7',
            ],
        ];

        Designation::insert($designations);
    }
}
