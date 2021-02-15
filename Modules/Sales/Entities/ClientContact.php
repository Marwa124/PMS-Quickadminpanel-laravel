<?php

namespace Modules\Sales\Entities;

use Illuminate\Database\Eloquent\Model;
use Modules\Sales\Entities\Client;
class ClientContact extends Model
{
    protected $guarded =[];
    
   public function client()
    {
        return $this->belongsTo(Client::class, 'client_id');
    }

}
