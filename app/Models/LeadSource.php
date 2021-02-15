<?php

namespace App\Models;

use DateTimeInterface;
use Illuminate\Database\Eloquent\Model;

class LeadSource extends Model
{
    public $table = 'lead_sources';

    protected $dates = [

        'created_at',
        'updated_at',

    ];

    protected $fillable = [
        'lead_source',
        'lead_source_ar',
        'created_at',
        'updated_at',

    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}