<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SurveyNewEntry extends Mailable
{
    use Queueable, SerializesModels;
    public $survey;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($survey)
    {
       $this->survey = $survey;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('New survey to proceed')->from('surveys@kucubezpieczenia.pl')->markdown('emails.surveys.newEntry')->with('survey', $this->survey);
    }
}
