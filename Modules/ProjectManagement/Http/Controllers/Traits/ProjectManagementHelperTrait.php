<?php

namespace Modules\ProjectManagement\Http\Controllers\Traits;

//use App\Models\Permission;
use Modules\ProjectManagement\Entities\Milestone;
use Modules\ProjectManagement\Entities\Task;
use Modules\ProjectManagement\Entities\Project;
use Modules\ProjectManagement\Entities\TaskStatus;
use Modules\ProjectManagement\Entities\Ticket;
use Modules\ProjectManagement\Entities\TicketReplay;
use Spatie\Permission\Models\Permission;

trait ProjectManagementHelperTrait
{
    public function getPermissionID($permissions)
    {
        $permissions_id = [];
        foreach ($permissions as $permission_name) {

            $permission = Permission::where('name', $permission_name)->first();
            array_push($permissions_id, $permission->id);
        }
        return $permissions_id;
    }

    public function forceDeleteTask(Task $task)
    {
        foreach ($task->subTasks as $sub_task) {
            $sub_task->accountDetails()->detach();
            $sub_task->forceDelete();
        }

        $task->accountDetails()->detach();
        $task->forceDelete();

    }

    public function forceDeleteMilestone(Milestone $milestone)
    {

        $milestone->accountDetails()->detach();
        foreach ($milestone->tasks as $task) {
            // force delete tasks with sub tasks  of milestone
            $this->forceDeleteTask($task);
        }

        // force delete milestone
        $milestone->forceDelete();

    }

    public function forceDeleteProject(Project $project)
    {

        $project->accountDetails()->detach();
        foreach ($project->milestones as $milestone) {
            // force delete milestone with tasks and sub tasks of project
            $this->forceDeleteMilestone($milestone);
            //$milestone->forceDeleteMilestone();
        }
        foreach ($project->bugs as $bug) {
            // force delete bug of project
            $bug->forceDelete();
        }
        // force delete project
        $project->forceDelete();
    }

    public function forceDeleteReplies(TicketReplay $ticketReplay)
    {
        foreach ($ticketReplay->replay as $replay) {
            // force delete replay of Replies
            $replay->forceDelete();
        }

        // force delete ticket Replay
        $ticketReplay->forceDelete();
    }

    public function forceDeleteTicket(Ticket $ticket)
    {
        $ticket->accountDetails()->detach();
        foreach ($ticket->replies as $reply) {
            // force delete Replies with Reply of Replies of Ticket
            $this->forceDeleteReplies($reply);
        }

        // force delete Ticket
        $ticket->forceDelete();
    }

    public function get_progress_ofWorkTracking($workTracking)
    {
        $start_date = $workTracking->start_date;
        $end_date = $workTracking->end_date;

        $progress_WorkTracking = 0;
        $achievement_WorkTracking = 0;


        if ($workTracking->work_type->tbl_name == 'tasks') {

            $tasks_count = Task::where('created_at', '>=', $start_date . " 00:00:00")
                ->where('created_at', '<=', $end_date . " 00:00:00")
                ->where('status', 'Completed')->count();
            $achievement_WorkTracking = $tasks_count;

            if ($workTracking->achievement <= $achievement_WorkTracking) {
                $progress_WorkTracking = 100;
            } else {
                $progress_WorkTracking = (int)($achievement_WorkTracking / ($workTracking->achievement) * 100);
            }
        }

        $result = [
            'progress_WorkTracking'     => $progress_WorkTracking,
            'achievement_WorkTracking' => $achievement_WorkTracking,
        ];
        return $result;
    }
}
