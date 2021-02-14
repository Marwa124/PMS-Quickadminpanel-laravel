<?php

namespace Modules\ProjectManagement\Entities;

use App\Models\Lead;
use Modules\Sales\Entities\Opportunity;
use App\Models\User;
use App\Models\WorkTracking;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\ProjectManagement\Entities\Project;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\Models\Media;
use \DateTimeInterface;

class Task extends Model implements HasMedia
{
    use SoftDeletes, HasMediaTrait;

    public $table = 'tasks';

    protected $appends = [
        'attachment',
    ];

    const TIMER_STATUS_RADIO = [
        'off' => 'Off',
        'on'  => 'On',
    ];

    protected $dates = [
        'start_date',
        'due_date',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'name_en',
        'name_ar',
        'description_en',
        'description_ar',
        //'status_id',
        'status',
        'start_date',
        'due_date',
        'assigned_to_id',
        'project_id',
        'milestone_id',
        'opportunities_id',
        'work_tracking_id',
        'progress',
        'calculate_progress',
        'task_hours',
        'notes',
        'timer_status',
        'timer_started_by',
        'start_timer',
        'logged_timer',
        'lead_id',
        'created_by',
        'client_visible',
        'hourly_rate',
        'billable',
        'index_no',
        'created_at',
        'updated_at',
        'deleted_at',
        'parent_task_id',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function registerMediaConversions(Media $media = null)
    {
        $this->addMediaConversion('thumb')->fit('crop', 50, 50);
        $this->addMediaConversion('preview')->fit('crop', 120, 120);
    }

//    public function status()
//    {
//        return $this->belongsTo(TaskStatus::class, 'status_id');
//    }

    public function tags()
    {
        return $this->belongsToMany(TaskTag::class);
    }

    public function getAttachmentAttribute()
    {
        return $this->getMedia('attachment')->last();
    }

    public function getStartDateAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setStartDateAttribute($value)
    {
        $this->attributes['start_date'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function getDueDateAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setDueDateAttribute($value)
    {
        $this->attributes['due_date'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function assigned_to()
    {
        return $this->belongsTo(User::class, 'assigned_to_id');
    }

    public function project()
    {
        return $this->belongsTo(Project::class, 'project_id');
    }

    public function milestone()
    {
        return $this->belongsTo(Milestone::class, 'milestone_id');
    }

    public function opportunities()
    {
        return $this->belongsTo(Opportunity::class, 'opportunities_id');
    }

    public function work_tracking()
    {
        return $this->belongsTo(WorkTracking::class, 'work_tracking_id');
    }

    public function lead()
    {
        return $this->belongsTo(Lead::class, 'lead_id');
    }

    public function createBy(){
        return $this->belongsTo(User::class,'created_by');
    }

    public function accountDetails(){

        return $this->belongsToMany('Modules\HR\Entities\AccountDetail',
            'task_account_details_pivot','task_id','account_details_id');

    }

    public function subTasks(){
        return $this->hasMany(Task::class,'parent_task_id');
    }

    public function bugs(){
        return $this->hasMany(Bug::class,'task_id');
    }

    public function TimeSheet()
    {
        return $this->hasMany(TimeSheet::class,'module_field_id')->where('module','=','task')
            ->where('end_time','!=',null)->orderBy('id','desc');
    }

    public function TimeSheetOn()
    {
        return $this->hasMany(TimeSheet::class,'module_field_id')->where('module','=','task')
            ->where('user_id',auth()->user()->id)->where('end_time','=',null);
    }

    public function activities()
    {
        return $this->hasMany(Activity::class,'module_field_id')->where('module','=','task')->orderBy('id','desc');
    }

    public function cloneTask($new_milestone=null,$newproject=null)
    {

        $new_task                      = $this->replicate();
        $new_task->name_en             = $this->name_en.'-copy'.substr(time(),-5);
        $new_task->name_ar             = $this->name_ar.'-نسخ'.substr(time(),-5);
        if ($newproject){
            $new_task->project_id      = $newproject->id;
        }
        if ($new_milestone) {
            $new_task->milestone_id = $new_milestone->id;
        }
        $new_task->push();

        $new_task = Task::findOrFail($new_task->id);

//        setActivity('task',$new_task->id,'Save Task Details',$new_task->name);
        setActivity('task',$new_task->id,'Save Task Details','حقظ تفاصيل المهمه',$new_task->name_en,$new_task->name_ar);

        foreach ($this->subTasks as $subtask)
        {
            $new_sub_task                      = $subtask->replicate();
            $new_sub_task->name_en             = $subtask->name_en.'-copy'.substr(time(),-5);
            $new_sub_task->name_ar             = $subtask->name_ar.'-نسخ'.substr(time(),-5);
            if ($newproject){
                $new_sub_task->project_id       = $newproject->id;
            }

            if ($new_milestone){

                $new_sub_task->milestone_id     = $new_milestone->id;
            }
            $new_sub_task->parent_task_id	= $new_task->id;


            $new_sub_task->push();

            $new_sub_task = Task::findOrFail($new_sub_task->id);

//            setActivity('task',$new_sub_task->id,'Save Task Details',$new_sub_task->name);
            setActivity('task',$new_sub_task->id,'Save Task Details','حقظ تفاصيل المهمه',$new_sub_task->name_en,$new_sub_task->name_ar);

        }

        return $new_task;
    }
}
