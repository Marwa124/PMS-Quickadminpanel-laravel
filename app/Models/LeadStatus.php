<?php

namespace App\Models;

use DateTimeInterface;
use Illuminate\Database\Eloquent\Model;

class LeadStatus extends Model
{

    public $table = 'lead_statuses';

    protected $dates = [
        'created_at',
        'updated_at',

    ];

    protected $fillable = ['name_en', 'name_ar'];


    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}