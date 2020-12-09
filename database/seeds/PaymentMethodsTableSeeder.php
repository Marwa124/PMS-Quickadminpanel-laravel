<?php

use Illuminate\Database\Seeder;
use Modules\Payroll\Entities\PaymentMethod;

class PaymentMethodsTableSeeder extends Seeder
{
    public function run()
    {
        $paymentMethods = [
            [
                'name' => 'Online',
            ],
            [
                'name' => 'PayPal',
            ],
            [
                'name' => 'Payoneer',
            ],
            [
                'name' => 'Bank Transfer',
            ],
            [
                'name' => 'Cache',
            ],
            [
                'name' => 'Cheque',
            ],
        ];

        PaymentMethod::insert($paymentMethods);
    }
}
