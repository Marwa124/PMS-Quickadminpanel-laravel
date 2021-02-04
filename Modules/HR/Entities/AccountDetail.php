<?php

namespace Modules\HR\Entities;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\Models\Media;
use \DateTimeInterface;
use Modules\HR\Entities\Designation;
use Modules\HR\Entities\SetTime;
use Modules\Payroll\Entities\SalaryTemplate;

class AccountDetail extends Model implements HasMedia
{
    use SoftDeletes, HasMediaTrait;

    public $table = 'account_details';

    protected $appends = [
        'avatar',
    ];

    public static $searchable = [
        'fullname',
    ];

    const DIRECTION_RADIO = [
        'ltr' => 'LTR',
        'rtl' => 'RTL',
    ];

    const GENDER_RADIO = [
        'male'   => 'Male',
        'female' => 'Female',
    ];

    protected $dates = [
        'joining_date',
        'date_of_birth',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    const martial_status_SELECT = [
        'unmarried' => 'Unmarried',
        'married'   => 'Married',
        'divorced'  => 'Divorced',
        'widower'   => 'Widower',
        'widow'     => 'Widow',
    ];

    protected $fillable = [
        'user_id',
        'fullname',
        'company',
        'city',
        'country',
        'locale',
        'address',
        'phone',
        'mobile',
        'skype',
        'language',
        'designation_id',
        'joining_date',
        'present_address',
        'date_of_birth',
        'gender',
        'martial_status',
        'father_name',
        'mother_name',
        'passport',
        'direction',
        'created_at',
        'updated_at',
        'deleted_at',
        'employment_id'
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

    // public function userUserAlerts()
    // {
    //     return $this->belongsToMany(UserAlert::class);
    // }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function setTime()
    {
        return $this->belongsTo(SetTime::class, 'set_time_id');
    }

    public function designation()
    {
        return $this->belongsTo(Designation::class, 'designation_id');
    }

    public function salaryTemplate()
    {
        return $this->belongsTo(SalaryTemplate::class, 'salary_template_id');
    }

    public function getAvatarAttribute()
    {
        $file = $this->getMedia('avatar')->last();

        if ($file) {
            $file->url       = $file->getUrl();
            $file->thumbnail = $file->getUrl('thumb');
            $file->preview   = $file->getUrl('preview');
        }
        return $file;
    }

    public function getJoiningDateAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setJoiningDateAttribute($value)
    {
        $this->attributes['joining_date'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function getDateOfBirthAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setDateOfBirthAttribute($value)
    {
        $this->attributes['date_of_birth'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function projects()
    {

        return $this->belongsToMany('Modules\ProjectManagement\Entities\Project',
            'project_account_details_pivot','account_details_id','project_id');

    }

    public function trashProjects()
    {

        return $this->belongsToMany('Modules\ProjectManagement\Entities\Project',
            'project_account_details_pivot','account_details_id','project_id')->onlyTrashed();

    }

    public function milestones()
    {

        return $this->belongsToMany('Modules\ProjectManagement\Entities\Milestone',
            'milestone_account_details_pivot','account_details_id','milestone_id');

    }

    public function trashMilestones()
    {

        return $this->belongsToMany('Modules\ProjectManagement\Entities\Milestone',
            'milestone_account_details_pivot','account_details_id','milestone_id')->onlyTrashed();

    }

    public function tasks()
    {

        return $this->belongsToMany('Modules\ProjectManagement\Entities\Task',
            'task_account_details_pivot','account_details_id','task_id');

    }

    public function trashTasks()
    {

        return $this->belongsToMany('Modules\ProjectManagement\Entities\Task',
            'task_account_details_pivot','account_details_id','task_id')->onlyTrashed();

    }

    public function bugs()
    {

        return $this->belongsToMany('Modules\ProjectManagement\Entities\Bug',
            'bug_account_details_pivot','account_details_id','bug_id');

    }


    public function trashBugs()
    {

        return $this->belongsToMany('Modules\ProjectManagement\Entities\Bug',
            'bug_account_details_pivot','account_details_id','bug_id')->onlyTrashed();

    }

    public function tickets()
    {

        return $this->belongsToMany('Modules\ProjectManagement\Entities\Ticket',
            'ticket_account_details_pivot','account_details_id','ticket_id');

    }


    public function trashTickets()
    {

        return $this->belongsToMany('Modules\ProjectManagement\Entities\Ticket',
            'ticket_account_details_pivot','account_details_id','ticket_id')->onlyTrashed();

    }

    public function work_tracking()
    {

        return $this->belongsToMany('Modules\ProjectManagement\Entities\WorkTracking',
            'work_tracking_account_details_pivot','account_details_id','work_tracking_id');

    }

    public function trashWork_tracking()
    {

        return $this->belongsToMany('Modules\ProjectManagement\Entities\WorkTracking',
            'work_tracking_account_details_pivot','account_details_id','work_tracking_id')->onlyTrashed();

    }

}
