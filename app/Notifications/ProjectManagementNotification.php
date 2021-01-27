<?php

namespace App\Notifications;

use App\Models\User;
use Carbon\Traits\Serialization;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Mail;
use Modules\HR\Emails\LeaveRequest;
use Modules\HR\Entities\AccountDetail;

class ProjectManagementNotification extends Notification
{
    use Queueable, Serialization;

    public $module;
    public $user;
    public $dataMail;
    public $dataNotification;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($module,$user,$dataMail,$dataNotification)
    {
        $this->module          = $module;
        $this->user             = $user;
        $this->dataMail         = $dataMail;
        $this->dataNotification = $dataNotification;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail', 'database'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
//    public function toMail($notifiable)
//    {
//        if(User::find(auth()->user()->id)->accountDetail()->first())
//        {
//            $userName = AccountDetail::where('user_id', auth()->user()->id)->first()->fullname;
//        }else{
//            $userName = User::find(auth()->user()->id)->name;
//        }
//        $sendMail = (new MailMessage)
////            ->subject('New Project Assign To You')
////            ->greeting($userName.' Assign The Project '.$this->project->name.' To '.$this->user->name)
////            ->action('You can view', route("projectmanagement.admin.projects.show", $this->project->id));
//            ->subject($this->dataMail['subjectMail'])
//            ->greeting($userName.' '.$this->dataMail['bodyMail'])
//            ->action('You can view', $this->dataMail['action']);
//
//        return $sendMail;
//    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        if(User::find(auth()->user()->id)->accountDetail()->first())
        {
            $userName = AccountDetail::where('user_id', auth()->user()->id)->first()->fullname;
        }else{
            $userName = User::find(auth()->user()->id)->name;
        }

        return [
            'title'      => $userName ?? '',
            'leave_id'   => $this->module->id,
//            'route_path' => 'admin/projectmanagement/projects',
//            'leave_name' => 'Assign The Project '.$this->project->name.' To '.$this->user->name,
            'route_path' => $this->dataNotification['route_path'],
            'leave_name' => $this->dataNotification['message'],
        ];
    }
}
