<?php

namespace Modules\MaterialsSuppliers\Entities;

use Illuminate\Database\Eloquent\Model;
class ItemPurchase extends Model
{

    public $table = 'item_purchase';
    public $timestamps = false;

    protected $guarded = [];

}
