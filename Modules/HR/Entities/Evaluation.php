<?php

namespace Modules\HR\Entities;

use Illuminate\Database\Eloquent\Model;
use Modules\HR\Http\Traits\DataViewer;

class Evaluation extends Model {

    use DataViewer;

    protected $guarded = [];

    protected $dates = ['updated_at', 'created_at'];

    public static $columns = [
        'id'         => '#',
        'user_id'    => 'User',
        'type'       => 'Type',
        'period'     => 'Period',
        'manager_id' => 'Manager',
        'avg_rate'   => 'Avg Rate',
        'goal'       => 'Goal',
        'comment'    => 'Comment',
        'date'       => 'Date',
        ''           => ''
    ];

    public static $searchable = [
        'id',
        'user_id',
        'type',
        'period',
        'manager_id',
        'avg_rate',
        'date',
    ];

    public function ratingEvaluations()
    {
        return $this->belongsToMany(RatingEvaluation::class)->withPivot(["rate", "comment"]);
        // return $this->belongsToMany(RatingEvaluation::class, 'rating_evaluation_id')->withPivot(["rate", "comment"]);
    }
}
