<?php

namespace Modules\HR\Entities;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use \DateTimeInterface;

class FingerprintAttendance extends Model
{
    public $table = 'fingerprint_attendances';

    protected $dates = [
        'created_at',
        'updated_at',
    ];

    protected $time = [
        'time',
    ];

    protected $date = [
        'day',
    ];

    const ATTENDANCE_STATUS_SELECT = [
        'absent'  => 'Absent',
        'present' => 'Present',
        'onleave' => 'Onleave',
    ];

    const STATUS_COLOR = [
        'absent'   => 'yellow',
        'present'   => '#90EE90',
        'onleave'   => 'red',
    ];

    protected $fillable = [
        'user_id',
        'date',
        'time',
        'created_at',
        'updated_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function getDateAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setDateAttribute($value)
    {
        $this->attributes['date'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }
}
