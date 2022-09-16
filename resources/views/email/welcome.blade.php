@component('mail::message')
Hello,

Welcome to m demo project.

@component('mail::button', ['url' => 'http://127.0.0.1:8000/'])
Visit
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
