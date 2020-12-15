<?php

namespace Modules\ProjectManagement\Entities;

use App\Models\Lead;
use App\Models\Milestone;
use App\Models\Opportunity;
use App\Models\Permission;
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
        'name',
        'description',
        'status_id',
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

    public function status()
    {
        return $this->belongsTo(TaskStatus::class, 'status_id');
    }

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

    public function permissions()
    {
        return $this->belongsToMany(Permission::class);
    }
}
