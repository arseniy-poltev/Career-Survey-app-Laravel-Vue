<?php

namespace App\Mail\Coach;

use App\Survey;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SurveyCompleted extends Mailable
{
    use Queueable, SerializesModels;

    public $survey;

    /**
     * Create a new message instance.
     *
     * @param Survey $survey
     */
    public function __construct(Survey $survey)
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
        return $this->markdown('emails.surveys.coach-report');
    }
}
