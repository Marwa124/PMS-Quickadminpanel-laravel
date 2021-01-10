<?php

namespace Modules\ProjectManagement\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\HR\Entities\Department;
use Modules\ProjectManagement\Entities\Project;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\Models\Media;
use \DateTimeInterface;

class Ticket extends Model implements HasMedia
{
    use SoftDeletes, HasMediaTrait;

    public $table = 'tickets';

    protected $appends = [
        'file',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'project_id',
        'ticket_code',
        'email',
        'subject',
        'body',
        'status',
        'department_id',
        'reporter',
        'priority',
        'comment',
        'last_reply',
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

    public function project()
    {
        return $this->belongsTo(Project::class, 'project_id');
    }

    public function department()
    {
        return $this->belongsTo(Department::class, 'department_id');
    }

    public function getFileAttribute()
    {
        return $this->getMedia('file')->last();
    }

    public function replies()
    {
        return $this->hasMany(TicketReplay::class,'ticket_id')->where('ticket_replay_id','=',null);
    }

    public function accountDetails(){

        return $this->belongsToMany('Modules\HR\Entities\AccountDetail',
            'ticket_account_details_pivot','ticket_id','account_details_id');

    }

}
