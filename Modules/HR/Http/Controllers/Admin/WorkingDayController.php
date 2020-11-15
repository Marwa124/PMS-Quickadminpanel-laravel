<?php

namespace Modules\HR\Http\Controllers\Admin;

use Modules\HR\Http\Controllers\Controller;
use Gate;
use Illuminate\Http\Request;
use Modules\HR\Entities\WorkingDay;
use Symfony\Component\HttpFoundation\Response;

class WorkingDayController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index() {
        // abort_if(Gate::denies('vacation_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

		$working_days = WorkingDay::get()
			->toArray();
		return view('hr::admin.dailyAttendances.manage_working_days', compact('working_days'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request) {
		$id = 1;
		for ($i = 0; $i < count($request->day); $i++) {
			$affected_row = WorkingDay::where('id', $id++)
				->update(['working_status' => $request->day[$i]]);
		}
		return redirect()->back()->with('message', 'Update successfully.');
	}

}
