@component('mail::message')
# Reset Password


@component('mail::button',['url'=> route('reset_password',$user->reset_password_code)])
Click Here to Reset The Password
@endcomponent

@endcomponent