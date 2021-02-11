<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use \DateTimeInterface;

class AssignStock extends Model
{
    use SoftDeletes;

    public $table = 'assign_stocks';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'assign_date',
        'quantity',
        'user_id',
        'stock_id',
        'sub_category_id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }


    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function stock()
    {
        return $this->belongsTo(Stock::class, 'stock_id');
    }
    public function sub_category()
    {
        return $this->belongsTo(StockSubCategory::class, 'sub_category_id');
    }

}
