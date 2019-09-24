<?php

namespace App\Observers;

use App\Mail\UserPasswordChanged;
use App\User;
use Illuminate\Support\Facades\Mail;

class UserObserver
{
    /**
     * Listen to the User created event.
     *
     * @param  User  $user
     * @return void
     */
    public function created(User $user)
    {
        //
    }

    /**
     * Listen to the User creating event.
     *
     * @param  User  $user
     * @return void
     */
    public function creating(User $user)
    {
        $generatedPassword = str_random(10);
        if (!$user->password) {
            $user->password = bcrypt($generatedPassword);

            // TODO Uncomment
            Mail::to($user->email)
                ->send(new UserPasswordChanged($user, $generatedPassword));
        }
    }
}