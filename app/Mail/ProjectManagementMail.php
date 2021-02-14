<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ProjectManagementMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */

    protected $email;
    protected $name;
    public $subject;
    protected $message;
    public function __construct($email, $name, $subject, $message=null)
    {
        $this->email = $email;
        $this->name = $name;
        $this->subject = $subject;
        $this->message = $message;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        if ($this->message){

            return $this->from($this->email, $this->name)->html($this->message);
        }
        return $this->from($this->email, $this->name)->subject($this->subject)->html('This a Test Mail in Project Management');
        // return $this->view('view.name');
    }
}
