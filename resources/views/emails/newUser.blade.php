@component('mail::message')
    # New User Account
    Hello! <br>
    A new user account has been created for {{$user['name']}}. <br>
    Use the button below to sign in to the application. During first login use "Forgot Password" link to reset Your password.
    <br>

    Thanks,<br>
    {{ config('app.name') }}
@endcomponent
