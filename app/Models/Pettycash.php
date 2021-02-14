<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use \DateTimeInterface;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\Models\Media;

class Pettycash extends Model implements HasMedia
{
    use SoftDeletes, HasMediaTrait;

    public $table = 'pettycashes';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];


    protected $fillable = [
        'date',
        'amount',
        'description',
        'pettycash_status',
        'reference_no',
        'comment',
        'has_deduction',
        'deduction_value',
        'user_id',
        'approved_by',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }


    public function added_by()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function approve_by()
    {
        return $this->belongsTo(User::class, 'approved_by');
    }
}
