<?php

namespace Modules\ProjectManagement\Entities;

use Illuminate\Database\Eloquent\Model;

class SubDepartment extends Model
{
    protected $fillable = ['id','name'];
    protected $table = "sub_department";


    public function project_specifications(){

        return $this->belongsToMany('Modules\ProjectManagement\Entities\ProjectSpecification',
        'project_specification_values','subdepartment_id','project_specification_id');

    }
}
