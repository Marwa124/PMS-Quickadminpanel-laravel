<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class NewNotification implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $title;
    // public $content;
    // public $model_id;
    // public $show_path;
    // public $user_id;

    public $leave_id;
    public $show_path;
    public $leave_name;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($data, $leaveName)
    {
        $this->title    = $data['data']['title'];
        $this->leave_id  = $data['data']['leave_id'];
        $this->show_path = $data['data']['route_path'];
        $this->leave_name = $data['data']['leave_name'];

        // $this->title    = $data['title'];
        // $this->content  = $data['content'];
        // $this->model_id = $data['model_id'];
        // $this->show_path = $data['show_path'];
        // $this->user_id = $data['user_id'];
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        // $notifyUsers = globalNotificationId($this->user_id);

        return new Channel('new-notification');
        // return new PrivateChannel('new-notification.'.$this->user_id);
        // return ['new-notification.' . 23];
    }
}
