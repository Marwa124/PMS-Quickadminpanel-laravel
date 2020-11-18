<?php

namespace Modules\Payroll\Entities;

use Illuminate\Database\Eloquent\Model;
use \DateTimeInterface;

class SalaryAllowance extends Model
{
    public $table = 'salary_allowances';
    public $timestamps = false;

    protected $fillable = [
        'name',
        'value',
        'salary_template_id',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function salary_template()
    {
        return $this->belongsTo(SalaryTemplate::class, 'salary_template_id');
    }
}
