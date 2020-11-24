<?php

namespace Modules\Payroll\Entities;

use Illuminate\Database\Eloquent\Model;
use \DateTimeInterface;

class PayrollSummary extends Model
{
    public $table = 'payroll_summaries';

    protected $guarded = [];
}
