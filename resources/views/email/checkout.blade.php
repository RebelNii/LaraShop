@component('mail::message')
Hello @auth
    {{auth()->user()->first_name . ' ' . auth()->user()->last_name}}
@endauth

Here is an email to notify you of your recent purchase

@component('mail::button', ['url' => 'http://127.0.0.1:8000/profile/orders'])
View
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
