<?php

namespace Modules\ProjectManagement\Entities;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use \DateTimeInterface;

class WorkTracking extends Model
{
    use SoftDeletes;

    public $table = 'work_trackings';

    protected $dates = [
        'start_date',
        'end_date',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'work_type_id',
        'subject_en',
        'subject_ar',
        'achievement',
        'start_date',
        'end_date',
        'description_en',
        'description_ar',
        'notify_work_achive',
        'notify_work_not_achive',
        'email_send',
        'account_id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function work_type()
    {
        return $this->belongsTo(TimeWorkType::class, 'work_type_id');
    }

    public function getStartDateAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setStartDateAttribute($value)
    {
        $this->attributes['start_date'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function getEndDateAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setEndDateAttribute($value)
    {
        $this->attributes['end_date'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function activities()
    {
        return $this->hasMany(Activity::class,'module_field_id')->where('module','=','workTracking')->orderBy('id','desc');
    }

    public function accountDetails()
    {

        return $this->belongsToMany('Modules\HR\Entities\AccountDetail',
            'work_tracking_account_details_pivot','work_tracking_id','account_details_id');

    }

    public function comments()
    {
        return $this->hasMany(Comment::class,'module_field_id')->where('module','=','workTracking')->where('comment_replay_id','=',null)->orderBy('id','desc');
    }

    public function comments_with_replies()
    {
        return $this->hasMany(Comment::class,'module_field_id')->where('module','=','workTracking')->orderBy('id','desc');
    }
}
