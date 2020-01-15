@component('mail::message')
# A new user has registered on the administration panel

Name: {{ $newUser->name }}

Email: {{ $newUser->email }}
@endcomponent
