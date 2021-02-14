<?php

namespace Modules\ProjectManagement\Entities;

use App\Models\Client;
use App\Models\Invoice;
use App\Models\Transaction;
use Illuminate\Notifications\Notifiable;
use Modules\ProjectManagement\Entities\Milestone;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\Models\Media;
use \DateTimeInterface;
use Illuminate\Support\Facades\Mail;
use App\Mail\ProjectManagementMail;

class Project extends Model implements HasMedia
{
    use
    SoftDeletes, HasMediaTrait, Notifiable;

    public $table = 'projects';

    public static $searchable = [
        'name',
    ];

    const WITH_TASKS_RADIO = [
        'no'  => 'No',
        'yes' => 'Yes',
    ];

    const TIMER_STATUS_RADIO = [
        'on'  => 'On',
        'off' => 'Off',
    ];

    const NOTIFY_CLIENT_RADIO = [
        'yes' => 'Yes',
        'no'  => 'No',
    ];

    protected $dates = [
        'start_date',
        'end_date',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'name_en',
        'name_ar',
        'client_id',
        'department_id',
        'progress',
        'calculate_progress',
        'start_date',
        'end_date',
        'actual_completion',
        'alert_overdue',
        'project_cost',
        'demo_url',
        'project_status',
        'description_en',
        'description_ar',
        'notify_client',
        'timer_status',
        'timer_started_by',
        'start_time',
        'logged_time',
        'notes',
        'hourly_rate',
        'fixed_rate',
        'project_settings',
        'with_tasks',
        'estimate_hours',
        'created_at',
        'updated_at',
        'deleted_at',
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

    public function client()
    {
        return $this->belongsTo(Client::class, 'client_id');
    }

    public function getStartDateAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setStartDateAttribute($value)
    {
        $this->attributes['start_date'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function getEndDateAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setEndDateAttribute($value)
    {
        $this->attributes['end_date'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function department()
    {

        return $this->belongsTo('Modules\HR\Entities\Department', 'department_id');
    }

    public function accountDetails()
    {

        return $this->belongsToMany('Modules\HR\Entities\AccountDetail',
            'project_account_details_pivot','project_id','account_details_id');

    }

    public function milestones()
    {
        return $this->hasMany(Milestone::class,'project_id');
    }

    // tasks without sub tasks
    public function tasks()
    {
        return $this->hasMany(Task::class,'project_id')->where('parent_task_id','=',null);
    }

    // all tasks
    public function allTasks()
    {
        return $this->hasMany(Task::class,'project_id');
    }

    public function bugs()
    {
        return $this->hasMany(Bug::class,'project_id');
    }

    public function transactions()
    {
        return $this->hasMany(Transaction::class,'project_id');
    }

    public function invoices()
    {
        return $this->hasMany(Invoice::class,'project_id');
    }

    public function tickets()
    {
        return $this->hasMany(Ticket::class,'project_id');
    }

    public function TimeSheet()
    {
        return $this->hasMany(TimeSheet::class,'module_field_id')->where('module','=','project')
            ->where('end_time','!=',null)->orderBy('id','desc');
    }

    public function TimeSheetOn()
    {
        return $this->hasMany(TimeSheet::class,'module_field_id')->where('module','=','project')
            ->where('user_id',auth()->user()->id)->where('end_time','=',null);
    }

    public function activities()
    {
        return $this->hasMany(Activity::class,'module_field_id')->where('module','=','project')->orderBy('id','desc');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class,'module_field_id')->where('module','=','project')->orderBy('id','desc');
    }

    public function cloneProject()
    {
        // clone project as new project
        $newproject            = $this->replicate();
        $newproject->name_en   = $this->name_en.'-copy'.substr(time(),-4);
        $newproject->name_ar   = $this->name_ar.'-نسخ'.substr(time(),-4);
        $newproject->push();

        $newproject = Project::findOrFail($newproject->id);

        //setActivity('project',$newproject->id,'Save Project Details',$newproject->name);
        setActivity('project',$newproject->id,'Save Project Details','حفظ تفاصيل المشروع',$newproject->name_en,$newproject->name_ar);


        $user = $newproject->client;

        // send mail
        $sender =  settings('smtp_sender_name');
        $email_from =  settings('smtp_email') ;

        //send mail to client
        $template = templates('client_notification');
//            $message = str_replace("{REF}",$invoice->reference_no,$template->template_body);
        $message = str_replace("{CLIENT_NAME}",$user->name,$template->template_body);
        $message = str_replace("{PROJECT_NAME}",$newproject->name_en,$message);
        $message = str_replace("{PROJECT_LINK}",route("projectmanagement.admin.projects.show", $newproject->id),$message);
        $message = str_replace("{SITE_NAME}",settings('company_name'),$message);

//            Mail::mailer('smtp')->to($user->email)->send(new FinanceMail($email_from, $sender,$message));
        Mail::mailer('smtp')->to($user->email)
            ->cc('mabrouk@onetecgroup.com')
            ->cc('sara@onetecgroup.com')
            ->bcc('marwa@onetecgroup.com')
            ->send(new ProjectManagementMail($email_from, $sender,$message,$template->subject));

        // clone milestones in project to add for new project
        foreach ($this->milestones as $milestone)
        {

            $new_milestone = $milestone->cloneMilestone($newproject);

        }

        return $newproject;
    }
}
