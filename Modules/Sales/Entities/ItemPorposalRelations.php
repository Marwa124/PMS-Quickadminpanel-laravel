<?php

namespace Modules\Sales\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\Models\Media;
use \DateTimeInterface;
class ItemPorposalRelations extends Model
{
    //

     use SoftDeletes, HasMediaTrait;

    public $table = 'item_porposal_relations';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'name',
        'description',
        'group_name',
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
        'proposals_id',
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
    public function proposals()
    {
        return $this->belongsTo(Proposal::class, 'proposals_id');
    }
    public function items()
    {
        return $this->belongsTo(ProposalsItem::class,'item_id');
    }

}
