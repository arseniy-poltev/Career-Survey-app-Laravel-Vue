<?php

namespace App\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use App\User;
use App\Survey;

class SurveyPolicy
{
    use HandlesAuthorization;

    public function before($user, $ability)
    {
        if ($user->isAdmin()) {
            return true;
        }
    }

    /**
     * @param User $user
     * @param Survey $survey
     * @return bool
     */
    public function view(User $user, Survey $survey) : bool
    {
        return $survey->user_id === $user->id;
    }

    /**
     * @param User $user
     */
    public function create(User $user)
    {
        //
    }

    /**
     * @param User $user
     * @param Survey $survey
     */
    public function update(User $user, Survey $survey)
    {
        //
    }

    /**
     * @param User $user
     * @param Survey $survey
     * @return bool
     */
    public function delete(User $user, Survey $survey)
    {
        return $survey->user_id === $user->id;
    }

    /**
     * @param User $user
     * @param Survey $survey
     */
    public function restore(User $user, Survey $survey)
    {
        //
    }

    /**
     * @param User $user
     * @param Survey $survey
     */
    public function forceDelete(User $user, Survey $survey)
    {
        //
    }
}
