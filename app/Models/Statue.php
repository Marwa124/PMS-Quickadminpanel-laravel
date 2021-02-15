<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use \DateTimeInterface;

class Statue extends Model
{


    public $table = 'statues';

    protected $dates = [
        'created_at',
        'updated_at',
    ];

    protected $fillable = ['status_ar', 'status_en'];



    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
