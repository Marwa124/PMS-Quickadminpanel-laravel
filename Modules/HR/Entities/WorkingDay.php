<?php

namespace Modules\HR\Entities;

use Illuminate\Database\Eloquent\Model;

class WorkingDay extends Model {
    
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
