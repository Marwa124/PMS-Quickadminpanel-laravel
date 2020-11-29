<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\ProjectManagement\Entities\Project;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\Models\Media;
use \DateTimeInterface;

class Invoice extends Model implements HasMedia
{
    use SoftDeletes, HasMediaTrait;

    public $table = 'invoices';

    const RECURRING_RADIO = [
        'no'  => 'No',
        'yes' => 'Yes',
    ];

    protected $dates = [
        'recur_start_date',
        'recur_end_date',
        'invoice_date',
        'due_date',
        'recur_next_date',
        'date_sent',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    const STATUS_SELECT = [
        'cancelled'         => 'Cancelled',
        'unpaid'            => 'Unpaid',
        'paid'              => 'Paid',
        'draft'             => 'Draft',
        'partially_paid'    => 'Partially Paid',
        'waiting_app_roval' => 'Waiting App Roval',
        'approved'          => 'Approved',
        'rejected'          => 'Rejected',
    ];

    protected $fillable = [
        'recur_start_date',
        'recur_end_date',
        'reference_no',
        'client_id',
        'project_id',
        'invoice_date',
        'due_date',
        'alert_overdue',
        'notes',
        'tax',
        'total_tax',
        'discount_percent',
        'recurring',
        'recurring_frequency',
        'recur_frequency',
        'recur_next_date',
        'currerncy',
        'status',
        'archived',
        'date_sent',
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

    public function getRecurStartDateAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setRecurStartDateAttribute($value)
    {
        $this->attributes['recur_start_date'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function getRecurEndDateAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setRecurEndDateAttribute($value)
    {
        $this->attributes['recur_end_date'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function client()
    {
        return $this->belongsTo(Client::class, 'client_id');
    }

    public function project()
    {
        return $this->belongsTo(Project::class, 'project_id');
    }

    public function getInvoiceDateAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setInvoiceDateAttribute($value)
    {
        $this->attributes['invoice_date'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function getDueDateAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setDueDateAttribute($value)
    {
        $this->attributes['due_date'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function getRecurNextDateAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setRecurNextDateAttribute($value)
    {
        $this->attributes['recur_next_date'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function getDateSentAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setDateSentAttribute($value)
    {
        $this->attributes['date_sent'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }
}
