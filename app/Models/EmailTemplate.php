<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use \DateTimeInterface;

class EmailTemplate extends Model
{
    public $table = 'email_templates';

    protected $dates = [
        'created_at',
        'updated_at',

    ];

    protected $fillable = [
        'email_group',
        'subject',
        'template_body',
        'updated_at',
        'created_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}