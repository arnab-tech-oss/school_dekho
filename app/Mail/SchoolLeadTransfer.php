<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class SchoolLeadTransfer extends Mailable
{
    use Queueable, SerializesModels;

    public $school;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($school)
    {
        $this->school = $school;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('New Lead for Your School')->view('email.newschoollead', ['school' => $this->school]);
    }
}
