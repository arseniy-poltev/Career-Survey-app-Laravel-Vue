@component('mail::message')
Hi  {{ $survey->client_name }},

Thank you for taking the time to complete your Career Monitor survey. A summary of your results is attached to this email. Should you have any questions about any of this, please let me know

Kind Regards,<br>
{{ $survey->hrcoach_name }}<br>
{{ $survey->hrcoach_organisation }} 
@endcomponent
