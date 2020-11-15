<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use \DateTimeInterface;

class PerformanceIndicator extends Model
{
    use SoftDeletes;

    const MARKETING_SELECT = [

    ];

    const INTEGRITY_SELECT = [

    ];

    const TEAM_WORK_SELECT = [

    ];

    const MANAGEMENT_SELECT = [

    ];

    const EFFICIENCY_SELECT = [

    ];

    const ATTENDANCE_SELECT = [

    ];

    const ADMINISTRATION_SELECT = [

    ];

    const PROFISSIONALISM_SELECT = [

    ];

    const QUANTITY_OF_WORK_SELECT = [

    ];

    const CRITICAL_THINKING_SELECT = [

    ];

    const PRESENTATION_SKILL_SELECT = [

    ];

    public $table = 'performance_indicators';

    const CONFLICT_MANAGEMENT_SELECT = [

    ];

    const CUSTOMER_TECHNICAL_EXPERIENCE_SELECT = [

    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'designation_id',
        'customer_technical_experience',
        'marketing',
        'management',
        'administration',
        'presentation_skill',
        'quantity_of_work',
        'efficiency',
        'integrity',
        'profissionalism',
        'team_work',
        'critical_thinking',
        'conflict_management',
        'attendance',
        'ability_to_meet_deadline',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function designation()
    {
        return $this->belongsTo(Designation::class, 'designation_id');
    }
}
