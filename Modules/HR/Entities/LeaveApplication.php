<?php

namespace Modules\HR\Entities;

use App\Models\Notification;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\Models\Media;
use \DateTimeInterface;
use Illuminate\Notifications\Notifiable;
use Spatie\MediaLibrary\File;

class LeaveApplication extends Model implements HasMedia
{
    use SoftDeletes, HasMediaTrait, Notifiable;

    public $table = 'leave_applications';

    public static $searchable = [
        'leave_type',
    ];

    protected $appends = [
        'attachments',
    ];

    const LEAVE_TYPE_SELECT = [
        'single_day' => 'Single day',
        'multi_days' => 'Multi days',
        'hours'      => 'Hours',
    ];

    protected $dates = [
        'leave_start_date',
        'leave_end_date',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    const STATUS_COLOR = [
        'pending'   => 'yellow',
        'accepted'   => '#90EE90',
        'rejected'   => 'red',
    ];

    const APPLICATION_STATUS_SELECT = [
        'pending'  => 'Pending',
        'accepted' => 'Approved',
        'rejected' => 'Rejected',
    ];

    protected $fillable = [
        'user_id',
        'leave_category_id',
        'reason',
        'leave_type',
        'hours',
        'leave_start_date',
        'leave_end_date',
        'application_status',
        'view_status',
        'comments',
        'approved_by',
        'created_at',
        'updated_at',
        'deleted_at',
        'deduct'
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

    public function registerMediaCollections()
    {
        $this
            ->addMediaCollection('attachments')
            ->acceptsMimeTypes(['image/jpg', 'image/png', 'image/jpeg', 'application/msword']);
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function leave_category()
    {
        return $this->belongsTo(LeaveCategory::class, 'leave_category_id');
    }

    public function getLeaveStartDateAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setLeaveStartDateAttribute($value)
    {
        $this->attributes['leave_start_date'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function getLeaveEndDateAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setLeaveEndDateAttribute($value)
    {
        $this->attributes['leave_end_date'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function getAttachmentsAttribute()
    {
        return $this->getMedia('attachments')->last();
    }
}
