<?php

namespace App\Jobs;

use App\Mail\SchoolLeadTransfer;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class SendEmailMouSchoolJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    protected $school_mail_id;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($school_mail_id)
    {
        $this->school_mail_id = $school_mail_id;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $email = new SchoolLeadTransfer($this->school_mail_id->school_id);
        Mail::to($this->school_mail_id->email)->send($email);
    }
}
