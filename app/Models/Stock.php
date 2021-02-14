<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use \DateTimeInterface;

class Stock extends Model
{
    use SoftDeletes;

    public $table = 'stocks';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'stock_sub_category_id',
        'stock_category_id',
        'buying_date',
        'name',
        'total_stock',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function stock_sub_category()
    {
        return $this->belongsTo(StockSubCategory::class, 'stock_sub_category_id');
    }
    public function stock_category()
    {
        return $this->belongsTo(StockCategory::class, 'stock_category_id');
    }
    public function assigned_stocks()
    {
        return $this->hasMany(AssignStock::class, 'stock_id');
    }
}
