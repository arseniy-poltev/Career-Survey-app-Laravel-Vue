<?php

namespace App\Providers;

use App\Observers\SurveyObserver;
use App\Observers\UserObserver;
use Illuminate\Support\ServiceProvider;
use App\User;
use App\Survey;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        User::observe(UserObserver::class);
        Survey::observe(SurveyObserver::class);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
