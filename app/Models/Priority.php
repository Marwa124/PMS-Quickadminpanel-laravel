<?php

namespace App\Models;

use DateTimeInterface;
use Illuminate\Database\Eloquent\Model;

class Priority extends Model
{

    public $table = 'priorities';

    protected $dates = [
        'created_at',
        'updated_at',
    ];

    protected $fillable = ['priority_en', 'priority_ar'];



    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
