<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use \DateTimeInterface;

class Todo extends Model
{
    use SoftDeletes;

    public $table = 'todos';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    const STATUS_RADIO = [
        'in_progress' => 'In Progress',
        'on_hold'     => 'On Hold',
        'done'        => 'Done',
    ];

    protected $fillable = [
        'title',
        'user_id',
        'status',
        'assigned',
        'order',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
