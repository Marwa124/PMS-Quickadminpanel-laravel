<?php

namespace Modules\ProjectManagement\Entities;

use Illuminate\Database\Eloquent\Model;

class ProjectSpecification extends Model
{
    protected $fillable = ['id','name'];
    protected $table = "project_specification";


    public function subdepartments(){

        return $this->belongsToMany('Modules\ProjectManagement\Entities\SubDepartment',
            'project_specification_values','project_specification_id','subdepartment_id');

    }

}
