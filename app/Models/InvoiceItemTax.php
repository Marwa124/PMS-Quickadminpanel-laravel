<?php


namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use \DateTimeInterface;

class InvoiceItemTax extends Model
{
    //
    use SoftDeletes;

    public $table = 'invoice_item_taxs';
    
    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'tax_cost',
        'taxs_id',
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
    public function invoices()
    {
        return $this->belongsTo(Invoice::class, 'invoices_id');
    }
    public function iteminvoices()
    {
        return $this->belongsTo(ItemInvoiceRelations::class, 'item_id');
    }
}
