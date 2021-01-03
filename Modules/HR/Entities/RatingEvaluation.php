<?php

namespace Modules\HR\Entities;

use Illuminate\Database\Eloquent\Model;

class RatingEvaluation extends Model {
    
    protected $guarded = [];

    public function evaluation()
    {
        return $this->belongsToMany(Evaluation::class, 'evaluation_id', 'id');
    }
}
