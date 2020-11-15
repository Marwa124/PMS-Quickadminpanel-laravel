<?php

namespace Modules\HR\Entities;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use \DateTimeInterface;

class SetTime extends Model
{
    use SoftDeletes;

    public $table = 'set_times';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $time = [
        'in_time',
        'out_time',
        'allow_clock_in_late',
        'allow_leave_early',
    ];

    protected $guarded = [];

    public function accountDetailSetTimes()
    {
        return $this->hasMany(AccountDetail::class, 'set_time_id', 'id');
    }
}
