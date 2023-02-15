@component('mail::message')
# Verify Email


@component('mail::button',['url'=> route('verify_email',$user->email_verification_code)])
Click Here for Verify Email Address
@endcomponent

@endcomponent