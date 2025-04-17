<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class AnswerSheetAssignedMail extends Mailable
{
    use Queueable, SerializesModels;
    public $answerSheetId;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($answerSheetId)
    {
        //
        $this->answerSheetId = $answerSheetId;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $this->subject('New Answer Sheet Assigned')
                    ->view('emails.answer_sheet_assigned');
    
    }
}
