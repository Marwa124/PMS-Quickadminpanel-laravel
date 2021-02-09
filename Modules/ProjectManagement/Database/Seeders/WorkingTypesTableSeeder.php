<?php

namespace Modules\ProjectManagement\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\ProjectManagement\Entities\TimeWorkType;

class WorkingTypesTableSeeder extends Seeder {
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run() {
		$working_typs = [
			[
				'name' => 'task_done',
				'description' => 'to get total done tasks report from this start and end date and notify user. ',
				'tbl_name' => 'tasks',
				'query' => null,
			],
            [
				'name' => 'resolved_bugs',
				'description' => 'to get total resolve bugs report from this start and end date and notify user. ',
				'tbl_name' => 'bugs',
				'query' => null,
			],
            [
				'name' => 'complete_project_goal',
				'description' => 'to get total complete project report from this start and end date and notify user. ',
				'tbl_name' => 'projects',
				'query' => null,
			],
            [
				'name' => 'achive_total_income',
				'description' => 'to get total income report from this start and end date and notify user. ',
				'tbl_name' => 'transactions',
				'query' => 'Income',
			],
            [
				'name' => 'achive_total_income_by_bank',
				'description' => 'to get total income report from this start and end date and notify user. ',
				'tbl_name' => 'transactions',
				'query' => 'Income',
			],
            [
				'name' => 'achieve_total_expense',
				'description' => 'to get total expense report from this start and end date and notify user. ',
				'tbl_name' => 'transactions',
				'query' => 'Expense',
			],
            [
				'name' => 'achive_total_expense_by_bank',
				'description' => 'to get total expense report from this start and end date and notify user. ',
				'tbl_name' => 'transactions',
				'query' => 'Expense',
			],
            [
				'name' => 'make_invoice',
				'description' => 'to get targeted invoice from this start and end date and notify user. ',
				'tbl_name' => 'invoices',
				'query' => null,
			],
            [
				'name' => 'make_estimate',
				'description' => 'to get targeted estimate from this start and end date and notify user.',
				'tbl_name' => 'estimates',
				'query' => null,
			],
            [
				'name' => 'goal_payment',
				'description' => 'to get total payment report from this start and end date and notify user. ',
				'tbl_name' => 'payments',
				'query' => null,
			],
            [
				'name' => 'convert_leads_to_client',
				'description' => 'to get total Convert leads to client report from this start and end date and notify user. ',
				'tbl_name' => 'clients',
				'query' => null,
			],
            [
				'name' => 'direct_client',
				'description' => 'to get total client report from this start and end date and notify user. ',
				'tbl_name' => 'clients',
				'query' => null,
			],
		];

		foreach ($working_typs as $key => $value) {
			TimeWorkType::create($value);
		}
	}
}
