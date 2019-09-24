@component('mail::message')
    Hello, {{ $survey->order->user->name }}

    {{ $survey->order->contact_name }} ({{ $survey->order->business_name}}) has completed their survey, login to your account to access their report.
@endcomponent
