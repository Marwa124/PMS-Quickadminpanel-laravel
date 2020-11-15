<?php

namespace Modules\Payroll\Entities;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use \DateTimeInterface;

class SalaryPayslip extends Model
{
    use SoftDeletes;

    public $table = 'salary_payslips';

    protected $dates = [
        'payslip_generate_date',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'payslip_number',
        'salary_payment_id',
        'payslip_generate_date',
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

    public function getPayslipGenerateDateAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setPayslipGenerateDateAttribute($value)
    {
        $this->attributes['payslip_generate_date'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }
}
