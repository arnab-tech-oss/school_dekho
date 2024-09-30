<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendEmailVerification extends Mailable
{
    use Queueable, SerializesModels;

    public $claim_details;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($claim_details)
    {
        $this->claim_details = $claim_details;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('email.school_claim_verify', ['claim' => $this->claim_details]);
    }
}
