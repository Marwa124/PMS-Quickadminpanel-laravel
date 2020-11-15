<?php

namespace Modules\HR\Emails;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Modules\HR\Entities\JobApplication;
use Modules\HR\Entities\LeaveApplication;
use Modules\HR\Entities\LeaveCategory;
use Spatie\MediaLibrary\Models\Media;

class JobApplicationRequest extends Mailable
{
    use Queueable, SerializesModels;

    public $details;
    public $job_circular;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($details, $job_circular)
    {
        $this->details = $details;
        $this->job_circular = $job_circular;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        // $account = JobApplication::where('user_id', $this->user_id)->select('user_id', 'fullname')->first();
        $jobApplicationDetail = $this->details;

        $attachment = str_replace('public/storage', 'storage/app/public', $this->details->resume->getUrl());
        $array = explode('.', $this->details->resume->getUrl());
        $extension = strtolower(end($array));

        $name  = $jobApplicationDetail->name;
        $email = $jobApplicationDetail->email;
        return $this->from($email, $name)
            ->subject('Job Application ')
            ->subject('Job Application ')
            ->view('hr::jobApplicationMail')
            ->attach($attachment, [
                'as' => 'jobApplicationResume.'.$extension,
                'mime' => 'application/'.$extension,
            ])
            ->with(['details' => $this->details, 'job_circular' => $this->job_circular]);
    }
}
