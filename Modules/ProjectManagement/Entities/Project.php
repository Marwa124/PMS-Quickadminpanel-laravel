<?php

namespace Modules\ProjectManagement\Entities;

use App\Models\Client;
use Modules\ProjectManagement\Entities\Milestone;
use App\Models\Permission;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\Models\Media;
use \DateTimeInterface;

class Project extends Model implements HasMedia
{
    use SoftDeletes, HasMediaTrait;

    public $table = 'projects';

    public static $searchable = [
        'name',
    ];

    const WITH_TASKS_RADIO = [
        'no'  => 'No',
        'yes' => 'Yes',
    ];

    const TIMER_STATUS_RADIO = [
        'on'  => 'On',
        'off' => 'Off',
    ];

    const NOTIFY_CLIENT_RADIO = [
        'yes' => 'Yes',
        'no'  => 'No',
    ];

    protected $dates = [
        'start_date',
        'end_date',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'name',
        'client_id',
        'project_specification_id',
        'department_id',
        'progress',
        'calculate_progress',
        'start_date',
        'end_date',
        'actual_completion',
        'alert_overdue',
        'project_cost',
        'demo_url',
        'project_status',
        'description',
        'notify_client',
        'timer_status',
        'timer_started_by',
        'start_time',
        'logged_time',
        'notes',
        'hourly_rate',
        'fixed_rate',
        'project_settings',
        'with_tasks',
        'estimate_hours',
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

    public function client()
    {
        return $this->belongsTo(Client::class, 'client_id');
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

//    public function permissions()
//    {
//        return $this->belongsToMany(Permission::class);
//    }

    public function department(){

        return $this->belongsTo('Modules\HR\Entities\Department', 'department_id');
    }

    public function accountDetails(){

        return $this->belongsToMany('Modules\HR\Entities\AccountDetail',
            'project_account_details_pivot','project_id','account_details_id');

    }

    public function milestones(){
        return $this->hasMany(Milestone::class,'project_id');
    }

    public function getProjects(){
        if (auth()->user()->hasrole(['Admin','Super Admin'])){
            $projects = $this->all();
//            $clients = Client::get();
        }else{
            $projects = auth()->user()->accountDetail->projects;
        }

        return $projects;
    }
}
