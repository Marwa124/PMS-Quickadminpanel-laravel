<?php

namespace Modules\HR\Entities;

use Illuminate\Database\Eloquent\Model;

class Evaluation extends Model {
    
    protected $guarded = [];

    // public function ratingEvaluation()
    // {
    //     return $this->belongsToMany(RatingEvaluation::class, 'rating_evaluation_id', 'id');
    // }

    
    public function ratingEvaluations()
    {
        return $this->belongsToMany(RatingEvaluation::class)->withPivot(["rate", "comment"]);
        // return $this->belongsToMany(RatingEvaluation::class, 'rating_evaluation_id')->withPivot(["rate", "comment"]);
    }
}
