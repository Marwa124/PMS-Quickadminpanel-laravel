<?php

namespace Modules\HR\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use \DateTimeInterface;

class LeaveCategory extends Model
{
    use SoftDeletes;

    public $table = 'leave_categories';

    public static $searchable = [
        'name',
    ];

    const CATEGORY_TYPE = [
        '1' => 'Annually',
        '0'  => 'Monthly'
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $guarded = [];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function leaveCategoryLeaveApplications()
    {
        return $this->hasMany(LeaveApplication::class, 'leave_category_id', 'id');
    }
}
