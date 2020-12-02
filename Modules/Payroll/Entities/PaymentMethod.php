<?php

namespace Modules\Payroll\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use \DateTimeInterface;

class PaymentMethod extends Model
{
    public $table = 'payment_methods';
    public $timestamps = false;

    protected $fillable = [
        'name'
    ];

}
