<?php

namespace Modules\Sales\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\Models\Media;
use \DateTimeInterface;
use Modules\MaterialsSuppliers\Entities\Purchase;
use Modules\MaterialsSuppliers\Entities\TaxRate;

class ProposalsItem extends Model implements HasMedia
{
    use SoftDeletes, HasMediaTrait;

    public $table = 'proposals_items';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        // 'proposals_id',
        'item_name',
        'item_desc',
        'customer_group_id',
        // 'group_name',
        'brand',
        'delivery',
        'part',
        'quantity',
        'unit_cost',
        'margin',
        'selling_price',
        'total_cost_price',
        'tax_id',
        // 'tax_rate',
        // 'tax_name',
        // 'tax_total',
        // 'tax_cost',
        'order',
        'unit',
        // 'hsn_code',
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
    // public function proposals()
    // {
    //     return $this->belongsTo(Proposal::class, 'proposals_id');
    // }
    public function customer_group()
    {
        return $this->belongsTo(\Modules\MaterialsSuppliers\Entities\CustomerGroup::class,'customer_group_id');
    }
    public function taxes()
    {
        return $this->belongsTo(\Modules\MaterialsSuppliers\Entities\TaxRate::class, 'tax_id');
    }


    public function proposals(){

        return $this->belongsToMany('Modules\Sales\Entities\Proposal',
            'item_porposal_relations','item_id','proposals_id')->orderBy('id','asc');

    }


    public function purchases() {
        return $this->belongsToMany(Purchase::class, 'pruchase_id');
    }

    public function purchaseTaxes() {
        return $this->belongsToMany(TaxRate::class, 'tax_id')->withPivot('purchase_id');
    }

}
