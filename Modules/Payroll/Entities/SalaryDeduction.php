<?php

namespace Modules\Payroll\Entities;

use Illuminate\Database\Eloquent\Model;
use \DateTimeInterface;

class SalaryDeduction extends Model
{
    public $table = 'salary_deductions';
    public $timestamps = false;

    protected $guarded = [];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function salary_template()
    {
        return $this->belongsTo(SalaryTemplate::class, 'salary_template_id');
    }
}
