<?php

namespace Modules\HR\Entities;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\Models\Media;
use \DateTimeInterface;

class JobApplication extends Model implements HasMedia
{
    use SoftDeletes, HasMediaTrait;

    public $table = 'job_applications';

    protected $appends = [
        'resume',
    ];

    public static $searchable = [
        'name',
    ];

    protected $dates = [
        'apply_date',
        'interview_date',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    const STATUS_COLOR = [
        'unread'   => 'orange',
        'primary_selected'   => 'skyblue',
        'call_for_interview'   => '#ccc',
        'approved'   => 'green',
        'rejected'   => 'red',
    ];

    const APPLICATION_STATUS_SELECT = [
        'unread'  => 'Unread',
        'primary_selected'  => 'Primary Selected',
        'call_for_interview'  => 'Call For Interview',
        'approved' => 'Approved',
        'rejected' => 'Rejected',
    ];

    protected $fillable = [
        'job_circular_id',
        'name',
        'email',
        'mobile',
        'cover_letter',
        'application_status',
        'apply_date',
        'send_email',
        'interview_date',
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

    public function job_circular()
    {
        return $this->belongsTo(JobCircular::class, 'job_circular_id');
    }

    public function getResumeAttribute()
    {
        return $this->getMedia('resume')->last();
    }

    public function getApplyDateAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setApplyDateAttribute($value)
    {
        $this->attributes['apply_date'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function getInterviewDateAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setInterviewDateAttribute($value)
    {
        $this->attributes['interview_date'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }
}
