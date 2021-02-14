<?php

namespace App\Models;

use Carbon\Carbon;
use Hash;
use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;
use Modules\HR\Entities\EmployeeAward;
use Modules\HR\Entities\Training;
use Modules\ProjectManagement\Entities\Bug;
use Modules\ProjectManagement\Entities\Milestone;
use Modules\ProjectManagement\Entities\Project;
use Modules\ProjectManagement\Entities\ProjectTimer;
use Modules\ProjectManagement\Entities\Task;
use Modules\ProjectManagement\Entities\TimeSheet;
use Modules\ProjectManagement\Entities\ticket;
use Modules\ProjectManagement\Entities\WorkTracking;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\Models\Media;
use \DateTimeInterface;
use Modules\HR\Entities\Absence;
use Modules\HR\Entities\AccountDetail;
use Modules\HR\Entities\Department;
use Modules\HR\Entities\FingerprintAttendance;
use Modules\HR\Entities\LeaveApplication;
use Modules\HR\Entities\SetTime;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable implements HasMedia
{
    use SoftDeletes, Notifiable, HasApiTokens, HasMediaTrait;
    use HasRoles;
    // public function routeNotificationForTwilio()
    // {
    //     // return '+2001061739707';
    //     // return '+2001006143107';
    //     return '+2001123408535';
    // }

    // public function routeNotificationForPlivo()
    // {
    //     // Country code, area code and number without symbols or spaces
    //     return preg_replace('/\D+/', '', '+2001006143107');
    // }

    public $table = 'users';

    public static $searchable = [
        'name',
    ];

    const JOB_TYPE = [
        'full_time' => 'Full Time',
        'part_time' => 'Part Time',
        'freelance' => 'Freelance',
    ];

    const BANNED_RADIO = [
        '1' => 'Banned',
        '0' => 'Not Banned',
    ];

    const ONLINE_TIME_RADIO = [
        '1' => 'online',
        '0' => 'offline',
    ];

    const ACTIVATED_RADIO = [
        '1' => 'Activated',
        '0' => 'Not Activated',
    ];

    protected $hidden = [
        'remember_token',
        'password',
        'smtp_password',
        'marketing_password',
        'sp_password',
    ];

    protected $dates = [
        'email_verified_at',
        'last_login',
        'date_of_join',
        'date_of_insurance',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $guarded = [];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function registerMediaConversions(Media $media = null)
    {
        $this->addMediaConversion('thumb')->fit('crop', 50, 50);
        $this->addMediaConversion('preview')->fit('crop', 120, 120);
    }

    /* !!!: Relations */
    public function department()
    {
        return $this->hasMany(Department::class, 'department_head_id', 'id');
    }

    public function leaveApplications()
    {
        return $this->hasMany(LeaveApplication::class, 'user_id', 'id');
    }

    public function fingerPrintAttendances()
    {
        return $this->hasMany(FingerprintAttendance::class, 'user_id', 'id');
    }

    public function timeTable()
    {
        return $this->belongsTo(SetTime::class, 'set_time_id', 'id');
    }

    public function accountDetail()
    {
        return $this->hasOne(AccountDetail::class, 'user_id', 'id');
    }

    public static function fetchUnbannedUsers()
    {
        $users = [];
        foreach (User::where('banned', 0)->get() as $key => $value) {
            $users[] = $value->accountDetail()->where('employment_id', '!=', null)->pluck('fullname', 'user_id');
        }
        return $users;
    }

    public function absences()
    {
        return $this->hasMany(Absence::class, 'user_id', 'id');
    }

    public function userTrainings()
    {
        return $this->hasMany(Training::class, 'user_id', 'id');
    }

    public function userEmployeeAwards()
    {
        return $this->hasMany(EmployeeAward::class, 'user_id', 'id');
    }

    public function userUserAlerts()
    {
        return $this->belongsToMany(UserAlert::class);
    }

    public function getEmailVerifiedAtAttribute($value)
    {
        return $value ? Carbon::createFromFormat('Y-m-d H:i:s', $value)->format(config('panel.date_format') . ' ' . config('panel.time_format')) : null;
    }

    public function setEmailVerifiedAtAttribute($value)
    {
        $this->attributes['email_verified_at'] = $value ? Carbon::createFromFormat(config('panel.date_format') . ' ' . config('panel.time_format'), $value)->format('Y-m-d H:i:s') : null;
    }

    public function setPasswordAttribute($input)
    {
        if ($input) {
            $this->attributes['password'] = app('hash')->needsRehash($input) ? Hash::make($input) : $input;
        }
    }

    public function sendPasswordResetNotification($token)
    {
        $this->notify(new ResetPassword($token));
    }

    public function getLastLoginAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setLastLoginAttribute($value)
    {
        // $this->attributes['last_login'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function getDateOfJoinAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setDateOfJoinAttribute($value)
    {
        $this->attributes['date_of_join'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function getDateOfInsuranceAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setDateOfInsuranceAttribute($value)
    {
        $this->attributes['date_of_insurance'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function TimeSheet()
    {
        return $this->hasMany(TimeSheet::class, 'user_id');
    }

    public function TimeSheetEdited()
    {
        return $this->hasMany(TimeSheet::class, 'edited_by');
    }

    // get Project management details to specific User

    public function getUserProjectsByUserID($user_id, $trashed = null)
    {
        $user = User::findOrFail($user_id);
        $departments = Department::where('department_head_id', $user_id)->get();

        if ($user->hasrole(['Admin', 'Super Admin'])) {

            if ($trashed) {
                //            abort_if(Gate::denies('project_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');
                return Project::onlyTrashed()->get();
            }

            $projects = Project::all();
        } elseif ($departments->count() > 0) {
            // get projects to show for head department of this projects

            if ($trashed) {
                //            abort_if(Gate::denies('project_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');
                return Project::whereIn('department_id', $departments->pluck('id'))->onlyTrashed()->get();
            }

            $projects = Project::whereIn('department_id', $departments->pluck('id'))->get();
        } else {

            if ($trashed) {
                //            abort_if(Gate::denies('project_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');
                return $user->accountDetail->trashProjects;
            }

            $projects = $user->accountDetail->projects;
        }

        return $projects;
    }

    public function getUserMilestonesByUserID($user_id, $trashed = null)
    {
        $user = User::findOrFail($user_id);
        $departments = Department::where('department_head_id', $user_id)->get();


        if ($user->hasrole(['Admin', 'Super Admin'])) {

            if ($trashed) {
                //            abort_if(Gate::denies('milestone_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');
                return Milestone::onlyTrashed()->get();
            }

            $milestones = Milestone::all();
        } elseif ($departments->count() > 0) {
            // get milestones of projects to show for head department of this projects

            if ($trashed) {
                //            abort_if(Gate::denies('milestone_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');
                return Milestone::whereHas('project', function ($query) use ($departments) {

                    $query->whereIn('department_id', $departments->pluck('id'));
                })->onlyTrashed()->get();
            }

            $milestones = Milestone::whereHas('project', function ($query) use ($departments) {

                $query->whereIn('department_id', $departments->pluck('id'));
            })->get();
        } else {
            if ($trashed) {
                //            abort_if(Gate::denies('milestone_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');
                return $user->accountDetail->trashMilestones;
            }

            $milestones = $user->accountDetail->milestones;
        }


        return $milestones;
    }

    public function getUserTasksByUserID($user_id, $trashed = null, $sub_task = null)
    {
        $user = User::findOrFail($user_id);
        $departments = Department::where('department_head_id', $user_id)->get();

        if ($user->hasrole(['Admin', 'Super Admin'])) {

            if ($trashed) {
                //            abort_if(Gate::denies('task_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');
                return Task::onlyTrashed()->get();
            }

            if ($sub_task) {

                return Task::get();
            }

            $tasks = Task::where('parent_task_id', null)->get();
        } elseif ($departments->count() > 0) {
            // get tasks of projects to show for head department of this projects

            if ($trashed) {
                //            abort_if(Gate::denies('task_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');
                //return Task::whereIn('department_id',$departments->pluck('id'))->onlyTrashed()->get();
                return Task::whereHas('project', function ($query) use ($departments) {
                    $query->whereIn('department_id', $departments->pluck('id'));
                })->onlyTrashed()->get();
            }

            if ($sub_task) {

                return $tasks = Task::whereHas('project', function ($query) use ($departments) {

                    $query->whereIn('department_id', $departments->pluck('id'));
                })->get();
            }

            $tasks = Task::whereHas('project', function ($query) use ($departments) {

                $query->whereIn('department_id', $departments->pluck('id'));
            })->where('parent_task_id', null)->get();
        } else {

            if ($trashed) {
                //            abort_if(Gate::denies('task_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');
                return $user->accountDetail->trashTasks;
            }

            if ($sub_task) {

                return $user->accountDetail->tasks;
            }

            $tasks = $user->accountDetail->tasks->where('parent_task_id', null);
        }

        return $tasks;
    }

    public function getUserBugsByUserID($user_id, $trashed = null)
    {
        $user = User::findOrFail($user_id);
        $departments = Department::where('department_head_id', $user_id)->get();


        if ($user->hasrole(['Admin', 'Super Admin'])) {

            if ($trashed) {
                //            abort_if(Gate::denies('bug_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');
                return Bug::onlyTrashed()->get();
            }

            $bugs = Bug::all();
        } elseif ($departments->count() > 0) {
            // get bugs of projects to show for head department of this projects
            if ($trashed) {
                //            abort_if(Gate::denies('bug_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');
                return Bug::whereHas('project', function ($query) use ($departments) {

                    $query->whereIn('department_id', $departments->pluck('id'));
                })->onlyTrashed()->get();
            }

            $bugs = Bug::whereHas('project', function ($query) use ($departments) {

                $query->whereIn('department_id', $departments->pluck('id'));
            })->get();
        } else {

            if ($trashed) {
                //            abort_if(Gate::denies('bug_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');
                $bugs = $user->accountDetail->trashBugs;
                if (!$bugs) {
                    $bugs = Bug::onlyTrashed()
                        ->whereHas('reporterBy', function ($query) {
                            $query->where('id', auth()->user()->id);
                        })->with('reporterBy')->get();
                }
                return $bugs;
            }

            $bugs = $user->accountDetail->bugs;
            if (!$bugs || $bugs->count() == 0) {
                $bugs = Bug::whereHas('reporterBy', function ($query) {
                    $query->where('id', auth()->user()->id);
                })->with('reporterBy')->get();
                //dd($bugs);
            }
        }

        return $bugs;
    }

    public function getUserTicketsByUserID($user_id, $trashed = null)
    {
        $user = User::findOrFail($user_id);
        $departments = Department::where('department_head_id', $user_id)->get();

        if ($user->hasrole(['Admin', 'Super Admin'])) {

            if ($trashed) {
                //            abort_if(Gate::denies('ticket_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');
                return Ticket::onlyTrashed()->get();
            }

            $tickets = Ticket::all();
        } elseif ($departments->count() > 0) {
            // get Tickets of projects to show for head department of this projects
            if ($trashed) {
                //            abort_if(Gate::denies('ticket_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');
                return Ticket::whereHas('project', function ($query) use ($departments) {

                    $query->whereIn('department_id', $departments->pluck('id'));
                })->onlyTrashed()->get();
            }

            $tickets = Ticket::whereHas('project', function ($query) use ($departments) {

                $query->whereIn('department_id', $departments->pluck('id'));
            })->get();
        } else {

            if ($trashed) {
                //            abort_if(Gate::denies('ticket_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');
                $tickets = $user->accountDetail->trashTickets;

                if (!$tickets) {
                    $tickets = Ticket::onlyTrashed()
                        ->whereHas('reporterBy', function ($query) {
                            $query->where('id', auth()->user()->id);
                        })->with('reporterBy')->get();
                }
                return $tickets;
            }

            $tickets = $user->accountDetail->tickets;
            if (!$tickets || $tickets->count() == 0) {
                $tickets = Ticket::whereHas('reporterBy', function ($query) {
                    $query->where('id', auth()->user()->id);
                })->with('reporterBy')->get();
            }
        }

        return $tickets;
    }

    public function getUserWorkTrackingByUserID($user_id, $trashed = null)
    {
        $user = User::findOrFail($user_id);

        if ($user->hasrole(['Admin', 'Super Admin'])) {

            if ($trashed) {
                //            abort_if(Gate::denies('work_tracking_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');
                return WorkTracking::onlyTrashed()->get();
            }

            $allWorkTracking = WorkTracking::all();
        } else {

            if ($trashed) {
                //            abort_if(Gate::denies('work_tracking_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');
                return $user->accountDetail->trashWork_tracking;
            }

            $allWorkTracking = $user->accountDetail->work_tracking;
        }

        return $allWorkTracking;
    }
}