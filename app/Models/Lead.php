<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\Models\Media;
use \DateTimeInterface;

class Lead extends Model implements HasMedia
{
    use SoftDeletes, HasMediaTrait;

    public $table = 'leads';

    public static $searchable = [
        'name',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'name',
        'contact_name',
        'salutation_id',
        'interested_id',
        'organization',
        'lead_status_id',
        'lead_source_id',
        'lead_category_id',
        'imported_from_email',
        'email_integration_uid',
        'company_name',
        'address',
        'country',
        'state',
        'city',
        'title',
        'email',
        'phone',
        'mobile',
        'facebook',
        'notes',
        'skype',
        'twitter',
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

    public function salutation()
    {
        return $this->belongsTo(Salutation::class, 'salutation_id');
    }

    public function interested()
    {
        return $this->belongsTo(InterestedIn::class, 'interested_id');
    }

    public function lead_status()
    {
        return $this->belongsTo(LeadStatus::class, 'lead_status_id');
    }

    public function lead_source()
    {
        return $this->belongsTo(LeadSource::class, 'lead_source_id');
    }

    public function lead_category()
    {
        return $this->belongsTo(LeadCategory::class, 'lead_category_id');
    }

    public function permissions()
    {
        return $this->belongsToMany(Permission::class);
    }
}
