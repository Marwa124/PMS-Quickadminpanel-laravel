<?php

namespace Modules\Sales\Entities;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\ProjectManagement\Entities\Comment;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\Models\Media;
use \DateTimeInterface;
use  Modules\Sales\Entities\Proposal;
use  Modules\Sales\Entities\Meeting;
use  Modules\Sales\Entities\Call;
use Modules\ProjectManagement\Entities\TaskAttachment;
use Spatie\Permission\Models\Permission;
class Opportunity extends Model implements HasMedia
{
    use SoftDeletes, HasMediaTrait;

    public $table = 'opportunities';

    public static $searchable = [
        'name',
    ];

    protected $dates = [
        'closed_date',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'lead_id',
        'name',
        'probability',
        'stages',
        'closed_date',
        'expected_revenue',
        'new_link',
        'next_action',
        'notes',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function proposals()
    {
        return $this->hasMany(Proposal::class,'module_id')->where('module','=','opportunities')->orderBy('id','desc');
    }
    public function registerMediaConversions(Media $media = null)
    {
        $this->addMediaConversion('thumb')->fit('crop', 50, 50);
        $this->addMediaConversion('preview')->fit('crop', 120, 120);
    }

    public function lead()
    {
        return $this->belongsTo(Lead::class, 'lead_id');
    }

    public function getClosedDateAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setClosedDateAttribute($value)
    {
        $this->attributes['closed_date'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function permissions()
    {
        return $this->belongsToMany(Permission::class);
    }

    public function calls()
    {
        return $this->hasMany(Call::class,'opportunities_id','id');
    }
    public function meetings()
    {
        return $this->hasMany(Meeting::class,'opportunities_id','id');
    }
    public function attachments()
    {
        return $this->hasMany(TaskAttachment::class,'opportunities_id','id');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class,'module_field_id')->where('module','=','opportunity')->where('comment_replay_id','=',null)->orderBy('id','desc');
    }

    public function comments_with_replies()
    {
        return $this->hasMany(Comment::class,'module_field_id')->where('module','=','opportunity')->orderBy('id','desc');
    }

}
