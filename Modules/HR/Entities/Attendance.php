<?php

namespace Modules\HR\Entities;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use \DateTimeInterface;

class Attendance extends Model
{
    use SoftDeletes;

    public $table = 'attendances';

    protected $dates = [
        'date_in',
        'date_out',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    const ATTENDANCE_STATUS_SELECT = [
        'absent'  => 'Absent',
        'present' => 'Present',
        'onleave' => 'Onleave',
    ];

    protected $fillable = [
        'user_id',
        'leave_application_id',
        'date_in',
        'date_out',
        'attendance_status',
        'clocking_status',
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

    public function leave_application()
    {
        return $this->belongsTo(LeaveApplication::class, 'leave_application_id');
    }

    public function getDateInAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setDateInAttribute($value)
    {
        $this->attributes['date_in'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function getDateOutAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setDateOutAttribute($value)
    {
        $this->attributes['date_out'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }
}
