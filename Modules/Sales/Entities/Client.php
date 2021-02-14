<?php

namespace Modules\Sales\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\ProjectManagement\Entities\Project;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\Models\Media;
use \DateTimeInterface;
use Modules\HR\Entities\AccountDetail;
use Illuminate\Notifications\Notifiable;

class Client extends Model implements HasMedia
{
    use SoftDeletes, Notifiable, HasMediaTrait;

    public $table = 'clients';

    protected $hidden = [
        'password',
    ];

    public static $searchable = [
        'name',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'primary_contact',
        'name',
        'email',
        'short_note',
        'website',
        'phone',
        'mobile',
        'fax',
        'address',
        'city',
        'zipcode',
        'currency',
        'skype',
        'linkedin',
        'facebook',
        'twitter',
        'language',
        'country',
        'vat',
        'hosting_company',
        'hostname',
        'port',
        'password',
        'username',
        'status_id',
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

    public function clientProjects()
    {
        return $this->hasMany(Project::class, 'client_id', 'id');
    }

    public function status()
    {
        return $this->belongsTo(AccountDetail::class, 'status_id');
    }

    public function proposals()
    {
        return $this->hasMany(Proposal::class,'module_id')->where('module','=','opportunities')->orderBy('id','desc');
    }
}
