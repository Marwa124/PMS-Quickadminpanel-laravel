<?php

namespace Modules\HR\Entities;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use \DateTimeInterface;

class ClientMeeting extends Model
{
    use SoftDeletes;

    public $table = 'employee_requests';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $casts = [
        'users' => 'array',
    ];

    protected $time = [
        'from_time',
        'to_time',
    ];

    protected $date = [
        'day',
    ];

    protected $guarded = [];

    const APPROVE_RADIO = [
        'approve' => 'Approve',
        'reject' => 'Reject',
    ];

    const MEETING_STATUS_SELECT = [
        'day'  => 'Day',
        'hour' => 'Hour',
    ];

    const REQUEST_TYPE_SELECT = [
        'survey'  => 'Survey',
        'client_meeting' => 'Client Meeting',
    ];

    const REQUEST_COLOR = [
        'survey'  => 'pink',
        'client_meeting' => 'tomato',
    ];

    const STATUS_SELECT = [
        'pending'  => 'Pending',
        'approve'   => 'Approved',
        'reject' => 'Rejected',
    ];

    const STATUS_COLOR = [
        'pending'  => 'yellow',
        'approve'   => '#90EE90',
        'reject' => 'red',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'approved_by');
    }

    public function getCreatedDayAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setCreatedDayAttribute($value)
    {
        $this->attributes['day'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }
}
