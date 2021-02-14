<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;


class FinanceMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */

    protected $email;
    protected $name;
    protected $message;
    public function __construct($email, $name,$message=null)
    {
        $this->email = $email;
        $this->name = $name;
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
        return $this->from($this->email, $this->name)->html('This a Test Mail in Finance');
        // return $this->view('view.name');
    }
}
