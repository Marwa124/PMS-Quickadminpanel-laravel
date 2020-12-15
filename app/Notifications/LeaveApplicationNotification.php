<?php

namespace App\Notifications;

use Carbon\Traits\Serialization;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Mail;
use Modules\HR\Emails\LeaveRequest;
use Modules\HR\Entities\AccountDetail;

class LeaveApplicationNotification extends Notification
{
    use Queueable, Serialization;

    public $leave_category;
    public $application;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($application, $leave_category)
    {
        $this->leave_category = $leave_category;
        $this->application    = $application;
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
        $userName = AccountDetail::where('user_id', $this->application->user_id)->first();
        $attachment = $this->application->attachments ?
            asset($this->application->attachments->getUrl()) : '';
            // env('APP_URL') . str_replace('storage', 'storage/app/public', $this->application->attachments->getUrl()) : '';
        /////////// Fix Attachment URL
        if ($attachment) {
            $sendMail = (new MailMessage)
                ->subject('Pending Leave Request ')
                ->greeting('Employee ' . $userName->fullname ?? '' . ' applies for ' . $this->leave_category)
                ->line('Leave Type: ' . $this->application->leave_type)
                ->line('Leave start date: ' . $this->application->leave_start_date)
                ->line('Leave end date: ' . $this->application->leave_end_date)
                ->line('Leave hours: ' . $this->application->hours)
                ->attach($attachment)
                ->line('Reason: ' . strip_tags($this->application->reason) ?? '')
                ->action('Go To Request', route("hr.admin.leave-applications.show", $this->application->id));
                // ->action('Go To Request', url("admin/hr/leave-applications/". $this->application->id . '/edit'));
        }else{
            $sendMail = (new MailMessage)
                    ->subject('Pending Leave Request ')
                    ->greeting($userName->fullname ?? '' . ' applies for ' . $this->leave_category)
                    ->line('Leave Type: ' . $this->application->leave_type)
                    ->line('Leave start date: ' . $this->application->leave_start_date)
                    ->line('Leave end date: ' . $this->application->leave_end_date)
                    ->line('Leave hours: ' . $this->application->hours)
                    ->line('Reason: ' . strip_tags($this->application->reason) ?? '')
                    ->action('Go To Request', route("hr.admin.leave-applications.show", $this->application->id));
        }

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
        $userName = AccountDetail::where('user_id', $this->application->user_id)->first();

        return [
            'title'      => $userName->fullname ?? '' . ' applies for ' . $this->leave_category,
            'leave_id'   => $this->application->id,
            'route_path' => 'admin/hr/leave-applications',
            // 'route_path' => 'hr.admin.leave-applications.edit',
            'leave_name' => 'wants to apply for '.$this->application->leave_type
        ];
    }
}
