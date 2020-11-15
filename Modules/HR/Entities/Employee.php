<?php

namespace Modules\HR\Entities;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use \DateTimeInterface;

class Employee extends Model
{
    use SoftDeletes;

    public $table = 'employees';

    public static $searchable = [
        'username',
    ];

    const BANNED_RADIO = [
        '1' => 'Banned',
        '0' => 'Not banned',
    ];

    const ONLINE_TIME_RADIO = [
        '1' => 'online',
        '0' => 'offline',
    ];

    const ACTIVATED_RADIO = [
        '1' => 'Activated',
        '0' => 'Not activated',
    ];

    protected $hidden = [
        'password',
        'smtp_password',
        'marketing_password',
        'sp_password',
    ];

    protected $dates = [
        'last_login',
        'date_of_join',
        'date_of_insurance',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'username',
        'password',
        'email',
        'role_id',
        'activated',
        'banned',
        'ban_reason',
        'new_password_key',
        'new_password_requested',
        'new_email',
        'last_ip',
        'last_login',
        'online_time',
        'active_email',
        'smtp_email_type',
        'smtp_encryption',
        'smtp_action',
        'smtp_host_name',
        'smtp_user_name',
        'smtp_password',
        'smtp_port',
        'smtp_additional_flag',
        'last_postmaster_run',
        'media_path_slug',
        'marketing_username',
        'marketing_password',
        'marketing_type',
        'sp_username',
        'sp_password',
        'vacation_balance',
        'vacation_counterdown',
        'date_of_join',
        'date_of_insurance',
        'vacation_verified',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function role()
    {
        return $this->belongsTo(Role::class, 'role_id');
    }

    public function getLastLoginAttribute($value)
    {
        return $value ? Carbon::createFromFormat('Y-m-d H:i:s', $value)->format(config('panel.date_format') . ' ' . config('panel.time_format')) : null;
    }

    public function setLastLoginAttribute($value)
    {
        $this->attributes['last_login'] = $value ? Carbon::createFromFormat(config('panel.date_format') . ' ' . config('panel.time_format'), $value)->format('Y-m-d H:i:s') : null;
    }

    public function permissions()
    {
        return $this->belongsToMany(Permission::class);
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
}
