<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\Sales\Entities\ProposalsItem;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\Models\Media;
use \DateTimeInterface;
class ItemInvoiceRelations extends Model
{
    //

     use SoftDeletes, HasMediaTrait;

    public $table = 'item_invoice_relations';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'name',
        'item_name',
        'item_desc',
        'brand',
        'delivery',
        'part', 
        'quantity',
        'unit_cost',
        'margin',
        'selling_price',
        'total_cost_price',
        'tax_rate',
        'tax_name',
        'tax_total', 
        'tax_cost',
        'order', 
        'unit',
        'hsn_code', 
        'invoices_id',
        'item_id',
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
    public function invoices()
    {
        return $this->belongsTo(Invoice::class, 'invoices_id');
    }
    public function items()
    {
        return $this->belongsTo(ProposalsItem::class,'item_id');
    }

    public function itemtaxs()
    {
        return $this->hasMany(InvoiceItemTax::class, 'item_id', 'id');
    }
}
