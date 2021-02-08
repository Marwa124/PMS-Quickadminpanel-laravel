<?php

namespace Modules\SETTING\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\SETTING\Entities\Config;

class SeedConfigsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Model::unguard();
        Config::whereNotNull('id')->delete();
        $configs = [
            [
                'key' => 'company_name',
                'value' => 'One Tec Group LLC'
            ],
            [
                'key' => 'company_address',
                'value' => '8th Sector – Building 10 – Block 11 – Nasr City - Cairo, Egypt'
            ],
            [
                'key' => 'company_city',
                'value' => 'Cairo'
            ],
            [
                'key' => 'company_country',
                'value' => 'Egypt'
            ],
            [
                'key' => 'company_domain',
                'value' => 'https://onetecgroup.com'
            ],
            [
                'key' => 'company_email',
                'value' => 'info@onetecgroup.com'
            ],
            [
                'key' => 'company_legal_name',
                'value' => ''
            ],
            [
                'key' => 'company_logo',
                'value' => 'uploads/Picture1.png'
            ],
            [
                'key' => 'company_phone_2',
                'value' => ''
            ],
            [
                'key' => 'company_phone',
                'value' => '+201555836995'
            ],
            [
                'key' => 'company_vat',
                'value' => '14'
            ],
            [
                'key' => 'company_zip_code',
                'value' => '1185'
            ],
		];

		foreach ($configs as $key => $value) {
			Config::create($value);
		}
    }
}
		
