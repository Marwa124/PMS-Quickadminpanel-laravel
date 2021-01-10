<?php

namespace Modules\ProjectManagement\Entities;

use Illuminate\Database\Eloquent\Model;

class BugAccountDetails extends Model
{
    protected $table = "bug_account_details_pivot";
    protected $fillable = ['bug_id','account_details_id'];
}
