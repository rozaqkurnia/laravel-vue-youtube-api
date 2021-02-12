@component('mail::message')
# Account Created

Your account is created. 
Please click on the button to activate!

@component('mail::button', ['url' => route('activate-account', $user->activation_token)])
Activate account
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent