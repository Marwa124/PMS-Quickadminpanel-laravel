<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use \DateTimeInterface;
use Modules\ProjectManagement\Entities\Project;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\Models\Media;

class Settlement extends Model implements HasMedia
{
    use SoftDeletes, HasMediaTrait;

    public $table = 'settlements';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];


    protected $fillable = [
        'date',
        'amount',
        'description',
        'invoice_number',
        'settlement_status',
        'settlement_type',
        'comment',

        'pettycash_id',
        'project_id',
        'client_id',
        'user_id',
        'approved_by',

        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }


    public function added_by()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function approve_by()
    {
        return $this->belongsTo(User::class, 'approved_by');
    }
    public function client()
    {
        return $this->belongsTo(Client::class, 'client_id');
    }
    public function project()
    {
        return $this->belongsTo(Project::class, 'project_id');
    }
    public function pettycash()
    {
        return $this->belongsTo(Pettycash::class, 'pettycash_id');
    }
}
