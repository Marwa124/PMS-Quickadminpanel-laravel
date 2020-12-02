<?php

namespace Modules\Payroll\Entities;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use \DateTimeInterface;

class PayrollSummary extends Model
{
    public $table = 'payroll_summaries';
    public $timestamps = false;

    protected $guarded = [];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function getMonthAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setMonthAttribute($value)
    {
        $this->attributes['created_month'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }
}
