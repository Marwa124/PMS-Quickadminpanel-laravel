<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\Models\Media;
use \DateTimeInterface;

class ReturnStock extends Model implements HasMedia
{
    use SoftDeletes, HasMediaTrait;

    public $table = 'return_stocks';

    const EMAILED_RADIO = [
        'yes' => 'Yes',
        'no'  => 'No',
    ];

    const UPDATE_STOCK_RADIO = [
        'yes' => 'Yes',
        'no'  => 'No',
    ];

    const DISCOUNT_TYPE_RADIO = [
        'before_tax' => 'Before Tax',
        'after_tax'  => 'After Tax',
    ];

    protected $dates = [
        'date_sent',
        'return_stock_date',
        'due_date',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'supplier_id',
        'reference_no',
        'total',
        'update_stock',
        'status',
        'emailed',
        'date_sent',
        'created_by',
        'user_id',
        'return_stock_date',
        'due_date',
        'discount_type',
        'discount_percent',
        'adjustment',
        'discount_total',
        'show_quantity_as',
        'total_tax',
        'tax',
        'notes',
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

    public function supplier()
    {
        return $this->belongsTo(Supplier::class, 'supplier_id');
    }

    public function getDateSentAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setDateSentAttribute($value)
    {
        $this->attributes['date_sent'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function getReturnStockDateAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setReturnStockDateAttribute($value)
    {
        $this->attributes['return_stock_date'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function getDueDateAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setDueDateAttribute($value)
    {
        $this->attributes['due_date'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function permissions()
    {
        return $this->belongsToMany(Permission::class);
    }
}
