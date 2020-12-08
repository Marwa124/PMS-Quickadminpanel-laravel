<?php

namespace Modules\Payroll\Entities;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use \DateTimeInterface;
use Modules\HR\Entities\AccountDetail;
use Modules\HR\Entities\Designation;

class SalaryTemplate extends Model
{
    use SoftDeletes;

    public $table = 'salary_templates';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'salary_grade',
        'basic_salary',
        'overtime_salary',
        'designation_id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function salaryAllowances()
    {
        return $this->hasMany(SalaryAllowance::class, 'salary_template_id');
    }

    public function salaryDeductions()
    {
        return $this->hasMany(SalaryDeduction::class, 'salary_template_id');
    }

    public function designation()
    {
        return $this->belongsTo(Designation::class, 'designation_id', 'id');
    }
}
