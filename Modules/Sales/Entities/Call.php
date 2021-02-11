<?php

namespace Modules\Sales\Entities;

use Illuminate\Database\Eloquent\Model;
use App\Models\client;
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
    public function client()
    {
        return $this->belongsTo(client::class,'client_id','id')->where('client_id','!=',NUll);
    }
    public function opportunities()
    {
        return $this->belongsTo(Opportunity::class,'opportunities_id','id');
    }

   
}
