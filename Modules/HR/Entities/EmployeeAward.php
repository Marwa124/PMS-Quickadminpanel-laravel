<?php

namespace Modules\HR\Entities;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use \DateTimeInterface;

class EmployeeAward extends Model
{
    use SoftDeletes;

    public $table = 'employee_awards';

    public static $searchable = [
        'name',
    ];

    const VIEW_STATUS_RADIO = [
        'unread' => 'Unread',
        'read'   => 'Read',
    ];

    protected $dates = [
        'given_date',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'name',
        'user_id',
        'gift_item',
        'award_amount',
        'view_status',
        'given_date',
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

    public function getGivenDateAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setGivenDateAttribute($value)
    {
        $this->attributes['given_date'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }
}
