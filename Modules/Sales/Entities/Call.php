<?php

namespace Modules\Sales\Entities;

use Illuminate\Database\Eloquent\Model;

class Call extends Model
{
    protected $guarded =[];



    public function result()
    {
        return $this->belongsTo(Result::class,'result_id','id');
    }
    public function lead()
    {
        return $this->belongsTo(Lead::class,'lead_id','id');
    }

   
}
