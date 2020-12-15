<?php

namespace Modules\ProjectManagement\Entities;

use Illuminate\Database\Eloquent\Model;

class ProjectAccountDetails extends Model
{
    protected $fillable = ['project_id','account_details_id'];
    protected $table = "project_account_details_pivot";
}
