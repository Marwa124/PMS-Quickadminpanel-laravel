<?php

namespace Modules\Payroll\Entities;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\Models\Media;
use \DateTimeInterface;

class AdvanceSalary extends Model implements HasMedia
{
    use HasMediaTrait;

    public $table = 'advance_salaries';
    public $timestamps = false;

    // protected $dates = [
    //     'month',
    // ];

    protected $guarded = [];

    const TYPE_SELECT = [
        'Bonus'   => 'Bonus',
        'Penalty' => 'Penalty',
    ];

    // protected function serializeDate(DateTimeInterface $date)
    // {
    //     return $date->format('Y-m-d H:i:s');
    // }

    // public function registerMediaConversions(Media $media = null)
    // {
    //     $this->addMediaConversion('thumb')->fit('crop', 50, 50);
    //     $this->addMediaConversion('preview')->fit('crop', 120, 120);
    // }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    // public function getMonthAttribute($value)
    // {
    //     return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    // }

    // public function setMonthAttribute($value)
    // {
    //     $this->attributes['month'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m') : null;
    // }
}
