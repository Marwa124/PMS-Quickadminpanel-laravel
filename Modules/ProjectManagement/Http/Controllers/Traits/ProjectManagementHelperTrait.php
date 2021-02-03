<?php

namespace Modules\ProjectManagement\Http\Controllers\Traits;

//use App\Models\Permission;
use Modules\ProjectManagement\Entities\Bug;
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

            if (!$workTracking->achievement){
                $progress_WorkTracking = 0;
            }elseif ($workTracking->achievement <= $achievement_WorkTracking) {
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

    //report tickets and bugs
    public function get_project_report_by_month($tickets = null)
    {
        // this function is to create get monthly recap report
        $get_result = [];
        for ($i = 1; $i <= 12; $i++) { // query for months
            if ($i >= 1 && $i <= 9) { // if i<=9 concate with Mysql.becuase on Mysql query fast in two digit like 01.
                $start_date = date('Y') . "-" . '0' . $i . '-' . '01';
                $end_date = date('Y') . "-" . '0' . $i . '-' . '31';
            } else {
                $start_date = date('Y') . "-" . $i . '-' . '01';
                $end_date = date('Y') . "-" . $i . '-' . '31';
            }
            if (!empty($tickets)) {
//                $where = array('created >=' => $start_date . ' 00:00:00', 'created <=' => $end_date . ' 23:59:59');
//                $get_result[$i] = $this->db->where($where)->get('tbl_tickets')->result();; // get all report by start date and in date
                $get_result[$i] = Ticket::where('created_at','>=',$start_date. ' 00:00:00')->where('created_at','<=',$end_date. ' 23:59:59')->get(); // get all report by start date and in date
            } else {
                // $where = array('created_at' => '>'.$start_date, 'created_at <=' => $end_date);
                //$get_result[$i] = $this->db->where($where)->get('tbl_bug')->result();; // get all report by start date and in date
                //dd(Bug::where('created_at','>=',$start_date. ' 00:00:00')->where('created_at','<=',$end_date. ' 23:59:59')->get(),$start_date,$end_date);
                $get_result[$i] = Bug::where('created_at','>=',$start_date. ' 00:00:00')->where('created_at','<=',$end_date. ' 23:59:59')->get(); // get all report by start date and in date

            }
        }
        //dd($get_result);
        return $get_result; // return the result
    }
}
