<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use \DateTimeInterface;

class Country extends Model
{

    public $table = 'countries';

    protected $dates = [
        'created_at',
        'updated_at',
    ];

    protected $fillable = [
        'iso2',
        'value',
        'long_name',
        'iso3',
        'numcode',
        'un_member',
        'calling_code',
        'cctld',
        'nationality',
        'flag',
        'phone_code',
        'time_zone',
        'created_at',
        'updated_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}