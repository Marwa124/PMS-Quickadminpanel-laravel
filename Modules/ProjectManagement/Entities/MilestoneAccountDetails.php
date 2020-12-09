<?php

namespace Modules\ProjectManagement\Entities;

use Illuminate\Database\Eloquent\Model;

class MilestoneAccountDetails extends Model
{
    protected $table = "milestone_account_details_pivot";
    protected $fillable = ['milestone_id','account_details_id'];
}
