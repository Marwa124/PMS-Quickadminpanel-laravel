<?php

namespace Modules\Sales\Entities;

use Illuminate\Database\Eloquent\Model;

class Lead extends Model
{

    protected $guarded =[];


    public function type()
    {
        return $this->belongsTo(Type::class,'type_id','id');
    }

    public function addby()
    {
        return $this->belongsTo(\Modules\HR\Entities\AccountDetail::class,'added_by','user_id');
    }
    public function secondassign()
    {
        return $this->hasOne(LeadUsers::class,'lead_id','id')->oldest();
    }
    public function listassign()
    {
        return $this->hasMany(LeadUsers::class,'lead_id','id');
    }
    public function firstCall()
    {
        return $this->hasOne(Call::class,'lead_id','id')->oldest();
    }

    public function secondCall()
    {
        return $this->belongsTo(Call::class,'lead_id','id')->latest();
    }

    public function firstCallResult()
    {
        return $this->belongsTo(Result::class,'first_call_result_id','id');
    }

    public function secondCallResult()
    {
        return $this->belongsTo(Result::class,'second_call_result_id','id');
    }


}
