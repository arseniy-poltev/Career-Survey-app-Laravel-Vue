@component('mail::message')
Hello {{ $order->getContactName() }},

Thank you for indicating that you would like to undertake a Business Health Check for your organisation.

In order to access the survey please follow the link below:

@component('mail::button', ['url' => route('surveys.show', ['hash' => $order->surveys()->first()->hash])])
Visit survey
@endcomponent

Once you have completed the survey, you will receive a one page summary which will identify your priorities for sustainability, management and risk.
I will get in contact with in the couple of days to arrange a suitable time to present you with your full Business Health Check Report.

Kind Regards<br>
{{ $order->getCoachName() }}
@endcomponent
