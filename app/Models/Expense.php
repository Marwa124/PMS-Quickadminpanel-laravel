<?php

namespace App\Models;



use App\Models\Client;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use \DateTimeInterface;
use Modules\HR\Entities\Account;
use Modules\Payroll\Entities\PaymentMethod;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\Models\Media;

class Expense extends Model implements HasMedia
{
    use SoftDeletes, HasMediaTrait;
    public $table = 'expenses';

    protected $dates = [
        'entry_date',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'expense_category_id',
        'entry_date',
        'amount',
        'title',
        'notes',
        'status',
        'reference',
        'payment_method_id',
        'bank_balance',
        'created_by',
        'paid_by_id',
        'account_id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function registerMediaConversions(Media $media = null)
    {
//        $this->addMediaConversion('thumb')->fit('crop', 50, 50);
//        $this->addMediaConversion('preview')->fit('crop', 120, 120);
    }


    public function payment_method()
    {
        return $this->belongsTo(PaymentMethod::class, 'payment_method_id');
    }

    public function account()
    {
        return $this->belongsTo(Account::class, 'account_id');
    }

    public function paid_by()
    {
        return $this->belongsTo(Client::class, 'paid_by_id');
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function expense_category()
    {
        return $this->belongsTo(ExpenseCategory::class, 'expense_category_id');
    }

    public function added_by()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function getEntryDateAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setEntryDateAttribute($value)
    {
        $this->attributes['entry_date'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }
    public function transaction()
    {
        return $this->hasOne(Transaction::class, 'expense_id');
    }
}
