<?php


namespace Modules\Sales\Entities;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\Models\Media;
use App\Models\User;
use App\Models\Opportunity;
use App\Models\Client;
use  Modules\Sales\Entities\ProposalItemTax;
use  Modules\ProjectManagement\Entities\Activity;
use \DateTimeInterface;

class Proposal extends Model implements HasMedia
{
    use SoftDeletes, HasMediaTrait;

    public $table = 'proposals';

    const EMAILED_SELECT = [
        'yes' => 'Yes',
        'no'  => 'No',
    ];

    const CONVERT_SELECT = [
        'yes' => 'Yes',
        'no'  => 'No',
    ];

    const SHOW_CLIENT_SELECT = [
        'yes' => 'Yes',
        'no'  => 'No',
    ];

    const PROPOSAL_DELETED_SELECT = [
        'yes' => 'Yes',
        'no'  => 'No',
    ];

    protected $dates = [
        'proposal_date',
        'expire_date',
        'date_sent',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'id',
        'reference_no',
        'subject',
        'module',
        'proposal_date',
        'expire_date',
        'alert_overdue',
        'currency',
        'notes',
        'total_tax',
        'total_cost_price',
        'tax',
        'status',
        'date_sent',
        'proposal_deleted',
        'emailed',
        'show_client',
        'convert',
        'convert_module',
        'module_id',
        'convert_module_id',
        'converted_date',
        'discount_type',
        'discount_percent',
        'after_discount',
        'discount_total',
        'adjustment',
        'show_quantity_as',
        'allowed_cmments',
        'proposal_validity',
        'materials_supply_delivery',
        'warranty',
        'prices',
        'user_id',
        'payment_terms',
        'maintenance_service_contract',
        'created_at',
        'updated_at',
        'deleted_at',
    ];
    public function opportunity()
    {
        return $this->belongsTo(Opportunity::class,'module_id');
    }
    public function client()
    {
        return $this->belongsTo(Client::class,'module_id');
    }
   
    public function getclient()
    {
        return $this->where('proposals.module','=','client')->first()->client();
    }
    public function getopportunity()
    {
        return $this->where('proposals.module','=','opportunities')->first()->opportunity();
    }
   
    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function registerMediaConversions(Media $media = null)
    {
        $this->addMediaConversion('thumb')->fit('crop', 50, 50);
        $this->addMediaConversion('preview')->fit('crop', 120, 120);
    }

    public function getProposalDateAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setProposalDateAttribute($value)
    {
        $this->attributes['proposal_date'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function getExpireDateAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setExpireDateAttribute($value)
    {
        $this->attributes['expire_date'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function getDateSentAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setDateSentAttribute($value)
    {
        $this->attributes['date_sent'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function user()
    {
        return $this->belongsTo(User::class ,'user_id');
    }
    public function items(){

        return $this->belongsToMany('Modules\Sales\Entities\ProposalsItem',
            'item_porposal_relations','proposals_id','item_id')->withPivot(
                'id',
                'item_name',
                'item_desc',
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
                'hsn_code'
            )->orderBy('order','asc');

    }

    public function itemtaxs()
    {
        return $this->hasMany(ProposalItemTax::class, 'proposals_id', 'id');
    }

    public function gettaxesarray($proposal)
    {
        
        $unique_taxes_ids = array_unique($proposal->itemtaxs->pluck('taxs_id')->toArray());
        $turned_into_keys = array_fill_keys($unique_taxes_ids,null);

        foreach($proposal->items as $key => $value){
        
            $items_tax = 0;    
        
            foreach($proposal->itemtaxs->where('item_id',$value->pivot->id)->pluck('taxs_id') as $tax){
                // dd($unique_taxes_ids,$turned_into_keys,$proposal->itemtaxs->where('item_id',$value->pivot->id)->pluck('taxs_id'),$tax,$value->pivot->selling_price, $value->pivot->quantity);
                if(array_key_exists($tax,$turned_into_keys)){
                    $sallingprice = $value->pivot->selling_price * $value->pivot->quantity;
                   
                    if($proposal->discount_percent != 0){
                        $old =$sallingprice * (get_taxes($tax)->rate_percent/100) ;
                        $items_tax = $old-( $old * ($proposal->discount_percent / 100)) ;
                    }else{

                        $items_tax = $sallingprice * (get_taxes($tax)->rate_percent/100) ;
                    }
                    $turned_into_keys[$tax][]=$items_tax;
                }
            }

        }
            
        return  $turned_into_keys;

    }
    
    public function getSubtotal($proposal)
    {
        $items_tax = 0;    
        foreach($proposal->items as $key => $value){
            $items_tax += $value->pivot->selling_price * $value->pivot->quantity;
        }
        return $items_tax;
    }

    public function activities()
    {
        return $this->hasMany(Activity::class,'module_field_id')->where('module','=','proposal')->orderBy('id','desc');
    }
}
