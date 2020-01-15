@component('mail::message')
# Create your account on the Ricoma administration panel

Click the button below to go to the registration form

@component('mail::button', ['url' => $invite->getInviteLink()])
Register
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
