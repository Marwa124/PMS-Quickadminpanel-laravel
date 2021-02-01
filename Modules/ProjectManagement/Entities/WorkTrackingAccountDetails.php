<?php

namespace Modules\ProjectManagement\Entities;

use Illuminate\Database\Eloquent\Model;

class WorkTrackingAccountDetails extends Model
{
    protected $table = "work_tracking_account_details_pivot";
    protected $fillable = ['work_tracking_id','account_details_id'];
}
