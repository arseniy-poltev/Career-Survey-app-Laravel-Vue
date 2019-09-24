@component('mail::message')
Hello, <b>{{ $user->name }}</b>

Your new password on our website {{ config('app.url') }} was set to:

<b><i>{{ $password }}</i></b>

You always can change it in Profile Settings.

In order to access your dashboard, click on button below:

@component('mail::button', ['url' => route('login')])
    Visit dashboard
@endcomponent

Kind Regards<br>
HR Coach
@endcomponent
