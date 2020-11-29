<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\HR\Entities\Account;
use Modules\ProjectManagement\Entities\Project;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\Models\Media;
use \DateTimeInterface;

class Transaction extends Model implements HasMedia
{
    use SoftDeletes, HasMediaTrait;

    public $table = 'transactions';

    protected $appends = [
        'attachment',
    ];

    const BILLABLE_RADIO = [
        'yes' => 'Yes',
        'no'  => 'No',
    ];

    const CLIENT_VISIBLE_RADIO = [
        'yes' => 'Yes',
        'no'  => 'No',
    ];

    protected $dates = [
        'date',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    const TYPE_SELECT = [
        'income'   => 'Income',
        'expense'  => 'Expense',
        'transfer' => 'Transfer',
    ];

    const STATUS_RADIO = [
        'non_approved' => 'Non Approved',
        'approved'     => 'Approved',
        'paid'         => 'Paid',
        'unpaid'       => 'Unpaid',
    ];

    protected $fillable = [
        'project_id',
        'account_id',
        'invoice_id',
        'name',
        'type',
        'payment_method_id',
        'amount',
        'paid_by',
        'reference',
        'status',
        'notes',
        'tags',
        'tax',
        'date',
        'debit',
        'credit',
        'total_balance',
        'client_visible',
        'added_by',
        'paid',
        'billable',
        'deposit',
        'deposit_2',
        'under_55',
        'expense_category_id',
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

    public function account()
    {
        return $this->belongsTo(Account::class, 'account_id');
    }

    public function invoice()
    {
        return $this->belongsTo(Invoice::class, 'invoice_id');
    }

    public function payment_method()
    {
        return $this->belongsTo(PaymentMethod::class, 'payment_method_id');
    }

    public function getDateAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setDateAttribute($value)
    {
        $this->attributes['date'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function permissions()
    {
        return $this->belongsToMany(Permission::class);
    }

    public function getAttachmentAttribute()
    {
        return $this->getMedia('attachment')->last();
    }

    public function expense_category()
    {
        return $this->belongsTo(ExpenseCategory::class, 'expense_category_id');
    }
}
