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
}
