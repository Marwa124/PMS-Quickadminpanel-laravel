<?php

namespace Modules\ProjectManagement\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Modules\ProjectManagement\Entities\Task;

class TasksCalendarController extends Controller
{
    public function index()
    {
        $events = Task::whereNotNull('due_date')->get();

        return view('projectmanagement::admin.tasksCalendars.index', compact('events'));
    }
}
