<?php

namespace Modules\HR\Entities;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\Models\Media;
use \DateTimeInterface;

class Training extends Model implements HasMedia
{
    use SoftDeletes, HasMediaTrait;

    public $table = 'trainings';

    const ASSIGNED_BY_SELECT = [

    ];

    protected $appends = [
        'uploaded_file',
    ];

    public static $searchable = [
        'training_name',
    ];

    protected $dates = [
        'start_date',
        'finish_date',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    const STATUS_SELECT = [
        'pending'    => 'Pending',
        'started'    => 'Started',
        'completed'  => 'Completed',
        'terminated' => 'Terminated',
    ];

    const Performance_SELECT = [
        'concluded'    => 'Concluded',
        'satisfactory' => 'Satisfactory',
        'average'      => 'Average',
        'poor'         => 'Poor',
        'excellent'    => 'Excellent',
    ];

    protected $fillable = [
        'user_id',
        'assigned_by',
        'training_name',
        'vendor_name',
        'start_date',
        'finish_date',
        'training_cost',
        'status',
        'performance',
        'remarks',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function registerMediaConversions(Media $media = null)
    {
        $this->addMediaConversion('thumb')->fit('crop', 50, 50);
        $this->addMediaConversion('preview')->fit('crop', 120, 120);
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function getStartDateAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setStartDateAttribute($value)
    {
        $this->attributes['start_date'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function getFinishDateAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setFinishDateAttribute($value)
    {
        $this->attributes['finish_date'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function getUploadedFileAttribute()
    {
        return $this->getMedia('uploaded_file')->last();
    }

    public function permissions()
    {
        return $this->belongsToMany(Permission::class);
    }
}
