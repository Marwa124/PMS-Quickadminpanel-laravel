<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Carbon\Carbon;

class SystemCalendarController extends Controller
{
    public $sources = [
        [
            'model'      => '\\Modules\\HR\\Entities\\Holiday',
            'date_field' => 'start_date',
            'field'      => 'name',
            'prefix'     => '',
            'suffix'     => '',
            'route'      => 'hr.admin.holidays.edit',
        ],
        [
            'model'      => '\\Modules\\HR\\Entities\\LeaveApplication',
            'date_field' => 'leave_start_date',
            'field'      => 'leave_type',
            'prefix'     => 'User',
            'suffix'     => '',
            'route'      => 'hr.admin.leave-applications.store',
        ],
    ];

    public function index()
    {
        $events = [];

        foreach ($this->sources as $source) {
            foreach ($source['model']::all() as $model) {
                $crudFieldValue = $model->getAttributes()[$source['date_field']];

                if (!$crudFieldValue) {
                    continue;
                }

                $events[] = [
                    'title' => trim($source['prefix'] . " " . $model->{$source['field']}
                        . " " . $source['suffix']),
                    'start' => $crudFieldValue,
                    'url'   => route($source['route'], $model->id),
                ];
            }
        }

        return view('admin.calendar.calendar', compact('events'));
    }
}
