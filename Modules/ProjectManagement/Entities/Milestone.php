<?php

namespace Modules\ProjectManagement\Entities;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use \DateTimeInterface;
use Modules\ProjectManagement\Entities\Project;

class Milestone extends Model
{
    use SoftDeletes;

    public $table = 'milestones';

    protected $dates = [
        'start_date',
        'end_date',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'user_id',
        'project_id',
        'name',
        'start_date',
        'end_date',
        'client_visible',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function project()
    {
        return $this->belongsTo(Project::class, 'project_id');
    }

    public function getStartDateAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setStartDateAttribute($value)
    {
        $this->attributes['start_date'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function getEndDateAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setEndDateAttribute($value)
    {
        $this->attributes['end_date'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function accountDetails()
    {

        return $this->belongsToMany('Modules\HR\Entities\AccountDetail',
            'milestone_account_details_pivot','milestone_id','account_details_id');

    }

    // tasks without sub tasks
    public function tasks()
    {
        return $this->hasMany(Task::class,'milestone_id')->where('parent_task_id','=',null);
    }

    // all tasks
    public function allTasks()
    {
        return $this->hasMany(Task::class,'milestone_id');
    }

    public function cloneMilestone($newproject =null)
    {
        $new_milestone              = $this->replicate();
        $new_milestone->name        = $this->name.'-copy'.substr(time(),-4);
        if ($newproject){

            $new_milestone->project_id  = $newproject->id;
        }

        $new_milestone->push();
        $new_milestone = Milestone::findOrFail($new_milestone->id);

        // clone tasks in milestone to add for new project & new milesetone
        foreach ($this->tasks as $task)
        {

            $task->cloneTask($new_milestone,$newproject);
        }

        return $new_milestone;
    }

    public function trash() {

        return $this->onlyTrashed();
    }

}
