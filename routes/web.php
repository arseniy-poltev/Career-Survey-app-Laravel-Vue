<?php

Auth::routes();

Route::middleware(['auth'])->group(function () {

    Route::get('/home', 'PageController@dashboard')->name('home');
    Route::get('/dashboard', 'PageController@dashboard')->name('dashboard');

    Route::post('/surveys/state/{hash}', 'SurveyDetailController@updateState')->name('survey.state.update');

    Route::get('/surveys', 'SurveyController@index')->name('survey.index');
    Route::get('/surveys/users/{user_id}', 'SurveyController@getUser')->name('survey.user.get');

    Route::post('/surveys', 'SurveyController@store')->name('survey.store');
    Route::patch('/surveys/{hash}', 'SurveyController@update')->name('survey.update');
    Route::delete('/surveys/{survey}', 'SurveyController@destroy')->name('survey.destroy');
    Route::post('/surveys/pay/{survey_id}', 'SurveyController@pay')->name('survey.pay');

    Route::get('/surveys/input/{hash}', 'SurveyDetailController@getInput')->name('hash');
    Route::post('/surveys/input', 'SurveyDetailController@storeInput');

    Route::get('/surveys/feedback/{hash}', 'SurveyDetailController@getFeedback')->name('hash');
    Route::post('/surveys/feedback', 'SurveyDetailController@storeFeedback')->name('survey.feedback.store');

    Route::get('/surveys/plan/{hash}', 'SurveyDetailController@getPlan')->name('hash');
    Route::post('/surveys/plan', 'SurveyDetailController@storePlan')->name('survey.plan.store');

    Route::post('/surveys/report/{survey_id}/download', 'SurveyDetailController@downloadReports')->name('survey.report.download');

    Route::get('/settings/public', 'SettingsController@publicSettings');

    Route::post('/profile', 'ProfileController@update');
});

Route::middleware(['admin'])->group(function () {
    Route::get('/users', 'UserController@index')->name('users.index');
    Route::post('/users', 'UserController@store')->name('users.store');
    Route::patch('/users/{user}', 'UserController@update')->name('users.update');
    Route::delete('/users/{user}', 'UserController@destroy')->name('users.destroy');

    Route::get('/manage/surveys', 'SurveyController@all')->name('survey.all');

    Route::get('/settings', 'SettingsController@index');
    Route::post('/settings', 'SettingsController@store');

    Route::get('/manage/welcome', 'WelcomeController@index');
    Route::post('/manage/welcome', 'WelcomeController@store');
});

Route::get('/', 'PageController@welcome')->name('welcome');
