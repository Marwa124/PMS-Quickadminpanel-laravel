<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Modules\HR\Entities\LeaveApplication;

class Notification extends Model
{

    protected $table = 'notifications';
    public $timestamps = true;
    protected $guarded = [];

    /** NOtification has to be belongs to only one donation request  or order request
    *   while Donation Request has one notification or
    *      Order Request has Many Notification (arrive, recive, fail)
    */
    public function leaveApplication()
    {
        return $this->belongsTo(LeaveApplication::class);
    }

    public function users()
    {
        return $this->morphToMany(User::class, 'userable')->withPivot('is_read');
    }

}
