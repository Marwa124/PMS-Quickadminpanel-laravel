<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Userable extends Model
{

    protected $table = 'userables';
    public $timestamps = true;
    protected $fillable = array('is_read');

}
