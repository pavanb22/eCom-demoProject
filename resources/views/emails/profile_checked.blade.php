@component('mail::message')
# Hi, {{$user->name}}

Someone checked your profile for more info visit our site.

@component('mail::button', ['url' => $url, 'color' => 'success'])
Visit Now
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
