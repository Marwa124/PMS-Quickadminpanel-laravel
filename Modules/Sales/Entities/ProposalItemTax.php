<?php


namespace Modules\Sales\Entities;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use \DateTimeInterface;

class ProposalItemTax extends Model
{
    //
    use SoftDeletes;

    public $table = 'proposal_item_taxs';
    
    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'tax_cost',
        'taxs_id',
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
    public function proposals()
    {
        return $this->belongsTo(Proposal::class, 'proposals_id');
    }
    public function itemproposals()
    {
        return $this->belongsTo(ItemPorposalRelations::class, 'item_id');
    }
}
