<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use \DateTimeInterface;

class StockCategory extends Model
{
    use SoftDeletes;

    public $table = 'stock_categories';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'name',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    protected function sub_categories()
    {
        return $this->hasMany(StockSubCategory::class ,'stock_category_id');
    }
    protected function stock()
    {
        return $this->hasMany(Stock::class ,'stock_category_id');
    }
}
