<?php

namespace Modules\Sales\Entities;

use Illuminate\Database\Eloquent\Model;

class Finalresult extends Model
{
    protected $table = 'final_results';
    protected $guarded =[];


    public function lead()
    {
        return $this->belongsTo(Lead::class,'lead_id','id');
    }
}
