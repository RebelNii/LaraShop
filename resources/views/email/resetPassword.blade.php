@component('mail::message')
Helo

Email to reset password

@component('mail::button', ['url' => 'http://127.0.0.1:8000/mailreset'])
Click me
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
