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

class ApproveRejectLeaveNotification extends Notification
{
    use Queueable, Serialization;

    public $leave_category;
    public $application;
    public $leave_status;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($application, $leave_category, $leave_status)
    {
        $this->leave_category = $leave_category;
        $this->application    = $application;
        $this->leave_status   = $leave_status;
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
    public function toMail($notifiable)
    {
        if(User::find(auth()->user()->id)->accountDetail()->first())
        {
            $userName = AccountDetail::where('user_id', auth()->user()->id)->first()->fullname;
        }else{
            $userName = User::find(auth()->user()->id)->name;
        }
        $sendMail = (new MailMessage)
            ->subject('Your Leave Request has been '.$this->leave_status)
            ->greeting('Congratulations! Your request for '.$this->leave_category->name.' has been approved by '.$userName ?? '')
            ->action('Go To Request', route("hr.admin.leave-applications.show", $this->application->id));

        return $sendMail;
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        // dd($this->application->user_id);
        if(User::find(auth()->user()->id)->accountDetail()->first())
        {
            $userName = AccountDetail::where('user_id', auth()->user()->id)->first()->fullname;
        }else{
            $userName = User::find(auth()->user()->id)->name;
        }

        return [
            'title'      => $userName ?? '',
            'leave_id'   => $this->application->id,
            'route_path' => 'admin/hr/leave-applications',
            'leave_name' => $this->leave_status.' Your request for '.$this->leave_category->name
        ];
    }
}
