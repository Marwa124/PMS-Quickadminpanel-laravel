<?php

namespace Modules\HR\Entities;

use Illuminate\Database\Eloquent\Model;

class RatingEvaluation extends Model {
    
    protected $guarded = [];

    public function evaluations()
    {
        return $this->belongsToMany(Evaluation::class)->withPivot(["rate", "comment"]);
    }
}
