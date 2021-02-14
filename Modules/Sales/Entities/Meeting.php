<?php

namespace Modules\Sales\Entities;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\Models\Media;
use  Modules\Sales\Entities\Opportunity;
use App\Models\client;

use \DateTimeInterface;

class Meeting extends Model
{

       use SoftDeletes, HasMediaTrait;
     const ATTENDEES_SELECT = [
    
        ];
    
        public $table = 'meetings';
    
        public static $searchable = [
            'name',
        ];
    
        protected $casts = [
            'attendees' => 'array',
        ];
    
        protected $dates = [
            'start_date',
            'end_date',
            'created_at',
            'updated_at',
            'deleted_at',
        ];
    
        protected $guarded = [];
    
        protected function serializeDate(DateTimeInterface $date)
        {
            return $date->format('Y-m-d H:i:s');
        }
    
        public function getStartDateAttribute($value)
        {
            return $value ? Carbon::parse($value)->format(config('panel.date_time_format')) : null;
        }
    
        public function setStartDateAttribute($value)
        {
            $this->attributes['start_date'] = $value ? Carbon::createFromFormat(config('panel.date_time_format'), $value)->format('Y-m-d H:i:s') : null;
        }
    
        public function getEndDateAttribute($value)
        {
            return $value ? Carbon::parse($value)->format(config('panel.date_time_format')) : null;
        }
    
        public function setEndDateAttribute($value)
        {
            $this->attributes['end_date'] = $value ? Carbon::createFromFormat(config('panel.date_time_format'), $value)->format('Y-m-d H:i:s') : null;
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
        public function client()
        {
            return $this->belongsTo(Client::class,'client_id');
        }
        public function opportunity()
        {
            return $this->belongsTo(Opportunity::class, 'opportunities_id');
        }
}
