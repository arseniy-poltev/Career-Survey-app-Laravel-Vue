<?php

namespace App\Observers;

use App\Survey;

class SurveyObserver
{
    public function creating(Survey $survey)
    {
        if (!$survey->getHash()) {
            $survey->hash = str_random(16);
        }
    }
}