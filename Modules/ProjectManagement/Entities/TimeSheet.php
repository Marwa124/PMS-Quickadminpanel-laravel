<?php

namespace Modules\ProjectManagement\Entities;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class TimeSheet extends Model
{
    protected $table = "time_sheets";
    protected $fillable = ['user_id','module','module_field_id','timer_status','start_time','end_time','reason','edited_by'];


    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }

    public function editedBy()
    {
        return $this->belongsTo(User::class,'edited_by');
    }

    public function project()
    {
        return $this->belongsTo(Project::class,'module_field_id');
    }

    public function task()
    {
        return $this->belongsTo(Task::class,'module_field_id');
    }
}
