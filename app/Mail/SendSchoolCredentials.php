<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendSchoolCredentials extends Mailable
{
    use Queueable, SerializesModels;

    public $claim;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($claim)
    {
        $this->claim = $claim;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('email.claim_approve', ['claim' => $this->claim]);
    }
}
