<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\ProjectManagement\Entities\Project;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\Models\Media;
use \DateTimeInterface;
use  Modules\ProjectManagement\Entities\Activity;
use Illuminate\Support\Facades\DB;
use Illuminate\Notifications\Notifiable;
use Modules\Sales\Entities\Client;


class Invoice extends Model implements HasMedia
{
    use SoftDeletes, HasMediaTrait, Notifiable;

    public $table = 'invoices';

    const RECURRING_RADIO = [
        'no'  => 'No',
        'yes' => 'Yes',
    ];

    protected $dates = [
        'recur_start_date',
        'recur_end_date',
        'invoice_date',
        'due_date',
        'recur_next_date',
        'date_sent',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    const STATUS_SELECT = [
        'cancelled'         => 'Cancelled',
        'unpaid'            => 'Unpaid',
        'paid'              => 'Paid',
        'draft'             => 'Draft',
        'partially_paid'    => 'Partially Paid',
        'waiting_approval'  => 'Waiting Approval',
        'approved'          => 'Approved',
        'rejected'          => 'Rejected',
    ];

    protected $fillable = [
        'recur_start_date',
        'recur_end_date',
        'reference_no',
        'client_id',
        'project_id',
        'invoice_date',
        'due_date',
        'alert_overdue',
        'notes',
        'tax',
        'total_tax',
        'adjustment',
        'after_discount',
        'before_discount',
        'discount_total',
        'discount_status',
        'discount_percent',
        'total_amount',
        'recurring',
        'recurring_frequency',
        'recur_frequency',
        'recur_next_date',
        'currency',
        'status',
        'archived',
        'date_sent',
        'created_at',
        'updated_at',
        'deleted_at',
        'user_id',
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

    public function getRecurStartDateAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setRecurStartDateAttribute($value)
    {
        $this->attributes['recur_start_date'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function getRecurEndDateAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setRecurEndDateAttribute($value)
    {
        $this->attributes['recur_end_date'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function client()
    {
        return $this->belongsTo(Client::class, 'client_id');
    }
    public function added_by()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function project()
    {
        return $this->belongsTo(Project::class, 'project_id');
    }

    public function getInvoiceDateAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setInvoiceDateAttribute($value)
    {
        $this->attributes['invoice_date'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function getDueDateAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setDueDateAttribute($value)
    {
        $this->attributes['due_date'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function getRecurNextDateAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setRecurNextDateAttribute($value)
    {
        $this->attributes['recur_next_date'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function getDateSentAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setDateSentAttribute($value)
    {
        $this->attributes['date_sent'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    ///////////////////

    public function get_invoice_paid_amount($invoice_id)
    {

//        $this->db->select_sum('amount');
//        $this->db->where('invoices_id', $invoice_id);
//        $this->db->from('tbl_payments');
//        $query_result = $this->db->get();
//        $amount = $query_result->row();
//        $tax = $this->get_invoice_tax_amount($invoice_id);

        $amount = DB::table('payments')
            ->where('invoice_id', $invoice_id)
            ->where('deleted_at','=',null)
            ->sum('amount');

//        if (!empty($amount)) {
//            $result = $amount;
//        } else {
//            $result = '0';
//        }
        return $amount;
    }


    public function items(){

        return $this->belongsToMany('Modules\Sales\Entities\ProposalsItem',
            'item_invoice_relations','invoices_id','item_id') ->withPivot(
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
        return $this->hasMany(InvoiceItemTax::class, 'invoices_id', 'id');
    }

    public function gettaxesarray($taxes)
    {

        $unique_taxes_ids = array_unique($taxes->itemtaxs->pluck('taxs_id')->toArray());
        $turned_into_keys = array_fill_keys($unique_taxes_ids,null);

        foreach($taxes->items as $key => $value){

            $items_tax = 0;

            foreach($taxes->itemtaxs->where('item_id',$value->pivot->id)->pluck('taxs_id') as $tax){
                // dd($unique_taxes_ids,$turned_into_keys,$taxes->itemtaxs->where('item_id',$value->pivot->id)->pluck('taxs_id'),$tax,$value->pivot->selling_price, $value->pivot->quantity);
                if(array_key_exists($tax,$turned_into_keys)){
                    $sallingprice = $value->pivot->selling_price * $value->pivot->quantity;
                   
                    if($taxes->discount_status == 'after_tax' ){
                        if($taxes->discount_percent != 0){
                            $old =$sallingprice * (get_taxes($tax)->rate_percent/100) ;
                            $items_tax = $old-( $old * ($taxes->discount_percent / 100)) ;
                        }else{

                            $items_tax = $sallingprice * (get_taxes($tax)->rate_percent/100) ;
                        }
                    }
                    else{
                        $items_tax = $sallingprice * (get_taxes($tax)->rate_percent/100) ;

                    }
                    $turned_into_keys[$tax][]=$items_tax;
                }
            }

        }

        return  $turned_into_keys;

    }

    public function activities()
    {
        return $this->hasMany(Activity::class,'module_field_id')->where('module','=','invoice')->orderBy('id','desc');
    }

    public function transaction()
    {
        return $this->hasOne(Transaction::class, 'invoice_id');
    }
}
