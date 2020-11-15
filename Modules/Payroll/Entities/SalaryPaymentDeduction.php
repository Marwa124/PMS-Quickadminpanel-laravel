<?php

namespace Modules\Payroll\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use \DateTimeInterface;

class SalaryPaymentDeduction extends Model
{
    use SoftDeletes;

    public $table = 'salary_payment_deductions';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'salary_payment_id',
        'name',
        'value',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function salary_payment()
    {
        return $this->belongsTo(SalaryPayment::class, 'salary_payment_id');
    }
}
