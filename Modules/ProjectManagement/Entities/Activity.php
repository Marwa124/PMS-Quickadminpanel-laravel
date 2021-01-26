<?php

namespace Modules\ProjectManagement\Entities;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Modules\ProjectManagement\Entities\Project;

class Activity extends Model
{
    protected $table = "activities";
    protected $fillable = ['user_id','module','module_field_id','activity','activity_date','icon','link','value1','value2'];


    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }

//    public function project()
//    {
//        return $this->belongsTo(Project::class,'module_field_id')->where('module','=','project');
//    }
}
