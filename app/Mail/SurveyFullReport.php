<?php

namespace App\Mail;

use App\Survey;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SurveyFullReport extends Mailable
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

    /**SurveyFullReport
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.surveys.full-report', compact('survey'))
            ->attach($this->survey->getSummaryFilename());
            //->attach($this->survey->getFullFilename());
    }
}
