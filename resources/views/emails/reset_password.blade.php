@component('mail::message')
Hi, {{$user->name}}

Your reset password request has been received. Please click below link to reset your password.

@component('mail::button', ['url' => $url, 'color' => 'success'])
Reset Password
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
