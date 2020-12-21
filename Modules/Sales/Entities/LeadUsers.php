<?php

namespace Modules\Sales\Entities;

use Illuminate\Database\Eloquent\Model;

class LeadUsers extends Model
{
    protected $table="lead_users";
    protected $guarded = [];


    public function lead()
    {
      return $this->belongsTo(Lead::class);
    }

    public function leaduser()
    {
        return $this->belongsTo(\Modules\HR\Entities\AccountDetail::class,'user_id','user_id');
    }
  
}
