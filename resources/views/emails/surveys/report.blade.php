@component('mail::message')
    Hello, {{ $survey->client_name }}

    Thank you for taking the time to undertake the My Business Health Check for your organisation.

    Please find attached your one page summary of the Business Health Check Survey. You will be contacted in the next couple of days to provide you with a copy of the full report.

    Kind Regards
    {{ $survey->hrcoach_name }}
@endcomponent
