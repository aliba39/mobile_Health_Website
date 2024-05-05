@component('mail::message')
# We have received your password reset request and will be in touch shortly.

Request for: {{$email}}

@component('mail::button', ['url' => '/'])
Return to home page
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
