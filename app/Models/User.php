<?php

namespace App\Models;

use Carbon\Carbon;
use Hash;
use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;
use Modules\ProjectManagement\Entities\Milestone;
use Modules\ProjectManagement\Entities\Project;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\Models\Media;
use \DateTimeInterface;
use Modules\HR\Entities\Absence;
use Modules\HR\Entities\AccountDetail;
use Modules\HR\Entities\Department;
use Modules\HR\Entities\Designation;
use Modules\HR\Entities\FingerprintAttendance;
use Modules\HR\Entities\LeaveApplication;
use Modules\HR\Entities\SetTime;
use Modules\HR\Entities\Vacation;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable implements HasMedia
{
    use SoftDeletes, Notifiable, HasApiTokens, HasMediaTrait;
    use HasRoles;

    public $table = 'users';

    public static $searchable = [
        'name',
    ];

    const JOB_TYPE = [
        'full_time' => 'Full Time',
        'part_time' => 'Part Time',
        'freelance' => 'Freelance',
    ];

    const BANNED_RADIO = [
        '1' => 'Banned',
        '0' => 'Not Banned',
    ];

    const ONLINE_TIME_RADIO = [
        '1' => 'online',
        '0' => 'offline',
    ];

    const ACTIVATED_RADIO = [
        '1' => 'Activated',
        '0' => 'Not Activated',
    ];

    protected $hidden = [
        'remember_token',
        'password',
        'smtp_password',
        'marketing_password',
        'sp_password',
    ];

    protected $dates = [
        'email_verified_at',
        'last_login',
        'date_of_join',
        'date_of_insurance',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $guarded = [];

    // public function scopeUserRole()
    // {
    //     return $this->role()->first()->title;
    // }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    // public function getIsAdminAttribute()
    // {
    //     return $this->roles()->where('id', 1)->exists();
    // }

    public function registerMediaConversions(Media $media = null)
    {
        $this->addMediaConversion('thumb')->fit('crop', 50, 50);
        $this->addMediaConversion('preview')->fit('crop', 120, 120);
    }

    /* !!!: Relations */
    public function department()
    {
        return $this->hasMany(Department::class, 'department_head_id', 'id');
    }

    public function leaveApplications()
    {
        return $this->hasMany(LeaveApplication::class, 'user_id', 'id');
    }

    public function fingerPrintAttendances()
    {
        return $this->hasMany(FingerprintAttendance::class, 'user_id', 'id');
    }

    public function timeTable()
    {
        return $this->belongsTo(SetTime::class, 'set_time_id', 'id');
    }

    public function accountDetail()
    {
        return $this->hasOne(AccountDetail::class, 'user_id', 'id');
    }

    public function absences()
    {
        return $this->hasMany(Absence::class, 'user_id', 'id');
    }

    // public function vacations()
    // {
    //     return $this->hasMany(Vacation::class, 'user_id', 'id');
    // }

    public function userTrainings()
    {
        return $this->hasMany(Training::class, 'user_id', 'id');
    }

    public function userEmployeeAwards()
    {
        return $this->hasMany(EmployeeAward::class, 'user_id', 'id');
    }

    public function userUserAlerts()
    {
        return $this->belongsToMany(UserAlert::class);
    }

    public function getEmailVerifiedAtAttribute($value)
    {
        return $value ? Carbon::createFromFormat('Y-m-d H:i:s', $value)->format(config('panel.date_format') . ' ' . config('panel.time_format')) : null;
    }

    public function setEmailVerifiedAtAttribute($value)
    {
        $this->attributes['email_verified_at'] = $value ? Carbon::createFromFormat(config('panel.date_format') . ' ' . config('panel.time_format'), $value)->format('Y-m-d H:i:s') : null;
    }

    public function setPasswordAttribute($input)
    {
        if ($input) {
            $this->attributes['password'] = app('hash')->needsRehash($input) ? Hash::make($input) : $input;
        }
    }

    public function sendPasswordResetNotification($token)
    {
        $this->notify(new ResetPassword($token));
    }

    public function getLastLoginAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setLastLoginAttribute($value)
    {
        // $this->attributes['last_login'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function getDateOfJoinAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setDateOfJoinAttribute($value)
    {
        $this->attributes['date_of_join'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function getDateOfInsuranceAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setDateOfInsuranceAttribute($value)
    {
        $this->attributes['date_of_insurance'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function getUserProjectsByUserID($user_id){
        $user = User::findOrFail($user_id);

        if ($user->hasrole(['Admin','Super Admin'])){

            $projects = Project::all();
//            $clients = Client::get();
        }else{

            $projects = $user->accountDetail->projects;
        }

        return $projects;
    }

    public function getUserMilestonesByUserID($user_id)
    {
        $user = User::findOrFail($user_id);

        if ($user->hasrole(['Admin','Super Admin'])){

            $milestones = Milestone::all();

        }else{

            $milestones = $user->accountDetail->milestones;
        }

        return $milestones;
    }
}
