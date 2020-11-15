<?php

namespace Modules\HR\Entities;

use App\Models\Permission;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\Models\Media;
use \DateTimeInterface;

class JobCircular extends Model implements HasMedia
{
    use SoftDeletes, HasMediaTrait;

    public $table = 'job_circulars';

    public static $searchable = [
        'name',
    ];

    const STATUS_SELECT = [
        'unpublished' => 'Unpublished',
        'published'   => 'Published',
    ];

    protected $dates = [
        'posted_date',
        'last_date',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    const EMPLOYMENT_TYPE_SELECT = [
        'contractual' => 'Contractual',
        'full_time'   => 'Full time',
        'part_time'   => 'Part time',
    ];

    protected $fillable = [
        'name',
        'designation_id',
        'vacancy_no',
        'posted_date',
        'employment_type',
        'experience',
        'age',
        'salary_range',
        'last_date',
        'description',
        'status',
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

    public function designation()
    {
        return $this->belongsTo(Designation::class, 'designation_id');
    }

    public function getPostedDateAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setPostedDateAttribute($value)
    {
        $this->attributes['posted_date'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function getLastDateAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setLastDateAttribute($value)
    {
        $this->attributes['last_date'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function permissions()
    {
        return $this->belongsToMany(Permission::class);
    }
}
