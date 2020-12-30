<?php

namespace Modules\HR\Entities;

use App\Models\User;
use Modules\HR\Http\Traits\DataViewer;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use \DateTimeInterface;
use Spatie\Permission\Traits\HasRoles;

class Department extends Model
{
    use SoftDeletes,
        HasRoles,
        DataViewer;

    public $table = 'departments';
    protected $guard_name = 'web';

    public static $columns = [
        ''   => '',
        'id' => 'Id',
        'department_name' => 'Department',
        'department_head_id' => 'Department Head',
        'department_designations' => 'Designation',
        'department_head_account' => 'Actions'
    ];
    // public static $columns = ['Id', 'Name', 'Department Head'];

    protected $hidden = [
        'password',
    ];

    public static $searchable = [
        'id',
        'department_name',
        'department_head_id',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'department_name',
        'department_head_id',
        'email',
        'encryption',
        'host',
        'username',
        'password',
        'mailbox',
        'unread_email',
        'delete_email_after_import',
        'last_postmaster_run',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function departmentDesignations()
    {
        return $this->hasMany(Designation::class, 'department_id', 'id');
    }

    public function department_head()
    {
        return $this->belongsTo(User::class, 'department_head_id');
    }

    public function department_head_account()
    {
        return $this->belongsTo(AccountDetail::class, 'department_head_id', 'user_id');
    }


}
