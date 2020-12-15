<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;
use Modules\HR\Emails\LeaveRequest;

class NotifyUserViaEmailListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        //  /* !!!: Leave Mail */
        //  Mail::to('marwa120640@gmail.com')->cc("marwa120640@gmail.com")
        //  ->send(new LeaveRequest($event->leaveApplication, $event->leaveApplication->user_id, $event->title));

    }
}
