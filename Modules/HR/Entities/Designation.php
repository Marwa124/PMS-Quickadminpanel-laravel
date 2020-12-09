<?php

namespace Modules\HR\Entities;

use Modules\HR\Entities\AccountDetail;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use \DateTimeInterface;
use Modules\Payroll\Entities\SalaryTemplate;

class Designation extends Model
{
    use SoftDeletes;

    public $table = 'designations';

    public static $searchable = [
        'designation_name',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'department_id',
        'designation_name',
        'designation_leader_id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function salaryTemplate()
    {
        return $this->hasOne(SalaryTemplate::class);
    }

    public function department()
    {
        return $this->belongsTo(Department::class, 'department_id');
    }

    public function designationLeader()
    {
        return $this->belongsTo(User::class, 'designation_leader_id');
    }

    public function accountDetails()
    {
        return $this->hasMany(AccountDetail::class);
    }
}
