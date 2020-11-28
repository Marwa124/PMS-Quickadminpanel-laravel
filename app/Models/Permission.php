<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use \DateTimeInterface;

class Permission extends Model
{

    public $table = 'permissions';

    protected $dates = [
        'created_at',
        'updated_at',
    ];

    protected $fillable = [
        'title',
        'created_at',
        'updated_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function permissionsEmployees()
    {
        return $this->belongsToMany(Employee::class);
    }

    public function permissionTrainings()
    {
        return $this->belongsToMany(Training::class);
    }
}
