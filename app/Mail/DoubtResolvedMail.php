<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class DoubtResolvedMail extends Mailable
{
    use Queueable, SerializesModels;

    public $reply;
    public $filePath;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($reply,$filePath)
    {
        //
        $this->reply = $reply;
        $this->filePath = $filePath;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {   
        $mail = $this->subject('Your Doubt Has Been Resolved')
                     ->view('emails.doubt_resolved');

        if ($this->filePath) {
            $mail->attach(public_path($this->filePath));
        }

        return $mail;
    }
}
