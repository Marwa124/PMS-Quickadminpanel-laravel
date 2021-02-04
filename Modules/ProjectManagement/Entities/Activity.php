<?php

namespace Modules\ProjectManagement\Entities;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Modules\ProjectManagement\Entities\Project;

class Activity extends Model
{
    protected $table = "activities";
    protected $fillable = ['user_id','module','module_field_id','activity_en','activity_ar','activity_date',
                            'icon','link','value1_en','value1_ar','value2_en','value2_ar'];


    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }

//    public function project()
//    {
//        return $this->belongsTo(Project::class,'module_field_id')->where('module','=','project');
//    }
}
