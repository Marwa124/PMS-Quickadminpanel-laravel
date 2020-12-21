<?php

namespace Modules\ProjectManagement\Entities;

use Illuminate\Database\Eloquent\Model;

class TaskAccountDetails extends Model
{
    protected $table = "task_account_details";
    protected $fillable = ['task_id','account_details_id'];
}
